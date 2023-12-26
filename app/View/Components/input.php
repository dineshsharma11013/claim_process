<?php

namespace App\View\Components;

use Illuminate\View\Component;

class input extends Component
{
    public $label;
    public $type;
    public $name;
    public $placeholder;
    public $value;
    public $comp;
    public $colMd;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $type, $name, $placeholder="", $value="", $comp="", $colMd="")
    {
        $this->label = $label;
        $this->type = $type;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->comp = $comp;
        $this->colMd = $colMd;
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
