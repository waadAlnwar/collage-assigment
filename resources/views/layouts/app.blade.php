<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Collage App</title>
    <!-- Styles -->

    <style>
        body {
            font-family: tahoma
        }
    </style>
    @livewireStyles
</head>

<body>
    <div>
        {{ $slot }}
    </div>

    @livewireScripts
    @stack('scripts')
</body>

</html>
