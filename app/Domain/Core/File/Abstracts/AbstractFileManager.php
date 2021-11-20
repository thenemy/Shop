<?php

namespace App\Domain\Core\File\Abstracts;

use App\Domain\Core\File\Exception\CreatedException;
use App\Domain\Core\File\Traits\FileManager;
use App\Domain\Core\Text\Traits\CaseConverter;
use Illuminate\Support\Facades\Log;

abstract class AbstractFileManager
{
    use FileManager, CaseConverter;

    public $classNameBlade;
    protected $pathMain;

    public function createFolderIfExists()
    {
        Log::info("THERE IS PATH" . $this->pathMain);
        $this->createDirectory($this->pathMain);
    }

    public function checkFolder(): bool
    {
        return $this->checkFileExistence($this->pathMain);
    }

    public
    function getContents($path)
    {
        return file_get_contents("../" . $path);
    }

    public
    function putContents($path, ...$variables)
    {
        return file_put_contents("../" . $path, ...$variables);
    }

    abstract protected function setMainPath();

}
