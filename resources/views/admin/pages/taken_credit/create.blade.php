@extends("admin.layout.create")
@section("action")
    
<x-installment.sum/>

            <div class='flex flex-row space-x-2 w-full items-end'>
                			
<livewire:components.drop-down.drop-down-search-with-relation
            searchByKey='phone'
            dropDownClass='App\Domain\User\Front\Admin\DropDown\UserDropDownRelation'
            
            searchLabel='номеру пользователя'
            
        dropDownAssociatedClass='App\Domain\User\Front\Admin\DropDown\PlasticCardDropDownAssociated'
        dispatchClass='App\Domain\Core\Front\Admin\Livewire\Dispatch\Base\Dispatch'
        
             />			
<x-helper.input.input name='initial_price' type='number'
            label='Первоначальная плата' value='{{old("initial_price") ?? ""}}' id='initial_payment' onkeyup="$dispatch('pay-update', {
               data:{
                    value: event.target.value
               }
            })" />			
<x-helper.input.input name='payment_type' type='checkbox'
            label='Уплачен на кассе' value='{{old("payment_type") ?? ""}}' id='payment_type' onkeyup="" />
            </div>
<livewire:components.drop-down.drop-down-search-with-relation
            searchByKey='name'
            dropDownClass='App\Domain\CreditProduct\Front\Admin\DropDown\MainCreditDropDownRelation'
            
            searchLabel='названию Рассрочки'
            
        dropDownAssociatedClass='App\Domain\CreditProduct\Front\Admin\DropDown\CreditDropDownAssociated'
        dispatchClass='App\Domain\Installment\Front\Admin\Dispatch\DispatchCredit'
        
             />

            <div class='flex flex-row space-x-2 border-2 rounded p-2 w-full justify-start'>
                			
<x-helper.input.input name='delivery' type='checkbox'
            label='Самовызов' value='{{old("delivery") ?? ""}}' id='payment_type' onkeyup="$dispatch('delivery-update', {
               data:{
                    value: event.target.value
               }
            })" />
            </div>
<livewire:admin.pages.taken-credit.product-installment-nested
                keyToAttach='products'
                dispatchClass='App\Domain\Installment\Front\Admin\Dispatch\DispatchProduct'
                additionalAction='App\Domain\Product\Product\Front\Admin\AdditionalActions\GenerateRuleProductAdditionalAction'
                />
<x-helper.container.container title='Поручитель' class='flex flex-wrap justify-between'>
                			

<x-helper.input.input name='surety->phone' type='text'
            label='Телефон пользователя' value='{{old("surety->phone") ?? ""}}' id='' onkeyup="" />
<x-helper.input.input name='surety->additional_phone' type='text'
            label='Дополнительный телефон' value='{{old("surety->additional_phone") ?? ""}}' id='' onkeyup="" />
<x-helper.input.input name='surety->crucialData->firstname' type='text'
            label='Имя пользователя' value='{{old("surety->crucialData->firstname") ?? ""}}' id='' onkeyup="" />
<x-helper.input.input name='surety->crucialData->lastname' type='text'
            label='Фамилия пользователя' value='{{old("surety->crucialData->lastname") ?? ""}}' id='' onkeyup="" />
<x-helper.input.input name='surety->crucialData->father_name' type='text'
            label='Отчество пользователя' value='{{old("surety->crucialData->father_name") ?? ""}}' id='' onkeyup="" />
<x-helper.input.input name='surety->crucialData->series' type='text'
            label='Паспорт серия' value='{{old("surety->crucialData->series") ?? ""}}' id='' onkeyup="" />
<x-helper.input.input name='surety->crucialData->pnfl' type='text'
            label='ПНФЛ' value='{{old("surety->crucialData->pnfl") ?? ""}}' id='' onkeyup="" />
<x-helper.input.input name='surety->crucialData->date_of_birth' type='date'
            label='Дата рождения' value='{{old("surety->crucialData->date_of_birth") ?? ""}}' id='' onkeyup="" />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='surety->crucialData->passport_reverse'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    label='Прописка'
                    :entityId='old("file->id_file->surety->crucialData->passport_reverse") ?? ""'
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='surety->crucialData->user_passport'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    label='Паспорт c пользователем'
                    :entityId='old("file->id_file->surety->crucialData->user_passport") ?? ""'
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='surety->crucialData->passport'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    label='Паспорт пользователя'
                    :entityId='old("file->id_file->surety->crucialData->passport") ?? ""'
                     />
                </x-helper.container.container>
@endsection
