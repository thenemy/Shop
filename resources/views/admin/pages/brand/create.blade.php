@extends("admin.layout.create")
@section("action")
    
<x-helper.input.input name='brand' type='text'
            label='{{__("Название брэнда")}}' value='{{old("brand") ?? $entity->brand ?? " "}}' id='brand'  onkeyup="" />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='image'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Лого")'
                    :entityId='old("file->id_file->image") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
@endsection
