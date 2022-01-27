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
            

            <div 	class='space-y-4 mr-4'>
                			
<livewire:admin.pages.decision-attribute.decision-attribute  :entity='$entity'/>			

            <div 	class='w-full flex flex-row  space-x-2'>
                			

            <div 	class='basis-5/12  flex flex-col  space-y-2'>
                			

            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-lg'>{{__('Информация о клиенте')}}</span>
                			
<x-helper.text.text_key_link key='Имя клиента' value='{{$entity->userData->crucialData->name ?? ""}}' :link='route("admin.user.show", ["0" => $entity->user_id,])'></x-helper.text.text_key_link>			
<x-helper.text.text_key key='Номер карты' value='{{$entity->plastic->pan ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key='Номер телефона' value='{{$entity->plastic->phone ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>
            </div>			

            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-lg'>{{__('Информация о кредите')}}</span>
                			
<x-helper.text.text_key key='Номер Договора' value='{{$entity->purchase->id ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key='Количество покупок' value='{{$entity->purchase->number_purchase ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key='Сумма договора' value='{{$entity->allToPay() ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key='Первоначальная оплата' value='{{$entity->initial_price ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key='Ежемесячный платеж' value='{{$entity->monthly_paid ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key='Количество месяцев' value='{{$entity->number_month ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key='Процент' value='{{$entity->credit->percent ?? ""}} %' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>
            </div>			
@if($entity->surety) 			

            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-lg'>{{__('Информация о поручители')}}</span>
                			
<x-helper.text.text_key key='Имя' value='{{$entity->surety->crucialData->name ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key='Серия паспорта' value='{{$entity->surety->crucialData->series ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key='ПНФЛ' value='{{$entity->surety->crucialData->pnfl ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key='Телефон' value='{{$entity->surety->phone ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key='Дополнительный номер' value='{{$entity->surety->additional_phone ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key='Дата рождения' value='{{$entity->surety->crucialData->date_of_birth ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key_link key='Паспорт' value='Скачать' :link='route("download.file", ["path"=> $entity->surety->crucialData->passport->path])'></x-helper.text.text_key_link>			
<x-helper.text.text_key_link key='Прописка' value='Скачать' :link='route("download.file", ["path"=> $entity->surety->crucialData->passport_reverse->path])'></x-helper.text.text_key_link>			
<x-helper.text.text_key_link key='Паспорт c пользователем' value='Скачать' :link='route("download.file", ["path"=> $entity->surety->crucialData->user_passport->path])'></x-helper.text.text_key_link>
            </div>			
 @endif			
 @if($entity->purchase->status == 10)  
            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-lg'>{{__('Информация о доставке')}}</span>
                			
<x-helper.text.text_key key='Количество посылок' value='{{$entity->purchase->delivery()->count() ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key='Количество посылок доставлено' value='{{$entity->purchase->delivery()->whereNot("status", 0)->count() ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key='Город доставки' value='{{$entity->purchase->delivery_address->availableCities->cityName ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key='Адрес доставки' value='{{$entity->purchase->delivery_address->street ?? ""}}, {{$entity->purchase->delivery_address->house ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextValueAttribute'></x-helper.text.text_key>
            </div>  @endif			
@if(abs($entity->status)% 10 == 1) 			

            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-lg'>{{__('Состояние')}}</span>
                			
<x-helper.text.text_key key='Сальдо' value='{{$entity->saldo ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.button.base_button 	class='bg-red-600 hover:bg-red-400'>Аннулировать рассрочку</x-helper.button.base_button>
            </div>			
 @endif
            </div>			

            <div 	class='  flex flex-col  space-y-2'>
                			

            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-lg'>{{__('Сведения об оплате')}}</span>
                			
<livewire:admin.pages.taken-credit-edit.monthly-paid-index
            :filterBy="['taken_credit_id' => $entity->id,]" />
            </div>			

            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-lg'>{{__('Комментарии')}}</span>
                			
<livewire:admin.pages.taken-credit-edit.comment-installment-dynamic 
                 parentKey='taken_credit_id'
                :parentId='$entity->id'/>
            </div>			

            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-lg'>{{__('Журнал авто списаний')}}</span>
                			
<livewire:admin.pages.taken-credit-edit.time-schedule-transaction-index
            :filterBy="['taken_credit_id' => $entity->id,]" />
            </div>
            </div>
            </div>			
@if($entity->surety) 			
<livewire:admin.pages.taken-credit-edit.surety-plastic-card-dynamic 
                 parentKey='user_id'
                :parentId='$entity->surety->id'/>			
 @endif			
<x-helper.container.container :title='__("Товары")' 	class='flex flex-col flex flex-wrap justify-between'>
                			
<livewire:admin.pages.taken-credit-edit.purchase-main
            :filterBy="['user_purchase_id' => $entity->purchase_id,]" />
                </x-helper.container.container>
            </div>
        </div>

        <div>
            <x-helper.button.gray_button type="button" href="{{$form->route_back}}" class="p-2">
                {{__("Назад")}}
            </x-helper.button.gray_button>
        </div>
    </div>

@endsection

