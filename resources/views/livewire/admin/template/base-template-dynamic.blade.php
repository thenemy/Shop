    <x-helper.container.container :title="__('%s')">
    <div class="flex flex-col space-y-2">
        {{--   table -> drop down action --}}
        <x-helper.error.error :error="$errors"/>
        %s
        {{--    <x-helper.table.table :table="$table" :optional="$optional"/>--}}
    </div>
</x-helper.container.container>
