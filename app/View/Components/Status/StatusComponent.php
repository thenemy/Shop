<?php


namespace App\View\Components\Status;


use App\View\Components\Base\BaseComponent;

class StatusComponent extends BaseComponent
{
    public function __construct($slot, $color)
    {
        parent::__construct($slot);
    }

    protected function getPathToComponent(): string
    {
        return "components.helper.status.status";
    }
}
