<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- jQuery -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container-custom d-flex">
            <nav class="navbar">
                <div class="my-4 ml-4">
                    <img src="{{asset('img/logo.svg')}}" alt="">
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item nav-pills">
                        <a class="nav-link {{Route::currentRouteName() == 'business.dashboard' ? 'activ' : ''}}" href="{{route('business.dashboard')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{Route::currentRouteName() == 'business.users.index' ? 'activ' : ''}}" href="{{route('business.users.index')}}">Gestione Utenti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::currentRouteName() == 'business.folder.index' ? 'activ' : ''}}" href="{{route('business.folder.index')}}">Gestione Cartelle/File</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::currentRouteName() == 'business.practice.index' ? 'activ' : ''}}" href="{{route('business.practice.index')}}">Gestione Pratiche</a>
                    </li>
                </ul>
            </nav>

            <div class="big-container">
                @include('business.layouts.partials.header')
                <main>
                    @include('business.layouts.partials.error')
                    @include('business.layouts.partials.message')
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
@stack('scripts')
</body>
</html>
