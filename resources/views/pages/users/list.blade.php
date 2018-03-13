@extends('layouts.default')

@section('title', 'Users')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li><p>YOUR ARE HERE:</p></li>
                <li>Users</li>
                <li><a href="#" class="active">List</a> </li>
            </ul>
            <div class="page-title">
                <i class="material-icons">person</i><h3>Users</h3>
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
                                        <th style="width:20%">Name</th>
                                        <th style="width:15%">Email</th>
                                        <th style="width:10%">Gender</th>
                                        <th style="width:10%">Phone Number</th>
                                        <th style="width:10%">User Type</th>
                                        <th style="width:10%">Verified</th>
                                        <th style="width:10%">Status</th>
                                        <th style="width:15%">Actions</th>
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
                ajax: "/api/users/all",
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
                                title: '{{env('APP_NAME')}} - Learners List',
                                exportOptions: {
                                    columns: [0,1,2]
                                }
                            },
                            {
                                extend: 'pdf',
                                text: 'PDF',
                                title: '{{env('APP_NAME')}}  - Learners List',
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
                    {   //Name
                        data: 'name',
                        defaultContent: ''
                    },
                    {   //Email
                        data: 'email',
                        defaultContent: ''
                    },
                    {   //Gender
                        data: 'gender',
                        defaultContent: ''
                    },
                    {   //Phone Number
                        data: 'phone_number',
                        defaultContent: ''
                    },
                    {   //User Type
                        data: 'user_type',
                        defaultContent: ''
                    },
                    {   //Verified
                        data: 'verified',
                        defaultContent: ''
                    },
                    {   //Status
                        data : null,
                        defaultContent: '',
                        'render' : function ( data, type, row, meta ) {
                            var labelClass = (data.status === 'ACTIVE') ? "label-success" : "label-important";
                            return '<span class="label '+ labelClass +'">' + data.status +'</span>';
                        }
                    },
                    {   //Actions
                        data : null,
                        defaultContent: '',
                        'render' : function ( data, type, row, meta ) {
                            return '<a href = "/users/edit/'+ data.id +'" class="btn btn-info btn-cons btn-block btn-small" ><i class="fa fa-paste"></i> &nbsp; EDIT </a>';
                        }
                    }
                ],
                filterDropDown: {
                    bootstrap: true,
                    label: "Filters | ",
                    columns: [
                        {idx: 2},
                        {idx: 4}
                    ]
                }
            });

            $('div.dataTables_length select').select2({minimumResultsForSearch: -1});
            $('#_table_filterSelect2').select2({
                minimumResultsForSearch: -1,
                width: '400px'
            });
            $('#_table_filterSelect4').select2({
                minimumResultsForSearch: -1,
                width: '400px'
            });
        });
    </script>
@endsection