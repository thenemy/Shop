<?php

namespace App\Domain\Core\File\Abstracts;

use App\Domain\Core\File\Exception\CreatedException;
use App\Domain\Core\File\Traits\FileManager;
use App\Domain\Core\Text\Traits\CaseConverter;

abstract class AbstractFileManager
{
    use FileManager, CaseConverter;

    public $classNameBlade;
    protected $pathMain;

    public function createFolderIfExists()
    {
        if (!$this->checkFolder()) {
            $this->createDirectory($this->pathMain);
            return;
        }
        throw new CreatedException();
    }

    public function checkFolder(): bool
    {
        return $this->checkFileExistence($this->pathMain);
    }

    abstract protected function setMainPath();

}
