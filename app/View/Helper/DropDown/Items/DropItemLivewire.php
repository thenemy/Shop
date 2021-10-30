<?php


namespace App\View\Helper\DropDown\Items;

use App\View\Helper\DropDown\Interfaces\DropItemInterfaces;
use App\View\Helper\PATH\Traits\PathHandler;

class DropItemLivewire implements DropItemInterfaces
{
    use PathHandler;

    const FUNCTION_NAME = "updateModel";
    public $name;
    public $clicked;
    public $id;

    public function __construct($id, string $name, string $class)
    {
        $this->name = $name;
        $this->clicked = sprintf(self::FORMAT, self::FUNCTION_NAME, $id, $this->encodePath($class));
        $this->id = $id;
    }

    static public function create_text($id, string $name, string $class)
    {
        $obj = new DropItemLivewire($id, $name, $class);
        $obj->clicked = sprintf(self::FORMAT_TEXT, $obj::FUNCTION_NAME, $id, $obj->encodePath($class));
        return $obj;
    }
}
