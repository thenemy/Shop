<?php

namespace App\Domain\Core\File\Attribute;

use App\Domain\Core\File\Interfaces\LivewireComplexInterface;
use App\Domain\Core\File\Models\Livewire\FileLivewireFactoring;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Product\Product\Front\Admin\Attributes\KeyWithMultipleValueAttribute;
use App\Domain\Product\Product\Interfaces\ProductInterface;

abstract class BaseComplex extends Entity implements LivewireComplexInterface
{
    public array $create = [];
    public array $edit = [];
    public string $initialClass = "";
    public string $className;

    /**
     * create
     * edit
     * initialClass
     */
    public static function new()
    {
        $arg = func_get_args();
        $self = get_called_class();
        $object = new $self();
        $object->create = $arg[0] ?? [];
        $object->edit = $arg[1] ?? [];
        $object->initialClass = $arg[2] ?? "";
        $object->className = $arg[3] ?? $object->getDefaultClassName();
        return $object;
    }

    public function generateHtml(): string
    {
        return FileLivewireFactoring::generation($this->className,
            $this, [], $this->getTitle(),
            $this->create, $this->edit,
            $this->key(), $this->initialClass)->generateHtml();
    }

    abstract function getDefaultClassName(): string;

    abstract function getTitle(): string;

    abstract function key(): string;
}
