<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class InputComponent extends Component
{
    public string $type;
    public string $name;
    public ?bool $defer;
    public ?string $filter;

    public function __construct($name, $type, $model, $key, $defer=false, $filter = "")
    {
        $this->name = $name;
        $this->type = $type;
        $this->attributes["wire:model"] = $model;
        $this->attributes['wire:key'] = $key;
        $this->defer = $defer;
        $this->filter = $filter;
    }

    public function render()
    {
        return view("components.helper.input.input_table");
    }

}
