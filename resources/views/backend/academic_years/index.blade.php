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
                    Courses
                    <small>All Courses</small>
                </h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                New Course
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
                            <form action="" id="new_form" v-on:submit.prevent="saveData">

                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class=" col-md-4 ">
                                        <label for="start_year">Start Year</label>
                                        <input type="number" name="start_year" id="start_year" class="form-control" required>
                                    {{--<p>--}}

                                    {{--</p>--}}
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class=" col-md-4 ">
                                        <label for="end_year">End Year</label>
                                        <input type="number" name="end_year" id="end_year" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect m-r-20" >New Academic Year</button>

                            </form>
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
                                All Academic Years
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
                                <table id="years_table" class="table table-bordered table-striped table-hover ">
                                    {{--<table id="users_table" class="table table-bordered table-striped table-hover dataTable js-exportable">--}}
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Academic Year</th>
                                        {{--<th>Actions</th>--}}

                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr v-for="(record,key) in records">
                                        <td>@{{ key+1 }}</td>
                                        <td>@{{ record }}</td>
                                        {{--<td>--}}

                                            {{--<a href="#"  v-on:click="deleteRecord(record)">--}}
                                                {{--<i class="material-icons" title="Delete">mode_delete</i>--}}
                                            {{--</a>--}}
                                        {{--</td>--}}
                                    </tr>

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

    <div class="modal fade in" id="newCourseModal" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">New Course</h4>
                </div>
                <form action="{{route('backend.new_course')}}" method="post">
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
                                    <label for="name">Course Name</label>

                                    <input id="name" name="name" type="text" placeholder="Course Name" value="{{old('name')}}" class="form-control" required>
                                </p>
                                <p>
                                    <label for="short_name" >Short Name</label>
                                    <input id="short_name" name="short_name" type="text"  value="{{old('short_name')}}" placeholder="Course Short Name" class="form-control" required>
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

                                <label for="departments">Department</label>

                                <div class="col-md-12">
                                    <select class=" form-control js-example-basic-single" id="departments" name="department_id">
                                        {{--<option value="AL">Alabama</option>--}}
                                        {{--<option value="WY">Wyoming</option>--}}
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn">Close</button>
                        <button type="submit" class="btn btn-primary">Create New Course</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
<script>
    $(function () {

        window.table_year= $('#years_table').DataTable({
            // "retrieve":true,//prevents the error that occurs when you create the same datatable twice
            // "emptyTable":"verfeferfef",
            "info":false


        })

    });
</script>
    <script>
        let apper=new Vue({
           el:'#content_data',
            data:{
                records:[]

            },
            created:function () {
                this.getTableData()
            },
            methods:{
                saveData:function () {
                    let me=this;
            let formData=new FormData();
            formData.append('start_year',$('#start_year').val());
            formData.append('end_year',$('#end_year').val());
                    let url1='{{url('backend/new_academic_year')}}';
                    axios.post(url1,formData)
                        .then(res=>{
                        me.getTableData();
                            $('#start_year').val(' ');
                            $('#end_year').val(' ')
                        })
                        .catch(redwe=>{

                        });
                },
                getTableData:function () {

                    let url3='{{route('backend.academic_years')}}';
                    let me=this;
                    axios.get(url3)
                        .then(res=>{
                            me.records=res.data.academics
                        })

                },

                deleteRecord:function (record_id) {
                    alert(record_id)
                }
            }

        })
    </script>

    <script type="application/javascript">


        function getAllDepartments() {
            //get allthe departments
            let url2='{{route('backend.department_course')}}';
            axios.get(url2)
                .then(res=>{
                    res.data.departments.forEach(function (value) {
                        $('#departments').append('<option value="'+value.id+'">'+value.name+'</option>')
                    })
                })
        }
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