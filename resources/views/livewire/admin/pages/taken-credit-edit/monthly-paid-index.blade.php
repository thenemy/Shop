<div class="">
    {{--   table -> drop down action --}}
    <x-helper.table.table :table="$table" :optional="$optional" turn_off="1">
        
            <div 	class='justify-end items-end flex flex-row  space-x-2'>
                			

            <div >
                			
<x-helper.button.base_button 	class='bg-blue-600 hover:bg-blue-400'	wire:click='sendNotPaid'>Выставить счет</x-helper.button.base_button>
            </div>
            </div> </x-helper.table.table>
    {{--    <x-helper.table.table :table="$table" :optional="$optional"/>--}}
</div>
