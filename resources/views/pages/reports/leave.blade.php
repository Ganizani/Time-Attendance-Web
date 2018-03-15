@extends('layouts.default')

@section('title', 'Reports')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li>Reports</li>
                <li><a href="#" class="active">Leave</a> </li>
            </ul>
            <div class="page-title">
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <form  id="search_form">
                                <div class="col-md-3">
                                    <div class="input-append warning col-lg-10 no-padding">
                                        <input name="FromDate" id="FromDate" type="text" class="form-control datepicker" placeholder="From Date" value="{{isset($_GET['FromDate'])? $_GET['FromDate']: ""}}">
                                        <span class="add-on"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-append warning col-lg-10 no-padding">
                                        <input name="ToDate" id="ToDate" type="text" class="form-control datepicker" placeholder="To Date" value="{{isset($_GET['ToDate'])? $_GET['ToDate']: ""}}">
                                        <span class="add-on"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <select name="Department" id="Department" class="select2 form-control" data-init-plugin="select2">
                                        <option value="" >-- Department --</option>

                                    </select>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-2">
                                    <button class="btn btn-warning btn-block btn-medium" type="submit" ><i class="fa fa-filter"></i> &nbsp;Filter </button>
                                </div>

                                <p> &nbsp;</p>
                            </form>
                        </div>

                        <div class="grid-body ">
                            <div class="row"></div><br>
                            <div class="table-responsive">
                                <table class="table table-striped dataTable" id="report_table" width="100%">
                                    <thead>
                                    <tr>
                                        <th style="width:10%">ID NUMBER</th>
                                        <th style="width:10%">NAME</th>
                                        <th style="width:10%">COMPANY</th>
                                        <th style="width:10%">SITE</th>
                                        <th style="width:10%">INTERVENTION</th>
                                        <th style="width:10%">FROM DATE</th>
                                        <th style="width:10%">TO DATE</th>
                                        <th style="width:10%">REASON</th>
                                        <th style="width:10%">COMMENTS</th>
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

                var from_date = $('#FromDate').val();
                var to_date   = $('#ToDate').val();
                var company   = $('#Company').val();
                var site      = $('#Site').val();
                var reason    = $('#Reason').val();

                if(from_date === ""){
                    toastr.error("<b>Error:</b>  Please Select <b>Start Date</b>");
                }
                else if(to_date === ""){
                    toastr.error("<b>Error:</b> Please Select <b>End Date</b>");
                }
                else {

                    table.destroy();

                    table = $('#report_table').DataTable({
                        ajax: {
                            url: "/api/reports/leave",
                            type: "POST",
                            dataSrc: "",
                            data: {
                                from_date: from_date,
                                to_date: to_date,
                                site: site,
                                company: company,
                                reason: reason
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
                                text: '&nbsp; <i class="fa fa-cloud-download"></i> &nbsp; Download',
                                buttons: [
                                    {
                                        extend: 'excel',
                                        text: 'Excel',
                                        title: '{{env('APP_NAME')}} - Base Report',
                                        exportOptions: {
                                            columns: [0,1,2]
                                        }
                                    },
                                    {
                                        extend: 'pdf',
                                        text: 'PDF',
                                        title: '{{env('APP_NAME')}} - Base Report',
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
                            {   //ID NUMBER
                                data: 'learner.id_number',
                                defaultContent: ''

                            },
                            {   //NAME
                                data: 'learner.name',
                                defaultContent: ''
                            },
                            {
                                //COMPANY
                                data: 'learner.site.company.name',
                                defaultContent: ''
                            },
                            {   //SITE
                                data: 'learner.site.name',
                                defaultContent: ''
                            },
                            {   //INTERVENTION
                                data: 'learner.intervention',
                                defaultContent: ''
                            },
                            {   //FROM DATE
                                data: 'from_date',
                                defaultContent: ''
                            },
                            {   //TO DATE
                                data: 'to_date',
                                defaultContent: ''
                            },
                            {   //REASON
                                data: 'reason.name',
                                defaultContent: ''
                            },
                            {   //COMMENTS
                                data: 'comments',
                                defaultContent: ''
                            },
                            {   //ACTIONS
                                data: null,
                                defaultContent: '',
                                render : function ( data, type, row, meta ) {
                                    return '<a href="/leaves/edit/'+  data.id +'" class="btn btn-info btn-block btn-small"> <i class="fa fa-paste"></i>&nbsp; EDIT</a>';
                                }
                            }
                        ]
                    });

                    $('div.dataTables_length select').select2({minimumResultsForSearch: -1});
                }

            });

            var table =  $('#report_table').DataTable({
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
                                title: '{{env('APP_NAME')}} - Base Report',
                                exportOptions: {
                                    columns: [0,1,2]
                                }
                            },
                            {
                                extend: 'pdf',
                                text: 'PDF',
                                title: '{{env('APP_NAME')}} - Base Report',
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
                    { data: null },
                    { data: null },
                    { data: null },
                    { data: null },
                    { data: null },
                    { data: null },
                    { data: null },
                    { data: null },
                    { data: null },
                    { data: null }
                ]
            });

            $('div.dataTables_length select').select2({minimumResultsForSearch: -1});
        });
    </script>
@endsection