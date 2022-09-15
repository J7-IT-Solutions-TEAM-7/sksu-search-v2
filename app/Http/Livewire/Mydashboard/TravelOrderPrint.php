<?php

namespace App\Http\Livewire\MyDashboard;

use App\Models\Travel_Order;
use App\Models\Travel_Order_Applicant;
use App\Models\Travel_Order_Sidenote;
use App\Models\Travel_Order_Signatory;
use Livewire\Component;

class TravelOrderPrint extends Component
{
    public $travelorderID;
    public $sideNoteNumber = 5;
    public $isDraft;
    public $isSignatory = 0;
    public function mount()
    {
        $this->travelorderID = request()->id;
    }
    public function render()
    {
        $this->travel_order = Travel_Order::searchexactly('id',$this->travelorderID)->with('province')->with('region')->with('city')->orderByDesc('id')->first();
        return view('livewire.my-dashboard.travel-order-print', [
            'travel_order'=> $this->travel_order,
            'applicants' =>Travel_Order_Applicant::searchexactly('travel_order_id',$this->travelorderID)->with('employee_information')->get(),
            'signatories' =>Travel_Order_Signatory::searchexactly('travel_order_id',$this->travelorderID)->orderBy('stepNumber')->with('employee_information')->get(),
            'side_notes' => Travel_Order_Sidenote::searchexactly('travel_order_id',$this->travelorderID)->orderBy('id','desc')->get()->take($this->sideNoteNumber),
            'side_notes_count' => Travel_Order_Sidenote::searchexactly('travel_order_id',$this->travelorderID)->orderBy('id')->count(),
        ]);
    }
}
