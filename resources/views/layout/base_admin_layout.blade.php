@extends("layout.layout")


@section("header")
    {{--    <x-auth.common.header/>--}}
@endsection
@section("body")

    <div class="m-5 rounded">
        <div x-data="{ sidebarOpen: false }" class="flex overflow-x-hidden">
            <aside class="flex-shrink-0 w-90 w-1/6 flex flex-col transition-all duration-300"
                   :class="{ '-ml-72': !sidebarOpen }">
                @yield("sidebar")
            </aside>
            <div class="flex-1 m-4 flex-row">
                <button class="p-1 mr-4 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-130" @click="sidebarOpen = !sidebarOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                @yield("content")
            </div>
        </div>
    </div>

@endsection

@section("footer")

@endsection
