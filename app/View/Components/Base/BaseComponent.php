<?php

namespace App\View\Components\Base;


use Illuminate\View\Component;

abstract class BaseComponent extends Component
{

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
        return view($this->getPathToComponent());
    }

    abstract protected function getPathToComponent();
}
