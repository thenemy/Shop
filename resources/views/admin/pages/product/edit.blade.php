@extends("admin.layout.edit")
@section("action")
    

            <div class='flex flex-col w-full space-y-1'>
            <x-helper.text.pre_title class='self-start'>
            Введите название
            </x-helper.text.pre_title>
            <div class=' flex flex-row space-x-2'>
                 
           <x-helper.input.input name='title[ru]'  label='на русском языке' value='{{$entity->title}}['ru']'/>
        
           <x-helper.input.input name='title[uz]'  label='o`zbek tilda' value='{{$entity->title}}['uz']'/>
        
           <x-helper.input.input name='title[en]'  label='in english' value='{{$entity->title}}['en']'/>
        
             </div>
            </div>
            
<x-helper.input.input name='price' type='number'  label='Введите цену' value='{{$entity->price}}'/>
<x-helper.drop_down.drop_down :drop='\App\Domain\Product\Product\Front\Admin\DropDown\CurrencyDropDown::getDropDown($entity->currency)'/>
<x-helper.input.input name='number' type='number'  label='Введите колиство данного товара' value='{{$entity->number}}'/>
<livewire:components.drop-down.drop-down-search
            searchByKey='name'
            dropDownClass='App\Domain\Category\Front\Admin\DropDown\CategoryDropDownSearch'
            :initial="$entity->category_id"
            searchLabel='названию Категорий'
             />
<livewire:components.drop-down.drop-down-search
            searchByKey='name'
            dropDownClass='App\Domain\Shop\Front\Admin\DropDown\ShopDropDownSearch'
            :initial="$entity->shop_id"
            searchLabel='названию магазина'
             />
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='image_product'
                    entityClass='App\Domain\Product\Product\Front\Main\ProductEdit'
                    :multiple='true'
                    label='Картинки для товара'
                     />
@endsection
