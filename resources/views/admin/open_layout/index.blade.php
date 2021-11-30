@extends("layout.layout")

@section("body")
    <div class="m-5">
        @yield("content")
    </div>
@endsection

@section("scripts")
    <script src="{{asset("js/table_script.js")}}"></script>
@endsection
