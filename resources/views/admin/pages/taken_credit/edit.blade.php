@extends("admin.layout.edit")
@section("action")
    

            <div 	class='flex flex-row  space-x-2 '>
                			

            <div 	class='flex flex-col  space-y-2 '>
                			

            <div 	class='border p-2'>
            <span class='font-bold text-lg'>Информация о клиенте</span>
                			
<x-helper.text.text_key key='Имя клиента' value='{{$entity->userData->crucialData->name}}'></x-helper.text.text_key>			
<x-helper.text.text_key key='Номер карты' value='{{$entity->plastic->pin}}'></x-helper.text.text_key>
            </div>			

            <div 	class='border p-2'>
            <span class='font-bold text-lg'>Информация о товаре</span>
                			
<x-helper.text.text_key key='Номер Договора' value='{{$entity->purchase->id}}'></x-helper.text.text_key>			
<x-helper.text.text_key key='Количество покупок' value='{{$entity->purchase->number_purchase}}'></x-helper.text.text_key>			
<x-helper.text.text_key key='Сумма договора' value='{{$entity->sum_overall}}'></x-helper.text.text_key>			
<x-helper.text.text_key key='Первоначальная оплата' value='{{$entity->initial_price}}'></x-helper.text.text_key>			
<x-helper.text.text_key key='Ежемесячный платеж' value='{{$entity->monthly_paid}}'></x-helper.text.text_key>			
<x-helper.text.text_key key='Количество месяцев' value='{{$entity->number_month}}'></x-helper.text.text_key>
            </div>
            </div>			

            <div 	class='flex flex-col  space-y-2 space-y-2'>
                			
<livewire:admin.pages.taken-credit-edit.monthly-paid-index
            :filterBy="['taken_credit_id' => {{$entity->id}},]" />			
<livewire:admin.pages.taken-credit-edit.time-schedule-transaction-index
            :filterBy="['taken_credit_id' => {{$entity->id}},]" />
            </div>
            </div>

<x-helper.input.input name='surety->phone' type='text'
            label='Телефон пользователя' value='{{ $entity->surety->phone ?? " " }}' id='surety->phone'  onkeyup=""/>
<x-helper.input.input name='surety->additional_phone' type='text'
            label='Дополнительный телефон' value='{{ $entity->surety->additional_phone ?? " " }}' id='surety->additional_phone'  onkeyup=""/>
<x-helper.input.input name='surety->crucialData->firstname' type='text'
            label='Имя пользователя' value='{{ $entity->surety->crucialData->firstname ?? " " }}' id='surety->crucialData->firstname'  onkeyup=""/>
<x-helper.input.input name='surety->crucialData->lastname' type='text'
            label='Фамилия пользователя' value='{{ $entity->surety->crucialData->lastname ?? " " }}' id='surety->crucialData->lastname'  onkeyup=""/>
<x-helper.input.input name='surety->crucialData->father_name' type='text'
            label='Отчество пользователя' value='{{ $entity->surety->crucialData->father_name ?? " " }}' id='surety->crucialData->father_name'  onkeyup=""/>
<x-helper.input.input name='surety->crucialData->series' type='text'
            label='Паспорт серия' value='{{ $entity->surety->crucialData->series ?? " " }}' id='surety->crucialData->series'  onkeyup=""/>
<x-helper.input.input name='surety->crucialData->pnfl' type='text'
            label='ПНФЛ' value='{{ $entity->surety->crucialData->pnfl ?? " " }}' id='surety->crucialData->pnfl'  onkeyup=""/>
<x-helper.input.input name='surety->crucialData->date_of_birth' type='date'
            label='Дата рождения' value='{{ $entity->surety->crucialData->date_of_birth ?? " " }}' id='surety->crucialData->date_of_birth'  onkeyup=""/>
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='surety->passport_reverse_edit'
                    entityClass='App\Domain\User\Front\Open\SuretyOpenEdit'
                    :multiple='false'
                    label='Прописка'
                     />
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='surety->passport_user_edit'
                    entityClass='App\Domain\User\Front\Open\SuretyOpenEdit'
                    :multiple='false'
                    label='Паспорт c пользователем'
                     />
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='surety->passport_edit'
                    entityClass='App\Domain\User\Front\Open\SuretyOpenEdit'
                    :multiple='false'
                    label='Паспорт пользователя'
                     />
<livewire:admin.pages.surety-open-edit.surety-plastic-card-dynamic
                parentKey='user_id'
                :parentId='$entity->id'
            />
<livewire:admin.pages.taken-credit-edit.comment-installment-dynamic
                parentKey='taken_credit_id'
                :parentId='$entity->id'
            />
@endsection
