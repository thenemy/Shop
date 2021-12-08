<?php

namespace App\Domain\Core\Front\Admin\Form\Attributes\Base;

use App\Domain\Core\Front\Interfaces\HtmlInterface;
use App\Domain\File\Interfaces\FileTempInterface;

abstract class BaseInputFileTemp implements HtmlInterface
{
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

    public function __construct($class,
                                $keyToAttach,
                                $label,
                                $multiple
    )
    {
        $this->class = $class;
        $this->key = FileTempInterface::MEDIA_KEY;
        $this->keyToAttach = $keyToAttach;
        $this->multiple = $multiple;
        $this->label = $label;
    }

    public function generateHtml(): string
    {
        return sprintf("<livewire:components.file.file-uploading-without-entity
                    keyToAttach='%s'
                    mediaKey='%s'
                    entityClass='%s'
                    :multiple='%s'
                    label='%s'
                    :entityId='%s'
                     />",
            $this->keyToAttach,
            $this->key,
            $this->class,
            $this->multiple ? 'true' : 'false',
            $this->label,
            sprintf('old("%s") ?? ""', 'file->id_file->' . $this->keyToAttach)
        );
    }
}
