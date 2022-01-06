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
            
            searchLabel='названию цвета'
            	wire:key='drop_objects.{{$index}}.color_id'	prefix='colors->{{$index}}->'
            
             />			
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='colors->{{$index ?? ""}}->image'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Главный цвет")'
                    :entityId='sprintf(old("file->id_file->colors->%s->image"), $index) ?? " "'
                    :mediaInitial='$entity->$entity->image'
                    wire:key='product_file_objects.{{$index}}.file_one'
                     />			
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='colors->{{$index ?? ""}}->images'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileManyTemp'
                    :multiple='true'
                    :label='__("Под цвета")'
                    :entityId='sprintf(old("file->id_file->colors->%s->images"), $index) ?? " "'
                    :mediaInitial='$entity->$entity->images'
                    wire:key='product_file_objects.{{$index}}.file_two'
                     />
                </x-helper.container.container> </div>
                </div>
                <div>
                    <button wire:click="removeEntity({{$index}})" class="btn btn-error">
                        {{__("Удалить")}}
                    </button>
                </div>
                <input class="hidden" name="{{$prefixKey}}[]" value="{{$index}}">
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
            	wire:key='drop_objects.{{$index}}.color_id'	prefix='colors->{{$index}}->'
            
             />			
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='colors->{{$index ?? ""}}->image'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileTemp'
                    :multiple='false'
                    :label='__("Главный цвет")'
                    :entityId='sprintf(old("file->id_file->colors->%s->image"), $index) ?? " "'
                    :mediaInitial='""'
                    wire:key='product_file_objects.{{$index}}.file_one'
                     />			
<livewire:components.file.file-uploading-without-entity
                    keyToAttach='colors->{{$index ?? ""}}->images'
                    mediaKey='file_create'
                    entityClass='App\Domain\File\Entities\FileManyTemp'
                    :multiple='true'
                    :label='__("Под цвета")'
                    :entityId='sprintf(old("file->id_file->colors->%s->images"), $index) ?? " "'
                    :mediaInitial='""'
                    wire:key='product_file_objects.{{$index}}.file_two'
                     />
                </x-helper.container.container> </div>
                </div>
                <div>
                    <button wire:click="remove({{$index}})" class="btn btn-error">
                        {{__("Удалить")}}
                    </button>
                </div>
                <input class="hidden" name="{{$prefixKey}}[]" value="{{$index}}">
            </div>
        @endforeach
    </div>
    <button class="btn btn-sm" wire:click="addCounter">{{__("Добавить")}}</button>
</x-helper.container.container>
