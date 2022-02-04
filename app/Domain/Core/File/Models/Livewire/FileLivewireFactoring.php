<?php

namespace App\Domain\Core\File\Models\Livewire;
/// fill this
/// available variables in blade is
/// $entity $index
/// $index is loop counter
/// $entity
///
use App\Domain\Core\File\Interfaces\LivewireFactoringInterface;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\ComplexAttribute;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Core\Front\Interfaces\HtmlInterface;

//
class FileLivewireFactoring extends FileLivewireCreator implements LivewireFactoringInterface
{
    public array $rules;
    public BladeGenerator $attributes;
    public BladeGenerator $editAttributes;
    public string $title;
    public string $prefixKey;
    public string $initialSettingClass;

    /**
     * @param $className
     * @param $entity
     * @param $rules
     * @param BladeGenerator $attributes
     */
    public function __construct($className, $entity, $rules,
                                BladeGenerator $attributes,
                                BladeGenerator $editAttributes,
                                string $title, $prefixKey,
                                string $initialSettingClass
    )
    {
        $this->rules = $rules;
        $this->editAttributes = $editAttributes;
        $this->attributes = $attributes;
        $this->title = $title;
        $this->prefixKey = $prefixKey;
        $this->initialSettingClass = $initialSettingClass;
        parent::__construct($className, $entity);
    }

    static public function generation($className, $entity, $rules, $title,
                                      array $attributes, array $editAttributes = [], $prefixKey = "",
                                      string $initialSettingClass = ""
    )
    {
        $complex_title = '__("Элемент")
        ." №" . ($index + 1)';
        return new self($className, $entity, $rules,
            ComplexAttribute::generation($attributes, $complex_title),
            ComplexAttribute::generation($editAttributes, $complex_title), $title, $prefixKey, $initialSettingClass);
    }

    public function formatClass($file_from): string
    {
        return sprintf($file_from,
            $this->getNamespace(),
            $this->getLivewireClassName(),
            $this->getFunctions(),
            $this->getBladePath()
        );
    }

    public function generateAdditionalToHtml(): string
    {
        $must = sprintf("%s :entity='%s'
            prefixKey='%s' initialSettingClass='%s'",
            parent::generateAdditionalToHtml(),
            '$entity ?? null',
            $this->prefixKey, $this->initialSettingClass);
        if ($this->rules)
            return sprintf(":rules=(array)json_decode('%s') %s",
                json_encode($this->rules),
                $must);
        return $must;
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
            $this->title,
            $this->editAttributes->generateHtml(),
            $this->attributes->generateHtml()
        );
    }
}
