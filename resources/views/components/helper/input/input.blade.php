@props([
'type'=>'text',
])
<div
    class="flex @if($type=="checkbox") flex-row justify-center space-x-2  items-center @else flex-col items-start @endif ">
    <label for="{{$attributes['id'] ?? ''}}"
           class="block text-black_custom  text-xs  font-semibold mb-1">
        {{$attributes['label']}}
    </label>
    <input id="{{$attributes['id'] ?? ''}}" type="{{$type}}"
        {{$attributes->merge(["class"=>"input-custom"])}}/>
</div>

