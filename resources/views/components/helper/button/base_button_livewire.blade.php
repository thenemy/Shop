<x-helper.button.base_button
    type="{{$type}}"
    wire:click="{{$click}}" class="{{$class}} p-1.5">
    {{$slot}}
</x-helper.button.base_button>
