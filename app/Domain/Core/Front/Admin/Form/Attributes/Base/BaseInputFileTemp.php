<?php

namespace App\Domain\Core\Front\Admin\Form\Attributes\Base;

use App\Domain\Core\Front\Admin\Form\Traits\AttributeGetVariable;
use App\Domain\Core\Front\Interfaces\HtmlInterface;
use App\Domain\File\Interfaces\FileTempInterface;

abstract class BaseInputFileTemp implements HtmlInterface
{
    use AttributeGetVariable;

    /**
     * @params  $keyToAttach -- when form submit to store to the entity
     * @params  $multiple -- is multiple file submission or not
     * @params  $label -- helper text above the component
     * @params  $class -- FileTemp or FileMany
     * @params  $key   -- specificKey
     * everytime livewire is mounted new temp file will be created
     */
    public string $keyToAttach;
    public string $multiple;
    public string $label;
    public string $class;
    public string $key;
    public bool $create;
    public string $mediaInitialKey;

    public function __construct($class,
                                $keyToAttach,
                                $label,
                                $multiple, bool $create = true,
                                $mediaInitialKey = ""
    )
    {
        $this->class = $class;
        $this->key = FileTempInterface::MEDIA_KEY;
        $this->keyToAttach = $keyToAttach;
        $this->multiple = $multiple;
        $this->label = $label;
        $this->create = $create;
        $this->mediaInitialKey = $mediaInitialKey == "" ? $this->keyToAttach : $mediaInitialKey;
    }

    public static function create($keyToAttach, $label)
    {
        $self = get_called_class();
        return new $self($keyToAttach, $label);
    }

    public static function edit($keyToAttach, $label, string $mediaInitialKey = "")
    {
        $self = get_called_class();
        return new $self($keyToAttach, $label, false, $mediaInitialKey);
    }
    /// create here the field for initial value
    /// attach it in mount state
    ///
    public function generateHtml(): string
    {
        return sprintf("<livewire:components.file.file-uploading-without-entity
                    keyToAttach='%s'
                    mediaKey='%s'
                    entityClass='%s'
                    :multiple='%s'
                    label='%s'
                    :entityId='%s'
                    :mediaInitial='%s'
                     />",
            $this->keyToAttach,
            $this->key,
            $this->class,
            $this->multiple ? 'true' : 'false',
            $this->label,
            sprintf('old("%s") ?? ""', 'file->id_file->' . $this->keyToAttach),
            !$this->create ? $this->getWithoutScopeAtrVariable($this->mediaInitialKey) : "\"\""
        );
    }
}
