<x-helper.container.container :title="__('%s')">
    <div class="flex flex-col space-y-10">
        <div class="flex flex-row space-x-3">
            <x-helper.drop_down.drop_down_livewire :drop="$paginator"/>
            <x-helper.input.input wire:model="search"/>
            %s
        </div>

        {{--   table -> drop down action --}}
        <x-helper.table.table :table="$table" :optional="$optional"/>
    </div>
</x-helper.container.container>
