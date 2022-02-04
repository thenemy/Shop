@extends("admin.layout.create")
@section("action")
    
<x-helper.input.input name='phone' type='text'
            label='{{__("Телефон пользователя")}}' value='{{old("phone") ?? $entity->phone ?? " "}}' id='phone'  onkeyup="" />
<x-helper.input.input name='userCreditData->additional_phone' type='text'
            label='{{__("Дополнительный телефон")}}' value='{{old("userCreditData->additional_phone") ?? $entity->userCreditData->additional_phone ?? " "}}' id='userCreditData->additional_phone'  onkeyup="" />
<x-helper.input.input name='password' type='password'
            label='{{__("Пароль")}}' value='' id='password'  onkeyup="" />
<x-helper.input.input name='userCreditData->crucialData->firstname' type='text'
            label='{{__("Имя пользователя")}}' value='{{old("userCreditData->crucialData->firstname") ?? $entity->userCreditData->crucialData->firstname ?? " "}}' id='userCreditData->crucialData->firstname'  onkeyup="" />
<x-helper.input.input name='userCreditData->crucialData->lastname' type='text'
            label='{{__("Фамилия пользователя")}}' value='{{old("userCreditData->crucialData->lastname") ?? $entity->userCreditData->crucialData->lastname ?? " "}}' id='userCreditData->crucialData->lastname'  onkeyup="" />
<x-helper.input.input name='userCreditData->crucialData->father_name' type='text'
            label='{{__("Отчество пользователя")}}' value='{{old("userCreditData->crucialData->father_name") ?? $entity->userCreditData->crucialData->father_name ?? " "}}' id='userCreditData->crucialData->father_name'  onkeyup="" />
<x-helper.drop_down.drop_down :drop='\App\Domain\User\Front\Admin\DropDown\SexDropDown::getDropDown()' />
<x-helper.input.input name='userCreditData->crucialData->series' type='text'
            label='{{__("Паспорт серия")}}' value='{{old("userCreditData->crucialData->series") ?? $entity->userCreditData->crucialData->series ?? " "}}' id='userCreditData->crucialData->series'  onkeyup="" />
<x-helper.input.input name='userCreditData->crucialData->date_of_birth' type='date'
            label='{{__("Дата рождения")}}' value='{{old("userCreditData->crucialData->date_of_birth") ?? $entity->userCreditData->crucialData->date_of_birth ?? " "}}' id='userCreditData->crucialData->date_of_birth'  onkeyup="" />
<x-helper.input.input name='userCreditData->crucialData->pnfl' type='text'
            label='{{__("ПНФЛ")}}' value='{{old("userCreditData->crucialData->pnfl") ?? $entity->userCreditData->crucialData->pnfl ?? " "}}' id='userCreditData->crucialData->pnfl'  onkeyup="" />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='avatar->avatar'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Аватар")'
                    :entityId='old("file->id_file->avatar->avatar") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='userCreditData->crucialData->passport'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Паспорт")'
                    :entityId='old("file->id_file->userCreditData->crucialData->passport") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='userCreditData->crucialData->passport_reverse'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Прописка")'
                    :entityId='old("file->id_file->userCreditData->crucialData->passport_reverse") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='userCreditData->crucialData->user_passport'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Паспорт c пользователем")'
                    :entityId='old("file->id_file->userCreditData->crucialData->user_passport") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
@endsection
