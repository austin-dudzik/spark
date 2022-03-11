<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('title') @yield('title') {{'|'}} @endif{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>⚡</text></svg>">

    <!-- Fonts -->
    <link href="https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @auth
        <style>
            :root {
                --theme-color: {{\Illuminate\Support\Facades\Auth::user()->theme}};
            }
        </style>
    @endauth

</head>
<body>
<div id="app" @if(Auth::check()) class="authIn" @endif>

@auth

    <!-- Navigation -->
    @include('layouts.header')
    @include('layouts.sidebar')

    <!-- Modals -->
    @include('modals.newTask')
    @include('modals.newLabel')
    @include('modals.newNote')

    @endauth

    <main id="content" class="{{Auth::check() ? 'app-content pt-5 mt-5 bg-white' : ''}}">
        @yield('content')
    </main>

</div>

</body>
</html>
