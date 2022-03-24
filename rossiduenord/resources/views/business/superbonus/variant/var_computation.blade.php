@extends('business.layouts.business')

@section('content')
@include('business.layouts.partials.practiceNav')

            <div class="nav_bonus">
                <a href="{{ route('business.practice.index') }}" class="{{Route::currentRouteName() == 'business.superbonus.show' ? 'frame' : ''}}">Dati di Progetto</a>
                <a href="{{ route('business.practice.index') }}" class="{{Route::currentRouteName() == '' ? 'frame' : ''}}">Interventi trainanti</a>
                <a href="{{ route('business.practice.index') }}" class="{{Route::currentRouteName() == '' ? 'frame' : ''}}">Interventi trainati</a>
                <a href="{{ route('business.practice.index') }}" class="{{Route::currentRouteName() == '' ? 'frame' : ''}}">Dati stato finale</a>
                <a href="{{ route('business.practice.index') }}" class="{{Route::currentRouteName() == '' ? 'frame' : ''}}">Tot. Spese e Dichiarazioni</a>
                <a href="{{ route('business.practice.index') }}" class="{{Route::currentRouteName() == '' ? 'frame' : ''}}">Varianti</a>
            </div>

            <form action="" method="POST">
                @csrf
                @method('PUT')

                <div class="px-20">
                    <h6>Spese complessive e dichiarazioni</h6>
                    <hr style="margin-top: 5px; background-color: #211e16;">
                </div> 
                
                {{-- navbar --}}
                <div class="nav_bonus d-flex align-items-center">
                    <a class="frame">Varianti computo</a> 
                    <a>Storico SAL</a> 
                </div>
                
                <div class="scroll">
                    
                    <section class="px-20">{{-- Richiedi variante a SAl 2  --}}
                        <label class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="" value=""> 
                            <span class="checkmark"></span> 
                            <span class="black">
                                <b>Richiedi variante a SAl 2</b>
                            </span>
                        </label>
                    
                        <section class="px-20">
                            <div class="d-flex align-items-center">
                                
                                <label class="checkbox-wrapper d-flex"><p class="black">Relazione tecnica prevista dall'art:28 della legge 10791 e dall'art.8 comma 1 del D.lgs 192/05 e s...</p>
                                    <input type="checkbox" name="" value=""> 
                                    <span class="checkmark"></span> 
                                </label>
                            </div>
                            <div class="d-flex">
                                <p>
                                    è stata depositata nell'ufficio competente del Comune di 
                                </p> 
                                <label for="" class=" m-0 mr-4 black">
                                    <input type="text" value="" class="border ml-2 px-2" style="width: 120px;" placeholder="comune L.10">
                                </label>
                                <label for="" class=" m-0 mr-4 black">Prov.
                                    <input type="text" value="" class="border ml-2 px-2" style="width: 120px;" placeholder="PROV">
                                </label>
                                <label for="" class=" m-0 mr-4 black">In data
                                    <input type="text" value="" class="border ml-2 px-2" style="width: 120px;" placeholder="gg/mm/aaaaa">
                                </label>
                            </div>
                            <div>
                                <label for="" class=" m-0 mr-4"><span class="black">Protocollo n.</span>
                                    <input type="text" value="" class="border ml-2 px-2" style="width: 120px;">
                                </label>
                            </div>
    
                            {{-- chehckbox --}}
                            <div class="my-2">
                                <div class="d-flex align-items-center m-0">{{-- APE post convenzionale --}}
                                    <label class="checkbox-wrapper d-flex"><p class="black">APE post convenzionale</p>
                                        <input type="checkbox" name="" value=""> 
                                        <span class="checkmark"></span> 
                                    </label>
                                </div>
                                
                                <div class="d-flex align-items-center m-0">{{-- Variazioni dati superbonus 110%(Interventi trainanti, trainati e computo metri...) --}}
                                    <label class="checkbox-wrapper d-flex"><p class="black">Variazioni dati superbonus 110%(Interventi trainanti, trainati e computo metri...)</p>
                                        <input type="checkbox" name="" value=""> 
                                        <span class="checkmark"></span> 
                                    </label>
                                </div>
                            </div>
                            
                            <div class="w-80">{{-- Descrizione DETTAGLIATA delle variazioni: --}}
                                <p class="black"><b>Descrizione DETTAGLIATA delle variazioni:</b></p>
    
                                <div class="my-2">
                                    <span class="font-500">Interventi trainanti</span>
                                    <div style="width: 100%; height: 150px; border: 1px solid rgb(242, 242, 242); border-radius: 5px;">
                                       
                                    </div>
                                </div>
                                
                                <div class="my-2">{{-- Interventi trainati --}}
                                    <span class="font-500">Interventi trainati</span>
                                    <div style="width: 100%; height: 150px; border: 1px solid rgb(242, 242, 242); border-radius: 5px;">
                                       
                                    </div>
                                </div>
                                
                                <div class="my-2">{{-- Computo metrico --}}
                                    <span class="font-500">Computo metrico</span>
                                    <div style="width: 100%; height: 150px; border: 1px solid rgb(242, 242, 242); border-radius: 5px;">
                                       
                                    </div>
                                </div>
                                <div class="d-flex align-items-center m-0">{{-- Variante approvata --}}
                                    <label class="checkbox-wrapper d-flex"><p class="black">Variante approvata</p>
                                        <input type="checkbox" name="" value=""> 
                                        <span class="checkmark"></span> 
                                    </label>
                                </div>
                            </div>
                        </section>
                    </section>    

                    <hr class="divider">{{-- divider --}}
                
                    <section class="px-20">{{-- Richiedi variante a SAl finale  --}}
                        <label class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="" value=""> 
                            <span class="checkmark"></span> 
                            <span class="black">
                                <b>Richiedi variante a SAl finale</b>
                            </span>
                        </label>
                    
                        <section class="px-20">
                            <div class="d-flex align-items-center">
                                
                                <label class="checkbox-wrapper d-flex"><p class="black">Relazione tecnica prevista dall'art:28 della legge 10791 e dall'art.8 comma 1 del D.lgs 192/05 e s...</p>
                                    <input type="checkbox" name="" value=""> 
                                    <span class="checkmark"></span> 
                                </label>
                            </div>
                            <div class="d-flex">
                                <p>
                                    è stata depositata nell'ufficio competente del Comune di 
                                </p> 
                                <label for="" class=" m-0 mr-4 black">
                                    <input type="text" value="" class="border ml-2 px-2" style="width: 120px;" placeholder="comune L.10">
                                </label>
                                <label for="" class=" m-0 mr-4 black">Prov.
                                    <input type="text" value="" class="border ml-2 px-2" style="width: 120px;" placeholder="PROV">
                                </label>
                                <label for="" class=" m-0 mr-4 black">In data
                                    <input type="text" value="" class="border ml-2 px-2" style="width: 120px;" placeholder="gg/mm/aaaaa">
                                </label>
                            </div>
                            <div>
                                <label for="" class=" m-0 mr-4"><span class="black">Protocollo n.</span>
                                    <input type="text" value="" class="border ml-2 px-2" style="width: 120px;">
                                </label>
                            </div>

                            {{-- chehckbox --}}
                            <div class="my-2">
                                <div class="d-flex align-items-center m-0">{{-- APE post convenzionale --}}
                                    <label class="checkbox-wrapper d-flex"><p class="black">APE post convenzionale</p>
                                        <input type="checkbox" name="" value=""> 
                                        <span class="checkmark"></span> 
                                    </label>
                                </div>
                                
                                <div class="d-flex align-items-center m-0">{{-- Variazioni dati superbonus 110%(Interventi trainanti, trainati e computo metri...) --}}
                                    <label class="checkbox-wrapper d-flex"><p class="black">Variazioni dati superbonus 110%(Interventi trainanti, trainati e computo metri...)</p>
                                        <input type="checkbox" name="" value=""> 
                                        <span class="checkmark"></span> 
                                    </label>
                                </div>
                            </div>

                            {{-- variations description --}}
                            <div class="w-80">
                                <p class="black">descrizione DETTAGLIATA delle variazioni:</p>
                                
                                <div class="my-2">{{-- Interventi trainanti --}}
                                    <span class="font-500">Interventi trainanti</span>
                                    <div style="width: 100%; height: 150px; border: 1px solid rgb(242, 242, 242); border-radius: 5px;">
                                       
                                    </div>
                                </div>
                                
                                <div class="my-2">{{-- Interventi trainati --}}
                                    <span class="font-500">Interventi trainati</span>
                                    <div style="width: 100%; height: 150px; border: 1px solid rgb(242, 242, 242); border-radius: 5px;">
                                       
                                    </div>
                                </div>
                                
                                <div class="my-2">{{-- Computo metrico --}}
                                    <span class="font-500">Computo metrico</span>
                                    <div style="width: 100%; height: 150px; border: 1px solid rgb(242, 242, 242); border-radius: 5px;">
                                       
                                    </div>
                                </div>

                                <div class="d-flex align-items-center m-0">{{-- Variante approvata --}}
                                    <label class="checkbox-wrapper d-flex"><p class="black">Variante approvata</p>
                                        <input type="checkbox" name="" value=""> 
                                        <span class="checkmark"></span> 
                                    </label>
                                </div>
                            </div>
                        </section>        
                    </section>
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