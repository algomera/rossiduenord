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
            <nav class="navbar ov-y p-0 ov-x-none">
                <div class="my-3 ml-3 ml-md-2 px-3">
                    @if (auth()->user()->user_data->name == 'Impresa Example')
                      <img src="{{asset('img/Logo_.png')}}" alt="Prime-Hub" class="img-fluid">
                    @endif
                    @if (auth()->user()->user_data->name == 'Edrasis Group')
                      <img src="{{asset('img/edrasis_logo.png')}}" alt="Edrasis Logo" class="img-fluid w-75 mt-3">
                    @endif
                </div>
                <ul class="nav flex-column w-100">
                    <li class="nav-item nav-pills">
                        <a class="nav-link ml-4 ml-md-2 {{Route::currentRouteName() == 'business.dashboard' ? 'activ' : ''}}" href="{{route('business.dashboard')}}">Home</a>
                    </li>
                    <li class="nav-item nav-pills">
                        <a class="nav-link ml-4 ml-md-2 {{request()->is('business/anagrafiche*') ? 'activ' : ''}}" href="{{route('business.anagrafiche.index')}}">Anagrafiche</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-4 ml-md-2  {{Route::currentRouteName() == 'business.users.index' ? 'activ' : ''}}" href="{{route('business.users.index')}}">Gestione Accessi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-4 ml-md-2  {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('business.practice.index')}}">Società controllore</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-4 ml-md-2  {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('business.practice.index')}}">Visualizza valut.rating</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-4 ml-md-2  {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('business.practice.index')}}">Book reference</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-4 ml-md-2  {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('business.practice.index')}}">Aziende subappaltatrici</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-4 ml-md-2  {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('business.practice.index')}}">Polizze aziendali</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-4 ml-md-2  {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('business.practice.index')}}">Vetrina</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-4 ml-md-2  {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('business.practice.index')}}">Cronoprogramma lavori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-4 ml-md-2  {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('business.practice.index')}}">Fornitori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-4 ml-md-2  {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('business.practice.index')}}">Certficati materiali</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-4 ml-md-2 {{Route::currentRouteName() == 'business.practice.index' ? 'activ' : ''}}" href="{{route('business.practice.index')}}">Pratiche</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-4 ml-md-2 {{Route::currentRouteName() == 'business.folder.index' ? 'activ' : ''}}" href="{{route('business.folder.index')}}">Gestione Cartelle/File</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-4 ml-md-2 {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('business.practice.index')}}">Asseverazione Tecnica</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-4 ml-md-2 {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('business.practice.index')}}">Asseverazione fiscale</a>
                    </li>
                    <li class="nav-item" :class="{'selected-nav' : isListVisible}">
                        <a class="nav-link ml-4 ml-md-2 clickable nav-parent {{Route::currentRouteName() == '' ? 'activ' : ''}}" @click="openList()"> Credito D.O.C </a>
                        <ul class="nav flex-column"  v-if="isListVisible">
                            <div class="pl-2">
                                <li class="nav-item">
                                    <a class="nav-link ml-4 ml-md-2 {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('business.practice.index')}}">Revisione tecnica</a>
                                </li>
                                <li class="nav-item">
                                      <a class="nav-link ml-4 ml-md-2 {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('business.practice.index')}}">Revisione fiscale</a>
                                 </li>
                                <li class="nav-item">
                                      <a class="nav-link ml-4 ml-md-2 {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('business.practice.index')}}">Contr. qualità lavoro/imprese</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-4 ml-md-2 {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('business.practice.index')}}">Polizze</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-4 ml-md-2 {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('business.practice.index')}}">Foto GPS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-4 ml-md-2 {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('business.practice.index')}}">Video GPS</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-4 ml-md-2 {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('business.practice.index')}}">Elaborati grafici</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link ml-4 ml-md-2 {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('business.practice.index')}}">Supervisor</a>
                                </li>
                            </div>
                        </ul>
                    </li>
                </ul>
            </nav>

            <div class="big-container">
                @include('business.layouts.partials.header')
                <main>
                    @include('business.layouts.partials.error')
                    @include('business.layouts.partials.message')
                    @yield('content')

                    {{-- LOADER --}}
                    <div v-if="isLoading">
                        <practice-loader></practice-loader>
                    </div>
                    {{-- LOADER --}}
                </main>
            </div>
        </div>
    </div>
    @stack('modals')
    @stack('scripts')
</body>
</html>
