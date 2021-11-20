@extends("layout.layout")

@section("body")

    <div class="m-5 flex flex-row">

{{--        @yield("sidebar")--}}

        <div class="flex-1">

            @yield("content")

        </div>

    </div>

@endsection

@section("footer")

@endsection
