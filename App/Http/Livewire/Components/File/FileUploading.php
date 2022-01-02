<?php

namespace App\Http\Livewire\Components\File;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class FileUploading extends Component
{
    use WithFileUploads;

    public $fileCustom;
    public $entityId;
    public $uniqueId;
    public string $entityClass;
    public string $mediaKey;
    public bool $multiple;
    public string $label;

    public function mount()
    {
        $media = $this->getMedia();
        $this->uniqueId = $media->id;
    }

    public function updatedFileCustom()
    {
        $media = $this->getMedia();
        $media->validate($this);
        $media->upload($this->fileCustom);
    }

    public function download($path)
    {

        return Storage::download($path);
    }

    public function delete($id)
    {
        $this->getMedia()->delete($id);
    }


    protected function getMedia()
    {
        $mediaKey = $this->mediaKey;
        return $this->entityClass::find($this->entityId)->$mediaKey;
    }

    public function getPath(): string
    {
        return 'livewire.components.file.file-uploading';
    }

    public function render()
    {
        return view(
            $this->getPath(),
            [
                "file_uploaded" => $this->getMedia()->show()
            ]
        );
    }
}
