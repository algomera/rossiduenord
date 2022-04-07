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
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript" >
// canvas element
const ctx = document.getElementById('myChart').getContext('2d');
// 
const labels = [
    'Gen',
    'Feb',
    'Mar',
    'Apr',
    'Mag',
    'Giu',
    'Lug',
    'Ago',
    'Set',
    'Ott',
    'Nov',
    'Dice',
  ];
  const data = {
    labels: labels,
    datasets: [{
      backgroundColor: [
          'rgb(244, 180, 0)',
          'rgb(149, 246, 0)',
          'rgb(149, 246, 231)',
          'rgb(149, 246, 252)',
          'rgb(44, 197, 252)',
          'rgb(44, 139, 252)',
          'rgb(244, 180, 0)',
          'rgb(44, 197, 252)',
          'rgb(149, 246, 231)',
          'rgb(149, 246, 252)',
          'rgb(44, 197, 252)',
          'rgb(44, 139, 252)',
        ],
        borderRadius: 50,
        borderColor: [
            'rgb(250, 253, 237)',
            'rgb(250, 253, 237)',
            'rgb(250, 253, 237)',
            'rgb(250, 253, 237)',
            'rgb(250, 253, 237)',
            'rgb(250, 253, 237)',
            'rgb(250, 253, 237)',
        ],
      data: [50, 35, 24, 5, 20, 30, 45, 99 , 76 , 54 , 32, 66],
    },
   ]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
        plugins:{
            legend:{
                display:false
            }
        },
        scales:{
            y: {
                display:false,
                stacked:true,
                grid:{
                    display:false
                },
                angleLines:{
                    display: false
                },
                ticks:{
                    display:false,
                },
                beginAtZero:true,
            },
            x:{
                gridLines:{
                    zeroLineColor:"rgb(255,255,255)"
                },
                grid:{
                    display:false
                },
                ticks:{
                    color: '#000',
                    fontSize:12
                },
            }
        }
    },
  };
// chart inizialitation
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
@endsection
