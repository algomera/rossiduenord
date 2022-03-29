@extends('business.layouts.business')

@section('content')
    @include('business.layouts.partials.practiceNav')
    @include('business.layouts.partials.nav_superbonus')


            <form action="{{ route('business.update_vertical_wall', ['practice' => $practice]) }}" method="POST">
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
                        <input {{ $vertwall->thermical_isolation_intervention == 'true' ? 'checked' : ''}} type="checkbox" name="thermical_isolation_intervention" id="thermical_isolation_intervention" value="true">
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
                            <label for="total_vertical_walls" class="m-0 black">
                                <input type="number" value="{{$vertwall->total_vertical_walls}}" name="total_vertical_walls" id="total_vertical_walls" class="border ml-2 px-2 text-right" style="width: 80px">
                                m²
                            </label>
                        </div>
                        <div class="d-flex mr-4">
                            <p class="m-0">di cui realizzati SAL n. 1</p>
                            <label for="vw_realized_1" class="m-0  black">
                                <input type="number" value="{{$vertwall->vw_realized_1}}" name="vw_realized_1" id="vw_realized_1" class="border ml-2 px-2 text-right" style="width: 80px">
                                m²
                            </label>
                        </div>
                        <div class="d-flex mr-4">
                            <p class="m-0">SAL n. 2</p>
                            <label for="vw_realized_2" class="m-0  black">
                                <input type="number" value="{{$vertwall->vw_realized_2}}" name="vw_realized_2" id="vw_realized_2" class="border ml-2 px-2 text-right" style="width: 80px">
                                m²
                            </label>
                        </div>
                        <div class="d-flex mr-4">
                            <p class="m-0">SAL F.</p>
                            <label for="vw_sal_f" class="m-0  black">
                                <input type="number" value="{{$vertwall->vw_sal_f}}" name="vw_sal_f" id="vw_sal_f" class="border ml-2 px-2 text-right" style="width: 80px">
                                m²
                            </label>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mt-3" style="width:80%;">
                        <p class="m-0">Superficie totale oggetto dell’intervento</p>
                        <label for="total_intervention_surface" class=" m-0 mr-4 black">
                            <input type="number" value="{{$vertwall->total_intervention_surface}}" name="total_intervention_surface" id="total_intervention_surface" style="width: 80px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                            m²
                        </label>
                        <p class="m-0 font-weight-light" style="font-size: 13px">* Il POND non viene considerato nel calcolo per l’ammisibilità dell’intervento trainante sull’involucro (maggiore del 25% della sup. disperdente)</p>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-3" style="width:80%;">
                        <div class="d-flex align-items-center">
                            <p class="m-0">Il costo complessivo previsto in progetto dei lavori sulle pratiche opache ammonta a*</p>
                            <label for="total_expected_cost" class=" m-0 mr-4 black">
                                <input type="number" value="{{$vertwall->total_expected_cost}}" name="total_expected_cost" id="total_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                €
                            </label>
                        </div>
                        <button class="add-button">Computo metrico</button>
                    </div>

                    <p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>

                    <div class="d-flex align-items-center mt-3" style="width:80%;">
                        <p class="m-0">La spesa massima ammissibile dei lavori sulle parti opache è pari a</p>
                        <label for="max_possible_cost" class=" m-0 mr-4 black">
                            <input type="number" value="{{$vertwall->max_possible_cost}}" name="max_possible_cost" id="max_possible_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                            €
                        </label>
                    </div>

                    <p class="m-0 mt-3" style="font-weight: 500;">Il costo dei lavori realizzati è pari a</p>

                    <div class="d-flex" style="width: 80%">
                        <div class="d-flex align-items-center">
                            <span>SAL. n.1</span>
                            <label for="total_isolation_cost_1" class="d-flex flex-column align-items-end mb-3 mr-1">
                                <small class="black">almeno al 30%</small>
                                <input type="number" value="{{$vertwall->total_isolation_cost_1}}" name="total_isolation_cost_1" id="total_isolation_cost_1" class="ml-2 text-right px-2 border" style="width:120px">
                            </label>
                            <span>€</span>
                        </div>
                        <div class="d-flex align-items-center ml-4">
                            <span>SAL. n.2</span>
                            <label for="total_isolation_cost_2" class="d-flex flex-column align-items-end mb-3 mr-1">
                                <small class="black">almeno al 60%</small>
                                <input type="number" value="{{$vertwall->total_isolation_cost_2}}" name="total_isolation_cost_2" id="total_isolation_cost_2" class="ml-2 text-right px-2 border" style="width:120px">
                            </label>
                            <span>€</span>
                        </div>
                        <div class="d-flex align-items-center ml-4">
                            <span>SAL.F</span>
                            <label for="final_isolation_cost" class="d-flex flex-column align-items-end mr-1 mb-0">
                                <input type="number" value="{{$vertwall->final_isolation_cost}}" name="final_isolation_cost" id="final_isolation_cost" class="ml-2 border text-right px-2" style="width:120px;">
                            </label>
                            <span>€</span>
                        </div>
                        <div class="d-flex align-items-center ml-4">
                            <span>SAL. 1+2</span>
                            <label for="" class="d-flex flex-column align-items-end mr-1 mb-0">
                                <input type="number" value="{{$vertwall->total_isolation_cost_1 + $vertwall->total_isolation_cost_2}}" class="ml-2 border text-right px-2" style="width:120px; background-color: #f2f2f2">
                            </label>
                            <span>€</span>
                        </div>
                        <div class="d-flex align-items-center ml-4">
                            <span>SAL. 1+2 F</span>
                            <label for="" class="d-flex flex-column align-items-end mr-1 mb-0">
                                <input type="number" value="{{$vertwall->total_isolation_cost_1 + $vertwall->total_isolation_cost_2 + $vertwall->final_isolation_cost}}" class="ml-2 border text-right px-2" style="width:120px; background-color: #f2f2f2">
                            </label>
                            <span>€</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mt-2" style="width:80%;">
                        <p class="m-0">Di cui per coperture non disperdenti</p>
                        <label for="dispersing_covers" class=" m-0 mr-4 black">
                            <input type="number" value="{{$vertwall->dispersing_covers}}" name="dispersing_covers" id="dispersing_covers" style="width: 120px;" class="border ml-2 px-2 text-right">
                            €
                        </label>
                    </div>

                    <div class="d-flex align-items-center mt-2 mb-4" style="width:80%;">
                        <p class="m-0">Il risparmio di energia primaria non rinnovabile di progetto è</p>
                        <label for="isolation_energetic_savings" class=" m-0 mr-4 black">
                            <input type="number" value="{{$vertwall->isolation_energetic_savings}}" name="isolation_energetic_savings" id="isolation_energetic_savings" style="width: 120px;" class="border ml-2 px-2 text-right">
                            KWh/anno
                        </label>
                    </div>
                </div>

                <div class="px-20 pb-20">{{-- Intervento di sostituzione degli impianti di climatizzazione invernale esistenti --}}
                    <label class="checkbox-wrapper d-flex">
                        <input {{$vertwall->winter_acs_replacing == 'true' ? 'checked' : ''}} type="checkbox" name="winter_acs_replacing" id="winter_acs_replacing" value="true">
                        <span class="checkmark"></span>
                        <span class="black" ><b>Intervento di sostituzione degli impianti di climatizzazione invernale esistenti</b></span>
                    </label>

                    <div class="d-flex">
                        <div class="d-flex align-items-center ml-4">
                            <span>Potenza utile complessiva pari a</span>
                            <label for="total_power" class="d-flex flex-column align-items-end mr-1 mb-0">
                                <input type="number" value="{{$vertwall->total_power}}" name="total_power" id="total_power" class="ml-2 border text-right px-2" style="width:120px;">
                            </label>
                            <span>kW</span>
                        </div>
                        <div class="d-flex align-items-center ml-4">
                            <span>composto da n.</span>
                            <label for="generators" class="d-flex flex-column align-items-end mr-1 mb-0">
                                <input type="number" value="{{$vertwall->generators}}" name="generators" id="generators" class="ml-2 border text-right px-2" style="width:120px;">
                            </label>
                            <span>generatori di calore</span>
                        </div>
                    </div>

                    <p>con impianti centralizzati dotati di:</p>

                    <div class="mt-5">
                        <label class="checkbox-wrapper d-flex">
                            <input {{$vertwall->condensing_boiler == 'true' ? 'checked' : ''}} type="checkbox" name="condensing_boiler" id="condensing_boiler" value="true">
                            <span class="checkmark"></span>
                            <span class="black" ><b>CC. Caldaie a condensazione</b></span>
                        </label>
                        <div style="width: 80%; height: 200px; background-color: #f2f2f2 ">

                        </div>
                    </div>

                    <div class="mt-5">
                        <label class="checkbox-wrapper d-flex">
                            <input {{$vertwall->heat_pumps == 'true' ? 'checked' : ''}} type="checkbox" name="heat_pumps" id="heat_pumps" value="true">
                            <span class="checkmark"></span>
                            <span class="black" ><b>PC. Pompe di calore (P… </b></span>
                        </label>
                        <div style="width: 80%; height: 200px; background-color: #f2f2f2 ">

                        </div>
                    </div>

                    <div class="mt-5">
                        <label class="checkbox-wrapper d-flex">
                            <input {{$vertwall->absorption_heat_pumps == 'true' ? 'checked' : ''}} type="checkbox" name="absorption_heat_pumps" id="absorption_heat_pumps" value="true">
                            <span class="checkmark"></span>
                            <span class="black" ><b>PCA. Pompe di calore ad assorbimento a…</b></span>
                        </label>
                        <div style="width: 80%; height: 200px; background-color: #f2f2f2 ">

                        </div>
                    </div>

                    <div class="mt-5">
                        <label class="checkbox-wrapper d-flex">
                            <input {{$vertwall->hybrid_system == 'true' ? 'checked' : ''}} type="checkbox" name="hybrid_system" id="hybrid_system" value="true">
                            <span class="checkmark"></span>
                            <span class="black" ><b>SI. Sistemi ibridi</b></span>
                        </label>
                        <div style="width: 80%; height: 200px; background-color: #f2f2f2 ">

                        </div>
                    </div>

                    <div class="mt-5">
                        <label class="checkbox-wrapper d-flex">
                            <input {{$vertwall->microgeneration_system == 'true' ? 'checked' : ''}} type="checkbox" name="microgeneration_system" id="microgeneration_system" value="true">
                            <span class="checkmark"></span>
                            <span class="black" ><b>CO. Sistemi di microgenerazione</b></span>
                        </label>
                        <div style="width: 80%; height: 200px; background-color: #f2f2f2 ">

                        </div>
                    </div>

                    <div class="mt-5">
                        <label class="checkbox-wrapper d-flex">
                            <input {{$vertwall->water_heatpumps_installation == 'true' ? 'checked' : ''}} type="checkbox" name="water_heatpumps_installation" id="water_heatpumps_installation" value="true">
                            <span class="checkmark"></span>
                            <span class="black" ><b>SA. Installazione di scaldacqua a pompa di c…</b></span>
                        </label>
                        <p style="width: 70%;">In sostituzione di un sistema di produzione di acqua calda quando avviene con lo stesso generatore di calore destinato alla climatizzazione invernale ai sensi delle lettre b) e c) del comma 1 dell’articolo 119 del Decreto Rilancio</p>
                        <div style="width: 80%; height: 200px; background-color: #f2f2f2 ">

                        </div>
                    </div>

                    <div class="mt-5">
                        <label class="checkbox-wrapper d-flex">
                            <input {{$vertwall->biome_generators == 'true' ? 'checked' : ''}} type="checkbox" name="biome_generators" id="biome_generators" value="true">
                            <span class="checkmark"></span>
                            <span class="black" ><b>IB. Generatori a bioma…</b></span>
                        </label>
                        <p style="width: 70%;">Installazione di impianti di climatizzazione invernale dotati di generatori di calore alimentati da biomasse combustibili</p>
                        <div style="width: 80%; height: 200px; background-color: #f2f2f2 ">

                        </div>
                    </div>

                    <div class="mt-5">
                        <label class="checkbox-wrapper d-flex">
                            <input {{$vertwall->solar_panel == 'true' ? 'checked' : ''}} type="checkbox" name="solar_panel" id="solar_panel" value="true">
                            <span class="checkmark"></span>
                            <span class="black" ><b>Collettori solari</b></span>
                        </label>
                        <div style="width: 80%; height: 200px; background-color: #f2f2f2 ">

                        </div>
                    </div>

                    <div class="d-flex mt-3">
                        <span>Destinati a</span>

                        <label for="solar_panel_use_winter" class="checkbox-wrapper d-flex ml-4">
                            <input {{$vertwall->solar_panel_use_winter == 'true' ? 'checked' : ''}} type="checkbox" name="solar_panel_use_winter" id="solar_panel_use_winter" value="true">
                            <span class="checkmark"></span>
                            <span class="black" >Climatizzazione invernale</span>
                        </label>
                        <label for="solar_panel_use_summer" class="checkbox-wrapper d-flex  ml-4">
                            <input {{$vertwall->solar_panel_use_summer == 'true' ? 'checked' : ''}} type="checkbox" name="solar_panel_use_summer" id="solar_panel_use_summer" value="true">
                            <span class="checkmark"></span>
                            <span class="black" >Climatizzazione estiva</span>
                        </label>
                        <label for="solar_panel_use_water" class="checkbox-wrapper d-flex  ml-4">
                            <input {{$vertwall->solar_panel_use_water == 'true' ? 'checked' : ''}} type="checkbox" name="solar_panel_use_water" id="solar_panel_use_water" value="true">
                            <span class="checkmark"></span>
                            <span class="black" >Produzione di acqua calda sanitaria</span>
                        </label>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-3" style="width:80%;">
                        <div class="d-flex align-items-center">
                            <p class="m-0">Il costo complessivo di progetto degli interventi sull’impianto ammonta a *</p>
                            <label for="total_acs_project_cost" class=" m-0 mr-4 black">
                                <input type="number" value="{{$vertwall->total_acs_project_cost}}" name="total_acs_project_cost" id="total_acs_project_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                €
                            </label>
                        </div>
                        <button class="add-button">Computo metrico</button>
                    </div>

                    <p class="font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>

                    <div class="d-flex align-items-center mt-2 mb-4" style="width:80%;">
                        <p class="m-0">L'ammontare massimo dei lavori per la sostituzione degli impianti è pari a</p>
                        <label for="total_cost_installations" class=" m-0 mr-4 black">
                            <input type="number" value="{{$vertwall->total_cost_installations}}" name="total_cost_installations" id="total_cost_installations" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
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
                            <label for="total_replacing_cost_1" class="d-flex flex-column align-items-end mb-3 mr-1">
                                <small class="black">almeno al 30%</small>
                                <input type="number" value="{{$vertwall->total_replacing_cost_1}}" name="total_replacing_cost_1" id="total_replacing_cost_1" class="ml-2 text-right px-2 border" style="width:120px">
                            </label>
                            <span>€</span>
                        </div>
                        <div class="d-flex align-items-center ml-4">
                            <span>SAL. n.2</span>
                            <label for="total_replacing_cost_2" class="d-flex flex-column align-items-end mb-3 mr-1">
                                <small class="black">almeno al 60%</small>
                                <input type="number" value="{{$vertwall->total_replacing_cost_2}}" name="total_replacing_cost_2" id="total_replacing_cost_2" class="ml-2 text-right px-2 border" style="width:120px">
                            </label>
                            <span>€</span>
                        </div>
                        <div class="d-flex align-items-center ml-4">
                            <span>SAL.F</span>
                            <label for="final_replacing_cost" class="d-flex flex-column align-items-end mr-1 mb-0">
                                <input type="number" value="{{$vertwall->final_replacing_cost}}" name="final_replacing_cost" id="final_replacing_cost" class="ml-2 border text-right px-2" style="width:120px;">
                            </label>
                            <span>€</span>
                        </div>
                        <div class="d-flex align-items-center ml-4">
                            <span>SAL. 1+2</span>
                            <label for="" class="d-flex flex-column align-items-end mr-1 mb-0">
                                <input type="number" value="{{$vertwall->total_replacing_cost_1 + $vertwall->total_replacing_cost_2}}" class="ml-2 border text-right px-2" style="width:120px; background-color: #f2f2f2">
                            </label>
                            <span>€</span>
                        </div>
                        <div class="d-flex align-items-center ml-4">
                            <span>SAL. 1+2 F</span>
                            <label for="" class="d-flex flex-column align-items-end mr-1 mb-0">
                                <input type="number" value="{{$vertwall->total_replacing_cost_1 + $vertwall->total_replacing_cost_2 + $vertwall->final_replacing_cost}}" class="ml-2 border text-right px-2" style="width:120px; background-color: #f2f2f2">
                            </label>
                            <span>€</span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mt-2 mb-4" style="width:80%;">
                        <p class="m-0 font-weight-bold">Il risparmio di energia primaria non rinnovabile di progetto è</p>
                        <label for="replacing_energetic_savings" class=" m-0 mr-4 black">
                            <input type="number" value="{{$vertwall->replacing_energetic_savings}}" name="replacing_energetic_savings" id="replacing_energetic_savings" style="width: 120px;" class="border ml-2 px-2 text-right">
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
