@extends("admin.layout.edit")
@section("action")
    
<x-helper.input.input name='name' type='text'
            label='{{__("Имя Магазина")}}' value='{{old("name") ?? $entity->name ?? " "}}' id='name'  onkeyup=""/>
<x-helper.input.input name='user->phone' type='text'
            label='{{__("Телефон пользователя")}}' value='{{old("user->phone") ?? $entity->user->phone ?? " "}}' id='user->phone'  onkeyup=""/>
<x-helper.input.input name='user->password' type='password'
            label='{{__("Пароль")}}' value='' id='user->password'  onkeyup=""/>
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='image_file'
                    entityClass='App\Domain\Shop\Front\Main\ShopEdit'
                    :multiple='false'
                    label='Фото магазина'
                     />
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='logo_file'
                    entityClass='App\Domain\Shop\Front\Main\ShopEdit'
                    :multiple='false'
                    label='Лого Магазина'
                     />
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='document_file'
                    entityClass='App\Domain\Shop\Front\Main\ShopEdit'
                    :multiple='false'
                    label='Документы'
                     />
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='licence_file'
                    entityClass='App\Domain\Shop\Front\Main\ShopEdit'
                    :multiple='false'
                    label='Лицензия'
                     />
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='passport_file'
                    entityClass='App\Domain\Shop\Front\Main\ShopEdit'
                    :multiple='false'
                    label='Паспорт директора'
                     />
<x-helper.container.container :title='__("Адрес")' 	class='space-y-5 flex flex-wrap justify-between'>
                			
<livewire:components.drop-down.drop-down-search
            :searchByKey='"cityName"'
            dropDownClass='App\Domain\Shop\Front\Admin\DropDown\ShopAvailableCitiesDropDownSearch'
            :initial='$entity->shopAddress->delivery->city_id'
            searchLabel='названию городу'
            
            
             />			

            <div 	class='flex flex-wrap justify-between items-around'>
                			
<x-helper.input.input name='shopAddress->longitude' type='number'
            label='{{__("Долгота")}}' value='{{old("shopAddress->longitude") ?? $entity->shopAddress->longitude ?? " "}}' id='shopAddress->longitude'  onkeyup=""/>			
<x-helper.input.input name='shopAddress->latitude' type='number'
            label='{{__("Широта")}}' value='{{old("shopAddress->latitude") ?? $entity->shopAddress->latitude ?? " "}}' id='shopAddress->latitude'  onkeyup=""/>			
<x-helper.input.input name='shopAddress->delivery->index' type='number'
            label='{{__("Индекс")}}' value='{{old("shopAddress->delivery->index") ?? $entity->shopAddress->delivery->index ?? " "}}' id='shopAddress->delivery->index'  onkeyup=""/>			
<x-helper.input.input name='shopAddress->delivery->street' type='text'
            label='{{__("Улица")}}' value='{{old("shopAddress->delivery->street") ?? $entity->shopAddress->delivery->street ?? " "}}' id='shopAddress->delivery->street'  onkeyup=""/>			
<x-helper.input.input name='shopAddress->delivery->house' type='number'
            label='{{__("Номер дома")}}' value='{{old("shopAddress->delivery->house") ?? $entity->shopAddress->delivery->house ?? " "}}' id='shopAddress->delivery->house'  onkeyup=""/>
            </div>			
<x-helper.text_area.text_area name='shopAddress->delivery->instructions' label='Инструкции для курьера'>{{old("shopAddress->delivery->instructions") ?? $entity->shopAddress->delivery->instructions ?? " "}}</x-helper.text_area.text_area>			
<livewire:admin.pages.shop-create.work-times-dynamic 
                 parentKey='shop_address_id'
                :parentId='$entity->shopAddress->shop_address_id'/>
                </x-helper.container.container>
@endsection
