@extends("layout.admin_layout")
@section("content")
    <x-helper.form.form :form="$form" :enctype="true">
        @yield("action")
    </x-helper.form.form>
@endsection
