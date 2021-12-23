@extends("admin.open_layout.create")
@section("action")
    
<x-helper.input.input name='phone' type='text'
            label='Телефон пользователя' value='{{old("phone") ?? ""}}' id='' onkeyup="" />
<x-helper.input.input name='additional_phone' type='text'
            label='Дополнительный телефон' value='{{old("additional_phone") ?? ""}}' id='' onkeyup="" />
<x-helper.input.input name='crucialData->firstname' type='text'
            label='Имя пользователя' value='{{old("crucialData->firstname") ?? ""}}' id='' onkeyup="" />
<x-helper.input.input name='crucialData->lastname' type='text'
            label='Фамилия пользователя' value='{{old("crucialData->lastname") ?? ""}}' id='' onkeyup="" />
<x-helper.input.input name='crucialData->father_name' type='text'
            label='Отчество пользователя' value='{{old("crucialData->father_name") ?? ""}}' id='' onkeyup="" />
<x-helper.input.input name='crucialData->series' type='text'
            label='Паспорт серия' value='{{old("crucialData->series") ?? ""}}' id='' onkeyup="" />
<x-helper.input.input name='crucialData->pnfl' type='text'
            label='ПНФЛ' value='{{old("crucialData->pnfl") ?? ""}}' id='' onkeyup="" />
<x-helper.input.input name='crucialData->date_of_birth' type='date'
            label='Дата рождения' value='{{old("crucialData->date_of_birth") ?? ""}}' id='' onkeyup="" />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='crucialData->passport_reverse'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    label='Прописка'
                    :entityId='old("file->id_file->crucialData->passport_reverse") ?? ""'
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='crucialData->user_passport'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    label='Паспорт c пользователем'
                    :entityId='old("file->id_file->crucialData->user_passport") ?? ""'
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='crucialData->passport'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    label='Паспорт пользователя'
                    :entityId='old("file->id_file->crucialData->passport") ?? ""'
                     />
@endsection
