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
                                        <th style="width:5%">PHONE NUMBER</th>
                                        <th style="width:10%">EMAIL</th>
                                        <th style="width:10%">WEBSITE</th>
                                        <th style="width:10%">CONTACT PERSON</th>
                                        <th style="width:10%">ADDRESS</th>
                                        <th style="width:10%">LOGIN ID</th>
                                        <th style="width:10%">PASSWORD</th>
                                        <th style="width:5%">SITE COUNT</th>
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
                                title: '{{env('APP_NAME')}} - Company List',
                                exportOptions: {
                                    columns: [0,1,2,3,4,5,6,8]
                                }
                            },
                            {
                                extend: 'pdf',
                                text: 'PDF',
                                title: '{{env('APP_NAME')}}  - Company List',
                                orientation: 'landscape',
                                pageSize: 'LEGAL',
                                exportOptions: {
                                    columns: [0,1,2,3,4,5,6,8]
                                }
                            }
                        ]
                    }
                ],
                columns: [
                    {   //NAME
                        data: 'name',
                        defaultContent: 'N/a'
                    },
                    {   //PHONE NUMBER
                        data: 'phone_number',
                        defaultContent: 'N/a'
                    },
                    {   //EMAIL
                        data: 'email',
                        defaultContent: 'N/a'
                    },
                    {   //WEBSITE
                        data: 'website',
                        defaultContent: 'N/a'
                    },
                    {   //CONTACT PERSON
                        data: 'contact_person',
                        defaultContent: 'N/a'
                    },
                    {   //ADDRESS
                        data: 'address.id',
                        defaultContent: 'N/a'
                    },
                    {   //LOGIN ID
                        data: 'login_id',
                        defaultContent: 'N/a'
                    },
                    {   //PASSWORD
                        data: 'password',
                        defaultContent: 'N/a'
                    },
                    {   //SITE COUNT
                        data: 'site_count',
                        defaultContent: 'N/a'
                    },
                    {   //ACTIONS
                        data : null,
                        'render' : function ( data, type, row, meta ) {
                            return '<a href = "/companies/edit/'+ data.id +'" class="btn btn-info btn-cons btn-block btn-small" ><i class="fa fa-paste"></i> &nbsp; Edit </a>';
                        }
                    }
                ]
            });

            $('div.dataTables_length select').select2({minimumResultsForSearch: -1});
        });
    </script>
@endsection