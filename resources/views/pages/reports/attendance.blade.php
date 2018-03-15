@extends('layouts.default')

@section('title', 'Reports')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li>Reports</li>
                <li><a href="#" class="active">Attendance</a> </li>
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

                                <h4> &nbsp;</h4>
                            </form>
                        </div>

                        <div class="grid-body ">
                            <div class="row"></div>
                            <div class="table-responsive">
                                <table class="table table-striped dataTable" id="report_table" width="100%">
                                    <thead>
                                    <tr>
                                        <th style="width:10%">ID NUMBER</th>
                                        <th style="width:10%">NAME</th>
                                        <th style="width:10%">COMPANY</th>
                                        <th style="width:10%">SITE</th>
                                        <th style="width:10%">INTERVENTION</th>
                                        <th style="width:10%">QUALIFICATION</th>
                                        <th style="width:10%">DATE</th>
                                        <th style="width:10%">CLOCK IN</th>
                                        <th style="width:10%">CLOCK OUT</th>
                                        <th style="width:10%">MAP</th>
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
            $('.datepicker').datepicker({
                format: "yyyy-mm-dd",
                startView: 0,
                autoClose: true,
                todayHighlight: true
            });

            $("#search_form").submit(function(event) {
                event.preventDefault();

                var from_date = $('#FromDate').val();
                var to_date   = $('#ToDate').val();
                var company   = $('#Company').val();
                var site      = $('#Site').val();

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
                            url: "/api/reports/attendance",
                            type: "POST",
                            dataSrc: "",
                            data: {
                                from_date: from_date,
                                to_date: to_date,
                                site: site,
                                company: company
                            }
                        },
                        order: [[ 6, "asc" ]],
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
                                        text: 'Excel',
                                        action: function ( e, dt, node, config ) {
                                            var site     = $("#Site").val();
                                            var company  = $("#Company").val();
                                            var from     = $("#FromDate").val();
                                            var to       = $("#ToDate").val();
                                            var type     = "excel";
                                            var val      = "/api/reports/attendance/export?type=" + type + "&from_date=" +from+ "&to_date=" +to+ "&company=" +company+ "&site="+site;
                                            window.location.href = val;
                                        }
                                    },
                                    {
                                        text: 'PDF',
                                        action: function ( e, dt, node, config ) {
                                            var site     = $("#Site").val();
                                            var company  = $("#Company").val();
                                            var from     = $("#FromDate").val();
                                            var to       = $("#ToDate").val();
                                            var type     = "pdf";
                                            var val      = "/api/reports/attendance/export?type=" + type + "&from_date=" +from+ "&to_date=" +to+ "&company=" +company+ "&site="+site;
                                            window.location.href = val;
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
                            {   //QUALIFICATION
                                data: 'learner.qualification',
                                defaultContent: ''
                            },
                            {   //DATE
                                data: 'record.in.date',
                                defaultContent: ''
                            },
                            {   //CLOCK IN
                                data: null,
                                defaultContent: '',
                                render : function ( data, type, row, meta ) {
                                    return '<span class="label ">'+ data.record.in.time + '</span>';
                                }
                            },
                            {   //CLOCK OUT
                                data: null,
                                defaultContent: '',
                                render : function ( data, type, row, meta ) {
                                    return '<span class="label ">'+ data.record.out.time + '</span>';
                                }
                            },
                            {   //MAP
                                data: null,
                                defaultContent: '',
                                render : function ( data, type, row, meta ) {
                                    return '<a href="/reports/map?rid='+  '' +'" class="btn btn-white btn-block"> <i class="fa fa-map-marker"></i>&nbsp; View</a>';
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
                order: [[ 6, "asc" ]],
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
                                text: 'Excel',
                                action: function ( e, dt, node, config ) {
                                    var site     = $("#Site").val();
                                    var company  = $("#Company").val();
                                    var from     = $("#FromDate").val();
                                    var to       = $("#ToDate").val();
                                    var type     = "excel";
                                    var val      = "/api/reports/attendance/export?type=" + type + "&from_date=" +from+ "&to_date=" +to+ "&company=" +company+ "&site="+site;
                                    window.location.href = val;
                                }
                            },
                            {
                                text: 'PDF',
                                action: function ( e, dt, node, config ) {
                                    var site     = $("#Site").val();
                                    var company  = $("#Company").val();
                                    var from     = $("#FromDate").val();
                                    var to       = $("#ToDate").val();
                                    var type     = "pdf";
                                    var val      = "/api/reports/attendance/export?type=" + type + "&from_date=" +from+ "&to_date=" +to+ "&company=" +company+ "&site="+site;
                                    window.location.href = val;
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