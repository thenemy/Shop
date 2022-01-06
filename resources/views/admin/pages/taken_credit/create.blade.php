@extends("admin.layout.create")
@section("action")
    
<x-installment.sum/>

            <div 	class='flex flex-row  space-x-2 w-full items-end'>
                			
<livewire:components.drop-down.drop-down-search-with-relation
            :searchByKey='"phone"'
            dropDownClass='App\Domain\User\Front\Admin\DropDown\UserDropDownRelation'
            
            searchLabel='номеру пользователя'
            
            
        dropDownAssociatedClass='App\Domain\User\Front\Admin\DropDown\PlasticCardDropDownAssociated'
        dispatchClass='App\Domain\Core\Front\Admin\Livewire\Dispatch\Base\Dispatch'
        
             />			
<x-helper.input.input name='initial_price' type='number'
            label='{{__("Первоначальная плата")}}' value='{{old("initial_price") ?? $entity->initial_price ?? " "}}' id='initial_payment'  onkeyup=""/>			
<x-helper.input.input_checked name='payment_type' type='checkbox'
            label='{{__("Уплачен на кассе")}}' value='{{old("payment_type") ?? $entity->payment_type ?? " "}}' id='initial_pay'  onchange=""/>
            </div>
<livewire:components.drop-down.drop-down-search-with-relation
            :searchByKey='"name->" . app()->getLocale()'
            dropDownClass='App\Domain\CreditProduct\Front\Admin\DropDown\MainCreditDropDownRelation'
            
            searchLabel='названию Рассрочки'
            
            
        dropDownAssociatedClass='App\Domain\CreditProduct\Front\Admin\DropDown\CreditDropDownAssociated'
        dispatchClass='App\Domain\Installment\Front\Admin\Dispatch\DispatchCredit'
        
             />

            <div 	class='flex flex-row  space-x-2 border-2 rounded p-2 w-full justify-start'>
                			
<x-helper.input.input_checked name='delivery' type='checkbox'
            label='{{__("Самовызов")}}' value='{{old("delivery") ?? $entity->delivery ?? " "}}' id='payment_type'  onchange="$dispatch('delivery-update', {
               data:{
                    value: event.target.value
               }
            })"/>
            </div>

            <div 	class='flex flex-col  space-y-2 border-2 rounded p-2 w-full items-start'>
                			
<x-helper.input.input_checked name='surety' type='checkbox'
            label='{{__("Поручитель")}}' value='{{old("surety") ?? $entity->surety ?? " "}}' id='surety_check'  onchange="$dispatch('surety-update', {
               data:{
                    value: event.target.value
               }
            })"/>			

            <div 	x-data='{show: false}'	class='w-full'>
                			

            <div 	x-show='show'	@surety-update.window='show = !show'>
                			
<x-helper.container.container :title='__("Добавить")' 	class='flex flex-wrap justify-between'>
                			

<x-helper.input.input name='surety->phone' type='text'
            label='{{__("Телефон пользователя")}}' value='{{old("surety->phone") ?? $entity->surety->phone ?? " "}}' id='surety->phone'  onkeyup=""/>
<x-helper.input.input name='surety->additional_phone' type='text'
            label='{{__("Дополнительный телефон")}}' value='{{old("surety->additional_phone") ?? $entity->surety->additional_phone ?? " "}}' id='surety->additional_phone'  onkeyup=""/>
<x-helper.input.input name='surety->crucialData->firstname' type='text'
            label='{{__("Имя пользователя")}}' value='{{old("surety->crucialData->firstname") ?? $entity->surety->crucialData->firstname ?? " "}}' id='surety->crucialData->firstname'  onkeyup=""/>
<x-helper.input.input name='surety->crucialData->lastname' type='text'
            label='{{__("Фамилия пользователя")}}' value='{{old("surety->crucialData->lastname") ?? $entity->surety->crucialData->lastname ?? " "}}' id='surety->crucialData->lastname'  onkeyup=""/>
<x-helper.input.input name='surety->crucialData->father_name' type='text'
            label='{{__("Отчество пользователя")}}' value='{{old("surety->crucialData->father_name") ?? $entity->surety->crucialData->father_name ?? " "}}' id='surety->crucialData->father_name'  onkeyup=""/>
<x-helper.input.input name='surety->crucialData->series' type='text'
            label='{{__("Паспорт серия")}}' value='{{old("surety->crucialData->series") ?? $entity->surety->crucialData->series ?? " "}}' id='surety->crucialData->series'  onkeyup=""/>
<x-helper.input.input name='surety->crucialData->pnfl' type='text'
            label='{{__("ПНФЛ")}}' value='{{old("surety->crucialData->pnfl") ?? $entity->surety->crucialData->pnfl ?? " "}}' id='surety->crucialData->pnfl'  onkeyup=""/>
<x-helper.input.input name='surety->crucialData->date_of_birth' type='date'
            label='{{__("Дата рождения")}}' value='{{old("surety->crucialData->date_of_birth") ?? $entity->surety->crucialData->date_of_birth ?? " "}}' id='surety->crucialData->date_of_birth'  onkeyup=""/>
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
            </div>
            </div>
            </div>
<livewire:admin.pages.taken-credit.product-installment-nested
                keyToAttach='products'
                dispatchClass='App\Domain\Installment\Front\Admin\Dispatch\DispatchProduct'
                additionalAction='App\Domain\Product\Product\Front\Admin\AdditionalActions\GenerateRuleProductAdditionalAction'
                />
@endsection
