<?php

namespace App\View\Components\Button;

use App\View\Components\Base\BaseComponent;

class ButtonLivewireComponent extends BaseComponent
{
    public string $click;
    public string $class;

    public function __construct($slot, $click, $class)
    {
        parent::__construct($slot);
        $this->click = $click;
        $this->class = $class;
    }

    protected function getPathToComponent(): string
    {
        return "components.helper.button.base_button_livewire";
    }
}
