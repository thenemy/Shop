<?php

namespace App\Domain\Core\File\Abstracts;

use App\Domain\Core\File\Interfaces\BladeCreatorInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;

abstract class AbstractFileManagerBlade extends AbstractFileManager implements BladeCreatorInterface
{
    protected BladeGenerator $bladeGenerator;
    protected $entity;

    public function __construct($className, BladeGenerator $bladeGenerator, $entity)
    {
        $this->bladeGenerator = $bladeGenerator;
        $this->classNameBlade = $this->toSnackCase($className);
        $this->entity = $entity;
        $this->setMainPath();
        $this->createFolderIfExists();
        $this->openFile();
    }

    protected function setMainPath()
    {
        $this->pathMain = self::TO . $this->classNameBlade . "/";
    }

    public function openFile()
    {
        $index = $this->getPath();
        $file_from = $this->getContents($this->getTemplatePath());
        $formatted_index = $this->formatFile($file_from);
        $this->putContents($index, $formatted_index);
    }


    protected function getTitle(): string
    {
        return $this->entity->getTitle();
    }

    protected function formatFile($file_from): string
    {
        return sprintf($file_from,
            $this->getTitle(),
            $this->bladeGenerator->generateHtml(),
        );
    }

    abstract protected function getPath(): string;

    abstract protected function getTemplatePath(): string;

}
