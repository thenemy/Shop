<x-helper.container.container :title="__('Категории')">
    <div class="flex flex-col space-y-10">
        <div class="flex flex-row space-x-3">
            <x-helper.input.input wire:model="paginate"/>
            <x-helper.input.input wire:model="search"/>
            
        </div>
        <div class="flex flex-row  space-x-3">
            <div>
                <x-helper.button.main_button
                    type="button"
                    wire:click="changeToAdd()"
                >{{__("Список")}}</x-helper.button.main_button>
            </div>
            <div>
                <x-helper.button.main_button
                    type="button"
                    wire:click="changeToRemove()"
                >{{__("Добавленные")}}</x-helper.button.main_button>
            </div>

        </div>
        {{--   table -> drop down action --}}
        <x-helper.table.table :table="$table" :optional="$optional"/>
    </div>
</x-helper.container.container>
