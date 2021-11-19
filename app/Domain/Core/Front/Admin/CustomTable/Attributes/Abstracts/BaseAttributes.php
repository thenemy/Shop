<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts;

use App\Domain\Core\Front\Admin\CustomTable\Attributes\Interfaces\AttributeInterface;

abstract class BaseAttributes implements AttributeInterface
{
    static protected $object;
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
        if (!self::$object) {
            $class = get_called_class();
            self::$object = new $class($entity, $key);
        }
        return self::$object->generateHtml();
    }

}
