<div class="">
    <x-helper.input.input class="w-14" wire:model="paginate" label='{{__("Показать")}}'/>
    {{--   table -> drop down action --}}
    <x-helper.table.table :table="$table" :optional="$optional" turn_off="1">
         </x-helper.table.table>
    {{--    <x-helper.table.table :table="$table" :optional="$optional"/>--}}
</div>
