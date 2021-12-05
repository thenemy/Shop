<x-helper.container.container :title="__('Кредиты на каждый месяц')">
    <div class="flex flex-col space-y-2">
        <div class="flex flex-row justify-between items-end">
{{--            <div class="flex flex-row space-x-3">--}}
{{--                <x-helper.input.input wire:model="paginate" label='{{__("Элементов на страничке")}}'/>--}}
{{--                <x-helper.input.input wire:model="search" label='{{__("Поиск по списку")}}'/>--}}
{{--            </div>--}}

            <x-helper.filter.filtration>
                
            </x-helper.filter.filtration>

        </div>
        {{--   table -> drop down action --}}
        <x-helper.table.table_dynamic :table="$table" :optional="$optional"/>
        {{--    <x-helper.table.table :table="$table" :optional="$optional"/>--}}
    </div>
</x-helper.container.container>
