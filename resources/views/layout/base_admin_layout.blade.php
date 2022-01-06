@extends("layout.layout")


@section("header")
    {{--    <x-auth.common.header/>--}}
@endsection
@section("body")
    <div class="px-5 rounded h-screen">
        <div x-data="{ sidebarOpen: true }" class="flex h-screen">
            <div class="flex flex-row fixed space-x-1">
                <div class="flex-1 flex w-full">
                    <div class="w-full flex flex-col transition-custom"
                         :class=" sidebarOpen && 'width-sidebar'">
                        <div class=" h-screen">
                            @yield("sidebar")
                        </div>
                    </div>
                </div>
                <div class="">
                    <button class="p-1 mr-4  transition duration-500
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
            <div :class="sidebarOpen && 'lg:w-1/3 xl:w-1/4'">

            </div>
            <div class="m-10 transition h-screen w-screen">
                @yield("content")
            </div>
        </div>
    </div>

@endsection

@section("footer")

@endsection
