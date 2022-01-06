<div
    class="flex @if($type=="checkbox") flex-row justify-center space-x-2  items-center @else flex-col items-start @endif ">
    <label for="{{$attributes['id'] ?? ''}}"
           class="block text-black_custom text-lg font-semibold">
        {{$attributes['label']}}
    </label>
    <input id="{{$attributes['id'] ?? ''}}" type="checkbox"
           @if(isset($attributes['value']) && $attributes['value']  && $attributes['value'] != " ") checked @endif
        {{$attributes->merge(["class"=>"input-check"])}}/>
</div>
