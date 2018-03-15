@extends('layouts.default')

@section('title', 'Leaves')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li>Leaves</li>
                <li>Types</li>
                <li><a href="#" class="active">List</a> </li>
            </ul>
            <div class="page-title">
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4> &nbsp;</h4>
                        </div>
                        <div class="grid-body ">
                            <div class="table-responsive">
                                <table class="table table-striped dataTable" id="_table" width="100%">
                                    <thead>
                                    <tr>
                                        <th style="width:25%">NAME</th>
                                        <th style="width:50%">DESCRIPTION</th>
                                        <th style="width:25%">ACTIONS</th>
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
                    {   //Description
                        data: 'description',
                        defaultContent: ''
                    },
                    {   //Actions
                        data: null,
                        defaultContent: '',
                        render : function ( data, type, row, meta ) {
                            return '<a href = "/leaves/types/edit/'+ data.id +'" class="btn btn-info btn-cons btn-block btn-small" ><i class="fa fa-paste"></i> &nbsp; EDIT </a>';
                        }
                    }
                ]
            });

            $('div.dataTables_length select').select2({minimumResultsForSearch: -1});
        });
    </script>
@endsection