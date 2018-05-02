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
                                <div class="col-md-2">
                                    <div class="input-append warning col-lg-10 no-padding">
                                        <input name="FromDate" id="FromDate" type="text" class="form-control datepicker" placeholder="From Date" value="{{isset($_GET['FromDate'])? $_GET['FromDate']: ""}}">
                                        <span class="add-on"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-2">
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
                                <div class="col-md-3">
                                    <select name="LeaveType" id="LeaveType" class="select2 form-control" data-init-plugin="select2">
                                        <option value="" >-- Leave Type --</option>
                                        @if(isset($leave_types) && count($leave_types) > 0)
                                            @foreach($leave_types as $leave_type)
                                                <option value="{{$leave_type['id']}}" >{{$leave_type['name']}}</option>
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
                            <div class="row"></div><br>
                            <div class="table-responsive">
                                <table class="table table-striped dataTable" id="report_table" width="100%">
                                    <thead>
                                    <tr>
                                        <th style="width:10%">EMPLOYEE CODE</th>
                                        <th style="width:10%">NAME</th>
                                        <th style="width:10%">DEPARTMENT</th>
                                        <th style="width:10%">LEAVE TYPE</th>
                                        <th style="width:10%">FROM DATE</th>
                                        <th style="width:10%">TO DATE</th>
                                        <th style="width:10%">LEAVE DAYS</th>
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

    <!-- BEGIN VIEW ATTACHMENT MODAL -->
    <div class="modal fade" id="ViewAttachmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 id="leave_name" class="semi-bold">Attachment</h4>
                </div>
                <div class="modal-body">
                    <iframe id="file_source" name="file_source" src="" style="width:100%; height:550px;">
                        <p>Your browser does not support iframes.</p>
                    </iframe>
                </div>
                <div class="modal-footer">
                    <div class="pull-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- END VIEW ATTACHMENT MODAL -->
@endsection
@section('footer')
    @parent

    <script>
        $(document).ready(function() {

            $('#ViewAttachmentModal').on('show.bs.modal', function (event) {
                var button     = $(event.relatedTarget); // Button that triggered the modal
                var source     = button.data('src');     // Extract info from data-* attributes
                var leave_name = button.data('leave');   // Extract info from data-* attributes

                $('#file_source').attr('src', source);
                $('#leave_name').html(leave_name + " Attachment");
            });

            $("#search_form").submit(function(event) {
                event.preventDefault();

                var from_date  = $('#FromDate').val();
                var to_date    = $('#ToDate').val();
                var department = $('#Department').val();
                var leave_type = $('#LeaveType').val();

                if(from_date === "") toastr.error("<b>Error:</b>  Please Select <b>Start Date</b>");
                else if(to_date === "")toastr.error("<b>Error:</b> Please Select <b>End Date</b>");
                else {
                    table.destroy();
                    table = $('#report_table').DataTable({
                        ajax: {
                            url: "/api/reports/leave",
                            type: "GET",
                            dataSrc: "",
                            data: {
                                from_date: from_date,
                                to_date: to_date,
                                department: department,
                                leave_type: leave_type
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
                            {   //LEAVE TYPE
                                data: null,
                                defaultContent: 'N/a',
                                render : function ( data, type, row, meta ) {
                                    var leave_type = data.leave_type.name;
                                    if(data.leave_type.id === '6' || data.leave_type.name === 'Other'){
                                        leave_type = data.leave_type_text;
                                    }
                                    return leave_type ;
                                }
                            },
                            {   //FROM DATE
                                data: 'from_date',
                                defaultContent: 'N/a'
                            },
                            {   //TO DATE
                                data: 'to_date',
                                defaultContent: 'N/a'
                            },
                            {   //LEAVE DAYS
                                data: 'leave_days',
                                defaultContent: 'N/a'
                            },
                            {   //COMMENTS
                                data: 'comments',
                                defaultContent: 'N/a'
                            },
                            {   //ACTION
                                data: null,
                                defaultContent: '',
                                render : function ( data, type, row, meta ) {
                                    var attachment = "";
                                    if(data.attachment !== null){
                                        attachment = '<a class="btn btn-white btn-cons btn-block btn-small" data-leave="' +  data.user.name + '" data-src="' +  data.attachment + '" data-toggle="modal" data-target="#ViewAttachmentModal"><i class="fa fa-paperclip"></i> &nbsp; Attachment </a>';
                                    }
                                    return attachment + '<a href = "/leaves/edit/' + data.id +'" class="btn btn-info btn-cons btn-block btn-small" ><i class="fa fa-paste"></i> &nbsp; Edit </a>';
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