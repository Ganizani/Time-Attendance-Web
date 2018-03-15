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
                            <h4> &nbsp; <span class="semi-bold"></span></h4>
                        </div>
                        <div class="grid-body ">
                            <div class="table-responsive">
                                <table class="table table-striped dataTable" id="_table" width="100%">
                                    <thead>
                                    <tr>
                                        <th style="width:14%">IMEI NUMBER</th>
                                        <th style="width:10%">SERIAL NUMBER</th>
                                        <th style="width:10%">NAME</th>
                                        <th style="width:10%">PHONE NUMBER</th>
                                        <th style="width:10%">SUPERVISOR</th>
                                        <th style="width:10%">SITE</th>
                                        <th style="width:10%">STATUS</th>
                                        <th style="width:15%">LAST SYNC</th>
                                        <th style="width:10%">ACTIONS</th>
                                        <th style="width:1%">STATUS</th>
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
            var table =  $('#_table').DataTable({
                language : {
                    sLengthMenu: "_MENU_",
                    search:         "",
                    searchPlaceholder: "Search ..."
                },
                dom: "<'row'<'col-sm-1'l><'col-sm-1 text-center'B><'col-sm-10'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                pageLength:  25,
                buttons: [
                    {
                        extend: 'collection',
                        text: '&nbsp; <i class="fa fa-cloud-download"></i> &nbsp; Download',
                        buttons: [
                            {
                                extend: 'excel',
                                text: 'Excel',
                                title: '{{env('APP_NAME')}} - Devices List',
                                exportOptions: {
                                    columns: [0,1,2]
                                }
                            },
                            {
                                extend: 'pdf',
                                text: 'PDF',
                                title: '{{env('APP_NAME')}}  - Devices List',
                                orientation: 'landscape',
                                pageSize: 'LEGAL',
                                exportOptions: {
                                    columns: [0,1,2]
                                }
                            }
                        ]
                    }
                ],
                columns: [
                    {   //IMEI NUMBER
                        data: 'imei_number',
                        defaultContent: ''
                    },
                    {   //SERIAL NUMBER
                        data: 'serial_number',
                        defaultContent: ''
                    },
                    {   //DEVICE NAME
                        data: 'device_name',
                        defaultContent: 'N/a'
                    },
                    {   //PHONE NUMBER
                        data: 'phone_number',
                        defaultContent: ''
                    },
                    {   //SUPERVISOR
                        data: 'supervisor',
                        defaultContent: 'N/a'
                    },
                    {   //SITE
                        data: 'site.name',
                        defaultContent: 'N/a'
                    },
                    {   //STATUS
                        data: null,
                        defaultContent: '<span class="label label-info"> N/a </span>',
                        'render' : function ( data, type, row, meta ) {
                            var labelClass = (data.status === 'ACTIVE') ? "label-success" : "label-important";
                            return '<span class="label '+ labelClass +'">' + data.status +'</span>';
                        }
                    },
                    {   //LAST SYNC
                        data: 'last_sync',
                        defaultContent: 'N/a'
                    },
                    {
                        //ACTIONS
                        data: null,
                        defaultContent: '',
                        'render' : function ( data, type, row, meta ) {
                            return '<a href = "/devices/edit/'+ data.id +'" class="btn btn-info btn-cons btn-block btn-small" ><i class="fa fa-paste"></i> &nbsp; EDIT </a>';
                        }
                    },
                    {   //
                        data: 'status',
                        defaultContent: 'N/a',
                        visible: false
                    }
                ],
                filterDropDown: {
                    bootstrap: true,
                    label: "Filters | ",
                    columns: [
                        {idx: 5},
                        {idx: 9}
                    ]
                }
            });

            $('div.dataTables_length select').select2({minimumResultsForSearch: -1});
            $('#_table_filterSelect5').select2({
                minimumResultsForSearch: -1,
                width: '400px'
            });
            $('#_table_filterSelect9').select2({
                minimumResultsForSearch: -1,
                width: '400px'
            });
        });
    </script>
@endsection