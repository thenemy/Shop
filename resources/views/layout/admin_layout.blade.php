@extends("layout.base_admin_layout")

@section("sidebar")
    <div class="">
        <x-helper.sidebar.sidebar name="Админ" :list="\App\View\Helper\SideBar\Models\Admin\AdminSideBar::sideBars()"/>
    </div>
@endsection
