<?php


namespace App\Domain\Core\Main\Services;

//use App\Banner\Banner;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Interfaces\ServiceInterface;
use App\Domain\Core\Main\Traits\FastInstantiation;
use App\Domain\Core\Main\Traits\FilterArray;
use App\Domain\Product\Product\Entities\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Nette\Schema\ValidationException;

abstract class BaseService implements ServiceInterface
{
    use FastInstantiation, FilterArray;

    const VALIDATE_SEPARATOR = "<br>";
    protected Entity $entity;

    public function __construct()
    {

        $this->entity = $this->getEntity();
    }

    public function bulkInsertion($object_data, $start = 0, $number = 600)
    {
        try {
            DB::beginTransaction();
            for ($i = $start + 1; !empty($data = array_slice($object_data, $start, $number * $i)), $i++;) {
                if (empty($data)) {
                    break;
                }
                $this->insertOrIgnore($data);
                $start = $i * $number;
            }
            DB::commit();
            return true;
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw  $exception;
        }
    }

    static public function new()
    {
        $self = get_called_class();
        return new $self();
    }

    public function insertOrIgnore(array $object_data)
    {
        $this->entity->insertOrIgnore($object_data);
    }

    protected
    function validate(array $object_data, array $rules)
    {
        $validator = Validator::make(
            $object_data,
            $rules,
            $this->validationMessage()
        );
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            $collapsed = collect($errors)->collapse();
            throw  new ValidationException($collapsed->join(self::VALIDATE_SEPARATOR));
        }

    }

    protected
    function validationMessage(): array
    {

        return [];
    }

    protected
    function validateCreateRules(): array
    {
        return $this->entity->getCreateRules();
    }

    protected
    function validateUpdateRules(): array
    {
        return $this->entity->getUpdateRules();
    }

    public
    function createMany(array $object_data, array $parent, int $start = 1)
    {
        for ($i = $start; !empty($object_data); $i++) {
            $data = $this->popCondition($object_data, $i);
            if (!empty($data)) {
                $data = array_merge($parent, $data);
                $this->createNew($data);
            }
        }
    }

    protected function toggleCheckBoxObject(array $object_data, $parent_object, string $class, $parent_key)
    {
        $create_object = false;
        $object = $class::where($parent_key, "=", $parent_object->id);
        $exists = $object->exists();
        if (array_key_exists("checked", $object_data) && !$exists) {
            $create_object = true;
        } else if (!array_key_exists("checked", $object_data) && $exists) {
            $object->delete();
        }
        if ($create_object)
            $class::create([$parent_key => $parent_object->id]);
    }

// there is many , when I will use key in entity it will give many items
    public
    function createOrUpdateMany(array $object_data, array $parent, int $start = 1)
    {
        for ($i = $start; !empty($object_data); $i++) {
            $data = $this->popCondition($object_data, $i);
            if (isset($data["id"])) {
                $id = $data['id'];
                unset($data['id']);
                $this->update($this->entity->find($id), $data);
            } else {
                if (!empty($data)) {
                    $data = array_merge($parent, $data);
                    $this->createNew($data);
                }
            }
        }
    }

    protected
    function changeKey(&$object_array, $new, $old = 'params')
    {
        $object_array[$new] = $object_array[$old];
        unset($object_array[$old]);
    }


    public
    function createIfExists(array $object_data, array $addition = [])
    {
        $filtered = $this->filterRecursive($object_data);
        if (!empty($filtered)) {
            return $this->createNew(array_merge($object_data, $addition));
        }
    }

    public
    function createOrUpdate($object, $key, array $object_data, array $addition = [])
    {
        if (!empty($object_data)) {
            if ($update_object = $object[$key]) {
                return $this->update($update_object, $object_data);
            } else {
                return $this->createNew(array_merge($object_data, $addition));
            }
        }
    }

    public
    function createWith(array $object_data, array $additional)
    {
        return $this->createNew(array_merge($object_data, $additional));
    }

    private function createNew(array $object_data)
    {
        $filtered = $this->filterRecursive($object_data);
        $this->validate($filtered, $this->validateCreateRules());
        return $this->entity->create($filtered);
    }

    public
    function create(array $object_data)
    {
        return $this->createNew($object_data);
    }

    public
    function update($object, array $object_data)
    {

        $filtered = $this->filterRecursive($object_data);
        if (!empty($filtered)) {
//            $this->validate($object_data, $this->validateUpdateRules());
            $object->update($filtered);
        }
        return $object;
    }

    public
    function destroy($object): bool
    {
        return $object->delete();
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
    public
    function popCondition(array &$array, string $check_key, bool $clean = false): array
    {
        $new_array = [];
        foreach ($array as $key => $value) {
            $key_value = explode(\CR::CR, $key);
            /**
             * we are taking first element
             * because we are putting key element at the last
             */
            if (preg_match(sprintf("/^%s$/i", $check_key), $key_value[0])) {
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


    abstract public function getEntity(): Entity;

}
