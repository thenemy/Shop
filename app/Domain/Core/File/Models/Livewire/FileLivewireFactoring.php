<?php

namespace App\Domain\Core\File\Models\Livewire;
/// fill this
/// available variables in blade is
/// $entity $index
use App\Domain\Core\File\Interfaces\LivewireFactoringInterface;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\ComplexAttribute;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Core\Front\Interfaces\HtmlInterface;

//
class FileLivewireFactoring extends FileLivewireCreator implements LivewireFactoringInterface
{
    public string $key;
    public BladeGenerator $attributes;

    /**
     * @param $className
     * @param $entity -- required for generating name for the livewire
     * @param $key -- required for setting initial value for counter
     */
    public function __construct($className, $entity, $key, BladeGenerator $attributes)
    {
        $this->key = $key;
        $this->attributes = $attributes;
        parent::__construct($className, $entity);
    }

    static public function generation($className, $entity, $key, array $attributes, $title)
    {
        return new self($className, $entity, $key, ComplexAttribute::generation($attributes, $title));
    }

    public function formatClass($file_from): string
    {
        return sprintf($file_from, [
            $this->getNamespace(),
            $this->getLivewireClassName(),
            $this->getBladePath()
        ]);
    }

    public function generateAdditionalToHtml(): string
    {
        if ($this->key)
            return sprintf(':entity="$entity" prefix="%s"', $this->key);
        return "";
    }

    protected function getPathFromBlade(): string
    {
        return self::FROM_BLADE_FACTORING;
    }

    protected function getPathFromClass(): string
    {
        return self::FROM_CLASS_FACTORING;
    }

    public function formatBlade($file_from): string
    {
        return sprintf($file_from,
            $this->attributes->generateHtml()
        );
    }
}
