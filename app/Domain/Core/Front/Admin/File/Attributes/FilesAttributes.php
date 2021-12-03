<?php

namespace App\Domain\Core\Front\Admin\File\Attributes;

use App\Domain\Core\Front\Admin\File\Base\BaseFileAttribute;
use App\Domain\Core\Front\Admin\File\Interfaces\FileInterface;
use App\Domain\Core\Main\Traits\FastInstantiation;

/**
 *   this type of attributes will be in mutators
 *  so this is differnce between Custom Table Attributes , and Form Attributes
 *
 * CustomTable attributes mutating only for table
 * File attributes responsable for downloading , and uploading file
 * Form attributes create visual elements
 */
class FilesAttributes extends BaseFileAttribute
{
    use FastInstantiation;

    public $childEntityClass;
    public $associateKey;
    public $storeKey;

    /**
     * @params  $entity --- parent entity who will be associated by $childEntity
     *          $childEntityClass --- class for $childEntity
     *          $storeKey --- child entity key to store the file
     *          $id --- unique id for blade --very important
     *          $associateKey --- property to be associated
     **/
    public function __construct($entity, $key, string $id, $childEntityClass, $storeKey, $associateKey)
    {
        parent::__construct($entity, $key, $id);
        $this->childEntityClass = $childEntityClass;
        $this->associateKey = $associateKey;
        $this->storeKey = $storeKey;
    }

    public function upload($inputs)
    {
        $key = $this->storeKey;
        $associate = $this->associateKey;
        foreach ($inputs as $input) {
            $new_entity = self::newClass($this->childEntityClass);
            $new_entity->$key = $input;
            $new_entity->$associate = $this->entity->id;
            $new_entity->save();
        }
    }

    public function delete($id)
    {
        $this->childEntityClass::find($id)->delete();
    }

    public function validate($class)
    {

    }

    public function show(): array
    {
        $key = $this->storeKey;
        return $this->entity->$key;
    }
}
