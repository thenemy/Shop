<button
    @if(isset($attributes["href"]))
    onclick="location.href ='{{$attributes["href"]}}'"
    @endif
    {{$attributes->merge(["class"=>"m-auto w-max p-1.5 font-semibold text-sm text-white rounded-lg"])}}>
    <span>{{$slot}}</span>
</button>
