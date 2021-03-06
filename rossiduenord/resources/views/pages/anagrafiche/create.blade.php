@extends('layouts.app')

@section('content')
    <div class="content-main">
        <div class="box px-20 pb-20 pt-20">
            <span class="black text-md"><b>Crea Anagrafica</b></span>
            <hr class="bg-black">

            <form action="{{ route('anagrafiche.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col">
                        <h4>Dati</h4>
                        <div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="subject_type" class="text">Tipologia soggetto</label>
                                        <select style="height: 47px!important" class="form-control" name="subject_type" id="subject_type">
                                            @foreach(config('anagrafiche.subject_types') as $subject_type)
                                                <option value="{{ $subject_type }}">{{ $subject_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="subject_type" class="text">Tipologia consulente</label>
                                        <select style="height: 47px!important" class="form-control" name="consultant_type" id="consultant_type">
                                            <option value="" selected>Seleziona un contatto nell'anagrafica...</option>
                                            @foreach(config('anagrafiche.consultant_types') as $consultant_type)
                                                <option value="{{ $consultant_type }}">{{ $consultant_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="company_name" class="text">{{ __('Ragione Sociale') }} *</label>
                                        <div>
                                            <input id="company_name" type="text" style="height: 47px!important" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required>

                                            @error('company_name')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="first_name" class="text">{{ __('Nome') }} *</label>
                                        <div>
                                            <input id="first_name" type="text" style="height: 47px!important" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required>

                                            @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="last_name" class="text">{{ __('Cognome') }} *</label>
                                        <div>
                                            <input id="last_name" type="text" style="height: 47px!important" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required>

                                            @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="address" class="text">{{ __('Indirizzo') }}</label>
                                        <div>
                                            <input id="address" type="text" style="height: 47px!important" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}">

                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="zip" class="text">{{ __('CAP') }}</label>
                                        <div>
                                            <input id="zip" type="text" style="height: 47px!important" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}">

                                            @error('zip')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="city" class="text">{{ __('Citt??') }} *</label>
                                        <div>
                                            <input id="city" type="text" style="height: 47px!important" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required>

                                            @error('city')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="province" class="text">{{ __('Provincia') }}</label>
                                        <div>
                                            <input id="province" type="text" style="height: 47px!important" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ old('province') }}">

                                            @error('province')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="iban" class="text">{{ __('IBAN') }}</label>
                                        <div>
                                            <input id="iban" type="text" style="height: 47px!important" class="form-control @error('iban') is-invalid @enderror" name="iban" value="{{ old('iban') }}">

                                            @error('iban')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="vat" class="text">{{ __('Partita IVA') }}</label>
                                        <div>
                                            <input id="vat" type="text" style="height: 47px!important" class="form-control @error('vat') is-invalid @enderror" name="vat" value="{{ old('vat') }}">

                                            @error('vat')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="fiscal_code" class="text">{{ __('Codice Fiscale') }}</label>
                                        <div>
                                            <input id="fiscal_code" type="text" style="height: 47px!important" class="form-control @error('fiscal_code') is-invalid @enderror" name="fiscal_code" value="{{ old('fiscal_code') }}">

                                            @error('fiscal_code')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="phone" class="text">{{ __('Telefono') }}</label>
                                        <div>
                                            <input id="phone" type="text" style="height: 47px!important" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">

                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="fax" class="text">{{ __('Fax') }}</label>
                                        <div>
                                            <input id="fax" type="text" style="height: 47px!important" class="form-control @error('fax') is-invalid @enderror" name="fax" value="{{ old('fax') }}">

                                            @error('fax')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email" class="text">{{ __('Email') }}</label>
                                        <div>
                                            <input id="email" type="email" style="height: 47px!important" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email_pec" class="text">{{ __('Email PEC') }}</label>
                                        <div>
                                            <input id="email_pec" type="email" style="height: 47px!important" class="form-control @error('email_pec') is-invalid @enderror" name="email_pec" value="{{ old('email_pec') }}">

                                            @error('email_pec')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="ticket_code" class="text">{{ __('Codice ticket') }}</label>
                                        <div>
                                            <input id="ticket_code" type="text" style="height: 47px!important" class="form-control @error('ticket_code') is-invalid @enderror" name="ticket_code" value="{{ old('ticket_code') }}">

                                            @error('ticket_code')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="date_of_birth" class="text">{{ __('Data di nascita') }}</label>
                                        <div>
                                            <input id="date_of_birth" type="date" style="height: 47px!important" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}">

                                            @error('date_of_birth')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="common_of_birth" class="text">{{ __('Comune di nascita') }}</label>
                                        <div>
                                            <input id="common_of_birth" type="text" style="height: 47px!important" class="form-control @error('common_of_birth') is-invalid @enderror" name="common_of_birth" value="{{ old('common_of_birth') }}">

                                            @error('common_of_birth')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="province_of_birth" class="text">{{ __('Provincia') }}</label>
                                        <div>
                                            <input id="province_of_birth" type="text" style="height: 47px!important" class="form-control @error('province_of_birth') is-invalid @enderror" name="province_of_birth" value="{{ old('province_of_birth') }}">

                                            @error('province_of_birth')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <p>
                                <strong>Estremi iscrizione albo professionale</strong>
                            </p>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="order_or_college" class="text">{{ __('Ordine o Collegio') }}</label>
                                        <div>
                                            <input id="order_or_college" type="text" style="height: 47px!important" class="form-control @error('order_or_college') is-invalid @enderror" name="order_or_college" value="{{ old('order_or_college') }}">

                                            @error('order_or_college')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="order_or_college_province" class="text">{{ __('Provincia') }}</label>
                                        <div>
                                            <input id="order_or_college_province" type="text" style="height: 47px!important" class="form-control @error('order_or_college_province') is-invalid @enderror" name="order_or_college_province" value="{{ old('order_or_college_province') }}">

                                            @error('order_or_college_province')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="order_or_college_number" class="text">{{ __('N. di Iscrizione') }}</label>
                                        <div>
                                            <input id="order_or_college_number" type="text" style="height: 47px!important" class="form-control @error('order_or_college_number') is-invalid @enderror" name="order_or_college_number" value="{{ old('order_or_college_number') }}">

                                            @error('order_or_college_number')
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <h4>Ruoli</h4>
                        <div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Sel.</th>
                                    <th>Ruolo</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subject_roles as $sr)
                                    <tr>
                                        <td style="width: 50px">
                                            <input type="checkbox" name="roles[]" value="{{ $sr->id }}">
                                        </td>
                                        <td>{{ $sr->name }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <button type="submit" class="add-button position-relative">
                    {{ __('Salva') }}
                </button>
            </form>
        </div>
    </div>
@endsection
