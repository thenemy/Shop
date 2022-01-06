<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="bg-blue-200 antialiased">
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="max-w-7xl mx-auto px-28 sm:px-6 lg:px-8 space-y-10">

    <div class="flex flex-row space-x-2"><a href="">Главная страница</a> <span>»</span> <a href="">Главная страница</a>
        <span>»</span> <a href="">Главная страница</a></div>
    {{--    <div class="md:flex h-auto md:flex-row space-y-8  ">--}}
    {{--        <x-course.sidebar/>--}}

    {{--    </div>--}}
    <div class="">
        <div class="flex flex-row h-full w-full">
            <x-helper.sidebar/>
            <span class="w-5"></span>

            @yield("content")
        </div>
        @yield("after_content")
    </div>


</div>
</body>
</html>
