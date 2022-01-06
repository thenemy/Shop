<?php

namespace App\Domain\Core\File\Abstracts;

use App\Domain\Core\File\Interfaces\BladeCreatorInterface;
use App\Domain\Core\Front\Admin\Form\Traits\AttributeGetVariable;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;

/// addTitle can be done
abstract class  AbstractFileManagerBlade extends AbstractFileManager implements BladeCreatorInterface
{
    use AttributeGetVariable;

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
        try {
            return $this->translate($this->entity->getTitle()) . " " . $this->getScope($this->entity->addTitle());
        } catch (\Exception $exception) {
            return $this->translate($this->entity->getTitle());
        }
    }

    private function translate($value)
    {
        return $this->getScope(sprintf('__("%s")', $value));
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
