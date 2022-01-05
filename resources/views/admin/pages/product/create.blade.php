@extends("admin.layout.create")
@section("action")
    
<livewire:components.drop-down.drop-down-search
            :searchByKey='"name"'
            dropDownClass='App\Domain\Category\Front\Admin\DropDown\CategoryDropDownSearch'
            
            searchLabel='названию Категорий'
            
            
             />
<livewire:components.drop-down.drop-down-search
            :searchByKey='"name"'
            dropDownClass='App\Domain\Shop\Front\Admin\DropDown\ShopDropDownSearch'
            
            searchLabel='названию магазина'
            
            
             />
<livewire:components.drop-down.drop-down-search
            :searchByKey='"brand"'
            dropDownClass='App\Domain\Common\Brands\Front\Admin\DropDown\BrandDropDownSearch'
            
            searchLabel='названию Брэнда'
            
            
             />

            <div class='flex flex-col w-full space-y-1'>
            <x-helper.text.pre_title class='self-start'>
            Введите название
            </x-helper.text.pre_title>
                 <div class=' flex flex-row space-x-2'>
                 <x-helper.input.input name='title[ru]'  label='{{__("на русском языке")}}' value='{{old("title") ? old("title")["ru"] ?? $entity->title["ru"] ?? " " : $entity->title["ru"] ?? " "}}'/><x-helper.input.input name='title[uz]'  label='{{__("o`zbek tilda")}}' value='{{old("title") ? old("title")["uz"] ?? $entity->title["uz"] ?? " " : $entity->title["uz"] ?? " "}}'/><x-helper.input.input name='title[en]'  label='{{__("in english")}}' value='{{old("title") ? old("title")["en"] ?? $entity->title["en"] ?? " " : $entity->title["en"] ?? " "}}'/>
             </div>
            </div>
            
<x-helper.input.input name='number' type='number'
            label='{{__("Введите количество данного товара")}}' value='{{old("number") ?? $entity->number ?? " "}}' id='number'  onkeyup=""/>
<x-helper.drop_down.drop_down :drop='\App\Domain\Product\Product\Front\Admin\DropDown\CurrencyDropDown::getDropDown()' />
<x-helper.input.input name='price' type='number'
            label='{{__("Введите цену")}}' value='{{old("price") ?? $entity->price ?? " "}}' id='price'  onkeyup=""/>
<x-helper.input.input name='percentage' type='number'
            label='{{__("Укажите скидку (%)")}}' value='{{old("percentage") ?? $entity->percentage ?? " "}}' id='percentage'  onkeyup=""/>
<x-helper.input.input name='weight' type='number'
            label='{{__("Введите вес")}}' value='{{old("weight") ?? $entity->weight ?? " "}}' id='weight'  onkeyup=""/>
<x-helper.input.input_checked name='productDay->checked' type='checkbox'
            label='{{__("Продукт дня")}}' value='{{old("productDay->checked") ?? $entity->productDay->checked ?? " "}}' id='productDay->checked'  onchange=""/>
<x-helper.input.input_checked name='productHit->checked' type='checkbox'
            label='{{__("Хит продаж")}}' value='{{old("productHit->checked") ?? $entity->productHit->checked ?? " "}}' id='productHit->checked'  onchange=""/>
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='productImageHeader->image'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Главная картинка")'
                    :entityId='old("file->id_file->productImageHeader->image") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='productImage->image'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileManyTemp'
                    :multiple='true'
                    :label='__("Картинки")'
                    :entityId='old("file->id_file->productImage->image") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
<livewire:admin.pages.product-create.main-credit-nested
                keyToAttach='mainCredit'
                dispatchClass='App\Domain\Core\Front\Admin\Livewire\Dispatch\Base\Dispatch'
                additionalAction='App\Domain\Core\Front\Admin\Livewire\AdditionalActions\Base\AdditionalActions'
                />
<x-helper.container.container :title='__("Большое описание")' 	class='space-y-4 flex flex-wrap justify-between'>
                			

            <div class='flex flex-col w-full space-y-1'>
            <x-helper.text.pre_title class='self-start'>
            Введите заголовок
            </x-helper.text.pre_title>
                 <div class=' flex flex-row space-x-2'>
                 <x-helper.input.input name='bodies->text[ru]'  label='{{__("на русском языке")}}' value='{{old("bodies->text") ? old("bodies->text")["ru"] ?? $entity->bodies->text["ru"] ?? " " : $entity->bodies->text["ru"] ?? " "}}'/><x-helper.input.input name='bodies->text[uz]'  label='{{__("o`zbek tilda")}}' value='{{old("bodies->text") ? old("bodies->text")["uz"] ?? $entity->bodies->text["uz"] ?? " " : $entity->bodies->text["uz"] ?? " "}}'/><x-helper.input.input name='bodies->text[en]'  label='{{__("in english")}}' value='{{old("bodies->text") ? old("bodies->text")["en"] ?? $entity->bodies->text["en"] ?? " " : $entity->bodies->text["en"] ?? " "}}'/>
             </div>
            </div>
            			

            <div class='flex flex-col w-full space-y-1'>
            <x-helper.text.pre_title class='self-start'>
            Введите описание
            </x-helper.text.pre_title>
                <div class='space-y-2'><x-helper.text_area.text_area  name='bodies->body->text[ru]'  label='{{__("на русском языке")}}'>{{old("bodies->body->text") ? old("bodies->body->text")["ru"] ?? $entity->bodies->body->text["ru"] ?? " " : $entity->bodies->body->text["ru"] ?? " "}}</x-helper.text_area.text_area><x-helper.text_area.text_area  name='bodies->body->text[uz]'  label='{{__("o`zbek tilda")}}'>{{old("bodies->body->text") ? old("bodies->body->text")["uz"] ?? $entity->bodies->body->text["uz"] ?? " " : $entity->bodies->body->text["uz"] ?? " "}}</x-helper.text_area.text_area><x-helper.text_area.text_area  name='bodies->body->text[en]'  label='{{__("in english")}}'>{{old("bodies->body->text") ? old("bodies->body->text")["en"] ?? $entity->bodies->body->text["en"] ?? " " : $entity->bodies->body->text["en"] ?? " "}}</x-helper.text_area.text_area></div>
            </div>
            
                </x-helper.container.container>
<livewire:admin.pages.product.product-create   :entity='$entity ?? null'
            prefixKey='colors' initialSettingClass=''/>
@endsection
