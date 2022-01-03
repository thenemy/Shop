<button
    @if(isset($attributes["href"]))
    onclick="location.href ='{{$attributes["href"]}}'"
    @endif
    {{$attributes->merge(["class"=>"m-auto w-max p-1 font-medium text-sm text-white rounded"])}}>
    <span>{{$slot}}</span>
</button>
