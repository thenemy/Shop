@extends("layout.layout")
@section("body")
    <div class="m-5">
        <x-helper.form.form :form="$form" :enctype="true">
            @yield("action")
        </x-helper.form.form>
    </div>

@endsection
