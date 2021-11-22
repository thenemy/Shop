<?php

namespace App\Domain\Core\File\Models;

use App\Domain\Core\File\Abstracts\AbstractFileManager;
use App\Domain\Core\File\Interfaces\CreatorInterface;
use App\Domain\Core\File\Interfaces\LivewireCreatorInterface;
use App\Domain\Core\File\Traits\FileManager;
use App\Domain\Core\Front\Admin\Livewire\LivewireFiles\Interfaces\LivewireGeneratorInterface;
use App\Domain\Core\Front\Interfaces\HtmlInterface;
use App\Domain\Core\Text\Traits\CaseConverter;
use App\Http\Controllers\Base\Abstracts\BaseController;

// pass additional actions through constructor
// could pass entity
class FileLivewireCreator extends AbstractFileManager
    implements LivewireCreatorInterface, HtmlInterface
{

    protected string $className;
    protected $entity;

    public function __construct($className, $entity)
    {
        $this->className = $className;
        $this->entity = $entity;
        $this->classNameBlade = $this->toLivewireCase($className);
        $this->openFile();
    }

    public function generateHtml(): string
    {
        return sprintf("<livewire:admin.pages.%s.%s/>", $this->classNameBlade, $this->getBladeName());
    }

    public function initializeVariables(): string
    {
        return $this->entity->livewireComponents()->initializeVariables();
    }
    // implement this function
    //to livewire class
    protected function getFunctions(): string
    {
        return $this->entity->livewireComponents()->generateFunctions()
            . " "
            . $this->entity->livewireOptionalDropDown()->generateFunctions();
    }

    protected function getOptionalDropItems(): string
    {
        return $this->entity->livewireOptionalDropDown()->generateDropItems();
    }

    // to blade in livewire
    protected function getFunctionComponents(): string
    {
        return $this->entity->livewireComponents()->generateBlades();
    }

    public function openFile()
    {
        $this->openFileBlade();
        $this->openFileClass();
    }

    protected function getTableClass(): string
    {
        return $this->entity->getTableClass();
    }

    protected function getEntityClass(): string
    {
        return get_class($this->entity);
    }

    protected function openFileBlade()
    {
        $this->setMainPath();
        $this->createFolderIfExists();
        $this->createFileBlade();
    }

    protected function getBladePath(): string
    {
        return "livewire.admin.pages." . $this->classNameBlade . "." . $this->getBladeName();
    }


    protected function getBladeName(): string
    {
        return $this->toLivewireCase($this->getLivewireClassName());
    }

    protected function getNamespace(): string
    {
        return str_replace("/", "\\", self::BASE_CLASS . "Pages/" . $this->className . ";");
    }

    protected function getLivewireClassName(): string
    {
        return $this->entity->class_name;
    }

    protected function openFileClass()
    {
        $this->setMainPathClass();
        $this->createFolderIfExists();
        $this->createFileClass();
    }

    private function createFileClass()
    {
        $file_to = $this->pathMain . $this->getLivewireClassName() . ".php";
        $file_from = $this->getContents($this->getPathFromClass());

        $formatted_data = $this->formatClass($file_from);
        $this->putContents($file_to, $formatted_data);
    }

    protected function getPathFromClass(): string
    {
        return self::FROM_CLASS;
    }

    protected function getPathFromBlade(): string
    {
        return self::FROM_BLADE;
    }

    private function createFileBlade()
    {
        $file_to = $this->pathMain . $this->getBladeName() . ".blade.php";
        $file_from = $this->getContents($this->getPathFromBlade());
        $formatted_data = $this->formatBlade($file_from);
        $this->putContents($file_to, $formatted_data);
    }

    protected function formatClass($file_from): string
    {
        return sprintf($file_from,
            $this->getNamespace(),
            $this->getLivewireClassName(),
            $this->getFunctions(),
            $this->getBladePath(),
            $this->initializeVariables(),
            $this->getOptionalDropItems(),
            $this->getTableClass(),
            $this->getEntityClass(),
        );
    }

    protected function formatBlade($file_from): string
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
