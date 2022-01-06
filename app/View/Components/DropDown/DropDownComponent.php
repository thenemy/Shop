<?php

namespace App\View\Components\DropDown;

use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;

class DropDownComponent extends Component
{
    public $drop;

    public function __construct($drop, array $attributes = [])
    {
        $this->drop = $drop;
        $this->attributes = new ComponentAttributeBag($attributes) ;
        }

    public function render()
    {
        return view("components.helper.drop_down.drop_down_component");
    }
}
