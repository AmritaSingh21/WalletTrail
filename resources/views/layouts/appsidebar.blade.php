<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body>
    @include('partials.topbar')

    @if (Auth::user()->role_id != 1)
    @include('partials.sidebar')
    @else
    @include('partials.sidebaradmin')
    @endif

    <main class="py-4 main">
        @yield('content')
    </main>

</body>

</html>