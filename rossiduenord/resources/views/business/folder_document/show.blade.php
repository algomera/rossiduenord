@extends('business.layouts.business')

@section('content')
    @include('business.layouts.partials.practiceNav')

    <div class="d-flex pb-20">

        {{-- column left --}}
        <div class="px-20 pb-20" style="width: 20%; border-right: 1px solid lightgrey;">
            <h3>Sezione</h3>
            @foreach ($folder_documents as $folder_document)
                <div>
                    <a href="{{ route('business.folderDocument.show', [$practice, $folder_document])}}">
                        <button type="button" class="add-button mb-2 {{'business.folderDocument.show' && request()->route()->parameter('folder_document')->name == $folder_document->name ? 'active_folder' : ''}}">
                            {{$folder_document->name}}
                        </button>
                    </a>
                </div>
            @endforeach
        </div>

        {{-- column right --}}
        <div class="px-20 pb-20" style="width: 80%">
            
            {{-- lista cartelle --}}
            <h3 style="border-bottom: 2px solid #f2f2f2;">Lista cartelle</h3>
            <div style="height: 420px; overflow: auto" class="overflow-custom">
                <table class="table_bonus" style="width: 100%">
                    <thead>
                        <tr>
                            <td style="width:10%;"><b>Stato</b></td>
                            <td style="width:60%;"><b>Descrizione</b></td>
                            <td style="width:20%;"><b>Ruolo</b></td>
                            <td class="text-center" style="width: 10%"><b>Apri</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sub_folders as $sub_folder)
                            <tr class=" row_folder {{request()->route()->parameter('sub_folder') ? request()->route()->parameter('sub_folder')->name == $sub_folder->name ? 'selected_folder' : '' : ''}}">
                                <td class="text-left">{{$sub_folder->status}}</td>
                                <td class="text-left">{{$sub_folder->name}}</td>
                                <td class="text-left">{{$sub_folder->role}}</td>
                                <td class="text-center ">
                                    <a href="{{ route('business.document.show', [$practice, $sub_folder->folder_document, $sub_folder])}}">
                                        <button type="button" class="add-button mb-2">
                                            Visiona
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- lista documenti --}}
            <div class="mt-3">
                <div class="d-flex">
                    <a class="add-btn-custom" style="margin-left: 0" href="#FormDocument" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">+</a>
                    <h3>Inserisci documento</h3>
                </div>
    
                <form action="{{ route('business.document.store', [$practice->id, $folder_document->id, $sub_folder->id] )}}" method="POST" enctype="multipart/form-data" class="collapse" id="FormDocument" style="background-color: #f2f2f2">
                    @csrf
    
                    <div class="box_input">
                        <div class="row_input">
                            <input type="hidden" name="practice_id" value="{{$practice->id}}">
                            <label for="folder_id" class="text" style="width: 70%">
                                Cartella
                                <select style="height: 47px!important; text-align:left;" class="form-control" name="sub_folder_id" id="sub_folder_id">
                                    <optgroup label="Seleziona Cartella">
                                    @foreach($sub_folders as $sub_folder)
                                        <option {{request()->route()->parameter('sub_folder') ? request()->route()->parameter('sub_folder')->name == $sub_folder->name ? 'selected' : '' : ''}} value="{{$sub_folder->id}}">{{$sub_folder->name}}</option>
                                    @endforeach
                                </select>
                            </label>
                            <label for="allega" style="width: 30%">
                                Allega
                                <input style="height: 47px!important" class="form-control" type="file" name="allega" id="allega">
                            </label>
                        </div>
                        <div class="row_input">
                            <label style="width: 100%;" for="note">
                                Note
                                <input style="height: 47px!important; width:100%; text-align:left" class="form-control" type="text" name="note" id="note">
                            </label>
                        </div>
                        <div class="row_input">
                            <label class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="type" id="type" value="Documento interno">
                                <span class="checkmark"></span>
                                Documento interno
                            </label>
                            <label class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="type" id="type" value="Documento che necessita di approvazione speciale">
                                <span class="checkmark"></span>
                                Documento che necessita di approvazione speciale
                            </label>
                            <label class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="type" id="type" value="Indispensabile">
                                <span class="checkmark"></span>
                                Indispensabile
                            </label>
                            <label class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="type" id="type" value="SAL 1">
                                <span class="checkmark"></span>
                                SAL 1
                            </label>
                            <label class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="type" id="type" value="SAL 2">
                                <span class="checkmark"></span>
                                SAL 2
                            </label>
                            <label class="checkbox-wrapper d-flex">
                                <input type="checkbox" name="type" id="type" value="SAL finale">
                                <span class="checkmark"></span>
                                SAL finale
                            </label>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="row_input">
                                <label class="checkbox-wrapper d-flex">
                                    <input type="checkbox" name="type" id="type" value="Documentazione ricorrente">
                                <span class="checkmark"></span>
                                    Documentazione ricorrente
                                </label>
                                <label class="checkbox-wrapper d-flex">
                                    <input type="checkbox" name="type" id="type" value="Non necessario">
                                    <span class="checkmark"></span>
                                    Non necessario
                                </label>
                                <label class="checkbox-wrapper d-flex">
                                    <input type="checkbox" name="type" id="type" value="Non inserire nei fascicoli">
                                    <span class="checkmark"></span>
                                    Non inserire nei fascicoli
                                </label>
                                <label class="checkbox-wrapper d-flex">
                                    <input type="checkbox" name="type" id="type" value="Con scadenza">
                                    <span class="checkmark"></span>
                                    Con scadenza
                                </label>
                            </div>
                            <button type="submit" class="add-button position-relative">
                                {{ __('Salva') }}
                            </button>
                        </div>
                    </div>
                </form>

                @if(sizeof($documents) > 0)
                    <h3 class="mt-3">Lista documenti: {{request()->route()->parameter('sub_folder')->name}}</h3>
                    <table class="table_bonus" style="width: 100%">
                        <thead>
                            <tr>
                                <td class="text-center" style="width:5%;"><b>N.</b></td>
                                <td style="width:20%;"><b>Tipo</b></td>
                                <td style="width:60%;"><b>Note documento</b></td>
                                <td class="text-center" style="width:10%;"><b>allegato</b></td>
                                <td class="text-center"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($documents as $document)
                                <tr>
                                    <td class="text-center">{{$document->id}}</td>
                                    <td class="text-left">{{$document->type}}</td>
                                    <td class="text-left">{{$document->note}}</td>
                                    <td class="text-center">
                                        <a style="color: #61a4d7!important" href="{{ asset('storage/' . $document->allega)}}" download="{{$document->allega}}.pdf">scarica</a>
                                    </td>
                                    <td class="d-flex">
                                        <button type="button" class="btn" data-toggle="modal" data-target="#del{{$document->id}}">
                                            <img style="width: 17px;" src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                            <p class="m-0" style="color: #818387; font-size: 12px">Elimina</p>
                                        </button>
        
                                        <div class="modal fade" id="del{{$document->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Conferma elimina file</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Sei sicuro di volere eliminare il documento?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">indietro</button>
                                                        <form action="{{ Route('business.document.destroy', [$practice->id, $folder_document->id, $sub_folder->id, $document->id])}}" method="POST">
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
                @else
                    <h4 class="mt-5">Nessun documento inserito!</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
