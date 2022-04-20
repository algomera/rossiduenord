@extends('business.layouts.business')

@section('content')
    @include('business.layouts.partials.practiceNav')

            <form class="px-20 pb-20" action="{{ route('business.practice.update',$practice->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="d-flex">
                    <div style="width: 10%; margin-right: 20px;" class="form-group ">
                        <label for="id" class="text">{{ __('Numero pratica*') }}</label>
                        <div>
                            <input id="id" type="text" style="height: 47px!important" class="form-control bg-body @error('id') is-invalid @enderror" name="id" value="{{$practice->id}}" autocomplete="id" autofocus>

                            @error('id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div style="width: 15%; margin-right: 20px;" class="form-group">
                        <label for="created_at" class="text">{{ __('Data pratica*') }}</label>
                        <div>
                            <input id="created_at" type="text" style="height: 47px!important" class="form-control" name="created_at" value="{{$practice->created_at->format('d/m/y') }}" autocomplete="created_at" autofocus>

                            @error('created_at')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div style="width: 15%;" class="form-group">
                        <label for="import" class="text">{{ __('Importo stimato*') }}</label>
                        <div>
                            <input id="import" type="text" step="0.01" min="0.00" style="height: 47px!important" class="form-control @error('import') is-invalid @enderror" name="import" value="{{old('import') ?? $practice->import }}" autocomplete="import" autofocus required>

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
                        <label for="practical_phase" class="text">Fase pratica*</label>
                        <select style="height: 47px!important" class="form-control bg-body @error('practical_phase') is-invalid @enderror" name="practical_phase" id="practical_phase" value="{{ old('practical_phase') ?? $practice->practical_phase}}" required>
                            <option selected value="">Nessuna</option>
                            <option {{ $practice->practical_phase == 'In istruttoria' ? 'selected' : ''}} {{old('practical_phase') == 'In istruttoria' ? 'selected' : ''}} value="In istruttoria">In istruttoria</option>
                            <option {{ $practice->practical_phase == 'In progettazione' ? 'selected' : ''}} {{old('practical_phase') == 'In progettazione' ? 'selected' : ''}} value="In progettazione">In progettazione</option>
                            <option {{ $practice->practical_phase == 'In offertazione' ? 'selected' : ''}} {{old('practical_phase') == 'In offertazione' ? 'selected' : ''}} value="In offertazione">In offertazione</option>
                            <option {{ $practice->practical_phase == 'In contrattualizzazione lavoro' ? 'selected' : ''}} {{old('practical_phase') == 'In contrattualizzazione lavoro' ? 'selected' : ''}} value="In contrattualizzazione lavoro">In contrattualizzazione lavoro</option>
                            <option {{ $practice->practical_phase == 'In contrattualizazione cessione/finanziamento' ? 'selected' : ''}} {{old('practical_phase') == 'In contrattualizazione cessione/finanziamento' ? 'selected' : ''}} value="In contrattualizazione cessione/finanziamento">In contrattualizazione cessione/finanziamento</option>
                            <option {{ $practice->practical_phase == 'Contrattualizzato' ? 'selected' : ''}} {{old('practical_phase') == 'Contrattualizzato' ? 'selected' : ''}} value="Contrattualizzato">Contrattualizzato</option>
                            <option {{ $practice->practical_phase == 'In fatturazione' ? 'selected' : ''}} {{old('practical_phase') == 'In fatturazion' ? 'selected' : ''}} value="In fatturazione">In fatturazione</option>
                            <option {{ $practice->practical_phase == 'In pagamento' ? 'selected' : ''}} {{old('practical_phase') == 'In pagamento' ? 'selected' : ''}} value="In pagamento">In pagamento</option>
                            <option {{ $practice->practical_phase == 'Operazione terminata con successo' ? 'selected' : ''}} {{old('practical_phase') == 'Operazione terminata con successo' ? 'selected' : ''}} value="Operazione terminata con successo">Operazione terminata con successo</option>
                            <option {{ $practice->practical_phase == 'Operazione rinunciata' ? 'selected' : ''}} {{old('practical_phase') == 'Operazione rinunciata' ? 'selected' : ''}} value="Operazione rinunciata">Operazione rinunciata</option>
                        </select>

                        @error('practical_phase')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-group" style="width: 15%;">
                        <label for="real_estate_type" class="text">Tipo immobile*</label>
                        <select style="height: 47px!important" class="form-control bg-body @error('real_estate_type') is-invalid @enderror" name="real_estate_type" id="real_estate_type" required>
                            <option selected value="">Seleziona</option>
                            <option {{ $practice->real_estate_type == 'Condominio' ? 'selected' : ''}} {{old('real_estate_type') == 'Condominio' ? 'selected' : ''}} value="Condominio">Condominio</option>
                            <option {{ $practice->real_estate_type == 'Unifamiliare' ? 'selected' : ''}} {{old('real_estate_type') == 'Unifamiliare' ? 'selected' : ''}} value="Unifamiliare">Unifamiliare</option>
                            <option {{ $practice->real_estate_type == 'Fabbricato industriale' ? 'selected' : ''}} {{old('real_estate_type') == 'Fabbricato industriale' ? 'selected' : ''}} value="Fabbricato industriale">Fabbricato industriale</option>
                        </select>
                        @error('real_estate_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
{{--                    <div class="form-group" style="width: 15%;">--}}
{{--                        <label for="month" class="text">Mese*</label>--}}
{{--                        <select style="height: 47px!important" class="form-control bg-body @error('month') is-invalid @enderror" name="month" id="month" required>--}}
{{--                            <option selected value="">Seleziona</option>--}}
{{--                            <option {{ $practice->month == 'gennaio' ? 'selected' : ''}} {{old('month') == 'gennaio' ? 'selected' : ''}} value="gennaio">gennaio</option>--}}
{{--                            <option {{ $practice->month == 'febbraio' ? 'selected' : ''}} {{old('month') == 'febbraio' ? 'selected' : ''}} value="febbraio">febbraio</option>--}}
{{--                            <option {{ $practice->month == 'marzo' ? 'selected' : ''}} {{old('month') == 'marzo' ? 'selected' : ''}} value="marzo">marzo</option>--}}
{{--                            <option {{ $practice->month == 'aprile' ? 'selected' : ''}} {{old('month') == 'aprile' ? 'selected' : ''}} value="aprile">aprile</option>--}}
{{--                            <option {{ $practice->month == 'maggio' ? 'selected' : ''}} {{old('month') == 'maggio' ? 'selected' : ''}} value="maggio">maggio</option>--}}
{{--                            <option {{ $practice->month == 'giugno' ? 'selected' : ''}} {{old('month') == 'giugno' ? 'selected' : ''}} value="giugno">giugno</option>--}}
{{--                            <option {{ $practice->month == 'luglio' ? 'selected' : ''}} {{old('month') == 'luglio' ? 'selected' : ''}} value="luglio">luglio</option>--}}
{{--                            <option {{ $practice->month == 'agosto' ? 'selected' : ''}} {{old('month') == 'agosto' ? 'selected' : ''}} value="agosto">agosto</option>--}}
{{--                            <option {{ $practice->month == 'settembre' ? 'selected' : ''}} {{old('month') == 'settembre' ? 'selected' : ''}} value="settembre">settembre</option>--}}
{{--                            <option {{ $practice->month == 'ottobre' ? 'selected' : ''}} {{old('month') == 'ottobre' ? 'selected' : ''}} value="ottobre">ottobre</option>--}}
{{--                            <option {{ $practice->month == 'novembre' ? 'selected' : ''}} {{old('month') == 'novembre' ? 'selected' : ''}} value="novembre">novembre</option>--}}
{{--                            <option {{ $practice->month == 'dicembre' ? 'selected' : ''}} {{old('month') == 'dicembre' ? 'selected' : ''}} value="dicembre">dicembre</option>--}}
{{--                        </select>--}}
{{--                        @error('month')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}

{{--                    <div class="form-group" style="width: 10%;">--}}
{{--                        <label for="year" class="text">{{ __('Anno*') }}</label>--}}
{{--                        <div>--}}
{{--                            <input id="year" type="text" style="height: 47px!important" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') ?? $practice->year }}" autocomplete="year" autofocus required>--}}

{{--                            @error('year')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="col">
                        <div class="form-group">
                            <label for="policy_name" class="text">{{ __('Denominazione*') }}</label>
                            <div>
                                <input id="policy_name" type="text" style="height: 47px!important" class="form-control @error('policy_name') is-invalid @enderror" name="policy_name" value="{{ old('policy_name') ?? $practice->policy_name }}" autocomplete="policy_name" autofocus required>

                                @error('policy_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <div class="form-group" style="width: 45%;">
                        <label for="address" class="text">{{ __('Indirizzo*') }}</label>
                        <div>
                            <input id="address" type="text" style="height: 47px!important" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?? $practice->address }}" autocomplete="address" autofocus required>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group" style="width: 5%;">
                        <label for="civic" class="text">{{ __('N.*') }}</label>
                        <div>
                            <input id="civic" type="text" style="height: 47px!important" class="form-control @error('civic') is-invalid @enderror" name="civic" value="{{ old('civic') ?? $practice->civic }}" autocomplete="civic" autofocus required>

                            @error('civic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group" style="width: 15%;">
                        <label for="common" class="text">{{ __('Comune*') }}</label>
                        <div>
                            <input id="common" type="text" style="height: 47px!important" class="form-control @error('common') is-invalid @enderror" name="common" value="{{ old('common') ?? $practice->common }}" autocomplete="common" autofocus required>

                            @error('common')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group" style="width: 5%;">
                        <label for="province" class="text">{{ __('Provincia*') }}</label>
                        <div>
                            <input id="province" type="text" style="height: 47px!important" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ old('province') ?? $practice->province }}" autocomplete="province" autofocus required>

                            @error('province')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group" style="width: 15%;">
                        <label for="region" class="text">Regione*</label>
                        <select style="height: 47px!important" class="form-control bg-body @error('region') is-invalid @enderror" name="region" id="region" required>
                            <option selected value="">Seleziona</option>
                            <option {{ $practice->region == 'Abruzzo' ? 'selected' : ''}} {{old('region') == 'Abruzzo' ? 'selected' : ''}} value="Abruzzo">Abruzzo</option>
                            <option {{ $practice->region == 'Basilicata' ? 'selected' : ''}} {{old('region') == 'Basilicata' ? 'selected' : ''}} value="Basilicata">Basilicata</option>
                            <option {{ $practice->region == 'Calabria' ? 'selected' : ''}} {{old('region') == 'Calabria' ? 'selected' : ''}} value="Calabria">Calabria</option>
                            <option {{ $practice->region == 'Campania' ? 'selected' : ''}} {{old('region') == 'Campania' ? 'selected' : ''}} value="Campania">Campania</option>
                            <option {{ $practice->region == 'Emilia-Romagna' ? 'selected' : ''}} {{old('region') == 'Emilia-Romagna' ? 'selected' : ''}} value="Emilia-Romagna">Emilia-Romagna</option>
                            <option {{ $practice->region == 'Friuli Venezia Giulia' ? 'selected' : ''}} {{old('region') == 'Friuli Venezia Giulia' ? 'selected' : ''}} value="Friuli Venezia Giulia">Friuli Venezia Giulia</option>
                            <option {{ $practice->region == 'Lazio' ? 'selected' : ''}} {{old('region') == 'Lazio' ? 'selected' : ''}} value="Lazio">Lazio</option>
                            <option {{ $practice->region == 'Liguria' ? 'selected' : ''}} {{old('region') == 'Liguria' ? 'selected' : ''}} value="Liguria">Liguria</option>
                            <option {{ $practice->region == 'Lombardia' ? 'selected' : ''}} {{old('region') == 'Lombardia' ? 'selected' : ''}} value="Lombardia">Lombardia</option>
                            <option {{ $practice->region == 'Marche' ? 'selected' : ''}} {{old('region') == 'Marche' ? 'selected' : ''}} value="Marche">Marche</option>
                            <option {{ $practice->region == 'Molise' ? 'selected' : ''}} {{old('region') == 'Molise' ? 'selected' : ''}} value="Molise">Molise</option>
                            <option {{ $practice->region == 'Piemonte' ? 'selected' : ''}} {{old('region') == 'Piemonte' ? 'selected' : ''}} value="Piemonte">Piemonte</option>
                            <option {{ $practice->region == 'Puglia' ? 'selected' : ''}} {{old('region') == 'Puglia' ? 'selected' : ''}} value="Puglia">Puglia</option>
                            <option {{ $practice->region == 'Sardegna' ? 'selected' : ''}} {{old('region') == 'Sardegna' ? 'selected' : ''}} value="Sardegna">Sardegna</option>
                            <option {{ $practice->region == 'sicilia' ? 'selected' : ''}} {{old('region') == 'sicilia' ? 'selected' : ''}} value="sicilia">Sicilia</option>
                            <option {{ $practice->region == 'Toscana' ? 'selected' : ''}} {{old('region') == 'Toscana' ? 'selected' : ''}} value="Toscana">Toscana</option>
                            <option {{ $practice->region == 'Trentino-Alto Adige' ? 'selected' : ''}} {{old('region') == 'Trentino-Alto Adige' ? 'selected' : ''}} value="Trentino-Alto Adige">Trentino-Alto Adige</option>
                            <option {{ $practice->region == 'Umbria' ? 'selected' : ''}} {{old('region') == 'Umbria' ? 'selected' : ''}} value="Umbria">Umbria</option>
                            <option {{ $practice->region == 'Valle d\'Aosta' ? 'selected' : ''}} {{old('region') == 'Valle d\'Aosta' ? 'selected' : ''}} value="Valle d'Aosta">Valle d'Aosta</option>
                            <option {{ $practice->region == 'Veneto' ? 'selected' : ''}} {{old('region') == 'Veneto' ? 'selected' : ''}} value="Veneto">Veneto</option>
                        </select>
                        @error('region')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group" style="width: 10%;">
                        <label for="cap" class="text">{{ __('CAP*') }}</label>
                        <div>
                            <input id="cap" type="text" style="height: 47px!important" class="form-control @error('cap') is-invalid @enderror" name="cap" value="{{ old('cap') ?? $practice->cap }}" autocomplete="cap" autofocus required>

                            @error('cap')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="form-group" style="width: 15%; margin-right: 20px;">
                        <label for="work_start" class="text">{{ __('Inizio lavori*') }}</label>
                        <div>
                            <input id="work_start" type="date" style="height: 47px!important" class="form-control @error('work_start') is-invalid @enderror" name="work_start" value="{{ old('work_start') ?? $practice->work_start }}" autocomplete="work_start" autofocus required>

                            @error('work_start')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group" style="width: 20%; margin-right: 20px;">
                        <label for="c_m" class="text">{{ __('Importo C.M*') }}</label>
                        <div>
                            <input id="c_m" type="number" placeholder="€ 0,00" style="height: 47px!important" class="form-control @error('c_m') is-invalid @enderror" name="c_m" value="{{ old('c_m') ?? $practice->c_m }}" autocomplete="c_m" autofocus required>

                            @error('c_m')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group" style="width: 20%;">
                        <label for="assev_tecnica" class="text">{{ __('Assev. Tecnica(no IVA)*') }}</label>
                        <div>
                            <input id="assev_tecnica" type="number" placeholder="€ 0,00" style="height: 47px!important" class="form-control @error('assev_tecnica') is-invalid @enderror" name="assev_tecnica" value="{{ old('assev_tecnica') ?? $practice->assev_tecnica }}" autocomplete="assev_tecnica" autofocus required>

                            @error('assev_tecnica')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

{{--
                <div class="d-flex justify-content-between">
                    <div class="form-group" style="width: 45%;">
                        <label for="nominative" class="text">{{ __('Nominativo*') }}</label>
                        <div>
                            <input id="nominative" type="text" style="height: 47px!important" class="form-control bg-body @error('nominative') is-invalid @enderror" name="nominative" value="{{ old('nominative') ?? $practice->nominative }}" autocomplete="nominative" autofocus required>

                            @error('nominative')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group" style="width: 26%;">
                        <label for="lastName" class="text">{{ __('Cognome*') }}</label>
                        <div>
                            <input id="lastName" type="text" style="height: 47px!important" class="form-control bg-body @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') ?? $practice->lastName }}" autocomplete="lastName" autofocus required>

                            @error('lastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group" style="width: 26%;">
                        <label for="name" class="text">{{ __('Nome*') }}</label>
                        <div>
                            <input id="name" type="text" style="height: 47px!important" class="form-control bg-body @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $practice->name }}" autocomplete="name" autofocus required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

 --}}
                <div class="form-group">
                    <label for="description" class="text">{{ __('Descrizione') }}</label>
                    <textarea class="p-2 border form-control @error('description') is-invalid @enderror" style="width: 100%" name="description" id="description" cols="30" rows="3">{{ old('description') ??  $practice->description }}</textarea>
                    @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="referent_email" class="text">{{ __('Email di riferimento') }}</label>
                            <div>
                                <input id="referent_email" type="email" style="height: 47px!important" class="form-control @error('referent_email') is-invalid @enderror" name="referent_email" value="{{ old('referent_email') ?? $practice->referent_email }}" autocomplete="referent_email" autofocus>

                                @error('referent_email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="referent_mobile" class="text">{{ __('Cellulare di riferimento') }}</label>
                            <div>
                                <input id="referent_mobile" type="tel" style="height: 47px!important" class="form-control @error('referent_mobile') is-invalid @enderror" name="referent_mobile" value="{{ old('referent_mobile') ?? $practice->referent_mobile }}" autofocus>

                                @error('referent_mobile')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="d-flex align-items-center" style="margin-right: 20px;">
                        <label class="checkbox-wrapper mt-2">
                            <input {{ $practice->policy == '1' ? 'checked' : ''}} {{old('policy') == '1' ? 'checked' : ''}} class="form-check-input @error('policy') is-invalid @enderror"  type="checkbox" name="policy" id="policy" value="true">
                            <span class="checkmark"></span>
                            <span>Richiedi polizza</span>
                            @error('policy')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </label>

                    </div>
                    <div class="form-group" style="width: 30%; margin-right: 20px;">
                        <label for="request_policy" class="text">{{ __('Richiesta da') }}</label>
                        <div>
                            <input id="request_policy" type="text" style="height: 47px!important" class="form-control bg-body @error('request_policy') is-invalid @enderror" name="request_policy" value="{{ old('request_policy') ?? $practice->request_policy }}" autocomplete="request_policy" autofocus>

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
                        <div>
                            <h6 style="margin-right: 20px;" class="@error('bonus') is-invalid @enderror">Tipologia intervento:</h6>
                            @error('bonus')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label for="bonus" class="checkbox-wrapper ">
                            <input {{ $practice->bonus == '110%' ? 'checked' : ''}} {{old('bonus') == '110%' ? 'checked' : ''}} type="checkbox"  name="bonus" id="bonus" value="110%">
                            <span class="checkmark"></span>
                            <span>Super Bonus 110%</span>

                        </label>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="form-group mr-2" style="width: 30%">
                            <label for="month_processing" class="text">Mese di lavorazione</label>
                            <select style="height: 47px!important" class="form-control bg-body @error('month_processing') is-invalid @enderror" name="month_processing" id="month_processing">
                                <optgroup label="seleziona mese">
                                    <option value="">-</option>
                                    <option {{ $practice->month_processing == 'gennaio' ? 'selected' : ''}} {{old('month_processing') == 'gennaio' ? 'selected' : ''}} value="gennaio">gennaio</option>
                                    <option {{ $practice->month_processing == 'febbraio' ? 'selected' : ''}} {{old('month_processing') == 'febbraio' ? 'selected' : ''}} value="febbraio">febbraio</option>
                                    <option {{ $practice->month_processing == 'marzo' ? 'selected' : ''}} {{old('month_processing') == 'marzo' ? 'selected' : ''}} value="marzo">marzo</option>
                                    <option {{ $practice->month_processing == 'aprile' ? 'selected' : ''}} {{old('month_processing') == 'aprile' ? 'selected' : ''}} value="aprile">aprile</option>
                                    <option {{ $practice->month_processing == 'maggio' ? 'selected' : ''}} {{old('month_processing') == 'maggio' ? 'selected' : ''}} value="maggio">maggio</option>
                                    <option {{ $practice->month_processing == 'giugno' ? 'selected' : ''}} {{old('month_processing') == 'giugno' ? 'selected' : ''}} value="giugno">giugno</option>
                                    <option {{ $practice->month_processing == 'luglio' ? 'selected' : ''}} {{old('month_processing') == 'luglio' ? 'selected' : ''}} value="luglio">luglio</option>
                                    <option {{ $practice->month_processing == 'agosto' ? 'selected' : ''}} {{old('month_processing') == 'agosto' ? 'selected' : ''}} value="agosto">agosto</option>
                                    <option {{ $practice->month_processing == 'settembre' ? 'selected' : ''}} {{old('month_processing') == 'settembre' ? 'selected' : ''}} value="settembre">settembre</option>
                                    <option {{ $practice->month_processing == 'ottobre' ? 'selected' : ''}} {{old('month_processing') == 'ottobre' ? 'selected' : ''}} value="ottobre">ottobre</option>
                                    <option {{ $practice->month_processing == 'novembre' ? 'selected' : ''}} {{old('month_processing') == 'novembre' ? 'selected' : ''}} value="novembre">novembre</option>
                                    <option {{ $practice->month_processing == 'dicembre' ? 'selected' : ''}} {{old('month_processing') == 'dicembre' ? 'selected' : ''}} value="dicembre">dicembre</option>
                                </optgroup>
                            </select>
                            @error('month_processing')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2 mr-2" style="width: 20%;">
                            <label for="year_processing" class="text"></label>
                            <div>
                                <input id="year_processing" type="text" style="height: 47px!important" class="form-control" name="year_processing" value="{{old('year_processing') ?? $practice->year_processing }}">
                            </div>
                        </div>
                        <div class="form-group mr-2" style="width: 40%">
                            <label for="sal" class="text">SAL</label>
                            <select style="height: 47px!important" class="form-control bg-body" name="sal" id="sal">
                                <optgroup label="seleziona mese">
                                    <option value="">-</option>
                                    <option {{ $practice->sal == 'Sal 1' ? 'selected' : ''}} {{old('sal') == 'Sal 1' ? 'selected' : ''}} value="Sal 1">Sal finale</option>
                                    <option {{ $practice->sal == 'Sal 2' ? 'selected' : ''}} {{old('sal') == 'Sal 2' ? 'selected' : ''}} value="Sal 2">Sal finale</option>
                                    <option {{ $practice->sal == 'Sal finale' ? 'selected' : ''}} {{old('sal') == 'Sal finale' ? 'selected' : ''}} value="Sal finale">Sal finale</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group" style="width: 30%;">
                            <label for="import_sal" class="text"> Importo SAL/Lavori</label>
                            <div>
                                <input id="import_sal" type="text" style="height: 47px!important" class="form-control" name="import_sal" value="{{old('import_sal') ?? $practice->import_sal}}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-5">
                    <label for="note" class="text">{{ __('Note') }}</label>
                    <textarea class="p-2 border" style="width: 100%" name="note" id="note" cols="30" rows="2">{{old('note') ?? $practice->note }}</textarea>
                    <label class="checkbox-wrapper mt-2">
                        <input {{ $practice->practice_ok == 'true' ? 'checked' : ''}} {{old('practice_ok') == 'true' ? 'checked' : ''}}  type="checkbox" class="@error('practice_ok') is-invalid @enderror" name="practice_ok" value="true">
                        <span class="checkmark"></span>
                        <span>Pratica in regola</span>
                        @error('practice_ok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
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
