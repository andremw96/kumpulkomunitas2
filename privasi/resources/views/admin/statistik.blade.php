@extends('admin.layout')

@section('title', 'Statistik')
@section('content')
<script type="text/javascript">
var f=jQuery.noConflict();
f(function () {
        f('#grafik').highcharts({
            chart: {
                zoomType: 'x'
            },
            title: {
                text: 'Statistik Pengunjung'
            },
            
            xAxis: {
                type: 'datetime'
            },
            yAxis: {
                title: {
                    text: 'Jumlah Pengunjung'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors],
                            [1, Highcharts.Color(Highcharts.getOptions().colors).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },

            series: [{
                type: 'area',
                name: 'Jumlah Pengunjung',
                data: [
                        @foreach($trackers as $tracker)
                            [Date.UTC({{ date("Y,m-1,d", strtotime($tracker->date)) }}),{{ $tracker->hits }}],
                        @endforeach
                      ]
            }]
        });
    });
</script>
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('/admin') }}">Dashboard</a></li>
    <li class="active">Statistik</li>
  </ol> 
</section>

<section class="content">
            <div class="col-lg-12 ">
                <div id="grafik" style="width:100%; height:400px;"></div>
            </div>
</section>

  
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

@endsection