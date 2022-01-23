@extends("admin.layout.create")
@section("action")
    
<x-helper.input.input name='percent' type='number'
            label='{{__("Процент скидки")}}' value='{{old("percent") ?? $entity->percent ?? " "}}' id='percent'  onkeyup=""/>
<x-helper.container.container :title='__("Скидки для Мобилки")' 	class='flex flex-wrap justify-between'>
                			
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='mob_image->ru'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Русский Баннер")'
                    :entityId='old("file->id_file->mob_image->ru") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />			
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='mob_image->uz'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Узбекский Баннер")'
                    :entityId='old("file->id_file->mob_image->uz") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />			
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='mob_image->en'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Английский Баннер")'
                    :entityId='old("file->id_file->mob_image->en") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
                </x-helper.container.container>
<x-helper.container.container :title='__("Скидки для Вэб")' 	class='flex flex-wrap justify-between'>
                			
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='des_image->ru'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Русский Баннер")'
                    :entityId='old("file->id_file->des_image->ru") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />			
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='des_image->uz'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Узбекский Баннер")'
                    :entityId='old("file->id_file->des_image->uz") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />			
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='des_image->en'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Английский Баннер")'
                    :entityId='old("file->id_file->des_image->en") ?? ""'
                    :mediaInitial='""'
                    wire:key=''
                     />
                </x-helper.container.container>
<livewire:admin.pages.discount-create.product-nested
                keyToAttach='product'
                dispatchClass='App\Domain\Core\Front\Admin\Livewire\Dispatch\Base\Dispatch'
                additionalAction='App\Domain\Core\Front\Admin\Livewire\AdditionalActions\Base\AdditionalActions'
                />
@endsection
