@extends('layouts.default')

@section('title', 'Reports')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li>Reports</li>
                <li><a href="#" class="active">Absentee</a> </li>
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
                                        @if(isset($departments) && count($departments) > 0)
                                            @foreach($departments as $department)
                                                <option value="{{$department['id']}}" >{{$department['name']}}</option>
                                            @endforeach
                                        @endif
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
                                        <th style="width:10%">DATE</th>
                                        <th style="width:10%">WEEEKDAY</th>
                                        <th style="width:10%">EMPLOYEE CODE</th>
                                        <th style="width:10%">NAME</th>
                                        <th style="width:10%">DEPARTMENT</th>
                                        <th style="width:10%">REASON</th>
                                        <th style="width:10%">LEAVE DAYS</th>
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

                var from_date  = $('#FromDate').val();
                var to_date    = $('#ToDate').val();
                var department = $('#Department').val();

                if(from_date === "")toastr.error("<b>Error:</b>  Please Select <b>Start Date</b>");
                else if(to_date === "") toastr.error("<b>Error:</b> Please Select <b>End Date</b>");
                else {

                    table.destroy();
                    table = $('#report_table').DataTable({
                        ajax: {
                            url: "/api/reports/absentee",
                            type: "GET",
                            dataSrc: "",
                            data: {
                                from_date: from_date,
                                to_date: to_date,
                                department: department
                            }
                        },
                        language: {
                            sLengthMenu: "_MENU_",
                            search: "",
                            searchPlaceholder: "Search ..."
                        },
                        @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_reports']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_reports'] == 1)
                        dom: "<'row'<'col-sm-1'l><'col-sm-1 text-center'B><'col-sm-10'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                        @else
                        dom: "<'row'<'col-sm-1'l><'col-sm-11'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                        @endif
                        pageLength: 25,
                        @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_reports']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_reports'] == 1)
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
                        @endif
                        columns: [
                            {   //DATE
                                data: 'date',
                                defaultContent: 'N/a'
                            },
                            {   //WEEKDAY
                                data: 'weekday',
                                defaultContent: 'N/a'
                            },
                            {   //EMPLOYEE CODE
                                data: 'user.employee_code',
                                defaultContent: 'N/a'
                            },
                            {   //NAME
                                data: 'user.name',
                                defaultContent: 'N/a'
                            },
                            {   //DEPARTMENT
                                data: 'user.department.name',
                                defaultContent: 'N/a'
                            },
                            {   //REASON
                                data: 'reason',
                                defaultContent: ''
                            },
                            {   //LEAVE DAYS
                                data: null,
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
                @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_reports']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_reports'] == 1)
                dom: "<'row'<'col-sm-1'l><'col-sm-1 text-center'B><'col-sm-10'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                @else
                dom: "<'row'<'col-sm-1'l><'col-sm-11'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                @endif
                pageLength:  25,
                @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_reports']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_reports'] == 1)
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
                @endif
            });

            $('div.dataTables_length select').select2({minimumResultsForSearch: -1});
        });
    </script>
@endsection