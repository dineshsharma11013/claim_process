<?php

namespace App\View\Components;

use Illuminate\View\Component;

class button extends Component
{
    public $value;
    public $form;
    public $btnId;
    public $path;
    public $btnClass;
    public $method;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value, $form, $btnId, $path, $btnClass, $method="")
    {
        $this->value = $value;
        $this->form = $form;
        $this->btnId = $btnId;
        $this->path = $path;
        $this->btnClass = $btnClass;
        $this->method = $method;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
