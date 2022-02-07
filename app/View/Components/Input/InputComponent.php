<?php

namespace App\View\Components\Input;

use App\Domain\Core\Front\Admin\Button\Traits\GenerateTagAttributes;
use App\Domain\Core\Front\Admin\Form\Traits\AttributeGetVariable;
use App\Domain\Core\Main\Traits\ArrayAppend;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;

class InputComponent extends Component
{
    use ArrayAppend;

    public string $type;
    public string $name;
    public ?bool $defer;
    public ?string $filter;

    public function __construct($name, $type, $model, $key, $defer = false, $filter = "", $attributes = [])
    {
        $this->name = $name;
        $this->type = $type;
        $this->defer = $defer;
        $this->filter = $filter;
        $this->attributes = new ComponentAttributeBag($attributes);
        if ($this->defer)
            $this->attributes["wire:model.defer"] = $model;
        else
            $this->attributes['wire:model'] = $model;
        $this->attributes['wire:key'] = $key;
    }

    public function render()
    {
        return view("components.helper.input.input_table");
    }

}
