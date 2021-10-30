@props([
"drop",
])
<x-helper.drop_down.base_drop_down :drop="$drop" :attributes="$attributes">

    @foreach($drop->items as $item)
        <button @click="isOpen = false" type="button" value="{{$item->id}}" class="drop-down-item">
            {{$item->name}}
        </button>
    @endforeach
</x-helper.drop_down.base_drop_down>


