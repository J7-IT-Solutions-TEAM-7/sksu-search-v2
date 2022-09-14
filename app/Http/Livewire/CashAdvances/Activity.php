<?php

namespace App\Http\Livewire\CashAdvances;

use App\Models\Activity_Cash_Advance;
use Livewire\Component;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Illuminate\Contracts\View\View;



class Activity extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    public Activity_Cash_Advance $activity;

    //vars for input title, amount, date_from, date_to, cheque_release, due_date, employee_id, dv_id
    public $title;
    public $amount;
    public $date_from;
    public $date_to;
    public $cheque_release;
    public $due_date;
    public $employee_id;
    public $dv_id;

    protected $rules = [
        'title' => 'required',
        'amount' => 'required',
        'date_from' => 'required',
        'date_to' => 'required',
        'cheque_release' => 'required',
        'due_date' => 'required',
        'employee_id' => 'required',
        'dv_id' => 'required',
    ];

    public function getFormSchema()
    {
        return [
            Grid::make(4)
        ->schema([
                TextInput::make('title')->columnSpan(4),
                TextInput::make('employee_id')->columnSpan(4),
                TextInput::make('amount')->numeric()->columnSpan(4),
                DatePicker::make('date_from')->columnSpan(2),
                DatePicker::make('date_to')->minDate('date_from')->columnSpan(2),
                
            ])
        ];
    }

    public function render(): View
    {
        return view('livewire.cash-advances.activity');
    }
    
 
    public function submit(): void
    {
        // ...
    }
}
