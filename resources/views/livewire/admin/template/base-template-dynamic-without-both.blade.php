<div class="flex flex-col space-y-2">
    {{--   table -> drop down action --}}
    <x-helper.error.error :error="$errors"/>
    %s
    {{--    <x-helper.table.table :table="$table" :optional="$optional"/>--}}

    @foreach($saved as $id => $item)
        @foreach($item as $key => $value)
            <input class="hidden" name="{{"%s" . \CR::CR . $id . \CR::CR . $key}}"
                   value="{{$value}}">
        @endforeach
    @endforeach

</div>


