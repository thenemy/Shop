@extends("admin.layout.create")
@section("action")
    

            <div class='flex flex-col w-full space-y-1'>
            <x-helper.text.pre_title class='self-start'>
            Введите название
            </x-helper.text.pre_title>
            <div class=' flex flex-row space-x-2'>
                 
           <x-helper.input.input name='title[ru]'  label='на русском языке' value='{{old("title") ? old("title")["ru"] ?? "" : ""}}'/>
        
           <x-helper.input.input name='title[uz]'  label='o`zbek tilda' value='{{old("title") ? old("title")["uz"] ?? "" : ""}}'/>
        
           <x-helper.input.input name='title[en]'  label='in english' value='{{old("title") ? old("title")["en"] ?? "" : ""}}'/>
        
             </div>
            </div>
            
<x-helper.input.input name='price' type='number'  label='Введите цену' value='{{old("price") ?? ""}}'/>
<x-helper.drop_down.drop_down :drop='\App\Domain\Product\Product\Front\Admin\DropDown\CurrencyDropDown::getDropDown()'/>
<x-helper.input.input name='number' type='number'  label='Введите колиство данного товара' value='{{old("number") ?? ""}}'/>
<livewire:components.drop-down.drop-down-search
            searchByKey='name'
            dropDownClass='App\Domain\Category\Front\Admin\DropDown\CategoryDropDownSearch'
            
            searchLabel='названию Категорий'
             />
<livewire:components.drop-down.drop-down-search
            searchByKey='name'
            dropDownClass='App\Domain\Shop\Front\Admin\DropDown\ShopDropDownSearch'
            
            searchLabel='названию магазина'
             />
@endsection
