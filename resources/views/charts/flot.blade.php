@extends('backend.layouts.master')
@section('style')
    <!-- Animation Css -->
    <link href="{{asset('template/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">

    {{--<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all the--}}
    <link href="{{asset('template/css/themes/all-themes.css')}}" rel="stylesheet" />

@endsection
@section('content')

    <section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                FLOT CHART
                <small>Taken from <a href="http://www.flotcharts.org" target="_blank">www.flotcharts.org</a></small>
            </h2>
        </div>

        <!-- Real-Time Chart -->
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>REAL-TIME CHART</h2>
                    <div class="pull-right">
                        <div class="switch panel-switch-btn">
                            <span class="m-r-10 font-12">REAL TIME</span>
                            <label>OFF<input type="checkbox" id="realtime" checked><span class="lever switch-col-cyan"></span>ON</label>
                        </div>
                    </div>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div id="real_time_chart" class="flot-chart"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Real-Time Chart -->
    <!-- Multiple Axis -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>MULTIPLE AXIS</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div id="multiple_axis_chart" class="flot-chart"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Multiple Axis -->
    <!-- Tracking -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>TRACKING</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div id="tracking_chart" class="flot-chart"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Tracking -->
    <div class="row clearfix">
        <!-- Pie Chart -->
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>PIE CHART</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div id="pie_chart" class="flot-chart"></div>
                </div>
            </div>
        </div>
        <!-- #END# Pie Chart -->
        <!-- Bar Chart -->
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>BAR CHART</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div id="bar_chart" class="flot-chart"></div>
                </div>
            </div>
        </div>
        <!-- #END# Bar Chart -->
    </div>
    </div>
    </section>

@endsection
@section('script')

    <!-- Flot Chart Plugins Js -->
    <script src="{{asset('template/plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{asset('template/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('template/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('template/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('template/plugins/flot-charts/jquery.flot.time.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('template/js/admin.js')}}"></script>
    <script src="{{asset('template/js/pages/charts/flot.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{asset('template/js/demo.js')}}"></script>
    @endsection