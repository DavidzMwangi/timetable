@extends('backend.layouts.master')
@section('style')
    <link href="{{asset('template/plugins/animate-css/animate.css')}}" rel="stylesheet"
          xmlns:v-on="http://www.w3.org/1999/xhtml"/>


    <!-- Animation Css -->

    <!-- JQuery DataTable Css -->
    <link href="{{asset('template/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">


    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    {{--    <link href="{{asset('template/css/themes/all-themes.css')}}" rel="stylesheet" />--}}


@endsection
@section('content')
    <section class="content" id="content_data">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Semesters
                    <small>All Semesters</small>
                </h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                New Semester
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

                                <button type="button" data-toggle="modal" data-target="#newSemesterModal" v-on:click="getacademic" class="btn btn-primary waves-effect m-r-20" >New Semester</button>
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
                                Semesters
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
                                <table id="sem_table" class="table table-bordered table-striped table-hover ">
                                    {{--<table id="users_table" class="table table-bordered table-striped table-hover dataTable js-exportable">--}}
                                    <thead>
                                    <tr>
                                        <th>Semester Type</th>
                                        <th>Weeks</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Academic Year</th>
                                        <th>Actions</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    {{--<tr v-for="(record,key) in records">--}}
                                        {{--<td>@{{ key+1 }}</td>--}}
                                        {{--<td>@{{ record }}</td>--}}
                                        {{--<td>--}}

                                        {{--<a href="#"  v-on:click="deleteRecord(record)">--}}
                                        {{--<i class="material-icons" title="Delete">mode_delete</i>--}}
                                        {{--</a>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}

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

    <div class="modal fade in" id="newSemesterModal" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">New Course</h4>
                </div>
                <form  name="form_id"  method="post" action="{{url('backend/new_semester')}}" id="form_id">
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
                                    <label for="semester_type">Semester Type</label>

                                <select  id="semester_type" class="form-control" name="semester_type" required>
                                    <option disabled selected>Select one type ...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>

                                </select>
                                </p>
                                <p>
                                    <label for="weeks" >Weeks</label>
                                     <input id="weeks" name="weeks" type="number"   placeholder="Number of weeks in the semester" class="form-control" required>
                                </p>


                                <p>
                                    <label for="academic_id">Academic Year</label>
                                    <select id="academic_id" class="form-control" name="academic_year" required>
                                        {{--<option disabled selected value="">Select one of the academic years </option>--}}
                                        {{--<option v-for="(academics,key) in academic_years" :value="key">@{{ key }}</option>--}}
                                    </select>
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


                               <p>
                                <label for="start_date">Start Date</label>
                                    <input type="date" id="start_date" name="start_date" class="form-control" required>

                                </p>

                                <p>
                                    <label for="end_date">End Date</label>
                                    <input type="date" id="end_date" name="end_date" class="form-control" required>

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn">Close</button>
                        <button type="submit" class="btn btn-primary">Create New Semester</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(function () {

            window.table_year= $('#sem_table').DataTable({
                dom: 'lfrtip',
                processing: false,
                serverSide: true,
                autoWidth: false,
                "retrieve":true,//prevents the error that occurs when you create the same datatable twice

                ajax: {
                    url: '{{route("backend.semester_records_for_view")}}',
                    type: 'get',
                    error: function (xhr, err) {
                        if (err === 'parsererror')
                        // location.reload();
                            console.log("hehe");
                    }
                },

                // working
                "columns":[
                    {"data":"semester_type"},
                    {"data":"weeks"},
                    {"data":"start_date"},
                    {"data":"end_date"},
                    {"data":"academic_year_id"},
                    {"data":"actions"},


                ]


            });

        });
    </script>
    <script>
        let apper=new Vue({
            el:'#content_data',
            data:{
                academic_years:[],
                selected:'',


            },
            created:function () {
            },
            methods:{
                getacademic:function () {
                    let me=this;
                    let url1='{{url('backend/academic_for_sem')}}';
                    axios.get(url1)
                        .then(res=>{
                            // me.academic_years=res.data.academic;
                        // console.log(me.academic_years.length)
                            $.each(res.data.academic,function (key,value) {

                                $('#academic_id').append('<option value="'+value.id+'">'+JSON.parse(value.year).start_year +' - '+ JSON.parse(value.year).end_year+'</option>');
                            console.log(value)
                            })
                        });

                },
                {{--saveSem:function(){--}}
                    {{--let me=this;--}}
                
                    {{--let form=document.forms.namedItem('form_id');--}}
                    {{--let formData=new FormData(form);--}}
                
                    {{--let url2='{{url('backend/new_semester')}}';--}}
                    {{--axios.post(url2,formData);--}}
                            {{--then(res=>{--}}
                
                            {{--})--}}
                
                {{--}--}}
            }

        })
    </script>

    <script type="application/javascript">
        {{--$(function () {--}}

            {{--let url20='{{route('backend.semester_records_for_view')}}';--}}
            {{--// axios.get(url20)--}}
            {{--//     .then(res=>{--}}
            {{--//--}}
            {{--//--}}
            {{--//--}}
            {{--//   })--}}
        {{--});--}}
        
        @if($errors->has('data_saved'))
            swal({
            title:"Saved",
            text:"Record successfully saved",
            icon:"success",
            
        });
            
            @endif
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

    {{--<!-- Custom Js -->--}}
    {{--<script src="{{asset('template/js/admin.js')}}"></script>--}}
    <script src="{{asset('template/js/pages/tables/jquery-datatable.js')}}"></script>


    {{--<!-- Custom Js -->--}}
    <script src="{{asset('template/js/admin.js')}}"></script>
    {{--    <script src="{{asset('template/js/pages/forms/advanced-form-elements.js')}}"></script>--}}

    {{--<!-- Demo Js -->--}}
    {{--<script src="{{asset('template/js/demo.js')}}"></script>--}}


@endsection