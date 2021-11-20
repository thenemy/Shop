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
    private $entity;

    public function __construct($className, BaseController $controller, $entity)
    {
        $this->className = $className;
        $this->entity = $entity;
        $this->controller = $controller;
        $this->classNameBlade = $this->toLivewireCase($className);
        $this->openIndex();
    }

    public function generateLivewire(): string
    {
        return sprintf("<livewire:admin.pages.%s.%s/>", $this->classNameBlade, $this->getBladeName());
    }

    public function initializeVariables(): string
    {
        return $this->entity->livewireComponents()->initializeVariables();
    }
    // implement this function
    //to livewire class
    private function getFunctions(): string
    {
        return $this->entity->livewireComponents()->generateFunctions();
    }

    // to blade in livewire
    private function getFunctionComponents(): string
    {
        return $this->entity->livewireComponents()->generateBlades();
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
        return $this->controller->getIndexEntity();
    }

    protected function openIndexBlade()
    {
        $this->setMainPath();
        $this->createFolderIfExists();
        $this->createIndexBlade();
    }

    private function getBladePath(): string
    {
        return "livewire.admin.pages." . $this->classNameBlade . "." . $this->getBladeName();
    }


    private function getBladeName(): string
    {
        return $this->toLivewireCase($this->getLivewireClassName());
    }

    private function getNamespace(): string
    {
        return str_replace("/", "\\", self::BASE_CLASS . "Pages/" . $this->className . ";");
    }

    private function getLivewireClassName(): string
    {
        return $this->className . self::INDEX;
    }

    protected function openIndexClass()
    {
        $this->setMainPathClass();
        $this->createFolderIfExists();
        $this->createIndexClass();
    }

    private function createIndexClass()
    {
        $file_to = $this->pathMain . $this->getLivewireClassName() . ".php";
        $file_from = $this->getContents(self::FROM_CLASS);

        $formatted_data = $this->formatClass($file_from);
        $this->putContents($file_to, $formatted_data);
    }

    private function createIndexBlade()
    {
        $file_to = $this->pathMain . $this->getBladeName() . ".blade.php";
        $file_from = $this->getContents(self::FROM_BLADE);
        $formatted_data = $this->formatBlade($file_from);
        $this->putContents($file_to, $formatted_data);
    }

    private function formatClass($file_from): string
    {
        return sprintf($file_from,
            $this->getNamespace(),
            $this->getLivewireClassName(),
            $this->getFunctions(),
            $this->getBladePath(),
            $this->initializeVariables(),
            $this->getTableClass(),
            $this->getEntityClass(),

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
