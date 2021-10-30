<?php


namespace App\View\Helper\DropDown\Items;


class DropItem
{
    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

}
