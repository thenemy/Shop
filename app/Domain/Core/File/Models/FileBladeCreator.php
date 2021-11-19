<?php

namespace App\Domain\Core\File\Models;

use App\Domain\Core\File\Abstracts\AbstractFileManager;
use App\Domain\Core\File\Exception\CreatedException;
use App\Domain\Core\File\Interfaces\BladeCreatorInterface;
use App\Domain\Core\File\Traits\FileManager;
use App\Domain\Core\Text\Traits\CaseConverter;

class FileBladeCreator extends AbstractFileManager implements BladeCreatorInterface
{
    private $livewireCreator;

    public function __construct($className, FileLivewireCreator $livewireCreator)
    {
        $this->livewireCreator = $livewireCreator;
        $this->classNameBlade = $this->toSnackCase($className);
        $this->setMainPath();
        try {
            $this->createFolderIfExists();
            $this->openIndex();
            $this->openCreate();
            $this->openEdit();
        } catch (CreatedException $exception) {

        }
    }

    protected function setMainPath()
    {
        $this->pathMain = self::TO . $this->classNameBlade . "/";
    }


    public function openIndex()
    {
        $index = $this->pathMain . self::INDEX;
        $file_from = file_get_contents(self::FROM_INDEX);
        // put correct formatted livewire inside the blade
        $formatted_index = $this->formatIndex($file_from);
        file_put_contents($index, $formatted_index);
    }

    private function formatIndex($file_from): string
    {
        return sprintf($file_from,
            $this->livewireCreator,
        );
    }

    public function openCreate()
    {
        $create = $this->pathMain . self::CREATE;
        $file_from = file_get_contents(self::FROM_CREATE);
    }

    public function openEdit()
    {
        $edit = $this->pathMain . self::EDIT;
        $data = file_get_contents(self::FROM_EDIT);
    }


}
