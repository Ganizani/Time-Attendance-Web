@extends('layouts.default')

@section('title', 'Devices')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li>Devices</li>
                <li><a href="#" class="active">List</a> </li>
            </ul>
            <div class="page-title">
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <form  id="search_form">
                                <div class="col-md-4 col-md-offset-3">
                                    <select name="Department" id="Department" class="select2 form-control" data-init-plugin="select2">
                                        <option value="" >-- Department --</option>
                                        @if(isset($departments) && count($departments) > 0)
                                            @foreach($departments as $department)
                                                <option value="{{$department['id']}}" >{{$department['name']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-warning btn-block btn-medium" type="submit" ><i class="fa fa-filter"></i> &nbsp;Filter </button>
                                </div>

                                <h4> &nbsp;</h4>
                            </form>
                        </div>
                        <div class="grid-body ">
                            <div class="table-responsive">
                                <table class="table table-striped dataTable" id="_table" width="100%">
                                    <thead>
                                    <tr>
                                        <th style="width:10%">NAME</th>
                                        <th style="width:14%">IMEI NUMBER</th>
                                        <th style="width:10%">SERIAL NUMBER</th>
                                        <th style="width:10%">PHONE NUMBER</th>
                                        <th style="width:10%">SUPERVISOR</th>
                                        <th style="width:10%">DEPARTMENT</th>
                                        <th style="width:10%">STATUS</th>
                                        <th style="width:15%">LAST SYNC</th>
                                        <th style="width:10%">ACTIONS</th>
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
        </div>
    </div>
    <!-- END PAGE CONTAINER-->
@endsection
@section('footer')
    @parent

    <script>
        $(document).ready(function() {

            $("#search_form").submit(function(event) {
                event.preventDefault();

                var department = $('#Department').val();

                    table.destroy();
                    table = $('#_table').DataTable({
                        ajax: {
                            url: "/api/devices",
                            type: "GET",
                            dataSrc: "",
                            data: {
                                department: department
                            }
                        },
                        language: {
                            sLengthMenu: "_MENU_",
                            search: "",
                            searchPlaceholder: "Search ..."
                        },
                        dom: "<'row'<'col-sm-1'l><'col-sm-1 text-center'B><'col-sm-10'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                        pageLength: 25,
                        buttons: [
                            {
                                extend: 'collection',
                                className: 'btn',
                                text: '&nbsp; <i class="fa fa-cloud-download"></i> &nbsp; Download',
                                buttons: [
                                    {
                                        text: '<i class="fa fa-file-excel-o"></i> &nbsp; Excel',
                                        className: 'btn'
                                    },
                                    {
                                        text: '<i class="fa fa-file-pdf-o"></i> &nbsp; PDF',
                                        className: 'btn'
                                    }
                                ]
                            }
                        ],
                        columns: [
                            {   //NAME
                                data: 'name',
                                defaultContent: ''
                            },
                            {   //IMEI NUMBER
                                data: 'imei_number',
                                defaultContent: ''
                            },
                            {   //SERIAL NUMBER
                                data: 'serial_number',
                                defaultContent: ''
                            },
                            {   //PHONE NUMBER
                                data: 'phone_number',
                                defaultContent: ''
                            },
                            {   //SUPERVISOR
                                data: 'supervisor.name',
                                defaultContent: ''
                            },
                            {   //DEPARTMENT
                                data: 'department.name',
                                defaultContent: ''
                            },
                            {   //STATUS
                                data: null,
                                defaultContent: '',
                                render : function ( data, type, row, meta ) {
                                    return '<span class="label label-success"> Active</span>';
                                }
                            },
                            {   //LAST SYNC
                                data: 'last_sync',
                                defaultContent: 'N/a'
                            },
                            {   //ACTIONS
                                data: null,
                                defaultContent: '',
                                render : function ( data, type, row, meta ) {
                                    return '<a href = "/devices/edit/'+ data.id +'" class="btn btn-info btn-cons btn-block btn-small" ><i class="fa fa-paste"></i> &nbsp; Edit </a>';
                                }
                            }
                        ]
                    });

                    $('div.dataTables_length select').select2({minimumResultsForSearch: -1});


            });

            var table =  $('#_table').DataTable({
                language : {
                    sLengthMenu: "_MENU_",
                    search:         "",
                    searchPlaceholder: "Search ..."
                },
                dom: "<'row'<'col-sm-1'l><'col-sm-3 text-center'B><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                pageLength:  25,
                buttons: [
                    {
                        extend: 'collection',
                        className: 'btn',
                        text: '&nbsp; <i class="fa fa-cloud-download"></i> &nbsp; Download',
                        buttons: [
                            {
                                text: '<i class="fa fa-file-excel-o"></i> &nbsp; Excel',
                                className: 'btn'
                            },
                            {
                                text: '<i class="fa fa-file-pdf-o"></i> &nbsp; PDF',
                                className: 'btn'
                            }
                        ]
                    }
                ]
            });

            $('div.dataTables_length select').select2({minimumResultsForSearch: -1});
        });
    </script>
@endsection