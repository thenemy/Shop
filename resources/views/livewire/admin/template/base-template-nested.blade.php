<x-helper.container.container :title="__('%s')">
    <div class="flex flex-col space-y-3">
        <div class="flex flex-row space-x-3">
            <x-helper.input.input wire:model="paginate" label='{{__("Элементов на страничке")}}'/>
            <x-helper.input.input wire:model="search" label='{{__("Поиск по списку")}}'/>
            %s
        </div>
        <div class="flex flex-row  space-x-3">
            <div>
                <x-helper.button.main_button
                    type="button"
                    wire:click="changeToAdd()"
                >{{__("Весь список")}}</x-helper.button.main_button>
            </div>
            <div>
                <x-helper.button.main_button
                    type="button"
                    wire:click="changeToRemove()"
                >{{__("Добавленные")}}</x-helper.button.main_button>
            </div>

        </div>
        %s
{{--        <x-helper.table.table :table="$table" :optional="$optional"/>--}}
    </div>
</x-helper.container.container>
