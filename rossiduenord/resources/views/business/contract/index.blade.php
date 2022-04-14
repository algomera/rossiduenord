@extends('business.layouts.business')
@section('content')
@include('business.layouts.partials.practiceNav')
    <form action="{{route('business.contract.store',$practice->id)}}" method="post" enctype="multipart/form-data">
        @csrf
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
                                <td> <a href="{{route('business.contract.download',$contract->id)}}" class="clickable"> Scarica <i class="fa-solid fa-file-arrow-down fa-1x"></i> </a> </td>
                                <td></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="" target="_blank" class="btn btn-primary px-3">Apri</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                              <td colspan="10"> Nessun contratto inserito</td>
                        @endforelse
                    </tbody>
                </table>
                    <div class="mt-3">
                            <label for="contract_upload" class="btn bg-logo-green white">
                                Inserisi <i class="fa-solid fa-file-arrow-up"></i>
                                <input type="file" name="contract" id="contract_upload" hidden>
                                <input type="text" name="tipology" value="originals" hidden>
                            </label>
                    </div>
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