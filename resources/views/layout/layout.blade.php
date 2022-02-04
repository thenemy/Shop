<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"
          rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <title>Laravel</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"/>
    <link href="{{ asset('font/css/all.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
{{--    <script src="{{asset("js/jquery.js")}}"></script>--}}
<!-- Styles -->
    @livewireStyles
    @livewireScripts


</head>
<body class="mb-5 font-sans text-black_custom">
<div class="hidden bg-green-600 hover:bg-green-400 bg-gray-600 max-w-[50vw]
bg-red-200 btn-xs text-3xl text-2xl text-5xl text-green-500 text-green-300
text-black_custom hover:text-green-300 text-blue-500 hover:text-blue-300
text-red-500 hover:text-red-300
text-gray-500 hover:text-gray-300
hover:bg-green-700 space-y-3 space-y-4 space-y-6 bg-red-400  basis-5/12
  hover:bg-gray-400 bg-green-400 hover:bg-green-200 text-gray-700 hover:bg-gray-50"></div>
@yield("header")

@yield("body")

@yield("footer")

</body>
@yield("scripts")

<script src="{{asset("js/table_action.js")}}"></script>
<script src="{{asset("js/table_script.js")}}"></script>
<script src="{{asset("js/filter.js")}}"></script>
<script src="{{asset("js/init_alpine.js")}}"></script>
<script>
    $('.hide_during_loading').removeClass("hidden");
</script>
</html>
