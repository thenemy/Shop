@props([
"drop",
])
<x-helper.drop_down.base_drop_down :drop="$drop" {{$attributes}}>
    @foreach($drop->items as $item)
        <button @click="isOpen = false"
                wire:click="{{$item->clicked}}"
                value="{{$item->id}}"
                type="button" class="drop-down-item">
            {{$item->name}}
        </button>
    @endforeach
</x-helper.drop_down.base_drop_down>
