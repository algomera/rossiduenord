@extends('bank.layouts.bank')

@section('content')
@include('business.layouts.partials.error')
@include('business.layouts.partials.message')

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

    <div class="box px-20 pt-20 pb-20"  style=" margin-bottom:0;">
        <span style="margin-right: 20px" class="black text-md {{Route::currentRouteName() == 'bank.practice.index' ? 'bold' : ''}}">
            Lista Pratiche
        </span>
        <span class="black text-md {{Route::currentRouteName() != 'bank.practice.index' ? 'bold' : ''}}">
            Scheda pratica
        </span>
        <hr class="bg-black" style="margin-top: 5px;">

        <div>
            <form action="" method="POST">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div style="width: 10%">
                        <span class="text-sm grey">Mese</span>
                        <select style="width: 70%"  name="" id="">
                            <option value="">Gennaio</option>
                            <option value="">Febbario</option>
                            <option value="">Marzo</option>
                            <option value="">Aprile</option>
                            <option value="">Maggio</option>
                            <option value="">Giugno</option>
                            <option value="">Luglio</option>
                            <option value="">Agosto</option>
                            <option value="">Settembre</option>
                            <option value="">Ottobre</option>
                            <option value="">Novembre</option>
                            <option value="">Dicembre</option>
                        </select>
                    </div>
                    <div style="width: 20%">
                        <span class="text-sm grey">Fase pratica</span>
                        <select style="width: 70%" name="" id="">
                            <option value="">Tutti</option>
                        </select>
                    </div>
                    <div style="width: 60%">
                        <span class="text-sm grey">Descrizione</span>
                        <input style="width: 90%" type="text">
                    </div>
                    <img class="icon-search" src="{{ asset('/img/icon/CERCA.svg') }}" alt="">
                </div>
    
                <div class="d-flex align-items-center mb-2">
                    <div style="width: 10%">
                        <span class="text-sm grey">N. Pratica</span>
                        <input style="width: 50%"type="number">
                    </div>
                </div>        
            </form>
        </div>
    </div>

    <div class="box px-20 pt-20 pb-20">
        <div class="table mt-2">
            <table class="table_bonus" style="width: 100%">
                <thead>
                    <tr style="border-top: 1px solid #707070">
                        <th style="width: 10%">Piattaforma</th>
                        <th style="width: 5%">Pratica</th>
                        <th style="width: 10%">Data Pratica</th>
                        <th style="width: 15%">Denominazione</th>
                        <th style="width: 10%">Fase</th>
                        <th style="width: 10%">Mese lav.110%</th>
                        <th style="width: 10%">Lista incentivi</th>
                        <th style="width: 15%">Richiedente</th>
                        <th style="width: 15%">SAL</th>
                        <th style="width: 5%">Notifiche</th>
                        <th style="width: 10%"></th>
                    </tr>
                </thead>
                <tbody id="table_ContentList">
                    @forelse ($practices as $practice)
                        <tr @if ($practice->applicant->company_name == '' || $practice->policy_name == '' ) style="filter: grayscale(1); opacity: 0.5;" @endif>
                            <td>{{$practice->applicant->user->user_data->name}}</td>
                            <td>{{$practice->id}}</td>
                            <td>{{ date('d/m/Y', strtotime($practice->created_at)) }}</td>
                            <td>{{$practice->policy_name}}</td>
                            <td>{{$practice->practical_phase}}</td>
                            <td>{{$practice->month_processing}}</td>
                            <td>{{$practice->bonus}}</td>
                            <td>{{$practice->applicant->company_name}}</td>
                            <td>{{$practice->import_sal ?? '-'}}</td>
                            <td></td>
                            <td class="d-flex align-items-center" style="height: fit-content">
                                <a href="{{route('business.practice.edit', $practice->id) }}" class="d-flex flex-column align-items-center justify-content-center mr-3">
                                    <img src="{{ asset('/img/icon/icona_modifica.svg') }}" alt="">
                                    <p class="m-0 " style="color: #818387">Visiona</p>
                                </a>
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
</div>
@endsection