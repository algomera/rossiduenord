@extends('business.layouts.business')

@section('content')
@include('business.layouts.partials.practiceNav')

            <div class="nav_bonus">
                <span class="{{Route::currentRouteName() == 'business.superbonus.show' ? 'frame' : ''}}">Dati di Progetto</span>
                <span class="{{Route::currentRouteName() == 'business.practice.index' ? 'frame' : ''}}">Interventi trainanti</span>
                <span class="{{Route::currentRouteName() == 'business.practice.index' ? 'frame' : ''}}">Interventi trainati</span>
                <span class="{{Route::currentRouteName() == 'business.practice.index' ? 'frame' : ''}}">Dati stato finale</span>
                <span class="{{Route::currentRouteName() == 'business.practice.index' ? 'frame' : ''}}">Tot. Spese e Dichiarazioni</span>
                <span class="{{Route::currentRouteName() == 'business.practice.index' ? 'frame' : ''}}">Varianti</span>
            </div>

            <form action="{{route('business.update_data_project')}}" method="POST">
                @csrf
                @method('PUT')

                <div class="px-20">
                    <h6>Dati di Progetti</h6>
                    <hr style="margin-top: 5px; background-color: #211e16;">
                </div>
                
                <div class="dati_progetto px-20 pb-20">
                    <div class="d-flex">
                        <p>È stata depositata la relazione tecnica prevista dall’art. 28 della legge 10/91 e dall’art. 8 comma 1 del D.lgs 192/05 e successive modificazioni</p>
                        <label for="" style="margin-left: 20px">
                            <input type="radio">
                            N.D.
                        </label>
                        <label for="" style="margin-left: 20px">
                            <input type="radio"> 
                            No
                        </label>
                        <label for="" style="margin-left: 20px">
                            <input type="radio">
                            Si
                        </label>
                    </div>
                    <div class="d-flex align-items-center">
                        <p style="margin: 0">è stata depositata nell’ufficio competente del Comune di</p>
                        <input type="text" value="Romano D'Ezzelino" style="margin-left: 20px;" class="text-center border">
                        <label for="" style="margin: 0; padding-left: 20px;">
                            Prov.
                            <input type="text" value="VI" class="text-center border">
                        </label>
                        <label for="" style="margin: 0; padding-left: 20px;">
                            in data
                            <input type="text" value="16/09/2021" class="text-center border">
                        </label>
                        <label for="" style="margin: 0; padding-left: 20px;">
                            Protocollo n.
                            <input type="text" value="SUPRO/0326491" class="text-center border">
                        </label>
                    </div>
                    <div class="d-flex align-items-center mt-5">
                        <input type="checkbox" name="" id="">
                        <p class="m-0 ml-2">Non è stata depositata la relazione tecnica in quanto si ricade nei casi di esclusione previsti dal comma 1 dell’art. 8 del del D.lgs 192/05 e dal punto 2,
                            paragrafo 2.2. dell’allegato 1 del decreto 26/06/2015</p>
                    </div>
                
                    <div class="mt-5">
                        <label for="">
                            - gli stessi lavori sono iniziati in data
                            <input type="text" value="gg/mm/aaaa" class="text-center border">
                        </label>
                        <label for="" style="padding-left: 20px;">
                            e conclusi in data
                            <input type="text" value="gg/mm/aaaa" class="text-center border">
                        </label>
                    </div>
                
                    <div>
                        <p class="m-0 mt-2">- i lavori sono eseguiti su:</p>
                        <div>
                            <label for="">
                                <input type="radio" name="" id="" class="mr-2">
                                Edificio condominiale composto da n. unità
                            </label>
                            <input type="text" value="12" class="mr-4 text-center border">
                            <span>n.pertinenza</span>
                            <input type="text" value="14" class="mr-4 text-center border">
                            <label for="">
                                <input type="checkbox" name="" id="">
                                con impianto termico centralizzato
                            </label>
                        </div>
                        <label for="" class="d-flex align-items-center">
                            <input type="radio" name="" id="" class="mr-2">
                            Unità immobiliare unifamiliare
                        </label>
                        <label for="" class="d-flex align-items-center">
                            <input type="radio" name="" id="" class="mr-2">
                            Unità immobiliari situate in edifici plurifamiliari
                        </label>
                    </div>
                
                    <div class="d-flex align-items-center mt-4">
                        <p class="m-0">- la superficie lorda ante lavori complessiva disperdente è pari a</p>
                        <input type="text" value="1.391,00" class="text-center ml-2 mr-2 border">
                        <span>m²</span>
                    </div>
                
                    <div class="mt-5">
                        <b>Informazioni relative ai nuovi prezzi utilizzati nel computo metrico</b>
                        <hr style="margin-top: 5px; background-color: #211e16;">
                        <div class="d-flex">
                            <div class="d-flex flex-column justify-content-between mr-4">
                                <b>Numero voci NP utilizzate</b>
                                <b  style="color: #00cfb4;">- di cui validate</b>
                                <b style="color: #e4003c;">- di cui ancora da validare</b>
                            </div>
                            <div class="d-flex flex-column">
                                <input type="text" value="17" style="width: 150px" class="text-center font-weight-bold mb-2 bg-light border">
                                <input type="text" value="0" style="width: 150px" class="text-center font-weight-bold mb-2 bg-light border">
                                <input type="text" value="17" style="width: 150px" class="text-center font-weight-bold bg-light border">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-fixed">
                    <a href="{{ route('business.practice.index') }}" class="add-button" style="background-color: #818387" >
                        {{ __('Annulla')}}
                    </a>
                    <button type="submit" class="add-button position-relative ml-2">
                        {{ __('Conferma') }}
                    </button>
                </div>
            </form>

        </div>{{-- chiusura div box praticeNav--}}

    </div>{{-- chiusura div content-main praticeNav --}}

@endsection