@extends('business.layouts.business')

@section('content')
    <div class="content-main">
        {{-- @if(session('message'))
            <div class="alert alert-success" role="alert">
                <strong>{{session('message')}}</strong>
            </div>
        @endif --}}

        <a href="{{route('business.file.create')}}" class="add-button">+ Aggiungi file</a>

        <div class="box px-20 pb-20 pt-20">
            <div style="margin-bottom: 20px">
                <img src="{{ asset('/img/icon/arrow-left.svg')}}" alt="">
                <a href="{{ route('business.folder.index') }}">Torna all'elenco</a>
            </div>

            <span class="black text-md"><b>Elenco file cartella:</b> {{$folder->name}}</span>
            <hr class="bg-black">


            @if(sizeof($files) > 0)
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="d-inline">
                            <span class="text-sm grey">Elementi visualizzati</span>
                            <input class="type-number" type="number" value="100" name="" id="">
                        </div>
                        <button id="select-all" class="btn-custom bg-black white">Seleziona tutto</button>
                        <button id="deselect-all" class="btn-custom bg-grey white">Deseleziona tutto</button>
                        <button id="visible-column" class="btn-custom bg-lighgrey black">Visibilità colonna</button>
                        <button id="select-delete" class="btn-custom bg-red white">Elimina selezionato</button>
                    </div>
                    <div class="position-relative w-25">
                        <input class="search" type="search" placeholder="Cerca" name="" id="">
                        <img class="img-search" src="{{ asset('/img/icon/ICONA-CERCA.svg')}}" alt="">
                    </div>
                </div>
                <div class="table mt-2">
                    <table>
                        <thead>
                            <tr style="border-top: 1px solid #707070">
                                <th style="width: 2%"></th>
                                <th style="width: 5%">Titolo</th>
                                <th style="width: 25%">Data creazione</th>
                                <th style="width: 25%">File</th>
                                <th style="width: 22%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($files as $file)
                            <tr>
                                <td style="border-left: 1px solid #707070">
                                    <input value="{{$file->id}}" class="ceck" type="checkbox" name="id" id="id">
                                </td>
                                <td>{{$file->title}}</td>
                                <td>{{$file->created_at}}</td>
                                <td>
                                    <a href="{{ asset('storage/' . $file->file)}}" download="{{$file->title}}.pdf">scarica</a>
                                </td> 
                                <td class="">
                                    <a href="{{route('business.file.show', $file)}}" class="btn  white bg-green">
                                        Vedi
                                    </a>
                                    <a href="{{route('business.file.edit', $file)}}" class="btn  white bg-black">
                                        Modifica
                                    </a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del{{$file->id}}">
                                    elimina
                                    </button>

                                    <div class="modal fade" id="del{{$file->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Conferma elimina file</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Sei sicuro di volere eliminare {{$file->title}}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">indietro</button>
                                                    <form action="{{ Route('business.file.destroy', $file->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn-custom white bg-red mr-0">
                                                            Conferma
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h5>Nessun file caricato in questa cartella, inizia a caricare il tuo database.</h5>
            @endif
        </div>
    </div>
@endsection
