@extends("admin.layout.create")
@section("action")
    
<x-helper.input.input name='link' type='text'
            label='Линк для банера' value='{{old("link") ?? ""}}' id='link'  onkeyup=""/>
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='image->ru'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    label='Русский Баннер'
                    :entityId='old("file->id_file->image->ru") ?? ""'
                    :mediaInitial='""'
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='image->uz'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    label='Узбекский Баннер'
                    :entityId='old("file->id_file->image->uz") ?? ""'
                    :mediaInitial='""'
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='image->en'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    label='Английский Баннер'
                    :entityId='old("file->id_file->image->en") ?? ""'
                    :mediaInitial='""'
                     />
@endsection
