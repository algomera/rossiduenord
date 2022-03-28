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

            <form action="{{ route('business.update_final_state', ['practice' => $practice]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="px-20">
                    <h6>Dati stato finale</h6>
                    <hr style="margin-top: 5px; background-color: #211e16;">
                </div>

                <div class="scroll" style="font-weight: 500">
                    <p class="font-500 px-20" style="text-decoration: underline;">Impianto termico esistente nella situazione ante intervento:</p>

                    <div class="px-20" style="width: 80%">{{-- select pre intervento --}}
                        <div class="form-group">
                            <label for="" class="grey">Tipo di impianto</label>
                            <div class="position-relative">
                                <div class="select"></div>
                                <select class="form-control px-3" style="background-color: #f2f2f2" name="plant_type" value="{{$final_state->plant_type}}" id="">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="grey">Terminali di erogazione del calore</label>
                            <div class="position-relative">
                                <div class="select"></div>
                                <select class="form-control px-3" style="background-color: #f2f2f2" name="heat_terminals" value="{{$final_state->heat_terminals}}" id="">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="grey">Tipo di distribuzione</label>
                            <div class="position-relative">
                                <div class="select"></div>
                                <select class="form-control px-3" style="background-color: #f2f2f2" name="distribution_type" value="{{$final_state->distribution_type}}" id="">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="grey">Tipo di regolazione</label>
                            <div class="position-relative">
                                <div class="select"></div>
                                <select class="form-control px-3" style="background-color: #f2f2f2" name="adjustment_type" value="{{$final_state->adjustment_type}}" id="">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class=" mt-5 px-20">{{-- Tipo e numero di generatori presenti prima dell’intervento --}}
                        <p class="ml-3"><b>Tipo e numero di generatori presenti prima dell’intervento</b></p>
                        <div class="py-2 px-3" style="width: 80%; height: 150px; background-color: #f2f2f2; position: relative; ">
                            <div class="d-flex">
                                <span class="mr-2">1) Tipo</span>
                                <select name="generator_type" value="{{$final_state->generator_type}}" id="" style="width: 200px; background-color: #dbdcdb; border: none;">
                                    <option value=""></option>
                                </select>
                                <span class="ml-4">N° di generatori</span>
                                <input type="text" name="generator_number" value="{{$final_state->generator_number}}" class="border ml-2 px-2 text-right" style="width: 100px">
                            </div>
                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <div class="d-flex align-items-center">
                                        <p class="m-0">Rendimento al 100% della potenza</p>
                                        <label for="" class=" m-0 mr-4 black">
                                            <input type="text" name="performance_percentage" value="{{$final_state->performance_percentage}}" style="width: 120px;" class="border ml-2 px-2 text-right">
                                            %
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-3 ml-4">
                                    <div class="d-flex align-items-center">
                                        <p class="m-0">Potenza utile nominale complessiva</p>
                                        <label for="" class=" m-0 mr-4 black">
                                            <input type="text" name="useful_power" value="{{$final_state->useful_power}}" style="width: 120px;" class="border ml-2 px-2 text-right">
                                            kW
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button class="btn-delete" style="position: absolute; bottom:10px; right:10px">Elimina</button>
                        </div>
                    </div>

                    <div class="mt-5 px-20" style="width: 80%">{{-- Potenza nominale complessiva --}}
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <p class="m-0">Potenza nominale complessiva</p>
                                <label for="" class=" m-0 mr-4 black">
                                    <input type="text" name="overall_power" value="{{$final_state->overall_power}}" style="width: 120px;" class="border ml-2 px-2 text-right">
                                    kW
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="grey">Vettore energetico prevalente</label>
                            <div class="position-relative">
                                <div class="select"></div>
                                <select class="form-control px-3" style="background-color: #f2f2f2" name="energetic_vector" value="{{$final_state->energetic_vector}}" id="">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <label class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="summer_acs_presence" value="true" {{$final_state->summer_acs_presence = 'true' ? 'checked' : ''}}>
                            <span class="checkmark"></span>
                            <span class="black" >Presenza dell’impianto di condizionamento estivo</span>
                        </label>
                        <p class="m-0">Eventuali interventi di manutenzione straordinaria</p>
                        <div style="width: 100%; height: 150px; border:#f2f2f2 1px solid; border-radius: 5px; ">

                        </div>
                    </div>

                    <div class="mt-5 px-20" style="width: 80%">{{-- APE IE. Involucro Edilizio: --}}
                        <p class="font-500" style="text-decoration: underline;">APE IE. Involucro Edilizio:</p>
                        <div class="form-group mt-2">
                            <label for="" class="grey">Tipologia costruttiva</label>
                            <div class="position-relative">
                                <div class="select"></div>
                                <select class="form-control px-3" style="background-color: #f2f2f2" name="construction_tipology" value="{{$final_state->construction_tipology}}" id="">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="m-0">Volume lordo riscaldato V</p>
                            <label for="" class=" m-0 mr-4 black">
                                <input type="text" name="heated_volume" value="{{$final_state->heated_volume}}" style="width: 120px;" class="border ml-2 px-2 text-right">
                                m²
                            </label>
                        </div>
                        <div class="d-flex mt-3">
                            <div class="d-flex align-items-center">
                                <p class="m-0">Superficie disperdente S</p>
                                <label for="" class=" m-0 mr-4 black">
                                    <input type="text" name="dispersing_surface" value="{{$final_state->dispersing_surface}}" style="width: 120px;" class="border ml-3 px-2 text-right">
                                    m²
                                </label>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="m-0">Rapporto S/V</p>
                                <label for="" class=" m-0 mr-4 black">
                                    <input type="text" value="{{$final_state->SV_report}}" name="SV_report" style="width: 120px;" class="border ml-2 px-2 text-right">
                                    m²
                                </label>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="m-0">Superficie utile riscaldata</p>
                                <label for="" class=" m-0 mr-4 black">
                                    <input type="text" value="{{$final_state->useful_heated_surface}}" name="useful_heated_surface" style="width: 120px;" class="border ml-2 px-2 text-right">
                                    m²
                                </label>
                            </div>
                        </div>

                        <div class="d-flex mt-3">
                            <div class="d-flex align-items-center">
                                <p class="m-0">Superficie utile raffrescata</p>
                                <label for="" class=" m-0 mr-4 black">
                                    <input type="text" value="{{$final_state->useful_cooled_surface}}" name="useful_cooled_surface" style="width: 120px;" class="border ml-1 px-2 text-right">
                                    m²
                                </label>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="m-0">Anno di installazione del generatore</p>
                                <label for="" class=" m-0 mr-4 black">
                                    <input type="text" value="{{$final_state->generator_inst_date}}" name="generator_inst_date" style="width: 120px;" class="border ml-2 px-2 text-right">
                                </label>
                            </div>
                        </div>
                        <p class="m-0 mt-3">Eventuali interventi di manutenzione straordinaria o ristrutturazione</p>
                        <div style="width: 100%; height: 150px; border:#f2f2f2 1px solid; border-radius: 5px; ">

                        </div>
                    </div>

                    {{-- divider --}}
                    <hr style="background-color: #f2f2f2; height:3px; border:none;">


                    <div class=" mt-5 px-20">{{-- APE IR. Impianto di Riscaldamento nella situazione post intervento --}}
                        <p class="font-500" style="text-decoration: underline;">APE IR. Impianto di Riscaldamento nella situazione post intervento</p>
                        <label class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="winter_acs" value="true" {{$final_state->winter_acs == 'true' ? 'checked' : ''}}>
                            <span class="checkmark"></span>
                            <span class="black" >Climatizzazione invernale</span>
                        </label>
                        <label class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="hot_water_production" value="true" {{$final_state->hot_water_production == 'true' ? 'checked' : ''}}>
                            <span class="checkmark"></span>
                            <span class="black" >Produzione acqua calda sanitaria</span>
                        </label>
                        <label class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="mechanic_ventilaion" value="true" {{$final_state->mechanic_ventilaion == 'true' ? 'checked' : ''}}>
                            <span class="checkmark"></span>
                            <span class="black" >Ventilazione meccanica</span>
                        </label>
                        <label class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="summer_acs" value="true" {{$final_state->summer_acs == 'true' ? 'checked': ''}}>
                            <span class="checkmark"></span>
                            <span class="black" >Climatizzazione estiva</span>
                        </label>
                        <label class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="lighting" value="true" {{$final_state->lighting == 'true' ? 'checked': ''}}>
                            <span class="checkmark"></span>
                            <span class="black" >Illuminazione</span>
                        </label>
                        <label class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="transport" value="true" {{$final_state->transport == 'true' ? 'checked': ''}}>
                            <span class="checkmark"></span>
                            <span class="black" >Trasporto di persone o cose</span>
                        </label>
                    </div>

                    {{-- divider --}}
                    <hr style="background-color: #f2f2f2; height:3px; border:none;">

                    <div class="px-20">{{-- APE DC. Dati Climatici --}}
                        <p class="font-500" style="text-decoration: underline;">APE DC. Dati Climatici</p>
                        <div class="d-flex align-items-center">
                            <p class="m-0">Temperatura di progetto</p>
                            <label for="" class=" m-0 mr-4 black">
                                <input type="text" name="project_temperature" value="{{$final_state->project_temperature}}" style="width: 120px;" class="border ml-2 px-2 text-right">
                                c°
                            </label>
                        </div>
                        <div class="mt-3">
                            <p class="font-500" style="text-decoration: underline;">APE TR. Tecnologie di utilizzo delle fonti rinnovabili, ove presenti</p>
                            <div class="d-flex align-items-center my-2">
                                <p class="m-0">Fotovoltaico potenza di picco</p>
                                <label for="" class=" m-0 mr-4 black">
                                    <input type="text" value="{{$final_state->fotovoltaic_max_power}}" style="width: 120px;" class="border ml-2 px-2 text-right">
                                    kW
                                </label>
                            </div>
                            <div class="d-flex align-items-center my-2">
                                    <p class="m-0">Eolico potenza nominale</p>
                                    <label for="" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$final_state->eolic_nominal_power}}" name="eolic_nominal_power" style="width: 120px;" class="border ml-2 px-2 text-right">
                                        kW
                                    </label>
                            </div>
                            <div class="d-flex align-items-center my-2">
                                <p class="m-0">Solare termico superficie dei collettori</p>
                                <label for="" class=" m-0 mr-4 black">
                                    <input type="text" value="{{$final_state->collector_surface}}" name="collector_surface" style="width: 120px;" class="border ml-2 px-2 text-right">
                                    m²
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- divider --}}
                    <hr style="background-color: #f2f2f2; height:3px; border:none;">

                    <div class="px-20 w-80">{{-- Risultati della valutazione energetica --}}
                        <b class="m-0 mt-3 black">Risultati della valutazione energetica</b>
                        <p class="font-500" style="text-decoration: underline;">APE NM: Norme e Metodologie</p>
                        <div>
                            <p>Riferimento alle norme tecniche utilizzate</p>
                            <div style="width: 100%; height: 150px; border:#f2f2f2 1px solid; border-radius: 5px; "></div>
                        </div>
                        <div class="my-3">
                            <p>Metodo di valutazione della prestazione energetica utilizzato</p>
                            <div style="width: 100%; height: 150px; border:#f2f2f2 1px solid; border-radius: 5px; "></div>
                        </div>
                    </div>

                    {{-- divider --}}
                    <hr style="background-color: #f2f2f2; height:3px; border:none;">

                    <div class="px-20 w-80">{{-- APE DE: Descrizione edificio --}}
                        <p class="font-500" style="text-decoration: underline;">APE DE: Descrizione edificio</p>
                        <div class="my-3">
                            <p>Descrizione dell'edificio e della sua localizzazione e destinazione d'uso</p>
                            <div style="width: 100%; height: 150px; border:#f2f2f2 1px solid; border-radius: 5px; "></div>
                        </div>
                    </div>

                    {{-- divider --}}
                    <hr style="background-color: #f2f2f2; height:3px; border:none;">

                    <div class="px-20">{{-- APE I: Indici di presentrazione energetica --}}
                        <p class="font-500" style="text-decoration: underline;">APE I: Indici di presentrazione energetica </p>
                        <div class="d-flex align-items-center">
                            <p class="m-0">Indice di prestazione energetica non rinnovabile per le climatizazzione invernale proprio dell'edificio EPH,nren</p>
                            <label for="" class=" m-0 mr-4 black">
                                <input type="text" value="{{$final_state->nr_energy_perf_index}}" name="nr_energy_perf_index" style="width: 120px;" class="border ml-2 px-2 text-right">
                                kW/m² anno
                            </label>
                        </div>
                        <div class="d-flex align-items-center my-3">
                            <p class="m-0">Indice di prestazione energetica rinnovabile per le climatizazzione invernale proprio dell'edificio EPH,nren</p>
                            <label for="" class=" m-0 mr-4 black">
                                <input type="text" value="{{$final_state->r_energy_perf_index}}" name="r_energy_perf_index" style="width: 120px;" class="border ml-2 px-2 text-right">
                                kW/m² anno
                            </label>
                        </div>
                    </div>

                    {{-- divider --}}
                    <hr style="background-color: #f2f2f2; height:3px; border:none;">

                    <div class="px-20">{{-- APE Q: Qualità invernale ed estiva dell'involucro --}}
                        <p class="font-500" style="text-decoration: underline;">APE Q: Qualità invernale ed estiva dell'involucro</p>
                        <div class="d-flex">
                            <label for="" class=" m-0 mr-4 black">EPH,nd
                                <input type="text" value="{{$final_state->EPH}}" name="EPH" class="border ml-2 px-2" style="width: 120px;" >
                                kW/kW/m² anno
                            </label>
                            <label for="" class=" m-0 mr-4 black">Asol,est/Asup utile
                                <input type="text" value="{{$final_state->Asup}}" name="Asup" class="border ml-2 px-2" style="width: 120px;">
                            </label>
                        </div>
                        <div class="my-3">
                            <label for="" class=" m-0 mr-4">
                                <span class="black">YIE</span>
                                <input type="text" value="{{$final_state->YIE}}" name="YIE" class="border ml-2 px-2" style="width: 120px;">
                            </label>
                        </div>

                        <div class="d-flex">
                            <p>
                                Indice di prestaziione energetica globale dell'edificio espresso in energia primaria non rinnovabile EPgl,nren
                            </p>
                            <label for="" class=" m-0 mr-4 black">
                                <input type="text" value="{{$final_state->EPgl_nren}}" name="EPgl_nren" class="border ml-2 px-2" style="width: 120px;">
                                kW/kW/m² anno
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <span class="mr-2">Qualità invernale dell'involucro</span>
                            </div>
                            <div class="col-9">
                                <select name="invernal_case_quality" value="{{$final_state->invernal_case_quality}}" id="" style="width: 200px; background-color: #dbdcdb; border: none;">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-3">
                                <span class="mr-2">Qualità estiva dell'involucro</span>
                            </div>
                            <div class="col-9">
                                <select name="summer_case_quality" id="" value="{{$final_state->summer_case_quality}}" style="width: 200px; background-color: #dbdcdb; border: none;">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-3">
                                <span class="mr-2">Classe energetica</span>
                            </div>
                            <div class="col-9">
                                <select name="energetic_class" id="" value="{{$final_state->energetic_class}}" style="width: 50px; background-color: #dbdcdb; border: none;">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <label class="checkbox-wrapper d-flex mt-3">
                            <input type="checkbox" name="people_transport" value="true" {{$final_state->people_transport == ' true' ? 'checked' : ''}}>
                            <span class="checkmark"></span>
                            <span class="black" >Trasporto di persone o cose</span>
                        </label>
                    </div>

                    {{-- divider --}}
                    <hr style="background-color: #f2f2f2; height:3px; border:none;">

                    <div class=" w-80 px-20">
                        <p class="font-500" style="text-decoration: underline;">APE LC: Lista delle raccomandazioni</p>
                        <div class="my-3">
                            <p>Possibili interventi di miglioramento</p>
                            <div style="width: 100%; height: 150px; border:#f2f2f2 1px solid; border-radius: 5px; "></div>
                        </div>
                    </div>
                    {{-- end page --}}
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
