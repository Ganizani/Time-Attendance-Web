@extends('layouts.default')

@section('title', 'Holidays')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li><p>YOUR ARE HERE:</p></li>
                <li>Holidays</li>
                <li><a href="#" class="active">List</a> </li>
            </ul>
            <div class="page-title">
                <i class="material-icons">event</i><h3>Holidays</h3>
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
                                        <th style="width:20%">DATE</th>
                                        <th style="width:10%">NAME</th>
                                        <th style="width:20%">DESCRIPTION</th>
                                        <th style="width:20%">COMPANY</th>
                                        <th style="width:20%">SITE</th>
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
                                title: '{{env('APP_NAME')}} - Holidays',
                                exportOptions: {
                                    columns: [0,1,2]
                                }
                            },
                            {
                                extend: 'pdf',
                                text: 'PDF',
                                title: '{{env('APP_NAME')}}  - Holidays',
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
                    {   //DATE
                        data: 'date',
                        defaultContent:''
                    },
                    {   //NAME
                        data: 'name',
                        defaultContent:''
                    },
                    {   //DESCRIPTION
                        data: 'description',
                        defaultContent:''
                    },
                    {   //COMPANY
                        data: 'company.name',
                        defaultContent:''
                    },
                    {   //SITE
                        data: 'site.name',
                        defaultContent:''
                    },
                    {   //Actions
                        data: null,
                        defaultContent: '',
                        render : function ( data, type, row, meta ) {
                            return '<a href = "/holidays/edit/'+ data.id +'" class="btn btn-info btn-cons btn-block btn-small" ><i class="fa fa-paste"></i> &nbsp; EDIT </a>';
                        }
                    }
                ],
                filterDropDown: {
                    bootstrap: true,
                    label: "Filters | ",
                    columns: [
                        {idx: 3},
                        {idx: 4}
                    ]
                }
            });

            $('div.dataTables_length select').select2({minimumResultsForSearch: -1});
            $('#_table_filterSelect3').select2({
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