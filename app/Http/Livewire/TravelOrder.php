<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\DTE;
use App\Models\Employee_information;
use App\Models\Province;
use App\Models\Region;
use App\Models\Travel_Order;
use App\Models\Travel_Order_Applicant;
use App\Models\Travel_Order_Signatory;
use Carbon\Carbon;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Livewire\Component;


class TravelOrder extends Component
{
    public $isDraft = true;
    public $isEdit = false;
    public $toValidated = false;

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
    public $purpose;
    
    public $has_registration;
    public $registration_amt;

    //variables for official time (from and to dates)
    public $dateoftravelfrom;
    public $dateoftravelto;

     //variables for place
     public $region;
     public $region_codes;
     public $province;
     public $province_codes;
     public $city;
     public $city_codes;

     public $travel_draft_made = false;
     public $travel_order_applicants;
     public $travel_order;

     public function mount()
    {
       if(isset(request()->isEdit))
       {
            $applicants = Travel_Order_Applicant::where('travel_order_id', request()->travelOrderID)->get();

            foreach($applicants as $applicant)
            {
                $this->setUser($applicant->employee_id);
            }
            $signatories = Travel_Order_Signatory::where('travel_order_id', request()->travelOrderID)->get();
            foreach($signatories as $sigs)
            {
                $this->setSignatory($sigs->user_id);
            }
            $this->travel_order = Travel_Order::find(request()->travelOrderID);

            $this->toType = $this->travel_order->to_type;
            $this->purpose = $this->travel_order->purpose;
            $this->dateoftravelfrom = $this->travel_order->date_of_travel_from;
            $this->dateoftravelto = $this->travel_order->date_of_travel_to;


           
            $this->region_codes = $this->travel_order->philippine_regions_id == 0 ? 'Region Not Set': $this->travel_order->region->region_code;
            $this->province_codes = $this->travel_order->philippine_provinces_id == 0 ? 'Province Not Set': $this->travel_order->province->province_code;
            $this->city_codes = $this->travel_order->philippine_cities_id == 0 ? 'City Not Set': $this->travel_order->city->city_municipality_code;
            $this->others =  $this->travel_order->others;
            $this->has_registration = $this->travel_order->has_registration;
            $this->has_registration = $this->travel_order->has_registration;
            $this->registration_amt = $this->travel_order->registration_amount;
            // if($this->travel_order->has_registration)
            // {

            // }
       }else{
        $applicant = Employee_information::where('id', auth()->user()->id)->first();
        $this->setUser($applicant->id);
       }
        // $this->isEdit = request()->isEdit;
        // if($this->isEdit == true || $this->isEdit == 1){
        //     $this->travel_order = TravelOrder::find(request()->travelOrderID);

        //     // $this->travel_order_applicants = TravelOrderApplicant::find(request()->travelOrderID);

        //     $this->TOforEditID = $this->travelOrderForpassingID = request()->travelOrderID;
        //     $this->ispopulating =true;
        //     $this->populateForEdit();
        // }
    }


