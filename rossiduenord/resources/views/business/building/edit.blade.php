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
                            <input type="text" class="col-md" name="intervention_name" id="intervention_name" value="{{$building->intervention_name}}" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                            </div>

                            <div class="form-group">
                                <label for="company_role" style="display:inline-block;" >Ruolo dell'impresa</label>
                                <div class="position-relative">
                                    <div class="select"></div>
                                    <select id="company_role" class="col-md" name="company_role" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;">
                                        <option {{ $building->company_role == 'General Contractor/Coordinatore' ? 'selected' : ''}} value="General Contractor/Coordinatore">General Contractor/Coordinatore</option>
                                        <option {{ $building->company_role == 'Responsabile di un intervento trainante' ? 'selected' : ''}} value="Responsabile di un intervento trainante">Responsabile di un intervento trainante</option>
                                        <option {{ $building->company_role == 'Responsabile di un intervento trainato' ? 'selected' : ''}} value="Responsabile di un intervento trainato">Responsabile di un intervento trainato</option>
                                        <option {{ $building->company_role == 'Società beneficiaria dell_intervento' ? 'selected' : ''}} value="Società beneficiaria dell_intervento">Società beneficiaria dell'intervento</option>
                                    </select>
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
                                            <input {{ $building->intervention_tipologye == 'tre' ? 'checked' : ''}} type="checkbox" id="intervention_tipology" name="intervention_tipology" value="true">     
                                            <span class="checkmark"></span> 
                                            <span class="grey">Super Ecobonus 110%</span>
                                        </label>
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
                                    <input class="col-md" type="text" name="build_address" id="build_address" value="{{$building->build_address}}" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                </div>
                                <div class="form-group"> 
                                    <label for="fiscal_code">Codice fiscale</label><br/>
                                    <input class="col-md" type="text" name="fiscal_code" id="fiscal_code" value="{{$building->fiscal_code}}" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                </div>
                                <div class="form-group"> 
                                    <label for="build_type" style="display:inline-block;" >Tipo condominio</label>
                                    <div class="position-relative">
                                        <div class="select"></div>
                                        <select id="build_type" class="col-md" name="build_type" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" >
                                            <option {{ $building->build_type == 'Standard' ? 'selected' : ''}} value="Standard">Standard</option>
                                            <option {{ $building->build_type == 'Popolare' ? 'selected' : ''}} value="Popolare">Popolare</option>
                                            <option {{ $building->build_type == 'Lusso' ? 'selected' : ''}} value="Lusso">Lusso</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md">
                                <div class="form-group"> 
                                    <div class="d-flex justify-content-between" style="column-gap: 10px;"> 
                                        <div style="width: 50px"> 
                                            <label for="build_civic_number">N.</label><br/>
                                            <input class="col-md" value="{{$building->build_civic_number}}" type="text" name="build_civic_number" id="build_civic_number" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                        </div>
                                        <div style="width: 200px">
                                            <label for="common">Comune</label><br/>
                                            <input class="col-md" value="{{$building->common}}" type="text" name="common" id="common" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                        </div>
                                        <div style="width: 50px">
                                            <label for="province">Provincia</label><br/>
                                            <input class="col-md" value="{{$building->province}}" type="text" name="province" id="province" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                        </div>
                                        <div style="width: 200px">
                                            <label for="region">Regione</label>
                                            <div class="position-relative">
                                                <div class="select"></div>
                                                <select id="region" class="col-md" name="region" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" >
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
                                            </div>
                                        </div>
                                        <div style="width: 150px"> 
                                            <label for="cap">CAP</label>
                                            <input class="col-md" value="{{$building->cap}}" type="text" name="cap" id="cap" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"> 
                                    <label for="iban">IBAN</label><br/>
                                    <input class="col-md" type="text" name="iban" id="iban" value="{{$building->iban}}" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                </div>
                                <div class="form-group"> 
                                    <label for="zone" style="display:inline-block;" >Zona</label>
                                    <div class="position-relative">
                                        <div class="select"></div>
                                            <select id="zone" class="col-md" name="zone" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;" >
                                            <option {{ $building->region == 'Centrale' ? 'selected' : ''}} value="Centrale">Centrale</option>
                                            <option {{ $building->region == 'Periferica' ? 'selected' : ''}} value="Periferica">Periferica</option>
                                            <option {{ $building->region == 'Pregio' ? 'selected' : ''}} value="Pregio">Pregio</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">{{-- section form description 2 --}} 
                            <div class="col-md" >
                                <div class="row" > 
                                    <div class="col-md"> 
                                        <label for="section">Sezione</label><br/>
                                        <input class="col-md" type="text" name="section" id="section" value="{{$building->section}}" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                    </div>
                                    <div class="col-md"> 
                                        <label for="foil">Foglio</label><br/>
                                        <input class="col-md" type="text" name="foil" id="foil" value="{{$building->foil}}" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                    </div>
                                    <div class="col-md"> 
                                        <label for="particle">Particella</label><br/>
                                        <input class="col-md" type="text" name="particle" id="particle" value="{{$building->particle}}" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                    </div>
                                    <div class="col-md"> 
                                        <label for="subaltern">Subalterno</label><br/>
                                        <input class="col-md" type="text" name="subaltern" id="subaltern" value="{{$building->subaltern}}" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                    </div>
                                    <div class="col-md"> 
                                        <label for="unit_builidg_number">N. unità immobiliari</label><br/>
                                        <input class="col-md" value="{{$building->unit_builidg_number}}" type="text" name="unit_builidg_number" id="unit_builidg_number" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                    </div>
                                    <div class="col-md"> 
                                        <label for="pertinence_number">N. pertinenze</label><br/>
                                        <input class="col-md" value="{{$building->pertinence_number}}" type="text" name="pertinence_number" id="pertinence_number" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                    </div>
                                    <div class="col-md"> 
                                        <label for="resolution_stairs">Scale per delibere..</label><br/>
                                        <input class="col-md" value="{{$building->resolution_stairs}}" type="text" name="resolution_stairs" id="resolution_stairs" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                    </div>
                                </div>   
                            </div>
                        </div>

                        <div class="row">{{-- note --}} 
                            <div class="col-md" > 
                                <label for="note">Note</label>
                                <input class="col-md" value="{{$building->note}}" type="text" name="note" id="note" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
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
                                </div>
                            </div>

                            <div class="row" >
                                <div class="col-md">
                                    <div class="row"> 
                                        <div class="col-md">
                                            <label for="license_number">Num. licenza/titolo</label><br/>
                                            <input class="col-md" value="{{$building->license_number}}" type="text" name="license_number" id="license_number" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                        </div>
                                        <div class="col-md">
                                            <label for="license_date">Data licenza/titolo</label><br/>
                                            <input class="col-md" value="{{$building->license_date}}" type="text" name="license_date" id="license_date" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                        </div>
                                        <div class="col-md">
                                            <label for="construction_date">Anno costruzione</label><br/>
                                            <input class="col-md" value="{{$building->construction_date}}" type="text" name="construction_date" id="construction_date" width="100%" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md"></div>
                            </div>
                        </div> 

                        
                        <div class="mt-5">{{-- table list condomini --}} 
                            <h6>Lista condomini</h6>
                            <div class="row">
                                <div class="col-md"> <!-- Data table content -->
                                    <table class="table_bonus" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <td class="text-center" style="width:5%;"><b>N.</b></td>
                                                <td style="width:15%;" class="text-center"><b>Nome/Ragione soc…</b></td>
                                                <td style="width:10%;"><b>Cognome</b></td>
                                                <td style="width:10%;"><b>Telefono </b></td>
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
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td class="text-center">Company test</td>
                                                <td class="text-left">Mario</td>
                                                <td class="text-left">3281000000</td>
                                                <td class="text-left">mario.rossi@gmail.com</td>
                                                <td class="text-left">HHTOKD9836UEHEOKS</td>
                                                <td class="text-center">60,240</td>
                                                <td class="text-center">18</td>
                                                <td class="text-left">1212</td>
                                                <td class="text-left">28</td>
                                                <td class="text-center">A/3</td>
                                                <td class="text-center">0,00</td>
                                            </tr>

                                            <tr>
                                                <td class="text-center">2</td>
                                                <td class="text-center">Company test2</td>
                                                <td class="text-left">Mario</td>
                                                <td class="text-left">3281000000</td>
                                                <td class="text-left">mario.rossi@gmail.com</td>
                                                <td class="text-left">HHTOKD9836UEHEOKS</td>
                                                <td class="text-center">60,240</td>
                                                <td class="text-center">18</td>
                                                <td class="text-left">1212</td>
                                                <td class="text-left">28</td>
                                                <td class="text-center">A/3</td>
                                                <td class="text-center">0,00</td>
                                            </tr>
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
                                <input type="text" class="col-md-12" value="{{$building->administrator_fullname}}" name="administrator_fullname" id="administrator_fullname" style="height:40px; border-radius:2px; border:1px solid #DBDCDB; background-color: #F2F2F2;"  />
                            </div>
                        </div> 
                        <div class="row">  
                            <div class="col-md form-group">
                                <label for="administrator_surname" style="display:inline-block;" >Cognome</label><br/>
                                <input type="text" class="col-md" value="{{$building->administrator_surname}}" name="administrator_surname" id="administrator_surname" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                            </div>
                            <div class="col-md form-group">
                                <label for="administrator_name" style="display:inline-block;" >Nome</label><br/>
                                <input type="text" class="col-md" value="{{$building->administrator_name}}" name="administrator_name" id="administrator_name" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                            </div>
                            <div class="col-md form-group">
                                <label for="administrator_fiscalcode" style="display:inline-block;" >Codice fiscale</label><br/>
                                <input type="text" class="col-md" value="{{$building->administrator_fiscalcode}}" name="administrator_fiscalcode" id="administrator_fiscalcode" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                            </div>
                        </div>
        
                        <div class="row">  
                            <div class="col-md form-group">
                                <label for="administrator_address" style="display:inline-block;" >Indirizzo</label><br/>
                                <input type="text" class="col-md" value="{{$building->administrator_address}}" name="administrator_address" id="administrator_address" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                            </div>
                            <div class="col-md">
                                <div class="row">
                                    <div class="col-md form-group">
                                        <label for="administrator_city" style="display:inline-block;" >Città</label><br/>
                                        <input type="text" class="col-md" value="{{$building->administrator_city}}" name="administrator_city" id="administrator_city" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                    </div>
                                    <div class="col-md form-group">
                                        <label for="administrator_province" style="display:inline-block;" >Provincia</label><br/>
                                        <input type="text" class="col-md" value="{{$building->administrator_province}}" name="administrator_province" id="administrator_province" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                    </div>
                                    <div class="col-md form-group">
                                        <label for="administrator_cap" style="display:inline-block;" >CAP</label><br/>
                                        <input type="text" class="col-md" value="{{$building->administrator_cap}}" name="administrator_cap" id="administrator_cap" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="row"> 
                            <div class="col-md form-group">
                                <label for="administrator_telephone" style="display:inline-block;" >Telefono</label><br/>
                                <input type="text" class="col-md" value="{{$building->administrator_telephone}}" name="administrator_telephone" id="administrator_telephone" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                            </div>
                            <div class="col-md form-group">
                                <label for="administrator_cellphone" style="display:inline-block;" >Cellulare</label><br/>
                                <input type="text" class="col-md" value="{{$building->administrator_cellphone}}" name="administrator_cellphone" id="administrator_cellphone" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
                            </div>
                            <div class="col-md form-group">
                                <label for="administrator_email" style="display:inline-block;" >Email</label><br/>
                                <input type="text" class="col-md" value="{{$building->administrator_email}}" name="administrator_email" id="administrator_email" style="height:40px; border-radius:2px; border:1px solid #DBDCDB;" />
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


@endsection