<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TravelOrder extends Component
{
    public function render()
    {
        return view('livewire.travel-order')->layout('layouts.app');
    }
}
