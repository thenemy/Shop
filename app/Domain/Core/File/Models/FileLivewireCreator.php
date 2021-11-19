<?php

namespace App\Domain\Core\File\Models;

use App\Domain\Core\File\Abstracts\AbstractFileManager;
use App\Domain\Core\File\Interfaces\LivewireCreatorInterface;
use App\Domain\Core\File\Traits\FileManager;
use App\Domain\Core\Text\Traits\CaseConverter;
use App\Http\Controllers\Base\Abstracts\BaseController;

// pass additional actions through constructor
// could pass entity
class FileLivewireCreator extends AbstractFileManager implements LivewireCreatorInterface
{
    protected $pathMainClass;
    protected $className;
    protected $controller;

    public function __construct($className, BaseController $controller)
    {
        $this->className = $className;
        $this->controller = $controller;
        $this->classNameBlade = $this->toLivewireCase($className);
        $this->openIndex();
    }

    public function generateLivewire(): string
    {
        return sprintf("<livewire:admin.pages.%s.%s/>", $this->classNameBlade, $this->getBladeName());
    }
    // implement this function
    //to livewire class
    private function getFunctions(): string
    {
        return "";
    }

    // to blade in livewire
    private function getFunctionComponents(): string
    {
        return "";
    }

    public function openIndex()
    {
        $this->openIndexBlade();
        $this->openIndexClass();
    }

    protected function getTableClass(): string
    {
        return $this->controller->getTableClass();
    }

    protected function getEntityClass(): string
    {
        return $this->controller->getEntityClass();
    }

    protected function openIndexBlade()
    {
        try {
            $this->setMainPath();
            $this->createFolderIfExists();
            $this->createIndexBlade();
        } catch (\Exception $exception) {

        }
    }

    private function getBladePath(): string
    {
        return "livewire.admin." . $this->classNameBlade . "." . $this->getBladeName();
    }


    private function getBladeName(): string
    {
        return $this->toLivewireCase($this->getLivewireClassName());
    }

    private function getNamespace(): string
    {
        return self::BASE_CLASS . $this->className;
    }

    private function getLivewireClassName(): string
    {
        return $this->className . self::INDEX;
    }

    protected function openIndexClass()
    {
        try {
            $this->setMainPathClass();
            $this->createFolderIfExists();
            $this->createIndexClass();
        } catch (\Exception $exception) {

        }
    }

    private function createIndexClass()
    {
        $file_to = $this->pathMain . $this->getLivewireClassName();
        $file_from = file_get_contents(self::FROM_CLASS);
        $formatted_data = $this->formatClass($file_from);
        file_put_contents($file_to, $formatted_data);
    }

    private function createIndexBlade()
    {
        $file_to = $this->pathMain . $this->getBladeName();
        $file_from = file_get_contents(self::FROM_BLADE);
        $formatted_data = $this->formatBlade($file_from);
        file_put_contents($file_to, $formatted_data);
    }

    private function formatClass($file_from): string
    {
        return sprintf($file_from,
            $this->getNamespace(),
            $this->getLivewireClassName(),
            $this->getBladePath(),
            $this->getTableClass(),
            $this->getEntityClass(),
            $this->getFunctions()
        );
    }

    private function formatBlade($file_from): string
    {
        return sprintf($file_from,
            $this->getFunctionComponents()
        );
    }

    protected function setMainPathClass()
    {
        $this->pathMain = self::TO_CLASS . $this->className . "/";
    }

    protected function setMainPath()
    {
        $this->pathMain = self::TO_BLADE . $this->classNameBlade . "/";
    }
}
