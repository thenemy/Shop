{{--Index can be accessed--}}
<x-helper.container.container :title="__('Цвета')" class="w-full flex flex-col justify-start items-start space-y-2">
    <div class="w-full flex-1 space-y-4">
        {{--        here $index must be id of the object so we could find them
                    and delete it when is needed
        --}}
        @foreach($entities as $index => $entity)
            <div class="flex flex-row space-x-2 items-start">
                <div class="flex-1">
                    <div wire:key=''> <x-helper.container.container :title='__("Элемент")
        ." №" . ($index + 1)' 	class='space-y-6 flex flex-wrap justify-between'>
                			
<livewire:components.drop-down.drop-down-search
            :searchByKey='"color"'
            dropDownClass='App\Domain\Common\Colors\Front\Admin\DropDown\ColorDropDownSearch'
            :initial='$entity->color_id'
            searchLabel='названию цвета'
            	wire:key='edit_drop_objects.{{$index}}.color_id'	prefix='colors->{{$index}}->'
            
             />			
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='colors->{{$index ?? ""}}->image'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Главный цвет")'
                    :entityId='old(sprintf("file->id_file->colors->%s->image", $index)) ?? null'
                    :mediaInitial='$entity->image'
                    wire:key='edit_product_file_objects.{{$index}}.file_one'
                     />			
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='colors->{{$index ?? ""}}->images'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileManyTemp'
                    :multiple='true'
                    :label='__("Под цвета")'
                    :entityId='old(sprintf("file->id_file->colors->%s->images", $index)) ?? null'
                    :mediaInitial='$entity->images'
                    wire:key='edit_product_file_objects.{{$index}}.file_two'
                     />
                </x-helper.container.container> </div>
                </div>
                <div x-data="{ show : false }">
                    <button @click='show = true' class="btn btn-error">
                        {{__("Удалить")}}
                    </button>
                    <x-helper.modal.modal_delete
                        type="button"
                        wire:click="removeEntity({{$index}})"
                    />
                </div>
                <div class="hidden" x-data="{id: {{$entity->id ?? "" }} }">
                    <input name="{{$prefixKey}}->{{$index}}->id" :value="id">
                </div>
            </div>
        @endforeach
        @foreach($objects as $index => $value)
            <div class="flex flex-row space-x-2 items-start">
                <div class="flex-1">
                    <div wire:key=''> <x-helper.container.container :title='__("Элемент")
        ." №" . ($index + 1)' 	class='space-y-6 flex flex-wrap justify-between'>
                			
<livewire:components.drop-down.drop-down-search
            :searchByKey='"color"'
            dropDownClass='App\Domain\Common\Colors\Front\Admin\DropDown\ColorDropDownSearch'
            
            searchLabel='названию цвета'
            	wire:key='new_drop_objects.{{$index}}.color_id'	prefix='colors->{{$index}}->'
            
             />			
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='colors->{{$index ?? ""}}->image'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Главный цвет")'
                    :entityId='old(sprintf("file->id_file->colors->%s->image", $index)) ?? null'
                    :mediaInitial='""'
                    wire:key='new_product_file_objects.{{$index}}.file_one'
                     />			
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='colors->{{$index ?? ""}}->images'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileManyTemp'
                    :multiple='true'
                    :label='__("Под цвета")'
                    :entityId='old(sprintf("file->id_file->colors->%s->images", $index)) ?? null'
                    :mediaInitial='""'
                    wire:key='new_product_file_objects.{{$index}}.file_two'
                     />
                </x-helper.container.container> </div>
                </div>
                <div>
                    <button wire:click="remove({{$index}})" class="btn btn-error">
                        {{__("Удалить")}}
                    </button>
                </div>
                <input class="hidden" name="{{$prefixKey}}_new_created[]" value="{{$index}}">
            </div>
        @endforeach
    </div>
    <button class="btn btn-sm" wire:click="addCounter">{{__("Добавить")}}</button>
</x-helper.container.container>
