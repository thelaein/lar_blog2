<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $inputLabel,$name,$value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($inputLabel,$name,$value)
    {
        $this->name = $name;
        $this->inputLabel = $inputLabel;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
