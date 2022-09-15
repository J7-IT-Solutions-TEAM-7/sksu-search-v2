<?php

namespace App\Http\Livewire\MyDashboard;

use App\Models\Travel_Order;
use App\Models\Travel_Order_Applicant;
use App\Models\Travel_Order_Signatory;
use Livewire\Component;

class PrintTO extends Component
{
    public $travelorderID;

    public function mount()
    {
        $this->travelorderID = request()->id;  
    }

    public function render()
    {
        return view('livewire.my-dashboard.print-t-o',[
            'travel_order'=>Travel_Order::searchexactly('id',$this->travelorderID)->with('province')->with('region')->with('city')->orderByDesc('id')->first(),
            'applicants' =>Travel_Order_Applicant::searchexactly('travel_order_id',$this->travelorderID)->with('employee_information')->get(),
            'signatories' =>Travel_Order_Signatory::searchexactly('travel_order_id',$this->travelorderID)->orderBy('stepNumber')->with('employee_information')->get(),

        ]);
    }
}
