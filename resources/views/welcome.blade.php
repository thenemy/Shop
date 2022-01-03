@extends("layout.layout")
@section("body")
    <div class="flex flex-row w-full">
        <div x-data="{isSideBarOpen: false}"
             :class="isSideBarOpen && 'w-16' || 'basis-1/5'">
            <div class="flex flex-row items-center bg-black h-16">
                <div class="self-center">
                    <div @click="isSideBarOpen = !isSideBarOpen" class="p-5 text-center">
                        <span class="leading-3 text-white fa fa-bars"></span>
                    </div>
                </div>
            </div>
            <div class="bg-sidebar h-screen">
                <x-helper.sidebar.new_sidebar name="Админ" :list="\SideBar::sideBars()"/>
            </div>
        </div>

        <div class="bg-background flex-1">
            <div class="bg-white w-full h-16 shadow">
                @yield("new_header")
            </div>
            <div class="">
                @yield("new_body")
            </div>
        </div>
    </div>
@endsection
