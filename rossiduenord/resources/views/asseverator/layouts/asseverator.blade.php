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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container-custom d-flex">
            <nav class="navbar ov-y p-0">
                <div class="ml-3 px-4">
                    <img src="{{asset('img/edrasis_logo.png')}}" class="img-fluid h-50">
                </div>
                <ul class="nav flex-column w-100">
                    <li class="nav-item nav-pills">
                        <a class="nav-link ml-4 {{Route::currentRouteName() == 'asseverator.dashboard' ? 'activ' : ''}}" href="{{route('asseverator.dashboard')}}">Home</a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link ml-4  {{Route::currentRouteName() == 'asseverator.users.index' ? 'activ' : ''}}" href="{{route('asseverator.users.index')}}">Imprese</a>--}}
{{--                    </li>--}}
                    <li class="nav-item" :class="{'selected-nav' : isListVisible}">
                        <a class="nav-link ml-4 clickable nav-parent {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('asseverator.practice.index')}}" @click="openList()"> Pratiche </a>
                        {{-- <ul class="nav flex-column"  v-if="isListVisible">
                            <div class="pl-2">
                                <li class="nav-item">
                                    <a class="nav-link ml-4 {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('asseverator.practice.index')}}">Dati pratica</a>
                                </li>
                                <li class="nav-item">
                                      <a class="nav-link ml-4 {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('asseverator.practice.index')}}">Dati Immobile</a>
                                 </li>
                                <li class="nav-item">
                                      <a class="nav-link ml-4 {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('asseverator.practice.index')}}">Soggetti</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-4 {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('asseverator.practice.index')}}">Importi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-4 {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('asseverator.practice.index')}}">Documentazione</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-4 {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('asseverator.practice.index')}}">Foto(NO GPS)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-4 {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('asseverator.practice.index')}}">Polizze assicurative</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-4 {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('asseverator.practice.index')}}">Computo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-4 {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('asseverator.practice.index')}}">Asseverazione tecnica</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-4 {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('asseverator.practice.index')}}">Asseverazione fiscale</a>
                                </li>
                            </div>
                        </ul> --}}
                    </li>
                </ul>
            </nav>

            <div class="big-container">
                @include('asseverator.layouts.partials.header')
                <main>
                    @include('asseverator.layouts.partials.error')
                    @include('asseverator.layouts.partials.message')
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    @stack('asseverator-scripts')
</body>
</html>
