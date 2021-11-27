<?php

namespace App\View\Components\Actions;

use App\View\Components\Base\BaseComponent;

class BlueOpen extends  BaseComponent
{
    public string $href;

    public function __construct($slot, $href)
    {
        parent::__construct($slot);
        $this->href = $href;
    }

    protected function getPathToComponent(): string
    {
        return "components.helper.button.blue_open_button";
    }
}
