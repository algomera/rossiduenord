@extends('asseverator.layouts.asseverator')

@section('content')
    @include('asseverator.layouts.partials.practiceNav')

            <form class="px-20 pb-20" action="{{ route('asseverator.applicant.update', $applicant->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="d-flex align-items-center">
                    <h6 style="color: #61a4d7; text-decoration:underline;">Richiedente*</h6>

{{--
                    <div style="margin-left: 30px">
                        <input type="radio" name="applicant" id="applicant" value="privato" checked>
                        <label for="applicant">Privato/Proprietario</label>
                    </div>

 --}}
                    <div style="margin-left: 50px">
                        <input type="radio" name="applicant" id="applicant" value="impresa" checked>
                        <label for="applicant">Impresa/General Contractor</label>
                    </div>

                    @error('applicant')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="company_name" class="text">{{ __('Dati impresa') }}</label>
                            <div>
                                <input id="company_name" type="text" style="height: 47px!important" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') ?? $applicant->company_name   }}" required autofocus>

                                @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

{{--                <div class="d-flex justify-content-between">--}}
{{--                    <div style="width: 48%;" class="form-group">--}}
{{--                        <label for="name" class="text">{{ __('Nome') }}</label>--}}
{{--                        <div>--}}
{{--                            <input id="name" type="text" style="height: 47px!important" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $applicant->name   }}" required autocomplete="name" autofocus>--}}
{{--                            --}}
{{--                            @error('name')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    --}}
{{--                    <div style="width: 50%;" class="form-group">--}}
{{--                        <label for="lastName" class="text">{{ __('Cognome') }}</label>--}}
{{--                        <div>--}}
{{--                            <input id="lastName" type="text" style="height: 47px!important" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') ?? $applicant->lastName  }}" required autocomplete="lastName" autofocus>--}}
{{--                            --}}
{{--                            @error('lastName')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="form-group">
                    <label for="c_f" class="text">{{ __('Codice Fiscale') }}</label>
                    <div>
                        <input id="c_f" type="text"  style="height: 47px!important" class="form-control @error('c_f') is-invalid @enderror" name="c_f" value="{{ old('c_f') ?? $applicant->c_f   }}"  autocomplete="c_f" autofocus>

                        @error('c_f')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <div class="form-group" style="width: 48%;">
                        <label for="phone" class="text">{{ __('Telefono') }}</label>
                        <div>
                            <input id="phone" type="text" style="height: 47px!important" minlength="10" maxlength="10" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $applicant->phone   }}"  autocomplete="phone" autofocus>

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group" style="width: 50%;">
                        <label for="mobile_phone" class="text">{{ __('Cellulare') }}</label>
                        <div>
                            <input id="mobile_phone" type="text" style="height: 47px!important" minlength="10" maxlength="10" class="form-control @error('mobile_phone') is-invalid @enderror" name="mobile_phone" value="{{  old('mobile_phone') ?? $applicant->mobile_phone  }}"  autocomplete="mobile_phone" autofocus>

                            @error('mobile_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="text">{{ __('Email') }}</label>
                    <div>
                        <input id="email" type="email" style="height: 47px!important;" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $applicant->email }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="d-flex align-items-center mb-4">
                    <h6>Ruolo nella pratica*</h6>
                    <label class="checkbox-wrapper d-flex ml-4">
                        <span>Persona fisica</span>
                        <input {{$applicant->role == 'persona fisica' ? 'checked' : ''}} {{old('role') == 'persona fisica' ? 'checked' : ''}}  type="radio" name="role" value="persona fisica">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox-wrapper d-flex ml-4">
                        <span>Amministratore di condominio</span>
                        <input {{$applicant->role == 'amministratore di condominio' ? 'checked' : ''}} {{old('role') == 'amministratore di condominio' ? 'checked' : ''}}  type="radio" name="role" value="amministratore di condominio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox-wrapper d-flex ml-4">
                        <span>Condominio incaricato</span>
                        <input  {{$applicant->role == 'condominio incaricato' ? 'checked' : ''}} {{old('role') == 'condominio incaricato' ? 'checked' : ''}} type="radio" name="role" value="condominio incaricato">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox-wrapper d-flex ml-4">
                        <span>Unico proprietario di condominio</span>
                        <input {{$applicant->role == 'unico proprietario di condominio' ? 'checked' : ''}} {{old('role') == 'unico proprietario di condominio' ? 'checked' : ''}}  type="radio" name="role" value="unico proprietario di condominio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox-wrapper d-flex ml-4">
                        <span>Titolare ditta</span>
                        <input {{$applicant->role == 'titolare ditta' ? 'checked' : ''}} {{old('role') == 'titolare ditta' ? 'checked' : ''}}  type="radio" name="role" value="titolare ditta">
                        <span class="checkmark"></span>
                    </label>

                    {{-- role error modal --}}
                    @error('role')
                        @include('asseverator.layouts.partials.modal')

                    @enderror
                </div>

                @include('asseverator.layouts.partials.form_buttons')
            </form>
        </div>
    </div>
@endsection
