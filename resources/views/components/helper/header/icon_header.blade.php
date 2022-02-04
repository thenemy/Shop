@props([
    'title' => "",
    "icon" => "",
    "number"=> 0,
])
<a title="{{$title}}"  {{$attributes->merge(['class'=>"relative"])}}>
    <span  class="{{$icon}}  hover:text-[#B1A8B9] text-[#4B4452]"></span>
    @if($number != 0)
    <span class="absolute top-[-8px] right-[-14px] rounded-[45%] bg-[#A465F1FF]
        text-center text-xs text-white font-bold px-1 h-4">{{$number}}</span>
    @endif
</a>
