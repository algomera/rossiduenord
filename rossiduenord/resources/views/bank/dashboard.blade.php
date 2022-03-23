@extends('bank.layouts.bank')

@section('content')
    <div>
        <div style="padding: 10px 165px 10px 30px; border-bottom: 2px solid #DBDCDB" class="d-flex align-items-center justify-content-between mb-4">
            <h2 class="light-grey">Pannello Controllo</h2>
            <form class="position-relative" style="width: 600px" action="">
                <div>
                    <input class="input_search" type="text" placeholder="Cerca" id="search">
                    <img class="position-absolute" style="right: 25px; top: 15px;" src="{{ asset('/img/icon/ICONA-CERCA.svg') }}" alt="">
                </div>
            </form>
        </div>
        <div class="col-12">
            <div class="card mb-4 p-3">
                <table class="table_bonus">
                    <thead>
                        <tr>
                            <th class="text-left">Imprese</th>
                            <th class="text-left">Ceduto</th>
                            <th>Lavori attuali</th>
                            <th>Numero pratiche</th>
                            <th>Rating tecnico aziendale</th>
                            <th class="text-left">Capacity fiscale</th>
                            <th class="text-left">Società controllore</th>
                            <th class="text-left">Tecnico</th>
                            <th class="text-left">Margine</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left">Rossidue</td>
                            <td class="text-left">18.000.000,00</td>
                            <td>120.000,00</td>
                            <td>47</td>
                            <td>98</td>
                            <td class="text-left"></td>
                            <td class="text-left">Asacert</td>
                            <td class="text-left">Ing Dott. Domenico</td>
                            <td class="text-left">120.000,00</td>
                        </tr>
                        <tr>
                            <td class="text-left">Banca ValSabina</td>
                            <td class="text-left">5.000.000,00</td>
                            <td>20.000,00</td>
                            <td>11</td>
                            <td>70</td>
                            <td class="text-left">Banca ValSabina</td>
                            <td class="text-left">Asacert</td>
                            <td class="text-left">Ing Dott. Roberto Zanetti</td>
                            <td class="text-left">20.000,00</td>
                        </tr>
                        <tr>
                            <td class="text-left">Bianchi1</td>
                            <td class="text-left">20.000.000,00</td>
                            <td>200.000,00</td>
                            <td>24</td>
                            <td>85</td>
                            <td class="text-left">Deutsche Banke</td>
                            <td class="text-left">Asacert</td>
                            <td class="text-left">Arch Marco Rampazzo</td>
                            <td class="text-left">200.000,00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                
                <figure class="highcharts-figure">
                    <div id="chartPractice"></div>
                </figure>
                
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                <script src="https://code.highcharts.com/modules/export-data.js"></script>
                <script src="https://code.highcharts.com/modules/accessibility.js"></script>
            </div>
        </div>
    </div>

    <script type="text/javascript">   
        Highcharts.chart('chartPractice', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Avanzamento Pratiche',
            align: 'left'
        },
        xAxis: {
            categories: ['Rossidue', 'Banca ValSabina', 'Bianchi1'],
            title: {
            text: null
            }
        },
        yAxis: {
            min: 0,
            max: 100,
            minTickInterval: 1
        },
        labels: {
            overflow: 'justify'
        },
        tooltip: {
            valueSuffix: ''
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: '% Avanzamento',
            data: [90, 40, 70],
            colorByPoint: true
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 250
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
        });    
    </script>
    

@endsection
