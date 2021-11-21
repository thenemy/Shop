@extends("layout.layout")


@section("header")
{{--    <x-auth.common.header/>--}}
@endsection
@section("body")

    <div class="m-5 flex flex-row">

        @yield("sidebar")

        <div class="flex-1">

            @yield("content")

        </div>

    </div>

@endsection

@section("footer")

@endsection
