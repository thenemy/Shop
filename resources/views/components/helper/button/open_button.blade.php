<button
    onclick="window.open('{{$attributes['href']}}',
        'newwindow',
        'width=800,height=500');
        return false;"
    {{$attributes->merge(["class"=>"m-auto w-min font-semibold text-white rounded-lg"])}}>
    {{$slot}}
</button>
