@extends('business.layouts.business')

@section('content')
    @include('business.layouts.partials.practiceNav')
    
            <form class="px-20 pb-20" action="{{ route('business.practice.update',$practice->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="d-flex">
                    <div style="width: 10%; margin-right: 20px;" class="form-group ">
                        <label for="id" class="text">{{ __('Numero pratica') }}</label>
                        <div>
                            <input id="id" type="text" style="height: 47px!important" class="form-control bg-body @error('id') is-invalid @enderror" name="id" value="{{ $practice->id}}" autocomplete="id" autofocus>
                            
                            @error('id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div style="width: 15%; margin-right: 20px;" class="form-group">
                        <label for="created_at" class="text">{{ __('Data pratica') }}</label>
                        <div>
                            <input id="created_at" type="text" style="height: 47px!important" class="form-control" name="created_at" value="{{$practice->created_at }}" autocomplete="created_at" autofocus>
                            
                            @error('created_at')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div style="width: 15%;" class="form-group">
                        <label for="import" class="text">{{ __('Importo stimato ') }}</label>
                        <div>
                            <input id="import" type="number" step="0.01" pattern="[0-9]" min="0.00" style="height: 47px!important" class="form-control @error('import') is-invalid @enderror" name="import" value="{{ $practice->import }}" autocomplete="import" autofocus>
                            
                            @error('import')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="form-group" style="width: 25%; margin-right: 20px;">
                        <label for="practical_phase" class="text">Fase pratica</label>
                        <select style="height: 47px!important" class="form-control bg-body" name="practical_phase" id="practical_phase" value="{{ $practice->practical_phase}}">
                            <optgroup label="seleziona fase pratica">
                                <option {{ $practice->practical_phase == 'Nessuna' ? 'selected' : ''}} value="Nessuna">Nessuna</option>
                                <option {{ $practice->practical_phase == 'In istruttoria' ? 'selected' : ''}} value="In istruttoria">In istruttoria</option>
                                <option {{ $practice->practical_phase == 'In progettazione' ? 'selected' : ''}} value="In progettazione">In progettazione</option>
                                <option {{ $practice->practical_phase == 'In offertazione' ? 'selected' : ''}} value="In offertazione">In offertazione</option>
                                <option {{ $practice->practical_phase == 'In contrattualizzazione lavoro' ? 'selected' : ''}} value="In contrattualizzazione lavoro">In contrattualizzazione lavoro</option>
                                <option {{ $practice->practical_phase == 'In contrattualizazione cessione/finanziamento' ? 'selected' : ''}} value="In contrattualizazione cessione/finanziamento">In contrattualizazione cessione/finanziamento</option>
                                <option {{ $practice->practical_phase == 'Contrattualizzato' ? 'selected' : ''}} value="Contrattualizzato">Contrattualizzato</option>
                                <option {{ $practice->practical_phase == 'In fatturazione' ? 'selected' : ''}} value="In fatturazione">In fatturazione</option>
                                <option {{ $practice->practical_phase == 'In pagamento' ? 'selected' : ''}} value="In pagamento">In pagamento</option>
                                <option {{ $practice->practical_phase == 'Operazione terminata con successo' ? 'selected' : ''}} value="Operazione terminata con successo">Operazione terminata con successo</option>
                                <option {{ $practice->practical_phase == 'Operazione rinunciata' ? 'selected' : ''}} value="Operazione rinunciata">Operazione rinunciata</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="form-group" style="width: 15%;">
                        <label for="real_estate_type" class="text">Tipo immobile</label>
                        <select style="height: 47px!important" class="form-control bg-body" name="real_estate_type" id="real_estate_type">
                            <optgroup label="seleziona tipo immobile">
                                <option {{ $practice->real_estate_type == 'Condominio' ? 'selected' : ''}} value="Condominio">Condominio</option>
                                <option {{ $practice->real_estate_type == 'Unifamiliare' ? 'selected' : ''}} value="Unifamiliare">Unifamiliare</option>
                                <option {{ $practice->real_estate_type == 'Fabbricato industriale' ? 'selected' : ''}} value="Fabbricato industriale">Fabbricato industriale</option>
                            </optgroup>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <h6>Richiesta polizza:</h6>

                    <div class="form-group" style="width: 15%;">
                        <label for="month" class="text">Mese</label>
                        <select style="height: 47px!important" class="form-control bg-body" name="month" id="month">
                            <optgroup label="seleziona mese">
                                <option {{ $practice->month == 'gennaio' ? 'selected' : ''}} value="gennaio">gennaio</option>
                                <option {{ $practice->month == 'febbraio' ? 'selected' : ''}} value="febbraio">febbraio</option>
                                <option {{ $practice->month == 'marzo' ? 'selected' : ''}} value="marzo">marzo</option>
                                <option {{ $practice->month == 'aprile' ? 'selected' : ''}} value="aprile">aprile</option>
                                <option {{ $practice->month == 'maggio' ? 'selected' : ''}} value="maggio">maggio</option>
                                <option {{ $practice->month == 'giugno' ? 'selected' : ''}} value="giugno">giugno</option>
                                <option {{ $practice->month == 'luglio' ? 'selected' : ''}} value="luglio">luglio</option>
                                <option {{ $practice->month == 'agosto' ? 'selected' : ''}} value="agosto">agosto</option>
                                <option {{ $practice->month == 'settembre' ? 'selected' : ''}} value="settembre">settembre</option>
                                <option {{ $practice->month == 'ottobre' ? 'selected' : ''}} value="ottobre">ottobre</option>
                                <option {{ $practice->month == 'novembre' ? 'selected' : ''}} value="novembre">novembre</option>
                                <option {{ $practice->month == 'dicembre' ? 'selected' : ''}} value="dicembre">dicembre</option>
                            </optgroup>
                        </select>
                    </div>
            
                    <div class="form-group" style="width: 10%;">
                        <label for="year" class="text">{{ __('Anno') }}</label>
                        <div>
                            <input id="year" type="text" style="height: 47px!important" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ $practice->year }}" autocomplete="year" autofocus>
                            
                            @error('year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                                        
                    <div class="form-group" style="width: 65%;">
                        <label for="policy_name" class="text">{{ __('Denominazione') }}</label>
                        <div>
                            <input id="policy_name" type="text" style="height: 47px!important" class="form-control @error('policy_name') is-invalid @enderror" name="policy_name" value="{{ $practice->policy_name }}" autocomplete="policy_name" autofocus>
                            
                            @error('policy_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <div class="form-group" style="width: 45%;">
                        <label for="address" class="text">{{ __('Indirizzo') }}</label>
                        <div>
                            <input id="address" type="text" style="height: 47px!important" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $practice->address }}" autocomplete="address" autofocus>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group" style="width: 5%;">
                        <label for="civic" class="text">{{ __('N.') }}</label>
                        <div>
                            <input id="civic" type="text" style="height: 47px!important" class="form-control @error('civic') is-invalid @enderror" name="civic" value="{{ $practice->civic }}" autocomplete="civic" autofocus>

                            @error('civic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group" style="width: 15%;">
                        <label for="common" class="text">{{ __('Comune') }}</label>
                        <div>
                            <input id="common" type="text" style="height: 47px!important" class="form-control @error('common') is-invalid @enderror" name="common" value="{{ $practice->common }}" autocomplete="common" autofocus>

                            @error('common')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group" style="width: 5%;">
                        <label for="province" class="text">{{ __('Provincia') }}</label>
                        <div>
                            <input id="province" type="text" style="height: 47px!important" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ $practice->province }}" autocomplete="province" autofocus>

                            @error('province')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group" style="width: 15%;">
                        <label for="region" class="text">Regione</label>
                        <select style="height: 47px!important" class="form-control bg-body" name="region" id="region">
                        <optgroup label="seleziona regione">
                            <option {{ $practice->region == 'Abruzzo' ? 'selected' : ''}} value="Abruzzo">Abruzzo</option>
                            <option {{ $practice->region == 'Basilicata' ? 'selected' : ''}} value="Basilicata">Basilicata</option>
                            <option {{ $practice->region == 'Calabria' ? 'selected' : ''}} value="Calabria">Calabria</option>
                            <option {{ $practice->region == 'Campania' ? 'selected' : ''}} value="Campania">Campania</option>
                            <option {{ $practice->region == 'Emilia-Romagna' ? 'selected' : ''}} value="Emilia-Romagna">Emilia-Romagna</option>
                            <option {{ $practice->region == 'Friuli Venezia Giulia' ? 'selected' : ''}} value="Friuli Venezia Giulia">Friuli Venezia Giulia</option>
                            <option {{ $practice->region == 'Lazio' ? 'selected' : ''}} value="Lazio">Lazio</option>
                            <option {{ $practice->region == 'Liguria' ? 'selected' : ''}} value="Liguria">Liguria</option>
                            <option {{ $practice->region == 'Lombardia' ? 'selected' : ''}} value="Lombardia">Lombardia</option>
                            <option {{ $practice->region == 'Marche' ? 'selected' : ''}} value="Marche">Marche</option>
                            <option {{ $practice->region == 'Molise' ? 'selected' : ''}} value="Molise">Molise</option>
                            <option {{ $practice->region == 'Piemonte' ? 'selected' : ''}} value="Piemonte">Piemonte</option>
                            <option {{ $practice->region == 'Puglia' ? 'selected' : ''}} value="Puglia">Puglia</option>
                            <option {{ $practice->region == 'Sardegna' ? 'selected' : ''}} value="Sardegna">Sardegna</option>
                            <option {{ $practice->region == 'sicilia' ? 'selected' : ''}} value="sicilia">Sicilia</option>
                            <option {{ $practice->region == 'Toscana' ? 'selected' : ''}} value="Toscana">Toscana</option>
                            <option {{ $practice->region == 'Trentino-Alto Adige' ? 'selected' : ''}} value="Trentino-Alto Adige">Trentino-Alto Adige</option>
                            <option {{ $practice->region == 'Umbria' ? 'selected' : ''}} value="Umbria">Umbria</option>
                            <option {{ $practice->region == 'Valle d\'Aosta' ? 'selected' : ''}} value="Valle d'Aosta">Valle d'Aosta</option>
                            <option {{ $practice->region == 'Veneto' ? 'selected' : ''}} value="Veneto">Veneto</option>
                        </optgroup>
                        </select>
                    </div>

                    <div class="form-group" style="width: 10%;">
                        <label for="cap" class="text">{{ __('CAP') }}</label>
                        <div>
                            <input id="cap" type="text" style="height: 47px!important" class="form-control @error('cap') is-invalid @enderror" name="cap" value="{{ $practice->cap }}" autocomplete="cap" autofocus>

                            @error('cap')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="form-group" style="width: 10%; margin-right: 20px;">
                        <label for="work_start" class="text">{{ __('Inizio lavori') }}</label>
                        <div>
                            <input id="work_start" type="text" style="height: 47px!important" class="form-control @error('work_start') is-invalid @enderror" name="work_start" value="{{ $practice->work_start }}" autocomplete="work_start" autofocus>

                            @error('work_start')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group" style="width: 20%; margin-right: 20px;">
                        <label for="c_m" class="text">{{ __('Importo C.M') }}</label>
                        <div>
                            <input id="c_m" type="text" style="height: 47px!important" class="form-control @error('c_m') is-invalid @enderror" name="c_m" value="{{ $practice->c_m }}" autocomplete="c_m" autofocus>

                            @error('c_m')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group" style="width: 20%;">
                        <label for="assev_tecnica" class="text">{{ __('Assev. Tecnica(no IVA)') }}</label>
                        <div>
                            <input id="assev_tecnica" type="text" style="height: 47px!important" class="form-control @error('assev_tecnica') is-invalid @enderror" name="assev_tecnica" value="{{ $practice->assev_tecnica }}" autocomplete="assev_tecnica" autofocus>

                            @error('assev_tecnica')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <div class="form-group" style="width: 45%;">
                        <label for="nominative" class="text">{{ __('Nominativo') }}</label>
                        <div>
                            <input id="nominative" type="text" style="height: 47px!important" class="form-control bg-body @error('nominative') is-invalid @enderror" name="nominative" value="{{ $practice->nominative }}" autocomplete="nominative" autofocus>

                            @error('nominative')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group" style="width: 26%;">
                        <label for="lastName" class="text">{{ __('Cognome') }}</label>
                        <div>
                            <input id="lastName" type="text" style="height: 47px!important" class="form-control bg-body @error('lastName') is-invalid @enderror" name="lastName" value="{{ $practice->lastName }}" autocomplete="lastName" autofocus>

                            @error('lastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group" style="width: 26%;">
                        <label for="name" class="text">{{ __('Nome') }}</label>
                        <div>
                            <input id="name" type="text" style="height: 47px!important" class="form-control bg-body @error('name') is-invalid @enderror" name="name" value="{{ $practice->name }}" autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="text">{{ __('Descrizione') }}</label>
                    <textarea class="p-2 border" style="width: 100%" name="description" id="description" cols="30" rows="3">{{ $practice->description }}</textarea>
                </div>

                <div class="form-group" style="width: 30%;">
                    <label for="referent_email" class="text">{{ __('Email di riferimento') }}</label>
                    <div>
                        <input id="referent_email" type="text" style="height: 47px!important" class="form-control @error('referent_email') is-invalid @enderror" name="referent_email" value="{{ $practice->referent_email }}" autocomplete="referent_email" autofocus>

                        @error('referent_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="d-flex">
                    <div class="d-flex align-items-center" style="margin-right: 20px;">
                        <label class="checkbox-wrapper d-flex mt-2">
                            <input {{ $practice->policy == 'true' ? 'checked' : ''}}  type="checkbox" name="policy" id="policy" value="true">     
                            <span class="checkmark"></span> 
                            <span>Richiedi polizza</span>
                        </label>
                    </div>

                    <div class="form-group" style="width: 30%; margin-right: 20px;">
                        <label for="request_policy" class="text">{{ __('Richiesta da') }}</label>
                        <div>
                            <input id="request_policy" type="text" style="height: 47px!important" class="form-control bg-body @error('request_policy') is-invalid @enderror" name="request_policy" value="{{ $practice->request_policy }}" autocomplete="request_policy" autofocus>

                            @error('request_policy')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex">
                        <h6 style="margin-right: 20px;">Tipologia intervento:</h6>
                        <label class="checkbox-wrapper d-flex">
                            <input {{ $practice->policy == '110%' ? 'checked' : ''}} type="checkbox" name="bonus" value="110%">     
                            <span class="checkmark"></span> 
                            <span>Super Bonus 110%</span>
                        </label>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="form-group mr-2" style="width: 30%">
                            <label for="month_processing" class="text">Mese di lavorazione</label>
                            <select style="height: 47px!important" class="form-control bg-body" name="month_processing" id="month_processing">
                                <optgroup label="seleziona mese">
                                    <option {{ $practice->month_processing == 'gennaio' ? 'selected' : ''}} value="gennaio">gennaio</option>
                                    <option {{ $practice->month_processing == 'febbraio' ? 'selected' : ''}} value="febbraio">febbraio</option>
                                    <option {{ $practice->month_processing == 'marzo' ? 'selected' : ''}} value="marzo">marzo</option>
                                    <option {{ $practice->month_processing == 'aprile' ? 'selected' : ''}} value="aprile">aprile</option>
                                    <option {{ $practice->month_processing == 'maggio' ? 'selected' : ''}} value="maggio">maggio</option>
                                    <option {{ $practice->month_processing == 'giugno' ? 'selected' : ''}} value="giugno">giugno</option>
                                    <option {{ $practice->month_processing == 'luglio' ? 'selected' : ''}} value="luglio">luglio</option>
                                    <option {{ $practice->month_processing == 'agosto' ? 'selected' : ''}} value="agosto">agosto</option>
                                    <option {{ $practice->month_processing == 'settembre' ? 'selected' : ''}} value="settembre">settembre</option>
                                    <option {{ $practice->month_processing == 'ottobre' ? 'selected' : ''}} value="ottobre">ottobre</option>
                                    <option {{ $practice->month_processing == 'novembre' ? 'selected' : ''}} value="novembre">novembre</option>
                                    <option {{ $practice->month_processing == 'dicembre' ? 'selected' : ''}} value="dicembre">dicembre</option>
                                    </optgroup>
                            </select>
                        </div>
                        <div class="form-group mb-2 mr-2" style="width: 20%;">
                            <label for="year_processing" class="text"></label>
                            <div>
                                <input id="year_processing" type="text" style="height: 47px!important" class="form-control" name="year_processing" value="{{ $practice->year_processing }}" disabled>
                            </div>
                        </div>
                        <div class="form-group mr-2" style="width: 40%">
                            <label for="sal" class="text">SAL</label>
                            <select style="height: 47px!important" class="form-control bg-body" name="sal" id="sal">
                                <optgroup label="seleziona mese">
                                    <option {{ $practice->sal == 'sal finale' ? 'selected' : ''}} value="sal finale">Sal finale</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group" style="width: 30%;">
                            <label for="import_sal" class="text"> Importo SAL/Lavori</label>
                            <div>
                                <input id="import_sal" type="text" style="height: 47px!important" class="form-control" name="import_sal" value="{{ $practice->import_sal}}" disabled>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label for="note" class="text">{{ __('note') }}</label>
                    <textarea class="p-2 border" style="width: 100%" name="note" id="note" cols="30" rows="2">{{ $practice->note }}</textarea>
                    <label class="checkbox-wrapper d-flex mt-2">
                        <input {{ $practice->practice_ok == 'true' ? 'checked' : ''}}  type="checkbox" name="practice_ok" value="true">     
                        <span class="checkmark"></span> 
                        <span>Pratica in regola</span>
                    </label>
                </div>

                <div class="d-flex align-content-center justify-content-end">
                    <a href="{{ route('business.practice.index') }}" class="add-button" style="background-color: #818387" >
                        {{ __('Annulla')}}
                    </a>
                    <button type="submit" class="add-button position-relative ml-2">
                        {{ __('Conferma') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection