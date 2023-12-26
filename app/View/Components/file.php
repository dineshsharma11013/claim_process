<?php

namespace App\View\Components;

use Illuminate\View\Component;

class file extends Component
{
    public $label;
    public $name;
    public $placeholder;
    public $value;
    public $comp;
    public $colMd;
    public $accept;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $placeholder="", $value="", $comp="", $colMd="", $accept="")
    {
        $this->label = $label;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->comp = $comp;
        $this->colMd = $colMd;
        $this->accept = $accept;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.file');
    }
}
