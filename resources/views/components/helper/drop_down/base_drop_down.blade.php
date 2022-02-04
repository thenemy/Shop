@props([
"drop",
"chosen"=>""
])
<div
    x-data="initBaseDropDown('{{ $chosen->name ?? $drop->name}}')"

    {{$attributes->merge(["class"=>"relative drop_down_init inline-block text-left w-max" ])}}>
    <div

    >
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
                   @if(isset($attributes['wire:model']) && $attributes['wire:model'])
                   wire:model="{{$attributes['wire:model'] ?? ''}}"
                   @endif
                   wire:key="{{$attributes['wire:key'] ?? ''}}"
                   type="{{$drop->type}}" name="{{$drop->key}}"
                   :value="value"
                   @if($chosen) value="{{$chosen->id}}" @endif/>
            {{$slot}}
        </div>
    </div>
</div>

