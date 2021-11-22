<?php

namespace App\Domain\Core\Front\Admin\Button\ModelInRunTime;

use App\Domain\Core\Front\Admin\Button\BaseButton\BaseButton;
use App\View\Components\Button\ButtonLivewireComponent;

class ButtonLivewire extends BaseButton
{
    public string $clicked;
    public string $class;

    public function __construct($name, $clicked, $class)
    {
        parent::__construct($name);
        $this->clicked = $clicked;
        $this->class = $class;
    }

    public function generateHtml():string
    {
        $button = new ButtonLivewireComponent($this->name, $this->clicked, $this->class);
        return $button->render()->with($button->data());
    }
}
