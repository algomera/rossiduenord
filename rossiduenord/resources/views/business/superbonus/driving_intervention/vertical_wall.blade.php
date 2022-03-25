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
                    <h6>Interventi trainanti</h6>
                    <hr style="margin-top: 5px; background-color: #211e16;">
                    
                    <p class="m-0">Interventi trainanti oggetto dei lavori</p>
                    <hr style="margin-top: 5px; background-color: #818387;">
                </div>
                
                <div class="px-20">{{-- 1. Intervento di isolamento termico delle superfici opache verticali e orizzontali --}}
                    <label class="checkbox-wrapper d-flex">
                        <input type="checkbox" name="" value="">     
                        <span class="checkmark"></span> 
                        <span class="black" ><b>1. Intervento di isolamento termico delle superfici opache verticali e orizzontali</b></span>
                    </label>
                    
                    <p style="font-weight: 500">Le superfici oggetto dell’intervento sono:</p>
                    
                    <div class="nav_bonus d-flex align-items-center">
                        <a class="frame">(PV) Pareti Verticali</a>
                        <a>(PO) Coperture</a>
                        <a>(PS) Pavimenti</a>
                        <a>(POND) Cop. non disperdenti</a>
                        <p class="m-0">Data inizio pagamento coperture non disperdenti</p>
                        <input class="border ml-2" style="width: 100px" type="text">
                    </div>
                    <table class="table_bonus" style="width: 80%">
                        <thead>
                            <tr>
                                <td class="text-center" style="width:5%;"><b>N.</b></td>
                                <td style="width:20%;"><b>Descrizione</b></td>
                                <td style="width:13%;"><b>Superficie (m2)</b></td>
                                <td style="width:10%;">
                                    <b>
                                        Trasm. ante
                                        (W/m2k)    
                                    </b>
                                </td>
                                <td style="width:10%;">
                                    <b>
                                        Trasm. post
                                        (W/m2k)    
                                    </b>
                                </td>
                                <td style="width:15%;">
                                    <b>
                                        Trasm. Term.
                                        Period. YIE (W/m2k)    
                                    </b>
                                </td>
                                <td style="width:15%;"><b>Confine</b></td>
                                <td style="width:15%;"><b>Coibentazione</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">Cappotto esterno pareti verticali</td>
                                <td class="text-right">656,46</td>
                                <td class="text-right">0,95</td>
                                <td class="text-right">0,21   </td>
                                <td class="text-right">0,01 </td>
                                <td class="text-center">Verso esterno</td>
                                <td class="text-center">Esterna</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <div class="d-flex mt-2" style="background-color: #f2f2f2; width:80%; padding:5px 10px">
                        <div class="d-flex mr-4">
                            <p class="m-0">Totale “pareti verticali”</p>
                            <label for="" class="m-0 black">
                                <input type="text" value="656,46" class="border ml-2 px-2 text-right" style="width: 80px">
                                m²
                            </label>
                        </div>
                        <div class="d-flex mr-4">
                            <p class="m-0">di cui realizzati SAL n. 1</p>
                            <label for="" class="m-0  black">
                                <input type="text" value="557,99" class="border ml-2 px-2 text-right" style="width: 80px">
                                m²
                            </label>
                        </div>
                        <div class="d-flex mr-4">
                            <p class="m-0">SAL n. 2</p>
                            <label for="" class="m-0  black">
                                <input type="text" value="65,65" class="border ml-2 px-2 text-right" style="width: 80px">
                                m²
                            </label>
                        </div>
                        <div class="d-flex mr-4">
                            <p class="m-0">SAL F.</p>
                            <label for="" class="m-0  black">
                                <input type="text" value="" class="border ml-2 px-2 text-right" style="width: 80px">
                                m²
                            </label>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center mt-3" style="width:80%;">
                        <p class="m-0">Superficie totale oggetto dell’intervento</p>
                        <label for="" class=" m-0 mr-4 black">
                            <input type="text" value="1.045,81" style="width: 80px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                            m²
                        </label>
                        <p class="m-0 font-weight-light" style="font-size: 13px">* Il POND non viene considerato nel calcolo per l’ammisibilità dell’intervento trainante sull’involucro (maggiore del 25% della sup. disperdente)</p>
                    </div>
                    
                    <div class="d-flex align-items-center justify-content-between mt-3" style="width:80%;">
                        <div class="d-flex align-items-center">
                            <p class="m-0">Il costo complessivo previsto in progetto dei lavori sulle pratiche opache ammonta a*</p>
                            <label for="" class=" m-0 mr-4 black">
                                <input type="text" value="500.115,13" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                €
                            </label>
                        </div>
                        <button class="add-button">Computo metrico</button>
                    </div>
                    
                    <p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>
                    
                    <div class="d-flex align-items-center mt-3" style="width:80%;">
                        <p class="m-0">La spesa massima ammissibile dei lavori sulle parti opache è pari a</p>
                        <label for="" class=" m-0 mr-4 black">
                            <input type="text" value="860.000,00" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                            €
                        </label>
                    </div>
                    
                    <p class="m-0 mt-3" style="font-weight: 500;">Il costo dei lavori realizzati è pari a</p>
                    
                    <div class="d-flex" style="width: 80%">
                        <div class="d-flex align-items-center">
                            <span>SAL. n.1</span>
                            <label for="" class="d-flex flex-column align-items-end mb-3 mr-1">
                                <small class="black">almeno al 30%</small>
                                <input type="text" value="421.555,10" class="ml-2 text-right px-2 border" style="width:120px">
                            </label>
                            <span>€</span>
                        </div>
                        <div class="d-flex align-items-center ml-4">
                            <span>SAL. n.2</span>
                            <label for="" class="d-flex flex-column align-items-end mb-3 mr-1">
                                <small class="black">almeno al 60%</small>
                                <input type="text" value="50.011,51" class="ml-2 text-right px-2 border" style="width:120px">
                            </label>
                            <span>€</span>
                        </div>
                        <div class="d-flex align-items-center ml-4">
                            <span>SAL.F</span>
                            <label for="" class="d-flex flex-column align-items-end mr-1 mb-0">
                                <input type="text" value="0,00" class="ml-2 border text-right px-2" style="width:120px;">
                            </label>
                            <span>€</span>
                        </div>
                        <div class="d-flex align-items-center ml-4">
                            <span>SAL. 1+2</span>
                            <label for="" class="d-flex flex-column align-items-end mr-1 mb-0">
                                <input type="text" value="471.566,00" class="ml-2 border text-right px-2" style="width:120px; background-color: #f2f2f2">
                            </label>
                            <span>€</span>
                        </div>
                        <div class="d-flex align-items-center ml-4">
                            <span>SAL. 1+2 F</span>
                            <label for="" class="d-flex flex-column align-items-end mr-1 mb-0">
                                <input type="text" value="471.566,00" class="ml-2 border text-right px-2" style="width:120px; background-color: #f2f2f2">
                            </label>
                            <span>€</span>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center mt-2" style="width:80%;">
                        <p class="m-0">Di cui per coperture non disperdenti</p>
                        <label for="" class=" m-0 mr-4 black">
                            <input type="text" value="0,00" style="width: 120px;" class="border ml-2 px-2 text-right">
                            €
                        </label>
                    </div>
                    
                    <div class="d-flex align-items-center mt-2 mb-4" style="width:80%;">
                        <p class="m-0">Il risparmio di energia primaria non rinnovabile di progetto è</p>
                        <label for="" class=" m-0 mr-4 black">
                            <input type="text" value="148.963,25" style="width: 120px;" class="border ml-2 px-2 text-right">
                            KWh/anno
                        </label>
                    </div>
                </div>
                
                <div class="px-20 pb-20">{{-- Intervento di sostituzione degli impianti di climatizzazione invernale esistenti --}}
                    <label class="checkbox-wrapper d-flex">
                        <input type="checkbox" name="" value="">     
                        <span class="checkmark"></span> 
                        <span class="black" ><b>Intervento di sostituzione degli impianti di climatizzazione invernale esistenti</b></span>
                    </label>
                    
                    <div class="d-flex">
                        <div class="d-flex align-items-center ml-4">
                            <span>Potenza utile complessiva pari a</span>
                            <label for="" class="d-flex flex-column align-items-end mr-1 mb-0">
                                <input type="text" value="0,00" class="ml-2 border text-right px-2" style="width:120px;">
                            </label>
                            <span>kW</span>
                        </div>
                        <div class="d-flex align-items-center ml-4">
                            <span>composto da n.</span>
                            <label for="" class="d-flex flex-column align-items-end mr-1 mb-0">
                                <input type="text" value="" class="ml-2 border text-right px-2" style="width:120px;">
                            </label>
                            <span>generatori di calore</span>
                        </div>
                    </div>
                    
                    <p>con impianti centralizzati dotati di:</p>
                    
                    <div class="mt-5">
                        <label class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="" value="">     
                            <span class="checkmark"></span> 
                            <span class="black" ><b>CC. Caldaie a condensazione</b></span>
                        </label>
                        <div style="width: 80%; height: 200px; background-color: #f2f2f2 ">
                    
                        </div>
                    </div>
                    
                    <div class="mt-5">
                        <label class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="" value="">     
                            <span class="checkmark"></span> 
                            <span class="black" ><b>PC. Pompe di calore (P… </b></span>
                        </label>
                        <div style="width: 80%; height: 200px; background-color: #f2f2f2 ">
                    
                        </div>
                    </div>
                    
                    <div class="mt-5">
                        <label class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="" value="">     
                            <span class="checkmark"></span> 
                            <span class="black" ><b>PCA. Pompe di calore ad assorbimento a…</b></span>
                        </label>
                        <div style="width: 80%; height: 200px; background-color: #f2f2f2 ">
                    
                        </div>
                    </div>
                    
                    <div class="mt-5">
                        <label class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="" value="">     
                            <span class="checkmark"></span> 
                            <span class="black" ><b>SI. Sistemi ibridi</b></span>
                        </label>
                        <div style="width: 80%; height: 200px; background-color: #f2f2f2 ">
                    
                        </div>
                    </div>
                    
                    <div class="mt-5">
                        <label class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="" value="">     
                            <span class="checkmark"></span> 
                            <span class="black" ><b>CO. Sistemi di microgenerazione</b></span>
                        </label>
                        <div style="width: 80%; height: 200px; background-color: #f2f2f2 ">
                    
                        </div>
                    </div>
                    
                    <div class="mt-5">
                        <label class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="" value="">     
                            <span class="checkmark"></span> 
                            <span class="black" ><b>SA. Installazione di scaldacqua a pompa di c…</b></span>
                        </label>
                        <p style="width: 70%;">In sostituzione di un sistema di produzione di acqua calda quando avviene con lo stesso generatore di calore destinato alla climatizzazione invernale ai sensi delle lettre b) e c) del comma 1 dell’articolo 119 del Decreto Rilancio</p>
                        <div style="width: 80%; height: 200px; background-color: #f2f2f2 ">
                    
                        </div>
                    </div>
                    
                    <div class="mt-5">
                        <label class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="" value="">     
                            <span class="checkmark"></span> 
                            <span class="black" ><b>IB. Generatori a bioma…</b></span>
                        </label>
                        <p style="width: 70%;">Installazione di impianti di climatizzazione invernale dotati di generatori di calore alimentati da biomasse combustibili</p>
                        <div style="width: 80%; height: 200px; background-color: #f2f2f2 ">
                    
                        </div>
                    </div>
                    
                    <div class="mt-5">
                        <label class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="" value="">     
                            <span class="checkmark"></span> 
                            <span class="black" ><b>Collettori solari</b></span>
                        </label>
                        <div style="width: 80%; height: 200px; background-color: #f2f2f2 ">
                    
                        </div>
                    </div>
                    
                    <div class="d-flex mt-3">
                        <span>Destinati a</span>
                    
                        <label class="checkbox-wrapper d-flex ml-4">
                            <input type="checkbox" name="" value="">     
                            <span class="checkmark"></span> 
                            <span class="black" >Climatizzazione invernale</span>
                        </label>
                        <label class="checkbox-wrapper d-flex  ml-4">
                            <input type="checkbox" name="" value="">     
                            <span class="checkmark"></span> 
                            <span class="black" >Climatizzazione estiva</span>
                        </label>
                        <label class="checkbox-wrapper d-flex  ml-4">
                            <input type="checkbox" name="" value="">     
                            <span class="checkmark"></span> 
                            <span class="black" >Produzione di acqua calda sanitaria</span>
                        </label>      
                    </div>
                    
                    <div class="d-flex align-items-center justify-content-between mt-3" style="width:80%;">
                        <div class="d-flex align-items-center">
                            <p class="m-0">Il costo complessivo di progetto degli interventi sull’impianto ammonta a *</p>
                            <label for="" class=" m-0 mr-4 black">
                                <input type="text" value="0,00" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                €
                            </label>
                        </div>
                        <button class="add-button">Computo metrico</button>
                    </div>
                    
                    <p class="font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>
                    
                    <div class="d-flex align-items-center mt-2 mb-4" style="width:80%;">
                        <p class="m-0">Il costo complessivo di progetto degli interventi sull’impianto ammonta a *</p>
                        <label for="" class=" m-0 mr-4 black">
                            <input type="text" value="430.000,00" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                            €
                        </label>
                    </div>
                    
                    <div class="d-flex justify-content-between" style="width: 80%">
                        <p class="m-0 mt-2 font-weight-bold">Sono stati conclusi i seguenti lavori</p>
                        <table class="table_bonus" style="width: 70%">
                            <thead>
                                <tr>
                                    <td style="width:40%;"><b>Lavori</b></td>
                                    <td style="width:30%;"><b>Conclusi</b></td>
                                    <td style="width:30%;"><b>SAL</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-right"></td>
                                    <td class="text-right"></td>
                                    <td class="text-right"></td>
                                </tr>
                            </tbody>
                        </table>    
                    </div>
                    
                    <p class="font-weight-bold m-0 mt-5">per un ammontare pari a</p>
                    <div class="d-flex" style="width: 80%">
                        <div class="d-flex align-items-center">
                            <span>SAL. n.1</span>
                            <label for="" class="d-flex flex-column align-items-end mb-3 mr-1">
                                <small class="black">almeno al 30%</small>
                                <input type="text" value="0,00" class="ml-2 text-right px-2 border" style="width:120px">
                            </label>
                            <span>€</span>
                        </div>
                        <div class="d-flex align-items-center ml-4">
                            <span>SAL. n.2</span>
                            <label for="" class="d-flex flex-column align-items-end mb-3 mr-1">
                                <small class="black">almeno al 60%</small>
                                <input type="text" value="0,00" class="ml-2 text-right px-2 border" style="width:120px">
                            </label>
                            <span>€</span>
                        </div>
                        <div class="d-flex align-items-center ml-4">
                            <span>SAL.F</span>
                            <label for="" class="d-flex flex-column align-items-end mr-1 mb-0">
                                <input type="text" value="0,00" class="ml-2 border text-right px-2" style="width:120px;">
                            </label>
                            <span>€</span>
                        </div>
                        <div class="d-flex align-items-center ml-4">
                            <span>SAL. 1+2</span>
                            <label for="" class="d-flex flex-column align-items-end mr-1 mb-0">
                                <input type="text" value="0,00" class="ml-2 border text-right px-2" style="width:120px; background-color: #f2f2f2">
                            </label>
                            <span>€</span>
                        </div>
                        <div class="d-flex align-items-center ml-4">
                            <span>SAL. 1+2 F</span>
                            <label for="" class="d-flex flex-column align-items-end mr-1 mb-0">
                                <input type="text" value="0,00" class="ml-2 border text-right px-2" style="width:120px; background-color: #f2f2f2">
                            </label>
                            <span>€</span>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center mt-2 mb-4" style="width:80%;">
                        <p class="m-0 font-weight-bold">Il risparmio di energia primaria non rinnovabile di progetto è</p>
                        <label for="" class=" m-0 mr-4 black">
                            <input type="text" value="0,00" style="width: 120px;" class="border ml-2 px-2 text-right">
                            KWh/anno
                        </label>
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