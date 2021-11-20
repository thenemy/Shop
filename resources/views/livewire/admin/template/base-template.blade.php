<div class="flex flex-col space-y-10">
    <div class="flex flex-row space-x-3">
        <x-helper.drop_down.paginator :drop="$paginate"/>
        <x-helper.input.input wire:model="$search"/>
        %s
    </div>

    {{--   table -> drop down action --}}
    <x-helper.table.table :table="$table"/>
</div>
