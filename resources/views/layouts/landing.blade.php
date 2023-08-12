<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js" defer></script>
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
