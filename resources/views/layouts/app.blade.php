<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body>
    @include('partials.topbar')

    <main class="py-4">
        @yield('content')
    </main>

</body>

</html>