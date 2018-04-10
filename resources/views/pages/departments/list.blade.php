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
@endsection
@section('footer')
    @parent

    <script>
        $(document).ready(function() {
            var table =  $('#_table').DataTable({
                ajax: "/api/departments",
                language : {
                    sLengthMenu: "_MENU_",
                    search:         "",
                    searchPlaceholder: "Search ..."
                },
                dom: "<'row'<'col-sm-1'l><'col-sm-11'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                pageLength:  25,
                columns: [
                    {   //NAME
                        data: 'name',
                        defaultContent: ''
                    },
                    {   //DESCRIPTION
                        data: 'description',
                        defaultContent: ''
                    },
                    {   //Location
                        data: 'location',
                        defaultContent: ''
                    },
                    {   //EMPLOYEE COUNT
                        data: 'users',
                        defaultContent: ''
                    },
                    {   //DEVICE COUNT
                        data: 'devices',
                        defaultContent: ''
                    },
                    {   //MANAGER
                        data: null,
                        defaultContent: ''
                    },
                    {   //ACTION
                        data: null,
                        defaultContent: '',
                        render : function ( data, type, row, meta ) {
                            return '<a href = "/departments/edit/'+ data.id +'" class="btn btn-info btn-cons btn-block btn-small" ><i class="fa fa-paste"></i> &nbsp; Edit </a>';
                        }

                    }
                ]
            });

            $('div.dataTables_length select').select2({minimumResultsForSearch: -1});
        });
    </script>
@endsection