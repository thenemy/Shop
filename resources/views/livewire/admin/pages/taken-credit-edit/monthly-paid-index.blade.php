<div class="flex w-full flex-row-reverse">
    <div>
        <x-helper.filter.filtration class="fixed">

        </x-helper.filter.filtration>
    </div>
    <div x-data="{filterOpen: false}" class="flex flex-col w-full space-y-2">
        <div class="flex flex-row justify-between">
            <div>
                <x-helper.input.input wire:model="search" label='{{__("Поиск по списку")}}'/>
            </div>
            <div>
                <x-helper.input.input class="w-14" wire:model="paginate" label='{{__("Показать")}}'/>
            </div>
        </div>
        {{--   table -> drop down action --}}
        <x-helper.table.table :table="$table" :optional="$optional" turn_off="1">

            <div class='flex flex-row  space-x-2 justify-end items-end'>

                <x-helper.button.base_button class='bg-blue-600 hover:bg-blue-400' wire:click='sendNotPaid'>Выставить
                    счет
                </x-helper.button.base_button>
            </div>
        </x-helper.table.table>
        {{--    <x-helper.table.table :table="$table" :optional="$optional"/>--}}
    </div>


</div>
