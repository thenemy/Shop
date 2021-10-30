<button
    @if(isset($attributes["href"]))
    onclick="location.href ='{{$attributes["href"]}}'"
    @endif
    {{$attributes->merge(["class"=>"m-auto w-min font-semibold text-white rounded-lg"])}}>
    <span> {{$slot}}</span>
</button>
