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