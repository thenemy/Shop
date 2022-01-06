@extends("admin.layout.edit")
@section("action")
    
<livewire:components.drop-down.drop-down-search
            :searchByKey='"name"'
            dropDownClass='App\Domain\Category\Front\Admin\DropDown\CategoryDropDownSearch'
            :initial='$entity->category_id'
            searchLabel='названию Категорий'
            
            
             />
<livewire:components.drop-down.drop-down-search
            :searchByKey='"name"'
            dropDownClass='App\Domain\Shop\Front\Admin\DropDown\ShopDropDownSearch'
            :initial='$entity->shop_id'
            searchLabel='названию магазина'
            
            
             />
<livewire:components.drop-down.drop-down-search
            :searchByKey='"brand"'
            dropDownClass='App\Domain\Common\Brands\Front\Admin\DropDown\BrandDropDownSearch'
            :initial='$entity->brand_id'
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
<x-helper.drop_down.drop_down :drop='\App\Domain\Product\Product\Front\Admin\DropDown\CurrencyDropDown::getDropDown($entity->currency)' />
<x-helper.input.input name='price' type='number'
            label='{{__("Введите цену")}}' value='{{old("price") ?? $entity->price ?? " "}}' id='price'  onkeyup=""/>
<x-helper.input.input name='percentage' type='number'
            label='{{__("Укажите скидку (%)")}}' value='{{old("percentage") ?? $entity->percentage ?? " "}}' id='percentage'  onkeyup=""/>
<x-helper.input.input name='weight' type='number'
            label='{{__("Введите вес(кг)")}}' value='{{old("weight") ?? $entity->weight ?? " "}}' id='weight'  onkeyup=""/>
<x-helper.input.input_checked name='productDay->checked' type='checkbox'
            label='{{__("Продукт дня")}}' value='{{old("productDay->checked") ?? $entity->productDay->checked ?? " "}}' id='productDay->checked'  onchange=""/>
<x-helper.input.input_checked name='productHit->checked' type='checkbox'
            label='{{__("Хит продаж")}}' value='{{old("productHit->checked") ?? $entity->productHit->checked ?? " "}}' id='productHit->checked'  onchange=""/>
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='image_main'
                    entityClass='App\Domain\Product\Product\Front\Main\ProductEdit'
                    :multiple='false'
                    label='Главная картинка'
                     />
<livewire:components.file.file-uploading
                    :entityId='$entity->id'
                    mediaKey='image_product'
                    entityClass='App\Domain\Product\Product\Front\Main\ProductEdit'
                    :multiple='true'
                    label='Картинки для товара'
                     />
<livewire:admin.pages.product-edit.main-credit-nested
                :attachEntityId='$entity->id'
                :attachEntity='get_class($entity)'
                keyToAttach='acceptMainCredit'
                :filterBy='["product_id" => "$entity->id"]'
                dispatchClass='App\Domain\Core\Front\Admin\Livewire\Dispatch\Base\Dispatch'
                additionalAction='App\Domain\Core\Front\Admin\Livewire\AdditionalActions\Base\AdditionalActions'
                />
<x-helper.container.container :title='__("Большое описание")' 	class='space-y-4 flex flex-wrap justify-between'>
                			

            <div class='flex flex-col w-full space-y-1'>
            <x-helper.text.pre_title class='self-start'>
            Введите заголовок
            </x-helper.text.pre_title>
                 <div class=' flex flex-row space-x-2'>
                 <x-helper.input.input name='description->header[ru]'  label='{{__("на русском языке")}}' value='{{old("description->header") ? old("description->header")["ru"] ?? $entity->description->header["ru"] ?? " " : $entity->description->header["ru"] ?? " "}}'/><x-helper.input.input name='description->header[uz]'  label='{{__("o`zbek tilda")}}' value='{{old("description->header") ? old("description->header")["uz"] ?? $entity->description->header["uz"] ?? " " : $entity->description->header["uz"] ?? " "}}'/><x-helper.input.input name='description->header[en]'  label='{{__("in english")}}' value='{{old("description->header") ? old("description->header")["en"] ?? $entity->description->header["en"] ?? " " : $entity->description->header["en"] ?? " "}}'/>
             </div>
            </div>
            			

            <div class='flex flex-col w-full space-y-1'>
            <x-helper.text.pre_title class='self-start'>
            Введите описание
            </x-helper.text.pre_title>
                <div class='space-y-2'><x-helper.text_area.text_area  name='description->body[ru]'  label='{{__("на русском языке")}}'>{{old("description->body") ? old("description->body")["ru"] ?? $entity->description->body["ru"] ?? " " : $entity->description->body["ru"] ?? " "}}</x-helper.text_area.text_area><x-helper.text_area.text_area  name='description->body[uz]'  label='{{__("o`zbek tilda")}}'>{{old("description->body") ? old("description->body")["uz"] ?? $entity->description->body["uz"] ?? " " : $entity->description->body["uz"] ?? " "}}</x-helper.text_area.text_area><x-helper.text_area.text_area  name='description->body[en]'  label='{{__("in english")}}'>{{old("description->body") ? old("description->body")["en"] ?? $entity->description->body["en"] ?? " " : $entity->description->body["en"] ?? " "}}</x-helper.text_area.text_area></div>
            </div>
            
                </x-helper.container.container>
<livewire:admin.pages.product-edit.product-edit   :entity='$entity ?? null'
            prefixKey='colors' initialSettingClass='App\Domain\Product\Product\Front\ComplexFactoring\ColorComplexFactoring'/>
@endsection
