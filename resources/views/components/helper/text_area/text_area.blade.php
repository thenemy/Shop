<div class="flex flex-col w-full">
    <div class="self-start block text-gray-700 text-xs font-bold mb-1">
        {{$attributes['label']}}
    </div>
    <textarea  {{$attributes->merge(["class"=>"input-check", "rows"=>"5", "cols" => "3"])}}>{{$slot}}</textarea>
</div>
