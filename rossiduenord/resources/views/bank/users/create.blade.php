@extends('bank.layouts.bank')

@section('content')
    <div class="content-main">
        <div class="box px-20 pb-20 pt-20">
            <span class="black text-md"><b>Crea utente</b></span>
            <hr class="bg-black">

            @include('bank.layouts.partials.error')    

            <form action="{{ route('bank.users.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="role" class="text">Tipologia profilo</label>
                    <select style="height: 47px!important" class="form-control" name="role" id="role">
                    <optgroup label="Ruoli">
                        <option value="business">Impresa</option>
                    </optgroup>
                    </select>
                </div>

                <div class="form-group">
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

                <div class="form-group">
                    <label for="referent" class="text">{{ __('referente') }}</label>
                    <div>
                        <input id="referent" type="text" style="height: 47px!important" class="form-control @error('referent') is-invalid @enderror" name="referent" value="{{ old('referent') }}" required autocomplete="referent" autofocus>

                        @error('referent')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="referent_phone" class="text">{{ __('Numero referente') }}</label>
                    <div>
                        <input id="referent_phone" type="text" style="height: 47px!important" class="form-control @error('referent_phone') is-invalid @enderror" name="referent_phone" value="{{ old('referent_phone') }}" required autocomplete="name" autofocus>

                        @error('referent_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="text">{{ __('E-Mail') }}</label>

                    <div>
                        <input id="email" type="email" style="height: 47px!important" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="text">{{ __('Password') }}</label>

                    <div>
                        <input id="password" type="password" style="height: 47px!important" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="text">{{ __('Conferma Password') }}</label>

                    <div>
                        <input id="password-confirm" type="password" style="height: 47px!important" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <button type="submit" class="add-button position-relative">
                    {{ __('Salva e invia credenziali') }}
                </button>
            </form>
        </div>
    </div>
@endsection