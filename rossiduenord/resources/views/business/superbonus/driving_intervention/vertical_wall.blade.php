@extends('business.layouts.business')

@section('content')
    @include('business.layouts.partials.practiceNav')
    @include('business.layouts.partials.nav_superbonus')


    <form action="{{ route('business.update_driving_intervention', ['practice' => $practice]) }}" method="POST">
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

            <div class="nav_bonus d-flex align-items-center" style="width: 80%; padding-right: 0px; margin:0;margin-bottom: 5px;">
                <a class="frame">(PV) Pareti Verticali</a>
                <a>(PO) Coperture</a>
                <a>(PS) Pavimenti</a>
                <a>(POND) Cop. non disperdenti</a>
                <p class="m-0">Data inizio pagamento coperture non disperdenti</p>
                <input value="{{$vertwall->start_date_payment}}" name="start_date_payment" id="start_date_payment" class="border ml-2" style="width: 150px; padding:0 5px" type="date">
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

            <p>Con impianti centralizzati dotati di:</p>

            <div class="mt-5">{{-- CC. Caldaie a condensazione --}}
                <div class="d-flex align-items-center mb-3">
                    <label for="condensing_boiler" class="checkbox-wrapper d-flex align-items-center mb-0">
                        <div>
                            <input {{$vertwall->condensing_boiler == 'true' ? 'checked' : ''}} type="checkbox" name="condensing_boiler" id="condensing_boiler" value="true">
                            <span class="checkmark"></span>
                            <span class="black"><b>CC. Caldaie a condensazione</b></span>
                        </div>
                    </label>
                    <div class="btn bg-blue white ml-3 mr-3" onclick="addCondensingBoiler(event)">+</div>
                    <span><strong>(n. {{ $condensing_boilers->count() }} Caldaia/e)</strong></span>
                </div>
                <div class="px-20 pt-20 pb-20" style="width: 80%; min-height: 160px; background-color: #f2f2f2 ">
                    <div id="condensing_boiler_wrapper">
                        @forelse($condensing_boilers as $i => $condensing_boiler)
                            <div class="box_input" data-id="condensing_boiler-{{$practice->id}}-{{$condensing_boiler->id}}">
                                {{ $i + 1 }}
                                <div class="row_input">
                                    <input type="hidden" name="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][condomino_id]" id="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][condomino_id]" value="">
                                    <label for="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][tipo_sostituito]">
                                        Tipo sostituito
                                        <select name="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][tipo_sostituito]" id="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][tipo_sostituito]">
                                            <option {{ $condensing_boiler->tipo_sostituito === 'Caldaia standard' ? 'selected' : ''}} value="Caldaia standard">Caldaia standard</option>
                                            <option {{ $condensing_boiler->tipo_sostituito === 'Caldaia a bassa temperatura' ? 'selected' : ''}} value="Caldaia a bassa temperatura">Caldaia a bassa temperatura</option>
                                            <option {{ $condensing_boiler->tipo_sostituito === 'Caldaia a condensazione a gas' ? 'selected' : ''}} value="Caldaia a condensazione a gas">Caldaia a condensazione a gas</option>
                                            <option {{ $condensing_boiler->tipo_sostituito === 'Caldaia a condesazione a gasolio' ? 'selected' : ''}} value="Caldaia a condesazione a gasolio">Caldaia a condesazione a gasolio</option>
                                            <option {{ $condensing_boiler->tipo_sostituito === 'Pompa di calore anche con sonda geotermica' ? 'selected' : ''}} value="Pompa di calore anche con sonda geotermica">Pompa di calore anche con sonda geotermica</option>
                                            <option {{ $condensing_boiler->tipo_sostituito === 'Generatori di aria calda' ? 'selected' : ''}} value="Generatori di aria calda">Generatori di aria calda</option>
                                            <option {{ $condensing_boiler->tipo_sostituito === 'Teleriscaldamento' ? 'selected' : ''}} value="Teleriscaldamento">Teleriscaldamento</option>
                                            <option {{ $condensing_boiler->tipo_sostituito === 'Impianto a biomassa' ? 'selected' : ''}} value="Impianto a biomassa">Impianto a biomassa</option>
                                            <option {{ $condensing_boiler->tipo_sostituito === 'Altro' ? 'selected' : ''}} value="Altro">Altro</option>
                                        </select>
                                    </label>
                                    <label for="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][p_nom_sostituito]">
                                        P. nom. sostituito
                                        <input class="input_small" type="number" name="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][p_nom_sostituito]" id="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][p_nom_sostituito]" value="{{ $condensing_boiler->p_nom_sostituito }}">
                                        kW
                                    </label>
                                    <label for="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][potenza_nominale]">
                                        Potenza nominale
                                        <input class="input_small" type="number" name="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][potenza_nominale]" id="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][potenza_nominale]" value="{{ $condensing_boiler->potenza_nominale }}">
                                        kW
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][rend_utile_nom]">
                                        Rend. utile nom. (100%)
                                        <input class="input_small" type="number" name="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][rend_utile_nom]" id="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][rend_utile_nom]" value="{{ $condensing_boiler->rend_utile_nom }}">
                                        %
                                    </label>
                                    <label for="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][use_destination]">
                                        <select name="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][use_destination]" id="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][use_destination]">
                                            <option {{ $condensing_boiler->use_destination === 'Riscaldameto ambiente' ? 'selected' : ''}} value="Riscaldameto ambiente">Riscaldameto ambiente</option>
                                            <option {{ $condensing_boiler->use_destination === 'Risc. ambiente + prod.ACS' ? 'selected' : ''}} value="Risc. ambiente + prod.ACS">Risc. ambiente + prod.ACS</option>
                                        </select>
                                    </label>
                                    <label for="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][efficienza_ns]">
                                        Efficienza ns
                                        <input class="input_small" type="number" name="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][efficienza_ns]" id="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][efficienza_ns]" value="{{ $condensing_boiler->efficienza_ns }}">
                                        %
                                    </label>
                                    <label for="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][efficienza_acs_nwh]">
                                        Efficienza ACS nwh
                                        <input class="input_small" type="number" name="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][efficienza_acs_nwh]" id="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][efficienza_acs_nwh]" value="{{ $condensing_boiler->efficienza_acs_nwh }}">
                                        %
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="row_input">
                                        <label for="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][tipo_di_alimentazione]">
                                            Tipo di alimentazione
                                            <select name="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][tipo_di_alimentazione]" id="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][tipo_di_alimentazione]">
                                                <option {{ $condensing_boiler->tipo_di_alimentazione === 'Metano' ? 'selected' : ''}} value="Metano">Gas Naturale (metano)</option>
                                                <option {{ $condensing_boiler->tipo_di_alimentazione === 'Gpl' ? 'selected' : ''}} value="Gpl">Gpl</option>
                                                <option {{ $condensing_boiler->tipo_di_alimentazione === 'Gasolio' ? 'selected' : ''}} value="Gasolio">Gasolio</option>
                                            </select>
                                        </label>
                                        <label for="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][classe_termo_evoluto]">
                                            Classe disp. termoregolazione evoluto
                                            <select name="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][classe_termo_evoluto]" id="condensing_boilers[{{$practice->id}}-{{$condensing_boiler->id}}][classe_termo_evoluto]">
                                                <option {{ $condensing_boiler->classe_termo_evoluto === 'V' ? 'selected' : ''}} value="V">V</option>
                                                <option {{ $condensing_boiler->classe_termo_evoluto === 'VI' ? 'selected' : ''}} value="VI">VI</option>
                                                <option {{ $condensing_boiler->classe_termo_evoluto === 'VIII' ? 'selected' : ''}} value="VIII">VIII</option>
                                                <option {{ $condensing_boiler->classe_termo_evoluto === 'Nessun dispositivo' ? 'selected' : ''}} value="Nessun dispositivo">Nessun dispositivo</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div onclick="deleteCondensingBoiler({{$practice->id}}, {{$condensing_boiler->id}})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                        <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                        <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p id="consensing_boilers_no_data_row">Nessun dato</p>
                        @endforelse
                        {{-- end loop --}}
                    </div>
                </div>
            </div>

            <div class="mt-5">{{-- PC. Pompe di calore (PDC) --}}
                <div class="d-flex align-items-center mb-3">
                    <label for="heat_pump" class="checkbox-wrapper d-flex align-items-center mb-0">
                        <input {{$vertwall->heat_pump == 'true' ? 'checked' : ''}} type="checkbox" name="heat_pump" id="heat_pump" value="true">
                        <span class="checkmark"></span>
                        <span class="black" ><b>PC. Pompe di calore (PDC) </b></span>
                    </label>
                    <div class="btn bg-blue white ml-3 mr-3" onclick="addHeatPump(event)">+</div>
                    <span><strong>(n. {{ $heat_pumps->count() }} Pompa/e di calore)</strong></span>
                </div>
                <div class="px-20 pt-20 pb-20" style="width: 80%; min-height: 160px; background-color: #f2f2f2 ">
                    <div id="heat_pump_wrapper">
                        @forelse($heat_pumps as $i => $heat_pump)
                            <div class="box_input" data-id="heat_pump-{{$practice->id}}-{{$heat_pump->id}}">
                                {{ $i + 1 }}
                                <div class="row_input">
                                    <input type="hidden" name="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][condomino_id]" id="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][condomino_id]" value="">
                                    <label for="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][tipo_sostituito]">
                                        Tipo sostituito
                                        <select name="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][tipo_sostituito]" id="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][tipo_sostituito]">
                                            <option {{ $heat_pump->tipo_sostituito === 'Caldaia standard' ? 'selected' : ''}} value="Caldaia standard">Caldaia standard</option>
                                            <option {{ $heat_pump->tipo_sostituito === 'Caldaia a bassa temperatura' ? 'selected' : ''}} value="Caldaia a bassa temperatura">Caldaia a bassa temperatura</option>
                                            <option {{ $heat_pump->tipo_sostituito === 'Caldaia a condensazione a gas' ? 'selected' : ''}} value="Caldaia a condensazione a gas">Caldaia a condensazione a gas</option>
                                            <option {{ $heat_pump->tipo_sostituito === 'Caldaia a condesazione a gasolio' ? 'selected' : ''}} value="Caldaia a condesazione a gasolio">Caldaia a condesazione a gasolio</option>
                                            <option {{ $heat_pump->tipo_sostituito === 'Pompa di calore anche con sonda geotermica' ? 'selected' : ''}} value="Pompa di calore anche con sonda geotermica">Pompa di calore anche con sonda geotermica</option>
                                            <option {{ $heat_pump->tipo_sostituito === 'Generatori di aria calda' ? 'selected' : ''}} value="Generatori di aria calda">Generatori di aria calda</option>
                                            <option {{ $heat_pump->tipo_sostituito === 'Teleriscaldamento' ? 'selected' : ''}} value="Teleriscaldamento">Teleriscaldamento</option>
                                            <option {{ $heat_pump->tipo_sostituito === 'Impianto a biomassa' ? 'selected' : ''}} value="Impianto a biomassa">Impianto a biomassa</option>
                                            <option {{ $heat_pump->tipo_sostituito === 'Altro' ? 'selected' : ''}} value="Altro">Altro</option>
                                        </select>
                                    </label>
                                    <label for="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][p_nom_sostituito]">
                                        P. nom. sostituito
                                        <input class="input_small" type="number" name="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][p_nom_sostituito]" id="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][p_nom_sostituito]" value="{{ $heat_pump->p_nom_sostituito }}">
                                        kW
                                    </label>
                                    <label for="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][tipo_di_pdc]">
                                        Tipo di PDC
                                        <select name="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][tipo_di_pdc]" id="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][tipo_di_pdc]">
                                            <option {{ $heat_pump->tipo_di_pdc === 'Aria/Aria' ? 'selected' : ''}} value="Aria/Aria">Aria/Aria</option>
                                            <option {{ $heat_pump->tipo_di_pdc === 'Aria/Acqua' ? 'selected' : ''}} value="Aria/Acqua">Aria/Acqua</option>
                                            <option {{ $heat_pump->tipo_di_pdc === 'Salamoia/Aria' ? 'selected' : ''}} value="Salamoia/Aria">Salamoia/Aria</option>
                                            <option {{ $heat_pump->tipo_di_pdc === 'Salamoia/Acqua' ? 'selected' : ''}} value="Salamoia/Acqua">Salamoia/Acqua</option>
                                            <option {{ $heat_pump->tipo_di_pdc === 'Acqua/Aria' ? 'selected' : ''}} value="Acqua/Aria">Acqua/Aria</option>
                                            <option {{ $heat_pump->tipo_di_pdc === 'Acqua/Acqua' ? 'selected' : ''}} value="Acqua/Acqua">Acqua/Acqua</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][tipo_roof_top]" class="checkbox-wrapper d-flex">
                                        <input type="checkbox" {{ $heat_pump->tipo_roof_top ? 'checked' : '' }} name="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][tipo_roof_top]" id="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][tipo_roof_top]" value="true">
                                        <span class="checkmark"></span>
                                        Tipo Roof Top
                                    </label>
                                    <label for="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][potenza_nominale]">
                                        Potenza Nominale
                                        <input class="input_small" type="number" name="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][potenza_nominale]" id="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][potenza_nominale]" value="{{ $heat_pump->potenza_nominale }}">
                                        kW
                                    </label>
                                    <label for="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][p_elettrica_assorbita]">
                                        P. Elettrica assorbita
                                        <input class="input_small" type="number" name="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][p_elettrica_assorbita]" id="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][p_elettrica_assorbita]" value="{{ $heat_pump->p_elettrica_assorbita }}">
                                        kW
                                    </label>
                                    <label for="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][inverter]" class="checkbox-wrapper d-flex">
                                        <input type="checkbox" {{ $heat_pump->inverter ? 'checked' : '' }} name="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][inverter]" id="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][inverter]" value="true">
                                        <span class="checkmark"></span>
                                        Inverter
                                    </label>
                                    <label for="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][cop]">
                                        COP
                                        <input class="input_small" type="number" name="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][cop]" id="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][cop]" value="{{ $heat_pump->cop }}">
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="row_input">
                                        <label for="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][reversibile]" class="checkbox-wrapper d-flex">
                                            <input type="checkbox" {{ $heat_pump->reversibile ? 'checked' : '' }} name="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][reversibile]" id="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][reversibile]" value="true">
                                            <span class="checkmark"></span>
                                            E' reversibile
                                        </label>
                                        <label for="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][eer]">
                                            EER
                                            <input class="input_small" type="number" name="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][eer]" id="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][eer]" value="{{ $heat_pump->eer }}">
                                        </label>
                                        <label for="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][sonde_geotermiche]" class="checkbox-wrapper d-flex">
                                            <input type="checkbox" {{ $heat_pump->sonde_geotermiche ? 'checked' : '' }} name="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][sonde_geotermiche]" id="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][sonde_geotermiche]" value="true">
                                            <span class="checkmark"></span>
                                            Sonde geotermiche
                                        </label>
                                        <label for="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][sup_riscaldata_dalla_pdc]">
                                            Sup. riscaldata dalla PDC
                                            <input class="input_small" type="number" name="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][sup_riscaldata_dalla_pdc]" id="heat_pumps[{{$practice->id}}-{{$heat_pump->id}}][sup_riscaldata_dalla_pdc]" value="{{ $heat_pump->sup_riscaldata_dalla_pdc }}">
                                            m²
                                        </label>
                                    </div>
                                    <div onclick="deleteHeatPump({{$practice->id}}, {{$heat_pump->id}})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                        <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                        <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p id="heat_pumps_no_data_row">Nessun dato</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="mt-5">{{-- PCA. Pompe di calore ad assorbimento a gas --}}
                <div class="d-flex align-items-center mb-3">
                    <label for="absorption_heat_pump" class="checkbox-wrapper d-flex align-items-center mb-0">
                        <input {{$vertwall->absorption_heat_pump == 'true' ? 'checked' : ''}} type="checkbox" name="absorption_heat_pump" id="absorption_heat_pump" value="true">
                        <span class="checkmark"></span>
                        <span class="black" ><b>PCA. Pompe di calore ad assorbimento a gas</b></span>
                    </label>
                    <div class="btn bg-blue white ml-3 mr-3" onclick="addAbsorptionHeatPump(event)">+</div>
                    <span><strong>(n. {{ $absorption_heat_pumps->count() }} Pompa/e di calore ad assorbimento a gas)</strong></span>
                </div>
                <div class="px-20 pt-20 pb-20" style="width: 80%; min-height: 160px; background-color: #f2f2f2 ">
                    <div id="absorption_heat_pump_wrapper">
                        @forelse($absorption_heat_pumps as $i => $absorption_heat_pump)
                            <div class="box_input" data-id="absorption_heat_pump-{{$practice->id}}-{{$absorption_heat_pump->id}}">
                                {{ $i + 1 }}
                                <div class="row_input">
                                    <input type="hidden" name="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][condomino_id]" id="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][condomino_id]" value="">
                                    <label for="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][tipo_sostituito]">
                                        Tipo sostituito
                                        <select name="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][tipo_sostituito]" id="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][tipo_sostituito]">
                                            <option {{ $absorption_heat_pump->tipo_sostituito === 'Caldaia standard' ? 'selected' : ''}} value="Caldaia standard">Caldaia standard</option>
                                            <option {{ $absorption_heat_pump->tipo_sostituito === 'Caldaia a bassa temperatura' ? 'selected' : ''}} value="Caldaia a bassa temperatura">Caldaia a bassa temperatura</option>
                                            <option {{ $absorption_heat_pump->tipo_sostituito === 'Caldaia a condensazione a gas' ? 'selected' : ''}} value="Caldaia a condensazione a gas">Caldaia a condensazione a gas</option>
                                            <option {{ $absorption_heat_pump->tipo_sostituito === 'Caldaia a condesazione a gasolio' ? 'selected' : ''}} value="Caldaia a condesazione a gasolio">Caldaia a condesazione a gasolio</option>
                                            <option {{ $absorption_heat_pump->tipo_sostituito === 'Pompa di calore anche con sonda geotermica' ? 'selected' : ''}} value="Pompa di calore anche con sonda geotermica">Pompa di calore anche con sonda geotermica</option>
                                            <option {{ $absorption_heat_pump->tipo_sostituito === 'Generatori di aria calda' ? 'selected' : ''}} value="Generatori di aria calda">Generatori di aria calda</option>
                                            <option {{ $absorption_heat_pump->tipo_sostituito === 'Teleriscaldamento' ? 'selected' : ''}} value="Teleriscaldamento">Teleriscaldamento</option>
                                            <option {{ $absorption_heat_pump->tipo_sostituito === 'Impianto a biomassa' ? 'selected' : ''}} value="Impianto a biomassa">Impianto a biomassa</option>
                                            <option {{ $absorption_heat_pump->tipo_sostituito === 'Altro' ? 'selected' : ''}} value="Altro">Altro</option>
                                        </select>
                                    </label>
                                    <label for="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][p_nom_sostituito]">
                                        P. nom. sostituito
                                        <input class="input_small" type="number" name="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][p_nom_sostituito]" id="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][p_nom_sostituito]" value="{{ $absorption_heat_pump->p_nom_sostituito }}">
                                        kW
                                    </label>
                                    <label for="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][tipo_di_pdc]">
                                        Tipo di PDC
                                        <select name="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][tipo_di_pdc]" id="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][tipo_di_pdc]">
                                            <option {{ $absorption_heat_pump->tipo_di_pdc === 'Aria/Aria' ? 'selected' : ''}} value="Aria/Aria">Aria/Aria</option>
                                            <option {{ $absorption_heat_pump->tipo_di_pdc === 'Aria/Acqua' ? 'selected' : ''}} value="Aria/Acqua">Aria/Acqua</option>
                                            <option {{ $absorption_heat_pump->tipo_di_pdc === 'Salamoia/Aria' ? 'selected' : ''}} value="Salamoia/Aria">Salamoia/Aria</option>
                                            <option {{ $absorption_heat_pump->tipo_di_pdc === 'Salamoia/Acqua' ? 'selected' : ''}} value="Salamoia/Acqua">Salamoia/Acqua</option>
                                            <option {{ $absorption_heat_pump->tipo_di_pdc === 'Acqua/Aria' ? 'selected' : ''}} value="Acqua/Aria">Acqua/Aria</option>
                                            <option {{ $absorption_heat_pump->tipo_di_pdc === 'Acqua/Acqua' ? 'selected' : ''}} value="Acqua/Acqua">Acqua/Acqua</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][tipo_roof_top]" class="checkbox-wrapper d-flex">
                                        <input type="checkbox" {{ $absorption_heat_pump->tipo_roof_top ? 'checked' : '' }} name="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][tipo_roof_top]" id="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][tipo_roof_top]" value="true">
                                        <span class="checkmark"></span>
                                        Tipo Roof Top
                                    </label>
                                    <label for="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][potenza_nominale]">
                                        Potenza Nominale
                                        <input class="input_small" type="number" name="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][potenza_nominale]" id="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][potenza_nominale]" value="{{ $absorption_heat_pump->potenza_nominale }}">
                                        kW
                                    </label>
                                    <label for="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][gueh]">
                                        GUEh
                                        <input class="input_small" type="number" name="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][gueh]" id="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][gueh]" value="{{ $absorption_heat_pump->gueh }}">
                                    </label>
                                    <label for="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][reversibile]" class="checkbox-wrapper d-flex">
                                        <input type="checkbox" {{ $absorption_heat_pump->reversibile ? 'checked' : '' }} name="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][reversibile]" id="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][reversibile]" value="true">
                                        <span class="checkmark"></span>
                                        E' reversibile
                                    </label>
                                    <label for="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][guec]">
                                        GUEc
                                        <input class="input_small" type="number" name="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][guec]" id="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][guec]" value="{{ $absorption_heat_pump->guec }}">
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="row_input">
                                        <label for="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][sup_riscaldata_dalla_pdc]">
                                            Sup. riscaldata dalla PDC
                                            <input class="input_small" type="number" name="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][sup_riscaldata_dalla_pdc]" id="absorption_heat_pumps[{{$practice->id}}-{{$absorption_heat_pump->id}}][sup_riscaldata_dalla_pdc]" value="{{ $absorption_heat_pump->sup_riscaldata_dalla_pdc }}">
                                            m²
                                        </label>
                                    </div>
                                    <div onclick="deleteAbsorptionHeatPump({{$practice->id}}, {{$absorption_heat_pump->id}})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                        <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                        <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p id="absorption_heat_pumps_no_data_row">Nessun dato</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="mt-5">{{-- SI. Sistemi ibridi --}}
                <div class="d-flex align-items-center mb-3">
                    <label for="hybrid_system" class="checkbox-wrapper d-flex align-items-center mb-0">
                        <input {{$vertwall->hybrid_system == 'true' ? 'checked' : ''}} type="checkbox" name="hybrid_system" id="hybrid_system" value="true">
                        <span class="checkmark"></span>
                        <span class="black" ><b>SI. Sistemi ibridi</b></span>
                    </label>
                    <div class="btn bg-blue white ml-3 mr-3" onclick="addHybridSystem(event)">+</div>
                    <span><strong>(n. {{ $hybrid_systems->count() }} Sistemi ibridi)</strong></span>
                </div>
                <div class="px-20 pt-20 pb-20" style="width: 80%; min-height: 160px; background-color: #f2f2f2 ">
                    <div id="hybrid_system_wrapper">
                        @forelse($hybrid_systems as $i => $hybrid_system)
                            <div class="box_input" data-id="hybrid_system-{{$practice->id}}-{{$hybrid_system->id}}">
                                {{ $i + 1 }}
                                <div class="row_input">
                                    <input type="hidden" name="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][condomino_id]" id="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][condomino_id]" value="">
                                    <label for="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][tipo_sostituito]">
                                        Tipo sostituito
                                        <select name="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][tipo_sostituito]" id="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][tipo_sostituito]">
                                            <option {{ $hybrid_system->tipo_sostituito === 'Caldaia standard' ? 'selected' : ''}} value="Caldaia standard">Caldaia standard</option>
                                            <option {{ $hybrid_system->tipo_sostituito === 'Caldaia a bassa temperatura' ? 'selected' : ''}} value="Caldaia a bassa temperatura">Caldaia a bassa temperatura</option>
                                            <option {{ $hybrid_system->tipo_sostituito === 'Caldaia a condensazione a gas' ? 'selected' : ''}} value="Caldaia a condensazione a gas">Caldaia a condensazione a gas</option>
                                            <option {{ $hybrid_system->tipo_sostituito === 'Caldaia a condesazione a gasolio' ? 'selected' : ''}} value="Caldaia a condesazione a gasolio">Caldaia a condesazione a gasolio</option>
                                            <option {{ $hybrid_system->tipo_sostituito === 'Pompa di calore anche con sonda geotermica' ? 'selected' : ''}} value="Pompa di calore anche con sonda geotermica">Pompa di calore anche con sonda geotermica</option>
                                            <option {{ $hybrid_system->tipo_sostituito === 'Generatori di aria calda' ? 'selected' : ''}} value="Generatori di aria calda">Generatori di aria calda</option>
                                            <option {{ $hybrid_system->tipo_sostituito === 'Teleriscaldamento' ? 'selected' : ''}} value="Teleriscaldamento">Teleriscaldamento</option>
                                            <option {{ $hybrid_system->tipo_sostituito === 'Impianto a biomassa' ? 'selected' : ''}} value="Impianto a biomassa">Impianto a biomassa</option>
                                            <option {{ $hybrid_system->tipo_sostituito === 'Altro' ? 'selected' : ''}} value="Altro">Altro</option>
                                        </select>
                                    </label>
                                    <label for="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][p_nom_sostituito]">
                                        P. nom. sostituito
                                        <input class="input_small" type="number" name="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][p_nom_sostituito]" id="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][p_nom_sostituito]" value="{{ $hybrid_system->p_nom_sostituito }}">
                                        kW
                                    </label>
                                </div>
                                <div class="row_input">
                                    <h6>Caldaia a condensazione:</h6>
                                    <label for="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][condensing_potenza_nominale]">
                                        P. nom.
                                        <input class="input_small" type="number" name="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][condensing_potenza_nominale]" id="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][condensing_potenza_nominale]" value="{{ $hybrid_system->condensing_potenza_nominale }}">
                                        kW
                                    </label>
                                    <label for="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][condensing_rend_utile_nom]">
                                        Rend. utile nom. (100%)
                                        <input class="input_small" type="number" name="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][condensing_rend_utile_nom]" id="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][condensing_rend_utile_nom]" value="{{ $hybrid_system->condensing_rend_utile_nom }}">
                                        %
                                    </label>
                                    <label for="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][condensing_efficienza_ns]">
                                        Efficienza ns
                                        <input class="input_small" type="number" name="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][condensing_efficienza_ns]" id="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][condensing_efficienza_ns]" value="{{ $hybrid_system->condensing_efficienza_ns }}">
                                        %
                                    </label>
                                    <label for="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][tipo_di_alimentazione]">
                                        Tipo di alim.
                                        <select name="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][tipo_di_alimentazione]" id="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][tipo_di_alimentazione]">
                                            <option {{ $hybrid_system->tipo_di_alimentazione === 'Metano' ? 'selected' : '' }} value="Metano">Gas Naturale (metano)</option>
                                            <option {{ $hybrid_system->tipo_di_alimentazione === 'Gpl' ? 'selected' : '' }} value="Gpl">Gpl</option>
                                            <option {{ $hybrid_system->tipo_di_alimentazione === 'Gasolio' ? 'selected' : '' }} value="Gasolio">Gasolio</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="row_input">
                                    <h6>Pompa di calore (PDC):</h6>
                                    <label for="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][heat_tipo_di_pdc]">
                                        Tipo di PDC
                                        <select name="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][heat_tipo_di_pdc]" id="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][heat_tipo_di_pdc]">
                                            <option {{ $hybrid_system->heat_tipo_di_pdc === 'Aria/Aria' ? 'selected' : '' }} value="Aria/Aria">Aria/Aria</option>
                                            <option {{ $hybrid_system->heat_tipo_di_pdc === 'Aria/Acqua' ? 'selected' : '' }} value="Aria/Acqua">Aria/Acqua</option>
                                            <option {{ $hybrid_system->heat_tipo_di_pdc === 'Salamoia/Aria' ? 'selected' : '' }} value="Salamoia/Aria">Salamoia/Aria</option>
                                            <option {{ $hybrid_system->heat_tipo_di_pdc === 'Salamoia/Acqua' ? 'selected' : '' }} value="Salamoia/Acqua">Salamoia/Acqua</option>
                                            <option {{ $hybrid_system->heat_tipo_di_pdc === 'Acqua/Aria' ? 'selected' : '' }} value="Acqua/Aria">Acqua/Aria</option>
                                            <option {{ $hybrid_system->heat_tipo_di_pdc === 'Acqua/Acqua' ? 'selected' : '' }} value="Acqua/Acqua">Acqua/Acqua</option>
                                        </select>
                                    </label>
                                    <label for="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][heat_tipo_roof_top]" class="checkbox-wrapper d-flex">
                                        <input type="checkbox" {{ $hybrid_system->heat_tipo_roof_top ? 'checked' : '' }} name="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][heat_tipo_roof_top]" id="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][heat_tipo_roof_top]" value="true">
                                        <span class="checkmark"></span>
                                        Tipo Roof Top
                                    </label>
                                    <label for="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][heat_potenza_nominale]">
                                        P. nom.
                                        <input class="input_small" type="number" name="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][heat_potenza_nominale]" id="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][heat_potenza_nominale]" value="{{ $hybrid_system->heat_potenza_nominale }}">
                                        kW
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="row_input">
                                        <label for="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][heat_p_elettrica_assorbita]">
                                            P. Elettrica assorbita
                                            <input class="input_small" type="number" name="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][heat_p_elettrica_assorbita]" id="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][heat_p_elettrica_assorbita]" value="{{ $hybrid_system->heat_p_elettrica_assorbita }}">
                                            kW
                                        </label>
                                        <label for="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][heat_inverter]" class="checkbox-wrapper d-flex">
                                            <input type="checkbox" {{ $hybrid_system->heat_inverter ? 'checked' : '' }} name="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][heat_inverter]" id="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][heat_inverter]" value="true">
                                            <span class="checkmark"></span>
                                            inverter
                                        </label>
                                        <label for="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][heat_cop]">
                                            COP
                                            <input class="input_small" type="number" name="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][heat_cop]" id="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][heat_cop]" value="{{ $hybrid_system->heat_cop }}">
                                        </label>
                                        <label for="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][heat_sonde_geotermiche]" class="checkbox-wrapper d-flex">
                                            <input type="checkbox" {{ $hybrid_system->heat_sonde_geotermiche ? 'checked' : '' }} name="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][heat_sonde_geotermiche]" id="hybrid_systems[{{$practice->id}}-{{$hybrid_system->id}}][heat_sonde_geotermiche]" value="true">
                                            <span class="checkmark"></span>
                                            Sonde geotermiche
                                        </label>
                                    </div>
                                    <div onclick="deleteHybridSystem({{$practice->id}}, {{$hybrid_system->id}})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                        <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                        <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p id="hybrid_systems_no_data_row">Nessun dato</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="mt-5">{{-- CO. Sistemi di microgenerazione --}}
                <div class="d-flex align-items-center mb-3">
                    <label class="checkbox-wrapper d-flex align-items-center mb-0">
                        <input {{$vertwall->microgeneration_system == 'true' ? 'checked' : ''}} type="checkbox" name="microgeneration_system" id="microgeneration_system" value="true">
                        <span class="checkmark"></span>
                        <span class="black" ><b>CO. Sistemi di microgenerazione</b></span>
                    </label>
                    <div class="btn bg-blue white ml-3 mr-3" onclick="addMicrogenerationSystem(event)">+</div>
                    <span><strong>(n. {{ $microgeneration_systems->count() }} Sistemi di microgenerazione)</strong></span>
                </div>
                <div class="px-20 pt-20 pb-20" style="width: 80%; min-height: 160px; background-color: #f2f2f2 ">
                    <div id="microgeneration_system_wrapper">
                        @forelse($microgeneration_systems as $i => $microgeneration_system)
                            <div class="box_input" data-id="microgeneration_system-{{$practice->id}}-{{$microgeneration_system->id}}">
                                {{ $i + 1 }}
                                <div class="row_input">
                                    <input type="hidden" name="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][condomino_id]" id="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][condomino_id]" value="">
                                    <label for="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][tipo_sostituito]">
                                        Tipo sostituito
                                        <select name="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][tipo_sostituito]" id="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][tipo_sostituito]">
                                            <option {{ $microgeneration_system->tipo_sostituito === 'Caldaia standard' ? 'selected' : ''}} value="Caldaia standard">Caldaia standard</option>
                                            <option {{ $microgeneration_system->tipo_sostituito === 'Caldaia a bassa temperatura' ? 'selected' : ''}} value="Caldaia a bassa temperatura">Caldaia a bassa temperatura</option>
                                            <option {{ $microgeneration_system->tipo_sostituito === 'Caldaia a condensazione a gas' ? 'selected' : ''}} value="Caldaia a condensazione a gas">Caldaia a condensazione a gas</option>
                                            <option {{ $microgeneration_system->tipo_sostituito === 'Caldaia a condesazione a gasolio' ? 'selected' : ''}} value="Caldaia a condesazione a gasolio">Caldaia a condesazione a gasolio</option>
                                            <option {{ $microgeneration_system->tipo_sostituito === 'Pompa di calore anche con sonda geotermica' ? 'selected' : ''}} value="Pompa di calore anche con sonda geotermica">Pompa di calore anche con sonda geotermica</option>
                                            <option {{ $microgeneration_system->tipo_sostituito === 'Generatori di aria calda' ? 'selected' : ''}} value="Generatori di aria calda">Generatori di aria calda</option>
                                            <option {{ $microgeneration_system->tipo_sostituito === 'Teleriscaldamento' ? 'selected' : ''}} value="Teleriscaldamento">Teleriscaldamento</option>
                                            <option {{ $microgeneration_system->tipo_sostituito === 'Impianto a biomassa' ? 'selected' : ''}} value="Impianto a biomassa">Impianto a biomassa</option>
                                            <option {{ $microgeneration_system->tipo_sostituito === 'Altro' ? 'selected' : ''}} value="Altro">Altro</option>
                                        </select>
                                    </label>
                                    <label for="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][p_nom_sostituito]">
                                        P. nom. sostituito
                                        <input class="input_small" type="number" name="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][p_nom_sostituito]" id="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][p_nom_sostituito]" value="{{ $microgeneration_system->p_nom_sostituito }}">
                                        kW
                                    </label>
                                    <label for="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][p_elettrica]">
                                        P. Elettrica
                                        <input class="input_small" type="number" name="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][p_elettrica]" id="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][p_elettrica]" value="{{ $microgeneration_system->p_elettrica }}">
                                        kW
                                    </label>
                                    <label for="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][p_immessa]">
                                        P. immessa
                                        <input class="input_small" type="number" name="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][p_immessa]" id="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][p_immessa]" value="{{ $microgeneration_system->p_immessa }}">
                                        kW
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][p_term_recuperata]">
                                        P. term. recuperata
                                        <input class="input_small" type="number" name="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][p_term_recuperata]" id="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][p_term_recuperata]" value="{{ $microgeneration_system->p_term_recuperata }}">
                                        kW
                                    </label>
                                    <label for="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][pes]">
                                        PES
                                        <input class="input_small" type="number" name="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][pes]" id="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][pes]" value="{{ $microgeneration_system->pes }}">
                                        %
                                    </label>
                                    <label for="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][tipo_di_alimentazione]">
                                        Tipo di alim.
                                        <select name="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][tipo_di_alimentazione]" id="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][tipo_di_alimentazione]">
                                            <option {{ $microgeneration_system->tipo_di_alimentazione === 'Metano' ? 'selected' : '' }} value="Metano">Gas Naturale (metano)</option>
                                            <option {{ $microgeneration_system->tipo_di_alimentazione === 'Gpl' ? 'selected' : '' }} value="Gpl">Gpl</option>
                                            <option {{ $microgeneration_system->tipo_di_alimentazione === 'Gasolio' ? 'selected' : '' }} value="Gasolio">Gasolio</option>
                                        </select>
                                    </label>
                                    <label for="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][tipo_intervento]">
                                        Tipo intervento
                                        <select name="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][tipo_intervento]" id="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][tipo_intervento]">
                                            <option {{ $microgeneration_system->tipo_intervento === 'Nuovo' ? 'selected' : '' }} value="Nuovo">Nuova unità</option>
                                            <option {{ $microgeneration_system->tipo_intervento === 'Rifacimento' ? 'selected' : '' }} value="Rifacimento">Rifacimento</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="row_input">
                                        <label for="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][a_celle_a_combustibile]" class="checkbox-wrapper d-flex">
                                            <input type="checkbox" {{ $microgeneration_system->a_celle_a_combustibile ? 'checked' : '' }} name="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][a_celle_a_combustibile]" id="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][a_celle_a_combustibile]" value="true">
                                            <span class="checkmark"></span>
                                            a Celle a Combustibile
                                        </label>
                                        <label for="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][riscaldatore_suppl]" class="checkbox-wrapper d-flex">
                                            <input type="checkbox" {{ $microgeneration_system->riscaldatore_suppl ? 'checked' : '' }} name="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][riscaldatore_suppl]" id="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][riscaldatore_suppl]" value="true">
                                            <span class="checkmark"></span>
                                            Riscaldatore suppl.
                                        </label>
                                        <label for="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][potenza_risc_suppl]">
                                            Potenza risc. suppl.
                                            <input class="input_small" type="number" name="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][potenza_risc_suppl]" id="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][potenza_risc_suppl]" value="{{ $microgeneration_system->potenza_risc_suppl }}">
                                            kW
                                        </label>
                                        <label for="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][efficienza_ns]">
                                            Efficienza ns
                                            <input class="input_small" type="number" name="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][efficienza_ns]" id="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][efficienza_ns]" value="{{ $microgeneration_system->efficienza_ns }}">
                                            %
                                        </label>
                                        <label for="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][classe_energ]">
                                            Classe energ.
                                            <select name="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][classe_energ]" id="microgeneration_systems[{{$practice->id}}-{{$microgeneration_system->id}}][classe_energ]">
                                                <option {{ $microgeneration_system->classe_energ === 'B' ? 'selected' : '' }} value="B">B</option>
                                                <option {{ $microgeneration_system->classe_energ === 'A' ? 'selected' : '' }} value="A">A</option>
                                                <option {{ $microgeneration_system->classe_energ === 'A+' ? 'selected' : '' }} value="A+">A+</option>
                                                <option {{ $microgeneration_system->classe_energ === 'A++' ? 'selected' : '' }} value="A++">A++</option>
                                                <option {{ $microgeneration_system->classe_energ === 'A+++' ? 'selected' : '' }} value="A+++">A+++</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div onclick="deleteMicrogenerationSystem({{$practice->id}}, {{$microgeneration_system->id}})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                        <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                        <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p id="microgeneration_systems_no_data_row">Nessun dato</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="mt-5">{{--SA. Installazione di scaldacqua a pompa di calore  --}}
                <div class="d-flex align-items-center mb-3">
                    <label class="checkbox-wrapper d-flex align-items-center mb-0">
                        <input {{$vertwall->water_heatpumps_installation == 'true' ? 'checked' : ''}} type="checkbox" name="water_heatpumps_installation" id="water_heatpumps_installation" value="true">
                        <span class="checkmark"></span>
                        <span class="black" ><b>SA. Installazione di scaldacqua a pompa di calore</b></span>
                    </label>
                    <div class="btn bg-blue white ml-3 mr-3" onclick="addWaterHeatpumpsInstallation(event)">+</div>
                    <span><strong>(n. {{ $water_heatpumps_installations->count() }} Installazione di scaldacqua a pompa di calore)</strong></span>
                </div>
                <p style="width: 70%;">In sostituzione di un sistema di produzione di acqua calda quando avviene con lo stesso generatore di calore destinato alla climatizzazione invernale ai sensi delle lettre b) e c) del comma 1 dell’articolo 119 del Decreto Rilancio</p>
                <div class="px-20 pt-20 pb-20" style="width: 80%; min-height: 160px; background-color: #f2f2f2 ">
                    <div id="water_heatpumps_installation_wrapper">
                        @forelse($water_heatpumps_installations as $i => $water_heatpumps_installation)
                            <div class="box_input" data-id="water_heatpumps_installation-{{$practice->id}}-{{$water_heatpumps_installation->id}}">
                                {{ $i + 1 }}
                                <div class="row_input">
                                    <input type="hidden" name="water_heatpumps_installations[{{$practice->id}}-{{$water_heatpumps_installation->id}}][condomino_id]" id="water_heatpumps_installations[{{$practice->id}}-{{$water_heatpumps_installation->id}}][condomino_id]" value="">
                                    <label for="water_heatpumps_installations[{{$practice->id}}-{{$water_heatpumps_installation->id}}][tipo_scaldacqua_sostituito]">
                                        Tipo scaldaacqua sostituito
                                        <select name="water_heatpumps_installations[{{$practice->id}}-{{$water_heatpumps_installation->id}}][tipo_scaldacqua_sostituito]" id="water_heatpumps_installations[{{$practice->id}}-{{$water_heatpumps_installation->id}}][tipo_scaldacqua_sostituito]">
                                            <option {{ $water_heatpumps_installation->tipo_scaldacqua_sostituito === 'Boiler elettrico' ? 'selected' : '' }} value="Boiler elettrico">Boiler elettrico</option>
                                            <option {{ $water_heatpumps_installation->tipo_scaldacqua_sostituito === 'Gas/Gasolio' ? 'selected' : '' }} value="Gas/Gasolio">Gas/Gasolio</option>
                                            <option {{ $water_heatpumps_installation->tipo_scaldacqua_sostituito === 'Altro' ? 'selected' : '' }} value="Altro">Altro</option>
                                        </select>
                                    </label>
                                    <label for="water_heatpumps_installations[{{$practice->id}}-{{$water_heatpumps_installation->id}}][pu_scaldacqua_sostituito]">
                                        Pu scaldacqua sostituito
                                        <input class="input_small" type="number" name="water_heatpumps_installations[{{$practice->id}}-{{$water_heatpumps_installation->id}}][pu_scaldacqua_sostituito]" id="water_heatpumps_installations[{{$practice->id}}-{{$water_heatpumps_installation->id}}][pu_scaldacqua_sostituito]" value="{{ $water_heatpumps_installation->pu_scaldacqua_sostituito }}">
                                        kW
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="row_input">
                                        <label for="water_heatpumps_installations[{{$practice->id}}-{{$water_heatpumps_installation->id}}][pu_scaldacqua_a_pdc]">
                                            Pu scaldacqua a PDC
                                            <input class="input_small" type="number" name="water_heatpumps_installations[{{$practice->id}}-{{$water_heatpumps_installation->id}}][pu_scaldacqua_a_pdc]" id="water_heatpumps_installations[{{$practice->id}}-{{$water_heatpumps_installation->id}}][pu_scaldacqua_a_pdc]" value="{{ $water_heatpumps_installation->pu_scaldacqua_a_pdc }}">
                                            kW
                                        </label>
                                        <label for="water_heatpumps_installations[{{$practice->id}}-{{$water_heatpumps_installation->id}}][cop_nuovo_scaldacqua]">
                                            COP del nuovo scaldacqua
                                            <input class="input_small" type="number" name="water_heatpumps_installations[{{$practice->id}}-{{$water_heatpumps_installation->id}}][cop_nuovo_scaldacqua]" id="water_heatpumps_installations[{{$practice->id}}-{{$water_heatpumps_installation->id}}][cop_nuovo_scaldacqua]" value="{{ $water_heatpumps_installation->cop_nuovo_scaldacqua }}">
                                        </label>
                                        <label for="water_heatpumps_installations[{{$practice->id}}-{{$water_heatpumps_installation->id}}][capacita_accumulo]">
                                            Capacità accumulo
                                            <input class="input_small" type="number" name="water_heatpumps_installations[{{$practice->id}}-{{$water_heatpumps_installation->id}}][capacita_accumulo]" id="water_heatpumps_installations[{{$practice->id}}-{{$water_heatpumps_installation->id}}][capacita_accumulo]" value="{{ $water_heatpumps_installation->capacita_accumulo }}">
                                            L
                                        </label>
                                    </div>
                                    <div onclick="deleteWaterHeatpumpsInstallation({{$practice->id}}, {{$water_heatpumps_installation->id}})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                        <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                        <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p id="water_heatpumps_installations_no_data_row">Nessun dato</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div>{{-- IB. Generatori a biomamassa --}}
                <div class="mt-5">
                    <div class="d-flex align-items-center mb-3">
                        <label for="biome_generator" class="checkbox-wrapper d-flex align-items-center mb-0">
                            <input type="checkbox" name="biome_generator" id="biome_generator" value="true" {{$vertwall->biome_generator == 'true' ? 'checked' : ''}}>
                            <span class="checkmark"></span>
                            <span class="black" ><b>IB. Generatori a biomamassa</b></span>
                        </label>
                        <div class="btn bg-blue white ml-3 mr-3" onclick="addBiomeGenerator(event)">+</div>
                        <span><strong>(n. {{ $biome_generators->count() }} Generatori a biomamassa)</strong></span>
                    </div>
                    <p class="font-italic">Installazione di impianti di climatizzazione invernale dotati di generatori di calore alimentati da biomasse combustibili</p>
                    <div class="px-20 pt-20 pb-20" style="width: 80%; min-height: 160px; background-color: #f2f2f2 ">
                        <div id="biome_generator_wrapper">
                            @forelse($biome_generators as $i => $biome_generator)
                                <div class="box_input" data-id="biome_generator-{{$practice->id}}-{{$biome_generator->id}}">
                                    {{ $i + 1 }}
                                    <div class="row_input">
                                        <input type="hidden" name="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][condomino_id]" id="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][condomino_id]" value="">
                                        <label for="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][tipo_sostituito]">
                                            Tipo sostituito
                                            <select name="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][tipo_sostituito]" id="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][tipo_sostituito]">
                                                <option {{ $biome_generator->tipo_sostituito === 'Caldaia standard' ? 'selected' : ''}} value="Caldaia standard">Caldaia standard</option>
                                                <option {{ $biome_generator->tipo_sostituito === 'Caldaia a bassa temperatura' ? 'selected' : ''}} value="Caldaia a bassa temperatura">Caldaia a bassa temperatura</option>
                                                <option {{ $biome_generator->tipo_sostituito === 'Caldaia a condensazione a gas' ? 'selected' : ''}} value="Caldaia a condensazione a gas">Caldaia a condensazione a gas</option>
                                                <option {{ $biome_generator->tipo_sostituito === 'Caldaia a condesazione a gasolio' ? 'selected' : ''}} value="Caldaia a condesazione a gasolio">Caldaia a condesazione a gasolio</option>
                                                <option {{ $biome_generator->tipo_sostituito === 'Pompa di calore anche con sonda geotermica' ? 'selected' : ''}} value="Pompa di calore anche con sonda geotermica">Pompa di calore anche con sonda geotermica</option>
                                                <option {{ $biome_generator->tipo_sostituito === 'Generatori di aria calda' ? 'selected' : ''}} value="Generatori di aria calda">Generatori di aria calda</option>
                                                <option {{ $biome_generator->tipo_sostituito === 'Teleriscaldamento' ? 'selected' : ''}} value="Teleriscaldamento">Teleriscaldamento</option>
                                                <option {{ $biome_generator->tipo_sostituito === 'Impianto a biomassa' ? 'selected' : ''}} value="Impianto a biomassa">Impianto a biomassa</option>
                                                <option {{ $biome_generator->tipo_sostituito === 'Altro' ? 'selected' : ''}} value="Altro">Altro</option>
                                            </select>
                                        </label>
                                        <label for="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][p_nom_sostituito]">
                                            P. nom. sostituito
                                            <input class="input_small" type="number" name="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][p_nom_sostituito]" id="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][p_nom_sostituito]" value="{{ $biome_generator->p_nom_sostituito }}">
                                            kW
                                        </label>
                                        <label for="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][classe_generatore]">
                                            Classe generatore
                                            <select name="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][classe_generatore]" id="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][classe_generatore]">
                                                <option {{ $biome_generator->classe_generatore === '4 stelle' ? 'selected' : ''}} value="4 stelle">4 stelle</option>
                                                <option {{ $biome_generator->classe_generatore === '5 stelle' ? 'selected' : ''}} value="5 stelle">5 stelle</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="row_input">
                                        <label for="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][tipo_generatore]">
                                            Tipo generatore
                                            <select name="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][tipo_generatore]" id="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][tipo_generatore]">
                                                <option {{ $biome_generator->tipo_generatore === 'Caldaia a biomassa' ? 'selected' : ''}} value="Caldaia a biomassa">Caldaia a biomassa</option>
                                                <option {{ $biome_generator->tipo_generatore === 'Termocamini e stufe' ? 'selected' : ''}} value="Termocamini e stufe">Termocamini e stufe</option>
                                            </select>
                                        </label>
                                        <label for="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][use_destination]">
                                            Impianto destinato a
                                            <select name="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][use_destination]" id="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][use_destination]">
                                                <option {{ $biome_generator->use_destination === 'Riscaldamento ambiente' ? 'selected' : ''}} value="Riscaldamento ambiente">Riscaldamento ambiente</option>
                                                <option {{ $biome_generator->use_destination === 'Risc. amb. + prod. ACS' ? 'selected' : ''}} value="Risc. amb. + prod. ACS">Risc. amb. + prod. ACS</option>
                                            </select>
                                        </label>
                                        <label for="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][tipo_di_alimentazione]">
                                            Tipo di alimentazione
                                            <select name="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][tipo_di_alimentazione]" id="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][tipo_di_alimentazione]">
                                                <option {{ $biome_generator->tipo_di_alimentazione === 'Legna' ? 'selected' : ''}} value="Legna">Legna</option>
                                                <option {{ $biome_generator->tipo_di_alimentazione === 'Pellet' ? 'selected' : ''}} value="Pellet">Pellet</option>
                                                <option {{ $biome_generator->tipo_di_alimentazione === 'Cippato' ? 'selected' : ''}} value="Cippato">Cippato</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="row_input">
                                            <label for="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][p_utile_nom]">
                                                Pot. Utile nom.
                                                <input class="input_small" type="number" name="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][p_utile_nom]" id="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][p_utile_nom]" value="{{ $biome_generator->p_utile_nom }}">
                                                kW
                                            </label>
                                            <label for="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][p_al_focolare]">
                                                P. al focolare
                                                <input class="input_small" type="number" name="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][p_al_focolare]" id="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][p_al_focolare]" value="{{ $biome_generator->p_al_focolare }}">
                                                kW
                                            </label>
                                            <label for="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][rend_utile_alla_pot_nom]">
                                                Rend. utile alla pot. nom.
                                                <input class="input_small" type="number" name="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][rend_utile_alla_pot_nom]" id="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][rend_utile_alla_pot_nom]" value="{{ $biome_generator->rend_utile_alla_pot_nom }}">
                                                %
                                            </label>
                                            <label for="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][sup_riscaldata]">
                                                Sup. riscaldata
                                                <input class="input_small" type="number" name="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][sup_riscaldata]" id="biome_generators[{{$practice->id}}-{{$biome_generator->id}}][sup_riscaldata]" value="{{ $biome_generator->sup_riscaldata }}">
                                                m²
                                            </label>
                                        </div>
                                        <div onclick="deleteBiomeGenerator({{$practice->id}}, {{$biome_generator->id}})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                            <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                            <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p id="biome_generators_no_data_row">Nessun dato</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">{{-- Collettori solari --}}
                <div class="d-flex align-items-center mb-3">
                    <label class="checkbox-wrapper d-flex align-items-center mb-0">
                        <input {{$vertwall->solar_panel == 'true' ? 'checked' : ''}} type="checkbox" name="solar_panel" id="solar_panel" value="true">
                        <span class="checkmark"></span>
                        <span class="black" ><b>Collettori solari</b></span>
                    </label>
                    <div class="btn bg-blue white ml-3 mr-3" onclick="addSolarPanel(event)">+</div>
                    <span><strong>(n. {{ $solar_panels->count() }} Collettori solari)</strong></span>
                </div>
                <div class="px-20 pt-20 pb-20" style="width: 80%; min-height: 160px; background-color: #f2f2f2 ">
                    <div id="solar_panel_wrapper">
                        @forelse($solar_panels as $i => $solar_panel)
                            <div class="box_input"  data-id="solar_panel-{{$practice->id}}-{{$solar_panel->id}}">
                                {{ $i + 1 }}
                                <div class="row_input">
                                    <input type="hidden" name="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][condomino_id]" id="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][condomino_id]" value="">
                                    <label for="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][sup_lorda_singolo_modulo]">
                                        Superfice lorda Ag di un singolo modulo
                                        <input class="input_small" type="number" name="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][sup_lorda_singolo_modulo]" id="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][sup_lorda_singolo_modulo]" value="{{ $solar_panel->sup_lorda_singolo_modulo }}">
                                        m²
                                    </label>
                                    <label for="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][num_moduli]">
                                        N° di moduli
                                        <input class="input_small" type="number" name="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][num_moduli]" id="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][num_moduli]" value="{{ $solar_panel->num_moduli }}">
                                    </label>
                                    <label for="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][sup_totale]">
                                        Sup. Totale
                                        <input class="input_small" type="number" name="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][sup_totale]" id="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][sup_totale]" value="{{ $solar_panel->sup_totale }}">
                                        m²
                                    </label>
                                    <label for="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][certificazione_solar_keymark]" class="checkbox-wrapper d-flex">
                                        <input type="checkbox" {{ $solar_panel->certificazione_solar_keymark ? 'checked' : '' }} name="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][certificazione_solar_keymark]" id="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][certificazione_solar_keymark]" value="true">
                                        <span class="checkmark"></span>
                                        Certificazione solar Keymark
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][tipo_di_collettori]">
                                        Tipo di collettori
                                        <select name="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][tipo_di_collettori]" id="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][tipo_di_collettori]">
                                            <option {{ $solar_panel->tipo_di_collettori === 'Piani vetrati' ? 'selected' : '' }} value="Piani vetrati">Piani vetrati</option>
                                            <option {{ $solar_panel->tipo_di_collettori === 'Sotto vuoto o tubi evacuati' ? 'selected' : '' }} value="Sotto vuoto o tubi evacuati">Sotto vuoto o tubi evacuati</option>
                                            <option {{ $solar_panel->tipo_di_collettori === 'A concentrazione' ? 'selected' : '' }} value="A concentrazione">A concentrazione</option>
                                            <option {{ $solar_panel->tipo_di_collettori === 'Scoperti' ? 'selected' : '' }} value="Scoperti">Scoperti</option>
                                        </select>
                                    </label>
                                    <label for="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][tipo_di_installazione]">
                                        Tipo di installazione
                                        <select name="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][tipo_di_installazione]" id="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][tipo_di_installazione]">
                                            <option {{ $solar_panel->tipo_di_installazione === 'Tetto piano' ? 'selected' : '' }} value="Tetto piano">Tetto piano</option>
                                            <option {{ $solar_panel->tipo_di_installazione === 'Tetto a falda' ? 'selected' : '' }} value="Tetto a falda">Tetto a falda</option>
                                            <option {{ $solar_panel->tipo_di_installazione === 'Altro' ? 'selected' : '' }} value="Altro">Altro</option>
                                        </select>
                                    </label>
                                    <label for="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][inclinazione]">
                                        inclinazione
                                        <input class="input_small" type="number" name="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][inclinazione]" id="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][inclinazione]" value="{{ $solar_panel->inclinazione }}">
                                        %
                                    </label>
                                    <label for="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][orientamento]">
                                        Orientamento
                                        <select name="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][orientamento]" id="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][orientamento]">
                                            <option {{ $solar_panel->orientamento === 'Nord' ? 'selected' : '' }} value="Nord">Nord</option>
                                            <option {{ $solar_panel->orientamento === 'Nord-Est' ? 'selected' : '' }} value="Nord-Est">Nord-Est</option>
                                            <option {{ $solar_panel->orientamento === 'Est' ? 'selected' : '' }} value="Est">Est</option>
                                            <option {{ $solar_panel->orientamento === 'Sud-Est' ? 'selected' : '' }} value="Sud-Est">Sud-Est</option>
                                            <option {{ $solar_panel->orientamento === 'Sud' ? 'selected' : '' }} value="Sud">Sud</option>
                                            <option {{ $solar_panel->orientamento === 'Sud-Ovest' ? 'selected' : '' }} value="Sud-Ovest">Sud-Ovest</option>
                                            <option {{ $solar_panel->orientamento === 'Ovest' ? 'selected' : '' }} value="Ovest">Ovest</option>
                                            <option {{ $solar_panel->orientamento === 'Nord-Ovest' ? 'selected' : '' }} value="Nord-Ovest">Nord-Ovest</option>
                                            <option {{ $solar_panel->orientamento === 'P-orizzontale' ? 'selected' : '' }} value="P-orizzontale">P-orizzontale</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][impianto_factory_made]">
                                        Impianto factory made
                                        <input type="radio" {{ $solar_panel->impianto_factory_made === 'N.D' ? 'checked' : '' }} name="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][impianto_factory_made]" id="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][impianto_factory_made]" value="N.D">
                                        N.D
                                    </label>
                                    <label for="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][impianto_factory_made]">
                                        <input type="radio" {{ $solar_panel->impianto_factory_made === 'No' ? 'checked' : '' }} name="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][impianto_factory_made]" id="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][impianto_factory_made]" value="No">
                                        No
                                    </label>
                                    <label for="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][impianto_factory_made]">
                                        <input type="radio" {{ $solar_panel->impianto_factory_made === 'Si' ? 'checked' : '' }} name="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][impianto_factory_made]" id="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][impianto_factory_made]" value="Si">
                                        Si
                                    </label>
                                    <label for="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][q_col_q_sol]">
                                        Q col/Q sol
                                        <input class="input_small" type="number" name="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][q_col_q_sol]" id="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][q_col_q_sol]" value="{{ $solar_panel->q_col_q_sol }}">
                                        kWht
                                    </label>
                                    <label for="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][ql]">
                                        QL
                                        <input class="input_small" type="number" name="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][ql]" id="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][ql]" value="{{ $solar_panel->ql }}">
                                        MJ
                                    </label>
                                    <label for="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][accumulo_in_litri]">
                                        Accumulo in litri
                                        <input class="input_small" type="number" name="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][accumulo_in_litri]" id="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][accumulo_in_litri]" value="{{ $solar_panel->accumulo_in_litri }}">
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="row_input">
                                        <label for="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][destinazione_calore]">
                                            Destinazione del calore
                                            <select name="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][destinazione_calore]" id="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][destinazione_calore]">
                                                <option {{ $solar_panel->destinazione_calore === 'Acqua sanitaria' ? 'selected' : '' }} value="Acqua sanitaria">Produzione di acqua calda sanitaria</option>
                                                <option {{ $solar_panel->destinazione_calore === 'Produzione di ACS e riscaldamento ambiente' ? 'selected' : '' }} value="Produzione di ACS e riscaldamento ambiente">Produzione di ACS e riscaldamento ambiente</option>
                                                <option {{ $solar_panel->destinazione_calore === 'Produzione di calore di processo' ? 'selected' : '' }} value="Produzione di calore di processo">Produzione di calore di processo</option>
                                                <option {{ $solar_panel->destinazione_calore === 'Riscaldamento piscine' ? 'selected' : '' }} value="Riscaldamento piscine">Riscaldamento piscine</option>
                                                <option {{ $solar_panel->destinazione_calore === 'Altro' ? 'selected' : '' }} value="Altro">Altro</option>
                                            </select>
                                        </label>
                                        <label for="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][tipo_impianto_integrato_o_sostituito]">
                                            Tipo impianto integrato o sostituito
                                            <select name="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][tipo_impianto_integrato_o_sostituito]" id="solar_panels[{{$practice->id}}-{{$solar_panel->id}}][tipo_impianto_integrato_o_sostituito]">
                                                <option {{ $solar_panel->tipo_impianto_integrato_o_sostituito === 'Boiler elettrico' ? 'selected' : '' }} value="Boiler elettrico">Boiler elettrico</option>
                                                <option {{ $solar_panel->tipo_impianto_integrato_o_sostituito === 'Gas/Gasolio' ? 'selected' : '' }} value="Gas/Gasolio">Gas/Gasolio</option>
                                                <option {{ $solar_panel->tipo_impianto_integrato_o_sostituito === 'Altro' ? 'selected' : '' }} value="Altro">Altro</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div onclick="deleteSolarPanel({{$practice->id}}, {{$solar_panel->id}})" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                        <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                        <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p id="solar_panels_no_data_row">Nessun dato</p>
                        @endforelse
                    </div>
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

@push('scripts')
    @include('business.scripts.condensing_boiler')
    @include('business.scripts.heat_pump')
    @include('business.scripts.absorption_heat_pump')
    @include('business.scripts.hybrid_system')
    @include('business.scripts.microgeneration_system')
    @include('business.scripts.water_heatpumps_installation')
    @include('business.scripts.biome_generator')
    @include('business.scripts.solar_panel')
@endpush
