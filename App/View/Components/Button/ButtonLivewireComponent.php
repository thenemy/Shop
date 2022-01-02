<?php

namespace App\View\Components\Button;

use App\View\Components\Base\BaseComponent;

class ButtonLivewireComponent extends BaseComponent
{
    public string $click;
    public string $class;
    public string $type;

    public function __construct($slot, $click, $class, $type = "button")
    {
        parent::__construct($slot);
        $this->click = $click;
        $this->class = $class;
        $this->type = $type;
    }

    protected function getPathToComponent(): string
    {
        return "components.helper.button.base_button_livewire";
    }
}
