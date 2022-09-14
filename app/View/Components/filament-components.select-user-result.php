<?php

namespace App\View\Components;

use Illuminate\View\Component;

class filament-components.select-user-result extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.filament-components.select-user-result');
    }
}
