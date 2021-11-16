<?php


namespace App\View\Helper\DropDown\Items;


use App\View\Helper\DropDown\Interfaces\DropItemInterfaces;

class DoubleDropItemLivewire extends DropItemLivewire implements DropItemInterfaces
{
    const FUNCTION_NAME_SECOND = "updateModelSecond";

    public function __construct($id, string $name, string $class)
    {
        parent::__construct($id, $name, $class);
        $this->setPathToClicked($id, $this->encodePath($class));
    }

    public function setPathToClicked(...$value): string
    {
        parent::setPathToClicked($value);
        return self::FUNCTION_NAME;
    }

    static public function create_text($id, string $name, string $class): DropItemLivewire
    {
        $obj = new DropItemLivewire($id, $name, $class);
        $obj->setPathToClicked($id, $obj->encodePath($class));
        return $obj;
    }
}
