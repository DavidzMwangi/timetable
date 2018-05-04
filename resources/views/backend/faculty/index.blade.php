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
                    Faculties
                    <small>All Faculties</small>
                </h2>
                <button class="btn btn-primary pull-right" onclick="viewNewDiv()">New Faculty</button>

                <hr>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                        @if(count($errors->all())>0)
                        <div class="alert-danger">

                            @foreach($errors->all() as $error)

                                <li>{{$error}}</li>
                                @endforeach
                        </div>

                    @endif
                    <form class="card" style="display: none" id="new_faculty_card" method="post" action="{{route('backend.new_faculty')}}">
                        {{csrf_field()}}
                        <div class="header">
                            <h2>
                                New Faculty
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

                            <div class="col-md-6">

                                {{--<h4>Some More data</h4>--}}
                                <p>
                                    <label for="name">Faculty Name</label>

                                    <input id="name" name="name" type="text" placeholder="Faculty name" value="{{old('name')}}" class="form-control" required>
                                </p>
                                <p>
                                    <label for="short_name" >Short Name</label>
                                    <input id="short_name" name="short_name" type="text"  value="{{old('short_name')}}" placeholder="Short Name" class="form-control" required>
                                </p>

                            </div>
                            <div class="col-md-6">
                                <p>
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" type="text" placeholder="Faculty Description" class="form-control" required>
                                        {{old("description")}}
                                    </textarea>
                                </p>

                            </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button type="reset"  class="btn btn-danger pull-left">Reset</button>
                                    <button type="submit" class="btn btn-primary pull-right">Create New Faculty</button>

                                </div>
                                </div>
                        </div>



                    </form>
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
                                        <th>#</th>
                                        <th>Faculty Name</th>
                                        <th>Short Name</th>
                                        <th>Short Description</th>
                                        <th>Created At</th>
        
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($faculties as $key=>$faculty)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$faculty->name}}</td>
                                            <td>{{$faculty->short_name}}</td>
                                            <td>{{$faculty->description}}</td>
                                            <td>{{$faculty->created_at->toDayDateTimeString()}}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
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

        function viewNewDiv() {
            $('#new_faculty_card').toggle(1000,function () {
                
            })
        }
        $(function () {

            $('#users_table').DataTable({


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