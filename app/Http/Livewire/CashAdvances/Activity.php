<?php

namespace App\Http\Livewire\CashAdvances;

use App\Models\Activity_Cash_Advance;
use App\Models\Employee_information;
use App\Models\User;
use Carbon\Carbon;
use Closure;
use Livewire\Component;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Tables\Filters\Filter;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Stevebauman\Purify\Facades\Purify;

class Activity extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    public Activity_Cash_Advance $activity;

    //vars for input title, amount, date_from, date_to, cheque_release, due_date, employee_id, dv_id
    public $activity_name;
    public $amount;
    public $proponent;
    public $employee_id;
    public $date_from;
    public $date_to;
    public $cheque_release;
    public $due_date;
    public $is_registered=true;

    public $employee;

    protected $rules = [
        'activity_name' => 'required',
        'date_to' => 'required',
        'cheque_release' => 'required',
        'due_date' => 'required',
        'employee_id' => 'required',
        'dv_id' => 'required',
    ];

    public function mount(){
        $this->form->fill([

        ]);
    }

    public function getFormSchema()
    {
        return [
            Wizard::make([
                Step::make('Activity Information')->schema([
                    
                   Grid::make(4)->schema([
                    
                    
                    TextInput::make('activity_name')->columnSpan(4)->autofocus(true),
                    Grid::make(3)->schema([
                        TextInput::make('amount')->columnSpan(1),
                        DatePicker::make('date_from')->columnSpan(1)->reactive()->format('Y-m-d'),
                        DatePicker::make('date_to')->minDate($this->date_from)->columnSpan(1)->format('Y-m-d'),
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
                    TextInput::make('proponent')->label('Requisitioner')->columnSpan(4)->visible($this->is_registered == false)->hidden($this->is_registered == true),
                    Select::make('employee_id')
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
                        ->columnSpan(4)
                        ->reactive(),
                    Section::make("Particular/s")
                    ->collapsible()
                    ->schema([
                        TextInput::make('activity_name')->label("Entry")->disabled(true)->columnSpan(4),
                        Grid::make(3)->schema([
                            TextInput::make('responsibility_center')->columnSpan(1),
                            TextInput::make('mfo_pap')->label("MFO/PAP")->columnSpan(1),
                            TextInput::make('amount')->columnSpan(1)->disabled(true),
                        ])->columnSpan(4)
                    ]),
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
                        ->reactive(),
                    
                   ])
                ]),
                
                Step::make('Prepare Related Documents')->schema([
                    Card::make()
                    ->schema([
                    
                        
                        ])
                ]),
                Step::make('Voucher Preview')->schema([
                  
                    
                ])
            ]),
        
        ];
    }

    public function render(): View
    {
        return view('livewire.cash-advances.activity');
    }
    public function updated($name, $value){
       if($name == "date_from"){
        $this->date_from = Carbon::createFromDate($this->date_from)->format("Y-m-d");
       }
       if($name == "employee_id"){
        
        $this->employee=Employee_information::searchexactly('id',$this->employee_id)->get();
        
       }
    }
 
    public function submit(): void
    {

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
}
