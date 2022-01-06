@extends("admin.open_layout.create")
@section("action")
    
<x-helper.input.input name='phone' type='text'
            label='{{__("Телефон пользователя")}}' value='{{old("phone") ?? $entity->phone ?? " "}}' id='phone'  onkeyup=""/>
<x-helper.input.input name='additional_phone' type='text'
            label='{{__("Дополнительный телефон")}}' value='{{old("additional_phone") ?? $entity->additional_phone ?? " "}}' id='additional_phone'  onkeyup=""/>
<x-helper.input.input name='crucialData->firstname' type='text'
            label='{{__("Имя пользователя")}}' value='{{old("crucialData->firstname") ?? $entity->crucialData->firstname ?? " "}}' id='crucialData->firstname'  onkeyup=""/>
<x-helper.input.input name='crucialData->lastname' type='text'
            label='{{__("Фамилия пользователя")}}' value='{{old("crucialData->lastname") ?? $entity->crucialData->lastname ?? " "}}' id='crucialData->lastname'  onkeyup=""/>
<x-helper.input.input name='crucialData->father_name' type='text'
            label='{{__("Отчество пользователя")}}' value='{{old("crucialData->father_name") ?? $entity->crucialData->father_name ?? " "}}' id='crucialData->father_name'  onkeyup=""/>
<x-helper.input.input name='crucialData->series' type='text'
            label='{{__("Паспорт серия")}}' value='{{old("crucialData->series") ?? $entity->crucialData->series ?? " "}}' id='crucialData->series'  onkeyup=""/>
<x-helper.input.input name='crucialData->pnfl' type='text'
            label='{{__("ПНФЛ")}}' value='{{old("crucialData->pnfl") ?? $entity->crucialData->pnfl ?? " "}}' id='crucialData->pnfl'  onkeyup=""/>
<x-helper.input.input name='crucialData->date_of_birth' type='date'
            label='{{__("Дата рождения")}}' value='{{old("crucialData->date_of_birth") ?? $entity->crucialData->date_of_birth ?? " "}}' id='crucialData->date_of_birth'  onkeyup=""/>
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='crucialData->passport_reverse'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Прописка")'
                    :entityId='old("file->id_file->crucialData->passport_reverse") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='crucialData->user_passport'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Паспорт c пользователем")'
                    :entityId='old("file->id_file->crucialData->user_passport") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='crucialData->passport'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Паспорт пользователя")'
                    :entityId='old("file->id_file->crucialData->passport") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
@endsection
