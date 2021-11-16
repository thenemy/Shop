<?php


namespace App\View\Helper\DropDown\Items;


use App\View\Helper\DropDown\Interfaces\DropItemInterfaces;

abstract class AbstractDropItem implements DropItemInterfaces
{
    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }


}
