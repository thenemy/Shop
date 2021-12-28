@extends("admin.open_layout.edit")
@section("action")
    

<x-helper.input.input name='phone' type='text'
            label='Телефон пользователя' value='{{ $entity->phone ?? " " }}' id='phone'  onkeyup=""/>
<x-helper.input.input name='additional_phone' type='text'
            label='Дополнительный телефон' value='{{ $entity->additional_phone ?? " " }}' id='additional_phone'  onkeyup=""/>
<x-helper.input.input name='crucialData->firstname' type='text'
            label='Имя пользователя' value='{{ $entity->crucialData->firstname ?? " " }}' id='crucialData->firstname'  onkeyup=""/>
<x-helper.input.input name='crucialData->lastname' type='text'
            label='Фамилия пользователя' value='{{ $entity->crucialData->lastname ?? " " }}' id='crucialData->lastname'  onkeyup=""/>
<x-helper.input.input name='crucialData->father_name' type='text'
            label='Отчество пользователя' value='{{ $entity->crucialData->father_name ?? " " }}' id='crucialData->father_name'  onkeyup=""/>
<x-helper.input.input name='crucialData->series' type='text'
            label='Паспорт серия' value='{{ $entity->crucialData->series ?? " " }}' id='crucialData->series'  onkeyup=""/>
<x-helper.input.input name='crucialData->pnfl' type='text'
            label='ПНФЛ' value='{{ $entity->crucialData->pnfl ?? " " }}' id='crucialData->pnfl'  onkeyup=""/>
<x-helper.input.input name='crucialData->date_of_birth' type='date'
            label='Дата рождения' value='{{ $entity->crucialData->date_of_birth ?? " " }}' id='crucialData->date_of_birth'  onkeyup=""/>
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='passport_reverse_edit'
                    entityClass='App\Domain\User\Front\Open\SuretyOpenEdit'
                    :multiple='false'
                    label='Прописка'
                     />
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='passport_user_edit'
                    entityClass='App\Domain\User\Front\Open\SuretyOpenEdit'
                    :multiple='false'
                    label='Паспорт c пользователем'
                     />
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='passport_edit'
                    entityClass='App\Domain\User\Front\Open\SuretyOpenEdit'
                    :multiple='false'
                    label='Паспорт пользователя'
                     />
<livewire:admin.pages.surety-open-edit.surety-plastic-card-dynamic
                parentKey='user_id'
                :parentId='$entity->id'
            />
@endsection
