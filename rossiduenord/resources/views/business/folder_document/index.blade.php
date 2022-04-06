@extends('business.layouts.business')

@section('content')
    @include('business.layouts.partials.practiceNav')
   
    <div class="d-flex pb-20">

        {{-- column left --}}
        <div class="px-20 pb-20" style="width: 20%; border-right: 1px solid lightgrey;">
            <h3>Cartelle</h3>
            @foreach ($folder_Documents as $folder_Document)
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group" role="group" aria-label="First group">
                        <a class="add-button mb-2" href="{{ route('business.folder_show', [$practice->id, $folder_Document->id])}}">{{$folder_Document->name}}</a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- column right --}}
        <div class="px-20 pb-20" style="width: 80%">
            <div class="d-flex">
                <h3>Documenti</h3>
                <a class="add-btn-custom" style="color: white!important" href="#FormDocument" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">+</a>
            </div>

            <form action="{{ route('business.documents.store')}}" method="POST" enctype="multipart/form-data" class="collapse" id="FormDocument" style="background-color: #f2f2f2">
                @csrf

                <div class="box_input">
                    <div class="row_input">
                        <label for="folder_id" class="text">
                            Cartella
                            <select style="height: 47px!important" class="form-control" name="folder_id" id="folder_id">
                                <option selected disabled value="">Seleziona cartella</option>
                                @foreach($folder_Documents as $folder_Document)
                                    <option value="{{$folder_Document->id}}">{{$folder_Document->name}}</option>
                                @endforeach
                            </select>
                        </label>
                        <label for="role">
                            Ruolo
                            <select style="height: 47px!important" class="form-control" name="role" id="role">
                                <option value="Area Manager">Area Manager</option>
                                <option value="Asseveratore fiscale">Asseveratore fiscale</option>
                                <option value="Asseveratore tecnico">Asseveratore tecnico</option>
                                <option value="Assicuratore">Assicuratore</option>
                                <option value="Azienda edile">Azienda edile</option>
                                <option value="Azienda impianti elettrici/fotovoltaici">Azienda impianti elettrici/fotovoltaici</option>
                                <option value="Azienda impianti idrotermosanitari">Azienda impianti idrotermosanitari</option>
                                <option value="Banca finanziatrice">Banca finanziatrice</option>
                                <option value="Cessionario credito fiscale">Cessionario credito fiscale</option>
                                <option value="Consulente">Consulente</option>
                                <option value="Contribuente">Contribuente</option>
                                <option value="Direttore lavori">Direttore lavori</option>
                                <option value="General Contractor">General Contractor</option>
                                <option value="Generico">Generico</option>
                                <option value="Proprietario/Amministratore">Proprietario/Amministratore</option>
                                <option value="Richiedente">Richiedente</option>
                                <option value="Strutturista">Strutturista</option>
                                <option value="Tecnico addetto al computo metrico">Tecnico addetto al computo metrico</option>
                                <option value="Termotecnico APE Ante">Termotecnico APE Ante</option>
                                <option value="Termotecnico APE Post">Termotecnico APE Post</option>
                                <option value="Termotecnico progetto">Termotecnico progetto effecientamento energetico</option>
                            </select>
                        </label>
                        <label for="allega">
                            Allega
                            <input style="height: 47px!important" class="form-control" type="file" name="allega" id="allega">
                        </label>
                    </div>
                    <div class="row_input">
                        <label style="width: 100%;" for="description">
                            Descrizione
                            <input style="height: 47px!important; width:100%" class="form-control" type="text" name="description" id="description">
                        </label>
                    </div>
                    <div class="row_input">
                        <label style="width: 100%;" for="note">
                            Note
                            <input style="height: 47px!important; width:100%" class="form-control" type="text" name="note" id="note">
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
        </div>
    </div>
@endsection