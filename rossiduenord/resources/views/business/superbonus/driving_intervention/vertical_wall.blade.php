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
            <label class="checkbox-wrapper">
                <input {{ $vertwall->thermical_isolation_intervention == 'true' ? 'checked' : ''}} {{old('thermical_isolation_intervention') == 'true' ? 'checked' : ''}} type="checkbox" class="@error('thermical_isolation_intervention') is-invalid error @enderror" name="thermical_isolation_intervention" id="thermical_isolation_intervention" value="true">
                <span class="checkmark"></span>
                <span class="black" ><b>1. Intervento di isolamento termico delle superfici opache verticali e orizzontali</b></span>
                @error('thermical_isolation_intervention')
                <span class="invalid-feedback pl-3" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
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
                        <input type="number" value="{{old('total_vertical_walls') ?? $vertwall->total_vertical_walls}}" name="total_vertical_walls" id="total_vertical_walls" class="border ml-2 px-2 text-right  @error('total_vertical_walls') is-invalid error @enderror" style="width: 80px">
                        m²
                        @error('total_vertical_walls')
                        <span class="invalid-feedback pl-3" role="alert">
                            <strong>{{ 'incorrect' }}</strong>
                        </span>
                        @enderror
                    </label>
                </div>
                <div class="d-flex mr-4">
                    <p class="m-0">di cui realizzati SAL n. 1</p>
                    <label for="vw_realized_1" class="m-0  black">
                        <input type="number" value="{{old('vw_realized_1') ?? $vertwall->vw_realized_1}}" name="vw_realized_1" id="vw_realized_1" class="border ml-2 px-2 text-right @error('vw_realized_1') is-invalid error @enderror" style="width: 80px">
                        m²
                        @error('vw_realized_1')
                        <span class="invalid-feedback pl-3" role="alert">
                            <strong>{{ 'incorrect' }}</strong>
                        </span>
                        @enderror
                    </label>
                </div>
                <div class="d-flex mr-4">
                    <p class="m-0">SAL n. 2</p>
                    <label for="vw_realized_2" class="m-0  black">
                        <input type="number" value="{{old('vw_realized_2') ?? $vertwall->vw_realized_2}}" name="vw_realized_2" id="vw_realized_2" class="border ml-2 px-2 text-right @error('vw_realized_2') is-invalid error @enderror" style="width: 80px">
                        m²
                        @error('vw_realized_2')
                        <span class="invalid-feedback pl-3" role="alert">
                            <strong>{{ 'incorrect' }}</strong>
                        </span>
                        @enderror
                    </label>
                </div>
                <div class="d-flex mr-4">
                    <p class="m-0">SAL F.</p>
                    <label for="vw_sal_f" class="m-0  black">
                        <input type="number" value="{{old('vw_sal_f') ?? $vertwall->vw_sal_f}}" name="vw_sal_f" id="vw_sal_f" class="border ml-2 px-2 text-right @error('vw_sal_f') is-invalid error @enderror" style="width: 80px">
                        m²
                        @error('vw_sal_f')
                        <span class="invalid-feedback pl-3" role="alert">
                            <strong>{{ 'incorrect' }}</strong>
                        </span>
                        @enderror
                    </label>
                </div>
            </div>

            <div class="d-flex align-items-center mt-3" style="width:80%;">
                <p class="m-0">Superficie totale oggetto dell’intervento</p>
                <label for="total_intervention_surface" class=" m-0 mr-4 black">
                    <input type="number" value="{{old('total_intervention_surface') ?? $vertwall->total_intervention_surface}}" name="total_intervention_surface" id="total_intervention_surface" style="width: 80px; background-color: #f2f2f2" class="border ml-2 px-2 text-right @error('total_intervention_surface') is-invalid error @enderror">
                    m²
                    @error('total_intervention_surface')
                    <span class="invalid-feedback pl-3" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </label>
                <p class="m-0 font-weight-light" style="font-size: 13px">* Il POND non viene considerato nel calcolo per l’ammisibilità dell’intervento trainante sull’involucro (maggiore del 25% della sup. disperdente)</p>
            </div>

            <div class="d-flex align-items-center justify-content-between mt-3" style="width:80%;">
                <div class="d-flex align-items-center">
                    <p class="m-0">Il costo complessivo previsto in progetto dei lavori sulle pratiche opache ammonta a*</p>
                    <label for="total_expected_cost" class=" m-0 mr-4 black">
                        <input type="number" value="{{old('total_expected_cost') ?? $vertwall->total_expected_cost}}" name="total_expected_cost" id="total_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right @error('total_expected_cost') is-invalid error @enderror">
                        €
                        @error('total_expected_cost')
                        <span class="invalid-feedback pl-3" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </label>
                </div>
                <button class="add-button">Computo metrico</button>
            </div>

            <p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>

            <div class="d-flex align-items-center mt-3" style="width:80%;">
                <p class="m-0">La spesa massima ammissibile dei lavori sulle parti opache è pari a</p>
                <label for="max_possible_cost" class=" m-0 mr-4 black">
                    <input type="number" value="{{old('max_possible_cost') ?? $vertwall->max_possible_cost}}" name="max_possible_cost" id="max_possible_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right @error('max_possible_cost') is-invalid error @enderror">
                    €
                    @error('max_possible_cost')
                    <span class="invalid-feedback pl-3" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </label>
            </div>

            <p class="m-0 mt-3" style="font-weight: 500;">Il costo dei lavori realizzati è pari a</p>

            <div class="d-flex" style="width: 80%">
                <div class="d-flex align-items-center">
                    <span>SAL. n.1</span>
                    <label for="total_isolation_cost_1" class="d-flex flex-column align-items-end mb-3 mr-1">
                        <div class="w-100 pr-2 text-right">
                            <small class="black ">almeno al 30%</small>
                        </div>
                        <div class="black">
                            <input type="number" value="{{old('total_isolation_cost_1') ?? $vertwall->total_isolation_cost_1}}" name="total_isolation_cost_1" id="total_isolation_cost_1" class="ml-2 px-2 border @error('total_isolation_cost_1') is-invalid error @enderror" style="width:120px">
                            €
                            @error('total_isolation_cost_1')
                            <span class="invalid-feedback pl-3" role="alert">
                                <strong>{{ 'incorrect' }}</strong>
                            </span>
                            @enderror
                        </div>
                    </label>
                </div>
                <div class="d-flex align-items-center ml-4">
                    <span>SAL. n.2</span>
                    <label for="total_isolation_cost_2" class="d-flex flex-column  align-items-end mb-3 mr-1">
                        <div class="w-100 pr-2 text-right">
                            <small class="black ">almeno al 60%</small>
                        </div>
                        <div class="black">
                            <input type="number" value="{{old('total_isolation_cost_2') ?? $vertwall->total_isolation_cost_2}}" name="total_isolation_cost_2" id="total_isolation_cost_2" class="ml-2 text-right px-2 border @error('total_isolation_cost_2') is-invalid error @enderror" style="width:120px">
                            €
                            @error('total_isolation_cost_2')
                            <span class="invalid-feedback pl-3" role="alert">
                                <strong>{{ 'incorrect' }}</strong>
                            </span>
                            @enderror
                        </div>

                    </label>
                </div>
                <div class="d-flex align-items-center ml-4">
                    <span>SAL.F</span>
                    <label for="final_isolation_cost" class="d-flex flex-column align-items-end mr-1 mb-0">
                        <div class="black">
                            <input type="number" value="{{old('final_isolation_cost') ?? $vertwall->final_isolation_cost}}" name="final_isolation_cost" id="final_isolation_cost" class="ml-2 border text-right px-2 @error('final_isolation_cost') is-invalid error @enderror" style="width:120px;">
                            €
                            @error('final_isolation_cost')
                            <span class="invalid-feedback pl-3" role="alert">
                                <strong>{{ 'incorrect' }}</strong>
                            </span>
                            @enderror
                        </div>
                    </label>
                </div>
                <div class="d-flex align-items-center ml-4">
                    <span>SAL. 1+2</span>
                    <label for="total_isolation_cost_1" class="d-flex flex-column align-items-end mr-1 mb-0">
                        <div class="black">
                            <input type="number" value="{{old('total_isolation_cost_1') ?? $vertwall->total_isolation_cost_1 + $vertwall->total_isolation_cost_2}}" class="ml-2 border text-right px-2" style="width:120px; background-color: #f2f2f2">
                            €
                            @error('total_isolation_cost_1')
                            <span class="invalid-feedback pl-3" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </label>
                </div>
                <div class="d-flex align-items-center ml-4">
                    <span>SAL. 1+2 F</span>
                    <label for="" class="d-flex flex-column align-items-end mr-1 mb-0">
                        <div class="black">
                            <input type="number" value="{{old('total_isolation_cost_1') ?? $vertwall->total_isolation_cost_1 + $vertwall->total_isolation_cost_2 + $vertwall->final_isolation_cost}}" class="ml-2 border text-right px-2" style="width:120px; background-color: #f2f2f2">
                            €
                            @error('total_isolation_cost_1')
                            <span class="invalid-feedback pl-3" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </label>
                </div>
            </div>

            <div class="d-flex align-items-center mt-2" style="width:80%;">
                <p class="m-0">Di cui per coperture non disperdenti</p>
                <label for="dispersing_covers" class=" m-0 mr-4 black">
                    <input type="number" value="{{old('dispersing_covers') ?? $vertwall->dispersing_covers}}" name="dispersing_covers" id="dispersing_covers" style="width: 120px;" class="border ml-2 px-2 text-right @error('dispersing_covers') is-invalid error @enderror">
                    €
                    @error('dispersing_covers')
                    <span class="invalid-feedback pl-3" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </label>
            </div>

            <div class="d-flex align-items-center mt-2 mb-4" style="width:80%;">
                <p class="m-0">Il risparmio di energia primaria non rinnovabile di progetto è</p>
                <label for="isolation_energetic_savings" class=" m-0 mr-4 black">
                    <input type="number" value="{{old('isolation_energetic_savings') ?? $vertwall->isolation_energetic_savings}}" name="isolation_energetic_savings" id="isolation_energetic_savings" style="width: 120px;" class="border ml-2 px-2 text-right @error('isolation_energetic_savings') is-invalid error @enderror">
                    KWh/anno
                    @error('isolation_energetic_savings')
                    <span class="invalid-feedback pl-3" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </label>
            </div>
        </div>

        <div class="px-20 pb-20">{{-- Intervento di sostituzione degli impianti di climatizzazione invernale esistenti --}}
            <label class="checkbox-wrapper">
                <input {{$vertwall->winter_acs_replacing == 'true' ? 'checked' : ''}} {{old('winter_acs_replacing') == 'true' ? 'checked' : ''}} type="checkbox" name="winter_acs_replacing" class="@error('winter_acs_replacing') is-invalid error @enderror" id="winter_acs_replacing" value="true">
                <span class="checkmark"></span>
                <span class="black" ><b>Intervento di sostituzione degli impianti di climatizzazione invernale esistenti</b></span>
                @error('winter_acs_replacing')
                <span class="invalid-feedback pl-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                @enderror
            </label>

            <div class="d-flex">
                <div class="d-flex align-items-center ml-4">
                    <span>Potenza utile complessiva pari a</span>
                    <label for="total_power" class="d-flex flex-column align-items-end mr-1 mb-0">
                        <input type="number" value="{{old('total_power') ?? $vertwall->total_power}}" name="total_power" id="total_power" class="ml-2 border text-right px-2 @error('total_power') is-invalid error @enderror" style="width:120px;">
                        @error('total_power')
                        <span class="invalid-feedback pl-3 m-0" role="alert">
                                    <strong>{{ 'incorrect' }}</strong>
                                  </span>
                        @enderror
                    </label>
                    <span>kW</span>
                </div>
                <div class="d-flex align-items-center ml-4">
                    <span>composto da n.</span>
                    <label for="generators" class="d-flex flex-column align-items-end mr-1 mb-0">
                        <input type="number" value="{{old('generators') ?? $vertwall->generators}}" name="generators" id="generators" class="ml-2 border text-right px-2 @error('generators') is-invalid error @enderror" style="width:120px;">
                        @error('generators')
                        <span class="invalid-feedback pl-3 m-0" role="alert">
                                    <strong>{{ 'incorrect' }}</strong>
                                  </span>
                        @enderror
                    </label>
                    <span>generatori di calore</span>
                </div>
            </div>

            <p class="m-0 mt-3">Con impianti centralizzati dotati di:</p>

            {{-- CC. Caldaie a condensazione --}}
            <x-condensing_boilers :vertwall="$vertwall" :practice="$practice" :items="$condensing_boilers" />
            {{-- PC. Pompe di calore (PDC) --}}
            <x-heat_pumps :vertwall="$vertwall" :practice="$practice" :items="$heat_pumps" />
            {{-- PCA. Pompe di calore ad assorbimento a gas --}}
            <x-absorption_heat_pumps :vertwall="$vertwall" :practice="$practice" :items="$absorption_heat_pumps" />
            {{-- SI. Sistemi ibridi --}}
            <x-hybrid_systems :vertwall="$vertwall" :practice="$practice" :items="$hybrid_systems" />
            {{-- CO. Sistemi di microgenerazione --}}
            <x-microgeneration_systems :vertwall="$vertwall" :practice="$practice" :items="$microgeneration_systems" />
            {{--SA. Installazione di scaldacqua a pompa di calore  --}}
            <x-water_heatpumps_installations :vertwall="$vertwall" :practice="$practice" :items="$water_heatpumps_installations" />
            {{-- IB. Generatori a biomamassa --}}
            <x-biome_generators :vertwall="$vertwall" :practice="$practice" :items="$biome_generators" />
            {{-- Collettori solari --}}
            <x-solar_panels :vertwall="$vertwall" :practice="$practice" :items="$solar_panels" />

            <div class="d-flex mt-3">
                <span>Destinati a</span>

                <label for="solar_panel_use_winter" class="checkbox-wrapper d-flex ml-4">
                    <input {{$vertwall->solar_panel_use_winter == 'true' ? 'checked' : ''}} {{old('solar_panel_use_winter') == 'true' ? 'checked' : ''}}  type="checkbox"  class="@error('solar_panel_use_winter') is-invalid error @enderror" name="solar_panel_use_winter" id="solar_panel_use_winter" value="true">
                    <span class="checkmark"></span>
                    <span class="black" >Climatizzazione invernale</span>
                    @error('solar_panel_use_winter')
                    <span class="invalid-feedback pl-3 m-0" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </label>
                <label for="solar_panel_use_summer" class="checkbox-wrapper d-flex  ml-4">
                    <input {{$vertwall->solar_panel_use_summer == 'true' ? 'checked' : ''}} {{old('solar_panel_use_summer') == 'true' ? 'checked' : ''}}  type="checkbox" class="@error('solar_panel_use_summer') is-invalid error @enderror" name="solar_panel_use_summer" id="solar_panel_use_summer" value="true">
                    <span class="checkmark"></span>
                    <span class="black" >Climatizzazione estiva</span>
                    @error('solar_panel_use_summer')
                    <span class="invalid-feedback pl-3 m-0" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </label>
                <label for="solar_panel_use_water" class="checkbox-wrapper d-flex  ml-4">
                    <input {{$vertwall->solar_panel_use_water == 'true' ? 'checked' : ''}} {{old('solar_panel_use_water') == 'true' ? 'checked' : ''}}  type="checkbox" class="@error('solar_panel_use_water') is-invalid error @enderror" name="solar_panel_use_water" id="solar_panel_use_water" value="true">
                    <span class="checkmark"></span>
                    <span class="black" >Produzione di acqua calda sanitaria</span>
                    @error('solar_panel_use_water')
                    <span class="invalid-feedback pl-3 m-0" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </label>
            </div>

            <div class="d-flex align-items-center justify-content-between mt-3" style="width:80%;">
                <div class="d-flex align-items-center">
                    <p class="m-0">Il costo complessivo di progetto degli interventi sull’impianto ammonta a *</p>
                    <label for="total_acs_project_cost" class=" m-0 mr-4 black">
                        <input type="number" value="{{old('total_acs_project_cost') ?? $vertwall->total_acs_project_cost}}" name="total_acs_project_cost" id="total_acs_project_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right @error('total_acs_project_cost') is-invalid error @enderror">
                        €
                        @error('total_acs_project_cost')
                        <span class="invalid-feedback pl-3 m-0" role="alert">
                        <strong>{{ $message }}</strong></span>
                        @enderror
                    </label>
                </div>
                <button class="add-button">Computo metrico</button>
            </div>

            <p class="font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>

            <div class="d-flex align-items-center mt-2 mb-4" style="width:80%;">
                <p class="m-0">L'ammontare massimo dei lavori per la sostituzione degli impianti è pari a</p>
                <label for="total_cost_installations" class=" m-0 mr-4 black">
                    <input type="number" value="{{old('total_cost_installations') ?? $vertwall->total_cost_installations}}" name="total_cost_installations" id="total_cost_installations" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right @error('total_cost_installations') is-invalid error @enderror">
                    €
                    @error('total_cost_installations')
                    <span class="invalid-feedback pl-3 m-0" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
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
                        <input type="number" value="{{old('total_replacing_cost_1') ?? $vertwall->total_replacing_cost_1}}" name="total_replacing_cost_1" id="total_replacing_cost_1" class="ml-2 text-right px-2 border @error('total_replacing_cost_1') is-invalid error @enderror" style="width:120px">
                        @error('total_replacing_cost_1')
                        <span class="invalid-feedback pl-3 m-0" role="alert">
                            <strong>{{ 'incorrect' }}</strong>
                        </span>
                        @enderror
                    </label>
                    <span>€</span>
                </div>
                <div class="d-flex align-items-center ml-4">
                    <span>SAL. n.2</span>
                    <label for="total_replacing_cost_2" class="d-flex flex-column align-items-end mb-3 mr-1">
                        <small class="black">almeno al 60%</small>
                        <input type="number" value="{{old('total_replacing_cost_2') ?? $vertwall->total_replacing_cost_2}}" name="total_replacing_cost_2" id="total_replacing_cost_2" class="ml-2 text-right px-2 border @error('total_replacing_cost_2') is-invalid error @enderror" style="width:120px">
                        @error('total_replacing_cost_2')
                        <span class="invalid-feedback pl-3 m-0" role="alert">
                            <strong>{{ 'incorrect' }}</strong>
                        </span>
                        @enderror
                    </label>
                    <span>€</span>
                </div>
                <div class="d-flex align-items-center ml-4">
                    <span>SAL.F</span>
                    <label for="final_replacing_cost" class="d-flex flex-column align-items-end mr-1 mb-0">
                        <input type="number" value="{{old('final_replacing_cost') ?? $vertwall->final_replacing_cost}}" name="final_replacing_cost" id="final_replacing_cost" class="ml-2 border text-right px-2 @error('final_replacing_cost') is-invalid error @enderror" style="width:120px;">
                        @error('total_acs_project_cost')
                        <span class="invalid-feedback pl-3 m-0" role="alert">
                            <strong>{{ 'incorrect' }}</strong>
                        </span>
                        @enderror
                    </label>
                    <span>€</span>
                </div>
                <div class="d-flex align-items-center ml-4">
                    <span>SAL. 1+2</span>
                    <label for="" class="d-flex flex-column align-items-end mr-1 mb-0">
                        <input type="number" value="{{$vertwall->total_replacing_cost_1 + $vertwall->total_replacing_cost_2}}" name="" id="" class="ml-2 border text-right px-2" style="width:120px; background-color: #f2f2f2">
                    </label>
                    <span>€</span>
                </div>
                <div class="d-flex align-items-center ml-4">
                    <span>SAL. 1+2 F</span>
                    <label for="" class="d-flex flex-column align-items-end mr-1 mb-0">
                        <input type="number" value="{{$vertwall->total_replacing_cost_1 + $vertwall->total_replacing_cost_2 + $vertwall->final_replacing_cost}}" name="" id="" class="ml-2 border text-right px-2" style="width:120px; background-color: #f2f2f2">
                    </label>
                    <span>€</span>
                </div>
            </div>

            <div class="d-flex align-items-center mt-2 mb-4" style="width:80%;">
                <p class="m-0 font-weight-bold">Il risparmio di energia primaria non rinnovabile di progetto è</p>
                <label for="replacing_energetic_savings" class=" m-0 mr-4 black">
                    <input type="number" value="{{old('replacing_energetic_savings') ?? $vertwall->replacing_energetic_savings}}" name="replacing_energetic_savings" id="replacing_energetic_savings" style="width: 120px;" class="border ml-2 px-2 text-right @error('replacing_energetic_savings') is-invalid error @enderror">
                    KWh/anno
                    @error('replacing_energetic_savings')
                    <span class="invalid-feedback pl-3 m-0" role="alert">
                            <strong>{{ 'incorrect' }}</strong>
                        </span>
                    @enderror
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
