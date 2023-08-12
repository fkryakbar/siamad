<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.navbar')
    @include('components.hero')
    @yield('content')
    @include('components.footer')
</body>

</html>
