@extends('business.layouts.business')

@section('content')
@include('business.layouts.partials.search')
    <div style="padding: 10px 165px 10px 30px; border-bottom: 2px solid #DBDCDB" class="d-flex align-items-center justify-content-between mb-2">
        <h2 class="light-grey">Pratiche</h2>
        <form class="position-relative" style="width: 600px" action="">
            <div>
                <input class="input_search" type="text" placeholder="Cerca" id="search">
                <img class="position-absolute" style="right: 25px; top: 15px;" src="{{ asset('/img/icon/ICONA-CERCA.svg') }}" alt="">
            </div>
        </form>
    </div>

    <div class="content-main" style="padding-top: 0px;">

        <div class="box px-20 pt-20"  style=" margin-bottom:0;">
            <span style="margin-right: 20px" class="black text-md {{Route::currentRouteName() == 'business.practice.index' ? 'bold' : ''}}">
                Lista Pratiche
            </span>
            <span class="black text-md {{Route::currentRouteName() != 'business.practice.index' ? 'bold' : ''}}">
                Scheda pratica
            </span>
            <hr class="bg-black" style="margin-top: 5px;">

            <div>
                <form action="" method="GET">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div style="width: 10%; margin: 0 10px;">
                            <span class="text-sm grey">Mese</span>
                            <select style="width: 100%"  name="practical_month" id="practical_month">
                                <option value="">Tutti</option>
                                <option value="gennaio" {{ request()->get('practical_month') === 'gennaio' ? 'selected' : '' }}>Gennaio</option>
                                <option value="febbario" {{ request()->get('practical_month') === 'febbario' ? 'selected' : '' }}>Febbario</option>
                                <option value="marzo" {{ request()->get('practical_month') === 'marzo' ? 'selected' : '' }}>Marzo</option>
                                <option value="aprile" {{ request()->get('practical_month') === 'aprile' ? 'selected' : '' }}>Aprile</option>
                                <option value="maggio" {{ request()->get('practical_month') === 'maggio' ? 'selected' : '' }}>Maggio</option>
                                <option value="giugno" {{ request()->get('practical_month') === 'giugno' ? 'selected' : '' }}>Giugno</option>
                                <option value="luglio" {{ request()->get('practical_month') === 'luglio' ? 'selected' : '' }}>Luglio</option>
                                <option value="agosto" {{ request()->get('practical_month') === 'agosto' ? 'selected' : '' }}>Agosto</option>
                                <option value="settembre" {{ request()->get('practical_month') === 'settembre' ? 'selected' : '' }}>Settembre</option>
                                <option value="ottobre" {{ request()->get('practical_month') === 'ottobre' ? 'selected' : '' }}>Ottobre</option>
                                <option value="novembre" {{ request()->get('practical_month') === 'novembre' ? 'selected' : '' }}>Novembre</option>
                                <option value="dicembre" {{ request()->get('practical_month') === 'dicembre' ? 'selected' : '' }}>Dicembre</option>
                            </select>
                        </div>
                        <div style="width: 20%; margin: 0 10px;">
                            <span class="text-sm grey">Fase pratica</span>
                            <select style="width: 100%" name="practical_phase" id="practical_phase">
                                <option value="">Tutti</option>
                                <option value="Nessuna" {{ request()->get('practical_phase') === 'Nessuna' ? 'selected' : '' }}>Nessuna</option>
                                <option value="In istruttoria" {{ request()->get('practical_phase') === 'In istruttoria' ? 'selected' : '' }}>In istruttoria</option>
                                <option value="In progettazione" {{ request()->get('practical_phase') === 'In progettazione' ? 'selected' : '' }}>In progettazione</option>
                                <option value="In offertazione" {{ request()->get('practical_phase') === 'In offertazione' ? 'selected' : '' }}>In offertazione</option>
                                <option value="In contrattualizzazione lavoro" {{ request()->get('practical_phase') === 'In contrattualizzazione lavoro' ? 'selected' : '' }}>In contrattualizzazione lavoro</option>
                                <option value="In contrattualizazione cessione/finanziamento" {{ request()->get('practical_phase') === 'In contrattualizazione cessione/finanziamento' ? 'selected' : '' }}>In contrattualizazione cessione/finanziamento</option>
                                <option value="Contrattualizzato" {{ request()->get('practical_phase') === 'Contrattualizzato' ? 'selected' : '' }}>Contrattualizzato</option>
                                <option value="In fatturazione" {{ request()->get('practical_phase') === 'In fatturazione' ? 'selected' : '' }}>In fatturazione</option>
                                <option value="In pagamento" {{ request()->get('practical_phase') === 'In pagamento' ? 'selected' : '' }}>In pagamento</option>
                                <option value="Operazione terminata con successo" {{ request()->get('practical_phase') === 'Operazione terminata con successo' ? 'selected' : '' }}>Operazione terminata con successo</option>
                                <option value="Operazione rinunciata" {{ request()->get('practical_phase') === 'Operazione rinunciata' ? 'selected' : '' }}>Operazione rinunciata</option>
                            </select>
                        </div>
                        <div style="width: 60%; margin: 0 10px;">
                            <span class="text-sm grey">Descrizione</span>
                            <input style="width: 100%" type="text" name="practical_description" id="practical_description" value="{{ request()->get('practical_description') ?? '' }}">
                        </div>
                        <div style="width: 10%; margin: 0 10px;">
                            <span class="text-sm grey">N. Pratica</span>
                            <input style="width: 100%"type="number" name="practical_number" id="practical_number" value="{{ request()->get('practical_number') ?? '' }}">
                        </div>
                        <button type="submit" class="py-1 px-3 add-button mt-4">
                            Ricerca
                        </button>
                    </div>
{{--                    <input type="reset" style="margin: 0 5px; border: none; background: none" value="Reset" />--}}

