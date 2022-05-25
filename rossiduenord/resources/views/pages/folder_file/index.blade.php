@extends('layouts.app')

@section('content')
    <div class="content-main">
        <a href="{{route('folder.create')}}" class="add-button">+ Aggiungi cartella</a>

        <div class="box px-20 pb-20 pt-20">
            <span class="black text-md"><b>Elenco cartelle</b></span>
            <hr class="bg-black">

            @if(sizeof($folders) > 0)
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="d-inline">
                            <span class="text-sm grey">Elementi visualizzati</span>
                            <input class="type-number" type="number" value="100" name="" id="">
                        </div>
                        <button id="select-all" class="btn bg-black white checkall">Seleziona tutto</button>
                        <button id="deselect-all" class="btn bg-grey white uncheckall">Deseleziona tutto</button>
                        <button id="select-delete" class="btn bg-red white">Elimina selezionato</button>
                    </div>
                    <form action="" method="POST" class="position-relative w-25">
                        <input class="search" type="text" placeholder="Cerca le cartelle" name="" id="searchFolder">
                        <img class="img-search" src="{{ asset('/img/icon/ICONA-CERCA.svg')}}" alt="">
                    </form>
                </div>

                <div class="table mt-2">
                    <table>
                        <thead>
                            <tr style="border-top: 1px solid #707070">
                                <th style="width: 2%"></th>
                                <th style="width: 25%">Nome cartella</th>
                                <th style="width: 20%">Data creazione</th>
                                <th style="width: 15%">Tipologia</th>
                                <th style="width: 10%">Utente</th>
                                <th style="width: 350px"></th>
                            </tr>
                        </thead>
                        <tbody id="table_ContentListFolder">
                            @foreach($folders as $folder)
                            <tr>
                                <td style="border-left: 1px solid #707070">
                                    <input class="ceck" type="checkbox" value="{{$folder->id}}" name="id" id="id">
                                </td>
                                <td>{{$folder->name}}</td>
                                <td>{{$folder->created_at->format('d/m/y')}}</td>
                                <td>{{$folder->type}}</td>
                                <td>{{$folder->created_by}}</td>
                                <td class="">
                                    <a href="{{route('folder.show', $folder->id)}}" class="btn bg-green white">
                                        Vedi
                                    </a>
                                    <a href="{{route('folder.edit', $folder->id)}}" class="btn white bg-black">
                                        Modifica
                                    </a>
                                    <button type="button" class="btn bg-red white px-1" data-toggle="modal" data-target="#del{{$folder->id}}">
                                        Elimina
                                    </button>

                                    <div class="modal fade" id="del{{$folder->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Conferma elimina cartella</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Sei sicuro di volere eliminare {{$folder->name}} e tutto il suo contenuto!
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">indietro</button>
                                                    <form action="{{ Route('folder.destroy', $folder->id) }}" method="POST">
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
                <h5>Nessuna cartella presente!</h5>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"> </script>
    <script>
        $(document).ready(function(){
            $("#searchFolder").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#table_ContentListFolder tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        $(document).ready(function() {

            $('.checkall').click(function() {
                $(":checkbox").attr("checked", true);
            });

            $('.uncheckall').click(function() {
                $(":checkbox").attr("checked", false);
            });
        });
    </script>
@endpush
