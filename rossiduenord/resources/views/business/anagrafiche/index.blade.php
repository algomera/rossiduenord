@extends('business.layouts.business')

@section('content')
    <div class="content-main">
        <a href="{{route('business.anagrafiche.create')}}" class="add-button">+ Aggiungi Anagrafica</a>

        <div class="box px-20 pb-20 pt-20">
            <div class="d-flex">
                <h6 class="text-md flex-shrink-0">Elenco Anagrafiche</h6>
                <div class="ml-3 d-flex flex-column">
                    <h6 class="text-md font-italic">Legenda:</h6>
                    <div class="border p-2">
                        <div class="row">
                            @foreach($subject_roles as $sr)
                                <div class="col-3">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 border border-dark" style="height: 15px; width: 15px; border-radius: 100%; margin-right: 5px; background-color: {{ $sr->color }}"></div>
                                        <span class="text-truncate">{{ $sr->name }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <hr class="bg-black">
            @if(count($anagrafiche) > 0)
                <div class="table mt-2">
                    <table>
                        <thead>
                        <tr style="border-top: 1px solid #707070">
                            <th style="width: 15%">Categoria</th>
                            <th style="width: 20%">Ragione Sociale</th>
                            <th style="width: 15%">Nome</th>
                            <th style="width: 15%">Cognome</th>
                            <th style="width: 25%">Ruoli</th>
                            <th style="width: 10%"></th>
                        </tr>
                        </thead>
                        <tbody id="table_ContentList" >
                        @foreach($anagrafiche as $anagrafica)
                            <tr>
                                <td>{{$anagrafica->subject_type}}</td>
                                <td>{{$anagrafica->company_name}}</td>
                                <td>{{$anagrafica->first_name}}</td>
                                <td>{{$anagrafica->last_name}}</td>
                                <td>
                                    <div class="d-flex">
                                        @foreach($anagrafica->roles as $role)
                                            <div class="flex-shrink-0 border border-dark" style="height: 15px; width: 15px; border-radius: 100%; margin-right: 3px; background-color: {{ $role->color }}" data-toggle="tooltip" data-placement="top" title="{{ $role->name }}"></div>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="d-flex align-items-center">
                                    <button type="button" class="viewAnagrafica btn white bg-green mr-2" data-toggle="modal" data-target="#anagrafiche-modal" data-company_name="{{$anagrafica->company_name}}">
                                        Vedi
                                    </button>
                                    <a href="{{route('business.anagrafiche.edit', $anagrafica)}}" class="btn white bg-black mr-2">
                                        Modifica
                                    </a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del{{$anagrafica->id}}">
                                        Elimina
                                    </button>

                                    <div class="modal fade" id="del{{$anagrafica->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Conferma elimina anagrafica</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Sei sicuro di volere eliminare l'anagrafica: {{$anagrafica->company_name}} ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                                    <form action="{{ route('business.anagrafiche.delete', $anagrafica) }}" method="POST">
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
                <h5>Nessuna anagrafica al momento! </h5>
            @endif
        </div>
    </div>
@endsection

@push('modals')
    <x-anagrafica-modal />
@endpush

@push('scripts')
    <script type="text/javascript">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endpush
