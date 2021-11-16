@extends("layout.admin_layout")
@section("content")
    @yield("action")
    <x-helper.list.complete_list :list="$table"/>
@endsection
