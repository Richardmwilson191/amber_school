<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $propName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($propName)
    {
        $this->propName = $propName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
