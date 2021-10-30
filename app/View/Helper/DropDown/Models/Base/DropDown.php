<?php


namespace App\View\Helper\DropDown\Models\Base;


class DropDown
{
    public $name;
    public $items;
    public $key;
    public $type;

    public function __construct(string $name, string $key, string $type, array $items)
    {
        $this->name = $name;
        $this->key = $key;
        $this->items = $items;
        $this->type = $type;
    }
}
