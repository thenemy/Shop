{{--Index can be accessed--}}
<x-helper.container.container :title="__('Характеристики')" class="w-full flex flex-col justify-start items-start space-y-2">
    <div class="w-full flex-1 space-y-4">
        {{--        here $index must be id of the object so we could find them
                    and delete it when is needed
        --}}
        @foreach($entities as $index => $entity)
            <div class="flex flex-row space-x-2 items-start">
                <div class="flex-1">
                    <div wire:key=''> <x-helper.container.container :title='__("Элемент")
        ." №" . ($index + 1)' 	class='space-y-6 flex flex-wrap justify-between'>
                			

            <div 	class='w-full'	wire:key='super_key_edit.{{$index}}.somehting'>
                			

            <div class='flex flex-col w-full space-y-1'>
            <x-helper.text.pre_title class='self-start'>
            Название заголовка
            </x-helper.text.pre_title>
                 <div class=' flex flex-row space-x-2'>
                 <x-helper.input.input name='headerText->{{$index}}->text[ru]'  label='{{__("на русском языке")}}' value='{{old("headerText->{$index}->text") ? old("headerText->{$index}->text")["ru"] ?? $entity->text["ru"] ?? " " : $entity->text["ru"] ?? " "}}'  /><x-helper.input.input name='headerText->{{$index}}->text[uz]'  label='{{__("o`zbek tilda")}}' value='{{old("headerText->{$index}->text") ? old("headerText->{$index}->text")["uz"] ?? $entity->text["uz"] ?? " " : $entity->text["uz"] ?? " "}}'  /><x-helper.input.input name='headerText->{{$index}}->text[en]'  label='{{__("in english")}}' value='{{old("headerText->{$index}->text") ? old("headerText->{$index}->text")["en"] ?? $entity->text["en"] ?? " " : $entity->text["en"] ?? " "}}'  />
             </div>
            </div>
            			

            <div 	x-data='modalWindow() '	class='flex flex-row justify-start'>
                			
<button 	class='btn  self-start mt-4 btn-sm btn-accent'	@click='open()'	wire:key='header_text{{$index}}->modal'>{{__('Значения')}}</button>			
<div x-cloak 	x-show='show'><div

    class="fixed z-10 h-full w-full inset-0 hide_during_loading  overflow-y-auto" aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class=" sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left
            shadow-xl transform transition-all sm:my-8 sm:align-middle
            sm:max-w-max sm:w-full">
            			

            <div 	@click.away='show = false'	class='rounded'>
                			

            <div 	class='rounded border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-[1.09rem]'>{{__('Значения')}}</span>
                			
<livewire:admin.pages.header-edit.header-key-value-dynamic 
          :index='$index'  :wire:key='$index ."header_edit_dynamic"'
                 parentKey='header_product_id'
                :parentId='$entity->pivot->id'/>
            </div>
            </div>
        </div>
    </div>
</div>

</div>
            </div>
            </div>
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
                			

            <div 	class='w-full'	wire:key='super_key_edit.{{$index}}.god_of'>
                			

            <div class='flex flex-col w-full space-y-1'>
            <x-helper.text.pre_title class='self-start'>
            Название заголовка
            </x-helper.text.pre_title>
                 <div class=' flex flex-row space-x-2'>
                 <x-helper.input.input name='headerText->{{$index}}->text[ru]'  label='{{__("на русском языке")}}' value='{{old("headerText->{$index}->text") ? old("headerText->{$index}->text")["ru"] ?? $value->text["ru"] ?? " " : $value->text["ru"] ?? " "}}'  /><x-helper.input.input name='headerText->{{$index}}->text[uz]'  label='{{__("o`zbek tilda")}}' value='{{old("headerText->{$index}->text") ? old("headerText->{$index}->text")["uz"] ?? $value->text["uz"] ?? " " : $value->text["uz"] ?? " "}}'  /><x-helper.input.input name='headerText->{{$index}}->text[en]'  label='{{__("in english")}}' value='{{old("headerText->{$index}->text") ? old("headerText->{$index}->text")["en"] ?? $value->text["en"] ?? " " : $value->text["en"] ?? " "}}'  />
             </div>
            </div>
            			

            <div 	x-data='modalWindow() '	class='flex flex-row justify-start'>
                			
<button 	class='btn  self-start mt-4 btn-sm btn-accent'	@click='open()'	wire:key='header_text{{$index}}->modal'>{{__('Значения')}}</button>			
<div x-cloak 	x-show='show'><div

    class="fixed z-10 h-full w-full inset-0 hide_during_loading  overflow-y-auto" aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class=" sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left
            shadow-xl transform transition-all sm:my-8 sm:align-middle
            sm:max-w-max sm:w-full">
            			

            <div 	@click.away='show = false'	class='rounded'>
                			

            <div 	class='rounded border shadow p-4 space-y-4 bg-white'>
            <span class='font-bold text-[1.09rem]'>{{__('Значения')}}</span>
                			
<livewire:admin.pages.header-key.header-key-value-dynamic-without-entity   :index='$index'  :wire:key='$index ."header_value_dynamic"'/>
            </div>
            </div>
        </div>
    </div>
</div>

</div>
            </div>
            </div>
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
