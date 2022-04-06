@extends('business.layouts.business')

@section('content')
{{-- header --}}
    <div class="mb-2" style="padding: 10px 165px 10px 30px; border-bottom: 2px solid rgb(219, 220, 219);">
        <h2 class="light-grey">Dashboard</h2> 
    </div>
{{-- main --}}
    <div class="d-flex px-4 my-2">
        <div class="dash-box d-flex flex-column align-items-center justify-content-center mx-2">
            <div class="mb-2">
                <img src="{{asset('img/icon/ICONA LISTA PRATICHE.svg')}}" alt="" class="img-fluid">
            </div>
            <p><b>Lista Pratiche</b></p>
        </div>
        <div class="dash-box d-flex flex-column align-items-center justify-content-center mx-2">
            <div class="mb-2" >
                <img src="{{asset('img/icon/ICONA NUOVA PRATICA.svg')}}" alt="" class="img-fluid">
            </div>
            <p><b>Nuova Pratica</b></p>
        </div>
        <div class="dash-box d-flex flex-column align-items-center justify-content-center mx-2">
            <div class="mb-2">
                <img src="{{asset('img/icon/ICONA GESTIONE ACCESSI.svg')}}" alt="" class="img-fluid">
            </div>
            <p><b>Gestione Accessi</b></p>
        </div>
        <div class="dash-box d-flex flex-column align-items-center justify-content-center mx-2">
            <div class="mb-2">
                <img src="{{asset('img/icon/ICONA GESTIONE FILE.svg')}}" alt="" class="img-fluid">
            </div>
            <p><b>Gestione File</b></p>
        </div>
    </div>
     
@endsection
