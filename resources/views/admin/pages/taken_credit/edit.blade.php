@extends("admin.layout.edit")
@section("action")


    <div class='w-full flex flex-row  space-x-2'>


        <div class='basis-5/12  flex flex-col  space-y-2'>


            <div class='border shadow p-4 space-y-4'>
                <span class='font-bold text-lg'>{{__('Информация о клиенте')}}</span>

                <x-helper.text.text_key_link key='Имя клиента' value='{{$entity->userData->crucialData->name ?? ""}}'
                                             :link='route("admin.user.show", ["0" => $entity->user_id,])'></x-helper.text.text_key_link>
                <x-helper.text.text_key key='Номер карты'
                                        value='{{$entity->plastic->pan ?? ""}} '></x-helper.text.text_key>
            </div>

            <div class='border shadow p-4 space-y-4'>
                <span class='font-bold text-lg'>{{__('Информация о кредите')}}</span>

                <x-helper.text.text_key key='Номер Договора'
                                        value='{{$entity->purchase->id ?? ""}} '></x-helper.text.text_key>
                <x-helper.text.text_key key='Количество покупок'
                                        value='{{$entity->purchase->number_purchase ?? ""}} '></x-helper.text.text_key>
                <x-helper.text.text_key key='Сумма договора'
                                        value='{{$entity->allToPay() ?? ""}} '></x-helper.text.text_key>
                <x-helper.text.text_key key='Первоначальная оплата'
                                        value='{{$entity->initial_price ?? ""}} '></x-helper.text.text_key>
                <x-helper.text.text_key key='Ежемесячный платеж'
                                        value='{{$entity->monthly_paid ?? ""}} '></x-helper.text.text_key>
                <x-helper.text.text_key key='Количество месяцев'
                                        value='{{$entity->number_month ?? ""}} '></x-helper.text.text_key>
                <x-helper.text.text_key key='Процент'
                                        value='{{$entity->credit->percent ?? ""}} %'></x-helper.text.text_key>
            </div>
        </div>

        <div class='border p-4 shadow space-y-2 flex-1'>
            <span class='font-bold text-lg'>{{__('Сведения')}}</span>

            <livewire:admin.pages.taken-credit-edit.monthly-paid-index
                :filterBy="['taken_credit_id' => $entity->id,]"/>
            <livewire:admin.pages.taken-credit-edit.time-schedule-transaction-index
                :filterBy="['taken_credit_id' => $entity->id,]"/>
        </div>
    </div>
    @if($entity->surety)
        <div class='w-full flex flex-row  space-x-2'>


            <div class='border shadow p-4 space-y-4'>
                <span class='font-bold text-lg'>{{__('Информация о поручители')}}</span>

                <x-helper.text.text_key key='Имя'
                                        value='{{$entity->surety->crucialData->name ?? ""}} '></x-helper.text.text_key>
                <x-helper.text.text_key key='Серия паспорта'
                                        value='{{$entity->surety->crucialData->series ?? ""}} '></x-helper.text.text_key>
                <x-helper.text.text_key key='ПНФЛ'
                                        value='{{$entity->surety->crucialData->pnfl ?? ""}} '></x-helper.text.text_key>
                <x-helper.text.text_key key='Телефон'
                                        value='{{$entity->surety->phone ?? ""}} '></x-helper.text.text_key>
                <x-helper.text.text_key key='Дополнительный номер'
                                        value='{{$entity->surety->additional_phone ?? ""}} '></x-helper.text.text_key>
                <x-helper.text.text_key key='Дата рождения'
                                        value='{{$entity->surety->crucialData->date_of_birth ?? ""}} '></x-helper.text.text_key>
                <x-helper.text.text_key_link key='Паспорт' value='Скачать'
                                             :link='route("download.file", ["path"=> $entity->surety->crucialData->passport->path])'></x-helper.text.text_key_link>
                <x-helper.text.text_key_link key='Прописка' value='Скачать'
                                             :link='route("download.file", ["path"=> $entity->surety->crucialData->passport_reverse->path])'></x-helper.text.text_key_link>
                <x-helper.text.text_key_link key='Паспорт c пользователем' value='Скачать'
                                             :link='route("download.file", ["path"=> $entity->surety->crucialData->user_passport->path])'></x-helper.text.text_key_link>
            </div>
        </div>
        <livewire:admin.pages.taken-credit-edit.surety-plastic-card-dynamic
            parentKey='user_id'
            :parentId='$entity->id'/>
    @endif
    <x-helper.container.container :title='__("Товары")' class='flex flex-col flex flex-wrap justify-between'>

        <livewire:admin.pages.taken-credit-edit.purchase-main
            :filterBy="['user_purchase_id' => $entity->purchase_id,]"/>
    </x-helper.container.container>
    <livewire:admin.pages.taken-credit-edit.comment-installment-dynamic
        parentKey='taken_credit_id'
        :parentId='$entity->id'/>
@endsection