{{--                    <div class="d-flex align-items-center mb-2">--}}
{{--                        <div style="width: 10%">--}}
{{--                            <span class="text-sm grey">N. Pratica</span>--}}
{{--                            <input style="width: 50%"type="number">--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </form>

                <div class="mt-4">
                    <div class="d-flex align-items-center" action="">
                        <form action="{{route('business.applicant.store') }}" method="post">
                            @csrf
                            <button type="submit"  class="d-flex flex-column align-items-center justify-content-center mr-3" style="background-color: transparent; border: none;">
                                <img src="{{ asset('/img/icon/icona_nuovo.svg') }}" alt="">
                                <p style="color: #818387">Nuovo</p>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="box px-20 pt-20 pb-20 mb-0">
            <div class="table mt-2">
                <table class="table_bonus" style="width: 100%">
                    <thead>
                        <tr style="border-top: 1px solid #707070">
                            <th style="width: 10%">Piattaforma</th>
                            <th style="width: 5%">Pratica</th>
                            <th style="width: 10%">Data Pratica</th>
                            <th style="width: 15%">Descrizione</th>
                            <th style="width: 10%">Fase</th>
                            <th style="width: 10%">Mese lav.110%</th>
                            <th style="width: 10%">Lista incentivi</th>
                            <th style="width: 15%">Richiedente</th>
                            <th style="width: 15%">SAl</th>
                            <th style="width: 5%">Notifiche</th>
                            <th style="width: 10%"></th>
                        </tr>
                    </thead>
                    <tbody id="table_ContentList">
                        @forelse ($practices as $practice)
                            <tr>
                                <td>{{$practice->nominative}}</td>
                                <td>{{$practice->id}}</td>
                                <td>{{ date('d-m-Y', strtotime($practice->created_at)) }}</td>
                                <td>{{$practice->description}}</td>
                                <td>{{$practice->practical_phase}}</td>
                                <td>{{$practice->month}}</td>
                                <td>{{$practice->bonus}}</td>
                                <td>{{$practice->name}} {{$practice->lastName}}</td>
                                <td>Sal</td>
                                <td></td>
                                <td class="d-flex align-items-center" style="height: fit-content">
                                    <a href="{{route('business.practice.edit', $practice->id) }}" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                        <img src="{{ asset('/img/icon/icona_modifica.svg') }}" alt="">
                                        <p class="m-0" style="color: #818387">Modifica</p>
                                    </a>

                                    <button type="button" data-toggle="modal" data-target="#del{{$practice->applicant_id}}" style="border: none; background-color: transparent;" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                        <img src="{{ asset('/img/icon/icona_cancella.svg') }}" alt="">
                                        <p class="m-0" style="color: #818387">Cancella</p>
                                    </button>

                                    <div class="modal fade" id="del{{$practice->applicant_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Conferma elimina pratica {{$practice->id}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Sei sicuro di volere eliminare la pratica e tutto il suo contenuto!
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">indietro</button>

                                                    <form action="{{ Route('business.practice.destroy', $practice->id) }}" method="POST">
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
                        @empty
                            <tr>
                                <td colspan="10">Nessun risultato</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @include('business.layouts.partials.practice_info')
    </div>
@endsection

