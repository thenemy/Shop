<div class="table_checker space-y-5">


    <div class="flex flex-row justify-between">
            <x-helper.drop_down.drop_down_livewire :drop="$optional" class="hidden checkbox-show"/>
{{--        <div class="flex items-center" x-data="{ open: false }" x-on:click.outside="open = false">--}}
{{--            <button class="hidden checkbox-show inline-flex rounded-md border border-gray-300 shadow-sm--}}
{{--            p-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none--}}
{{--            focus:ring-2 h-10 w-full focus:ring-offset-2 px-3 focus:ring-offset-gray-100 focus:ring-indigo-500"--}}
{{--                    id="menu-button" aria-expanded="true" aria-haspopup="true" x-on:click="open = !open">--}}
{{--                Options--}}
{{--                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"--}}
{{--                     fill="currentColor" aria-hidden="true">--}}
{{--                    <path fill-rule="evenodd"--}}
{{--                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"--}}
{{--                          clip-rule="evenodd"/>--}}
{{--                </svg>--}}
{{--            </button>--}}
{{--            <ul class="mt-40 absolute rounded w-56 rounded-md shadow-lg bg-white--}}
{{--             ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical"--}}
{{--                aria-labelledby="menu-button" tabindex="-1" x-show="open" x-transition.opacity>--}}
{{--                <li class="text-gray-700 hover:bg-gray-400 hover:text-white block px-4 py-2 text-sm">--}}
{{--                    <button onclick="confirmDelete()" wire:click="check" class="delete-confirm hidden checkbox-show">--}}
{{--                        {{__("Удалить")}}--}}
{{--                    </button>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}

        <div class="remove-checks">
            <x-helper.button.outline_button onclick="selectAll(this)" wire:click="checkAll"  class="hidden checkbox-show">
                {{__("выбрать все")}}
            </x-helper.button.outline_button>
            <x-helper.button.outline_button onclick="removeChecker(this)" wire:click="removeAll" class="hidden checkbox-show">
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
            @endforeach
        </tr>
        @foreach($table->list as $items)
            <tr wire:key="clean_table_{{$loop->index}}"
                class="w-8/12 text-center border-b border-gray-200 hover:bg-gray-200 longpress">
                <td class="p-2 hidden  checker checkbox-show">
                    <label for="check{{$loop->index}}">
                        <input type="checkbox" wire:model="checkBox" value="{{$items->id}}"
                               class="form-checkbox w-5 h-5"/>
                    </label>
                </td>
                @foreach($table->columns as $row)
                    <td class="p-2 cursor-default items-center justify-center"> {!! $items[$row->key_to_row] !!}</td>
                @endforeach
            </tr>
        @endforeach
        {{--some style will be here above to react on action--}}
    </table>
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
