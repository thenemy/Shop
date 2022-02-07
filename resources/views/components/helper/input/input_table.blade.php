<input {{$attributes->merge([
    "class"=> "input-custom"
    ])}}
       type="{{$type}}"
       @if($type=='number')
       onkeydown="onlyNumbers(event)"
       @endif
       name="{{$name}}"
       oninput="{{$filter}}"
       {{--       @if($defer)--}}
       {{--       @else--}}
       {{--       wire:model="{{$attributes['wire:model']}}"--}}
       {{--       @endif--}}
{{--       wire:key="{{$attributes['wire:key'] ?? ""}}"--}}

/>
