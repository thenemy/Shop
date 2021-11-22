<?php

namespace App\View\Components\Button;

use App\View\Components\Base\BaseComponent;

class ButtonLivewireComponent extends BaseComponent
{
    public string $clicked;
    public string $class;

    public function __construct($slot, $clicked, $class)
    {
        parent::__construct($slot);
        $this->clicked = $clicked;
        $this->class = $class;
    }

    protected function getPathToComponent(): string
    {
        return "components.helper.button.base_button_livewire";
    }
}
