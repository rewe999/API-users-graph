@extends("welcome")
@section('body')

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="row chart">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>

<script>
    let myChart = document.getElementById('myChart').getContext('2d');
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';
    let massPopChart = new Chart(myChart, {
        type:'pie',
        data:{
            labels:[
                @foreach($usernames as $user)
                    "{{$user}}",
                @endforeach
            ],
            datasets:[{
                label:'Number of Posts by User from last 7 days',
                data:[
                    @foreach($posts as $post)
                        {{$post}},
                    @endforeach
                ],
                backgroundColor:[
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)',
                    'rgba(125, 100, 64, 0.6)',
                    'rgba(112, 21, 37, 0.6)',
                    'rgba(65, 99, 132, 0.6)',
                    'rgba(255, 99, 1, 0.6)',
                    'rgba(25, 199, 32, 0.6)',
                ],
                borderWidth:1,
                borderColor:'#777',
                hoverBorderWidth:3,
                hoverBorderColor:'#000'
            }]
        },
        options:{
            title:{
                display:true,
                text:'Number of Posts by User from last 7 days',
                fontSize:25
            },
            legend:{
                display:true,
                position:'right',
                labels:{
                    fontColor:'#000'
                }
            },
            layout:{
                padding:{
                    left:50,
                    right:0,
                    bottom:0,
                    top:0
                }
            },
            tooltips:{
                enabled:true
            }
        }
    });
</script>

<style>
    .chart {
        width: 50vw;
        height: 50vh;
    }
</style>

@endsection
