@extends("layout.layout")
@section("body")
    <div x-data="{isSideBarOpen: false}" class="flex flex-row w-full">
        <div
            :class="isSideBarOpen && 'w-14' || 'basis-1/5'"
        >
            <div class="flex flex-row justify-between items-center bg-black  pb-1">
                <div class="pl-2"  x-show="!isSideBarOpen">
                    <a href="{{route('admin.dashboard.index')}}">
                        <img src="{{asset("images/logo.svg")}}">
                    </a>
                </div>
                <div class="">
                    <div @click="isSideBarOpen = !isSideBarOpen" class="p-5 text-center">
                        <span class="leading-3 text-white fa fa-bars"></span>
                    </div>
                </div>
            </div>
            <div class="bg-sidebar h-full">
                <div class="h-screen">
                    @yield("sidebar")
                </div>
            </div>
        </div>

        <div
            :class="isSideBarOpen && 'w-full' || 'max-w-[80vw]'"
            class="bg-background flex-1">
            <div class="bg-white w-full h-16 shadow">
                @yield("new_header")
            </div>
            <div class="ml-4 mt-4 ">
                @yield("content")
            </div>
        </div>
    </div>
@endsection
