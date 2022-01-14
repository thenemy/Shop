@extends("admin.layout.edit")
@section("action")
    

            <div 	class='flex flex-row  space-x-2 '>
                			

            <div 	class='flex flex-col  space-y-2 '>
                			

            <div 	class='border p-2'>
            <span class='font-bold text-lg'>{{__('Информация о клиенте')}}</span>
                			
<x-helper.text.text_key key='Имя клиента' value='{{$entity->userData->crucialData->name ?? ""}}'></x-helper.text.text_key>			
<x-helper.text.text_key key='Номер карты' value='{{$entity->plastic->pin ?? ""}}'></x-helper.text.text_key>
            </div>			

            <div 	class='border p-2'>
            <span class='font-bold text-lg'>{{__('Информация о товаре')}}</span>
                			
<x-helper.text.text_key key='Номер Договора' value='{{$entity->purchase->id ?? ""}}'></x-helper.text.text_key>			
<x-helper.text.text_key key='Количество покупок' value='{{$entity->purchase->number_purchase ?? ""}}'></x-helper.text.text_key>			
<x-helper.text.text_key key='Сумма договора' value='{{$entity->sum_overall ?? ""}}'></x-helper.text.text_key>			
<x-helper.text.text_key key='Первоначальная оплата' value='{{$entity->initial_price ?? ""}}'></x-helper.text.text_key>			
<x-helper.text.text_key key='Ежемесячный платеж' value='{{$entity->monthly_paid ?? ""}}'></x-helper.text.text_key>			
<x-helper.text.text_key key='Количество месяцев' value='{{$entity->number_month ?? ""}}'></x-helper.text.text_key>
            </div>
            </div>			

            <div 	class='flex flex-col  space-y-2 space-y-2'>
                			
<livewire:admin.pages.taken-credit-edit.monthly-paid-index
            :filterBy="['taken_credit_id' => {{$entity->id ?? ""}},]" />			
<livewire:admin.pages.taken-credit-edit.time-schedule-transaction-index
            :filterBy="['taken_credit_id' => {{$entity->id ?? ""}},]" />
            </div>
            </div>
<livewire:admin.pages.taken-credit-edit.comment-installment-dynamic 
                 parentKey='taken_credit_id'
                :parentId='$entity->id'/>
@endsection
