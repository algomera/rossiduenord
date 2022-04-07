@extends('asseverator.layouts.asseverator')

@section('content')
{{-- header --}}
<div class="mb-2" style="padding: 10px 165px 10px 30px; border-bottom: 2px solid rgb(219, 220, 219);">
    <h2 class="light-grey">Dashboard</h2> 
</div>

{{-- main --}}
    <div class="col-8 bg-white ml-3">
        <div class="d-flex justify-content-between pt-4 pb-3 px-3">
            <div>
                <label for="">
                    <span class="fs-2">Conteggi</span> 
                    <div class="text-dark"><h2>€ 250.273,00</h2></div>
                </label>
            </div>
            <div class="d-flex">
                <div class="">
                    <label for="practices-all">Numero pratiche
                        <span class="bg-lightgrey px-2 py-2 text-dark">25</span>
                    </label>
                </div>
                <div class="mx-2">
                    <label for="practices-all">
                        Importo
                        <span class="bg-lightgrey px-2 py-2 text-dark">250000</span>
                    </label>
                </div>
            </div>
            <div>
                <select name="" id="" class="btn btn-dark px-4">
                    <option value="2022">2022</option>
                </select>
            </div>
            
        </div>
        <canvas id="myChart" class="py-3 px-3"></canvas>
    </div>
  {{--  --}}


@push('asseverator-scripts')
    @include('asseverator.scripts.chart')
@endpush
@endsection
