@extends('shop_owner.dashboard')


@section('title')
{{ config('app.name') }} | Shop Woner Dashboard
@endsection

@section('dashboard')
active
@endsection

@section('breadcrumb')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('shop_owner.dashboard') }}">Dashboard</a>
</nav>
@endsection

@section('content')

<div>
    <div class="row">
        <div class="col-6 m-auto">

            <div class="form-group">
                <label for="">Your API Key</label>
            <input type="text" class="form-control" value="{{ $shop->token }}">
            <a href="{{ route('generate.api', $shop->id) }}" class="btn btn-primary btn-sm mt-1">Regenerate key</a>
            </div>
            
        </div>
        <div class="col-12">
            <div id="shopCount"></div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-6 col-md-6 col-sm-12 m-auto ">
            <div id="category_count"></div>
        </div>
    <div class="col-lg-6 col-md-12 col-sm-12 ">
            <table class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>API Call</th>
                        <th>Redirection</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <a target="_blank" href="{{ URL::to('/') }}/shop-api/api={Your_token_here}">{{ URL::to('/') }}/shop-api/api={Your_token_here}</a>
                        </td>
                        <td>Redirects to your shop details</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <a target="_blank" href="{{ URL::to('/') }}/shop-api/products/api={Your_token_here}">{{ URL::to('/') }}/shop-api/products/api={Your_token_here}</a>
                        </td>
                        <td>Redirects to your product lists</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <a target="_blank" href="{{ URL::to('/') }}/shop-api/product/{Your_product_id}/api={Your_token_here}">{{ URL::to('/') }}/shop-api/product/{Your_product_id}/api={Your_token_here}</a>
                        </td>
                        <td>Redirects to your product details</td>
                    </tr>
                </tbody>
        </div> 
    </div>
</div>
  
<div id="api">

</div>

@endsection


@section('js')




<script>
    var options = {
        series: [{
            name: 'Products',
            data: @json($product),
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
            text: 'Count total by month',
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
        series: @json($produt_by_category),
        chart: {
            width: 380,
            type: 'pie',
        },
        labels: @json($category_product),
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

    var chart = new ApexCharts(document.querySelector("#category_count"), options);
    chart.render();



    //product sell chart


    var options = {
          series: [{
          data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan',
            'United States', 'China', 'Germany'
          ],
        }
        };

        var chart = new ApexCharts(document.querySelector("#extras_chart"), options);
        chart.render();
</script>

@endsection