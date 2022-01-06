<?php


namespace App\View\Components\Status;


use App\View\Components\Base\BaseComponent;

class StatusComponent extends BaseComponent
{
    public string $color;
    public string $click;

    public function __construct($status, $click)
    {
        $this->click = $click;
        if ($status) {
            $this->color = "green";
            parent::__construct(__("Активен"));
        } else {
            $this->color = "red";
            parent::__construct("Не активен");
        }
    }

    protected function getPathToComponent(): string
    {
        return "components.helper.status.base_status";
    }
}
