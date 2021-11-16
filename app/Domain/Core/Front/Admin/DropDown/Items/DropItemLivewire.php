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
    public $format;
    public $function;

    public function __construct($id, string $name, string $class) // nothing in the constructor // 4 abstract methods for name key type items
    {
        $this->id = $id;
        $this->name = $name;
        $this->setPathToClicked($id, $this->encodePath($class));
    }

    public function setPathToClicked(...$value): string
    {
        $this->clicked = sprintf($this->getFormat(), $this->getFunction(), ...$value);
    }

    static public function create_text($id, string $name, string $class): DropItemLivewire
    {
        $obj = new DropItemLivewire($id, $name, $class);
        $obj->setPathToClicked($id, $obj->encodePath($class));
        return $obj;
    }


    public function getFormat(): string
    {
        // TODO: Implement getFormat() method.
    }

    public function getFunction(): string
    {
        // TODO: Implement getFunction() method.
    }
}
