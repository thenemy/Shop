@props([
'type'=>'text',
])
<div
    class="flex flex-col items-start">
    <label for="{{$attributes['id'] ?? ''}}"
           class="block text-black_custom  text-xs  font-semibold mb-1">
        {{$attributes['label']}}
    </label>
    <input id="{{$attributes['id'] ?? ''}}" type="{{$type}}"
        {{$attributes->merge(["class"=>"input-custom"])}}/>
</div>

