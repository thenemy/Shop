<div>
    <div class="flex items-center" x-data="{ open: false }" x-on:click.outside="open = false">
        <button class="hidden checkbox-show inline-flex rounded-md border border-gray-300 shadow-sm
            p-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none
            focus:ring-2 h-10 w-full focus:ring-offset-2 px-3 focus:ring-offset-gray-100 focus:ring-indigo-500"
                id="menu-button" aria-expanded="true" aria-haspopup="true" x-on:click="open = !open">
            Options
            <img src="{{asset('dropdown_arrow.svg')}}" alt="">
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
                <button onclick="deleteSelected()" class="hidden checkbox-show">
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
<script>
    let pressTimer;
    let isDelete;

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

    function confirmDelete(){
        confirm("Press a button!");
    }

</script>
