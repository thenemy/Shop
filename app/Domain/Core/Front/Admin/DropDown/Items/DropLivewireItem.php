<?php

namespace App\Domain\Core\Front\Admin\DropDown\Items;

class DropLivewireItem extends DropItem
{
    public $clicked;
    public $classes;

    public function __construct($id, $name, $clicked, $classes = "")
    {
        parent::__construct($id, $name);
        $this->clicked = $clicked;
        $this->classes = $classes;
    }

}
