<?php

namespace App\Domain\Core\Front\Admin\CustomTable\Traits;

use App\Domain\Core\File\Models\Livewire\FileLivewireDynamic;
use App\Domain\Core\File\Models\Livewire\FileLivewireDynamicWithoutEntity;

trait TableDynamicWithoutEntity
{
    use InputDynamicGeneration, FrontDynamicGeneration;

    /**
     * decide whether just to show entity or edit it
     */


    public function getInputsDecision($name, $decide)
    {
        if ($decide) {
            return $this->getInputs($name);
        } else {
            return $this->getFrontAttributes($name);
        }
    }


    /**
     * additional actions for table insert update delete and etc
     */
    public function getAddingCustomActions(): array
    {
        return [];
    }

    /**
     * title for opening container
     **/
    abstract public function getTitle(): string;


    public static function getDynamic($className): FileLivewireDynamicWithoutEntity
    {
        $class = get_called_class();
        return new FileLivewireDynamicWithoutEntity(
            $className,
            new $class(),
        );
    }

}
