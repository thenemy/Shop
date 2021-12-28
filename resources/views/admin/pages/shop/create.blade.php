@extends("admin.layout.create")
@section("action")
    
<x-helper.input.input name='name' type='text'
            label='Имя Магазина' value='{{old("name") ?? ""}}' id='name'  onkeyup=""/>
<x-helper.input.input name='user->phone' type='text'
            label='Телефон пользователя' value='{{old("user->phone") ?? ""}}' id='user->phone'  onkeyup=""/>
<x-helper.input.input name='user->password' type='password'
            label='Пароль' value='{{old("user->password") ?? ""}}' id='user->password'  onkeyup=""/>
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='image'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    label='Фото магазина'
                    :entityId='old("file->id_file->image") ?? ""'
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='logo'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    label='Лого Магазина'
                    :entityId='old("file->id_file->logo") ?? ""'
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='document'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    label='Документы'
                    :entityId='old("file->id_file->document") ?? ""'
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='licence'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    label='Лицензия'
                    :entityId='old("file->id_file->licence") ?? ""'
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='director_passport'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    label='Паспорт директора'
                    :entityId='old("file->id_file->director_passport") ?? ""'
                     />
@endsection
