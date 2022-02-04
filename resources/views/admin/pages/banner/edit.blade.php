@extends("admin.layout.edit")
@section("action")
    
<x-helper.input.input name='link' type='text'
            label='{{__("Линк для банера")}}' value='{{old("link") ?? $entity->link ?? " "}}' id='link'  onkeyup="" />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='image->ru'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Русский Баннер")'
                    :entityId='old("file->id_file->image->ru") ?? ""'
                    :mediaInitial='$entity->image_ru'
                    wire:key=''
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='image->uz'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Узбекский Баннер")'
                    :entityId='old("file->id_file->image->uz") ?? ""'
                    :mediaInitial='$entity->image_uz'
                    wire:key=''
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='image->en'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Английский Баннер")'
                    :entityId='old("file->id_file->image->en") ?? ""'
                    :mediaInitial='$entity->image_en'
                    wire:key=''
                     />
@endsection
