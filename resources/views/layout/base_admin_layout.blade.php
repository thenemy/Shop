@extends("layout.layout")


@section("header")
    {{--    <x-auth.common.header/>--}}
@endsection
@section("body")

    <div class="p-5 rounded">
        <div x-data="{ sidebarOpen: true }" class="flex overflow-x-hidden">
            <aside class="flex-shrink flex flex-col transition-custom"
                   :class=" sidebarOpen && 'width-sidebar' "
                {{--                   x-show="sidebarOpen"--}}
                {{--                   x-transition:enter="transition-custom"--}}
                {{--                   x-transition:enter-start="w-0"--}}
                {{--                   x-transition:enter-end="w-100"--}}
                {{--                   x-transition:leave="transition-custom"--}}
                {{--                   x-transition:leave-start="w-100"--}}
                {{--                   x-transition:leave-end="w-0"--}}
                {{--                   :class="--}}
                {{--                        sidebarOpen ?'transition-width transition-slowest ease' :--}}
                {{--                        'transition  duration-300 transform translate-x-0 w-max'"--}}
            >
                @yield("sidebar")
            </aside>
            <div class="flex-1 m-4 flex-row transition"
                 :class=" sidebarOpen || 'flex-growth'">
                <button class="p-1 mr-4 transition duration-500 ease-in-out transform hover:-translate-y-1
                hover:scale-130" @click="sidebarOpen = !sidebarOpen">
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
