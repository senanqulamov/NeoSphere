<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layout.components.meta')
    @include('layout.components.links')
    @yield('head')
    <title>@yield('title', config('app.name'))</title>
</head>

<body>
    @include('layout.components.header')


    @yield('content')

    @include('layout.components.footer')

    @include('layout.components.scripts')

    @yield('scripts')
    @stack('scripts')
</body>

</html>
