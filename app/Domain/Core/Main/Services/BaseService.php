<?php


namespace App\Domain\Core\Main\Services;

//use App\Banner\Banner;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Interfaces\ServiceInterface;
use App\Domain\Core\Main\Traits\FastInstantiation;
use Illuminate\Support\Facades\Validator;
use Nette\Schema\ValidationException;

abstract class BaseService implements ServiceInterface
{
    use FastInstantiation;

    protected Entity $entity;

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

    private function validate(array $object_data, array $rules)
    {
        $validator = Validator::make(
            $object_data,
            $rules,
            $this->validationMessage()
        );
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $collapsed = collect($errors)->collapse();
            throw  new ValidationException($collapsed->join('<br>'));
        }

    }

    protected function validationMessage(): array
    {
        return [];
    }

    protected function validateCreateRules(): array
    {
        return $this->entity->getCreateRules();
    }

    protected function validateUpdateRules(): array
    {
        return $this->entity->getUpdateRules();
    }

    public function create(array $object_data)
    {
        $filtered = $this->filterRecursive($object_data);
        $this->validate($object_data, $this->validateCreateRules());
        return $this->entity->create($filtered);
    }

    public function update($object, array $object_data)
    {
        $filtered = $this->filterRecursive($object_data);
        $this->validate($object_data, $this->validateUpdateRules());
        $object->update($filtered);
        return $object;
    }

    protected function changeKey(&$object_array, $new, $old = 'params')
    {
        $object_array[$new] = $object_array[$old];
        unset($object_array[$old]);
    }

    public function filterRecursive(array $data, callable $filter = null): array
    {
        return array_filter($data, function ($item) use ($filter) {
            $item = is_array($item) ? $this->filterRecursive($item, $filter) : $item;
            return isset($filter) ? $filter($item) : isset($item) && !empty($item);
        });
    }

    /**
     * when popCondition used
     * order of inserting nested entities is important
     * namely,
     * given array %f =  [ 's->d->asd' => 'somedata' ]
     * so first $s =  popCondition($f , 's')
     * output $s [ 'd->asd'=> 'somedata']
     * then $d = popCondition($s , 'd')
     * output $d [ 'asd' => "somedata"]
     */
    public function popCondition(array &$array, string $check_key, bool $clean = false): array
    {
        $new_array = [];
        foreach ($array as $key => $value) {
            $key_value = explode(\CR::CR, $key);
            /**
             * we are taking first element
             * because we are putting key element at the last
             */
            if ($key_value[0] == $check_key) {
                /**
                 * we are connecting remainder keys
                 */
                $connect_rest = implode(\CR::CR, array_splice($key_value, 1));
                if (!$clean || $value)
                    $new_array[$connect_rest] = $value;
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
