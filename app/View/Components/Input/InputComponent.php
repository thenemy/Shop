<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class InputComponent extends Component
{
    public string $type;
    public string $name;

    public function __construct($name, $type, $model, $key)
    {
        $this->name = $name;
        $this->type = $type;
        $this->attributes["wire:model"] = $model;
        $this->attributes['wire:key'] = $key;
    }

    public function render()
    {
        return view("components.helper.input.input_table");
    }

}
