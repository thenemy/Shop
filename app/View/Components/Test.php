<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Test extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $slot;

    public function __construct($slot)
    {
        $this->slot = $slot;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.helper.text.pre_title');
    }
}
