<?php

namespace App\Domain\Core\Front\Admin\DropDown\Abstracts;

use App\Domain\Core\Front\Admin\Attributes\Interfaces\AttributeFormInterface;
use App\Domain\Core\Front\Admin\DropDown\Interfaces\DropDownInterface;
use App\Domain\Core\Front\Admin\DropDown\Interfaces\DropDownMainInterface;
use App\Domain\Core\Front\Admin\Livewire\Functions\Traits\FunctionGenerate;

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
