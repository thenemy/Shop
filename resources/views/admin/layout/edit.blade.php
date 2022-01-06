@extends("layout.admin_layout")
@section("content")
    <x-helper.form.form :form="$form" :enctype="true" method="PUT">
        @yield("action")
    </x-helper.form.form>
@endsection
