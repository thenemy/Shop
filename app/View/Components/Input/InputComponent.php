<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class InputComponent extends Component
{
    public string $type;
    public string $name;
    public bool $defer;

    public function __construct($name, $type, $model, $key, $defer = true)
    {
        $this->name = $name;
        $this->type = $type;
        $this->attributes["wire:model"] = $model;
        $this->attributes['wire:key'] = $key;
        $this->defer = $defer;
    }

    public function render()
    {
        return view("components.helper.input.input_table");
    }

}
