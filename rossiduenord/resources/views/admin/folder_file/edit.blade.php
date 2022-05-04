@extends('admin.layouts.admin')

@section('content')
    <div class="content-main">
        <div class="box px-20 pb-20 pt-20">

            <span class="black text-md"><b>Modifica cartella:</b> {{ $folder->name }}</span>
            <hr class="bg-black">

            @include('admin.layouts.partials.error')

            <form action="{{ route('admin.folder.update', $folder->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name" class="text">{{ __('Titolo') }}</label>
                    <div>
                        <input id="name" type="text" style="height: 47px!important" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $folder->name }}" required autocomplete="name" autofocus>

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
                        <option {{ $folder->type === 'documenti vari' ? 'selected' : '' }} value="documenti vari">documenti vari</option>
                        <option {{ $folder->type === 'documenti fiscali' ? 'selected' : '' }} value="documenti fiscali">documenti fiscali</option>
                    </select>
                </div>
                <button type="submit" class="add-button position-relative">
                    {{ __('Salva modifiche') }}
                </button>
            </form>
        </div>
    </div>
@endsection
