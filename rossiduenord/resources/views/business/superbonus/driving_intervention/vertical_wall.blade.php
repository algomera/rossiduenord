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
                        <input {{ $vertwall->thermical_isolation_intervention == 'true' ? 'checked' : ''}} type="checkbox" class="@error('thermical_isolation_intervention') is-invalid @enderror" name="thermical_isolation_intervention" id="thermical_isolation_intervention" value="true">
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
                                <input type="number" value="{{$vertwall->total_vertical_walls}}" name="total_vertical_walls" id="total_vertical_walls" class="border ml-2 px-2 text-right @error('total_vertical_walls') is-invalid @enderror" style="width: 80px">
                                m²
                            </label>
                            @error('total_vertical_walls')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex mr-4">
                            <p class="m-0">di cui realizzati SAL n. 1</p>
                            <label for="vw_realized_1" class="m-0  black">
                                <input type="number" value="{{$vertwall->vw_realized_1}}" name="vw_realized_1" id="vw_realized_1" class="border ml-2 px-2 text-right @error('vw_realized_1') is-invalid @enderror" style="width: 80px">
                                m²
                            </label>
                            @error('vw_realized_1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex mr-4">
                            <p class="m-0">SAL n. 2</p>
                            <label for="vw_realized_2" class="m-0  black">
                                <input type="number" value="{{$vertwall->vw_realized_2}}" name="vw_realized_2" id="vw_realized_2" class="border ml-2 px-2 text-right @error('vw_realized_2') is-invalid @enderror" style="width: 80px">
                                m²
                            </label>
                            @error('vw_realized_2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex mr-4">
                            <p class="m-0">SAL F.</p>
                            <label for="vw_sal_f" class="m-0  black">
                                <input type="number" value="{{$vertwall->vw_sal_f}}" name="vw_sal_f" id="vw_sal_f" class="border ml-2 px-2 text-right @error('vw_sal_f') is-invalid @enderror" style="width: 80px">
                                m²
                            </label>
                            @error('vw_sal_f')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex align-items-center mt-3" style="width:80%;">
                        <p class="m-0">Superficie totale oggetto dell’intervento</p>
                        <label for="total_intervention_surface" class=" m-0 mr-4 black">
                            <input type="number" value="{{$vertwall->total_intervention_surface}}" name="total_intervention_surface" id="total_intervention_surface" style="width: 80px; background-color: #f2f2f2" class="border ml-2 px-2 text-right @error('total_intervention_surface') is-invalid @enderror">
                            m²
                        </label>
                        @error('total_intervention_surface')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <p class="m-0 font-weight-light" style="font-size: 13px">* Il POND non viene considerato nel calcolo per l’ammisibilità dell’intervento trainante sull’involucro (maggiore del 25% della sup. disperdente)</p>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-3" style="width:80%;">
                        <div class="d-flex align-items-center">
                            <p class="m-0">Il costo complessivo previsto in progetto dei lavori sulle pratiche opache ammonta a*</p>
                            <label for="total_expected_cost" class=" m-0 mr-4 black">
                                <input type="number" value="{{$vertwall->total_expected_cost}}" name="total_expected_cost" id="total_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right @error('total_expected_cost') is-invalid @enderror">
                                €
                            </label>
                            @error('total_expected_cost')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                        @error('max_possible_cost')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
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

                    <div class="mt-5">{{-- CC. Caldaie a condensazione --}}
                        <label for="condensing_boiler" class="checkbox-wrapper d-flex">
                            <input {{$vertwall->condensing_boiler == 'true' ? 'checked' : ''}} type="checkbox" name="condensing_boiler" id="condensing_boiler" value="true">
                            <span class="checkmark"></span>
                            <span class="black" ><b>CC. Caldaie a condensazione</b></span>
                        </label>
                        <div class="px-20 pt-20 pb-20" style="width: 80%; min-height: 160px; background-color: #f2f2f2 ">
                            <div class="box_input">
                                <div class="row_input">
                                    <label for="">
                                        Tipo sostituito
                                        <select name="" id="">
                                            <option value="Caldaia standard">Caldaia standard</option>
                                            <option value="Caldaia a bassa temperatura">Caldaia a bassa temperatura</option>
                                            <option value="Caldaia a condensazione a gas">Caldaia a condensazione a gas</option>
                                            <option value="Caldaia a condesazione a gasolio">Caldaia a condesazione a gasolio</option>
                                            <option value="Pompa di calore anche con sonda geotermica">Pompa di calore anche con sonda geotermica</option>
                                            <option value="Generatori di aria calda">Generatori di aria calda</option>
                                            <option value="Teleriscaldamento">Teleriscaldamento</option>
                                            <option value="Impianto a biomassa">Impianto a biomassa</option>
                                            <option value="Altro">Altro</option>
                                        </select>
                                    </label>
                                    <label for="">
                                        P. nom. sostituito
                                        <input class="input_small" type="number" name="" id="">
                                        kW
                                    </label>
                                    <label for="">
                                        Potenza nominale
                                        <input class="input_small" type="number" name="" id="">
                                        kW
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="">
                                        Rend. utile nom. (100%)
                                        <input class="input_small" type="number" name="" id="">
                                        %
                                    </label>
                                    <label for="">
                                        <select name="" id="">
                                            <option value="Riscaldameto ambiente">Riscaldameto ambiente</option>
                                            <option value="Risc. ambiente + prod.ACS">Risc. ambiente + prod.ACS</option>
                                        </select>
                                    </label>
                                    <label for="">
                                        Efficienza ns
                                        <input class="input_small" type="number" name="" id="">
                                        %
                                    </label>
                                    <label for="">
                                        Efficienza ACS nwh
                                        <input class="input_small" type="number" name="" id="">
                                        %
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="row_input">
                                        <label for="">
                                            Tipo di alimentazione
                                            <select name="" id="">
                                                <option value="Metano">Gas Naturale (metano)</option>
                                                <option value="Gpl">Gpl</option>
                                                <option value="Gasolio">Gasolio</option>
                                            </select>
                                        </label>
                                        <label for="">
                                            Classe disp. termoregolazione evoluto
                                            <select name="" id="">
                                                <option value="V">V</option>
                                                <option value="VI">VI</option>
                                                <option value="VIII">VIII</option>
                                                <option value="Nessun dispositivo">Nessun dispositivo</option>
                                            </select>
                                        </label>
                                    </div>
                                    <button type="button" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                        <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                        <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">{{-- PC. Pompe di calore (PDC) --}}
                        <label for="heat_pumps" class="checkbox-wrapper d-flex">
                            <input {{$vertwall->heat_pumps == 'true' ? 'checked' : ''}} type="checkbox" name="heat_pumps" id="heat_pumps" value="true">
                            <span class="checkmark"></span>
                            <span class="black" ><b>PC. Pompe di calore (PDC) </b></span>
                        </label>
                        <div class="px-20 pt-20 pb-20" style="width: 80%; min-height: 160px; background-color: #f2f2f2 ">
                            <div class="box_input" id="">
                                <div class="row_input">
                                    <label for="">
                                        Tipo sostituito
                                        <select name="" id="">
                                            <option value="Caldaia standard">Caldaia standard</option>
                                            <option value="Caldaia a bassa temperatura">Caldaia a bassa temperatura</option>
                                            <option value="Caldaia a condensazione a gas">Caldaia a condensazione a gas</option>
                                            <option value="Caldaia a condesazione a gasolio">Caldaia a condesazione a gasolio</option>
                                            <option value="Pompa di calore anche con sonda geotermica">Pompa di calore anche con sonda geotermica</option>
                                            <option value="Generatori di aria calda">Generatori di aria calda</option>
                                            <option value="Teleriscaldamento">Teleriscaldamento</option>
                                            <option value="Impianto a biomassa">Impianto a biomassa</option>
                                            <option value="Altro">Altro</option>
                                        </select>
                                    </label>
                                    <label for="">
                                        P. nom. sostituito
                                        <input class="input_small" type="number" name="" id="">
                                        kW
                                    </label>
                                    <label for="">
                                        Tipo di PDC
                                        <select name="" id="">
                                            <option value="Aria/Aria">Aria/Aria</option>
                                            <option value="Aria/Acqua">Aria/Acqua</option>
                                            <option value="Salamoia/Aria">Salamoia/Aria</option>
                                            <option value="Salamoia/Acqua">Salamoia/Acqua</option>
                                            <option value="Acqua/Aria">Acqua/Aria</option>
                                            <option value="Acqua/Acqua">Acqua/Acqua</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="" class="checkbox-wrapper d-flex">
                                        <input type="checkbox" name="" id="" value="true">
                                        <span class="checkmark"></span>
                                        Tipo Roof Top
                                    </label>
                                    <label for="">
                                        P. nom.
                                        <input class="input_small" type="number" name="" id="">
                                        kW
                                    </label>
                                    <label for="">
                                        P. Elettrica assorbita
                                        <input class="input_small" type="number" name="" id="">
                                        kW
                                    </label>
                                    <label for="" class="checkbox-wrapper d-flex">
                                        <input type="checkbox" name="" id="" value="true">
                                        <span class="checkmark"></span>
                                        inverter
                                    </label>
                                    <label for="">
                                        COP
                                        <input class="input_small" type="number" name="" id="">
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="row_input">
                                        <label for="" class="checkbox-wrapper d-flex">
                                            <input type="checkbox" name="" id="" value="true">
                                            <span class="checkmark"></span>
                                            E' reversibile
                                        </label>
                                        <label for="">
                                            EER
                                            <input class="input_small" type="number" name="" id="">
                                        </label>
                                        <label for="" class="checkbox-wrapper d-flex">
                                            <input type="checkbox" name="" id="" value="true">
                                            <span class="checkmark"></span>
                                            Sonde geotermiche
                                        </label>
                                        <label for="">
                                            Sup. riscaldata dalla PDC
                                            <input class="input_small" type="number" name="" id="">
                                            m²
                                        </label>
                                    </div>
                                    <button type="button" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                        <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                        <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">{{-- PCA. Pompe di calore ad assorbimento a gas --}}
                        <label for="absorption_heat_pumps" class="checkbox-wrapper d-flex">
                            <input {{$vertwall->absorption_heat_pumps == 'true' ? 'checked' : ''}} type="checkbox" name="absorption_heat_pumps" id="absorption_heat_pumps" value="true">
                            <span class="checkmark"></span>
                            <span class="black" ><b>PCA. Pompe di calore ad assorbimento a gas</b></span>
                        </label>
                        <div class="px-20 pt-20 pb-20" style="width: 80%; min-height: 160px; background-color: #f2f2f2 ">
                            <div class="box_input" id="">
                                <div class="row_input">
                                    <label for="">
                                        Tipo sostituito
                                        <select name="" id="">
                                            <option value="Caldaia standard">Caldaia standard</option>
                                            <option value="Caldaia a bassa temperatura">Caldaia a bassa temperatura</option>
                                            <option value="Caldaia a condensazione a gas">Caldaia a condensazione a gas</option>
                                            <option value="Caldaia a condesazione a gasolio">Caldaia a condesazione a gasolio</option>
                                            <option value="Pompa di calore anche con sonda geotermica">Pompa di calore anche con sonda geotermica</option>
                                            <option value="Generatori di aria calda">Generatori di aria calda</option>
                                            <option value="Teleriscaldamento">Teleriscaldamento</option>
                                            <option value="Impianto a biomassa">Impianto a biomassa</option>
                                            <option value="Altro">Altro</option>
                                        </select>
                                    </label>
                                    <label for="">
                                        P. nom. sostituito
                                        <input class="input_small" type="number" name="" id="">
                                        kW
                                    </label>
                                    <label for="">
                                        Tipo di PDC
                                        <select name="" id="">
                                            <option value="Aria/Aria">Aria/Aria</option>
                                            <option value="Aria/Acqua">Aria/Acqua</option>
                                            <option value="Salamoia/Aria">Salamoia/Aria</option>
                                            <option value="Salamoia/Acqua">Salamoia/Acqua</option>
                                            <option value="Acqua/Aria">Acqua/Aria</option>
                                            <option value="Acqua/Acqua">Acqua/Acqua</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="" class="checkbox-wrapper d-flex">
                                        <input type="checkbox" name="" id="" value="true">
                                        <span class="checkmark"></span>
                                        Tipo Roof Top
                                    </label>
                                    <label for="">
                                        P. nom.
                                        <input class="input_small" type="number" name="" id="">
                                        kW
                                    </label>
                                    <label for="">
                                        GUEh
                                        <input class="input_small" type="number" name="" id="">
                                    </label>
                                    <label for="" class="checkbox-wrapper d-flex">
                                        <input type="checkbox" name="" id="" value="true">
                                        <span class="checkmark"></span>
                                        E' reversibile
                                    </label>
                                    <label for="">
                                        GUEc
                                        <input class="input_small" type="number" name="" id="">
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="row_input">
                                        <label for="">
                                            Sup. riscaldata dalla PDC
                                            <input class="input_small" type="number" name="" id="">
                                            m²
                                        </label>
                                    </div>
                                    <button type="button" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                        <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                        <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">{{-- SI. Sistemi ibridi --}}
                        <label for="hybrid_system" class="checkbox-wrapper d-flex">
                            <input {{$vertwall->hybrid_system == 'true' ? 'checked' : ''}} type="checkbox" name="hybrid_system" id="hybrid_system" value="true">
                            <span class="checkmark"></span>
                            <span class="black" ><b>SI. Sistemi ibridi</b></span>
                        </label>
                        <div class="px-20 pt-20 pb-20" style="width: 80%; min-height: 160px; background-color: #f2f2f2 ">
                            <div class="box_input" id="">
                                <div class="row_input">
                                    <label for="">
                                        Tipo sostituito
                                        <select name="" id="">
                                            <option value="Caldaia standard">Caldaia standard</option>
                                            <option value="Caldaia a bassa temperatura">Caldaia a bassa temperatura</option>
                                            <option value="Caldaia a condensazione a gas">Caldaia a condensazione a gas</option>
                                            <option value="Caldaia a condesazione a gasolio">Caldaia a condesazione a gasolio</option>
                                            <option value="Pompa di calore anche con sonda geotermica">Pompa di calore anche con sonda geotermica</option>
                                            <option value="Generatori di aria calda">Generatori di aria calda</option>
                                            <option value="Teleriscaldamento">Teleriscaldamento</option>
                                            <option value="Impianto a biomassa">Impianto a biomassa</option>
                                            <option value="Altro">Altro</option>
                                        </select>
                                    </label>
                                    <label for="">
                                        P. nom. sostituito
                                        <input class="input_small" type="number" name="" id="">
                                        kW
                                    </label>
                                </div>
                                <div class="row_input">
                                    <h6>Caldaia a condensazione:</h6>
                                    <label for="">
                                        P. nom.
                                        <input class="input_small" type="number" name="" id="">
                                        kW
                                    </label>
                                    <label for="">
                                        Rend. utile nom. (100%)
                                        <input class="input_small" type="number" name="" id="">
                                        %
                                    </label>
                                    <label for="">
                                        Efficienza ns
                                        <input class="input_small" type="number" name="" id="">
                                        %
                                    </label>
                                    <label for="">
                                        Tipo di alim.
                                        <select name="" id="">
                                            <option value="Metano">Gas Naturale (metano)</option>
                                            <option value="Gpl">Gpl</option>
                                            <option value="Gasolio">Gasolio</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="row_input">
                                    <h6>Pompa di calore (PDC):</h6>
                                    <label for="">
                                        Tipo di PDC
                                        <select name="" id="">
                                            <option value="Aria/Aria">Aria/Aria</option>
                                            <option value="Aria/Acqua">Aria/Acqua</option>
                                            <option value="Salamoia/Aria">Salamoia/Aria</option>
                                            <option value="Salamoia/Acqua">Salamoia/Acqua</option>
                                            <option value="Acqua/Aria">Acqua/Aria</option>
                                            <option value="Acqua/Acqua">Acqua/Acqua</option>
                                        </select>
                                    </label>
                                    <label for="" class="checkbox-wrapper d-flex">
                                        <input type="checkbox" name="" id="" value="true">
                                        <span class="checkmark"></span>
                                        Tipo Roof Top
                                    </label>
                                    <label for="">
                                        P. nome
                                        <input class="input_small" type="number" name="" id="">
                                        kW
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="row_input">
                                        <label for="">
                                            P. Elettrica assorbita
                                            <input class="input_small" type="number" name="" id="">
                                            kW
                                        </label>
                                        <label for="" class="checkbox-wrapper d-flex">
                                            <input type="checkbox" name="" id="" value="true">
                                            <span class="checkmark"></span>
                                            inverter
                                        </label>
                                        <label for="">
                                            COP
                                            <input class="input_small" type="number" name="" id="">
                                        </label>
                                        <label for="" class="checkbox-wrapper d-flex">
                                            <input type="checkbox" name="" id="" value="true">
                                            <span class="checkmark"></span>
                                            Sonde geotermiche
                                        </label>
                                    </div>
                                    <button type="button" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                        <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                        <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">{{-- CO. Sistemi di microgenerazione --}}
                        <label class="checkbox-wrapper d-flex">
                            <input {{$vertwall->microgeneration_system == 'true' ? 'checked' : ''}} type="checkbox" name="microgeneration_system" id="microgeneration_system" value="true">
                            <span class="checkmark"></span>
                            <span class="black" ><b>CO. Sistemi di microgenerazione</b></span>
                        </label>
                        <div class="px-20 pt-20 pb-20" style="width: 80%; min-height: 160px; background-color: #f2f2f2 ">
                            <div class="box_input" id="">
                                <div class="row_input">
                                    <label for="">
                                        Tipo sostituito
                                        <select name="" id="">
                                            <option value="Caldaia standard">Caldaia standard</option>
                                            <option value="Caldaia a bassa temperatura">Caldaia a bassa temperatura</option>
                                            <option value="Caldaia a condensazione a gas">Caldaia a condensazione a gas</option>
                                            <option value="Caldaia a condesazione a gasolio">Caldaia a condesazione a gasolio</option>
                                            <option value="Pompa di calore anche con sonda geotermica">Pompa di calore anche con sonda geotermica</option>
                                            <option value="Generatori di aria calda">Generatori di aria calda</option>
                                            <option value="Teleriscaldamento">Teleriscaldamento</option>
                                            <option value="Impianto a biomassa">Impianto a biomassa</option>
                                            <option value="Altro">Altro</option>
                                        </select>
                                    </label>
                                    <label for="">
                                        P. nom. sostituito
                                        <input class="input_small" type="number" name="" id="">
                                        kW
                                    </label>
                                    <label for="">
                                        P. Elettrica
                                        <input class="input_small" type="number" name="" id="">
                                        kW
                                    </label>
                                    <label for="">
                                        P. immessa
                                        <input class="input_small" type="number" name="" id="">
                                        kW
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="">
                                        P. term. recuperata
                                        <input class="input_small" type="number" name="" id="">
                                        kW
                                    </label>
                                    <label for="">
                                        PES
                                        <input class="input_small" type="number" name="" id="">
                                        %
                                    </label>
                                    <label for="">
                                        Tipo di alim.
                                        <select name="" id="">
                                            <option value="Metano">Gas Naturale (metano)</option>
                                            <option value="Gpl">Gpl</option>
                                            <option value="Gasolio">Gasolio</option>
                                        </select>
                                    </label>
                                    <label for="">
                                        Tipo intervento
                                        <select name="" id="">
                                            <option value="nuovo">Nuova unità</option>
                                            <option value="Rifacimento">Rifacimento</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="row_input">
                                        <label for="" class="checkbox-wrapper d-flex">
                                            <input type="checkbox" name="" id="" value="true">
                                            <span class="checkmark"></span>
                                            a Celle a Combustibile
                                        </label>
                                        <label for="" class="checkbox-wrapper d-flex">
                                            <input type="checkbox" name="" id="" value="true">
                                            <span class="checkmark"></span>
                                            Riscaldatore suppl.
                                        </label>
                                        <label for="">
                                            Potenza risc. suppl.
                                            <input class="input_small" type="number" name="" id="">
                                            kW
                                        </label>
                                        <label for="">
                                            Efficienza ns
                                            <input class="input_small" type="number" name="" id="">
                                            %
                                        </label>
                                        <label for="">
                                            Classe energ.
                                            <select name="" id="">
                                                <option value="B">B</option>
                                                <option value="A">A</option>
                                                <option value="A+">A+</option>
                                                <option value="A++">A++</option>
                                                <option value="A+++">A+++</option>
                                            </select>
                                        </label>
                                    </div>
                                    <button type="button" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                        <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                        <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">{{--SA. Installazione di scaldacqua a pompa di calore  --}}
                        <label class="checkbox-wrapper d-flex">
                            <input {{$vertwall->water_heatpumps_installation == 'true' ? 'checked' : ''}} type="checkbox" name="water_heatpumps_installation" id="water_heatpumps_installation" value="true">
                            <span class="checkmark"></span>
                            <span class="black" ><b>SA. Installazione di scaldacqua a pompa di calore</b></span>
                        </label>
                        <p style="width: 70%;">In sostituzione di un sistema di produzione di acqua calda quando avviene con lo stesso generatore di calore destinato alla climatizzazione invernale ai sensi delle lettre b) e c) del comma 1 dell’articolo 119 del Decreto Rilancio</p>
                        <div class="px-20 pt-20 pb-20" style="width: 80%; min-height: 160px; background-color: #f2f2f2 ">
                            <div class="box_input" id="">
                                <div class="row_input">
                                    <label for="">
                                        Tipo scaldaacqua sostituito
                                        <select name="" id="">
                                            <option value="Boiler elettrico">Boiler elettrico</option>
                                            <option value="Gas/Gasolio">Gas/Gasolio</option>
                                            <option value="Altro">Altro</option>
                                        </select>
                                    </label>
                                    <label for="">
                                        Pu scaldacqua sostituito
                                        <input class="input_small" type="number" name="" id="">
                                        kW
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="row_input">
                                        <label for="">
                                            Pu scaldacqua a PDC
                                            <input class="input_small" type="number" name="" id="">
                                            kW
                                        </label>
                                        <label for="">
                                            COP del nuovo scaldacqua
                                            <input class="input_small" type="number" name="" id="">
                                        </label>
                                        <label for="">
                                            Capacità accumulo 
                                            <input class="input_small" type="number" name="" id="">
                                            L
                                        </label>
                                    </div>    
                                    <button type="button" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                        <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                        <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">{{-- IB. Generatori a biomamassa --}}
                        <label class="checkbox-wrapper d-flex">
                            <input {{$vertwall->biome_generators == 'true' ? 'checked' : ''}} type="checkbox" name="biome_generators" id="biome_generators" value="true">
                            <span class="checkmark"></span>
                            <span class="black" ><b>IB. Generatori a biomassa</b></span>
                        </label>
                        <p style="width: 70%;">Installazione di impianti di climatizzazione invernale dotati di generatori di calore alimentati da biomasse combustibili</p>
                        <div style="width: 80%; height: 200px; background-color: #f2f2f2 ">

                        </div>
                    </div>

                    <div class="mt-5">{{-- Collettori solari --}}
                        <label class="checkbox-wrapper d-flex">
                            <input {{$vertwall->solar_panel == 'true' ? 'checked' : ''}} type="checkbox" name="solar_panel" id="solar_panel" value="true">
                            <span class="checkmark"></span>
                            <span class="black" ><b>Collettori solari</b></span>
                        </label>
                        <div class="px-20 pt-20 pb-20" style="width: 80%; min-height: 160px; background-color: #f2f2f2 ">
                            <div class="box_input" id="">
                                <div class="row_input">
                                    <label for="">
                                        Superfice lorda Ag di un singolo modulo
                                        <input class="input_small" type="number" name="" id="">
                                        m²
                                    </label>
                                    <label for="">
                                        N° di moduli
                                        <input class="input_small" type="number" name="" id="">
                                    </label>
                                    <label for="">
                                        Sup. Totale
                                        <input class="input_small" type="number" name="" id="">
                                        m²
                                    </label>
                                    <label for="" class="checkbox-wrapper d-flex">
                                        <input type="checkbox" name="" id="" value="true">
                                        <span class="checkmark"></span>
                                        Certificazione solar Keymark
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="">
                                        Tipo di collettori
                                        <select name="" id="">
                                            <option value="Piani vetrati">Piani vetrati</option>
                                            <option value="Sotto vuoto o tubi evacuati">Sotto vuoto o tubi evacuati</option>
                                            <option value="A concentrazione">A concentrazione</option>
                                            <option value="Scoperti">Scoperti</option>
                                        </select>
                                    </label>
                                    <label for="">
                                        Tipo di installazione
                                        <select name="" id="">
                                            <option value="Tetto piano">Tetto piano</option>
                                            <option value="Tetto a falda">Tetto a falda</option>
                                            <option value="Altro">Altro</option>
                                        </select>
                                    </label>
                                    <label for="">
                                        inclinazione
                                        <input class="input_small" type="number" name="" id="">
                                        %
                                    </label>
                                    <label for="">
                                        Orientamento
                                        <select name="" id="">
                                            <option value="Nord">Nord</option>
                                            <option value="Nord-Est">Nord-Est</option>
                                            <option value="Est">Est</option>
                                            <option value="Sud-Est">Sud-Est</option>
                                            <option value="Sud">Sud</option>
                                            <option value="Sud-Ovest">Sud-Ovest</option>
                                            <option value="Ovest">Ovest</option>
                                            <option value="Nord-Ovest">Nord-Ovest</option>
                                            <option value="P-orizzontale">P-orizzontale</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="">
                                        Impianto factory made
                                        <input type="radio" name="" id="">
                                        N.D
                                    </label>
                                    <label for="">
                                        <input type="radio" name="" id="">
                                        No
                                    </label>
                                    <label for="">
                                        <input type="radio" name="" id="">
                                        Si
                                    </label>
                                    <label for="">
                                        Q col/Q sol
                                        <input class="input_small" type="number" name="" id="">
                                        kWht
                                    </label>
                                    <label for="">
                                        QL
                                        <input class="input_small" type="number" name="" id="">
                                        MJ
                                    </label>
                                    <label for="">
                                        Accumulo in litri
                                        <input class="input_small" type="number" name="" id="">
                                    </label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="row_input">
                                        <label for="">
                                            Destinazione del calore
                                            <select name="" id="">
                                                <option value="acqua sanitaria">Produzione di acqua calda sanitaria</option>
                                                <option value="Produzione di ACS e riscaldamento ambiente">Produzione di ACS e riscaldamento ambiente</option>
                                                <option value="Produzione di calore di processo">Produzione di calore di processo</option>
                                                <option value="Riscaldamento piscine">Riscaldamento piscine</option>
                                                <option value="Altro">Altro</option>
                                            </select>
                                        </label>
                                        <label for="">
                                            Tipo impianto integrato o sostituito
                                            <select name="" id="">
                                                <option value="Boiler elettrico">Boiler elettrico</option>
                                                <option value="Gas/Gasolio">Gas/Gasolio</option>
                                                <option value="Altro">Altro</option>
                                            </select>
                                        </label>
                                    </div>
                                    <button type="button" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                        <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                        <p class="m-0" style="color: #818387; font-size: 12px">Cancella</p>
                                    </button>
                                </div>
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
