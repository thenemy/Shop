<x-helper.container.container :title="__('Кредиты на каждый месяц')">
    <div class="flex flex-col space-y-2">
        {{--   table -> drop down action --}}
        <x-helper.error.error :error="$errors"/>
        <x-helper.table.table_dynamic
                :collection="$collection"
                :table="$table"
                :storedValues="$storedValues"
                :optional="$optional"></x-helper.table.table_dynamic>
    </div>
</x-helper.container.container>
