<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @if (Route::currentRouteName() != 'bank.dashboard ')
        <script src="{{ asset('js/app.js') }}" defer></script>
    @endif

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="chart">

        <div class="container-custom d-flex">
            <nav class="navbar">
                <ul class="nav flex-column">
                    <div class="my-4 ml-4">
                        <img src="" alt="Logo">
                    </div>
                    <li class="nav-item nav-pills">
                        <a class="nav-link {{Route::currentRouteName() == 'bank.dashboard' ? 'activ' : ''}}" href="{{route('bank.dashboard')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{Route::currentRouteName() == 'bank.users.index' ? 'activ' : ''}}" href="{{route('bank.users.index')}}">Gestione Accessi</a>
                    </li>
                    <li class="nav-item nav-pills">
                        <a class="nav-link {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('bank.dashboard')}}">Anagrafica clienti</a>
                    </li>
                    {{-- <li class="nav-item nav-pills">
                        <a class="nav-link {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('bank.dashboard')}}">Kit documentale</a>
                    </li>
                    <li class="nav-item nav-pills">
                        <a class="nav-link {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('bank.dashboard')}}">Info Temporary manager</a>
                    </li>
                    <li class="nav-item nav-pills">
                        <a class="nav-link {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('bank.dashboard')}}">Info credito D.O.C</a>
                    </li>
                    <li class="nav-item nav-pills">
                        <a class="nav-link {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('bank.dashboard')}}">Info rating aziendale</a>
                    </li>
                    <li class="nav-item nav-pills">
                        <a class="nav-link {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('bank.dashboard')}}">Info rating tecnico</a>
                    </li>
                    <li class="nav-item nav-pills">
                        <a class="nav-link {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('bank.dashboard')}}">Vetrina</a>
                    </li>
                    <li class="nav-item nav-pills">
                        <a class="nav-link {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('bank.dashboard')}}">Imprese</a>
                    </li>
                    <li class="nav-item nav-pills">
                        <a class="nav-link {{Route::currentRouteName() == '' ? 'activ' : ''}}" href="{{route('bank.dashboard')}}">Credito D.O.C</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{Route::currentRouteName() == 'bank.folder.index' ? 'activ' : ''}}" href="{{route('bank.folder.index')}}" href="#">Gestione Cartelle/File</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::currentRouteName() == 'bank.practice.index ' ? 'activ' : ''}}" href="{{route('bank.practice.index')}}">Gestione Pratiche</a>
                    </li>
                </ul>
            </nav>

            <div class="big-container">
                @include('bank.layouts.partials.header')
                
                <main>
                    @yield('content')
                </main>    
            </div>
        </div>       
    </div>

    <script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"> </script>   
    <script>
        $(document).ready(function(){
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#table_ContentListFolder tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });

        $(document).ready(function() {
            
        $('.checkall').click(function() {
            $(":checkbox").attr("checked", true);
        });
        
        $('.uncheckall').click(function() {
            $(":checkbox").attr("checked", false);
        });
    });
    </script>

</body>
</html>
