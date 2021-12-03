<?php

namespace App\Http\Livewire\Components\File;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class FileUploading extends Component
{
    use WithFileUploads;

    public $file;
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

    public function updatedFile()
    {
        $media = $this->getMedia();
        $media->validate($this);
        $media->upload($this->file);
    }

    public function download($path)
    {

        return Storage::download($path);
    }

    public function delete($id)
    {
        $this->getMedia()->delete($id);
    }

    private function getMedia()
    {
        $mediaKey = $this->mediaKey;
        return $this->entityClass::find($this->entityId)->$mediaKey;
    }

    public function render()
    {

        return view(
            'livewire.components.file.file-uploading',
            [
                "file_uploaded" => $this->getMedia()->show()
            ]
        );
    }
}
