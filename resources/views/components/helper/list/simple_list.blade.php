@props(["list" => []])
<table class="table-auto border-collapse border w-full font-sans">
    <div class="flex ">
        <div>

        </div>
        <div class="flex items-center" x-data="{ open: false }" x-on:click.outside="open = false">
            <button class="hidden checkbox-show inline-flex rounded-md border border-gray-300 shadow-sm
            p-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none
            focus:ring-2 h-10 w-full focus:ring-offset-2 px-3 focus:ring-offset-gray-100 focus:ring-indigo-500"
                    id="menu-button" aria-expanded="true" aria-haspopup="true" x-on:click="open = !open">
                Options
                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                     fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                          clip-rule="evenodd"/>
                </svg>
            </button>
            <ul class="mt-40 absolute rounded w-56 rounded-md shadow-lg bg-white
             ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical"
                aria-labelledby="menu-button" tabindex="-1" x-show="open" x-transition.opacity>
                <li class="text-gray-700 hover:bg-gray-400 hover:text-white block px-4 py-2 text-sm">
                    <button onclick="removeChecker()" class="hidden checkbox-show">
                        Отменить выделения
                    </button>
                </li>
                <li class="text-gray-700 hover:bg-gray-400 hover:text-white block px-4 py-2 text-sm">
                    <button onclick="selectAll()" class="hidden checkbox-show">
                        выбрать все
                    </button>
                </li>
                <li class="text-gray-700 hover:bg-gray-400 hover:text-white block px-4 py-2 text-sm">
                    <button onclick="confirmDelete()" class="delete-confirm hidden checkbox-show">
                        Удалить
                    </button>
                </li>
            </ul>
        </div>
        <div class="flex-1 items-center ml-4 remove-checks">
            <button onclick="hideCheck()" class="hidden checkbox-show justify-center rounded-md border border-gray-300 shadow-sm
             bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none
            focus:ring-2 p-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-indigo-500">
                Quit
            </button>
        </div>
    </div>

    <tr class="w-8/12 bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
        <th class="py-3 px-6 hidden checkbox-show">check</th>
        <th class="py-3 px-6 ">№</th>
        <th class="py-3 px-6 ">Название</th>
        <th class="py-3 px-6 text-center">Status</th>
        <th class="py-3 px-6">Действие</th>
    </tr>
    @section("actions")
        @foreach($list as $item)

            <tr class="w-8/12 a text-center border-b border-gray-200 hover:bg-gray-100 longpress">

                <td class="p-2 hidden checker checkbox-show">
                    <label for="check{{$loop->index}}">
                        <input type="checkbox" class="form-checkbox w-5 h-5"/>
                    </label>
                </td>

                <td class="p-2 ">
                    <label for="check{{$loop->index}}">
                        {{$item->id}}
                    </label>
                </td>
                <td class="p-2 ">
                    <label for="check{{$loop->index}}">
                        {{$item->name}}
                    </label>
                </td>
                <td class="py-3 px-6 text-center">
                    <label for="check{{$loop->index}}">
                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Active</span>
                    </label>
                </td>
                <td class="p-1 flex flex-row items-center justify-center h-full py-1 px-6">

                    @if($item->edit_route)
                        <div>
                            <a href="{{$item->edit_route}}" class="tex-sm p-1">
                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                    <img src="{{asset('images/edit.svg')}}" alt="">
                                </div>
                            </a>
                        </div>
                    @endif
                    @if($item->delete_route)
                        <form method="POST" action="{{$item->delete_route}}">
                            @method("DELETE") @csrf
                            <button class="p-1">
                                <div class="w-6 mr-2 transform hover:text-purple-500 hover:scale-110 ">
                                    <img src="{{asset('images/trash.svg')}}" alt="">
                                </div>
                            </button>
                        </form>
                    @endif

                </td>
            </tr>
        @endforeach
    @show
</table>
<x-helper.form_field.wrapper />
<script>
    let pressTimer;

    $(".longpress").mouseup(function () {
        clearTimeout(pressTimer);
        // Clear timeout
        return false;
    }).mousedown(function () {
        // Set timeout
        pressTimer = window.setTimeout(function () {
            showing()
        }, 600);
        return false;
    });

    function showing() {
        $('.checkbox-show').removeClass('hidden')
    }

    function hideCheck() {
        $('.checkbox-show').addClass('hidden')
    }

    function removeChecker() {
        $('input[type=checkbox]').prop('checked', false);
    }

    function selectAll() {
        $('input[type=checkbox]').prop('checked', true);
    }

</script>
