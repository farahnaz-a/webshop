@extends('admin.dashboard')


@section('title')
{{ config('app.name') }} | Admin Dashboard
@endsection

@section('dashboard')
active
@endsection

@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('admin.dashboard')}}">WebShop</a>
    <span class="breadcrumb-item active">Analytics</span>
</nav>
@endsection

@section('content')

    <div>
        <div class="row">
            <div class="col-12">
                <div id="shopCount"></div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6 ">
                <div id="prudut_count"></div>
            </div>
            <div class="col-6 ">
                <div id="pruduct_sell"></div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script>
           var options = {
          series: [{
          name: 'Inflation',
          data: @json( $shop ),
        }],
          chart: {
          height: 350,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            borderRadius: 10,
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          }
        },
        dataLabels: {
          enabled: true,
          formatter: function (val) {
            return val;
          },
          offsetY: -20,
          style: {
            fontSize: '12px',
            colors: ["#304758"]
          }
        },
        
        xaxis: {
          categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          position: 'top',
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          crosshairs: {
            fill: {
              type: 'gradient',
              gradient: {
                colorFrom: '#D8E3F0',
                colorTo: '#BED1E6',
                stops: [0, 100],
                opacityFrom: 0.4,
                opacityTo: 0.5,
              }
            }
          },
          tooltip: {
            enabled: true,
          }
        },
        yaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: false,
            formatter: function (val) {
              return val;
            }
          }
        
        },
        title: {
          text: 'Count of shop by mounth' + '(' + @json($year) + ')',
          floating: true,
          offsetY: 330,
          align: 'center',
          style: {
            color: '#444'
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#shopCount"), options);
        chart.render();


        //Product Sell Chart (Top 5 Shop)

        var options = {
          series:  @json($produc_count),
          chart: {
          width: 380,
          type: 'pie',
        },
        labels:  @json($shop_name),
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#prudut_count"), options);
        chart.render();



        //product sell chart

        
        var options = {
          series: [{
          name: 'series1',
          data: [31, 40, 28, 51, 42, 109, 100]
        }, {
          name: 'series2',
          data: [11, 32, 45, 32, 34, 52, 41]
        }],
          chart: {
          height: 350,
          type: 'area'
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'datetime',
          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
        };

        var chart = new ApexCharts(document.querySelector("#pruduct_sell"), options);
        chart.render();
      
      
    </script>
@endsection
