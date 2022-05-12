@extends('asseverator.layouts.asseverator')

@section('content')
    @include('asseverator.layouts.partials.practiceNav')

            <form class="px-20 pb-20" action="" method="POST">
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

                <div class="d-flex justify-content-between">
                    <div style="width: 48%;" class="form-group">
                        <label for="name" class="text">{{ __('Nome') }}</label>
                        <div>
                            <input id="name" type="text" style="height: 47px!important" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div style="width: 50%;" class="form-group">
                        <label for="lastName" class="text">{{ __('Cognome') }}</label>
                        <div>
                            <input id="lastName" type="text" style="height: 47px!important" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>
                            
                            @error('lastName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="c_f" class="text">{{ __('Codice Fiscale') }}</label>
                    <div>
                        <input id="c_f" type="text" style="height: 47px!important" class="form-control @error('c_f') is-invalid @enderror" name="c_f" value="{{ old('c_f') }}" required autocomplete="c_f" autofocus>

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
                            <input id="phone" type="text" style="height: 47px!important" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                            
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
                            <input id="mobile_phone" type="text" style="height: 47px!important" class="form-control @error('mobile_phone') is-invalid @enderror" name="mobile_phone" value="{{ old('mobile_phone') }}" required autocomplete="mobile_phone" autofocus>
                            
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
                        <input id="email" type="text" style="height: 47px!important;" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div style="width: 65%" class="d-flex align-items-center justify-content-between">
                    <h6>Ruolo nella pratica*</h6>
                    <label class="checkbox-wrapper d-flex">
                        <span>Persona fisica</span>
                        <input type="radio" name="role" value="persona fisica" checked>     
                        <span class="checkmark"></span> 
                    </label>
                    <label class="checkbox-wrapper d-flex">
                        <span>Amministratore di condominio</span>
                        <input type="radio" name="role" value="amministratore di condominio">     
                        <span class="checkmark"></span> 
                    </label>
                    <label class="checkbox-wrapper d-flex">
                        <span>Condominio incaricato</span>
                        <input type="radio" name="role" value="condominio incaricato">     
                        <span class="checkmark"></span> 
                    </label>
                    <label class="checkbox-wrapper d-flex">
                        <span>Unico proprietario di condominio</span>
                        <input type="radio" name="role" value="unico proprietario di condominio">     
                        <span class="checkmark"></span> 
                    </label>

                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="d-flex align-content-center justify-content-end">
                    <a href="{{ route('asseverator.practice.index') }}" class="add-button" style="background-color: #818387" >
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