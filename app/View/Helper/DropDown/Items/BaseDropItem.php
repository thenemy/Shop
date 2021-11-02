<?php


namespace App\View\Helper\DropDown\Items;


abstract class BaseDropItem
{
    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    abstract public function setName();

    abstract public function setKey();

    abstract public function setType();

    abstract public function setItems();

}
