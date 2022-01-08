@props([
"drop",
"chosen"=>""
])
<div
    x-data="initDropDown('{{$chosen->name ?? $drop->name}}', '{{$attributes['wire:model'] ?? ''}}')"
    {{$attributes->merge(["class"=>"relative drop_down_init inline-block text-left w-max" ])}}>
    <div>
        <x-helper.button.drop_down_button
            class="flex items-center"
            type="button"
            @click="isOpen = !isOpen"
            @keydown.escape="isOpen = false"
        >
            <x-helper.icon.arrow_down/>
        </x-helper.button.drop_down_button>
    </div>
    <div
        x-show="isOpen"
        @click.away="isOpen = false"
        class="drop-down-block ">
        <div class="py-1" role="none">
            <input class="selected_input hidden"
                   wire:model="{{$attributes['wire:model'] ?? ''}}"
                   wire:key="{{$attributes['wire:key'] ?? ''}}"
                   type="{{$drop->type}}" name="{{$drop->key}}"
                   :value="value"
                   @if($chosen) value="{{$chosen->id}}" @endif/>
            @foreach($drop->items as $item)
                <button
                        x-init="{{old($drop->key) != null && old($drop->key) == $item->id ?
            sprintf('closeDrop("%s", "%s")', $item->id, $item->name) : ""}}"
                    @click="closeDrop('{{$item->id}}', '{{$item->name}}')" type="button" value="{{$item->id}}"
                    class="drop-down-item">
                    {{$item->name}}
                </button>
            @endforeach
        </div>
    </div>
</div>

