<?php

namespace App\Http\Livewire\CashAdvances;

use Livewire\Component;
use App\Models\Activity_Cash_Advance;
use App\Models\Employee_information;
use App\Models\Travel_Order;
use App\Models\Travel_Order_Cash_Advance;
use App\Models\User;
use Carbon\Carbon;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Tables\Filters\Filter;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Stevebauman\Purify\Facades\Purify;
use Illuminate\Support\HtmlString;


class LocalTravel extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    public Travel_Order_Cash_Advance $activity;
     //vars for input title, amount, date_from, date_to, cheque_release, due_date, employee_id, dv_id
     public $activity_name;
     public $amount;
     public $date_from;
     public $date_to;
 
     public $proponent;//if toggled
     public $employee_id;//if toggled
     public $is_registered=true;
     public $mode_of_payment;
     //particulars
     // public $entry;
     public $responsibility_center;
     public $mfo_pap;
     public $signatory_id;
     public $tracking_number;   
     public $cheque_release;
     public $due_date;    
     public $signatory;
     public $other_reason;
     public $travel_order_id;
     
 
     public $employee;
    
    
    public function mount(){
        $this->form->fill([
            "tracking_number"=>"DV_".now()->format('Y').'-'.now()->format('m').'-'.rand(1,999),
        ]);
    }
    public function getFormSchema()
    {
        return [
            Wizard::make([
                Step::make('Travel Information')->schema([
                    
                   Grid::make(4)->schema([
                    Select::make('travel_order_id')
                    ->label('Import Travel Order')
                    ->searchable()
                    ->getSearchResultsUsing(fn (string $search) => Travel_Order::where('id', 'in', "%{$search}%")->limit(50)->pluck('purpose', 'id'))
                    ->getOptionLabelUsing(fn ($value): ?string => User::find($value)?->name),
                    TextInput::make('activity_name')->label("Purpose")->columnSpan(4)->autofocus(true)->reactive()->required(),
                    Grid::make(3)->schema([
                        TextInput::make('amount')->columnSpan(1)->reactive()->numeric()->required(),
                        DatePicker::make('date_from')->columnSpan(1)->reactive()->format('Y-m-d')->required(),
                        DatePicker::make('date_to')->columnSpan(1)->format('Y-m-d')->reactive()->required()->afterOrEqual('date_from'),
                    ])->columnSpan(4)
                   ])
                    
                ]),

                Step::make('Disbursement Voucher Information')->schema([
                    Toggle::make("is_registered")->label("Is user registered on the system?")
                    ->inline(false)
                    ->afterStateUpdated(function (Closure $set, $state) {
                        $set('is_registered', $state);})
                    ->onIcon('heroicon-s-lightning-bolt')
                    ->offIcon('heroicon-s-user')
                    ->columnSpan(1)
                    ->reactive(),
                   Grid::make(4)->schema([
                    TextInput::make('tracking_number')->label("DV Tracking Number")->columnSpan(1)->reactive()->required()->disabled(),
                    TextInput::make('proponent')->label('Requisitioner')->columnSpan(3)->visible($this->is_registered == false)->hidden($this->is_registered == true)->required()->rules(['exclude_if:is_registered,true']),                    
                    Select::make('employee_id')->required()->rules(['exclude_if:is_registered,false'])
                        ->visible($this->is_registered == true)
                        ->hidden($this->is_registered == false)
                        ->label('Requisitioner')
                        ->placeholder("Search name of requisitioner")
                        ->allowHtml() // Apply the new modifier to enable HTML in the options - it's disabled by default
                        ->searchable() // Don't forget to make it searchable otherwise there is no choices.js magic!
                        ->getSearchResultsUsing(function (string $search) {
                                $users = Employee_information::where('full_name', 'like', "%{$search}%")->limit(20)->with('user')->get();
                        
                                return $users->mapWithKeys(function ($user) {
                                    return [$user->getKey() => static::getCleanOptionString($user)];
                                })->toArray();
                        })
                        ->getOptionLabelUsing(function ($value): string {
                            $user = Employee_information::find($value);
                            return static::getCleanOptionString($user);
                        })
                        ->columnSpan(3)
                        ->reactive(),
                    Section::make("Particular/s")
                    ->collapsible()
                    ->schema([
                        TextInput::make('activity_name')->label("Entry")->disabled(true)->columnSpan(4)->required(),
                        Grid::make(3)->schema([
                            TextInput::make('responsibility_center')->columnSpan(1),
                            TextInput::make('mfo_pap')->label("MFO/PAP")->columnSpan(1),
                            TextInput::make('amount')->columnSpan(1)->disabled(true)->required(),
                        ])->columnSpan(4)->reactive()
                    ])->columnSpan(4),
                    Select::make('mode_of_payment')
                    ->options([
                        'MD5' => 'MD5',
                        'Commercial Check' => 'Commercial Check',
                        'ADA' => 'ADA',
                        'Others' => 'Others'
                    ])->columnSpan(2)->reactive()->required(),
                    TextInput::make('other_reason')->label('Specify:')->columnSpan(2)->visible($this->mode_of_payment == 'Others')->hidden($this->mode_of_payment != 'Others')->required()->rules(['exclude_unless:mode_of_payment,other'])->reactive(),                    
                    Select::make('signatory_id')
                        ->label('Signatory')
                        ->placeholder("Select signatory")
                        ->allowHtml() // Apply the new modifier to enable HTML in the options - it's disabled by default
                        ->searchable() // Don't forget to make it searchable otherwise there is no choices.js magic!
                        ->getSearchResultsUsing(function (string $search) {
                                $signatories = Employee_information::where('full_name', 'like', "%{$search}%")->where('office_id','=',$this->employee[0]['office_id'])->limit(20)->with('user')->get();
                        
                                return $signatories->mapWithKeys(function ($signatories) {
                                    return [$signatories->getKey() => static::getCleanOptionString($signatories)];
                                })->toArray();
                        })
                        ->getOptionLabelUsing(function ($value): string {
                            $signatories = Employee_information::find($value);
                            return static::getCleanOptionString($signatories);
                        })
                        ->columnSpan(4)
                        ->reactive()
                        ->required(),
                    
                   ])
                ]),
                
                Step::make('Prepare Related Documents')->schema([
                    Card::make()
                    ->schema([
                        ViewField::make('related_documents')->label('Related Documents')->view('components.forms.related_docs_fetcher')
                        ])
                ]),
                Step::make('Voucher Preview')->schema([
                    Card::make()
                    ->schema([
                        ViewField::make('voucher_preview')->label("Voucher Preview")->view('components.forms.voucher-preview')
                    ])                    
                ])
            ])->startOnStep(1)
            ->submitAction(new HtmlString('<button class="px-4 py-2 rounded-md bg-primary-500 text-primary-100 active:ring-1 active:ring-offset-1 active:ring-primary-400" type="submit">Submit</button>')),
        
        ];
    }

    public function updated($name, $value){
       if($name == "date_from"){
        $this->date_from = Carbon::createFromDate($this->date_from)->format("Y-m-d");
       }
       if($name == "employee_id"){
        
        $this->employee=Employee_information::searchexactly('id',$this->employee_id)->get();
        
       }
       if($name == "signatory_id"){
        
        $this->signatory=Employee_information::searchexactly('id',$this->employee_id)->get();
        
       }

    }
 
    public function submit(): void
    {dd('fuckthis');
    }
    public static function getCleanOptionString(Model $model): string
    {
        return Purify::clean(
                view('components.filament-components.select-user-result')
                    ->with('name', $model?->full_name)
                    ->with('email', $model?->user->email)
                    ->with('image', $model?->avatar)
                    ->render()
        );
    }
    public function render()
    {
        return view('livewire.cash-advances.local-travel');
    }
}
