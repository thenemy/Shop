@props([
'type'=>'text',
])
<div class="flex flex-col items-start">
        <label for="in" class="block text-gray-700 text-xs font-bold mb-1">
            {{$attributes['label']}}
        </label>
    <input id="in" type="{{$type}}" {{$attributes->merge(["class"=>"input-custom"])}}/>
</div>

