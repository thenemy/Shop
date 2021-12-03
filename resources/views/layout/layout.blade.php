<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"
          rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <title>Laravel</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
{{--    <script src="{{asset("js/jquery.js")}}"></script>--}}
<!-- Styles -->
    @livewireStyles
    @livewireScripts
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>
<body class="mb-5">

@yield("header")

@yield("body")

@yield("footer")

</body>
@yield("scripts")

<script src="{{asset("js/table_action.js")}}"></script>
@include("js/file_input")
<script>
    $('.hide_during_loading').removeClass("hidden");
</script>
</html>
