<div x-data="table_init()" class="table_checker my-2.5 main_form">

    <div class="flex flex-row justify-between">
        <x-helper.drop_down.drop_down_livewire_modal :drop="$optional" class="hidden checkbox-show"/>
        <div class="remove-checks">
            <x-helper.button.outline_button type="button" onclick="selectAll(this)" wire:click="checkAll"
                                            class="hidden checkbox-show">
                {{__("выбрать все")}}
            </x-helper.button.outline_button>
            <x-helper.button.outline_button type="button" onclick="removeChecker(this)" wire:click="removeAll"
                                            class="hidden checkbox-show">
                {{__("Выйти")}}
            </x-helper.button.outline_button>
        </div>
    </div>
    <table class="table-auto border-collapse border w-full my-2.5" wire:loading.class="opacity-80">
        <tr class="w-8/12 longpress">
            <th class="py-3 px-6 font-semibold bg-gray-100 hidden checkbox-show">{{__("Выбрать")}}</th>
            @foreach($table->columns as $column)
                <th class="py-3 items-center bg-gray-100 font-semibold justify-center px-6">{{$column->column_name}}</th>
            @endforeach
        </tr>

        @foreach($table->list as $items)
            <tr wire:key="dynamic_table_{{$loop->index}}"
                class="w-8/12 text-center border-b border-gray-200 hover:bg-gray-200 ">
                <td class="p-2 hidden checker checkbox-show">
                    <label for="check{{$loop->index}}">
                        <input type="checkbox" wire:model="checkBox" value="{{$items->id}}"
                               class="form-checkbox mt-2 w-5 h-5"/>
                    </label>
                </td>

                @foreach($table->columns as $row)
                    <td
                        class="p-2 cursor-default items-center justify-center">
                        <div x-data="initDynamic('{{$items->id}}')"
                             class="flex flex-row justify-center"
                             x-on:show-inputs.window="showInput($event)">
                            <div x-show="! show">
                                {!! $items->getFrontAttributes($row->key_to_row) !!}
                            </div>
                            <div x-show="show">
                                {!! $items->getInputs($row->key_to_row) !!}
                            </div>
                        </div>
                    </td>
                @endforeach
            </tr>
        @endforeach

        <tr>
            <td class="p-2 hidden checker checkbox-show">

            </td>
            @foreach($table->columns as $row)
                <td
                    class="p-2 cursor-default items-center justify-center ">
                    <div class="flex flex-row justify-center">
                        {!!  $storedValues[explode('-', $row->key_to_row)[0]]!!}
                    </div>
                </td>
            @endforeach
        </tr>
    </table>
</div>
<script>
    function initDynamic(id) {
        return {
            show: false,
            id: id,
            showInput(event) {
                if (event.detail.id === this.id) {
                    this.show = event.detail.show
                }
            },
        }
    }

    function testInit(value) {
        console.log(value);
        return {}
    }
</script>
{{$table->paginate->links()}}


