@extends('admin.layouts.admin')

@section('content')
    <div class="content-main">
        <div class="box px-20 pt-20 pb-20">
            <span class="black text-md"><b>Carica file</b></span>
            <hr class="bg-black">  

            <form action="{{ route('admin.file.store', $file->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title" class="text">{{ __('Titolo') }}</label>
                    <div>
                        <input id="title" type="text" style="height: 47px!important" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

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
                        <option selected disabled value="">Seleziona cartella</option>
                        @foreach($folders as $folder)
                            <option value="{{$folder->id}}">{{$folder->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="file" class="text">Carica</label>
                    <input type="file" name="file" id="file">
                </div>
                <button type="submit" class="add-button position-relative">
                    {{ __('Salva file') }}
                </button>
            </form>
        </div>
    </div>
@endsection