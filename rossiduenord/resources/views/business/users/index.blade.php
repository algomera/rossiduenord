@extends('business.layouts.business')

@section('content')

    <script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"> </script>
    <script type='text/javascript'>
        $(document).ready(function(){
        $("#searchUser").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#table_ContentList tr").filter(function() {
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
        
        <a href="{{route('business.users.create')}}" class="add-button">+ Aggiungi Utente</a>

        <div class="box px-20 pb-20 pt-20">
            <span class="black text-md"><b>Elenco Utenti</b></span>
            <hr class="bg-black">

            @if(sizeof($users) > 0)
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="d-inline">
                            <span class="text-sm grey">Elementi visualizzati</span>
                            <input class="type-number" type="number" value="100" name="" id="">
                        </div>

                        <button id="select-all" class="btn-custom bg-black white checkall"  >Seleziona tutto</button>
                        <button id="deselect-all" class="btn-custom bg-grey white uncheckall"  >Deseleziona tutto</buttonhref=>
                        <button id="visible-column" class="btn-custom bg-lighgrey black">Visibilità colonna</button>
                        <button id="select-delete" class="btn-custom bg-red white" data-toggle="modal" >Elimina selezionato</button>
                    </div>
                    <div class="position-relative w-25">
                        <input class="search" type="search" placeholder="Cerca" name="" id="searchUser">
                        <img class="img-search" src="{{ asset('/img/icon/ICONA-CERCA.svg')}}" alt="">
                    </div>
                </div>

                <div class="table mt-2">
                    <table>
                        <thead>
                            <tr style="border-top: 1px solid #707070">
                                <th style="width: 2%"></th>
                                <th style="width: 5%">ID</th>
                                <th style="width: 10%">Nome</th>
                                <th style="width: 20%">Email</th>
                                <th style="width: 18%">Tipologia</th>
                                <th style="width: 10%">Creato da</th>
                                <th style="width: 22%"></th>
                            </tr>
                        </thead>
                        <tbody id="table_ContentList" >
                            @foreach($users as $user) 
                            <tr>
                                <td style="border-left: 1px solid #707070">
                                    <input class="ceck" type="checkbox"  name="id" > <!-- #checbox item to handle by function  -->
                                </td>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <div class="pill">
                                        {{$user->role}}
                                    </div>
                                </td>
                                <td>{{$user->created_by}}</td>
                                <td class="">
                                    <a href="{{route('business.users.show', $user)}}" class="btn-custom white bg-green">
                                        Vedi
                                    </a>
                                    <a href="{{route('business.users.edit', $user)}}" class="btn-custom white bg-black">
                                        Modifica
                                    </a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del{{$user->id}}">
                                        elimina
                                    </button>

                                    <div class="modal fade" id="del{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Conferma elimina utente</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Sei sicuro di volere eliminare l'utente: {{$user->name}} ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">indietro</button>
                                                    <form action="{{ Route('business.users.destroy', $user->id) }}" method="POST">
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
                <h5>Nessun profilo registrato al momento! </h5>
            @endif
        </div>
    </div>
@endsection
