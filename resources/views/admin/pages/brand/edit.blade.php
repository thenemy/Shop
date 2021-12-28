@extends("admin.layout.edit")
@section("action")
    
<x-helper.input.input name='brand' type='text'
            label='Название брэнда' value='{{ $entity->brand ?? " " }}' id='brand'  onkeyup=""/>
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='image'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    label='Лого'
                    :entityId='old("file->id_file->image") ?? ""'
                     />
@endsection
