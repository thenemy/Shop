@extends("admin.layout.create")
@section("action")
    
<x-helper.input.input name='name' type='text'
            label='{{__("Имя Магазина")}}' value='{{old("name") ?? $entity->name ?? " "}}' id='name'  onkeyup=""/>
<x-helper.input.input name='user->phone' type='text'
            label='{{__("Телефон пользователя")}}' value='{{old("user->phone") ?? $entity->user->phone ?? " "}}' id='user->phone'  onkeyup=""/>
<x-helper.input.input name='user->password' type='password'
            label='{{__("Пароль")}}' value='' id='user->password'  onkeyup=""/>
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='image'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Фото магазина")'
                    :entityId='old("file->id_file->image") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='logo'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Лого Магазина")'
                    :entityId='old("file->id_file->logo") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='document'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Документы")'
                    :entityId='old("file->id_file->document") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='licence'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Лицензия")'
                    :entityId='old("file->id_file->licence") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='director_passport'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Паспорт директора")'
                    :entityId='old("file->id_file->director_passport") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
@endsection
