<?php

namespace App\Domain\Core\File\Factory;

use App\Domain\Core\File\Interfaces\CreatorInterface;

use App\Domain\Core\File\Models\Main\FileBladeCreatorCreate;
use App\Domain\Core\File\Models\Main\FileBladeCreatorEdit;
use App\Domain\Core\File\Models\Main\FileBladeCreatorIndex;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Traits\FastInstantiation;

abstract class  MainFactoryCreator implements CreatorInterface
{
    use FastInstantiation;

    protected Entity $entity;

    private function __construct()
    {
        $this->entity = self::newClass($this->getEntityClass());
    }

    static public function createFiles()
    {
        $called = get_called_class();
        $class = new $called();
        $class->createIndex();
        $class->createEdit();
        $class->createCreate();
    }

    protected function createIndex()
    {
        $this->create($this->getIndexEntity(), $this->getIndexBladeCreator());
    }

    protected function getIndexBladeCreator(): string
    {
        return FileBladeCreatorIndex::class;
    }

    protected function getEditBladeCreator(): string
    {
        return FileBladeCreatorEdit::class;
    }

    protected function getCreateBladeCreator(): string
    {
        return FileBladeCreatorCreate::class;
    }

    protected function createEdit()
    {
        $this->create($this->getEditEntity(), $this->getEditBladeCreator());
    }

    protected function createCreate()
    {
        $this->create($this->getCreateEntity(), $this->getCreateBladeCreator());
    }

    protected function create(string $getMethodEntity, string $getBladeEntity)
    {
        if ($getMethodEntity) {
            $entity_method = self::newClass($getMethodEntity);
            self::newClass(
                $getBladeEntity,
                $this->entity->class_name,
                $entity_method->generateAttributes(),
                $entity_method
            );
        }
    }
}
