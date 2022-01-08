@props([
"drop",

])
<x-helper.drop_down.base_drop_down :drop="$drop" :attributes="$attributes">
    <div class="hidden">{{$slot}}</div>
    @foreach($drop->items as $item)
        <button
            x-init="{{old($drop->key) != null && old($drop->key) == $item->id ?
            sprintf('closeDrop("%s", "%s")', $item->id, $item->name) : ""}}"
                @click="closeDrop('{{$item->id}}', '{{$item->name}}')"
                type="button" value="{{$item->id}}"
                class="drop-down-item">
            {{$item->name}}
        </button>
    @endforeach
</x-helper.drop_down.base_drop_down>


