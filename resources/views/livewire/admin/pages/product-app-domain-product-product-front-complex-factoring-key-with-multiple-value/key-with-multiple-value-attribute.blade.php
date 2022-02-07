{{--Index can be accessed--}}
<x-helper.container.container :title="__('Дополнительные данные')" class="w-full flex flex-col justify-start items-start space-y-2">
    <div class="w-full flex-1 space-y-4">
        {{--        here $index must be id of the object so we could find them
                    and delete it when is needed
        --}}
        @foreach($entities as $index => $entity)
            <div class="flex flex-row space-x-2 items-start">
                <div class="flex-1">
                    <div wire:key=''> <x-helper.container.container :title='__("Элемент")
        ." №" . ($index + 1)' 	class='space-y-6 flex flex-wrap justify-between'>
                			

            <div 	class='w-full'	wire:key='super_key_edit.{{$index}}.unique'>
                			

            <div class='flex flex-col w-full space-y-1'>
            <x-helper.text.pre_title class='self-start'>
            Название заголовка
            </x-helper.text.pre_title>
                 <div class=' flex flex-row space-x-2'>
                 <x-helper.input.input name='productKey->{{$index}}->text[ru]'  label='{{__("на русском языке")}}' value='{{old("productKey->{$index}->text") ? old("productKey->{$index}->text")["ru"] ?? $entity->text["ru"] ?? " " : $entity->text["ru"] ?? " "}}'  /><x-helper.input.input name='productKey->{{$index}}->text[uz]'  label='{{__("o`zbek tilda")}}' value='{{old("productKey->{$index}->text") ? old("productKey->{$index}->text")["uz"] ?? $entity->text["uz"] ?? " " : $entity->text["uz"] ?? " "}}'  /><x-helper.input.input name='productKey->{{$index}}->text[en]'  label='{{__("in english")}}' value='{{old("productKey->{$index}->text") ? old("productKey->{$index}->text")["en"] ?? $entity->text["en"] ?? " " : $entity->text["en"] ?? " "}}'  />
             </div>
            </div>
            
            </div>
                </x-helper.container.container> </div>
                </div>
                <div>
                    <button wire:click="removeEntity({{$index}})" class="btn btn-error">
                        {{__("Удалить")}}
                    </button>
                </div>
                <div class="hidden" x-data="{id: {{$entity->id ?? " "}} }">
                    <input  name="{{$prefixKey}}->{{$index}}->id" :value="id">
                </div>
            </div>
        @endforeach
        @foreach($objects as $index => $value)
            <div class="flex flex-row space-x-2 items-start">
                <div class="flex-1">
                    <div wire:key=''> <x-helper.container.container :title='__("Элемент")
        ." №" . ($index + 1)' 	class='space-y-6 flex flex-wrap justify-between'>
                			

            <div 	class='w-full'	wire:key='super_key.{{$index}}.unique'>
                			
@if($value && $value->id) 			
<input 	class='hidden'	name='productKey->{{$index}}->id'	value='{{ $value->id ?? 0 }}'>			
 @endif			

            <div class='flex flex-col w-full space-y-1'>
            <x-helper.text.pre_title class='self-start'>
            Название заголовка
            </x-helper.text.pre_title>
                 <div class=' flex flex-row space-x-2'>
                 <x-helper.input.input name='productKey->{{$index}}->text[ru]'  label='{{__("на русском языке")}}' value='{{old("productKey->{$index}->text") ? old("productKey->{$index}->text")["ru"] ?? $value->text["ru"] ?? " " : $value->text["ru"] ?? " "}}'  /><x-helper.input.input name='productKey->{{$index}}->text[uz]'  label='{{__("o`zbek tilda")}}' value='{{old("productKey->{$index}->text") ? old("productKey->{$index}->text")["uz"] ?? $value->text["uz"] ?? " " : $value->text["uz"] ?? " "}}'  /><x-helper.input.input name='productKey->{{$index}}->text[en]'  label='{{__("in english")}}' value='{{old("productKey->{$index}->text") ? old("productKey->{$index}->text")["en"] ?? $value->text["en"] ?? " " : $value->text["en"] ?? " "}}'  />
             </div>
            </div>
            			
<livewire:admin.pages.key-with-multiple-value.product-value-dynamic-without-entity   :index='$index'  :wire:key='$index ."key_with_multiple_key"'/>
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
