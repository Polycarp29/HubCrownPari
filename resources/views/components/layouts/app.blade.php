<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

     <!-- Toastify CSS + JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @livewireStyles
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>

<body>
    @livewire('components.common.auth-navigation-bar')
    {{ $slot }}

    <!---Livewire scripts --->

    @livewireScripts
    <script src="{{  asset('js/toasterscript.js') }}"></script>
    <script src="{{  asset('js/redirect.js') }}"></script>

</body>

</html>
