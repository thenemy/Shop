<x-helper.container.container :title="__('%s')">
    <div class="flex flex-col space-y-3">
        <div class="flex flex-row justify-between">
            <div>
                <x-helper.input.input wire:model="search" label='{{__("Поиск по списку")}}'/>
            </div>

            <div>
                <x-helper.input.input class="w-14" wire:model="paginate" label='{{__("Показать")}}'/>
            </div>
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

        @foreach($addedCheckBox as $value)
            <input wire:key="multi_input_{{$keyToAttach}}_{{$loop->index}}" class="hidden" name="{{$keyToAttach}}[]"
                   value="{{$value}}">
        @endforeach
    </div>
</x-helper.container.container>
