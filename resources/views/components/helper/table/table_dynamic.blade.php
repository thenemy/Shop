<form wire:submit.prevent="save" class="table_checker my-2.5 main_form">
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
        <tr class="w-8/12">
            <th class="py-3 px-6 font-semibold bg-gray-100 hidden checkbox-show">{{__("Выбрать")}}</th>
            @foreach($table->columns as $column)
                <th class="py-3 items-center bg-gray-100 font-semibold justify-center px-6">{{$column->column_name}}</th>
            @endforeach
        </tr>

        @foreach($table->list as $items)
            <tr wire:key="clean_table_{{$loop->index}}"
                class="w-8/12 text-center border-b border-gray-200 hover:bg-gray-200 longpress">
                <td class="p-2 hidden checker checkbox-show">
                    <label for="check{{$loop->index}}">
                        <input type="checkbox" wire:model="checkBox" value="{{$items->id}}"
                               class="form-checkbox mt-2 w-5 h-5"/>
                    </label>
                </td>
                @if(isset($collection[$items->id]))
                    @foreach($table->columns as $row)
                        <td class="p-2 cursor-default items-center justify-center">
                            <div class="flex flex-row justify-center">
                                {!! $items->getInputs($row->key_to_row) !!}
                            </div>
                        </td>
                    @endforeach
                @else
                    @foreach($table->columns as $row)
                        <td class="p-2 cursor-default items-center justify-center">
                            <div class="flex flex-row justify-center">
                                {!! $items[$row->key_to_row] !!}
                            </div>
                        </td>
                    @endforeach
                @endif
            </tr>
        @endforeach

        <tr>
            @foreach($table->columns as $row)
                <td class="p-2 cursor-default items-center justify-center ">
                    <div class="flex flex-row justify-center">
                        {!! $table->getInputsByKey($row->key_to_row)!!}
                    </div>
                </td>
            @endforeach
        </tr>
    </table>
</form>
{{$table->paginate->links()}}


