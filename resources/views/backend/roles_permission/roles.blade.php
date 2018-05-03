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

    {{--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.1/b-html5-1.5.1/sc-1.4.4/sl-1.2.5/datatables.min.css"/>--}}

@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                   Role
                    <small>Manage roles</small>
                </h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                             New Role
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
                            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal" onclick="openModalNewRole()">New Role</button>
                          </div>
                    </div>
                </div>
            </div>

            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Roles Table
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
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                    <tr>
                                        <th>Role Name</th>
                                        <th>Description</th>
                                        <th>Permission</th>
                                        <th>Actions</th>

                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($roles as $role)
                                    <tr>
                                        <td>{{$role->display_name}}</td>
                                        <td>{{$role->description}}</td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#roles_permission_modal" onclick="openPermissionRole({{$role->id}})" >
                                                <i class="material-icons" title="Edit">mode_edit</i> <span class="icon-name" ></span>
                                            </a>


                                        </td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#defaultModal" onclick="openEditMode('{{$role->id}}','{{$role->display_name}}','{{$role->description}}')" >
                                                <i class="material-icons" title="Edit">mode_edit</i> <span class="icon-name" ></span>
                                            </a>


                                        </td>

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
        </div>
    </section>

    {{--modal section--}}
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">

        <div class="modal-dialog" role="document">
            <form  action="javascript:;" name="named_form" onsubmit="return saveChanges()">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">New/Edit Modal</h4>
                    <hr >
                </div>
                <div class="modal-body">

                    <div class="row clearfix">

                        <input name="row_id" id="row_id" type="hidden" >
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Display Name</label>
                                <div class="form-line">
                                    <input type="text" class="form-control " name="display_name" id="display_name" placeholder="Enter display name here..." required/>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Description</label>
                                <div class="form-line">
                                    <textarea rows="5" id="description" name="description" class="form-control no-resize " placeholder="Please type the description here" required>{{old('description')}}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect" >SAVE CHANGES</button>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                </div>

            </div>
            </form>
        </div>
    </div>


    {{--assigning roles permission--}}
    <div class="modal fade" id="roles_permission_modal" tabindex="-1" role="dialog">

        <div class="modal-dialog" role="document">
            <form  action="javascript:;" name="named_form" onsubmit="return saveChanges()">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">New/Edit Modal</h4>
                    <hr >
                </div>
                <div class="modal-body">

                    <div class="row clearfix">
                        <div class="table-responsive">
                            <table id="roles_permission_table" class="table table-bordered table-striped table-hover ">
                                {{--<table id="users_table" class="table table-bordered table-striped table-hover dataTable js-exportable">--}}
                                <thead>
                                <tr>
                                    <th>Checkbox</th>
                                    <th>Display Name</th>
                                    <th>Description</th>


                                </tr>
                                </thead>

                                <tbody>


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect" >SAVE CHANGES</button>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                </div>

            </div>
            </form>
        </div>
    </div>

@endsection
@section('script')

    <script type="application/javascript">
        function openModalNewRole() {
            $('#row_id').val(null)

        }

        function saveChanges() {
            let form=document.forms.namedItem('named_form');
            let formData=new FormData(form);
            let url1='{{route('backend.save_role_changes')}}';
            axios.post(url1,formData)
                .then(res=>{

                    // swal("Saved!", "The Permission was successfully added", "success");
                    window.location='{{route('backend.roles')}}'
                })
                .catch(res=>{
                    if (res.response) {
                        if(res.response.status == 422){
                            var combined_error="";
                            var errors=res.response.data.errors;
                            for (var key in errors) {
                                combined_error=combined_error+errors[key]+"\n";
                            }
                            swal("Error!", "Correct the errors below \n"+combined_error, "error");
                        }else{
                            console.log(res)
                        }

                    }else{
                        console.log(res)
                    }
                })

        }

        function openEditMode(role_id,display_name,description) {
            // $('#defaultModal').modal(show);
            $('#row_id').val(role_id);
            $('#display_name').val(display_name);
            $('#description').text(description);

        }
    </script>

    <script type="application/javascript">


        function openPermissionRole(role_id) {

            let url1='{{url('backend/get_roles_permissions')}}'+'/'+role_id;
            // console.log(url1);
            $('#roles_permission_table').DataTable({
                "retrieve":true, //prevents the error when re initialising the datatable
                dom: 'lfrtip',
                processing: false,
                serverSide: true,
                autoWidth: false,
                select: true,
                ajax:{
                    url:url1,
                    type:'get',
                    error:function (xhr,err) {

                    }
                },

                "columns":[
                    {"data":"checkbox"},
                    {"data":"display_name"},
                    {"data":"description"},
                ]

            })
        }
    </script>
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('template/js/pages/forms/advanced-form-elements.js')}}"></script>
    {{--<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.1/b-html5-1.5.1/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>--}}
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