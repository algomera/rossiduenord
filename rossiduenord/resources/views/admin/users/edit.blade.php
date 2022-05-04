@extends('admin.layouts.admin')

@section('content')
    <div class="content-main">
        <div class="box px-20 pb-20 pt-20">
            <span class="black text-md"><b>Modifica utente:</b> {{ $user->name }}</span>
            <hr class="bg-black">

            @include('admin.layouts.partials.error')

            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="role" class="text">Tipologia profilo</label>
                    <select style="height: 47px!important" class="form-control" name="role" id="role">
                    <optgroup label="Ruoli">
                        @foreach($roles as $role)
                            <option {{ $user->role === $role ? 'selected' : '' }} value="{{ $role }}">{{ ucfirst($role) }}</option>
                        @endforeach
                    </optgroup>
                    </select>
                </div>

                <div class="form-group">
                    <label for="name" class="text">{{ __('Nome') }}</label>
                    <div>
                        <input id="name" type="text" style="height: 47px!important" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="text">{{ __('E-Mail') }}</label>

                    <div>
                        <input id="email" type="email" style="height: 47px!important" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

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
                        <input id="password" type="password" style="height: 47px!important" class="form-control @error('password') is-invalid @enderror" name="password" value="" autocomplete="new-password">

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
                        <input id="password-confirm" type="password" style="height: 47px!important" class="form-control" name="password_confirmation" value="" autocomplete="new-password">
                    </div>
                </div>

                <button type="submit" class="add-button position-relative">
                    {{ __('Salva le modifiche') }}
                </button>
            </form>
        </div>
    </div>
@endsection
