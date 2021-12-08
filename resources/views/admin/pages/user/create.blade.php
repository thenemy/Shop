@extends("admin.layout.create")
@section("action")
    
<x-helper.input.input name='phone' type='text'  label='Телефон пользователя' value='{{old("phone") ?? ""}}'/>
<x-helper.input.input name='password' type='password'  label='Пароль' value='{{old("password") ?? ""}}'/>
<x-helper.input.input name='userCreditData->additional_phone' type='text'  label='Дополнительный телефон' value='{{old("userCreditData->additional_phone") ?? ""}}'/>
<x-helper.input.input name='userCreditData->crucialData->firstname' type='text'  label='Имя пользователя' value='{{old("userCreditData->crucialData->firstname") ?? ""}}'/>
<x-helper.input.input name='userCreditData->crucialData->lastname' type='text'  label='Фамилия пользователя' value='{{old("userCreditData->crucialData->lastname") ?? ""}}'/>
<x-helper.input.input name='userCreditData->crucialData->father_name' type='text'  label='Отчество пользователя' value='{{old("userCreditData->crucialData->father_name") ?? ""}}'/>
<x-helper.input.input name='userCreditData->crucialData->series' type='text'  label='Паспорт серия' value='{{old("userCreditData->crucialData->series") ?? ""}}'/>
<x-helper.input.input name='userCreditData->crucialData->date_of_birth' type='date'  label='Дата рождения' value='{{old("userCreditData->crucialData->date_of_birth") ?? ""}}'/>
<x-helper.input.input name='userCreditData->crucialData->pnfl' type='text'  label='ПНФЛ' value='{{old("userCreditData->crucialData->pnfl") ?? ""}}'/>
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='avatar->avatar'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    label='Аватар'
                    :entityId='old("file->id_file->avatar->avatar") ?? ""'
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='userCreditData->crucialData->passport_reverse'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    label='Прописка'
                    :entityId='old("file->id_file->userCreditData->crucialData->passport_reverse") ?? ""'
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='userCreditData->crucialData->user_passport'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    label='Паспорт c пользователем'
                    :entityId='old("file->id_file->userCreditData->crucialData->user_passport") ?? ""'
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='userCreditData->crucialData->passport'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    label='Паспорт пользователя'
                    :entityId='old("file->id_file->userCreditData->crucialData->passport") ?? ""'
                     />
@endsection
