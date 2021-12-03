<?php


namespace App\Domain\Core\Main\Services;

//use App\Banner\Banner;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Interfaces\ServiceInterface;
use App\Domain\Core\Main\Traits\FastInstantiation;

abstract class BaseService implements ServiceInterface
{
    use FastInstantiation;

    protected $entity;

    public function __construct()
    {
        $this->entity = $this->getEntity();
    }

    static public function new()
    {
        $self = get_called_class();
        return new $self();
    }

    abstract public function getEntity(): Entity;

    public function create(array $object_data)
    {

        return $this->entity->create($object_data);
    }

    public function update($object, array $object_data)
    {
        $object->update($object_data);
        return $object;
    }

    public function popCondition(array &$array, string $check_key): array
    {
        $new_array = [];
        foreach ($array as $key => $value) {
            $key_value = explode("_", $key);
            if (end($key_value) == $check_key) {
                $new_array[$key_value[0]] = $value;
                unset($array[$key]);
            }
        }
        return $new_array;
    }

    public function destroy($object): bool
    {
        return $object->delete();
    }
}
