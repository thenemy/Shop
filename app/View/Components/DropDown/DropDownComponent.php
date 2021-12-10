<?php

namespace App\View\Components\DropDown;

use Illuminate\View\Component;

class DropDownComponent extends Component
{
    public $drop;

    public function __construct($drop, array $attributes = [])
    {
        $this->drop = $drop;
        $this->attributes = $attributes;
    }

    public function render()
    {
        return view("components.helper.drop_down.drop_down");
    }
}
