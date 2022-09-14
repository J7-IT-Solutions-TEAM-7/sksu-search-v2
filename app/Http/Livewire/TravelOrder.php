<?php

namespace App\Http\Livewire;

use App\Models\Employee_information;
use App\Models\Travel_Order_Signatory;
use Livewire\Component;


class TravelOrder extends Component
{
    public $toType = "offtravel";
    public $searchUsers;
    public $searchedUsers = false;
    public $pickedUsers = false;
    public $users_id;
    public $applicant_ids = [];
    public $showApplicantError = false;
    public $pickedSigs = false;
    public $searchSigs;
    public $searchedSigs = false;
    public $signatory_ids = [];
    public $showSignatoryError = false;
    
    public $has_registration;


    public function render()
    {
        $searchUsrRes = [];
        if ($this->searchUsers != "") {
            $this->searchedUsers = true;
            $searchUsrRes = Employee_information::search('full_name', $this->searchUsers)->get();
        } else {
            $searchUsrRes = [];
            $this->searchedUsers = false;
        }
        $searchSigsRes = [];
        if ($this->searchSigs != "") {
            $this->searchedSigs = true;
            $searchSigsRes = Employee_information::search('full_name', $this->searchSigs)->whereIn('position_id', [5, 12, 13, 11, 14, 15, 16, 17, 18, 19, 20, 21, 25])->get();
        } else {
            $searchSigsRes = [];
            $this->searchedSigs = false;
        }
        $this->userInfos = Employee_information::whereIn('id', $this->applicant_ids)->get();
        $sigsInfos ="";
        if(isset($this->travel_order)){
           // $sigsInfos = Travel_Order_Signatory::whereIn('user_id', $this->signatory_ids)->where('travel_order_id',$this->travel_order->id)->orderBy('stepNumber')->with('user')->get();
            $sigsInfos = Travel_Order_Signatory::whereIn('user_id', $this->signatory_ids)->where('travel_order_id',$this->travel_order->id)->orderBy('stepNumber')->with('user')->get();
        }else{
            $sigsInfos = Employee_information::whereIn('id', $this->signatory_ids)->get();
        }
        return view('livewire.travel-order', [
            'users' => $searchUsrRes, 'sigs' => $searchSigsRes,
            'userInfos' => $this->userInfos,
            'sigsInfos' => $sigsInfos
        ])->layout('layouts.app');
    }

    public function setUser($uID)
    {
        $this->users_id = $uID;
        $this->pickedUsers = true;
        $this->searchedUsers = false;
        $this->searchUsers = "";
        $this->applicant_ids[] = $uID;
        $this->showApplicantError = false;
        $this->applicant_ids = array_unique($this->applicant_ids);
        $this->updated("searchSigs", "");
        array_values($this->applicant_ids);
    }
    public function unSetUser($id)
    {
        $index = array_search($id, $this->applicant_ids);
        unset($this->applicant_ids[$index]);
        $this->updated("searchSigs", "");
        array_values($this->applicant_ids);
    }
    public function setSignatory($uID)
    {
        $this->pickedSigs = true;
        $this->searchedSigs = false;
        $this->searchSigs = "";
        $this->signatory_ids[] = $uID;
        $this->signatory_ids = array_unique($this->signatory_ids);
        $this->showSignatoryError = false;
        $this->updated("searchSigs", "");
        array_values($this->signatory_ids);
    }
    public function unSetSignatory($id)
    {
        $index = array_search($id, $this->signatory_ids);
        unset($this->signatory_ids[$index]);
        $this->updated("searchSigs", "");
        array_values($this->signatory_ids);
    }

}
