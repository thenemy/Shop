@extends("layout.layout")


@section("header")
    {{--    <x-auth.common.header/>--}}
@endsection
@section("body")
    <div class="px-5 rounded h-screen">
        <div x-data="{ sidebarOpen: false }" class="flex">
            <div class="flex flex-row absolute fixed space-x-1">
                <div class="flex-1 flex w-full z-50">
                    <aside class="w-full flex h-screen flex-col transition-custom"
                           :class=" sidebarOpen && 'width-sidebar'">
                        @yield("sidebar")
                    </aside>
                </div>
                <div class="">
                    <button class="p-1 mr-4 transition duration-500
                    ease-in-out transform hover:-translate-y-1
                    hover:scale-130" @click="sidebarOpen = !sidebarOpen"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex-1 m-10 transition h-screen w-screen">
                @yield("content")
            </div>
        </div>
    </div>

@endsection

@section("footer")

@endsection
