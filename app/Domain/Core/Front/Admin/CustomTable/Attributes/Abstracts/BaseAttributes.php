<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts;

use App\Domain\Core\Front\Admin\CustomTable\Attributes\Interfaces\AttributeInterface;

abstract class BaseAttributes implements AttributeInterface
{
    public $key;
    public $type;
    public $entity;

    public function __construct($entity, $key)
    {
        $this->entity = $entity;
        $this->key = $key;
        $this->type = $this->getType();
    }
    public function getAttribute(){
        $key = $this->key;
        return $this->entity->$key;
    }
}