@extends('admin.layout.app')

@section('content')



<div class="content-page">

    <!-- Start content -->

    <div class="content">

        <div class="container">





            <div class="row">

                <div class="col-xs-12">

                    <div class="page-title-box">

                        <h4 class="page-title">Dashboard</h4>

                        <ol class="breadcrumb p-0 m-0">

                            <li><a href="{{ url('dashboard') }}">Trang chủ</a> </li>

                            <li class="active"> Dashboard</li>

                        </ol>

                        <div class="clearfix"></div>

                    </div>

                </div>

            </div>

            <!-- end row -->



            <div class="row">

                <div class="card-box widget-box-two">

                    <div class="row">

                        <div class="col-md-12 col-xs-12 col-xxs-12">

                            <div id="container"></div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6">

                    <div class="card-box widget-box-two widget-two-info">

                        <i class="fa fa-users widget-two-icon"></i>

                        <div class="wigdet-two-content text-white">

                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Người dùng</p>

                            <h2 class="text-white"><span data-plugin="counterup">{{ $total_user }}</span> <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>

                            <p class="m-0"><b>Hôm nay:</b> {{ $today_user }}</p>

                        </div>

                    </div>

                </div><!-- end col -->



                <div class="col-lg-3 col-md-6">

                    <div class="card-box widget-box-two widget-two-primary">

                        <i class="mdi mdi-layers widget-two-icon"></i>

                        <div class="wigdet-two-content text-white">

                            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Quảng cáo</p>

                            <h2 class="text-white"><span data-plugin="counterup">{{ $total_ads }}</span> <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>

                            <p class="m-0"><b>Hôm nay:</b> {{ $today_ads }}</p>

                        </div>

                    </div>

                </div><!-- end col -->

            </div>

            <!-- end row -->

        </div> <!-- container -->



    </div> <!-- content -->

<script src="https://code.highcharts.com/highcharts.js"></script>

<script src="https://code.highcharts.com/modules/series-label.js"></script>

<script src="https://code.highcharts.com/modules/exporting.js"></script>

    <script>



        // high chart

        Highcharts.chart('container', {

            chart: {

                height: 250,



            },

            title: {

                text: 'Thống kê 12 tháng qua',

                align: 'center'

            },

            legend: {

                layout: 'horizontal',

                align: 'center',

                verticalAlign: 'bottom'

            },



            xAxis: {

                type: 'datetime',

                dateTimeLabelFormats: {

                    month: '%b',

                    year: '%Y'

                }

            },

            exporting: {

                enabled: false

            },

            credits: {

                enabled: false

            },

            series: [{

                data: [{{$ads_view}}],

                name: 'Lượt xem quảng cáo',

                color: '#1B53B7',

                pointStart: Date.UTC({{date("Y,m", strtotime("-12 months"))}}),

                pointIntervalUnit: 'month'

            },

                {

                    data: [{{$profile_view}}],

                    name: 'Số lượt xem hồ sơ (website)',

                    color: '#f9423a',

                    pointStart: Date.UTC({{date("Y,m", strtotime("-12 months"))}}),

                    pointIntervalUnit: 'month'

                },

                {

                    data: [{{$register_stats}}],

                    name: 'Người dùng đã đăng ký',

                    color: '#70d5de',

                    pointStart: Date.UTC({{date("Y,m", strtotime("-12 months"))}}),

                    pointIntervalUnit: 'month'

                },

            ],



            responsive: {

                rules: [{

                    condition: {

                        maxWidth: 1000,

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