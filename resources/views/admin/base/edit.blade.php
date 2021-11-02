@extends("layout.admin_layout")
@section("content")

    <x-admin.form.form :form="$form" :enctype="true" method="PUT">
        @yield("action")
    </x-admin.form.form>
@endsection
