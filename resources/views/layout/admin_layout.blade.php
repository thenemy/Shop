@extends("layout.base_admin_layout")

@section("sidebar")
    <div class="">
        <x-helper.sidebar.sidebar name="Админ" :list="\SideBar::sideBars()"/>
    </div>
@endsection

@section("scripts")
    <script src="{{asset("js/table_script.js")}}"></script>
@endsection
