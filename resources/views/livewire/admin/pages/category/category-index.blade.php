<div class="flex flex-col space-y-10">
    <div class="flex flex-row space-x-3">
        <x-helper.drop_down.drop_down_livewire :drop="$paginator"/>
        <x-helper.input.input wire:model="search"/>

    </div>

    {{--   table -> drop down action --}}
    <x-helper.table.table :table="$table" :optional="$optional"/>
    <x-helper.container.container/>
</div>
