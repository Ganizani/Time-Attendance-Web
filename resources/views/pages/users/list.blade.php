@extends('layouts.default')

@section('title', 'Users')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li>Users</li>
                <li><a href="#" class="active">List</a> </li>
            </ul>
            <div class="page-title">
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <form  id="search_form">
                                <div class="col-md-3">
                                    <!--input class="form-control" type="text" id="InputText" name="InputText" placeholder="Search Text ..."-->
                                </div>
                                <div class="col-md-4">
                                    <select name="Department" id="Department" class="select2 form-control" data-init-plugin="select2">
                                        <option value="" > - Department - </option>
                                        @if(isset($departments) && count($departments) > 0)
                                            @foreach ($departments as $department)
                                                <option value="{{$department['id']}}">{{$department['name']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-warning btn-block btn-medium " type="submit" ><i class="fa fa-filter"></i> &nbsp;Filter </button>
                                </div>
                                <div class="col-md-2"></div>
                            </form>
                            <h4>&nbsp;</h4>
                        </div>
                        <div class="grid-body ">
                            <div class="table-responsive">
                                <table class="table table-striped dataTable" id="_table" width="100%">
                                    <thead>
                                    <tr>
                                        <th style="width:10%">Name</th>
                                        <th style="width:15%">Email</th>
                                        <th style="width:10%">User Group</th>
                                        <th style="width:10%">Department</th>
                                        <th style="width:10%">Gender</th>
                                        <th style="width:10%">Phone Number</th>
                                        <th style="width:10%">Verified</th>
                                        <th style="width:5%">Status</th>
                                        <th style="width:10%">Remaining Leave Days</th>
                                        <th style="width:10%">Actions</th>
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
    <div class="modal fade" id="DeleteUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="myModalLabel" class="semi-bold">Delete User</h4>
                </div>
                <div class="modal-body">
                    <form class="" id="delete_form">
                        <input name="deleteUserId" id="deleteUserId" type="hidden" >
                        <input name="deleteUserRowIndex" id="deleteUserRowIndex" type="hidden" >
                        <h4>Are you sure You want to delete <b><span id="deleteUserName"></span></b>? After deletion, the operation cannot be reversed!</h4>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="pull-left">
                        <div id="deleteResults"></div>
                    </div>
                    <button type="button"  class="btn btn-danger " onclick="delete_user()"> Delete</button>
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
        function delete_user(){
            var id        = $('#deleteUserId').val();
            var row_index = $('#deleteUserRowIndex').val();

            $('#deleteResults').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');

            $.ajax({
                type:"DELETE",
                url: "/api/users/" + id,
                cache: false,
                data: {},
                success: function(response){
                    $('#deleteResults').html(response.message);

                    if(response.code === "success"){
                        $('#_table').DataTable().rows(row_index).remove().draw(true);
                        $('#DeleteUserModal').modal('toggle');
                    }
                }
            });
        }
        //Delete Modal
        $('#DeleteUserModal').on('show.bs.modal', function (event) {
            $('#deleteResults').html('');
            var button     = $(event.relatedTarget); // Button that triggered the modal
            var id         = button.data('id'); // Extract info from data-* attributes
            var row_index  = button.data('index'); // Extract info from data-* attributes
            var modal      = $(this);

            //get config
            $.ajax({
                type: "GET",
                url: "/api/users/" + id,
                cache: false,
                data: {},
                success: function (response) {
                    var obj = response.data;

                    modal.find("#deleteUserId").val(obj.id);
                    modal.find("#deleteUserName").html(obj.name);
                    modal.find("#deleteUserRowIndex").val(row_index);
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
                        url: "/api/users",
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
                    @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_users']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_users'] == 1)
                    dom: "<'row' <'col-md-1'l> <'col-md-1 text-center'B> <'col-md-10'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    @else
                    dom: "<'row' <'col-md-1'l> <'col-md-11'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    @endif
                    pageLength: 25,
                    @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_users']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_users'] == 1)
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
                                    title: 'Users',
                                    exportOptions: {
                                        columns: [0,1,2,3,4,5,7]
                                    }
                                },
                                {
                                    extend: 'pdf',
                                    text: '<i class="fa fa-file-pdf-o"></i> &nbsp; PDF',
                                    className: 'btn',
                                    title: 'Users',
                                    orientation: 'landscape',
                                    pageSize: 'LEGAL',
                                    exportOptions: {
                                        columns: [0,1,2,3,4,5,7]
                                    }
                                }
                            ]
                        }
                    ],
                    @endif
                    columns: [
                        {   //Name
                            data: 'name',
                            defaultContent: 'N/a'
                        },
                        {   //Email
                            data: 'email',
                            defaultContent: 'N/a'
                        },
                        {   //User Group
                            data: 'user_group.name',
                            defaultContent: 'N/a'
                        },
                        {   //Department
                            data: 'department.name',
                            defaultContent: 'N/a'
                        },
                        {   //Gender
                            data: 'gender',
                            defaultContent: 'N/a'
                        },
                        {   //Phone Number
                            data: 'phone_number',
                            defaultContent: 'N/a'
                        },
                        {   //Verified
                            data: 'verified',
                            defaultContent: 'N/a'
                        },
                        {   //Status
                            data : null,
                            defaultContent: '',
                            render : function ( data, type, row, meta ) {
                                var labelClass = (data.status === 'ACTIVE') ? "label-success" : "label-important";
                                return '<span class="label '+ labelClass +'">' + data.status +'</span>';
                            }
                        },
                        {   //Leave Days
                            data : null,
                            defaultContent: 'N/a'
                        },
                        {   //Actions
                            data : null,
                            defaultContent: '',
                            render : function ( data, type, row, meta ) {
                                var str_delete = '';
                                var str_edit   = '';

                                @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['delete_users']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['delete_users'] == 1)
                                    str_delete = '<a href = "#" class="btn btn-danger btn-small" data-index="'+ meta.row + '" data-id="'+ data.id + '" data-toggle="modal" data-target="#DeleteUserModal" ><i class="fa fa-trash"></i></a>&nbsp;&nbsp;';
                                @endif

                                @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_users']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_users'] == 1)
                                    str_edit = '<a href = "/users/edit/'+ data.id +'" class="btn btn-info btn-small" ><i class="fa fa-paste"></i></a>&nbsp;&nbsp;';
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
                @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_users']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_users'] == 1)
                    dom: "<'row' <'col-md-1'l> <'col-md-1 text-center'B> <'col-md-10'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                @else
                    dom: "<'row' <'col-md-1'l> <'col-md-11'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                @endif
                pageLength:  25,
                @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_users']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_users'] == 1)
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
                                title: 'Users',
                                exportOptions: {
                                    columns: [0,1,2,3,4,5,7]
                                }
                            },
                            {
                                extend: 'pdf',
                                text: '<i class="fa fa-file-pdf-o"></i> &nbsp; PDF',
                                className: 'btn',
                                title: 'Users',
                                orientation: 'landscape',
                                pageSize: 'LEGAL',
                                exportOptions: {
                                    columns: [0,1,2,3,4,5,7]
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