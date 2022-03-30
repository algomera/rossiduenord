@extends('business.layouts.business')

@section('content')
    @include('business.layouts.partials.practiceNav')

            <div class="scroll">

                <form action="{{ route('business.building.update', $building->id)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="px-20">
                        <h6><b>Dati Immobile</b></h6>
                        <hr style="margin-top: 5px; background-color: #211e16;">
                    </div>

                    <input type="hidden" id="practice_id" name="practice_id" value="{{ $building->practice_id}}">

                    <div class="px-20 pb-20">{{-- form di compilazione --}}
                        <div style="margin-bottom:20px;" >
                            <div class="form-group">
                            <label for="intervention_name" style="display:inline-block;" >Nome intervento</label>
                            <input type="text" class="col-md @error('intervention_name') is-invalid @enderror" name="intervention_name" id="intervention_name" value="{{$building->intervention_name}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                            @error('intervention_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="form-group">
                                <label for="company_role" style="display:inline-block;" >Ruolo dell'impresa</label>
                                <div class="position-relative">
                                    <div class="select"></div>
                                    <select id="company_role" class="col-md @error('company_role') is-invalid @enderror" name="company_role" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;">
                                        <option {{ $building->company_role == 'General Contractor/Coordinatore' ? 'selected' : ''}} value="General Contractor/Coordinatore">General Contractor/Coordinatore</option>
                                        <option {{ $building->company_role == 'Responsabile di un intervento trainante' ? 'selected' : ''}} value="Responsabile di un intervento trainante">Responsabile di un intervento trainante</option>
                                        <option {{ $building->company_role == 'Responsabile di un intervento trainato' ? 'selected' : ''}} value="Responsabile di un intervento trainato">Responsabile di un intervento trainato</option>
                                        <option {{ $building->company_role == 'Società beneficiaria dell_intervento' ? 'selected' : ''}} value="Società beneficiaria dell_intervento">Società beneficiaria dell'intervento</option>
                                    </select>
                                    @error('company_role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-bottom:25px;" >{{-- Tipologia Intervento: --}}
                            <div class="col-md-2" style="text-align:left;">
                                <p>Tipologia Intervento:</p>
                            </div>
                            <div class="col-md-10">

    {{--
                                <div class="row sec2checkbelements">
                                    <div class="form-group m-0" style="display:inline-block;" >
                                        <label class="checkbox-wrapper d-flex mr-3">
                                            <input type="checkbox" name="" value="">
                                            <span class="checkmark"></span>
                                            <span class="grey">Ecobonus 50%</span>
                                        </label>
                                    </div>
                                    <div class="form-group m-0" style="display:inline-block;" >
                                        <label class="checkbox-wrapper d-flex mr-3">
                                            <input type="checkbox" name="" value="">
                                            <span class="checkmark"></span>
                                            <span class="grey">Bonus Ristrutturazione edilizia 50%</span>
                                        </label>
                                    </div>
                                    <div class="form-group m-0" style="display:inline-block;" >
                                        <label class="checkbox-wrapper d-flex mr-3">
                                            <input type="checkbox" name="" value="">
                                            <span class="checkmark"></span>
                                            <span class="grey">Ecobonus 65%</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="row sec2checkbelements">
                                    <div class="form-group m-0" style="display:inline-block;" >
                                        <label class="checkbox-wrapper d-flex mr-3">
                                            <input type="checkbox" name="" value="">
                                            <span class="checkmark"></span>
                                            <span class="grey">70% Sismabonus (Miglioramento 1 classe sismica)</span>
                                        </label>
                                    </div>
                                    <div class="form-group m-0" style="display:inline-block;" >
                                        <label class="checkbox-wrapper d-flex mr-3">
                                            <input type="checkbox" name="" value="">
                                            <span class="checkmark"></span>
                                            <span class="grey">75% Sismabonus (Miglioramento 1 classe sismica per Condominio)</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="row sec2checkbelements">
                                    <div class="form-group m-0" style="display:inline-block;" >
                                        <label class="checkbox-wrapper d-flex mr-3">
                                            <input type="checkbox" name="" value="">
                                            <span class="checkmark"></span>
                                            <span class="grey">80% Sismabonus (Miglioramento 2 classi sismiche)</span>
                                        </label>
                                    </div>
                                    <div class="form-group m-0" style="display:inline-block;" >
                                        <label class="checkbox-wrapper d-flex mr-3">
                                            <input type="checkbox" name="" value="">
                                            <span class="checkmark"></span>
                                            <span class="grey"> 85% Sismabonus (Miglioramento 2 classi sismiche per Condominio)</span>
                                        </label>
                                    </div>
                                </div>

    --}}
                                <div class="row sec2checkbelements">


    {{--                                 <div class="form-group m-0" style="display:inline-block;" >
                                        <label class="checkbox-wrapper d-flex mr-3">
                                            <input type="checkbox" name="" value="">
                                            <span class="checkmark"></span>
                                            <span class="grey">Bonus facciate 90%</span>
                                        </label>
                                    </div>
                                    <div class="form-group m-0" style="display:inline-block;" >
                                        <label class="checkbox-wrapper d-flex mr-3">
                                            <input type="checkbox" name="" value="">
                                            <span class="checkmark"></span>
                                            <span class="grey">Cappotto 90%</span>
                                        </label>
                                    </div>
                                    <div class="form-group m-0" style="display:inline-block;" >
                                        <label class="checkbox-wrapper d-flex mr-3">
                                            <input type="checkbox" name="" value="">
                                            <span class="checkmark"></span>
                                            <span class="grey">Super SismaBonus 110%</span>
                                        </label>
                                    </div>

    --}}
                                    <div class="form-group m-0" style="display:inline-block;" >
                                        <label for="intervention_tipology" class="checkbox-wrapper d-flex mr-3">
                                            <input {{ $building->intervention_tipology == 'tre' ? 'checked' : ''}} type="checkbox" class="@error('intervention_tipology') is-invalid @enderror" id="intervention_tipology" name="intervention_tipology" value="true">
                                            <span class="checkmark"></span>
                                            <span class="grey">Super Ecobonus 110%</span>
                                        </label>
                                        @error('intervention_tipology')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

    {{--
                                    <div class="form-group m-0" style="display:inline-block;" >
                                        <label class="checkbox-wrapper d-flex mr-3">
                                            <input type="checkbox" name="" value="">
                                            <span class="checkmark"></span>
                                            <span class="grey">Acquisto di case antisismiche 110%</span>
                                        </label>
                                    </div>

    --}}
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top:30px;">{{-- section form description 1 --}}

                            <div class="col-md">
                                <div class="form-group">
                                    <label for="build_address">Indirizzo</label><br/>
                                    <input class="col-md" class="@error('build_address') is-invalid @enderror" type="text" name="build_address" id="build_address" value="{{$building->build_address}}" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                    @error('build_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="fiscal_code">Codice fiscale</label><br/>
                                    <input class="col-md" type="text" class="@error('fiscal_code') is-invalid @enderror" name="fiscal_code" id="fiscal_code" value="{{$building->fiscal_code}}" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                    @error('fiscal_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="build_type" style="display:inline-block;" >Tipo condominio</label>
                                    <div class="position-relative">
                                        <div class="select"></div>
                                        <select id="build_type" class="col-md @error('build_type') is-invalid @enderror" name="build_type" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" >
                                            <option {{ $building->build_type == 'Standard' ? 'selected' : ''}} value="Standard">Standard</option>
                                            <option {{ $building->build_type == 'Popolare' ? 'selected' : ''}} value="Popolare">Popolare</option>
                                            <option {{ $building->build_type == 'Lusso' ? 'selected' : ''}} value="Lusso">Lusso</option>
                                        </select>
                                        @error('build_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md">
                                <div class="form-group">
                                    <div class="d-flex justify-content-between" style="column-gap: 10px;">
                                        <div style="width: 50px">
                                            <label for="build_civic_number">N.</label><br/>
                                            <input class="col-md" value="{{$building->build_civic_number}}"  class="@error('build_civic_number') is-invalid @enderror"type="text" name="build_civic_number" id="build_civic_number" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                            @error('build_civic_number')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                        <div style="width: 200px">
                                            <label for="common">Comune</label><br/>
                                            <input class="col-md" value="{{$building->common}}" type="text" class="@error('common') is-invalid @enderror" name="common" id="common" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                            @error('common')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                        <div style="width: 50px">
                                            <label for="province">Provincia</label><br/>
                                            <input class="col-md" value="{{$building->province}}" type="text" class="@error('province') is-invalid @enderror" name="province" id="province" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                            @error('province')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                        <div style="width: 200px">
                                            <label for="region">Regione</label>
                                            <div class="position-relative">
                                                <div class="select"></div>
                                                <select id="region" class="col-md" class="@error('region') is-invalid @enderror" name="region" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" >
                                                    <optgroup label="seleziona regione">
                                                        <option {{ $building->region == 'Abruzzo' ? 'selected' : ''}} value="Abruzzo">Abruzzo</option>
                                                        <option {{ $building->region == 'Basilicata' ? 'selected' : ''}} value="Basilicata">Basilicata</option>
                                                        <option {{ $building->region == 'Calabria' ? 'selected' : ''}} value="Calabria">Calabria</option>
                                                        <option {{ $building->region == 'Campania' ? 'selected' : ''}} value="Campania">Campania</option>
                                                        <option {{ $building->region == 'Emilia-Romagna' ? 'selected' : ''}} value="Emilia-Romagna">Emilia-Romagna</option>
                                                        <option {{ $building->region == 'Friuli Venezia Giulia' ? 'selected' : ''}} value="Friuli Venezia Giulia">Friuli Venezia Giulia</option>
                                                        <option {{ $building->region == 'Lazio' ? 'selected' : ''}} value="Lazio">Lazio</option>
                                                        <option {{ $building->region == 'Liguria' ? 'selected' : ''}} value="Liguria">Liguria</option>
                                                        <option {{ $building->region == 'Lombardia' ? 'selected' : ''}} value="Lombardia">Lombardia</option>
                                                        <option {{ $building->region == 'Marche' ? 'selected' : ''}} value="Marche">Marche</option>
                                                        <option {{ $building->region == 'Molise' ? 'selected' : ''}} value="Molise">Molise</option>
                                                        <option {{ $building->region == 'Piemonte' ? 'selected' : ''}} value="Piemonte">Piemonte</option>
                                                        <option {{ $building->region == 'Puglia' ? 'selected' : ''}} value="Puglia">Puglia</option>
                                                        <option {{ $building->region == 'Sardegna' ? 'selected' : ''}} value="Sardegna">Sardegna</option>
                                                        <option {{ $building->region == 'sicilia' ? 'selected' : ''}} value="sicilia">Sicilia</option>
                                                        <option {{ $building->region == 'Toscana' ? 'selected' : ''}} value="Toscana">Toscana</option>
                                                        <option {{ $building->region == 'Trentino-Alto Adige' ? 'selected' : ''}} value="Trentino-Alto Adige">Trentino-Alto Adige</option>
                                                        <option {{ $building->region == 'Umbria' ? 'selected' : ''}} value="Umbria">Umbria</option>
                                                        <option {{ $building->region == 'Valle d\'Aosta' ? 'selected' : ''}} value="Valle d'Aosta">Valle d'Aosta</option>
                                                        <option {{ $building->region == 'Veneto' ? 'selected' : ''}} value="Veneto">Veneto</option>
                                                    </optgroup>
                                                </select>
                                            @error('region')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div style="width: 150px">
                                            <label for="cap">CAP</label>
                                            <input class="col-md @error('cap') is-invalid @enderror" value="{{$building->cap}}" type="number" name="cap" id="cap" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                            @error('cap')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="iban">IBAN</label><br/>
                                    <input class="col-md @error('iban') is-invalid @enderror" type="text" name="iban" id="iban" value="{{$building->iban}}" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                    @error('iban')
                                        <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="zone" style="display:inline-block;" >Zona</label>
                                    <div class="position-relative">
                                        <div class="select"></div>
                                            <select id="zone" class="col-md @error('zone') is-invalid @enderror" name="zone" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" >
                                            <option {{ $building->zone == 'Centrale' ? 'selected' : ''}} value="Centrale">Centrale</option>
                                            <option {{ $building->zone == 'Periferica' ? 'selected' : ''}} value="Periferica">Periferica</option>
                                            <option {{ $building->zone == 'Pregio' ? 'selected' : ''}} value="Pregio">Pregio</option>
                                        </select>
                                        @error('zone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">{{-- section form description 2 --}}
                            <div class="col-md" >
                                <div class="row" >
                                    <div class="col-md">
                                        <label for="section">Sezione</label><br/>
                                        <input class="col-md  @error('section') is-invalid @enderror" type="text" name="section" id="section" value="{{$building->section}}" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                        @error('section')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md">
                                        <label for="foil">Foglio</label><br/>
                                        <input class="col-md  @error('foil') is-invalid @enderror" type="text" name="foil" id="foil" value="{{$building->foil}}" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                        @error('foil')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md">
                                        <label for="particle">Particella</label><br/>
                                        <input class="col-md  @error('particle') is-invalid @enderror" type="text" name="particle" id="particle" value="{{$building->particle}}" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                        @error('particle')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md">
                                        <label for="subaltern">Subalterno</label><br/>
                                        <input class="col-md  @error('subaltern') is-invalid @enderror" type="text" name="subaltern" id="subaltern" value="{{$building->subaltern}}" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                        @error('subaltern')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md">
                                        <label for="unit_builidg_number">N. unità immobiliari</label><br/>
                                        <input class="col-md  @error('unit_builidg_number') is-invalid @enderror" value="{{$building->unit_builidg_number}}" type="number" name="unit_builidg_number" id="unit_builidg_number" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                        @error('unit_builidg_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md">
                                        <label for="pertinence_number">N. pertinenze</label><br/>
                                        <input class="col-md  @error('pertinence_number') is-invalid @enderror" value="{{$building->pertinence_number}}" type="number" name="pertinence_number" id="pertinence_number" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                        @error('pertinence_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md">
                                        <label for="resolution_stairs">Scale per delibere..</label><br/>
                                        <input class="col-md  @error('resolution_stairs') is-invalid @enderror" value="{{$building->resolution_stairs}}" type="number" name="resolution_stairs" id="resolution_stairs" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                        @error('resolution_stairs')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">{{-- note --}}
                            <div class="col-md" >
                                <label for="note">Note</label>
                                <input class="col-md @error('note') is-invalid @enderror" value="{{$building->note}}" type="text" name="note" id="note" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                @error('note')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>{{-- section input radio --}}
                            <div class="row" style="margin-top:5%;">
                                <div class="col-md-7">
                                <p style="display:inline-block; margin-right:25px; font-weight:500;">L'edificio è sottoposto a vincoli previsti dal codice dei beni culturali e del paesaggio</p>
                                </div>
                                <div class="col-md">
                                    <div style="display:inline-block; ">
                                        <input {{ $building->cultural_constraints == 'notDefine' ? 'checked' : ''}} type="radio" name="cultural_constraints" id="cultural_constraints" value="notDefine">
                                        <label style="margin-right:15px;" for="cultural_constraints">N.D.</label>
                                        <input {{ $building->cultural_constraints == 'no' ? 'checked' : ''}} type="radio" name="cultural_constraints" id="cultural_constraints" value="no">
                                        <label style="margin-right:15px;" for="cultural_constraints">No</label>
                                        <input {{ $building->cultural_constraints == 'yes' ? 'checked' : ''}} type="radio" name="cultural_constraints" id="cultural_constraints" value="yes">
                                        <label style="margin-right:15px;" for="cultural_constraints">Sì</label>
                                    </div>
                                    @error('cultural_constraints')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-7">
                                <p style="display:inline-block; margin-right:25px; font-weight:500;">Interventi trainanti al 110% sono vietati dai regolamenti edilizi, urbanistici e ambientali</p>
                                </div>
                                <div class="col-md">
                                    <div style="display:inline-block; ">
                                        <input {{ $building->denied_intervents == 'notDefine' ? 'checked' : ''}} type="radio" id="denied_intervents" name="denied_intervents" value="notDefine">
                                        <label style="margin-right:15px;" for="denied_intervents">N.D.</label>
                                        <input {{ $building->denied_intervents == 'no' ? 'checked' : ''}} type="radio" id="denied_intervents" name="denied_intervents" value="no">
                                        <label style="margin-right:15px;" for="denied_intervents">No</label>
                                        <input {{ $building->denied_intervents == 'yes' ? 'checked' : ''}} type="radio" id="denied_intervents" name="denied_intervents" value="yes">
                                        <label style="margin-right:15px;" for="denied_intervents">Sì</label>
                                    </div>
                                    @error('denied_intervents')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-7">
                                <p style="display:inline-block; margin-right:25px; font-weight:500;">L’edificio è situato in un comune montano</p>
                                </div>
                                <div class="col-md">
                                    <div style="display:inline-block; ">
                                        <input {{ $building->mountain_common == 'notDefine' ? 'checked' : ''}} type="radio" id="mountain_common" name="mountain_common" value="notDefine">
                                        <label style="margin-right:15px;" for="mountain_common">N.D.</label>
                                        <input {{ $building->mountain_common == 'no' ? 'checked' : ''}} type="radio" id="mountain_common" name="mountain_common" value="no">
                                        <label style="margin-right:15px;" for="mountain_common">No</label>
                                        <input {{ $building->mountain_common == 'yes' ? 'checked' : ''}} type="radio" id="mountain_common" name="mountain_common" value="yes">
                                        <label style="margin-right:15px;" for="mountain_common">Sì</label>
                                    </div>
                                    @error('mountain_common')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-7">
                                <p style="display:inline-block; margin-right:25px; font-weight:500;">L’edificio è situato in un comune interessato da procedura di infrazione comunitaria</p>
                                </div>
                                <div class="col-md">
                                    <div style="display:inline-block; ">
                                        <input {{ $building->infringment_common == 'notDefine' ? 'checked' : ''}} type="radio" id="infringment_common" name="infringment_common" value="notDefine">
                                        <label style="margin-right:15px;" for="infringment_common">N.D.</label>
                                        <input {{ $building->infringment_common == 'no' ? 'checked' : ''}} type="radio" id="infringment_common" name="infringment_common" value="no">
                                        <label style="margin-right:15px;" for="infringment_common">No</label>
                                        <input {{ $building->infringment_common == 'yes' ? 'checked' : ''}} type="radio" id="infringment_common" name="infringment_common" value="yes">
                                        <label style="margin-right:15px;" for="infringment_common">Sì</label>
                                    </div>
                                    @error('infringment_common')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-7">
                                <p style="display:inline-block; margin-right:25px; font-weight:500;">L’edificio è in una zona colpita da eventi sismici</p>
                                </div>
                                <div class="col-md">
                                    <div style="display:inline-block; ">
                                        <input {{ $building->sismic_events_zone == 'notDefine' ? 'checked' : ''}} type="radio" id="sismic_events_zone" name="sismic_events_zone" value="notDefine">
                                        <label style="margin-right:15px;" for="sismic_events_zone">N.D.</label>
                                        <input {{ $building->sismic_events_zone == 'no' ? 'checked' : ''}} type="radio" id="sismic_events_zone" name="sismic_events_zone" value="no">
                                        <label style="margin-right:15px;" for="sismic_events_zone">No</label>
                                        <input {{ $building->sismic_events_zone == 'yes' ? 'checked' : ''}} type="radio" id="sismic_events_zone" name="sismic_events_zone" value="yes">
                                        <label style="margin-right:15px;" for="">Sì</label>
                                    </div>
                                    @error('sismic_events_zone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-7">
                                <p style="display:inline-block; margin-right:25px; font-weight:500;">L’edificio è in fase di ristrutturazione Art. 3, Com. 1, lettere d), e), f), del D.P.R. 380/2001</p>
                                </div>
                                <div class="col-md">
                                    <div style="display:inline-block; ">
                                        <input {{ $building->isUnderRenovation == 'notDefine' ? 'checked' : ''}} type="radio" id="isUnderRenovation" name="isUnderRenovation" value="notDefine">
                                        <label style="margin-right:15px;" for="isUnderRenovation">N.D.</label>
                                        <input {{ $building->isUnderRenovation == 'no' ? 'checked' : ''}} type="radio" id="isUnderRenovation" name="isUnderRenovation" value="no">
                                        <label style="margin-right:15px;" for="isUnderRenovation">No</label>
                                        <input {{ $building->isUnderRenovation == 'yes' ? 'checked' : ''}} type="radio" id="isUnderRenovation" name="isUnderRenovation" value="yes">
                                        <label style="margin-right:15px;" for="isUnderRenovation">Sì</label>
                                    </div>
                                    @error('isUnderRenovation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-7">
                                <p style="display:inline-block; margin-right:25px; font-weight:500;">L’edificio è in un’area non metanizzata</p>
                                </div>
                                <div class="col-md">
                                    <div style="display:inline-block; ">
                                        <input {{ $building->nonMetan_area == 'notDefine' ? 'checked' : ''}} type="radio" id="nonMetan_area" name="nonMetan_area" value="notDefine">
                                        <label style="margin-right:15px;" for="nonMetan_area">N.D.</label>
                                        <input {{ $building->nonMetan_area == 'no' ? 'checked' : ''}} type="radio" id="nonMetan_area" name="nonMetan_area" value="no">
                                        <label style="margin-right:15px;" for="nonMetan_area">No</label>
                                        <input {{ $building->nonMetan_area == 'yes' ? 'checked' : ''}} type="radio" id="nonMetan_area" name="nonMetan_area" value="yes">
                                        <label style="margin-right:15px;" for="nonMetan_area">Sì</label>
                                    </div>
                                    @error('nonMetan_area')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                <p style="display:inline-block; margin-right:25px; font-weight:500;">Autorizzazione edilizia</p>
                                </div>
                                <div class="col-md">
                                    <div style="display:inline-block; ">
                                        <input {{ $building->building_authorization == 'notDefine' ? 'checked' : ''}} type="radio" id="building_authorization" name="building_authorization" value="notDefine">
                                        <label style="margin-right:15px;" for="building_authorization">N.D.</label>
                                        <input {{ $building->building_authorization == 'Licenza/Titolo edilizio' ? 'checked' : ''}} type="radio" id="building_authorization" name="building_authorization" value="Licenza/Titolo edilizio">
                                        <label style="margin-right:15px;" for="building_authorization">Licenza/Titolo edilizio</label>
                                        <input {{ $building->building_authorization == 'Concessione in sanatoria' ? 'checked' : ''}} type="radio" id="building_authorization" name="building_authorization" value="Concessione in sanatoria">
                                        <label style="margin-right:15px;" for="building_authorization">Concessione in sanatoria</label>
                                        <input {{ $building->building_authorization == 'Edificio storico senza tit. edilizio' ? 'checked' : ''}} type="radio" id="building_authorization" name="building_authorization" value="Edificio storico senza tit. edilizio">
                                        <label style="margin-right:15px;" for="building_authorization">Edificio storico senza tit. edilizio</label>
                                    </div>
                                    @error('building_authorization')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row" >
                                <div class="col-md">
                                    <div class="row">
                                        <div class="col-md">
                                            <label for="license_number">Num. licenza/titolo</label><br/>
                                            <input class="col-md @error('license_number') is-invalid @enderror" value="{{$building->license_number}}" type="number" name="license_number" id="license_number" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                            @error('license_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md">
                                            <label for="license_date">Data licenza/titolo</label><br/>
                                            <input class="col-md @error('license_date') is-invalid @enderror" value="{{$building->license_date}}" type="date" name="license_date" id="license_date" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                            @error('license_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md">
                                            <label for="construction_date">Anno costruzione</label><br/>
                                            <input class="col-md @error('construction_date') is-invalid @enderror" value="{{$building->construction_date}}" type="number" placeholder="YYYY" name="construction_date" id="construction_date" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                            @error('construction_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md"></div>
                            </div>
                        </div>


                        <div class="mt-5">{{-- table list condomini --}}
                            <div class="d-flex align-items-center mb-3">
                                <h6 class="mb-0">Lista condomini</h6>
                                <div class="btn btn-primary ml-3" id="add_condomino_row" onclick="addRows(event)">+</div>
                            </div>
                            <div class="row">
                                <div class="col-md"> <!-- Data table content -->
                                    <table id="condominis_table" class="table_bonus" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <td class="text-center" style="width:5%;"><b>N.</b></td>
                                                <td style="width:15%;" class="text-center"><b>Nome/Ragione soc…</b></td>
                                                <td style="width:10%;"><b>Cognome</b></td>
                                                <td style="width:10%;"><b>Telefono</b></td>
                                                <td style="width:13%;"><b>Email</b></td>
                                                <td style="width:12%;"><b>Codice fiscale/Pa…</b></td>
                                                <td style="width:10%;" class="text-center"><b>Mille…</b></td>
                                                <td style="width:5%;" class="text-center"><b>Foglio</b></td>
                                                <td style="width:5%;"><b>Part.</b></td>
                                                <td style="width:5%;"><b>sub</b></td>
                                                <td style="width:5%;"><b>Cate…</b></td>
                                                <td style="width:5%;"><b>sub…</b></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($condomini as $i => $condomino)
                                            <tr>
                                                <td class="text-center">{{ $i + 1 }}</td>
                                                <td class="text-center">{{ $condomino->name }}</td>
                                                <td class="text-left">{{ $condomino->surname }}</td>
                                                <td class="text-left">{{ $condomino->phone }}</td>
                                                <td class="text-left">{{ $condomino->email }}</td>
                                                <td class="text-left">{{ $condomino->cf }}</td>
                                                <td class="text-center">{{ $condomino->millesimi }}</td>
                                                <td class="text-center">{{ $condomino->foglio }}</td>
                                                <td class="text-left">{{ $condomino->part }}</td>
                                                <td class="text-left">{{ $condomino->sub }}</td>
                                                <td class="text-center">{{ $condomino->categ_catastale }}</td>
                                                <td class="text-center">{{ $condomino->sup_catastale }}</td>
                                            </tr>
                                        @empty
                                            <tr id="no_data_row">
                                                <td colspan="12">Nessun dato disponibile</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

    {{--
                        <div class="row mt-5">
                            <div class="col-md">
                                <h6>Num. licenza/titolo</h6>
                                <a class="col-md-3 mb-3" href="" style="display:block; border-radius:3px; height:218px; width:326px; border:1px solid #DBDCDB; background-color:#F2F2F2;" ><img src="../resources/img/image_rectangle.png" alt="" title="none" /></a>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input class="pl-3 pr-3" type="button" value="Esporta lista condomini" style="color:white; background-color:#383D3F; border:1px solid none; height:27px; width:189px; font-size:13px; font-weight:bold;" />
                                    </div>
                                    <div class="col-md-3" >
                                        <label >Tot. millesimi</label>
                                        <input type="text" value="1.000,00" style="border:1px solid #DBDCDB; border-radius:3px;" />
                                    </div>
                                </div>
                            </div>
                        </div>

    --}}
                    </div>

                    <hr style="background-color: #f2f2f2; height:20px; border:none;">


                    <div style="padding:20px;" ><!-- Dati Amministrazione -->
                        <h6>Dati Amministrazione</h6>
                        <div class="row">
                            <div class="col-md form-group">
                                <label for="administrator_fullname" style="display:inline-block;" >Nominativo</label><br/>
                                <input type="text" class="col-md-12   @error('administrator_fullname') is-invalid @enderror" value="{{$building->administrator_fullname}}" name="administrator_fullname" id="administrator_fullname" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;"  />
                                @error('administrator_fullname')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md form-group">
                                <label for="administrator_surname" style="display:inline-block;" >Cognome</label><br/>
                                <input type="text" class="col-md   @error('administrator_surname') is-invalid @enderror" value="{{$building->administrator_surname}}" name="administrator_surname" id="administrator_surname" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                @error('administrator_surname')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                @enderror
                            </div>
                            <div class="col-md form-group">
                                <label for="administrator_name" style="display:inline-block;" >Nome</label><br/>
                                <input type="text" class="col-md   @error('administrator_name') is-invalid @enderror" value="{{$building->administrator_name}}" name="administrator_name" id="administrator_name" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                @error('administrator_name')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                @enderror
                            </div>
                            <div class="col-md form-group">
                                <label for="administrator_fiscalcode" style="display:inline-block;" >Codice fiscale</label><br/>
                                <input type="text" class="col-md   @error('administrator_fiscalcode') is-invalid @enderror" value="{{$building->administrator_fiscalcode}}" name="administrator_fiscalcode" id="administrator_fiscalcode" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                @error('administrator_fiscalcode')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md form-group">
                                <label for="administrator_address" style="display:inline-block;" >Indirizzo</label><br/>
                                <input type="text" class="col-md  @error('administrator_address') is-invalid @enderror" value="{{$building->administrator_address}}" name="administrator_address" id="administrator_address" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                @error('administrator_address')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                @enderror
                            </div>
                            <div class="col-md">
                                <div class="row">
                                    <div class="col-md form-group">
                                        <label for="administrator_city" style="display:inline-block;" >Città</label><br/>
                                        <input type="text" class="col-md  @error('administrator_city') is-invalid @enderror" value="{{$building->administrator_city}}" name="administrator_city" id="administrator_city" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                        @error('administrator_city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md form-group">
                                        <label for="administrator_province" style="display:inline-block;" >Provincia</label><br/>
                                        <input type="text" class="col-md  @error('administrator_province') is-invalid @enderror" value="{{$building->administrator_province}}" name="administrator_province" id="administrator_province" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                        @error('administrator_province')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md form-group">
                                        <label for="administrator_cap" style="display:inline-block;" >CAP</label><br/>
                                        <input type="number" class="col-md  @error('administrator_cap') is-invalid @enderror" value="{{$building->administrator_cap}}" name="administrator_cap" id="administrator_cap" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                        @error('administrator_cap')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md form-group">
                                <label for="administrator_telephone" style="display:inline-block;" >Telefono</label><br/>
                                <input type="number" class="col-md @error('administrator_telephone') is-invalid @enderror" value="{{$building->administrator_telephone}}" name="administrator_telephone" id="administrator_telephone" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                @error('administrator_telephone')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                @enderror
                            </div>
                            <div class="col-md form-group">
                                <label for="administrator_cellphone" style="display:inline-block;" >Cellulare</label><br/>
                                <input type="number" class="col-md @error('administrator_cellphone') is-invalid @enderror" value="{{$building->administrator_cellphone}}" name="administrator_cellphone" id="administrator_cellphone" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                @error('administrator_cellphone')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                @enderror
                            </div>
                            <div class="col-md form-group">
                                <label for="administrator_email" style="display:inline-block;" >Email</label><br/>
                                <input type="email" class="col-md @error('administrator_email') is-invalid @enderror" value="{{$building->administrator_email}}" name="administrator_email" id="administrator_email" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                @error('administrator_email')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                @enderror
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
            </div>

        </div> <!-- chiusura div box praticeNav -->

    </div>{{-- chiusura div content-main praticeNav --}}

    @push('scripts')
        <script type="text/javascript">
            let i = 0;
            function addRows(e){
                e.preventDefault()
                if($('#no_data_row')) {
                    $('#no_data_row').remove();
                }
                i++;
                $("#condominis_table tbody").append(`
                    <tr>
                        <td class="text-center">${$("#condominis_table tbody tr").length + 1 }</td>
                        <td id="col1" class="text-center">
                            <input name="condomini[${i}][name]" type="text" style="border:none; width: 100%;">
                        </td>
                        <td class="text-left">
                            <input name="condomini[${i}][surname]" type="text" style="border:none; width: 100%;">
                        </td>
                        <td class="text-left">
                            <input name="condomini[${i}][phone]" type="text" style="border:none; width: 100%;">
                        </td>
                        <td class="text-left">
                            <input name="condomini[${i}][email]" type="text" style="border:none; width: 100%;">
                        </td>
                        <td class="text-left">
                            <input name="condomini[${i}][cf]" type="text" style="border:none; width: 100%;">
                        </td>
                        <td class="text-center">
                            <input name="condomini[${i}][millesimi]" type="text" style="border:none; width: 100%;">
                        </td>
                        <td class="text-center">
                            <input name="condomini[${i}][foglio]" type="text" style="border:none; width: 100%;">
                        </td>
                        <td class="text-left">
                            <input name="condomini[${i}][part]" type="text" style="border:none; width: 100%;">
                        </td>
                        <td class="text-left">
                            <input name="condomini[${i}][sub]" type="text" style="border:none; width: 100%;">
                        </td>
                        <td class="text-center">
                            <input name="condomini[${i}][categ_catastale]" type="text" style="border:none; width: 100%;">
                        </td>
                        <td class="text-center">
                            <input name="condomini[${i}][sup_catastale]" type="text" style="border:none; width: 100%;">
                        </td>
                        </tr>
                    `)


                // let rowCount = table.rows.length;
                // let cellCount = table.rows[0].cells.length;
                // let row = table.insertRow(rowCount);
                // for(let i = 0; i <= cellCount; i++){
                //     let cell = 'cell' + i;
                //     cell = row.insertCell(i);
                //     let copycel = document.getElementById('col' + i).innerHTML;
                //     cell.innerHTML = copycel;
                // }
            }
        </script>
    @endpush

@endsection
