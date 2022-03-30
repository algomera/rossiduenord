@extends('business.layouts.business')

@section('content')
    @include('business.layouts.partials.practiceNav')
    @include('business.layouts.partials.nav_superbonus')


            <form action="{{ route('business.update_towed_vertical_wall', ['practice' => $practice]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="px-20">
                    <h6>Interventi trainati</h6>
                    <hr style="margin-top: 5px; background-color: #211e16;">

                    <p class="m-0">Interventi trainanti oggetto dei lavori</p>
                    <hr style="margin-top: 5px; background-color: #818387;">
                </div>

                <div class="d-flex" style="font-weight: 500">

                    <div class="px-20 border-right" style="width: 20%">{{-- column left --}}
                        <div class="d-flex align-items-center pb-2 pt-0">
                            <img src="{{ asset('/img/icon/round-yellow.svg')}}" alt="">
                            <p class="m-0 ml-2 font-weight-bold">Parti comuni</p>
                        </div>
                        {{-- loop condomini --}}
                        @forelse($condomini as $condomino)
                        <div class="d-flex align-items-center py-2">
                            <img src="{{ asset('/img/icon/round-green.svg')}}" alt="">
                            <p class="m-0 ml-2">
                                {{ $condomino->name }} {{ $condomino->surname }} - {{ $condomino->foglio }}
                                {{ $condomino->part }} {{ $condomino->sub }}
                            </p>
                        </div>
                        @empty
                            <div class="d-flex align-items-center py-2">
                                <p class="m-0 ml-2">Nessun dato</p>
                            </div>
                        @endforelse
                        {{-- loop condomini --}}
                    </div>

                    <div style="width: 80%" class="pb-20 px-4 scroll">{{-- column right --}}

                        <div style="width: 100%; margin-bottom: 30px;">{{-- Date condomino --}}
                            <div class="box_date_condomino">
                                <div class="row_input">
                                    <label for="">
                                        Foglio
                                        <input type="number" name="" id="">
                                    </label>
                                    <label for="">
                                        Particella
                                        <input type="number" name="" id="">
                                    </label>
                                    <label for="">
                                        Subalterno
                                        <input type="number" name="" id="">
                                    </label>
                                    <label for="">
                                        <select name="" id="">
                                            <option value="A/2">A/2</option>
                                            <option value="A/3">A/3</option>
                                            <option value="A/4">A/4</option>
                                            <option value="A/5">A/5</option>
                                            <option value="A/6">A/6</option>
                                            <option value="A/7">A/7</option>
                                            <option value="A/11">A/11</option>
                                            <option value="C/4">C/4 solo spogliatoi</option>
                                            <option value="D/6">D/6 solo spogliatoi</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="row_input" style="margin-bottom: 20px;">
                                    <label for="">
                                        Quota millesimi involucro
                                        <input type="number" name="" id="">
                                    </label>
                                    <label for="">
                                        Quota millesimi impianti
                                        <input type="number" name="" id="">
                                    </label>
                                    <label for="">
                                        Superfice catastale
                                        <input type="number" name="" id="">
                                        m²
                                    </label>
                                </div>

                                <h6>Dati beneficiario</h6>
                                <div class="row_input">
                                    <label for="">
                                        Tipo beneficiario
                                        <select name="" id="">
                                            <option value="Persona fisica">Persona fisica</option>
                                            <option value="IACP">IACP</option>
                                            <option value="Coop. Abit a prop. Indivisa">Coop. Abit a prop. Indivisa</option>
                                            <option value="ONLUS">ONLUS</option>
                                            <option value="Ass. we società sportive">Ass. we società sportive</option>
                                            <option value="Altri soggetti">Altri soggetti</option>
                                        </select>
                                    </label>
                                    <label for="">
                                        Titolo di possesso
                                        <select name="" id="">
                                            <option value="Proprietario o comproprietario">Proprietario o comproprietario</option>
                                            <option value="Detentore o co-detentore">Detentore o co-detentore</option>
                                            <option value="Familiare convivente con il possessore o con il detentore">Familiare convivente con il possessore o con il detentore</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="">
                                        Cognome
                                        <input type="text" name="" id="">
                                    </label>
                                    <label for="">
                                        Nome
                                        <input type="text" name="" id="">
                                    </label>
                                    <label for="">
                                        Titolo di possesso
                                        <select name="" id="">
                                            <option value="M">M</option>
                                            <option value="F">F</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="">
                                        Data di nascita
                                        <input type="date" name="" id="">
                                    </label>
                                    <label for="">
                                        Nazione di nascita
                                        <select name="" id="">
                                            @foreach ($countries as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                    <label for="">
                                        Comune di nascita
                                        <input type="text" name="" id="">
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="">
                                        Cod. fiscale
                                        <input class="input_large" type="text" name="" id="">
                                    </label>
                                    <label for="">
                                        Partita IVA
                                        <input class="input_large" type="text" name="" id="">
                                    </label>
                                </div>

                                <h6>Residenza</h6>
                                <div class="row_input">
                                    <label for="">
                                        Nazione
                                        <select name="" id="">
                                            @foreach ($countries as $country)
                                                <option value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="">
                                        Indirizzo
                                        <input class="input_large" type="text" name="" id="">
                                    </label>
                                    <label for="">
                                        CAP
                                        <input class="input_small" type="text" name="" id="">
                                    </label>
                                    <label for="">
                                        Comune
                                        <input class="input_large" type="text" name="" id="">
                                    </label>
                                    <label for="">
                                        Prov.
                                        <input class="input_small" type="text" name="" id="">
                                    </label> 
                                </div>
                                <div class="row_input">
                                    <label for="">
                                        Telefono
                                        <input class="input_large" type="text" name="" id="">
                                    </label> 
                                </div>
                            </div>
                        </div>

                        <div>{{-- 1. Intervento di isolamento termico delle superfici opache verticali e orizzontali --}}
                            <label class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="thermical_isolation_intervention" value="true"  {{$towed_vw->thermical_isolation_intervention == 'true' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                                <span class="black" ><b>1. Intervento di isolamento termico delle superfici opache verticali e orizzontali</b></span>
                            </label>
                            <p>Le superfici oggetto dell'intervento sono:</p>

                            <div class="nav_bonus d-flex align-items-center">
                                <a class="frame">(PV) Pareti Verticali</a>
                                <a>(PO) Coperture</a>
                                <a>(PS) Pavimenti</a>
                            </div>

                            <table class="table_bonus" style="width: 100%">
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
                                        <td class="text-center"></td>
                                        <td class="text-right">0,00</td>
                                        <td class="text-right">0,00</td>
                                        <td class="text-right">0,00</td>
                                        <td class="text-right">0,00 </td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="d-flex mt-5" style="background-color: #f2f2f2; width:100%; padding:5px 10px">
                                <div class="d-flex mr-4">
                                    <p class="m-0">Totale “pareti verticali”</p>
                                    <label for="total_vertical_walls" class="m-0 black">
                                        <input type="number" value="{{$towed_vw->total_vertical_walls}}" name="total_vertical_walls" class="border ml-2 px-2 text-right" style="width: 80px">
                                        m²
                                    </label>
                                </div>
                                <div class="d-flex mr-4">
                                    <p class="m-0">di cui realizzati SAL n. 1</p>
                                    <label for="vw_realized_1" class="m-0  black">
                                        <input type="number" value="{{$towed_vw->vw_realized_1}}" name="vw_realized_1" class="border ml-2 px-2 text-right" style="width: 80px">
                                        m²
                                    </label>
                                </div>
                                <div class="d-flex mr-4">
                                    <p class="m-0">SAL n. 2</p>
                                    <label for="vw_realized_2" class="m-0  black">
                                        <input type="number" value="{{$towed_vw->vw_realized_2}}" name="vw_realized_2" class="border ml-2 px-2 text-right" style="width: 80px">
                                        m²
                                    </label>
                                </div>
                                <div class="d-flex mr-4">
                                    <p class="m-0">SAL F.</p>
                                    <label for="" class="m-0  black">
                                        <input type="number" value="" class="border ml-2 px-2 text-right" style="width: 80px">
                                        m²
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-3" style="width:100%;">
                                <p class="m-0">Superficie totale oggetto dell’intervento</p>
                                <label for="total_intervention_surface" class=" m-0 mr-4 black">
                                    <input type="number" value="{{$towed_vw->total_intervention_surface}}" name="total_intervention_surface" style="width: 80px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                    m²
                                </label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il costo complessivo previsto in progetto dei lavori sulle pratiche opache ammonta a*</p>
                                    <label for="expected_project_cost" class=" m-0 mr-4 black">
                                        <input type="number" value="{{$towed_vw->expected_project_cost}}" name="expected_project_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>
                        </div>

                        <div>{{-- IN. Sostituzione degli infissi --}}
                            <label class="checkbox-wrapper d-flex mt-5">
                                <input type="checkbox" name="fixture_replacing_intervention" value="true" {{$towed_vw->fixture_replacing_intervention == 'true' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                                <span class="black" ><b>IN. Sostituzione degli infissi</b></span>
                            </label>

                            <p>Le superfici oggetto dell'intervento sono:</p>

                            <table class="table_bonus" style="width: 100%">
                                <thead>
                                    <tr>
                                        <td class="text-center" style="width:5%;"><b>N.</b></td>
                                        <td style="width:15%;"><b>Descrizione</b></td>
                                        <td style="width:10%;"><b>Superficie (m2)</b></td>
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
                                        <td style="width:10%;">
                                            <b>Telaio prima</b>
                                        </td>
                                        <td style="width:10%;"><b>Vetro prima</b></td>
                                        <td style="width:10%;"><b>Telaio dopo</b></td>
                                        <td style="width:10%;"><b>Vetro dopo</b></td>
                                        <td style="width:10%;"><b>Oscurante</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center"></td>
                                        <td class="text-right">0,00</td>
                                        <td class="text-right">0,00</td>
                                        <td class="text-right">0,00</td>
                                        <td class="text-right"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="d-flex align-items-center justify-content-between mt-5" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Le spese previste in progetto dei lavori al punto IN ammontano a*</p>
                                    <label for="fixture_expected_cost" class=" m-0 mr-4 black">
                                        <input type="number" value="{{$towed_vw->fixture_expected_cost}}" name="fixture_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <p class="m-0 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>

                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa prevista per gli interventi di cui ai punti PV, PO, PS e IN ammonta a*</p>
                                    <label for="work_expected_cost" class=" m-0 mr-4 black">
                                        <input type="number" name="work_expected_cost" value="{{$towed_vw->work_expected_cost}}" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>
                            <p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>

                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa massima ammissibile è pari a</p>
                                    <label for="max_possible_cost" class=" m-0 mr-4 black">
                                        <input type="number" name="max_possible_cost" value="{{$towed_vw->max_possible_cost}}" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il risparmio di energia primaria non rinnovabile di progetto è</p>
                                    <label for="fixture_energetic_savings" class=" m-0 mr-4 black">
                                        <input type="number" value="{{$towed_vw->fixture_energetic_savings}}"  name="fixture_energetic_savings" style="width: 120px;" class="border ml-2 px-2 text-right">
                                        KWh/anno
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">{{-- SS. Schermate solari e chiusure oscuranti --}}
                            <label for="SS" class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="SS" id="SS" value="true" {{$towed_vw->SS == 'true' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                                <span class="black" ><b>SS. Schermate solari e chiusure oscuranti</b></span>
                            </label>
                            <div class="px-20 pt-20 pb-20" style="width: 100%; min-height: 160px; background-color: #f2f2f2 ">
                                <div class="box_input" id="">
                                    <div class="row_input">
                                        <label for="">
                                            Tipo scherm./chiusura oscurante
                                            <select name="" id="">
                                                <option value="Persiana">Persiana</option>
                                                <option value="Persiana avvolgibile">Persiana avvolgibile</option>
                                                <option value="Tenda o veneziana">Tenda o veneziana</option>
                                                <option value="Altra schermatura solare">Altra schermatura solare</option>
                                                <option value="Altra chiusura oscurante">Altra chiusura oscurante</option>
                                            </select>
                                        </label>
                                        <label for="">
                                            Installazione
                                            <select name="" id="">
                                                <option value="Interna">Interna</option>
                                                <option value="Esterna">Esterna</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="row_input">
                                        <label for="">
                                            Superfice scherm./chiusura oscurante
                                            <input class="input_small" type="number" name="" id="">
                                            m²
                                        </label>
                                        <label for="">
                                            Superfice finestra protetta
                                            <input class="input_small" type="number" name="" id="">
                                            m²
                                        </label>
                                    </div>
                                    <div class="row_input">
                                        <label for="">
                                            Resist. termica suppl.
                                            <input class="input_small" type="number" name="" id="">
                                            m² K/W
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
                                        <label for="">
                                            Tipo di calcolo
                                            <select name="" id="">
                                                <option value="Dichiarato dal produttore">Dichiarato dal produttore</option>
                                                <option value="Da tabella 'Chiusure oscuranti'">Da tabella 'Chiusure oscuranti'</option>
                                                <option value="Calcolo secondo UNI EN 13125">Calcolo secondo UNI EN 13125</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="row_input">
                                            <label for="">
                                                gtot
                                                <input class="input_small" type="number" name="" id="">
                                            </label>
                                            <label for="">
                                                Classe scherm.
                                                <input class="input_small" type="number" name="" id="">
                                            </label>
                                            <label for="">
                                                Materiale scherm
                                                <select name="" id="">
                                                    <option value="Tessuto">Tessuto</option>
                                                    <option value="Legno'">Legno'</option>
                                                    <option value="Plastica">Plastica</option>
                                                    <option value="PVC">PVC</option>
                                                    <option value="Metallo">Metallo</option>
                                                    <option value="Misto">Misto</option>
                                                    <option value="Altro">Altro</option>
                                                </select>
                                            </label>
                                            <label for="">
                                                Meccanismo reg.
                                                <select name="" id="">
                                                    <option value="Manuale">Manuale</option>
                                                    <option value="Automatico">Automatico</option>
                                                    <option value="Servoassistito">Servoassistito</option>
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
                            <div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Le spese previste in progetto dei lavori al punto SS ammontano a*</p>
                                    <label for="ss_project_cost" class=" m-0 mr-4 black">
                                        <input type="number" value="{{$towed_vw->ss_project_cost}}" name="ss_project_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa massima ammissibile è pari a</p>
                                    <label for="ss_max_cost" class=" m-0 mr-4 black">
                                        <input type="number" name="ss_max_cost" value="{{$towed_vw->ss_max_cost}}" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il risparmio di energia primaria non rinnovabile di progetto è</p>
                                    <label for="ss_energetic_savings" class=" m-0 mr-4 black">
                                        <input type="number" name="ss_energetic_savings" value="{{$towed_vw->ss_energetic_savings}}" style="width: 120px;" class="border ml-2 px-2 text-right">
                                        KWh/anno
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">{{-- 2 sezione inpianti --}}
                            <label for="wacs_replacement" class="checkbox-wrapper d-flex">
                                <input type="checkbox" {{$towed_vw->wacs_replacement == 'true' ? 'checked' : ''}} name="wacs_replacement" id="wacs_replacement" value="true">
                                <span class="checkmark"></span>
                                <span class="black" ><b>2.Intervento di sostituzione degli impianti di climatizzazione invernale esistenti</b></span>
                            </label>
                            <p>Con impianti dotati di:</p>
                            <hr>
                        </div>

                        <div class="mt-5">{{-- CC. Caldaie a condensazione --}}
                            <label for="condensing_boiler" class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="condensing_boiler" id="condensing_boiler" value="true" {{$towed_vw->condensing_boiler == 'true' ? 'checked': ''}}>
                                <span class="checkmark"></span>
                                <span class="black" ><b>CC. Caldaie a condensazione</b></span>
                            </label>
                            <div class="px-20 pt-20 pb-20" style="width: 100%; min-height: 160px; background-color: #f2f2f2 ">
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

                        <div class="mt-5">{{-- GA. Generatori di aria calda a condensazione --}}
                            <label for="condensing_generator" class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="condensing_generator" id="condensing_generator" value="true" {{$towed_vw->condensing_generator == 'true' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                                <span class="black" ><b>GA. Generatori di aria calda a condensazione</b></span>
                            </label>
                            <div class="px-20 pt-20 pb-20" style="width: 100%; min-height: 160px; background-color: #f2f2f2 ">
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
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="row_input">
                                            <label for="">
                                                Rend. utile nom. (100%)
                                                <input class="input_small" type="number" name="" id="">
                                                %
                                            </label>
                                            <label for="">
                                                Tipo di alimentazione
                                                <select name="" id="">
                                                    <option value="Gas Naturale (Metano)">Gas Naturale (Metano)</option>
                                                    <option value="GPL">GPL</option>
                                                    <option value="Gasolio">Gasolio</option>
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

                        <div class="mt-5">{{-- PC) Pompe di calore (PDC) --}}
                            <label for="absorption_heat_pumps" class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="absorption_heat_pumps" id="absorption_heat_pumps" value="true" {{$towed_vw->absorption_heat_pumps == 'true' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                                <span class="black" ><b>PC) Pompe di calore (PDC)</b></span>
                            </label>
                            <div class="px-20 pt-20 pb-20" style="width: 100%; min-height: 160px; background-color: #f2f2f2 ">
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
                                <input type="checkbox" name="absorption_heat_pumps" id="absorption_heat_pumps" value="true" {{$towed_vw->absorption_heat_pumps == 'true' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                                <span class="black" ><b>PCA. Pompe di calore ad assorbimento a gas</b></span>
                            </label>
                            <div class="px-20 pt-20 pb-20" style="width: 100%; min-height: 160px; background-color: #f2f2f2 ">
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
                                <input type="checkbox" name="hybrid_system" id="hybrid_system" value="true" {{$towed_vw->hybrid_system == 'true' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                                <span class="black" ><b>SI. Sistemi ibridi</b></span>
                            </label>
                            <div class="px-20 pt-20 pb-20" style="width: 100%; min-height: 160px; background-color: #f2f2f2 ">
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

                        <div>{{-- SA. Installazione di scaldacqua a pompa di calore --}}
                            <div class="mt-5">
                                <label for="water_heatpumps_installation" class="checkbox-wrapper d-flex">
                                    <input type="checkbox" name="water_heatpumps_installation" id="water_heatpumps_installation" value="true" {{$towed_vw->water_heatpumps_installation == ' true' ? 'checked' : ''}}>
                                    <span class="checkmark"></span>
                                    <span class="black" ><b>SA. Installazione di scaldacqua a pompa di calore</b></span>
                                </label>
                                <p class="font-italic">In sostituzione di scaldacqua tradizionali con scaldacqua a pompa di calore dedicati alla produzione di acqua calda sanitaria</p>
                                <div class="px-20 pt-20 pb-20" style="width: 100%; min-height: 160px; background-color: #f2f2f2 ">
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
                            <div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il costo complessivo previsto degli interventi sull’impianto (Punto 2) ammonta a *</p>
                                    <label for="SA_expected_cost" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$towed_vw->SA_expected_cost}}" name="SA_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>

                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa massima ammissibile per la sostituzione degli impianti è pari a</p>
                                    <label for="SA_max_cost" class=" m-0 mr-4 black">
                                        <input type="text" name="SA_max_cost" value="{{$towed_vw->SA_max_cost}}" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il risparmio di energia primaria non rinnovabile di progetto è</p>
                                    <label for="SA_nr_savings" class=" m-0 mr-4 black">
                                        <input type="text" name="SA_nr_savings" value="{{$towed_vw->SA_nr_savings}}" style="width: 120px;" class="border ml-2 px-2 text-right">
                                        KWh/anno
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div>{{-- CO. Sistemi di microgenerazione --}}
                            <div class="mt-5">
                                <label for="microgeneration_system" class="checkbox-wrapper d-flex">
                                    <input type="checkbox" name="microgeneration_system" id="microgeneration_system" value="true" {{$towed_vw->microgeneration_system == 'true' ? 'checked' : ''}}>
                                    <span class="checkmark"></span>
                                    <span class="black" ><b>CO. Sistemi di microgenerazione</b></span>
                                </label>
                                <div class="px-20 pt-20 pb-20" style="width: 100%; min-height: 160px; background-color: #f2f2f2 ">
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
                            <div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il costo previsto per i sistemi di microgenerazione CO) ammonta a *</p>
                                    <label for="CO_expected_cost" class=" m-0 mr-4 black">
                                        <input type="text" name="CO_expected_cost" value="{{$towed_vw->CO_expected_cost}}" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>

                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa massima ammissibile per l’intrevento è pari a</p>
                                    <label for="CO_max_cost" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$towed_vw->CO_max_cost}}" name="CO_max_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il risparmio di energia primaria non rinnovabile di progetto è</p>
                                    <label for="CO_nr_savings" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$towed_vw->CO_nr_savings}}" name="CO_nr_savings" style="width: 120px;" class="border ml-2 px-2 text-right">
                                        KWh/anno
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div>{{-- IB. Generatori a biomamassa --}}
                            <div class="mt-5">
                                <label for="biome_generators" class="checkbox-wrapper d-flex">
                                    <input type="checkbox" name="biome_generators" id="biome_generators" value="true" {{$towed_vw->biome_generators == 'true' ? 'checked' : ''}}>
                                    <span class="checkmark"></span>
                                    <span class="black" ><b>IB. Generatori a biomamassa</b></span>
                                </label>
                                <p class="font-italic">Installazione di impianti di climatizzazione invernale dotati di generatori di calore alimentati da biomasse combustibili</p>
                                <div class="px-20 pt-20 pb-20" style="width: 100%; min-height: 160px; background-color: #f2f2f2 ">
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
                                                Classe generatore
                                                <select name="" id="">
                                                    <option value="4 stelle">4 stelle</option>
                                                    <option value="5 stelle">5 stelle</option>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="row_input">
                                            <label for="">
                                                Tipo generatore
                                                <select name="" id="">
                                                    <option value="Caldaia a biomassa">Caldaia a biomassa</option>
                                                    <option value="Termocamini e stufe">Termocamini e stufe</option>
                                                </select>
                                            </label>
                                            <label for="">
                                                Impianto destinato a
                                                <select name="" id="">
                                                    <option value="Riscaldamento ambiente">Riscaldamento ambiente</option>
                                                    <option value="Risc. amb. + prod. ACS">Risc. amb. + prod. ACS</option>
                                                </select>
                                            </label>
                                            <label for="">
                                                Tipo di alimentazione
                                                <select name="" id="">
                                                    <option value="Legna">Legna</option>
                                                    <option value="Pellet">Pellet</option>
                                                    <option value="Cippato">Cippato</option>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="row_input">
                                                <label for="">
                                                    Pot. Utile nom.
                                                    <input class="input_small" type="number" name="" id="">
                                                    kW
                                                </label>
                                                <label for="">
                                                    P. al focolare
                                                    <input class="input_small" type="number" name="" id="">
                                                    kW
                                                </label>
                                                <label for="">
                                                    Rend. utile alla pot. nom.
                                                    <input class="input_small" type="number" name="" id="">
                                                    %
                                                </label>
                                                <label for="">
                                                    Sup. riscaldata
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
                            <div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il costo previsto per i generatori a biomassa IB) ammonta a *</p>
                                    <label for="IB_expected_cos" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$towed_vw->IB_expected_cost}}" name="IB_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>

                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa massima ammissibile per l’intrevento è pari a</p>
                                    <label for="IB_max_cost" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$towed_vw->IB_max_cost}}" name="IB_max_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il risparmio di energia primaria non rinnovabile di progetto è</p>
                                    <label for="IB_nr_savings" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$towed_vw->IB_nr_savings}}" name="IB_nr_savings" style="width: 120px;" class="border ml-2 px-2 text-right">
                                        KWh/anno
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div>{{-- BA. Bullding automation --}}
                            <div class="mt-5">
                                <label for="building_automation" class="checkbox-wrapper d-flex">
                                    <input type="checkbox" name="building_automation" id="building_automation" value="true" {{$towed_vw->building_automation == 'true' ? 'checked' : ''}}>
                                    <span class="checkmark"></span>
                                    <span class="black" ><b>BA. Bullding automation</b></span>
                                </label>
                            </div>
                            <p>I sistemi di Building Automation dedicati al controllo di:</p>
                            <div class="d-flex">
                                <div class="mr-5">
                                    <p class="m-0">Climatizzazione invernale</p>
                                    <input type="radio" name="BA_winter_acs" value="N.D" {{$towed_vw->BA_winter_acs == 'N.D' ? 'checked' : ''}} id="">
                                    <label for="BA_winter_acs" class="mr-3 black" >N.D</label>
                                    <input type="radio" name="BA_winter_acs" value="NO" {{$towed_vw->BA_winter_acs == 'NO' ? 'checked' : ''}} id="">
                                    <label for="BA_winter_acs" class="mr-3 black">No</label>
                                    <input type="radio" name="BA_winter_acs" value="SI" {{$towed_vw->BA_winter_acs == 'SI' ? 'checked' : ''}} id="">
                                    <label for="BA_winter_acs" class="mr-3 black">Si</label>
                                </div>
                                <div class="mr-5">
                                    <p class="m-0">Climatizzazione estiva</p>
                                    <input type="radio" name="BA_summer_acs" value="N.D" {{$towed_vw->BA_summer_acs == 'N.D' ? 'checked' : ''}}>
                                    <label for="BA_summer_acs" class="mr-3 black">N.D</label>
                                    <input type="radio" name="BA_summer_acs" value="NO" {{$towed_vw->BA_summer_acs == 'NO' ? 'checked' : ''}}>
                                    <label for="BA_summer_acs" class="mr-3 black">No</label>
                                    <input type="radio" name="BA_summer_acs" value="SI" {{$towed_vw->BA_summer_acs == 'SI' ? 'checked' : ''}}>
                                    <label for="BA_summer_acs" class="mr-3 black">Si</label>
                                </div>
                                <div class="mr-5">
                                    <p class="m-0">Produzione di acqua calda sanitaria</p>
                                    <input type="radio" name="BA_hot_water_production" value="N.D" {{$towed_vw->BA_hot_water_production == 'N.D' ? 'checked' : ''}}>
                                    <label for="BA_hot_water_production" class="mr-3 black">N.D</label>
                                    <input type="radio" name="BA_hot_water_production" value="NO" {{$towed_vw->BA_hot_water_production == 'NO' ? 'checked' : ''}}>
                                    <label for="BA_hot_water_production" class="mr-3 black">No</label>
                                    <input type="radio" name="BA_hot_water_production" value="SI" {{$towed_vw->BA_hot_water_production == 'SI' ? 'checked' : ''}}>
                                    <label for="BA_hot_water_production" class="mr-3 black">Si</label>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Superficie utile degli ambienti controllati</p>
                                    <label for="BA_usable_area" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$towed_vw->BA_usable_area}}" name="BA_usable_area" style="width: 120px;" class="border ml-2 px-2 text-right">
                                        m²
                                    </label>
                                </div>
                            </div>
                            <p>I dispositivi installati hanno caratteristiche e funzioni conformi a quanto previsto dal “decreto requisiti ecobonus”</p>
                            <div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il costo previsto per Building automation BA) ammonta a *</p>
                                    <label for="BA_expected_cost" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$towed_vw->BA_expected_cost}}" name="BA_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <p class="font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa massima ammissibile dal “decreto requisiti ecobonus” è pari a</p>
                                    <label for="BA_max_cost" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$towed_vw->BA_max_cost}}" name="BA_max_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il risparmio di energia primaria non rinnovabile di progetto è</p>
                                    <label for="BA_nr_savings" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$towed_vw->BA_nr_savings}}" name="BA_nr_savings" style="width: 120px;" class="border ml-2 px-2 text-right">
                                        KWh/anno
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div>{{-- Gli impianti sopra indicati sono destinati a: --}}
                            <p class="font-weight-bold">Gli impianti sopra indicati sono destinati a:</p>
                            <div class="d-flex">
                                <label for="winter_acs" class="checkbox-wrapper d-flex">
                                    <input type="checkbox" name="winter_acs" id="winter_acs" value="true" {{$towed_vw->winter_acs == 'true' ? 'checked' : ''}}>
                                    <span class="checkmark"></span>
                                    <span class="black" >Climatizzazione invernale</span>
                                </label>
                                <label for="summer_acs" class="checkbox-wrapper d-flex ml-5">
                                    <input type="checkbox" name="summer_acs" id="summer_acs" value="true" {{$towed_vw->summer_acs == 'true' ? 'checked' : ''}}>
                                    <span class="checkmark"></span>
                                    <span class="black" >Climatizzazione estiva</span>
                                </label>
                                <label for="hot_water_production" class="checkbox-wrapper d-flex ml-5">
                                    <input type="checkbox" name="hot_water_production" id="hot_water_production" value="true" {{$towed_vw->hot_water_production == 'true' ? 'checked' : ''}}>
                                    <span class="checkmark"></span>
                                    <span class="black" >Produzione di acqua calda sanitaria</span>
                                </label>
                            </div>
                        </div>

                        <div class="mt-5">{{-- ST. Collettori solari --}}
                            <label for="TS" class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="TS" id="TS" value="true" {{$towed_vw->TS == 'true' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                                <span class="black" ><b>ST. Collettori solari</b></span>
                            </label>
                            <div class="px-20 pt-20 pb-20" style="width: 100%; min-height: 160px; background-color: #f2f2f2 ">
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
                            <div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il costo previsto per i Collettori solari ST) ammonta a *</p>
                                    <label for="TS_expected_cost" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$towed_vw->TS_expected_cost}}" name="TS_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>

                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa massima ammissibile è pari a</p>
                                    <label for="TS_max_cost" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$towed_vw->TS_max_cost}}" name="TS_max_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il risparmio di energia primaria non rinnovabile di progetto è</p>
                                    <label for="TS_nr_savings" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$towed_vw->TS_nr_savings}}" name="TS_nr_savings" style="width: 120px;" class="border ml-2 px-2 text-right">
                                        KWh/anno
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">{{-- FV. Fotovoltaico --}}
                            <label class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="FV" id="FV" value="true" {{$towed_vw->FV == 'true' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                                <span class="black" ><b>FV. Fotovoltaico</b></span>
                            </label>
                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label for="POD_code" class=" m-0 mr-4 black">Codice POD</label>
                                        <input type="text" value="{{$towed_vw->POD_code}}" name="POD_code" style="width: 180px;" class="border ml-2 px-2 text-right">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between ml-5">
                                    <div class="d-flex align-items-center">
                                        <p class="m-0 black" style="font-weight: 500">Potenza di picco</p>
                                        <label for="max_power" class=" m-0 mr-4 black">
                                            <input type="text" value="{{$towed_vw->max_power}}" name="max_power" style="width: 120px;" class="border ml-2 px-2 text-right">
                                            kW
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il costo previsto per il Fotovoltaico FV) ammonta a *</p>
                                    <label for="FV_expected_cost" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$towed_vw->FV_expected_cost}}" name="FV_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa massima ammissibile è pari a</p>
                                    <label for="FV_max_cost" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$towed_vw->FV_max_cost}}" name="FV_max_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">{{-- AC. Sistema di accumulo --}}
                            <label for="AC" class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="AC" id="AC" value="true" {{$towed_vw->AC == 'true' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                                <span class="black" ><b>AC. Sistema di accumulo</b></span>
                            </label>
                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label for="capacity" class=" m-0 mr-4 black">Capacità</label>
                                        <input type="text" value="{{$towed_vw->capacity}}" name="capacity" style="width: 180px;" class="border ml-2 px-2 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il costo previsto per il Sistema di accumulo AC) ammonta a *</p>
                                    <label for="AC_expected_cost" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$towed_vw->AC_expected_cost}}" name="AC_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa massima ammissibile è pari a</p>
                                    <label for="AC_max_cost" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$towed_vw->AC_max_cost}}" name="AC_max_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">{{-- CR. Infrastrutture per la ricarica di veicoli elettrici --}}
                            <label for="CR" class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="CR" id="CR" value="true" {{$towed_vw->CR == 'true' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                                <span class="black" ><b>CR. Infrastrutture per la ricarica di veicoli elettrici</b></span>
                            </label>
                            <div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Il costo previsto per le infrastrutture CR) ammonta a *</p>
                                    <label for="CR_expected_cost" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$towed_vw->CR_expected_cost}}" name="CR_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <p class="m-0 mt-2 font-italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</p>

                            <div class="d-flex">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <label for="CR_installed_columns" class=" m-0 mr-4 black">Numero di colonnine installate</label>
                                        <input type="text" value="{{$towed_vw->CR_installed_columns}}" name="CR_installed_columns" style="width: 180px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-3" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">La spesa massima ammissibile è pari a</p>
                                    <label for="CR_max_cost" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$towed_vw->CR_max_cost}}" name="CR_max_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">{{-- EBA. Eliminazione delle barriere architettoniche --}}
                            <label for="EBA" class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="EBA" id="EBA" value="true" {{$towed_vw->EBA == 'true' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                                <span class="black" ><b>EBA. Eliminazione delle barriere architettoniche</b></span>
                            </label>
                            <div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">
                                <div class="d-flex align-items-end" style="width: 65%">
                                    <p class="m-0">
                                        a) Il costo omnicomprensivo previsto in progetto dell’intervento di cui all’articolo 16-bis, comma 1, lettera e),
                                        del testo unico di cui al decreto del Presidente della Repubblica 22 dicembre 1986, n.917 anche ove effettuati in
                                        favore di persone di età superiore a sessantacinque anni è di
                                        <label for="EBA_expected_cost" class=" m-0 mr-4 black">
                                            <input type="text" value="{{$towed_vw->EBA_expected_cost}}" name="EBA_expected_cost" style="width: 120px;" class="border mr-2 px-2 text-right">
                                            €
                                        </label>
                                    </p>
                                </div>
                                <button class="add-button">Computo metrico</button>
                            </div>
                            <div class="d-flex align-items-end mt-4" style="width: 65%">
                                <p class="m-0">
                                    b) Per le stesse unità immobiliari sono previste spese complessive relative ad interventi antisismici di cui
                                    al comma 4 dell’art.119 del D.L. 34/2020 e successive modificazioni e ad altri interventi di cui all’art. 16 bis
                                    del DPR 917/86, pari a
                                    <label for="EBA_sismic_cost" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$towed_vw->EBA_sismic_cost}}" name="EBA_sismic_cost" style="width: 120px;" class="border mr-2 px-2 text-right">
                                        €
                                    </label>
                                </p>
                            </div>
                            <div class="d-flex align-items-end mt-4" style="width: 65%">
                                <p class="m-0">
                                    Fermo restando che la spesa massima ammissibile per tutti gli interventi di cui ai precedenti punti a) e b)
                                    non può superare 96.000 € per unità immobiliare, la spesa massima ammissibile disponibile per l’eliminazione
                                    delle barriere architettoniche è pertanto pari a
                                    <label for="EBA_barr_deleting_cost" class=" m-0 black">
                                        <input type="text" value="{{$towed_vw->EBA_barr_deleting_cost}}" name="EBA_barr_deleting_cost" style="width: 120px; background-color: #f2f2f2" class="border px-2 text-right">
                                    </label>
                                    <span>€ che in ogni caso, non può superare N x 96.000 €</span>
                                </p>
                            </div>
                            <div class="d-flex align-items-end mt-4" style="width: 65%">
                                <p class="m-0">
                                    La spesa massima ammissibile è pari a
                                    <label for="EBA_max_cost" class=" m-0 mr-4 black">
                                        <input type="text" value="{{$towed_vw->EBA_max_cost}}" name="EBA_max_cost" style="width: 120px; background-color: #f2f2f2" class="border mr-2 px-2 text-right">
                                        €
                                    </label>
                                </p>
                            </div>

                            <div class="d-flex justify-content-between mt-4" style="width: 100%">
                                <p class="m-0 mt-2 font-500">Avanzamento lavori trainanti</p>
                                <table class="table_bonus" style="width: 70%">
                                    <thead>
                                        <tr>
                                            <td style="width:25%;"><b>Lavori</b></td>
                                            <td style="width:10%;"><b>% SAL 1</b></td>
                                            <td style="width:10%;"><b>% SAL 2</b></td>
                                            <td style="width:10%;"><b>% SAL F</b></td>
                                            <td style="width:15%;"><b>Importo SAL 1</b></td>
                                            <td style="width:15%;"><b>Importo SAL 2</b></td>
                                            <td style="width:15%;"><b>Importo SAL F</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-right"></td>
                                            <td class="text-right"></td>
                                            <td class="text-right"></td>
                                            <td class="text-right"></td>
                                            <td class="text-right"></td>
                                            <td class="text-right"></td>
                                            <td class="text-right"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex align-items-center mt-5" style="width: 80%">
                                <p class="m-0 font-500">per un ammontare pari a</p>
                                <div class="d-flex align-items-center ml-5">
                                    <span>SAL. n.1</span>
                                    <label for="EBA_cost_1" class="d-flex align-items-end m-0 mr-1">
                                        <input type="text" name="EBA_cost_1" value="{{$towed_vw->EBA_cost_1}}" class="ml-2 text-right px-2 border" style="width:120px; background-color: #f2f2f2">
                                    </label>
                                    <span>€</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <span>SAL. n.2</span>
                                    <label for="EBA_cost_2" class="d-flex align-items-end m-0 mr-1">
                                        <input type="text" value="{{$towed_vw->EBA_cost_2}}" name="EBA_cost_2" class="ml-2 text-right px-2 border" style="width:120px; background-color: #f2f2f2">
                                    </label>
                                    <span>€</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <span>SAL. n.F</span>
                                    <label for="" class="d-flex align-items-end m-0 mr-1">
                                        <input type="text" value="" class="ml-2 border text-right px-2" style="width:120px; background-color: #f2f2f2">
                                    </label>
                                    <span>€</span>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mt-3" style="width: 80%">
                                <p class="m-0"><b>La spesa ammessa è pari </b></p>
                                <label for="EBA_max_cost" class="d-flex align-items-end black m-0 mr-1 ml-5">
                                    <input type="text" value="{{$towed_vw->EBA_max_cost}}" name="EBA_max_cost" class="ml-2 mr-1 text-right px-2 border" style="width:120px; background-color: #f2f2f2">
                                    €
                                </label>
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
