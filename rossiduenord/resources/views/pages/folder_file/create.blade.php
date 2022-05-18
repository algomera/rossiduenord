@extends('layouts.app')

@section('content')
    <div class="content-main">
        <div class="box px-20 pb-20 pt-20">
            <span class="black text-md"><b>Crea cartella</b></span>
            <hr class="bg-black">

            @include('layouts.partials.error')

            <form action="{{ route('folder.store') }}" method="POST">
                @csrf

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
                    <label for="type" class="text">Cartella</label>
                    <select style="height: 47px!important" class="form-control" name="type" id="type">
                        <option disabled selected value="">Seleziona</option>
                        <option value="documenti vari">documenti vari</option>
                        <option value="documenti fiscali">documenti fiscali</option>
                    </select>
                </div>
                <button type="submit" class="add-button position-relative">
                    {{ __('Crea cartella') }}
                </button>
            </form>
        </div>
    </div>
@endsection