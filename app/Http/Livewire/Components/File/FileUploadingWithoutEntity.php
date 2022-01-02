<?php

namespace App\Http\Livewire\Components\File;

class FileUploadingWithoutEntity extends FileUploading
{
    public string $keyToAttach;

    public function mount($mediaInitial = null)
    {
        if (!$this->entityId) {
            $input = [];
            if ($mediaInitial) {
                $input['file_new'] = $mediaInitial;
            }
            $entity = $this->entityClass::create($input);
            $this->entityId = $entity->id;
        }
        parent::mount();
    }

    public function getPath(): string
    {
        return 'livewire.components.file.file-uploading-without-entity';
    }
}
