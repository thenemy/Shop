<?php

namespace App\Domain\Core\Front\Admin\DropDown\Items;

class DropLivewireItem extends DropItem
{
    public $clicked;

    public function __construct($id, $name, $clicked)
    {
        parent::__construct($id, $name);
        $this->clicked = $clicked;
    }

}
