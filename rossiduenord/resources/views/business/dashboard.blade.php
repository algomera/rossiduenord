@extends('business.layouts.business')

@section('content')
{{-- header --}}
    <div class="mb-2" style="padding: 10px 165px 10px 30px; border-bottom: 2px solid rgb(219, 220, 219);">
        <h2 class="light-grey">Dashboard</h2>
    </div>
{{-- main --}}
    <div class="dash-container d-flex px-4 my-2 text-black">
        <a class="dash-link" href="{{route('business.practice.index')}}">
            <div class="dash-box d-flex flex-column align-items-center justify-content-center mx-2">
                <div class="mb-2">
                    <img src="{{asset('img/icon/ICONA LISTA PRATICHE.svg')}}" alt="" class="img-fluid">
                </div>
                <p><b>Lista Pratiche</b></p>
            </div>
        </a>

        <form action="{{route('business.applicant.store') }}" method="post" @click="startLoading()">
            @csrf
            <button type="submit"  class="d-flex flex-column align-items-center justify-content-center" style="background-color: transparent; border: none;">
                <div class="dash-box d-flex flex-column align-items-center justify-content-center mx-2">
                    <div class="mb-2" >
                        <img src="{{asset('img/icon/ICONA NUOVA PRATICA.svg')}}" alt="" class="img-fluid">
                    </div>
                    <p><b>Nuova Pratica</b></p>
                </div>
            </button>
        </form>

        <a class="dash-link" href="{{route('business.users.index')}}">
            <div class="dash-box d-flex flex-column align-items-center justify-content-center mx-2">
                <div class="mb-2">
                    <img src="{{asset('img/icon/ICONA GESTIONE ACCESSI.svg')}}" alt="" class="img-fluid">
                </div>
                <p><b>Gestione Accessi</b></p>
            </div>
        </a>
        <a class="dash-link" href="{{route('business.folder.index')}}">
            <div class="dash-box d-flex flex-column align-items-center justify-content-center mx-2">
                <div class="mb-2">
                    <img src="{{asset('img/icon/ICONA GESTIONE FILE.svg')}}" alt="" class="img-fluid">
                </div>
                <p><b>Gestione File</b></p>
            </div>
        </a>
    </div>
    <div class="mt-5 pl-4 ml-2">
        <h4 class="mb-0">Scarica l'app</h4>
        <div class=" d-flex w-25 border-bottom border-dark mt-1">
            <a href="#">
                <img src="{{asset('img/icon/BUTTON_APP_STORE.svg')}}" alt="" class="img-fluid">
            </a>
            <a href="#">
                <img src="{{asset('img/icon/BUTTON_GOOGLE_PLAY.svg')}}" alt="" class="img-fluid">
            </a>
        </div>
    </div>
@endsection
