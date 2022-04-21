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

                <div class="d-flex ov-x-none" style="font-weight: 500">
                    <div class="px-20 border-right" style="width: 20%">{{-- column left --}}
                        <a href="{{ route('business.towed_intervention', ['practice'=>$practice->id, 'condomino'=>'common', 'type'=>'PV'])}}" class="black">
                            <div class="d-flex align-items-center pb-2 pt-0" @if($condominoId != 'common') onclick="setCondominoId({{ $practice->id }}, 'common')" @endif>
                                <img src="{{ asset('/img/icon/round-yellow.svg')}}" alt="">
                                <p class="m-0 ml-2 {{ $condominoId === "common" || !$condominoId ? 'font-weight-bold' : '' }}">Parti comuni</p>
                            </div>                        
                        </a>
                        {{-- loop condomini --}}
                        @forelse($condomini as $condomino)
                        <a href="{{ route('business.towed_intervention', ['practice'=>$practice->id, 'condomino'=>$condomino->id, 'type'=>'PV'])}}">
                            <div class="d-flex align-items-center py-2" @if($condominoId != $condomino->id) onclick="setCondominoId({{ $practice->id }}, {{ $condomino->id }})" @endif>
                                <img src="{{ asset('/img/icon/round-green.svg')}}" alt="">
                                <p class="m-0 ml-2 black {{ $condominoId == $condomino->id ? 'font-weight-bold' : '' }}">
                                    {{ $condomino->name }} {{ $condomino->surname }} - {{ $condomino->foglio }}
                                    {{ $condomino->part }} {{ $condomino->sub }}
                                </p>
                            </div>
                        </a>
                        @empty
                            <div class="d-flex align-items-center py-2">
                                <p class="m-0 ml-2">Nessun codomino</p>
                            </div>
                        @endforelse
                        {{-- loop condomini --}}
                    </div>

                    <div style="width: 80%" class="pb-20 px-4 scroll">{{-- column right --}}
                        {{-- Date condomino --}}
                        {{-- START --}}
                        @if($selected_condomino !== null)
                        <div style="width: 100%; margin-bottom: 30px;">
                            <div class="box_date_condomino">
                                <div class="row_input">
                                    <label for="{{$selected_condomino->foglio}}">
                                        Foglio
                                        <input type="number" name="selected_condomino-foglio" id="selected_condomino-foglio" value="{{$selected_condomino->foglio}}">
                                    </label>
                                    <label for="{{$selected_condomino->part}}">
                                        Particella
                                        <input type="number" name="selected_condomino-part" id="selected_condomino-part" value="{{$selected_condomino->part}}">
                                    </label>
                                    <label for="{{$selected_condomino->sub}}">
                                        Subalterno
                                        <input type="number" name="selected_condomino-sub" id="selected_condomino-sub" value="{{$selected_condomino->sub}}">
                                    </label>
                                    <label for="{{$selected_condomino->categ_catastale}}">
                                        categ. catastale
                                        <select name="selected_condomino-categ_catastale" id="selected_condomino-categ_catastale">
                                            <option {{$selected_condomino->categ_catastale == 'A/2' ? 'selected' : ''}} value="A/2">A/2</option>
                                            <option {{$selected_condomino->categ_catastale == 'A/3' ? 'selected' : ''}} value="A/3">A/3</option>
                                            <option {{$selected_condomino->categ_catastale == 'A/4' ? 'selected' : ''}} value="A/4">A/4</option>
                                            <option {{$selected_condomino->categ_catastale == 'A/5' ? 'selected' : ''}} value="A/5">A/5</option>
                                            <option {{$selected_condomino->categ_catastale == 'A/6' ? 'selected' : ''}} value="A/6">A/6</option>
                                            <option {{$selected_condomino->categ_catastale == 'A/7' ? 'selected' : ''}} value="A/7">A/7</option>
                                            <option {{$selected_condomino->categ_catastale == 'A/11' ? 'selected' : ''}} value="A/11">A/11</option>
                                            <option {{$selected_condomino->categ_catastale == 'C/4' ? 'selected' : ''}} value="C/4">C/4 solo spogliatoi</option>
                                            <option {{$selected_condomino->categ_catastale == 'D/6' ? 'selected' : ''}} value="D/6">D/6 solo spogliatoi</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="row_input" style="margin-bottom: 20px;">
                                    <label for="{{$selected_condomino->millesimi_inv}}">
                                        Quota millesimi involucro
                                        <input type="number" name="selected_condomino-millesimi_inv" id="selected_condomino-millesimi_inv" value="{{$selected_condomino->millesimi_inv}}">
                                    </label>
                                    <label for="{{$selected_condomino->millesimi_imp}}">
                                        Quota millesimi impianti
                                        <input type="number" name="selected_condomino-millesimi_imp" id="selected_condomino-millesimi_imp" value="{{$selected_condomino->millesimi_imp}}">
                                    </label>
                                    <label for="{{$selected_condomino->sup_catastale}}">
                                        Superfice catastale
                                        <input type="number" name="selected_condomino-sup_catastale" id="selected_condomino-sup_catastale" value="{{$selected_condomino->sup_catastale}}">
                                        m²
                                    </label>
                                </div>

                                <h6>Dati beneficiario</h6>
                                <div class="row_input">
                                    <label for="{{$selected_condomino->type_beneficiary}}">
                                        Tipo beneficiario
                                        <select name="selected_condomino-type_beneficiary" id="selected_condomino-type_beneficiary">
                                            <option {{$selected_condomino->type_beneficiary == 'Persona fisica' ? 'selected' : ''}} value="Persona fisica">Persona fisica</option>
                                            <option {{$selected_condomino->type_beneficiary == 'IACP' ? 'selected' : ''}} value="IACP">IACP</option>
                                            <option {{$selected_condomino->type_beneficiary == 'Coop. Abit a prop. Indivisa' ? 'selected' : ''}} value="Coop. Abit a prop. Indivisa">Coop. Abit a prop. Indivisa</option>
                                            <option {{$selected_condomino->type_beneficiary == 'ONLUS' ? 'selected' : ''}} value="ONLUS">ONLUS</option>
                                            <option {{$selected_condomino->type_beneficiary == 'Ass. we società sportive' ? 'selected' : ''}} value="Ass. we società sportive">Ass. we società sportive</option>
                                            <option {{$selected_condomino->type_beneficiary == 'Altri soggetti' ? 'selected' : ''}} value="Altri soggetti">Altri soggetti</option>
                                        </select>
                                    </label>
                                    <label for="{{$selected_condomino->possession_title}}">
                                        Titolo di possesso
                                        <select name="selected_condomino-possession_title" id="selected_condomino-possession_title">
                                            <option {{$selected_condomino->possession_title == 'Proprietario o comproprietario' ? 'selected' : ''}} value="Proprietario o comproprietario">Proprietario o comproprietario</option>
                                            <option {{$selected_condomino->possession_title == 'Detentore o co-detentore' ? 'selected' : ''}} value="Detentore o co-detentore">Detentore o co-detentore</option>
                                            <option {{$selected_condomino->possession_title == 'Familiare convivente con il possessore o con il detentore' ? 'selected' : ''}} value="Familiare convivente con il possessore o con il detentore">Familiare convivente con il possessore o con il detentore</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="{{$selected_condomino->surname}}">
                                        Cognome
                                        <input type="text" name="selected_condomino-surname" id="selected_condomino-surname" value="{{$selected_condomino->surname}}">
                                    </label>
                                    <label for="{{$selected_condomino->name}}">
                                        Nome
                                        <input type="text" name="selected_condomino-name" id="selected_condomino-name" value="{{$selected_condomino->name}}">
                                    </label>
                                    <label for="{{$selected_condomino->sex}}">
                                        Titolo di possesso
                                        <select name="selected_condomino-sex" id="selected_condomino-sex">
                                            <option {{$selected_condomino->sex == 'M' ? 'selected' : ''}} value="M">M</option>
                                            <option {{$selected_condomino->sex == 'F' ? 'selected' : ''}} value="F">F</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="{{$selected_condomino->date_of_birth}}">
                                        Data di nascita
                                        <input type="date" name="selected_condomino-date_of_birth" id="selected_condomino-date_of_birth" value="{{$selected_condomino->date_of_birth}}">
                                    </label>
                                    <label for="{{$selected_condomino->nation_of_birth}}">
                                        Nazione di nascita
                                        <select name="selected_condomino-nation_of_birth" id="selected_condomino-nation_of_birth">
                                            @foreach ($countries as $country)
                                                <option {{ $selected_condomino->nation_of_birth === $country->name ? 'selected' : '' }} value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                    <label for="{{$selected_condomino->common_of_birth}}">
                                        Comune di nascita
                                        <input type="text" name="selected_condomino-common_of_birth" id="selected_condomino-common_of_birth" value="{{$selected_condomino->common_of_birth}}">
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="{{$selected_condomino->cf}}">
                                        Cod. fiscale
                                        <input class="input_large" type="text" name="selected_condomino-cf" id="selected_condomino-cf" value="{{$selected_condomino->cf}}">
                                    </label>
                                    <label for="{{$selected_condomino->P_IVA}}">
                                        Partita IVA
                                        <input class="input_large" type="text" name="selected_condomino-P_IVA" id="selected_condomino-P_IVA" value="{{$selected_condomino->P_IVA}}">
                                    </label>
                                </div>

                                <h6>Residenza</h6>
                                <div class="row_input">
                                    <label for="{{$selected_condomino->country}}">
                                        Nazione
                                        <select name="selected_condomino-country" id="selected_condomino-country">
                                            @foreach ($countries as $country)
                                                <option {{ $selected_condomino->country === $country->name ? 'selected' : '' }} value="{{$country->name}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="{{$selected_condomino->address}}">
                                        Indirizzo
                                        <input class="input_large" type="text" name="selected_condomino-address" id="selected_condomino-address" value="{{$selected_condomino->address}}">
                                    </label>
                                    <label for="{{$selected_condomino->CAP}}">
                                        CAP
                                        <input class="input_small" type="text" name="selected_condomino-CAP" id="selected_condomino-CAP" value="{{$selected_condomino->CAP}}">
                                    </label>
                                    <label for="{{$selected_condomino->common}}">
                                        Comune
                                        <input class="input_large" type="text" name="selected_condomino-common" id="selected_condomino-common" value="{{$selected_condomino->common}}">
                                    </label>
                                    <label for="{{$selected_condomino->prov}}">
                                        Prov.
                                        <input class="input_small" type="text" name="selected_condomino-prov" id="selected_condomino-prov" value="{{$selected_condomino->prov}}">
                                    </label>
                                </div>
                                <div class="row_input">
                                    <label for="{{$selected_condomino->phone}}">
                                        Telefono
                                        <input class="input_large" type="text" name="selected_condomino-phone" id="selected_condomino-phone" value="{{$selected_condomino->phone}}">
                                    </label>
                                </div>
                            </div>
                        </div>
                        @endif
                        {{-- END --}}
                        <div>{{-- 1. Intervento di isolamento termico delle superfici opache verticali e orizzontali --}}
                            <label class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="thermical_isolation_intervention" value="true"  {{$towed_vw->thermical_isolation_intervention == 'true' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                                <span class="black" ><b>1. Intervento di isolamento termico delle superfici opache verticali e orizzontali</b></span>
                            </label>
                            <p>Le superfici oggetto dell'intervento sono:</p>

                            <x-surface :vertwall="$towed_vw" :practice="$practice" :surfaces="$surfaces" :condomino="$condominoId" :type="$type" :isCommon="$condominoId === 'common' ? 1 : 0" />  

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
                                        <th class="text-center" style="width:5%;"><b>N.</b></th>
                                        <th style="width:15%;"><b>Descrizione</b></th>
                                        <th style="width:10%;"><b>Superficie (m2)</b></th>
                                        <th style="width:10%;">
                                            <b>
                                                Trasm. ante
                                                (W/m2k)
                                            </b>
                                        </th>
                                        <th style="width:10%;">
                                            <b>
                                                Trasm. post
                                                (W/m2k)
                                            </b>
                                        </th>
                                        <th style="width:10%;">
                                            <b>Telaio prima</b>
                                        </th>
                                        <th style="width:10%;"><b>Vetro prima</b></th>
                                        <th style="width:10%;"><b>Telaio dopo</b></th>
                                        <th style="width:10%;"><b>Vetro dopo</b></th>
                                        <th style="width:10%;"><b>Oscurante</b></th>
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

                            <div class="d-flex align-items-center justify-content-between mt-2" style="width:100%;">
                                <div class="d-flex align-items-center">
                                    <p class="m-0">Le spese previste in progetto dei lavori al punto IN ammontano a*</p>
                                    <label for="fixture_expected_cost" class=" m-0 mr-4 black">
                                        <input type="number" value="{{$towed_vw->fixture_expected_cost}}" name="fixture_expected_cost" style="width: 120px; background-color: #f2f2f2" class="border ml-2 px-2 text-right">
                                        €
                                    </label>
                                </div>
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
{{-- START INTERVENTI --}}
                        {{-- CC. Caldaie a condensazione --}}
                        <x-condensing_boilers :vertwall="$towed_vw" :practice="$practice" :items="$condensing_boilers" :condomino="$condominoId" :isCommon="$condominoId === 'common' ? 1 : 0" />

                        {{-- TODO: GA. Generatori di aria calda a condensazione --}}
                        <div class="mt-5">
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

                        {{-- PC. Pompe di calore (PDC) --}}
                        <x-heat_pumps :vertwall="$towed_vw" :practice="$practice" :items="$heat_pumps" :condomino="$condominoId" :isCommon="$condominoId === 'common' ? 1 : 0" />

                        {{-- PCA. Pompe di calore ad assorbimento a gas --}}
                        <x-absorption_heat_pumps :vertwall="$towed_vw" :practice="$practice" :items="$absorption_heat_pumps" :condomino="$condominoId" :isCommon="$condominoId === 'common' ? 1 : 0" />

                        {{-- SI. Sistemi ibridi --}}
                        <x-hybrid_systems :vertwall="$towed_vw" :practice="$practice" :items="$hybrid_systems" :condomino="$condominoId" :isCommon="$condominoId === 'common' ? 1 : 0" />

                        {{-- SA. Installazione di scaldacqua a pompa di calore  --}}
                        <x-water_heatpumps_installations :vertwall="$towed_vw" :practice="$practice" :items="$water_heatpumps_installations" :condomino="$condominoId" :isCommon="$condominoId === 'common' ? 1 : 0" />

                        {{-- CO. Sistemi di microgenerazione --}}
                        <x-microgeneration_systems :vertwall="$towed_vw" :practice="$practice" :items="$microgeneration_systems" :condomino="$condominoId" :isCommon="$condominoId === 'common' ? 1 : 0" />

                        {{-- IB. Generatori a biomamassa --}}
                        <x-biome_generators :vertwall="$towed_vw" :practice="$practice" :items="$biome_generators" :condomino="$condominoId" :isCommon="$condominoId === 'common' ? 1 : 0" />

                        {{-- BA. Bullding automation --}}
                        <div>
                            <div class="mt-5">
                                <label for="building_automation" class="checkbox-wrapper d-flex">
                                    <input type="checkbox" name="building_automation" id="building_automation" value="true" {{$towed_vw->building_automation == 'true' ? 'checked' : ''}}>
                                    <span class="checkmark"></span>
                                    <span class="black" ><b>BA. Bullding automation</b></span>
                                </label>
                            </div>
                            <p>I sistemi di Building Automation dedicati al controllo di:</p>
                            <div class="d-flex flex-sm-column flex-xl-row">
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

                        {{-- Gli impianti sopra indicati sono destinati a: --}}
                        <div>
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

                        {{-- Collettori solari --}}
                        <x-solar_panels :vertwall="$towed_vw" :practice="$practice" :items="$solar_panels" :condomino="$condominoId" :isCommon="$condominoId === 'common' ? 1 : 0" />

                        {{-- FV. Fotovoltaico --}}
                        <div class="mt-5">
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

                        {{-- AC. Sistema di accumulo --}}
                        <div class="mt-5">
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

                        {{-- CR. Infrastrutture per la ricarica di veicoli elettrici --}}
                        <div class="mt-5">
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

                        {{-- EBA. Eliminazione delle barriere architettoniche --}}
                        <div class="mt-5">
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

                            

                            <div class="d-flex align-items-center mt-5 flex-wrap">
                                <p class="m-0 font-500 text-nowrap">per un ammontare pari a</p>
                                <div class="d-flex align-items-center ml-3 col-sm-4 col-lg">
                                    <span class="text-nowrap"> SAL. n.1</span>
                                    <label for="EBA_cost_1" class="d-flex align-items-end m-0 mr-1">
                                        <input type="text" name="EBA_cost_1" value="{{$towed_vw->EBA_cost_1}}" class="ml-2 text-right px-2 border" style="width:120px; background-color: #f2f2f2">
                                    </label>
                                    <span>€</span>
                                </div>
                                <div class="d-flex align-items-center ml-3 col-sm-4 col-lg mx-lg-0">
                                    <span class="text-nowrap">SAL. n.2</span>
                                    <label for="EBA_cost_2" class="d-flex align-items-end m-0 mr-1">
                                        <input type="text" value="{{$towed_vw->EBA_cost_2}}" name="EBA_cost_2" class="ml-2 text-right px-2 border" style="width:120px; background-color: #f2f2f2">
                                    </label>
                                    <span>€</span>
                                </div>
                                <div class="d-flex align-items-center ml-4 col-sm-4 col-lg mt-3 mt-lg-0 ml-5 ml-lg-0">
                                    <span class="text-nowrap">SAL. n.F</span>
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

                <div class="box-fixed" style="z-index: 1;">
{{--                    @if($condominoId !== null)--}}
{{--                        <div class="add-button position-relative ml-2" style="margin-right: auto" onclick="saveCondominoChanges({{ $towed_vw->practice->id }}, {{ $selected_condomino->id }})">Salva condomino</div>--}}
{{--                    @endif--}}
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

{{--     @push('scripts')
        @include('business.scripts.select_country')
    @endpush
 --}}@endsection

@push('scripts')
    <script type="text/javascript">
        function setCondominoId(pid, id) {
            saveCondominoChanges(pid, '{{ $condominoId }}');
/*             axios.post(`/business/show_condomino_data/${id}`)
                .then(() => {
                    window.location.reload();
                })
 */        }
        function saveCondominoChanges(pid, id) {
            // Form anagrafica condomino
            let inputs = document.querySelectorAll("[name^='selected_condomino-']");
            let datas = {};
            inputs.forEach(input => {
                let id = input.id.split('-')[1]
                datas[id] = input.value === '' ? null : input.value
            })

            let interventi = [
                'condensing_boilers',
                'heat_pumps',
                'absorption_heat_pumps',
                'hybrid_systems',
                'microgeneration_systems',
                'water_heatpumps_installations',
                'biome_generators',
                'solar_panels'
            ];

            let x = (function() {
                let n = {};
                interventi.forEach(intervento => {
                    let i = document.querySelectorAll(`[name^=${intervento}]`);
                    if(i) {
                        n[intervento] = {};
                        i.forEach(o => {
                            let oid = o.id.split(/\[(.*?)\]/)[1]
                            let okey = o.id.split(/\[(.*?)\]/)[3]
                            if(n[`${intervento}`][oid] === undefined) {
                                n[`${intervento}`][oid] = {};
                            }
                            if(o.getAttribute('type') === 'checkbox' && o.checked === true) {
                                n[`${intervento}`][oid][okey] = o.checked
                            } else if(o.getAttribute('type') === 'radio') {
                                if(o.checked) {
                                    n[`${intervento}`][oid][okey] = o.value;
                                }
                            } else if(o.getAttribute('type') !== 'checkbox') {
                                n[`${intervento}`][oid][okey] = o.value === '' ? null : o.value;
                            }
                        })
                    }
                })
                return n;
            })();

            axios.post(`/business/save_condomino_data/${id}`, {
                    data: JSON.stringify(datas),
                    practice: pid,
                    interventi: x
                })
        }
    </script>
@endpush
