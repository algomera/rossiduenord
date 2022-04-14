@extends('business.layouts.business')
@section('content')
@include('business.layouts.partials.practiceNav')
    <div class="bg-white px-20 pb-5">
        <div class="table mt-2">
            <table class="w-100">
                <thead class="text-center">
                    <tr style="border-top: 1px solid #707070">
                        <th style="width: 10%">#</th>
                        <th style="width: 20%">Nome file</th>
                        <th style="width: 20%">Tipologia</th>
                        <th style="width: 20%">Scarica</th>
                        <th style="whith: 20%">Stato</th>
                        <th style="whith: 5%"></th>
                    </tr>
                </thead>
                <tbody id="table_ContentListFolder" class="text-center">
                    @forelse ($contracts as $contract)
                        <tr>
                            <td>{{$contract->id}}</td>
                            <td>{{$contract->name}}</td>
                            <td>{{$contract->typology}}</td>
                            <td> <a class="clickable"> Scarica <i class="fa-solid fa-file-arrow-down fa-1x"></i> </a> </td>
                            <td></td>
                            <td></td>
                        </tr>
                    @empty
                        <td colspan="7" class="text-center">Nessun contratto caricato</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection