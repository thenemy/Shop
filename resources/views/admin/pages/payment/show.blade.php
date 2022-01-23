@extends("layout.admin_layout")
@section("content")

    {{--    test blade  create template then fill with variables --}}
    <div x-data="setInitWidth()"
         @sidebar-event.window="setWidth($event)"
         class="flex flex-col space-y-3">
        {{--    insert there new created livewire--}}
        {{--    give the title--}}
        <x-helper.text.title>{{$form->title}}</x-helper.text.title>
        <hr class="border-dashed border-title_color"/>
        {{--    insert name of the breadcrumbs and the arguments--}}
        <div class="w-full ">
            
<livewire:admin.pages.decision-attribute-for-payment.decision-attribute  :entity='$entity'/>

            <div 	class='w-full space-x-4 flex flex-row  space-x-2'>
                			

            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-lg'>{{__('Информация о клиенте')}}</span>
                			
<x-helper.text.text_key_link key='Имя клиента' value='{{$entity->user->userCreditData->crucialData->name ?? ""}}' :link='route("admin.user.show", ["0" => $entity->user_id,])'></x-helper.text.text_key_link>			
@if($entity->purchase->status%10 == 1) 			
<x-helper.text.text_key key='Тип оплаты' value='Наличка '></x-helper.text.text_key>			
@else 			
<x-helper.text.text_key key='Номер карты' value='{{$entity->card->plastic->pan ?? ""}} '></x-helper.text.text_key>			
 @endif
            </div>			

            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-lg'>{{__('Информация о покупке')}}</span>
                			
<x-helper.text.text_key key='Номер Договора' value='{{$entity->purchase->id ?? ""}} '></x-helper.text.text_key>			
<x-helper.text.text_key key='Количество покупок' value='{{$entity->purchase->number_purchase ?? ""}} '></x-helper.text.text_key>			
<x-helper.text.text_key key='Сумма договора' value='{{$entity->price ?? ""}} '></x-helper.text.text_key>
            </div>			
 @if($entity->purchase->status == 10)  
            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-lg'>{{__('Информация о доставке')}}</span>
                			
<x-helper.text.text_key key='Количество посылок' value='{{$entity->purchase->delivery()->count() ?? ""}} '></x-helper.text.text_key>			
<x-helper.text.text_key key='Количество посылок доставлено' value='{{$entity->purchase->delivery()->whereNot("status", 0)->count() ?? ""}} '></x-helper.text.text_key>			
<x-helper.text.text_key key='Город доставки' value='{{$entity->purchase->delivery_address->availableCities->cityName ?? ""}} '></x-helper.text.text_key>			
<x-helper.text.text_key key='Адрес доставки' value='{{$entity->purchase->delivery_address->street ?? ""}}, {{$entity->purchase->delivery_address->house ?? ""}} '></x-helper.text.text_key>
            </div>  @endif
            </div>
<x-helper.container.container :title='__("Товары")' 	class='flex flex-col flex flex-wrap justify-between'>
                			
<livewire:admin.pages.taken-credit-edit.purchase-main
            :filterBy="['user_purchase_id' => $entity->purchase_id,]" />
                </x-helper.container.container>
        </div>

        <div>
            <x-helper.button.gray_button type="button" href="{{$form->route_back}}" class="p-2">
                {{__("Назад")}}
            </x-helper.button.gray_button>
        </div>
    </div>

@endsection