    public function render()
    {
        $searchUsrRes = [];
        if ($this->searchUsers != "") {
            $this->searchedUsers = true;
            $searchUsrRes = Employee_information::search('full_name', $this->searchUsers)->whereNotIn('full_name', ['Administrator'])->get();
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
        $this->userInfos = Employee_information::whereIn('id', $this->applicant_ids)->whereNotIn('full_name', ['Administrator'])->get();
        $this->region = Region::get();
        $this->province = Province::where("region_code", "=",  $this->region_codes)->get();
        $this->city = City::where("province_code", "=", $this->province_codes)->get();
        $this->per_diem = DTE::where('region_code', '=', $this->region_codes)->first();
        $sigsInfos ="";
        if(isset($this->travel_order)){
           // $sigsInfos = Travel_Order_Signatory::whereIn('user_id', $this->signatory_ids)->where('travel_order_id',$this->travel_order->id)->orderBy('stepNumber')->with('user')->get();
            $sigsInfos = Travel_Order_Signatory::whereIn('user_id', $this->signatory_ids)->where('travel_order_id',$this->travel_order->id)->orderBy('stepNumber')->with('employee_information')->get();
        }else{
            $sigsInfos = Employee_information::whereIn('id', $this->signatory_ids)->get();
        }
        return view('livewire.travel-order', [
            'users' => $searchUsrRes, 'sigs' => $searchSigsRes,
            'userInfos' => $this->userInfos,
            'sigsInfos' => $sigsInfos
        ])->with('regions', $this->region)->with('provinces',  $this->province)
        ->with('cities',  $this->city)->with('diems', $this->per_diem)->layout('layouts.app');
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


    public function submit()
    {
 


        if (count($this->applicant_ids) > 0 && count($this->signatory_ids) > 0) {
           if($this->toType == "offtime")
            {
                $this->validate(
                    [
                        'users_id' => 'required',
                        'purpose' => 'required',
                        'dateoftravelfrom' =>'required',
                        'dateoftravelto' => 'required',
                    ],
                    [
                        'users_id.required' => 'The name field is required.',
                        'purpose.required' => 'The purpose field is required.',
                        'dateoftravelfrom.required' => 'This field is required.',
                        'dateoftravelto.required' => 'This field is required.',
                    ]
                );
                $this->toValidated = true;
                $this->save_official_time();
            }else{
                $this->validate(
                    [
                        'users_id' => 'required',
                        'purpose' => 'required',
                        'region_codes' => 'required',
                        'province_codes' => 'required',
                        'city_codes' => 'required',
                        'dateoftravelfrom' =>'required',
                        'dateoftravelto' => 'required',
                    ],
                    [
                        'users_id.required' => 'The name field is required.',
                        'purpose.required' => 'The purpose field is required.',
                        'region_codes.required' => 'Select a region.',
                        'province_codes.required' => 'Select a province.',
                        'city_codes.required' => 'Select a city/municipality.',
                        'dateoftravelfrom.required' => 'This field is required.',
                        'dateoftravelto.required' => 'This field is required.',
                    ]
                );
                $this->toValidated = true;
                $this->save_official_travel();
            }
           
               
                
                
                Notification::make() 
                ->title('Travel Order Saved successfully')
                ->iconColor('success') 
                ->success()
                ->send(); 


                return redirect()->route('mytravelorders');
           
        } else {
            
            $this->showApplicantError = $this->showSignatoryError = true;
        }
    }

    public function editTravelOrder()
    {
        $id = $this->travel_order->id;
        if($this->toType == "offtime")
        {
            $this->update_official_time($id);
        }else{
            $this->update_official_travel($id);
        }
    }

    public function save_official_travel()
    {
        $reg = Region::where("region_code", "=",  $this->region_codes)->first();
        $prov = Province::where("province_code", "=",  $this->province_codes)->first();
        $cit = City::where("city_municipality_code", "=",  $this->city_codes)->first();
        $from_date = Carbon::createFromFormat('Y-m-d', $this->dateoftravelfrom)->format('F d, Y');
        $to_date = Carbon::createFromFormat('Y-m-d', $this->dateoftravelto)->format('F d, Y');
        $date_string = $from_date . " - " . $to_date;
        // if ($this->travel_draft_made == false) {
        //     $this->travel_order = new TravelOrder;
        // }

        $this->travel_order = new Travel_Order();
        $this->travel_order->tracking_code = 'TO' . Carbon::now()->format('YmdHis') . auth()->user()->id . auth()->user()->employee_information->office->campus->campus_code;
        $this->travel_order->purpose = $this->purpose;
        $this->travel_order->date_of_travel_from = $this->dateoftravelfrom;
        $this->travel_order->date_of_travel_to = $this->dateoftravelto;
        $this->travel_order->philippine_regions_id =  $reg['id'];
        $this->travel_order->philippine_provinces_id = $prov['id'];
        $this->travel_order->philippine_cities_id = $cit['id'];
        $this->travel_order->others =  isset($this->others) ? $this->others : "";
        $this->travel_order->has_registration = isset($this->has_registration) ? "1" : "0";
        $this->travel_order->registration_amount = isset($this->has_registration) ? $this->registration_amt : "0";
        $this->travel_order->total =  isset($this->has_registration) ? $this->registration_amt : "0";
        $this->travel_order->date_range = $date_string;
        $this->travel_order->dte_id =  $reg['id'];
        $this->travel_order->to_type =  $this->toType;
        $this->travel_order->isDraft = false;
        $this->travel_order->save();
        $this->isDraft = false;
        $this->saveApplicants($this->travel_order->id);
    }


    public function save_official_time()
    {
       
        $from_date = Carbon::createFromFormat('Y-m-d', $this->dateoftravelfrom)->format('F d, Y');
        $to_date = Carbon::createFromFormat('Y-m-d', $this->dateoftravelto)->format('F d, Y');
        $date_string = $from_date . " - " . $to_date;
        // if ($this->travel_draft_made == false) {
        //     $this->travel_order = new TravelOrder;
        // }

        $this->travel_order = new Travel_Order();
        $this->travel_order->tracking_code = 'TO' . Carbon::now()->format('YmdHis') . auth()->user()->id . auth()->user()->employee_information->office->campus->campus_code;
        $this->travel_order->purpose = $this->purpose;
        $this->travel_order->date_of_travel_from = $this->dateoftravelfrom;
        $this->travel_order->date_of_travel_to = $this->dateoftravelto;
        // $this->travel_order->philippine_regions_id =  $reg['id'];
        // $this->travel_order->philippine_provinces_id = $prov['id'];
        // $this->travel_order->philippine_cities_id = $cit['id'];
        // $this->travel_order->others =  isset($this->others) ? $this->others : "";
        $this->travel_order->has_registration = isset($this->has_registration) ? "1" : "0";
        $this->travel_order->registration_amount = isset($this->has_registration) ? $this->registration_amt : "0";
        $this->travel_order->total =  isset($this->has_registration) ? $this->registration_amt : "0";
        $this->travel_order->date_range = $date_string;
        // $this->travel_order->dte_id =  $reg['id'];
        $this->travel_order->to_type =  $this->toType;
        $this->travel_order->isDraft = false;
        $this->travel_order->save();
        $this->isDraft = false;
        $this->saveApplicants($this->travel_order->id);
    }

    public function saveApplicants($toID)
    {
        $applicantsFromTbl = Travel_Order_Applicant::where('travel_order_id', '=', $toID)->delete();

        foreach ($this->applicant_ids as $value) {
            $toApplicants = new Travel_Order_Applicant;
            $toApplicants->travel_order_id = $toID;
            $toApplicants->employee_id = $value;
            $toApplicants->save();
        }
        $this->saveSignatories($toID);
    }
    public function saveSignatories($toID)
    {
        $applicantsFromTbl = Travel_Order_Signatory::where('travel_order_id', "=", $toID)->delete();
        foreach ($this->signatory_ids as $key=> $value) {
            $toSignatories = new Travel_Order_Signatory;
            $toSignatories->travel_order_id = $toID;
            $toSignatories->user_id = $value;
            $toSignatories->approval_status = "pending";
            $toSignatories->stepNumber = $key+1;
            $toSignatories->save();
        }
        // if ($this->isDraft == false) {
        //     $this->showBanner = true;
        //     $this->saveNotifs($toID);
            
        // } else {
        //     if ($this->toType == "offtravel") {
        //        // $deleteAllItenerary = Itenerary::where('travel_order_id','=',$toID)->delete();
              
        //         if ($this->showDays == true) {
        //             $this->emit('storeIteneraryDraft', $toID);
        //         }

        //     }

        //     $this->travel_draft_made = true;
        // }
    }

    public function update_official_time($id)
    {
        $from_date = Carbon::createFromFormat('Y-m-d', $this->dateoftravelfrom)->format('F d, Y');
        $to_date = Carbon::createFromFormat('Y-m-d', $this->dateoftravelto)->format('F d, Y');
        $date_string = $from_date . " - " . $to_date;
        $this->validate(
            [
                'purpose' => 'required',
                'dateoftravelfrom' =>'required',
                'dateoftravelto' => 'required',
            ],
            [
                'purpose.required' => 'The purpose field is required.',
                'dateoftravelfrom.required' => 'This field is required.',
                'dateoftravelto.required' => 'This field is required.',
            ]
        );

        // $count_applicants = Travel_Order_Applicant::where('travel_order_id', $id)->count();
        // $travel_order_applicants = Travel_Order_Applicant::where('travel_order_id', $id)->get();
        // if(($count_applicants == count($this->applicant_ids)) && (in_array(398, $this->applicant_ids)))
        // {
        //     dd("dont update!");
        // }else{
        //     dd("update!");
        // }

        // $travel_order_applicants = Travel_Order_Applicant::where('travel_order_id', request()->travelOrderID)->update([
        //     'employee_id'=>
        // ]);
        $this->saveApplicants($id);
        $travel_order_update = Travel_Order::find($id)->update([
                'purpose'=>$this->purpose,
                'date_of_travel_from' => $this->dateoftravelfrom,
                'date_of_travel_to' => $this->dateoftravelto,
                'date_range' => $date_string,
                'to_type' => $this->toType,
                'philippine_regions_id' => null,
                'philippine_provinces_id' => null,
                'philippine_cities_id' => null,
                'others' => '',
                'has_registration' => 0,
                'registration_amount' => null,
                'total' => null,
                'dte_id' => null,
                'isDraft' => 0,
        ]);

        if($travel_order_update)
        {
            Notification::make() 
            ->title('Travel Order Updated Successfully')
            ->iconColor('success') 
            ->success()
            ->send(); 

            return redirect()->route('mytravelorders');
        }

    }

    public function update_official_travel($id)
    {
        $reg = Region::where("region_code", "=",  $this->region_codes)->first();
        $prov = Province::where("province_code", "=",  $this->province_codes)->first();
        $cit = City::where("city_municipality_code", "=",  $this->city_codes)->first();
        $from_date = Carbon::createFromFormat('Y-m-d', $this->dateoftravelfrom)->format('F d, Y');
        $to_date = Carbon::createFromFormat('Y-m-d', $this->dateoftravelto)->format('F d, Y');
        $date_string = $from_date . " - " . $to_date;
        
        $this->validate(
            [
                'purpose' => 'required',
                'dateoftravelfrom' =>'required',
                'dateoftravelto' => 'required',
                'region_codes' => 'required',
                'province_codes' => 'required',
                'city_codes' => 'required',
            ],
            [
                'purpose.required' => 'The purpose field is required.',
                'dateoftravelfrom.required' => 'This field is required.',
                'dateoftravelto.required' => 'This field is required.',
                'region_codes.required' => 'Select a region.',
                'province_codes.required' => 'Select a province.',
                'city_codes.required' => 'Select a city/municipality.',
            ]
        );
        $this->saveApplicants($id);
        $travel_order_update = Travel_Order::find($id)->update([
            'purpose'=>$this->purpose,
            'date_of_travel_from' => $this->dateoftravelfrom,
            'date_of_travel_to' => $this->dateoftravelto,
            'date_range' => $date_string,
            'to_type' => $this->toType,
            'philippine_regions_id' =>  $reg['id'],
            'philippine_provinces_id' => $prov['id'],
            'philippine_cities_id' => $cit['id'],
            'others' =>  $this->others,
            'has_registration' => $this->has_registration,
            'registration_amount' => $this->registration_amt,
            'total' => $this->registration_amt,
            'isDraft' => 0,
            'dte_id' => $reg['id'],
        ]);


        if($travel_order_update)
        {
            Notification::make() 
            ->title('Travel Order Updated Successfully')
            ->iconColor('success') 
            ->success()
            ->send(); 

            return redirect()->route('mytravelorders');
        } 
    }

}
