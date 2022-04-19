@extends('business.layouts.business')
@section('content')
@include('business.layouts.partials.practiceNav') 
        <form action="">
            <div class="bg-white px-20 pb-5">
                <div class="table mt-2">
                    <span class="black text-md"><b>Elenco contratti</b></span>
                    <hr class="bg-black">
        
                    <table class="w-100">
                        <thead class="text-center">
                            <tr style="border-top: 1px solid #707070">
                                <th style="width: 5%">#</th>
                                <th style="width: 20%">Nome file</th>
                                <th style="width: 20%">Scarica</th>
                                <th style="whith: 20%">Stato</th>
                                <th style="whith: 15%"></th>
                            </tr>
                        </thead>
                        <tbody id="table_ContentListFolder" class="text-center">
                            @forelse ($contracts as $contract)
                                <tr>
                                    <td>{{$contract->id}}</td>
                                    <td>{{$contract->name}}</td>
                                    <td> <a href="{{}}" download class="clickable"> Scarica <i class="fa-solid fa-file-arrow-down fa-1x"></i> </a> </td>
                                    <td> {{count($contract->signeds) > 0 ? 'Caricato' : 'Nessuna modifica'}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('business.signed.index',$contract)}}" class="btn btn-primary px-3">Carica</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                  <td colspan="10"> Nessun contratto inserito</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="box-fixed">
                    <a href="{{ route('business.practice.index') }}" class="add-button" style="background-color: #818387" >
                        {{ __('Annulla')}}
                    </a>
                    <button type="submit" class="add-button position-relative ml-2">
                        {{ __('Conferma') }}
                    </button>
                </div>
            </div>
        </form>
@endsection