@props([
"drop",
])
<x-helper.drop_down.base_drop_down
    @change-state-dropdown="closeDrop($event.detail.value, $event.detail.name)"
    :drop="$drop" :attributes="$attributes">
    <div class="hidden"> {{$slot}}</div>
        @foreach($drop->items as $item)
            <button
                {{--                @search-event.window="closeDrop('{{$item->id}}', '{{$item->name}}')"--}}
                @click="sendValues('{{$item->id}}', '{{$item->name}}')"
                wire:click="{{$item->clicked}}"
                value="{{$item->id}}"
                type="button" class="drop-down-item">
                {{$item->name}}
            </button>
        @endforeach


</x-helper.drop_down.base_drop_down>
