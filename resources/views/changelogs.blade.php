@extends('layouts.main')
@section('style')
    <!-- Animation Css -->
    <link href="{{asset('template/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('template/css/themes/all-themes.css')}}" rel="stylesheet" />
    @endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Changelogs -->
            <div class="block-header">
                <h2>CHANGELOGS</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                v1.0.5
                                <small>27th June 2017</small>
                            </h2>
                        </div>
                        <div class="body">
                            <p>- Fixed bugs</p>
                            <p>- Button with icon & text added</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                v1.0.4
                                <small>15th November 2016</small>
                            </h2>
                        </div>
                        <div class="body">
                            <p>- Fix Preloader IE10+ & Edge display error</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                v1.0.3
                                <small>19th August 2016</small>
                            </h2>
                        </div>
                        <div class="body">
                            <p>- Documentation has been improved</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                v1.0.2
                                <small>18th August 2016</small>
                            </h2>
                        </div>
                        <div class="body">
                            <p>- Fixed IE 10</p>
                            <p>- Documentation has been published</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                v1.0.1
                                <small>17th August 2016</small>
                            </h2>
                        </div>
                        <div class="body">
                            <p>- Fixed IE 10&11 support issues</p>
                            <p>- Add browser support class to html (You can write run only specified browsers)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>v1.0.0</h2>
                        </div>
                        <div class="body">
                            Version 1.0.0 released on 16th August 2016.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
    <!-- Custom Js -->
    <script src="{{asset('template/js/admin.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{asset('template/js/demo.js')}}"></script>
    @endsection