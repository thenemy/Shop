<?php


namespace App\View\Helper\DropDown\Items;


class DoubleDropItemLivewire extends DropItemLivewire
{
    const FUNCTION_NAME = "updateModelSecond";

    public function __construct($id, string $name, string $class)
    {
        parent::__construct($id, $name, $class);
        $this->clicked = sprintf(self::FORMAT, self::FUNCTION_NAME, $id, $this->encodePath($class));
    }

    static public function create_text($id, string $name, string $class)
    {
        $obj = new DropItemLivewire($id, $name, $class);
        $obj->clicked = sprintf(self::FORMAT_TEXT, self::FUNCTION_NAME, $id, $obj->encodePath($class));
        return $obj;
    }
}
