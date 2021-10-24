<?php


namespace App\Domain\Core\Main\Services;

//use App\Banner\Banner;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Interfaces\ServiceInterface;

class BaseService implements ServiceInterface
{
    protected $entity;

    public function __construct($entity){
        $this->entity=$entity;
    }
    public function create(array $object_data){
        return $this->entity->create($object_data);
    }

    public function update($object, array $object_data){
        $object->update($object_data);
        return $object;
    }
    public function destroy($object):bool
    {
        return $object->delete();
    }
}
