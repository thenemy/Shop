<?php

namespace App\Domain\Core\File\Models\Livewire;

use App\Domain\Core\File\Abstracts\AbstractFileManager;
use App\Domain\Core\File\Interfaces\LivewireCreatorInterface;
use App\Domain\Core\Front\Admin\Livewire\Dispatch\Base\Dispatch;
use App\Domain\Core\Front\Interfaces\HtmlInterface;
use App\Domain\Core\Main\Traits\FastInstantiation;
use Illuminate\Support\Facades\Log;


// pass additional actions through constructor
// could pass entity
class FileLivewireCreator extends AbstractFileManager
    implements LivewireCreatorInterface, HtmlInterface
{
    use  FastInstantiation;

/// wierds
    protected function formatClass($file_from): string
    {
        try {
            return sprintf($file_from,
                $this->getNamespace(),
                $this->getLivewireClassName(),
                $this->getFunctions(),
                $this->getBladePath(),
                $this->initializeVariables(),
                $this->getOptionalDropItems(),
                $this->getTableClass(),
                $this->getEntityClass(),
                ...$this->generateAdditionalFormatClass()
            );
        } catch (\Exception $exception) {

//            $messsage = sprintf("%s %s", get_called_class(), $exception->getMessage());
            throw  new \Exception(get_called_class());
        }

    }

    protected function generateAdditionalFormatClass(): array
    {
        return [];
    }

    protected string $className;
    protected $entity;

    public function __construct($className, $entity)
    {
        $this->className = $className;
        $this->entity = $entity;
        $this->classNameBlade = $this->toLivewireCase($className);
        $this->openFile();
    }

    public function getDispatchClass(): string
    {
        return $this->entity->dispatch_class ?? Dispatch::class;
    }

    public function generateHtml(): string
    {
        return sprintf("<livewire:admin.pages.%s.%s %s/>",
            $this->classNameBlade,
            $this->getBladeName(),
            $this->generateAdditionalToHtml()
        );
    }

    public function generateAdditionalToHtml(): string
    {
        return "";
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
            . "\n"
            . $this->entity->livewireFunctions()->generateFunctions()
            . "\n"
            . $this->entity->livewireOptionalDropDown()->generateFunctions()
            . "\n"
            . self::newClass($this->entity->getTableClass())->generateFunctions();
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
        try {
            return $this->entity->class_name;
        } catch (\Exception $exception) {
            throw  new \Exception($this->entity);
        }
    }

    protected function openFileBlade()
    {
        $this->setMainPath();
        $this->createFolderIfExists();
        $this->createFileBlade();
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

    private function createFileBlade()
    {
        $file_to = $this->pathMain . $this->getBladeName() . ".blade.php";
        $file_from = $this->getContents($this->getPathFromBlade());
        $formatted_data = $this->formatBlade($file_from);
        $this->putContents($file_to, $formatted_data);
    }

    protected function formatBlade($file_from): string
    {
        return sprintf($file_from,
            $this->getFunctionComponents(),
            $this->getTableToBlade()
        );
    }

    protected function getPathFromClass(): string
    {
        return self::FROM_CLASS;
    }

    protected function getPathFromBlade(): string
    {
        return self::FROM_BLADE;
    }


    protected function getTableToBlade()
    {
        return self::newClass($this->getTableClass())->generateHtml();
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
