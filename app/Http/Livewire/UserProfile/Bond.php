<?php

namespace App\Http\Livewire\UserProfile;

use App\Models\Bond as BondModal;
use App\Models\Employee_information;
use Filament\Notifications\Notification;
use Livewire\Component;

class Bond extends Component
{
    public $user_id;
    public $user;
    public $bond;
    public $bond_name;
    public $val_date;

    public function render()
    {
        $this->user_id = auth()->user()->id;
        $this->user = BondModal::where('employee_id', $this->user_id)->first();
        // if($this->user->bond_id != null)
        // {
        //     $this->bond_name = $this->user->bond->bond_name;
        //     $this->val_date = $this->user->bond->validity_date;
        // }
        
        return view('livewire.user-profile.bond');
    }

    public function submit()
    {
        if($this->user->bond_id == null || $this->user->bond_id == "")
        {
            $this->validate([
                'bond_name' => 'required',
                'val_date' => 'required',
            ],[
                'bond_name.required' => 'Please Enter Bond Name',
                'val_date.required' => 'Please Enter Validity Date',
            ]);


            $this->bond = new BondModal;
            $this->bond->bond_name = $this->bond_name;
            $this->bond->validity_date = $this->val_date;
            $this->bond->employee_id = $this->user_id;
            $this->bond->save(); 

            $update_user = Employee_information::find($this->user_id)->update([
                'bond_id'=>$this->bond->id,
            ]);

            if($update_user)
            {
                Notification::make() 
                ->title('Bond Saved')
                ->iconColor('success') 
                ->success()
                ->send(); 
            }
        }else{
            $this->validate([
                'bond_name' => 'required',
                'val_date' => 'required',
            ],[
                'bond_name.required' => 'Please Enter Bond Name',
                'val_date.required' => 'Please Enter Validity Date',
            ]);

            $update_bond = BondModal::where('employee_id' , $this->user_id)->update([
                'bond_name'=>$this->bond_name,
                'validity_date'=>$this->val_date,
            ]);

            if($update_bond)
            {
                Notification::make() 
                ->title('Bond Updated')
                ->iconColor('success') 
                ->success()
                ->send(); 
            }
        }
    }
}
