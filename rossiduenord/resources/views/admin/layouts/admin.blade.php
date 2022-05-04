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
                    @if (auth()->user()->user_data->name == 'Impresa Example' || auth()->user()->user_data->name == 'Administrator' )
                      <img src="{{asset('img/Logo_.png')}}" alt="Prime-Hub" class="img-fluid">
                    @endif
                    @if (auth()->user()->user_data->name == 'Edrasis Group')
                      <img src="{{asset('img/edrasis_logo.png')}}" alt="Edrasis Logo" class="img-fluid w-75 mt-3">
                    @endif
                </div>
                <ul class="nav flex-column w-100">
                    <li class="nav-item nav-pills">
                        <a class="nav-link ml-4 ml-md-2 {{Route::currentRouteName() == 'admin.dashboard' ? 'activ' : ''}}" href="{{route('admin.dashboard')}}">Home</a>
                    </li>
                    <li class="nav-item nav-pills">
                        <a class="nav-link ml-4 ml-md-2 {{request()->is('admin/anagrafiche*') ? 'activ' : ''}}" href="{{route('admin.anagrafiche.index')}}">Anagrafiche</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-4 ml-md-2  {{Route::currentRouteName() == 'admin.users.index' ? 'activ' : ''}}" href="{{route('admin.users.index')}}">Gestione Accessi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-4 ml-md-2 {{Route::currentRouteName() == 'admin.practice.index' ? 'activ' : ''}}" href="{{route('admin.practice.index')}}">Pratiche</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-4 ml-md-2 {{Route::currentRouteName() == 'admin.folder.index' ? 'activ' : ''}}" href="{{route('admin.folder.index')}}">Gestione Cartelle/File</a>
                    </li>
                </ul>
            </nav>

            <div class="big-container">
                @include('admin.layouts.partials.header')
                <main>
                    @include('admin.layouts.partials.error')
                    @include('admin.layouts.partials.message')
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
