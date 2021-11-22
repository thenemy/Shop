<?php

namespace App\Domain\Core\Front\Admin\DropDown\Abstracts;

use App\Domain\Core\Front\Admin\DropDown\Interfaces\DropDownInterface;
use App\Domain\Core\Front\Admin\DropDown\Interfaces\DropDownMainInterface;

abstract class AbstractDropDown implements DropDownInterface, DropDownMainInterface
{
    public $name;
    public $key;
    public $type;
    public $items;

    public function __construct(array $items, $name = null)
    {
        $this->items = $items;
        $this->key = $this->setKey();
        $this->type = $this->setType();
        $this->name = $name ?? $this->setName();
    }


}
