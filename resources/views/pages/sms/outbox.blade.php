@extends('layouts.default')

@section('title', 'SMS ')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li><p>YOUR ARE HERE:</p></li>
                <li>SMS</li>
                <li><a href="#" class="active">Outbox</a> </li>
            </ul>
            <div class="page-title">
                <i class="material-icons">email</i><h3>SMS</h3>
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
                                        <th style="width:15%">TO</th>
                                        <th style="width:30%">MESSAGE</th>
                                        <th style="width:20%">DATE</th>
                                        <th style="width:15%">STATUS</th>
                                        <th style="width:20%">SENT BY</th>
                                        <!--th style="width:10%">ACTIONS</th-->
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
                ajax: '/api/sms/all',
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
                                title: '{{env('APP_NAME')}} - SMS Messages',
                                exportOptions: {
                                    columns: [0,1,2]
                                }
                            },
                            {
                                extend: 'pdf',
                                text: 'PDF',
                                title: '{{env('APP_NAME')}}  - SMS Messages',
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
                    {
                        //TO
                        data: 'phone_number' ,
                        defaultContent: ''
                    },
                    {
                        //MESSAGE
                        data: 'message' ,
                        defaultContent: ''
                    },
                    {
                        //DATE
                        data: 'created_at' ,
                        defaultContent: ''
                    },
                    {
                        //STATUS
                        data : null,
                        defaultContent: '',
                        'render' : function ( data, type, row, meta ) {
                            var labelClass = (data.status === 'SENT') ? "label-success" : "label-warning";
                            return '<span class="label '+ labelClass +'">' + data.status +'</span>';
                        }
                    },
                    {
                        //SENT BY
                        data: null ,
                        defaultContent: ''
                    }
                ]
            });

            $('div.dataTables_length select').select2({minimumResultsForSearch: -1});
        });
    </script>
@endsection