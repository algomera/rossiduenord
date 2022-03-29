@extends('business.layouts.business')

@section('content')
    @include('business.layouts.partials.practiceNav')
    @include('business.layouts.partials.nav_superbonus')


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
                                    <option value="Impianto autonomo" {{$final_state->plant_type == 'Impianto autonomo' ? 'selected' : ''}}>Impianto autonomo</option>
                                    <option value="Impianto centralizzato" {{$final_state->plant_type == 'Impianto centralizzato' ? 'selected' : ''}}>Impianto centralizzato</option>
                                    <option value="Impianto centralizzato contabilizzato per singolo utente" {{$final_state->plant_type == 'Impianto centralizzato contabilizzato per singolo utente' ? 'selected' : ''}}>Impianto centralizzato contabilizzato per singolo utente</option>
                                    <option value="Impianto centralizzato con piu generatori di calore" {{$final_state->plant_type == 'Impianto centralizzato con piu generatori di calore' ? 'selected' : ''}}>Impianto centralizzato con piu generatori di calore</option>
                                    <option value="Impianto centralizzato con piu generatori di calore e contabilizzato per singolo utente" {{$final_state->plant_type == 'Impianto centralizzato con piu generatori di calore e contabilizzato per singolo utente' ? 'selected' : ''}}>Impianto centralizzato con piu generatori di calore e contabilizzato per singolo utente</option>
                                    <option value="Altro" {{$final_state->plant_type == 'Altro' ? 'selected' : ''}}> Altro</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="grey">Terminali di erogazione del calore</label>
                            <div class="position-relative">
                                <div class="select"></div>
                                <select class="form-control px-3" style="background-color: #f2f2f2" name="heat_terminals" value="{{$final_state->heat_terminals}}" id="">
                                    <option value="Termoconvettori" {{$final_state->heat_terminals == 'Termoconvettori' ? 'selected' : ''}}>Termoconvettori</option>
                                    <option value="Ventilconvettori" {{$final_state->heat_terminals == 'Ventilconvettori' ? 'selected' : ''}}>Ventilconvettori</option>
                                    <option value="Bocchette aria calda" {{$final_state->heat_terminals == 'Bocchette aria calda' ? 'selected' : ''}}>Bocchette aria calda</option>
                                    <option value="Radiatori" {{$final_state->heat_terminals == 'Radiatori' ? 'selected' : ''}}>Radiatori</option>
                                    <option value="Pannelli radianti isolanti dalle strutture" {{$final_state->heat_terminals == 'Pannelli radianti isolanti dalle strutture' ? 'selected' : ''}}>Pannelli radianti isolanti dalle strutture</option>
                                    <option value="Pannelli radianti annegati nella struttura" {{$final_state->heat_terminals == 'Pannelli radianti annegati nella struttura' ? 'selected' : ''}}>Pannelli radianti annegati nella struttura</option>
                                    <option value="Altro" {{$final_state->heat_terminals == 'Altro' ? 'selected' : ''}}>Altro</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="grey">Tipo di distribuzione</label>
                            <div class="position-relative">
                                <div class="select"></div>
                                <select class="form-control px-3" style="background-color: #f2f2f2" name="distribution_type" value="{{$final_state->distribution_type}}" id="">
                                    <option value="Edifici a colonne montanti situati totalmente all'interno di ambienti riscaldati" {{$final_state->distribution_type == 'Edifici a colonne montanti situati totalmente all\'interno di ambienti riscaldati' ? 'selected' : ''}}>Edifici a colonne montanti situati totalmente all'interno di ambienti riscaldati</option>
                                    <option value="Edifici a colonne montanti non isolanti termicamente inseriti all'interno delle pareti" {{$final_state->distribution_type == 'Edifici a colonne montanti non isolanti termicamente inseriti all\'interno delle pareti' ? 'selected' : ''}}>Edifici a colonne montanti non isolanti termicamente inseriti all'interno delle pareti</option>
                                    <option value="Edifici con distribbuzione orizzontale o ad anello" {{$final_state->distribution_type == 'Edifici con distribbuzione orizzontale o ad anello' ? 'selected' : ''}}>Edifici con distribbuzione orizzontale o ad anello</option>
                                    <option value="Altro" {{$final_state->distribution_type == 'Altro' ? 'selected' : ''}}>Altro</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="grey">Tipo di regolazione</label>
                            <div class="position-relative">
                                <div class="select"></div>
                                <select class="form-control px-3" style="background-color: #f2f2f2" name="adjustment_type" value="{{$final_state->adjustment_type}}" id="">
                                    <option value="Regolazione centralizzata" {{$final_state->adjustment_type == 'Regolazione centralizzata' ? 'selected' : ''}}>Regolazione centralizzata</option>
                                    <option value="Regolazione su terminale di erogazione" {{$final_state->adjustment_type == 'Regolazione su terminale di erogazione' ? 'selected' : ''}}>Regolazione su terminale di erogazione</option>
                                    <option value="Regolazione ad ambiente o a zona" {{$final_state->adjustment_type == 'Regolazione ad ambiente o a zona' ? 'selected' : ''}}>Regolazione ad ambiente o a zona</option>
                                    <option value="Altro" {{$final_state->adjustment_type == 'Altro' ? 'selected' : ''}}>Altro</option>
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
                                    <option value="Caldaia standard" {{$final_state->generator_type == 'Caldaia standard' ? 'seleced' : ''}}>Caldaia standard</option>
                                    <option value="Caldaia a bassa temperatura" {{$final_state->generator_type == 'Caldaia a bassa temperatura' ? 'seleced' : ''}}>Caldaia a bassa temperatura</option>
                                    <option value="Caldaia a condensazione a gas" {{$final_state->generator_type == 'Caldaia a condensazione a gas' ? 'seleced' : ''}}>Caldaia a condensazione a gas</option>
                                    <option value="Caldaia a condensazione a gasolio" {{$final_state->generator_type == 'Caldaia a condensazione a gasolio' ? 'seleced' : ''}}>Caldaia a condensazione a gasolio</option>
                                    <option value="Pompa di calore anche con sonda geotermica" {{$final_state->generator_type == 'Pompa di calore anche con sonda geotermica' ? 'seleced' : ''}}>Pompa di calore anche con sonda geotermica</option>
                                    <option value="Generatore di aria" {{$final_state->generator_type == 'Generatore di aria' ? 'seleced' : ''}}>Generatore di aria</option>
                                    <option value="Teleriscaldamento" {{$final_state->generator_type == 'Teleriscaldamento' ? 'seleced' : ''}}>Teleriscaldamento (solo in caso di distacco obbligato)</option>
                                    <option value="Impianto a biomassa" {{$final_state->generator_type == 'Impianto a biomassa' ? 'seleced' : ''}}>Impianto a biomassa</option>
                                    <option value="Altro" {{$final_state->generator_type == 'Altro' ? 'seleced' : ''}}>Altro</option>
                                </select>
                                <span class="ml-4">N° di generatori</span>
                                <input type="number" name="generator_number" value="{{$final_state->generator_number}}" class="border ml-2 px-2 text-right" style="width: 100px">
                            </div>
                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <div class="d-flex align-items-center">
                                        <p class="m-0">Rendimento al 100% della potenza</p>
                                        <label for="performance_percentage" class=" m-0 mr-4 black">
                                            <input type="number" name="performance_percentage" value="{{$final_state->performance_percentage}}" style="width: 120px;" class="border ml-2 px-2 text-right">
                                            %
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-3 ml-4">
                                    <div class="d-flex align-items-center">
                                        <p class="m-0">Potenza utile nominale complessiva</p>
                                        <label for="useful_power" class=" m-0 mr-4 black">
                                            <input type="number" name="useful_power" value="{{$final_state->useful_power}}" style="width: 120px;" class="border ml-2 px-2 text-right">
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
                                <label for="overall_power" class=" m-0 mr-4 black">
                                    <input type="number" name="overall_power" value="{{$final_state->overall_power}}" style="width: 120px;" class="border ml-2 px-2 text-right">
                                    kW
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="grey">Vettore energetico prevalente</label>
                            <div class="position-relative">
                                <div class="select"></div>
                                <select class="form-control px-3" style="background-color: #f2f2f2" name="energetic_vector" value="{{$final_state->energetic_vector}}" id="">
                                    <option value="Gas metano" {{$final_state->energetic_vector == 'Gas metano' ? 'selected' : ''}}>Gas metano</option>
                                    <option value="Gasolio" {{$final_state->energetic_vector == 'Gasolio' ? 'selected' : ''}}>Gasolio</option>
                                    <option value="Gpl" {{$final_state->energetic_vector == 'Gpl' ? 'selected' : ''}}>Gpl</option>
                                    <option value="Teleriscaldamento" {{$final_state->energetic_vector == 'Teleriscaldamento' ? 'selected' : ''}}>Teleriscaldamento</option>
                                    <option value="Olio combustibile" {{$final_state->energetic_vector == 'Olio combustibile' ? 'selected' : ''}}>Olio combustibile</option>
                                    <option value="Energia elettrica" {{$final_state->energetic_vector == 'Energia elettrica' ? 'selected' : ''}}>Energia elettrica</option>
                                    <option value="Biomassa" {{$final_state->energetic_vector == 'Biomassa' ? 'selected' : ''}}>Biomassa</option>
                                    <option value="Altro" {{$final_state->energetic_vector == 'Altro' ? 'selected' : ''}}>Altro</option>
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
                            <textarea  class="w-100 px-1" name="summer_acs_renovation" id="" cols="30" rows="7">{{$final_state->summer_acs_renovation}}</textarea>
                        </div>
                    </div>

                    <div class="mt-5 px-20" style="width: 80%">{{-- APE IE. Involucro Edilizio: --}}
                        <p class="font-500" style="text-decoration: underline;">APE IE. Involucro Edilizio:</p>
                        <div class="form-group mt-2">
                            <label for="" class="grey">Tipologia costruttiva</label>
                            <div class="position-relative">
                                <div class="select"></div>
                                <select class="form-control px-3" style="background-color: #f2f2f2" name="construction_tipology" value="{{$final_state->construction_tipology}}" id="">
                                    <option value="Muratura portante" {{$final_state->construction_tipology == 'Muratura portante' ? 'selected' : ''}}>Muratura portante</option>
                                    <option value="Telaio in cemento armato" {{$final_state->construction_tipology == 'Telaio in cemento armato' ? 'selected' : ''}}>Telaio in cemento armato</option>
                                    <option value="Telaio in acciaio" {{$final_state->construction_tipology == 'Telaio in acciaio' ? 'selected' : ''}}>Telaio in acciaio</option>
                                    <option value="Mista" {{$final_state->construction_tipology == 'Mista' ? 'selected' : ''}}>Mista</option>
                                    <option value="Pannelli prefabbricati" {{$final_state->construction_tipology == 'Pannelli prefabbricati' ? 'selected' : ''}}>Pannelli prefabbricati</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="m-0">Volume lordo riscaldato V</p>
                            <label for="heated_volume" class=" m-0 mr-4 black">
                                <input type="number" name="heated_volume" value="{{$final_state->heated_volume}}" style="width: 120px;" class="border ml-2 px-2 text-right">
                                m²
                            </label>
                        </div>
                        <div class="d-flex mt-3">
                            <div class="d-flex align-items-center">
                                <p class="m-0">Superficie disperdente S</p>
                                <label for="dispersing_surface" class=" m-0 mr-4 black">
                                    <input type="number" name="dispersing_surface" value="{{$final_state->dispersing_surface}}" style="width: 120px;" class="border ml-3 px-2 text-right">
                                    m²
                                </label>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="m-0">Rapporto S/V</p>
                                <label for="SV_report" class=" m-0 mr-4 black">
                                    <input type="number" value="{{$final_state->SV_report}}" name="SV_report" style="width: 120px;" class="border ml-2 px-2 text-right">
                                    m²
                                </label>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="m-0">Superficie utile riscaldata</p>
                                <label for="useful_heated_surface" class=" m-0 mr-4 black">
                                    <input type="number" value="{{$final_state->useful_heated_surface}}" name="useful_heated_surface" style="width: 120px;" class="border ml-2 px-2 text-right">
                                    m²
                                </label>
                            </div>
                        </div>

                        <div class="d-flex mt-3">
                            <div class="d-flex align-items-center">
                                <p class="m-0">Superficie utile raffrescata</p>
                                <label for="useful_cooled_surface" class=" m-0 mr-4 black">
                                    <input type="number" value="{{$final_state->useful_cooled_surface}}" name="useful_cooled_surface" style="width: 120px;" class="border ml-1 px-2 text-right">
                                    m²
                                </label>
                            </div>
                            <div class="d-flex align-items-center">
                                <p class="m-0">Anno di installazione del generatore</p>
                                <label for="generator_inst_date" class=" m-0 mr-4 black">
                                    <input type="number" value="{{$final_state->generator_inst_date}}" name="generator_inst_date" style="width: 120px;" class="border ml-2 px-2 text-right">
                                </label>
                            </div>
                        </div>
                        <p class="m-0 mt-3">Eventuali interventi di manutenzione straordinaria o ristrutturazione</p>
                        <div style="width: 100%; height: 150px; border:#f2f2f2 1px solid; border-radius: 5px; ">
                            <textarea class="w-100 h-100 px-1" name="extra_maintenance" id="" cols="30" rows="10">{{$final_state->extra_maintenance}}</textarea>
                        </div>
                    </div>

                    {{-- divider --}}
                    <hr style="background-color: #f2f2f2; height:3px; border:none;">


                    <div class=" mt-5 px-20">{{-- APE IR. Impianto di Riscaldamento nella situazione post intervento --}}
                        <p class="font-500" style="text-decoration: underline;">APE IR. Impianto di Riscaldamento nella situazione post intervento</p>
                        <label for="winter_acs" class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="winter_acs" id="winter_acs" value="true" {{$final_state->winter_acs == 'true' ? 'checked' : ''}}>
                            <span class="checkmark"></span>
                            <span class="black" >Climatizzazione invernale</span>
                        </label>
                        <label for="hot_water_production" class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="hot_water_production" id="hot_water_production" value="true" {{$final_state->hot_water_production == 'true' ? 'checked' : ''}}>
                            <span class="checkmark"></span>
                            <span class="black" >Produzione acqua calda sanitaria</span>
                        </label>
                        <label for="mechanic_ventilaion" class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="mechanic_ventilaion" id="mechanic_ventilaion" value="true" {{$final_state->mechanic_ventilaion == 'true' ? 'checked' : ''}}>
                            <span class="checkmark"></span>
                            <span class="black" >Ventilazione meccanica</span>
                        </label>
                        <label for="summer_acs" class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="summer_acs" id="summer_acs" value="true" {{$final_state->summer_acs == 'true' ? 'checked': ''}}>
                            <span class="checkmark"></span>
                            <span class="black" >Climatizzazione estiva</span>
                        </label>
                        <label for="lighting" class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="lighting" id="lighting" value="true" {{$final_state->lighting == 'true' ? 'checked': ''}}>
                            <span class="checkmark"></span>
                            <span class="black" >Illuminazione</span>
                        </label>
                        <label for="transport" class="checkbox-wrapper d-flex">
                            <input type="checkbox" name="transport" id="transport" value="true" {{$final_state->transport == 'true' ? 'checked': ''}}>
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
                            <label for="project_temperature" class=" m-0 mr-4 black">
                                <input type="number" name="project_temperature" value="{{$final_state->project_temperature}}" style="width: 120px;" class="border ml-2 px-2 text-right">
                                c°
                            </label>
                        </div>
                        <div class="mt-3">
                            <p class="font-500" style="text-decoration: underline;">APE TR. Tecnologie di utilizzo delle fonti rinnovabili, ove presenti</p>
                            <div class="d-flex align-items-center my-2">
                                <p class="m-0">Fotovoltaico potenza di picco</p>
                                <label for="fotovoltaic_max_power" class=" m-0 mr-4 black">
                                    <input type="number" name="fotovoltaic_max_power" value="{{$final_state->fotovoltaic_max_power}}" style="width: 120px;" class="border ml-2 px-2 text-right">
                                    kW
                                </label>
                            </div>
                            <div class="d-flex align-items-center my-2">
                                    <p class="m-0">Eolico potenza nominale</p>
                                    <label for="eolic_nominal_power" class=" m-0 mr-4 black">
                                        <input type="number" value="{{$final_state->eolic_nominal_power}}" name="eolic_nominal_power" style="width: 120px;" class="border ml-2 px-2 text-right">
                                        kW
                                    </label>
                            </div>
                            <div class="d-flex align-items-center my-2">
                                <p class="m-0">Solare termico superficie dei collettori</p>
                                <label for="collector_surface" class=" m-0 mr-4 black">
                                    <input type="number" value="{{$final_state->collector_surface}}" name="collector_surface" style="width: 120px;" class="border ml-2 px-2 text-right">
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
                            <div style="width: 100%; height: 150px; border:#f2f2f2 1px solid; border-radius: 5px; ">
                             <textarea  class="w-100 h-100 px-1" name="technical_standard" id="" cols="30" rows="10">{{$final_state->technical_standard}}</textarea>
                            </div>
                        </div>
                        <div class="my-3">
                            <p>Metodo di valutazione della prestazione energetica utilizzato</p>
                            <div style="width: 100%; height: 150px; border:#f2f2f2 1px solid; border-radius: 5px; ">
                             <textarea  class="w-100 h-100 px-1" name="energetic_evaluation_method" id="" cols="30" rows="10">{{$final_state->energetic_evaluation_method}}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- divider --}}
                    <hr style="background-color: #f2f2f2; height:3px; border:none;">

                    <div class="px-20 w-80">{{-- APE DE: Descrizione edificio --}}
                        <p class="font-500" style="text-decoration: underline;">APE DE: Descrizione edificio</p>
                        <div class="my-3">
                            <p>Descrizione dell'edificio e della sua localizzazione e destinazione d'uso</p>
                            <div style="width: 100%; height: 150px; border:#f2f2f2 1px solid; border-radius: 5px; ">
                               <textarea  class="w-100 h-100 px-1" name="building_description" id="" cols="30" rows="10">{{$final_state->building_description}}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- divider --}}
                    <hr style="background-color: #f2f2f2; height:3px; border:none;">

                    <div class="px-20">{{-- APE I: Indici di presentrazione energetica --}}
                        <p class="font-500" style="text-decoration: underline;">APE I: Indici di presentrazione energetica </p>
                        <div class="d-flex align-items-center">
                            <p class="m-0">Indice di prestazione energetica non rinnovabile per le climatizazzione invernale proprio dell'edificio EPH,nren</p>
                            <label for="nr_energy_perf_index" class=" m-0 mr-4 black">
                                <input type="number" value="{{$final_state->nr_energy_perf_index}}" name="nr_energy_perf_index" style="width: 120px;" class="border ml-2 px-2 text-right">
                                kW/m² anno
                            </label>
                        </div>
                        <div class="d-flex align-items-center my-3">
                            <p class="m-0">Indice di prestazione energetica rinnovabile per le climatizazzione invernale proprio dell'edificio EPH,nren</p>
                            <label for="r_energy_perf_index" class=" m-0 mr-4 black">
                                <input type="number" value="{{$final_state->r_energy_perf_index}}" name="r_energy_perf_index" style="width: 120px;" class="border ml-2 px-2 text-right">
                                kW/m² anno
                            </label>
                        </div>
                    </div>

                    {{-- divider --}}
                    <hr style="background-color: #f2f2f2; height:3px; border:none;">

                    <div class="px-20">{{-- APE Q: Qualità invernale ed estiva dell'involucro --}}
                        <p class="font-500" style="text-decoration: underline;">APE Q: Qualità invernale ed estiva dell'involucro</p>
                        <div class="d-flex">
                            <label for="EPH" class=" m-0 mr-4 black">EPH,nd
                                <input type="number" value="{{$final_state->EPH}}" name="EPH" class="border ml-2 px-2" style="width: 120px;" >
                                kW/kW/m² anno
                            </label>
                            <label for="Asup" class=" m-0 mr-4 black">Asol,est/Asup utile
                                <input type="number" value="{{$final_state->Asup}}" name="Asup" class="border ml-2 px-2" style="width: 120px;">
                            </label>
                        </div>
                        <div class="my-3">
                            <label for="YIE" class=" m-0 mr-4">
                                <span class="black">YIE</span>
                                <input type="number" value="{{$final_state->YIE}}" name="YIE" class="border ml-2 px-2" style="width: 120px;">
                            </label>
                        </div>

                        <div class="d-flex">
                            <p>
                                Indice di prestaziione energetica globale dell'edificio espresso in energia primaria non rinnovabile EPgl,nren
                            </p>
                            <label for="EPgl_nren" class=" m-0 mr-4 black">
                                <input type="number" value="{{$final_state->EPgl_nren}}" name="EPgl_nren" class="border ml-2 px-2" style="width: 120px;">
                                kW/kW/m² anno
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <span class="mr-2">Qualità invernale dell'involucro</span>
                            </div>
                            <div class="col-9">
                                <select name="invernal_case_quality" value="{{$final_state->invernal_case_quality}}" id="" style="width: 200px; background-color: #dbdcdb; border: none;">
                                    <option value="Bassa" {{$final_state->invernal_case_quality == 'Bassa' ? 'selected' : ''}}>Bassa</option>
                                    <option value="Media" {{$final_state->invernal_case_quality == 'Media' ? 'selected' : ''}}>Media</option>
                                    <option value="Alta" {{$final_state->invernal_case_quality == 'Alta' ? 'selected' : ''}}>Alta</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <span class="mr-2">Qualità estiva dell'involucro</span>
                            </div>
                            <div class="col-9">
                                <select name="summer_case_quality" id="" value="{{$final_state->summer_case_quality}}" style="width: 200px; background-color: #dbdcdb; border: none;">
                                    <option value="Bassa" {{$final_state->summer_case_quality == 'Bassa' ? 'selected' : ''}}>Bassa</option>
                                    <option value="Media" {{$final_state->summer_case_quality == 'Media' ? 'selected' : ''}}>Media</option>
                                    <option value="Alta" {{$final_state->summer_case_quality == 'Alta' ? 'selected' : ''}}>Alta</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <span class="mr-2">Classe energetica</span>
                            </div>
                            <div class="col-9">
                                <select name="energetic_class" id="" value="{{$final_state->energetic_class}}" style="width: 50px; background-color: #dbdcdb; border: none;">
                                    <option value="A4" {{$final_state->energetic_class == 'A4' ? 'selected' : ''}}>A4</option>
                                    <option value="A3" {{$final_state->energetic_class == 'A3' ? 'selected' : ''}}>A3</option>
                                    <option value="A2" {{$final_state->energetic_class == 'A2' ? 'selected' : ''}}>A2</option>
                                    <option value="A1" {{$final_state->energetic_class == 'A1' ? 'selected' : ''}}>A1</option>
                                    <option value="B" {{$final_state->energetic_class == 'B' ? 'selected' : ''}}>B</option>
                                    <option value="C" {{$final_state->energetic_class == 'C' ? 'selected' : ''}}>C</option>
                                    <option value="D" {{$final_state->energetic_class == 'D' ? 'selected' : ''}}>D</option>
                                    <option value="E" {{$final_state->energetic_class == 'E' ? 'selected' : ''}}>E</option>
                                    <option value="F" {{$final_state->energetic_class == 'F' ? 'selected' : ''}}>F</option>
                                    <option value="G" {{$final_state->energetic_class == 'G' ? 'selected' : ''}}>G</option>
                                </select>
                            </div>
                        </div>
                        <label for="people_transport" class="checkbox-wrapper d-flex mt-3">
                            <input type="checkbox" name="people_transport" id="people_transport" value="true" {{$final_state->people_transport == ' true' ? 'checked' : ''}}>
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
                            <div style="width: 100%; height: 150px; border:#f2f2f2 1px solid; border-radius: 5px; ">
                             <textarea  class="w-100 h-100 px-1" name="possible_improvements" id="" cols="30" rows="10">{{$final_state->possible_improvements}}</textarea>
                            </div>
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
