<?php

namespace App\Http\Livewire\Components\File;

class FileUploadingWithoutEntity extends FileUploading
{
    public string $keyToAttach;

    public function mount()
    {
        if (!$this->entityId) {
            $entity = $this->entityClass::create([]);
            $this->entityId = $entity->id;
        }
        parent::mount();
    }

    public function getPath(): string
    {
        return 'livewire.components.file.file-uploading-without-entity';
    }
}
