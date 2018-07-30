@extends('layouts.default')

@section('title', 'Access Control')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li>Users</li>
                <li>User Groups</li>
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
                                        <th style="width:25%">NAME</th>
                                        <th style="width:30%">DESCRIPTION</th>
                                        <th style="width:30%">USERS</th>
                                        <th style="width:15%">ACTIONS</th>
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
                ajax: "/api/user-groups",
                language : {
                    sLengthMenu: "_MENU_",
                    search:         "",
                    searchPlaceholder: "Search ..."
                },
                @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_user_groups']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_user_groups'] == 1)
                dom: "<'row'<'col-sm-1'l><'col-sm-3 text-center'B><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                @else
                dom: "<'row'<'col-sm-1'l><'col-sm-11'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                @endif
                pageLength:  25,
                @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_user_groups']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['print_user_groups'] == 1)
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
                    {   //NAME
                        data: 'name',
                        defaultContent: ''
                    },
                    {   //DESCRIPTION
                        data: 'description',
                        defaultContent: 'N/a'
                    },
                    {   //Users
                        data: 'user_count',
                        defaultContent: 'N/a'
                    },
                    {   //ACTION
                        data: null,
                        defaultContent: '',
                        render : function ( data, type, row, meta ) {
                            var str_delete = '&nbsp;';
                            var str_edit   = '&nbsp;';

                            @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['delete_user_groups']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['delete_user_groups'] == 1)
                                str_delete = '<a href = "" class="btn btn-danger btn-small" ><i class="fa fa-trash"></i></a>&nbsp;&nbsp;';
                            @endif
                            @if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_user_groups']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_user_groups'] == 1)
                                str_edit = '<a href = "/user-groups/edit/'+ data.id +'" class="btn btn-info btn-small" ><i class="fa fa-paste"></i></a>&nbsp;&nbsp;';
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