<?php


namespace App\Domain\Core\Main\Services;

//use App\Banner\Banner;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Interfaces\ServiceInterface;
use App\Domain\Core\Main\Traits\ArrayHandle;
use App\Domain\Core\Main\Traits\FastInstantiation;
use App\Domain\Core\Main\Traits\FilterArray;
use App\Domain\Product\Product\Entities\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Nette\Schema\ValidationException;
use Symfony\Component\ErrorHandler\Error\FatalError;

abstract class BaseService implements ServiceInterface
{
    use FastInstantiation, FilterArray, ArrayHandle;

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
            throw  new ValidationException($collapsed->join(static::VALIDATE_SEPARATOR));
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
        $counter = self::COUNTER;
        if (isset($object_data['_new_created']))
            unset($object_data['_new_created']);
        for ($i = $start; !empty($object_data) && $counter; $i++) {
            $data = $this->popCondition($object_data, $i);

            if (!empty($data)) {
                $counter++;
                $data = array_merge($parent, $data);
                $this->createNew($data);
            }
            $counter--;
        }
        $this->exceptionOfCounter($counter, $object_data);
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
    public function createOrUpdateMany(array $object_data, array $parent, int $start = 1)
    {
        if (isset($object_data['_new_created']))
            unset($object_data['_new_created']);
        $counter = self::COUNTER;
        for ($i = $start; !empty($object_data) && $counter; $i++) {
            Log::info("CHECK");
            Log::info($object_data);

            $data = $this->popCondition($object_data, $i);
            if (isset($data["id"])) {
                $id = $data['id'];
                unset($data['id']);
                $object = $this->update($this->entity->find($id), $data);
                $this->afterCreateOrUpdateMany($object, $data, $parent, false);
                $counter++;
            } else if (!empty($data)) {
                $data = array_merge($parent, $data);
                $object = $this->createNew($data);
                $this->afterCreateOrUpdateMany($object, $data, $parent, true);
                $counter++;
            }
            $counter--;
        }
        $this->exceptionOfCounter($counter, $object_data);
    }

    private function exceptionOfCounter($counter, $object_data)
    {
        if (!$counter) {
            throw new \Exception(sprintf("Infinite loop counter ended. The called called class was %s .
             The value of object data rest %s. Value of counter %s",
                    get_called_class(),
                    $this->arrayToString($object_data),
                    $counter
                )
            );
        }
    }

    protected function afterCreateOrUpdateMany($object, $data, $parent, $create)
    {

    }

    protected
    function changeKey(&$object_array, $new, $old = 'params')
    {
        if (isset($object_array[$old])) {
            $object_array[$new] = $object_array[$old];
            unset($object_array[$old]);
        }
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
            if ($update_object = $object[$key]) {// check if relation exists
                return $this->update($update_object, $object_data);
            } else {
                return $this->createNew(array_merge($object_data, $addition));
            }
        }
    }

    public function validateCreateOrUpdate()
    {
        return [];
    }

    public function updateOrCreate(array $condition, array $data)
    {
        $this->validate($data, $this->validateCreateOrUpdate());
        return $this->entity::updateOrCreate($condition, $data);
    }

    public
    function createWith(array $object_data, array $additional)
    {
        return $this->createNew(array_merge($object_data, $additional));
    }

    protected function createNew(array $object_data)
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
     *
     * clean --- for cleaning null values
     * operator --- means -> sign
     *
     * write the cleaning code before the key
     * wrong keys
     * ->->somedata
     */
    public function popCondition(array  &$array, string $check_key,
                                 bool   $clean = false,
                                 string $operator = \CR::CR,
                                        $deleteSign = -1): array
    {
        try {
            $new_array = [];
            foreach ($array as $key => $value) {
                $key_value = explode($operator, $key);
                /**
                 * we are taking first element
                 * because we are putting key element at the last
                 */
                if (preg_match(sprintf("/^%s$/i", $check_key), $key_value[0])) {
                    unset($key_value[0]);
                    $this->filterPopKey($key_value, $deleteSign);
                    $this->connectPopKey($new_array, $operator, $key_value, $clean, $value);
                    unset($array[$key]);
                }
            }
            return $new_array;
        } catch (FatalError $exception) {

            dd(get_called_class());
        }
    }

    private function connectPopKey(&$new_array, $operator, $key_value, $clean, $value)
    {
        /**
         * we are connecting remained keys
         */
        $connect_rest = implode($operator, $key_value);
        if (!$clean || $value)
            $new_array[$connect_rest] = $value;

    }

    private function filterPopKey(&$key_value, $deleteSign)
    {
        if (isset($key_value[1])) {
            $key_value[1] = preg_replace("/[^\w]/", $deleteSign, $key_value[1]);
            /**
             * filtering the keys
             * there might be cases that by mistake key format will not appropriate
             * instead of check->something will be ->check->something or ->%check->something
             */
            if ($key_value[1] == $deleteSign || $key_value[1] == "") { // if there is nothing after remove the key
                unset($key_value[1]);
            }
        }
    }


    abstract public function getEntity(): Entity;

}
