<div class="flex flex-col space-y-2">
    <div class="flex flex-row justify-between items-end">
        <div class="flex flex-row space-x-3">
            <x-helper.input.input wire:model="paginate" label='{{__("Элементов на страничке")}}'/>
            <x-helper.input.input wire:model="search" label='{{__("Поиск по списку")}}'/>
        </div>

        <x-helper.filter.filtration>
            
        </x-helper.filter.filtration>

    </div>
    {{--   table -> drop down action --}}
    <x-helper.table.table :table="$table" :optional="$optional" turn_off="1">
        
            <div 	class='flex flex-row  space-x-2 justify-end items-end'>
                			
<x-helper.button.base_button 	class='bg-blue-600 hover:bg-blue-400'	wire:click='sendNotPaid'>Выставить счет</x-helper.button.base_button>
            </div> </x-helper.table.table>
    {{--    <x-helper.table.table :table="$table" :optional="$optional"/>--}}
</div>
