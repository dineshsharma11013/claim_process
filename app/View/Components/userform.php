<?php

namespace App\View\Components;

use Illuminate\View\Component;

class userform extends Component
{
    public $file;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($file, $title)
    {
        $this->file=$file;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.userform');
    }
}
