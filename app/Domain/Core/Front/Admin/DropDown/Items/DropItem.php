<?php


namespace App\View\Helper\DropDown\Items;


use App\View\Helper\DropDown\Interfaces\DropItemInterfaces;

class DropItem extends AbstractDropItem implements DropItemInterfaces
{
    public function __construct($id, $name)
    {
        parent::__construct($id, $name);
    }


    function setType()
    {

    }

    public function getFormat(): string
    {
       return self::FORMAT;
    }
}
