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

            <x-helper.input.input name='title[ru]' label='на русском языке'
                                  value='{{old("title") ? old("title")["ru"] ?? "" : ""}}'/>

            <x-helper.input.input name='title[uz]' label='o`zbek tilda'
                                  value='{{old("title") ? old("title")["uz"] ?? "" : ""}}'/>

            <x-helper.input.input name='title[en]' label='in english'
                                  value='{{old("title") ? old("title")["en"] ?? "" : ""}}'/>

        </div>
    </div>

    <x-helper.input.input name='number' type='number'
                          label='Введите количество данного товара' value='{{old("number") ?? $entity->number ?? " "}}'
                          id='number' onkeyup=""/>
    <x-helper.drop_down.drop_down
        :drop='\App\Domain\Product\Product\Front\Admin\DropDown\CurrencyDropDown::getDropDown()'/>
    <x-helper.input.input name='price' type='number'
                          label='Введите цену' value='{{old("price") ?? $entity->price ?? " "}}' id='price' onkeyup=""/>
    <x-helper.input.input name='percentage' type='number'
                          label='Укажите скидку (%)' value='{{old("percentage") ?? $entity->percentage ?? " "}}'
                          id='percentage' onkeyup=""/>
    <x-helper.input.input name='weight' type='number'
                          label='Введите вес' value='{{old("weight") ?? $entity->weight ?? " "}}' id='weight'
                          onkeyup=""/>
    <x-helper.input.input_checked name='productDay->checked' type='checkbox'
                                  label='Продукт дня'
                                  value='{{old("productDay->checked") ?? $entity->productDay->checked ?? " "}}'
                                  id='productDay->checked' onchange=""/>
    <x-helper.input.input_checked name='productHit->checked' type='checkbox'
                                  label='Хит продаж'
                                  value='{{old("productHit->checked") ?? $entity->productHit->checked ?? " "}}'
                                  id='productHit->checked' onchange=""/>
    <livewire:components.file.file-uploading-without-entity
        keyToAttach='productImageHeader->image'
        mediaKey='file_create'
        entityClass='App\Domain\File\Entities\FileTemp'
        :multiple='false'
        label='Главная картинка'
        :entityId='old("file->id_file->productImageHeader->image") ?? ""'
        :mediaInitial='""'
    />
    <livewire:components.file.file-uploading-without-entity
        keyToAttach='productImage->image'
        mediaKey='file_create'
        entityClass='App\Domain\File\Entities\FileManyTemp'
        :multiple='true'
        label='Картинки'
        :entityId='old("file->id_file->productImage->image") ?? ""'
        :mediaInitial='""'
    />
    <livewire:admin.pages.product-create.main-credit-nested
        keyToAttach='mainCredit'
        dispatchClass='App\Domain\Core\Front\Admin\Livewire\Dispatch\Base\Dispatch'
        additionalAction='App\Domain\Core\Front\Admin\Livewire\AdditionalActions\Base\AdditionalActions'
    />
    <livewire:test.test></livewire:test.test>
@endsection
