<div class="table_checker space-y-5">


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
            {{--            <x-helper.button.outline_button type="button" onclick="hideCheck(this)" class="hidden checkbox-show">--}}
            {{--                {{__("Выйти")}}--}}
            {{--            </x-helper.button.outline_button>--}}
        </div>
    </div>
    <table class="table-auto border-collapse border w-full" wire:loading.class="opacity-80">
        <tr class="w-8/12">
            <th class="py-3 px-6 font-semibold bg-gray-100 hidden checkbox-show">{{__("Выбрать")}}</th>
            @foreach($table->columns as $column)
                <th class="py-3 items-center bg-gray-100 font-semibold justify-center px-6">{{$column->column_name}}</th>
            @endforeach
        </tr>
        @foreach($table->list as $items)
            <tr wire:key="clean_table_{{$loop->index}}"
                class="w-8/12 text-center border-b border-gray-200 hover:bg-gray-200 longpress">
                <td  class="p-2 hidden checker checkbox-show">
                    <label for="check{{$loop->index}}">
                        <input type="checkbox" wire:model="checkBox" value="{{$items->id}}"
                               class="form-checkbox mt-2 w-5 h-5"/>
                    </label>
                </td>
                @foreach($table->columns as $row)
                    <td class="p-2 cursor-default items-center justify-center">
                        <div class="flex flex-row justify-center">
                            {!! $items[$row->key_to_row] !!}
                        </div>
                    </td>
                @endforeach
            </tr>
        @endforeach
        {{--some style will be here above to react on action--}}
    </table>
</div>
{{$table->paginate->links()}}

