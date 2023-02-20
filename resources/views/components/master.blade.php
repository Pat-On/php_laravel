
@vite(['resources/js/app.js'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./public/">

    {{-- https://techvblogs.com/blog/how-to-install-bootstrap-5-in-laravel-9-with-vite --}}
    @vite(['resources/js/app.js'])
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script> --}}
    <!-- Styles -->
</head>

<body class="antialiased">
    Laravel
    <br/>
    <button class="btn btn-danger">CLICK</button>

    @yield('part1')
    <br/>
    @yield('part2')
</body>

</html>