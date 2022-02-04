@extends("admin.layout.create")
@section("action")
    
<x-helper.input.input name='name' type='text'
            label='{{__("Имя Магазина")}}' value='{{old("name") ?? $entity->name ?? " "}}' id='name'  onkeyup="" />
<x-helper.input.input name='user->phone' type='text'
            label='{{__("Телефон пользователя")}}' value='{{old("user->phone") ?? $entity->user->phone ?? " "}}' id='user->phone'  onkeyup="" />
<x-helper.input.input name='user->password' type='password'
            label='{{__("Пароль")}}' value='' id='user->password'  onkeyup="" />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='image'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Фото магазина")'
                    :entityId='old("file->id_file->image") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='logo'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Лого Магазина")'
                    :entityId='old("file->id_file->logo") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='document'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Документы")'
                    :entityId='old("file->id_file->document") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='licence'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Лицензия")'
                    :entityId='old("file->id_file->licence") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='director_passport'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Паспорт директора")'
                    :entityId='old("file->id_file->director_passport") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
<x-helper.container.container :title='__("Адрес")' 	class='space-y-5 flex flex-wrap justify-between'>
                			
<livewire:components.drop-down.drop-down-search
            :searchByKey='"cityName"'
            dropDownClass='App\Domain\Shop\Front\Admin\DropDown\ShopAvailableCitiesDropDownSearch'
            
            searchLabel='названию городу'
            
            
             />			

            <div 	class='flex flex-wrap justify-between items-around'>
                			
<x-helper.input.input name='shopAddress->longitude' type='number'
            label='{{__("Долгота")}}' value='{{old("shopAddress->longitude") ?? $entity->shopAddress->longitude ?? " "}}' id='shopAddress->longitude'  onkeyup="" />			
<x-helper.input.input name='shopAddress->latitude' type='number'
            label='{{__("Широта")}}' value='{{old("shopAddress->latitude") ?? $entity->shopAddress->latitude ?? " "}}' id='shopAddress->latitude'  onkeyup="" />			
<x-helper.input.input name='shopAddress->delivery->index' type='number'
            label='{{__("Индекс")}}' value='{{old("shopAddress->delivery->index") ?? $entity->shopAddress->delivery->index ?? " "}}' id='shopAddress->delivery->index'  onkeyup="" />			
<x-helper.input.input name='shopAddress->delivery->street' type='text'
            label='{{__("Улица")}}' value='{{old("shopAddress->delivery->street") ?? $entity->shopAddress->delivery->street ?? " "}}' id='shopAddress->delivery->street'  onkeyup="" />			
<x-helper.input.input name='shopAddress->delivery->house' type='number'
            label='{{__("Номер дома")}}' value='{{old("shopAddress->delivery->house") ?? $entity->shopAddress->delivery->house ?? " "}}' id='shopAddress->delivery->house'  onkeyup="" />
            </div>			
<x-helper.text_area.text_area name='shopAddress->delivery->instructions' label='Инструкции для курьера'>{{old("shopAddress->delivery->instructions") ?? $entity->shopAddress->delivery->instructions ?? " "}}</x-helper.text_area.text_area>			
<livewire:admin.pages.shop-create.work-times-dynamic-without-entity />
                </x-helper.container.container>
@endsection
