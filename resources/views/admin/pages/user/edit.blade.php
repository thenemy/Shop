@extends("admin.layout.edit")
@section("action")
    
<x-helper.input.input name='phone' type='text'
            label='Телефон пользователя' value='{{ $entity->phone ?? " " }}' id='phone'  onkeyup=""/>
<x-helper.input.input name='password' type='password'
            label='Пароль' value='{{old("password") ?? ""}}' id='password'  onkeyup=""/>
<x-helper.input.input name='userCreditData->additional_phone' type='text'
            label='Дополнительный телефон' value='{{ $entity->userCreditData->additional_phone ?? " " }}' id='userCreditData->additional_phone'  onkeyup=""/>
<x-helper.input.input name='userCreditData->crucialData->firstname' type='text'
            label='Имя пользователя' value='{{ $entity->userCreditData->crucialData->firstname ?? " " }}' id='userCreditData->crucialData->firstname'  onkeyup=""/>
<x-helper.input.input name='userCreditData->crucialData->lastname' type='text'
            label='Фамилия пользователя' value='{{ $entity->userCreditData->crucialData->lastname ?? " " }}' id='userCreditData->crucialData->lastname'  onkeyup=""/>
<x-helper.input.input name='userCreditData->crucialData->father_name' type='text'
            label='Отчество пользователя' value='{{ $entity->userCreditData->crucialData->father_name ?? " " }}' id='userCreditData->crucialData->father_name'  onkeyup=""/>
<x-helper.input.input name='userCreditData->crucialData->series' type='text'
            label='Паспорт серия' value='{{ $entity->userCreditData->crucialData->series ?? " " }}' id='userCreditData->crucialData->series'  onkeyup=""/>
<x-helper.input.input name='userCreditData->crucialData->date_of_birth' type='date'
            label='Дата рождения' value='{{ $entity->userCreditData->crucialData->date_of_birth ?? " " }}' id='userCreditData->crucialData->date_of_birth'  onkeyup=""/>
<x-helper.input.input name='userCreditData->crucialData->pnfl' type='text'
            label='ПНФЛ' value='{{ $entity->userCreditData->crucialData->pnfl ?? " " }}' id='userCreditData->crucialData->pnfl'  onkeyup=""/>
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='avatar_edit'
                    entityClass='App\Domain\User\Front\Main\UserEdit'
                    :multiple='false'
                    label='Аватар'
                     />
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='passport_reverse_edit'
                    entityClass='App\Domain\User\Front\Main\UserEdit'
                    :multiple='false'
                    label='Прописка'
                     />
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='passport_user_edit'
                    entityClass='App\Domain\User\Front\Main\UserEdit'
                    :multiple='false'
                    label='Паспорт c пользователем'
                     />
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='passport_edit'
                    entityClass='App\Domain\User\Front\Main\UserEdit'
                    :multiple='false'
                    label='Паспорт пользователя'
                     />
<livewire:admin.pages.user-edit.plastic-card-dynamic
                parentKey='user_id'
                :parentId='$entity->id'
            />
@endsection
