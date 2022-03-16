@extends('business.layouts.business')

@section('content')
      <script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"> </script>   
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


    <div class="content-main">
        @if(session('message'))
            <div class="alert alert-success" role="alert">
                <strong>{{session('message')}}</strong>
            </div>
        @endif

        <a href="{{route('business.folder.create')}}" class="add-button">+ Aggiungi cartella</a>
        
        <div class="box px-20 pb-20 pt-20">
            <span class="black text-md"><b>Elenco cartelle</b></span>
            <hr class="bg-black">

            @if(sizeof($folders) > 0 || sizeof($relateds) > 0)
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="d-inline">
                            <span class="text-sm grey">Elementi visualizzati</span>
                            <input class="type-number" type="number" value="100" name="" id="">
                        </div>
                        <button id="select-all" class="btn-custom bg-black white checkall">Seleziona tutto</button>
                        <button id="deselect-all" class="btn-custom bg-grey white uncheckall">Deseleziona tutto</button>
                        <button id="visible-column" class="btn-custom bg-lighgrey black">Visibilità colonna</button>
                        <button id="select-delete" class="btn-custom bg-red white">Elimina selezionato</button>
                    </div>
                    <form action="" method="POST" class="position-relative w-25">
                        <input class="search" type="text" placeholder="Cerca" name="" id="searchFolder">
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
                                <th style="whith: 10%">Utente</th>
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
                                <td>{{$folder->created_at}}</td>
                                <td>{{$folder->type}}</td>
                                <td>{{$folder->created_by}}</td>
                                <td class="">
                                    <a href="{{route('business.folder.show', $folder->id)}}" class="btn-custom white bg-green">
                                        Vedi
                                    </a>
                                    <a href="{{route('business.folder.edit', $folder->id)}}" class="btn-custom white bg-black">
                                        Modifica
                                    </a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del{{$folder->id}}">
                                        elimina
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
                                                    <form action="{{ Route('business.folder.destroy', $folder->id) }}" method="POST">
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
                        <tbody>
                            @foreach($relateds as $related)
                            <tr>
                                <td style="border-left: 1px solid #707070">
                                    <input class="ceck" type="checkbox" value="{{$related->id}}" name="id" id="id">
                                </td>
                                <td>{{$related->name}}</td>
                                <td>{{$related->created_at}}</td>
                                <td>{{$related->type}}</td>
                                <td>{{$related->created_by}}</td>
                                <td class="">
                                    <a href="{{route('bank.folder.show', $related->id)}}" class="btn-custom white bg-green">
                                        Vedi
                                    </a>
                                    <a href="{{route('bank.folder.edit', $related->id)}}" class="btn-custom white bg-black">
                                        Modifica
                                    </a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del{{$related->id}}">
                                        elimina
                                    </button>

                                    <div class="modal fade" id="del{{$related->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Conferma elimina cartella</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Sei sicuro di volere eliminare {{$related->name}} e tutto il suo contenuto!
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">indietro</button>
                                                    <form action="{{ Route('bank.folder.destroy', $related->id) }}" method="POST">
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

