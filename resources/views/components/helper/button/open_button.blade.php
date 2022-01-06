<button
    onclick="window.open('{{$attributes['href']}}',
        Date.now().toString(),
        'width=800,height=500');
        return true;"
    {{$attributes->merge(["class"=>"m-auto w-min font-semibold text-white rounded"])}}>
    {{$slot}}
</button>
