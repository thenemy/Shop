<?php


namespace App\View\Helper\DropDown\Models\Base;

abstract class AbstractDropDown
{
    public $name;
    public $key;
    public $type;
    public $items;

    public function __construct($items)
    {
        $this->items = $items;
        $this->type = $this->setType();
        $this->type = $this->setType();
        $this->type = $this->setType();
    }

    abstract function setType();

    abstract function setKey();

    abstract function setName();
}
