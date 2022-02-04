@extends("layout.new_base_admin_layout")

@section("sidebar")
    <div class="">
        <x-helper.sidebar.new_sidebar name="Админ" :list="\SideBar::sideBars()"/>
    </div>
@endsection
@section("new_header")
    <x-helper.header.header/>
@endsection
@section("scripts")
    <script src="{{asset("js/table_script.js")}}"></script>
@endsection
