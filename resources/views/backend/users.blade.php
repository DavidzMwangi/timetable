@extends('backend.layouts.master')
@section('style')

    <!-- Animation Css -->
    <link href="{{asset('template/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="{{asset('template/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('template/css/themes/all-themes.css')}}" rel="stylesheet" />
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Users
                    <small>All Users</small>
                </h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                New User
                            </h2>
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
                            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#newUserModal" >New User</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                All Users
                            </h2>
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
                            <div class="table-responsive">
                                <table id="users_table" class="table table-bordered table-striped table-hover ">
                                {{--<table id="users_table" class="table table-bordered table-striped table-hover dataTable js-exportable">--}}
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th>Created At</th>

                                    </tr>
                                    </thead>

                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <div class="modal fade in" id="newUserModal" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">New User</h4>
                </div>
                <form action="{{url('backend/new_user')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="alert-danger">
                                @if(count($errors)>0)
                                    {{--@foreach($errors as $error)--}}
                                    {{--{{$error}}--}}

                                    {{--@endforeach--}}
                                    {{$errors->first()}}

                                @endif
                            </div>
                            <div class="col-md-6">

                                {{--<h4>Some More data</h4>--}}
                                <p>
                                    <label for="name">User Name</label>

                                    <input id="name" name="name" type="text" placeholder="Your name" value="{{old('name')}}" class="form-control" required>
                                </p>
                                <p>
                                    <label for="reg_no" >Email</label>
                                    <input id="reg_no" name="reg_no" type="text"  value="{{old('reg_no')}}" placeholder="Class Rep RegNo" class="form-control" required>
                                </p>
                                {{--<p>--}}
                                    {{--<label for="user_level">User Level</label>--}}
                                    {{--<select class="form-control" name="user_level" id="user_level" required>--}}
                                        {{--<option value="admin" >Administrator</option>--}}
                                        {{--<option value="accountant">Accountant</option>--}}
                                    {{--</select>--}}
                                {{--</p>--}}
                                {{--<p>--}}
                                {{--<input id="name2" name="name" type="text" placeholder="Your name" class="form-control">--}}
                                {{--</p>--}}
                                {{--<p>--}}
                                {{--<input id="name3" name="name" type="text" placeholder="Your name" class="form-control">--}}
                                {{--</p>--}}
                                {{--<p>--}}
                                {{--<input id="name4" name="name" type="text" placeholder="Your name" class="form-control">--}}
                                {{--</p>--}}
                                {{--<p>--}}
                                {{--<input id="name5" name="name" type="text" placeholder="Your name" class="form-control">--}}
                                {{--</p>--}}
                            </div>
                            <div class="col-md-6">
                                {{--<h4>Some More data</h4>--}}
                                <p>
                                    <label for="password">Password</label>
                                    <input id="password" name="password" type="password" placeholder="Your Password" class="form-control" required>
                                </p>
                                <p>
                                    <label for="password-confirm">Password Confirmation</label>
                                    <input id="password-confirm" name="password_confirmation" type="password" placeholder="Confirm Password" class="form-control" required>
                                </p>
                                {{--<p>--}}
                                {{--<input id="name8" name="name" type="text" placeholder="Your name" class="form-control">--}}
                                {{--</p>--}}
                                {{--<p>--}}
                                {{--<input id="name9" name="name" type="text" placeholder="Your name" class="form-control">--}}
                                {{--</p>--}}
                                {{--<p>--}}
                                {{--<input id="name10" name="name" type="text" placeholder="Your name" class="form-control">--}}
                                {{--</p>--}}
                                {{--<p>--}}
                                {{--<input id="name41" name="name" type="text" placeholder="Your name" class="form-control">--}}
                                {{--</p>--}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn">Close</button>
                        <button type="submit" class="btn btn-primary">Create New User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <script type="application/javascript">
        $(function () {

    $('#users_table').DataTable({
                dom: 'lfrtip',
                processing: false,
                serverSide: true,
                autoWidth: false,
                // "retrieve":true,//prevents the error that occurs when you create the same datatable twice

            ajax: {
                url: '{{route("backend.all_users")}}',
                    type: 'get',
                    error: function (xhr, err) {
                    if (err === 'parsererror')
                    // location.reload();
                        console.log("hehe");
                }
            },

        // working
        "columns":[
            {"data":"id"},
            {"data":"name"},
            {"data":"email"},
            {"data":"user_type"},
            {"data":"created_at"},
            // {"data":"remote_logs"},
            // {"data":"kyc_name"},
            // {"data":"msisdn"},
            // {"data":"org_account_bal"},
            // {"data":"created_at"}
        ]

    })

        })
    </script>
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('template/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('template/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{asset('template/js/admin.js')}}"></script>
    <script src="{{asset('template/js/pages/tables/jquery-datatable.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{asset('template/js/demo.js')}}"></script>
@endsection