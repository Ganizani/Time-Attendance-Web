@extends('layouts.default')

@section('title', 'Reports')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li><p>YOUR ARE HERE:</p></li>
                <li>Reports</li>
                <li><a href="#" class="active">Registration</a> </li>
            </ul>
            <div class="page-title">
                <i class="material-icons">assignment</i><h3>Registration Report</h3>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <form  id="search_form">
                                <div class="col-md-1"></div>
                                <div class="col-md-2">
                                    <div class="input-append info col-lg-10 no-padding">
                                        <input name="FromDate" id="FromDate" type="text" class="form-control datepicker" placeholder="From Date" value="{{isset($_GET['FromDate'])? $_GET['FromDate']: ""}}">
                                        <span class="add-on"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-append info col-lg-10 no-padding">
                                        <input name="ToDate" id="ToDate" type="text" class="form-control datepicker" placeholder="To Date" value="{{isset($_GET['ToDate'])? $_GET['ToDate']: ""}}">
                                        <span class="add-on"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <select name="Company" id="Company" class="select2 form-control" data-init-plugin="select2">
                                        <option value="" >-- Company --</option>
                                        @foreach ($companies as $company)
                                            <option value="{{$company['id']}}">{{$company['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="Site" id="Site" class="select2 form-control" data-init-plugin="select2">
                                        <option value="" >-- Site --</option>
                                        @foreach ($sites as $site)
                                            <option value="{{$site['id']}}">{{$site['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary btn-block " type="submit" ><i class="fa fa-filter"></i> &nbsp;Filter </button>
                                </div>
                                <div class="col-md-1"></div>

                                <h4> &nbsp;</h4>
                            </form>
                        </div>

                        <div class="grid-body ">
                            <div class="clearfix"></div><br>
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
                                        <th style="width:10%">UPLOAD DATE</th>
                                        <th style="width:10%">START DATE</th>
                                        <th style="width:10%">END DATE</th>
                                        <th style="width:10%">CREATED BY</th>
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
                            url: "/api/reports/registration",
                            type: "POST",
                            dataSrc: "",
                            data: {
                                from_date: from_date,
                                to_date: to_date,
                                site: site,
                                company: company
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
                                        text: 'Excel',
                                        action: function ( e, dt, node, config ) {
                                            var site     = $("#Site").val();
                                            var company  = $("#Company").val();
                                            var from     = $("#FromDate").val();
                                            var to       = $("#ToDate").val();
                                            var type     = "excel";
                                            var val      = "/api/reports/registration/export?type=" + type + "&from_date=" +from+ "&to_date=" +to+ "&company=" +company+ "&site="+site;
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
                                            var val      = "/api/reports/registration/export?type=" + type + "&from_date=" +from+ "&to_date=" +to+ "&company=" +company+ "&site="+site;
                                            window.location.href = val;
                                        }
                                    }
                                ]
                            }
                        ],
                        columns: [
                            {   //ID NUMBER
                                data: 'id_number',
                                defaultContent: ''

                            },
                            {   //NAME
                                data: 'name',
                                defaultContent: ''
                            },
                            {
                                //COMPANY
                                data: 'site.company.name',
                                defaultContent: ''
                            },
                            {   //SITE
                                data: 'site.name',
                                defaultContent: ''
                            },
                            {   //INTERVENTION
                                data: 'intervention',
                                defaultContent: ''
                            },
                            {   //QUALIFICATION
                                data: 'qualification',
                                defaultContent: ''
                            },
                            {   //UPLOAD DATE
                                data: 'upload_date',
                                defaultContent: ''
                            },
                            {   //START DATE
                                data: 'start_date',
                                defaultContent: ''
                            },
                            {   //END DATE
                                data: 'end_date',
                                defaultContent: ''
                            },
                            {   //CREATED BY
                                data: 'created_by.name',
                                defaultContent: ''
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
                                text: 'Excel',
                                action: function ( e, dt, node, config ) {
                                    var site     = $("#Site").val();
                                    var company  = $("#Company").val();
                                    var from     = $("#FromDate").val();
                                    var to       = $("#ToDate").val();
                                    var type     = "excel";
                                    var val      = "/api/reports/registration/export?type=" + type + "&from_date=" +from+ "&to_date=" +to+ "&company=" +company+ "&site="+site;
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
                                    var val      = "/api/reports/registration/export?type=" + type + "&from_date=" +from+ "&to_date=" +to+ "&company=" +company+ "&site="+site;
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
                    { data: null },
                ]
            });

            $('div.dataTables_length select').select2({minimumResultsForSearch: -1});
        });
    </script>
@endsection