@extends('layouts.app')

@section('content')
    <div class="content-main">
        <div class="box px-20 py-3">
            <span class="black text-md"><b>Modifica file:</b> {{ $file->title}}</span>
            <hr class="bg-black">

            @include('layouts.partials.error')

            <form action="{{ route('file.update', $file->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title" class="text">{{ __('Titolo') }}</label>
                    <div>
                        <input id="title" type="text" style="height: 47px!important" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $file->title }}" required autocomplete="title" autofocus>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="folder_id" class="text">Cartella</label>
                    <select style="height: 47px!important" class="form-control" name="folder_id" id="folder_id">
                        <option value="">Seleziona cartella</option>
                        @foreach($folders as $folder)
                            <option value="{{$folder->id}}" {{$folder->id == old('folder_id', $file->folder_id) ? 'selected' : ''}}>{{$folder->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <p><b>Attualmente caricato: </b> {{asset($file->file)}}</p>
                    <label for="file" class="text">Carica nuovo file</label>
                    <div>
                        <input value="{{$file->file}}" type="file" name="file" id="file">
                    </div>
                </div>
                <button type="submit" class="add-button position-relative">
                    {{ __('Salva file') }}
                </button>
            </form>
        </div>
    </div>
@endsection
