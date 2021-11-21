<div class="table_checker space-y-5">
    <div class="flex flex-row justify-between">
        <x-helper.drop_down.drop_down_livewire :drop="$optional" class="hidden checkbox-show"/>

        <div class="remove-checks">
            <x-helper.button.outline_button onclick="selectAll(this)" wire:click="checkAll"
                                            class="hidden checkbox-show">
                {{__("выбрать все")}}
            </x-helper.button.outline_button>
            <x-helper.button.outline_button onclick="removeChecker(this)" wire:click="removeAll"
                                            class="hidden checkbox-show">
                {{__("Отменить выделения")}}
            </x-helper.button.outline_button>
            <x-helper.button.outline_button onclick="hideCheck(this)" class="hidden checkbox-show">
                {{__("Выйти")}}
            </x-helper.button.outline_button>
        </div>

    </div>
    <table class="table-auto border-collapse border w-full ">
        <tr class="w-8/12">
            <th class="py-3 px-6 font-semibold bg-gray-100 hidden checkbox-show">check</th>
            @foreach($table->columns as $column)
                <th class="py-3 items-center bg-gray-100 font-semibold justify-center px-6">{{$column->column_name}}</th>
                {{-->>>>>>> 3ad73d1eb14f6ea432a1540158d13975634c52a8--}}
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
    <x-helper.form_field.wrapper/>
</div>
{{$table->paginate->links()}}

<script>
    let pressTimer;
    $(".longpress").mouseup(function () {
        clearTimeout(pressTimer);
        return false;
    }).mousedown(function () {
        // Set timeout
        let current = this;
        pressTimer = window.setTimeout(function () {
            showing(current)
        }, 600);
        return false;
    });

    function findParent(current) {
        return $(current).parents(".table_checker");
    }

    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook("element.updated", function (e) {
                $(".table_checker").each(function () {
                    let checkBox = $(this).find(".checkbox-show input[type=checkbox]:checked")
                    if (checkBox.length > 0) {
                        $(this).find(".checkbox-show").removeClass("hidden");
                    }
                });
            }
        )
    });

    function showing(current) {
        findParent(current).find('.checkbox-show').removeClass('hidden')
    }

    function hideCheck(current) {

        findParent(current).find('.checkbox-show').addClass('hidden')
    }

    function removeChecker(current) {
        findParent(current).find('.checkbox-show input[type=checkbox]').prop('checked', false);
    }

    function selectAll(current) {
        findParent(current).find('.checkbox-show input[type=checkbox]').prop('checked', true);
    }
</script>
