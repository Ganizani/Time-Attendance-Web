@extends('layouts.default')

@section('title', 'Holidays')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li>Holidays</li>
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
                                        <th style="width:20%">DATE</th>
                                        <th style="width:10%">NAME</th>
                                        <th style="width:20%">DESCRIPTION</th>
                                        <th style="width:20%">DEPARTMENT</th>
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
    <!-- START DELETE MODAL -->
    <div class="modal fade" id="DeleteHolidayModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="myModalLabel" class="semi-bold">Delete Holiday</h4>
                </div>
                <div class="modal-body">
                    <form class="" id="delete_form">
                        <input name="deleteHolidayId" id="deleteHolidayId" type="hidden" >
                        <input name="deleteHolidayRowIndex" id="deleteHolidayRowIndex" type="hidden" >
                        <h4>Are you sure You want to delete <b><span id="deleteHolidayName"></span> (<span id="deleteHolidayDate"></span>)</b>? After deletion, the operation cannot be reversed!</h4>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="pull-left">
                        <div id="deleteResults"></div>
                    </div>
                    <button type="button"  class="btn btn-danger " onclick="delete_holiday()"> Delete</button>
                    <button type="button" class="btn btn-white " data-dismiss="modal"> Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- END DELETE MODAL -->
@endsection
@section('footer')
    @parent

    <script>
        function delete_holiday(){
            var id        = $('#deleteHolidayId').val();
            var row_index = $('#deleteHolidayRowIndex').val();

            $('#deleteResults').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');

            $.ajax({
                type:"DELETE",
                url: "/api/holidays/" + id,
                cache: false,
                data: {},
                success: function(response){
                    $('#deleteResults').html(response.message);

                    if(response.code === "success"){
                        $('#_table').DataTable().rows(row_index).remove().draw(true);
                        $('#DeleteHolidayModal').modal('toggle');
                    }
                }
            });
        }
        //Delete Modal
        $('#DeleteHolidayModal').on('show.bs.modal', function (event) {
            $('#deleteResults').html('');
            var button     = $(event.relatedTarget); // Button that triggered the modal
            var id         = button.data('id'); // Extract info from data-* attributes
            var row_index  = button.data('index'); // Extract info from data-* attributes
            var modal      = $(this);

            //get config
            $.ajax({
                type: "GET",
                url: "/api/holidays/" + id,
                cache: false,
                data: {},
                success: function (response) {
                    var obj = response.data;

                    modal.find("#deleteHolidayId").val(obj.id);
                    modal.find("#deleteHolidayName").html(obj.name);
                    modal.find("#deleteHolidayDate").html(obj.date);
                    modal.find("#deleteHolidayRowIndex").val(row_index);
                }
            });
        });

        $(document).ready(function() {
            $("#search_form").submit(function(event) {
                event.preventDefault();

                var department = $('#Department').val();

                table.destroy();
                table = $('#_table').DataTable({
                    ajax: {
                        url: "/api/holidays",
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
                    @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_holidays']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_holidays'] == 1)
                    dom: "<'row'<'col-sm-1'l><'col-sm-3 text-center'B><'col-sm-8'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    @else
                    dom: "<'row'<'col-sm-1'l><'col-sm-11'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    @endif
                    pageLength: 25,
                    @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_holidays']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_holidays'] == 1)
                    buttons: [
                        {
                            extend: 'collection',
                            text: '&nbsp; <i class="fa fa-cloud-download"></i> &nbsp; Download',
                            className: 'btn',
                            buttons: [
                                {
                                    extend: 'excel',
                                    text: '<i class="fa fa-file-excel-o"></i> &nbsp; Excel',
                                    className: 'btn',
                                    title: 'Holidays',
                                    exportOptions: {
                                        columns: [0,1,2,3]
                                    }
                                },
                                {
                                    extend: 'pdf',
                                    text: '<i class="fa fa-file-pdf-o"></i> &nbsp; PDF',
                                    className: 'btn',
                                    title: 'Holidays',
                                    orientation: 'landscape',
                                    pageSize: 'LEGAL',
                                    exportOptions: {
                                        columns: [0,1,2,3]
                                    }
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
                        {   //NAME
                            data: 'name',
                            defaultContent: 'N/a'
                        },
                        {   //DESCRIPTION
                            data: 'description',
                            defaultContent: 'N/a'
                        },
                        {   //DEPARTMENT
                            data: 'department.name',
                            defaultContent: 'N/a'
                        },
                        {   //ACTIONS
                            data: null,
                            defaultContent: '',
                            render : function ( data, type, row, meta ) {
                                var str_delete = '';
                                var str_edit   = '';

                                @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['delete_holidays']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['delete_holidays'] == 1)
                                    str_delete = '<a href = "#" class="btn btn-danger btn-small" data-index="'+ meta.row + '" data-id="'+ data.id + '" data-toggle="modal" data-target="#DeleteHolidayModal" ><i class="fa fa-trash"></i></a>&nbsp;&nbsp;';
                                @endif

                                        @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_holidays']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_holidays'] == 1)
                                    str_edit = '<a href = "/holidays/edit/'+ data.id +'" class="btn btn-info btn-small" ><i class="fa fa-paste"></i></a>&nbsp;&nbsp;';
                                @endif

                                    return str_edit + str_delete;
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
                @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_holidays']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_holidays'] == 1)
                dom: "<'row'<'col-sm-1'l><'col-sm-1 text-center'B><'col-sm-10'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                @else
                dom: "<'row'<'col-sm-1'l><'col-sm-11'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                @endif
                pageLength:  25,
                @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_holidays']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_holidays'] == 1)
                buttons: [
                    {
                        extend: 'collection',
                        text: '&nbsp; <i class="fa fa-cloud-download"></i> &nbsp; Download',
                        className: 'btn',
                        buttons: [
                            {
                                extend: 'excel',
                                text: '<i class="fa fa-file-excel-o"></i> &nbsp; Excel',
                                className: 'btn',
                                title: 'Holidays',
                                exportOptions: {
                                    columns: [0,1,2,3]
                                }
                            },
                            {
                                extend: 'pdf',
                                text: '<i class="fa fa-file-pdf-o"></i> &nbsp; PDF',
                                className: 'btn',
                                title: 'Holidays',
                                orientation: 'landscape',
                                pageSize: 'LEGAL',
                                exportOptions: {
                                    columns: [0,1,2,3]
                                }
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