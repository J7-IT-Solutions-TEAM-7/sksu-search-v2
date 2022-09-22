<?php

namespace App\Http\Livewire\UserProfile;

use App\Models\Employee_information;
use App\Models\User;
use Filament\Notifications\Notification;
use Livewire\Component;

class UpdateInformation extends Component
{
    public $user;
    public $full_name;
    public $first_name;
    public $last_name;
    public $address;
    public $birthday;
    public $contact_number;

    
    public function render()
    {
        $this->user = Employee_information::where('user_id', auth()->user()->id)->first();
        $this->full_name = $this->user->full_name;
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->address = $this->user->address;
        $this->birthday = $this->user->birthday;
        $this->contact_number = $this->user->contact_number;
        return view('livewire.user-profile.update-information');
    }

    public function submit(){
        $id = auth()->user()->id;
        $this->validate([
            'full_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
        ],[
            'full_name.required' => 'Please Enter Full Name',
            'first_name.required' => 'Please Enter First Name',
            'last_name.required' => 'Please Enter Last Name',
        ]);

        $update_emp = Employee_information::find($id)->update([
            'full_name'=>$this->full_name,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'address'=>$this->address,
            'birthday'=>$this->birthday,
            'contact_number'=>$this->contact_number,
        ]);

        $update_user = User::find($id)->update([
            'name'=>$this->full_name,
        ]);



        if($update_emp && $update_user)
        {
            Notification::make() 
            ->title('Profile Information Saved')
            ->iconColor('success') 
            ->success()
            ->send(); 
        }
    }
}
