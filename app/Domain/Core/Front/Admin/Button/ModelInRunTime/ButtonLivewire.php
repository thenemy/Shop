<?php

namespace App\Domain\Core\Front\Admin\Button\ModelInRunTime;

use App\Domain\Core\Front\Admin\Button\BaseButton\BaseButton;
use App\View\Components\Button\ButtonLivewireComponent;

class ButtonLivewire extends BaseButton
{
    public string $click;
    public string $class;

    public function __construct($name, $click, $class)
    {
        parent::__construct($name);
        $this->click = $click;
        $this->class = $class;
    }

    public function generateHtml(): string
    {
        $button = new ButtonLivewireComponent($this->name, $this->click, $this->class);
        return $button->render()->with($button->data())->render();
    }
}
