<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts;

use App\Domain\Core\Front\Admin\CustomTable\Attributes\Interfaces\AttributeInterface;

abstract class BaseAttributes implements AttributeInterface
{
    public $key;
    public $entity;

    public function __construct($entity, $key)
    {
        $this->entity = $entity;
        $this->key = $key;
    }

    public function getValue()
    {
        $key = $this->key;
        return $this->entity->$key;
    }

    static public function preGenerate($entity, $key): string
    {

        $class = get_called_class();
        $object = new $class($entity, $key);
        return $object->generateHtml();
    }

}
