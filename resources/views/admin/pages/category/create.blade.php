@extends("admin.layout.create")
@section("action")
    
<x-helper.input.input name='name' type='text'
            label='Введите  имя категории' value='{{old("name") ?? ""}}' id='' onkeyup="" />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='icon->icon'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    label='Загрузите иконку'
                    :entityId='old("file->id_file->icon->icon") ?? ""'
                     />
@endsection
