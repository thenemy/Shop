@props([
"drop",
])
<x-helper.drop_down.base_drop_down :drop="$drop" :attributes="$attributes">
    @foreach($drop->items as $item)
        <button
            x-init="{{old($drop->key) == $item->id ?
            sprintf('closeDrop("%s", "%s")', $item->id, $item->name) : ""}}"
            @click="closeDrop('{{$item->id}}', '{{$item->name}}')"
            wire:click="{{$item->clicked}}"
            value="{{$item->id}}"
            type="button" class="drop-down-item">
            {{$item->name}}
        </button>
    @endforeach
</x-helper.drop_down.base_drop_down>
