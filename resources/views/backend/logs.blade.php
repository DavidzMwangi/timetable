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
    <style>
        body {
            padding: 25px;
        }

        h1 {
            /*font-size: 1.5em;*/
            margin-top: 0;
        }

        #table-log {
            /*font-size: 0.85rem;*/
        }

        .sidebar {
            /*font-size: 0.85rem;*/
            line-height: 1;
        }

        .btn {
            /*font-size: 0.7rem;*/
        }


        .stack {
            /*font-size: 0.85em;*/
        }

        .date {
            min-width: 75px;
        }

        .text {
            word-break: break-all;
        }

        a.llv-active {
            z-index: 2;
            background-color: #f5f5f5;
            border-color: #777;
        }

        .list-group-item {
            word-wrap: break-word;
        }
    </style>
    @endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                {{--<div class="col sidebar mb-3">--}}
                    {{--<h1><i class="fa fa-calendar" aria-hidden="true"></i> Laravel Log Viewer</h1>--}}
                    {{--<p class="text-muted"><i>by Rap2h</i></p>--}}
                    {{--<div class="list-group">--}}
                        {{--@foreach($files as $file)--}}
                            {{--<a href="?l={{ \Illuminate\Support\Facades\Crypt::encrypt($file) }}"--}}
                               {{--class="list-group-item @if ($current_file == $file) llv-active @endif">--}}
                                {{--{{$file}}--}}
                            {{--</a>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="col-10 table-container">
                    @if ($logs === null)
                        <div>
                            Log file >50M, please download it.
                        </div>
                    @else
                        <table id="table-log" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Level</th>
                                <th>Context</th>
                                <th>Date</th>
                                <th>Content</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($logs as $key => $log)
                                <tr data-display="stack{{{$key}}}">
                                    <td class="text-{{{$log['level_class']}}}"><span class="fa fa-{{{$log['level_img']}}}"
                                                                                     aria-hidden="true"></span> &nbsp;{{$log['level']}}</td>
                                    <td class="text">{{$log['context']}}</td>
                                    <td class="date">{{{$log['date']}}}</td>
                                    <td class="text">
                                        @if ($log['stack']) <button type="button" class="float-right expand btn btn-outline-dark btn-sm mb-2 ml-2"
                                                                    data-display="stack{{{$key}}}"><span
                                                    class="fa fa-search"></span></button>@endif
                                        {{{$log['text']}}}
                                        @if (isset($log['in_file'])) <br/>{{{$log['in_file']}}}@endif
                                        @if ($log['stack'])
                                            <div class="stack" id="stack{{{$key}}}"
                                                 style="display: none; white-space: pre-wrap;">{{{ trim($log['stack']) }}}
                                            </div>@endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    @endif
                    <div class="p-3">
                        @if($current_file)
                            <a href="?dl={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}"><span class="fa fa-download"></span>
                                Download file</a>
                            -
                            <a id="delete-log" href="?del={{ \Illuminate\Support\Facades\Crypt::encrypt($current_file) }}"><span
                                        class="fa fa-trash"></span> Delete file</a>
                            @if(count($files) > 1)
                                -
                                <a  class="btn" id="delete-all-log" href="?delall=true"><span class="fa fa-trash"></span> Delete all files</a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>


    </section>
    @endsection

@section('script')

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
    {{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}
    <!-- FontAwesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    {{--<!-- Datatables -->--}}
    {{--<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>--}}
    {{--<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>--}}
    <script>
        $(document).ready(function () {
            $('.table-container tr').on('click', function () {
                $('#' + $(this).data('display')).toggle();
            });
            $('#table-log').DataTable({
                "order": [1, 'desc'],
                "stateSave": true,
                "stateSaveCallback": function (settings, data) {
                    window.localStorage.setItem("datatable", JSON.stringify(data));
                },
                "stateLoadCallback": function (settings) {
                    var data = JSON.parse(window.localStorage.getItem("datatable"));
                    if (data) data.start = 0;
                    return data;
                }
            });
            $('#delete-log, #delete-all-log').click(function () {
                return confirm('Are you sure?');
            });
        });
    </script>
    @endsection
