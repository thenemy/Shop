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
    }

    protected function createIndex()
    {
        $entity_index = self::newClass($this->getIndexEntity());

        self::newClass($this->getIndexBladeCreator(),
            $this->entity->class_name,
            $entity_index->generateAttributes(),
            $entity_index
        );
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
        $entity_edit = self::newClass($this->getEditEntity());
        self::newClass(
            $this->getEditBladeCreator(),
            $this->entity->class_name,
            $entity_edit->generateAttributes(),
            $entity_edit
        );
    }

}
