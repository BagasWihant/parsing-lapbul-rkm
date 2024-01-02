<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/logo-biru.png')}}">              
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="/assets/dropzone.css">
    <link rel="stylesheet" href="{{ asset('assets/lineicons.css') }}">

    <script src="{{ asset('assets/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/notify.min.js') }}"></script>
    <script src="{{ asset('assets/dropzone-min.js') }}"></script>
    @vite('resources/css/app.css')

</head>

<body class="bg-gray-100 dark:bg-gray-900"> 
    @yield('content')

    @stack('js')
</body>

</html>
