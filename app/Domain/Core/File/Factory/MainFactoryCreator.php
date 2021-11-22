<?php

namespace App\Domain\Core\File\Factory;

use App\Domain\Core\File\Interfaces\CreatorInterface;
use App\Domain\Core\File\Models\FileBladeCreatorEdit;
use App\Domain\Core\File\Models\FileBladeCreatorIndex;
use App\Domain\Core\File\Models\FileLivewireCreator;
use App\Domain\Core\File\Models\FileLivewireNested;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Traits\FastInstantiation;

abstract class MainFactoryCreator implements CreatorInterface
{
    use FastInstantiation;

    private Entity $entity;

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
        $createLivewire = new FileLivewireCreator($this->entity->class_name, $entity_index);
        new FileBladeCreatorIndex(
            $this->entity->class_name,
            BladeGenerator::generation([$createLivewire]),
            $entity_index
        );
    }

    protected function createEdit()
    {
        $entity_edit = self::newClass($this->getEditEntity());
        new FileBladeCreatorEdit(
            $this->entity->class_name,
            $entity_edit->formAttributes(),
            $entity_edit
        );
    }

}
