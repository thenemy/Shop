@extends("layout.admin_layout")
@section("content")

    {{--    test blade  create template then fill with variables --}}
    <div x-data="setInitWidth()"
         @sidebar-event.window="setWidth($event)"
         class="flex flex-col space-y-3">
        {{--    insert there new created livewire--}}
        {{--    give the title--}}
        <x-helper.text.title>{{ __("Информация о рассрочке  #") . $entity->purchase_id ?? $form->title}}</x-helper.text.title>
        <hr class="border-dashed border-title_color"/>
        {{--    insert name of the breadcrumbs and the arguments--}}
        <div class="w-full ">
            

            <div 	class='space-y-4 mr-4'>
                			

            <div 	class='w-full flex flex-row  space-x-2'>
                			

            <div 	class='basis-5/12  flex flex-col  space-y-2'>
                			

            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-[1.09rem]'>{{__('Информация о клиенте')}}</span>
                			
<x-helper.text.text_key_link key='Имя клиента' value='{{$entity->userData->crucialData->name ?? ""}}' :link='route("admin.user.show", ["0" => $entity->user_id,])'></x-helper.text.text_key_link>			
<x-helper.text.text_key key="Номер телефона" value='{{$entity->plastic->phone ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key="Номер карты" value='{{$entity->plastic->card_number ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>
            </div>			

            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-[1.09rem]'>{{__('Информация о кредите')}}</span>
                			
<x-helper.text.text_key key="Номер Договора" value='{{$entity->purchase->id ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key="Количество покупок" value='{{$entity->purchase->number_purchase ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key="Сумма договора" value='{{ $entity->allToPay() . " сум "   . " ( " .  $entity->initial_price . " сум " . __("первоначальный") . ")" }} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextValueAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key="Первоначальная оплата" value='{{$entity->initial_price ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key="Ежемесячный платеж" value='{{$entity->monthly_paid ?? ""}} сум "{{$entity->nextPayDate() ?? ""}}"  ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextValueAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key="Количество месяцев" value='{{$entity->number_month ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key="Процент" value='{{$entity->credit->percent ?? ""}} %' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>
            </div>			
@if($entity->surety) 			

            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-[1.09rem]'>{{__('Информация о поручители')}}</span>
                			
<x-helper.text.text_key key="Имя" value='{{$entity->surety->crucialData->name ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key="Серия паспорта" value='{{$entity->surety->crucialData->series ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key="ПНФЛ" value='{{$entity->surety->crucialData->pnfl ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key="Телефон" value='{{$entity->surety->phone ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key="Дополнительный номер" value='{{$entity->surety->additional_phone ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key="Дата рождения" value='{{$entity->surety->crucialData->date_of_birth ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key_link key='Паспорт' value='Скачать' :link='route("download.file", ["path"=> $entity->surety->crucialData->passport->path])'></x-helper.text.text_key_link>			
<x-helper.text.text_key_link key='Прописка' value='Скачать' :link='route("download.file", ["path"=> $entity->surety->crucialData->passport_reverse->path])'></x-helper.text.text_key_link>			
<x-helper.text.text_key_link key='Паспорт c пользователем' value='Скачать' :link='route("download.file", ["path"=> $entity->surety->crucialData->user_passport->path])'></x-helper.text.text_key_link>
            </div>			
 @endif			

            <div >
                			
@if($entity->purchase->isDelivery()) 			

            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-[1.09rem]'>{{__('Информация о доставке')}}</span>
                			
@if($entity->purchase->delivery()->exists()) 			
<x-helper.text.text_key key="{{__('Количество посылок')}}" value='{{$entity->purchase->deliveryCount() ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key="Количество посылок доставлено" value='{{$entity->purchase->deliveredCount() ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
 @endif			
<x-helper.text.text_key key="{{__('Индекс')}}" value='{{$entity->purchase->delivery_address->index ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextValueAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key="{{__('Регион')}}" value='{{$entity->purchase->delivery_address->availableCities->RegionNameCurrent ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key="{{__('Город доставки')}}" value='{{$entity->purchase->delivery_address->availableCities->cityNameCurrent ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key="{{__('Адрес доставки')}}" value='{{$entity->purchase->delivery_address->street ?? ""}}, {{$entity->purchase->delivery_address->house ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextValueAttribute'></x-helper.text.text_key>			
<x-helper.text.text_key key="{{__('Специальные указания для курьера')}}" value='{{$entity->purchase->delivery_address->instructions ?? ""}} ' class_value='App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextValueAttribute'></x-helper.text.text_key>
            </div>			
 @endif
            </div>			
<livewire:admin.pages.condition-attribute.condition-attribute   :entity='$entity'/>
            </div>			

            <div 	class='flex-1  flex flex-col  space-y-2'>
                			

            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-[1.09rem]'>{{__('Сведения об оплате')}}</span>
                			
<livewire:admin.pages.taken-credit-edit.monthly-paid-index
            :filterBy="['taken_credit_id' => $entity->id,]" />
            </div>			

            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-[1.09rem]'>{{__('Комментарии')}}</span>
                			
<livewire:admin.pages.taken-credit-edit.comment-installment-dynamic 
        
                 parentKey='taken_credit_id'
                :parentId='$entity->id'/>
            </div>			

            <div 	class=' border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-[1.09rem]'>{{__('Журнал авто списаний')}}</span>
                			
<livewire:admin.pages.taken-credit-edit.time-schedule-transaction-index
            :filterBy="['taken_credit_id' => $entity->id,]" />
            </div>
            </div>
            </div>			
<x-helper.container.container :title='__("Товары")' 	class='flex flex-col flex flex-wrap justify-between'>
                			
<livewire:admin.pages.taken-credit-edit.purchase-main
            :filterBy="['user_purchase_id' => $entity->purchase_id,]" />
                </x-helper.container.container>			
<livewire:admin.pages.taken-credit-edit.plastic-card-taken-credit-dynamic 
        
                 parentKey='taken_credit_id'
                :parentId='$entity->id'/>			
<x-helper.container.container :title='__("Добавить поручателя")' 	class='flex flex-wrap justify-between'>
                			

<x-helper.input.input name='surety->phone' type='text'
            label='{{__("Телефон пользователя")}}' value='{{old("surety->phone") ?? $entity->surety->phone ?? " "}}' id='surety->phone'  onkeyup="" />
<x-helper.input.input name='surety->additional_phone' type='text'
            label='{{__("Дополнительный телефон")}}' value='{{old("surety->additional_phone") ?? $entity->surety->additional_phone ?? " "}}' id='surety->additional_phone'  onkeyup="" />
<x-helper.input.input name='surety->crucialData->firstname' type='text'
            label='{{__("Имя пользователя")}}' value='{{old("surety->crucialData->firstname") ?? $entity->surety->crucialData->firstname ?? " "}}' id='surety->crucialData->firstname'  onkeyup="" />
<x-helper.input.input name='surety->crucialData->lastname' type='text'
            label='{{__("Фамилия пользователя")}}' value='{{old("surety->crucialData->lastname") ?? $entity->surety->crucialData->lastname ?? " "}}' id='surety->crucialData->lastname'  onkeyup="" />
<x-helper.input.input name='surety->crucialData->father_name' type='text'
            label='{{__("Отчество пользователя")}}' value='{{old("surety->crucialData->father_name") ?? $entity->surety->crucialData->father_name ?? " "}}' id='surety->crucialData->father_name'  onkeyup="" />
<x-helper.input.input name='surety->crucialData->series' type='text'
            label='{{__("Паспорт серия")}}' value='{{old("surety->crucialData->series") ?? $entity->surety->crucialData->series ?? " "}}' id='surety->crucialData->series'  onkeyup="" />
<x-helper.input.input name='surety->crucialData->pnfl' type='text'
            label='{{__("ПНФЛ")}}' value='{{old("surety->crucialData->pnfl") ?? $entity->surety->crucialData->pnfl ?? " "}}' id='surety->crucialData->pnfl'  onkeyup="" />
<x-helper.input.input name='surety->crucialData->date_of_birth' type='date'
            label='{{__("Дата рождения")}}' value='{{old("surety->crucialData->date_of_birth") ?? $entity->surety->crucialData->date_of_birth ?? " "}}' id='surety->crucialData->date_of_birth'  onkeyup="" />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='surety->crucialData->passport_reverse'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Прописка")'
                    :entityId='old("file->id_file->surety->crucialData->passport_reverse") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='surety->crucialData->user_passport'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Паспорт c пользователем")'
                    :entityId='old("file->id_file->surety->crucialData->user_passport") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='surety->crucialData->passport'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Паспорт пользователя")'
                    :entityId='old("file->id_file->surety->crucialData->passport") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
                </x-helper.container.container>			
<livewire:admin.pages.decision-attribute.decision-attribute   :entity='$entity'/>
            </div>
        </div>

        <div>
            <x-helper.button.gray_button type="button" href="{{$form->route_back}}" class="p-2">
                {{__("Назад")}}
            </x-helper.button.gray_button>
        </div>
    </div>

@endsection

