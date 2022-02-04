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
    <table class="table_main" wire:loading.class="opacity-80">
        <tr class="longpress">
            <th class="table_main_th hidden checkbox-show">{{__("Выбрать")}}</th>
            @foreach($table->columns as $column)
                <th class="table_main_th">{{$column->column_name}}</th>
            @endforeach
        </tr>

        @foreach($table->list as $items)
            <tr wire:key="dynamic_table_{{$loop->index}}"
                x-data="initDynamic('{{$items->id}}')"
               data-id="{{$items->id}}"
                x-on:show-inputs.window="showInput($event)"
                class="table_main_tr">
                <td class="table_main_td hidden checker checkbox-show">
                    <label for="check{{$loop->index}}">
                        <input type="checkbox" wire:model="checkBox" value="{{$items->id}}"
                               class="form-checkbox mt-2 w-5 h-5"/>
                    </label>
                </td>

                @foreach($table->columns as $row)
                    <td
                        class="table_main_td">
                        <div

                            class="flex flex-row justify-center"
                        >
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

        <tr class="table_main_tr">
            <td class="table_main_td hidden checker checkbox-show">

            </td>
            @foreach($table->columns as $row)
                <td
                    class="table_main_td">
                    <div class="flex flex-row justify-center">
                        {!!  $storedValues[explode('-', $row->key_to_row)[0]]!!}
                    </div>
                </td>
            @endforeach
        </tr>
    </table>
</div>
<script>
        // function initDynamic(id) {
        //     return {
        //         show: false,
        //         id: id,
        //         showInput(event) {
        //             if (event.detail.id.toString() === this.$el.dataset.id) {
        //                 this.show = event.detail.show;
        //                 console.log(this.show);
        //             }
        //         },
        //     }
        // }

</script>
{{$table->paginate->links()}}


