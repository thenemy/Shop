<div class="flex flex-col space-y-2">
    {{--   table -> drop down action --}}
    <x-helper.error.error :error="$errors"/>
    <x-helper.table.table_dynamic
                :collection="$collection"
                :table="$table"
                :storedValues="$storedValues"
                :optional="$optional"></x-helper.table.table_dynamic>
    {{--    <x-helper.table.table :table="$table" :optional="$optional"/>--}}

    @foreach($saved as $id => $item)
        @foreach($item as $key => $value)
            <input class="hidden" name="{{"headerText->{$index}->keyValue" . \CR::CR . $id . \CR::CR . $key}}"
                   value="{{$value}}">
        @endforeach
    @endforeach

</div>


