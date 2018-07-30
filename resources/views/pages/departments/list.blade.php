@extends('layouts.default')

@section('title', 'Departments')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li>Departments</li>
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
                            <div class="row"></div>
                            <div class="table-responsive">
                                <table class="table table-striped dataTable" id="_table" width="100%">
                                    <thead>
                                    <tr>
                                        <th style="width:10%">NAME</th>
                                        <th style="width:20%">DESCRIPTION</th>
                                        <th style="width:10%">LOCATION</th>
                                        <th style="width:10%">EMPLOYEES</th>
                                        <th style="width:10%">DEVICES</th>
                                        <th style="width:10%">MANAGER</th>
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
    <div class="modal fade" id="DeleteDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="myModalLabel" class="semi-bold">Delete Department</h4>
                </div>
                <div class="modal-body">
                    <form class="" id="delete_form">
                        <input name="deleteDepartmentId" id="deleteDepartmentId" type="hidden" >
                        <input name="deleteDepartmentRowIndex" id="deleteDepartmentRowIndex" type="hidden" >
                        <h4>Are you sure You want to delete <b><span id="deleteDepartmentName"></span></b>? After deletion, the operation cannot be reversed!</h4>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="pull-left">
                        <div id="deleteResults"></div>
                    </div>
                    <button type="button"  class="btn btn-danger " onclick="delete_department()"> Delete</button>
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
        function delete_department(){
            var id        = $('#deleteDepartmentId').val();
            var row_index = $('#deleteDepartmentRowIndex').val();

            $('#deleteResults').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');

            $.ajax({
                type:"DELETE",
                url: "/api/departments/" + id,
                cache: false,
                data: {},
                success: function(response){
                    $('#deleteResults').html(response.message);

                    if(response.code === "success"){
                        $('#_table').DataTable().rows(row_index).remove().draw(true);
                        $('#DeleteDepartmentModal').modal('toggle');
                    }
                }
            });
        }
        //Delete Modal
        $('#DeleteDepartmentModal').on('show.bs.modal', function (event) {
            $('#deleteResults').html('');
            var button     = $(event.relatedTarget); // Button that triggered the modal
            var id         = button.data('id'); // Extract info from data-* attributes
            var row_index  = button.data('index'); // Extract info from data-* attributes
            var modal      = $(this);

            //get config
            $.ajax({
                type: "GET",
                url: "/api/departments/" + id,
                cache: false,
                data: {},
                success: function (response) {
                    var obj = response.data;

                    modal.find("#deleteDepartmentId").val(obj.id);
                    modal.find("#deleteDepartmentName").html(obj.name);
                    modal.find("#deleteDepartmentRowIndex").val(row_index);
                }
            });
        });

        $(document).ready(function() {
            var table =  $('#_table').DataTable({
                ajax: "/api/departments",
                language : {
                    sLengthMenu: "_MENU_",
                    search:         "",
                    searchPlaceholder: "Search ..."
                },
                @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_departments']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_departments'] == 1)
                dom: "<'row'<'col-sm-1'l><'col-sm-1 text-center'B><'col-sm-10'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                @else
                dom: "<'row'<'col-sm-1'l><'col-sm-11'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                @endif
                pageLength:  25,
                @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_departments']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_departments'] == 1)
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
                                title: 'Department List',
                                exportOptions: {
                                    columns: [0,1,2,3,4,5]
                                }
                            },
                            {
                                extend: 'pdf',
                                text: '<i class="fa fa-file-pdf-o"></i> &nbsp; PDF',
                                className: 'btn',
                                title: 'Department List',
                                orientation: 'landscape',
                                pageSize: 'LEGAL',
                                exportOptions: {
                                    columns: [0,1,2,3,4,5]
                                }
                            }
                        ]
                    }
                ],
                @endif
                columns: [
                    {   //NAME
                        data: 'name',
                        defaultContent: ''
                    },
                    {   //DESCRIPTION
                        data: 'description',
                        defaultContent: 'N/a'
                    },
                    {   //Location
                        data: 'location',
                        defaultContent: 'N/a'
                    },
                    {   //EMPLOYEE COUNT
                        data: 'employees',
                        defaultContent: '0'
                    },
                    {   //DEVICE COUNT
                        data: 'devices',
                        defaultContent: '0'
                    },
                    {   //MANAGER
                        data: null,
                        defaultContent: ''
                    },
                    {   //ACTION
                        data: null,
                        defaultContent: '',
                        render : function ( data, type, row, meta ) {
                            var str_edit   = "";
                            var str_delete = "";
                            @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['delete_departments']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['delete_departments'] == 1)
                                str_delete = '<a href = "#" class="btn btn-danger btn-small" data-index="'+ meta.row + '" data-id="'+ data.id + '" data-devices="'+ data.devices + '" data-employee="'+ data.employees + '" data-toggle="modal" data-target="#DeleteDepartmentModal" ><i class="fa fa-trash"></i></a>&nbsp;&nbsp;';
                            @endif

                            @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_departments']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_departments'] == 1)
                                str_edit = '<a href = "/departments/edit/'+ data.id +'" class="btn btn-info btn-small" ><i class="fa fa-paste"></i></a>&nbsp;&nbsp;';
                            @endif

                            return str_edit + str_delete;
                        }

                    }
                ]
            });

            $('div.dataTables_length select').select2({minimumResultsForSearch: -1});
        });
    </script>
@endsection