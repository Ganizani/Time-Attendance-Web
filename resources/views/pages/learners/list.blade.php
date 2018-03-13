@extends('layouts.default')

@section('title', 'Learners')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li><p>YOUR ARE HERE:</p></li>
                <li>Learners</li>
                <li><a href="#" class="active">List</a> </li>
            </ul>
            <div class="page-title">
                <i class="material-icons">supervisor_account</i><h3>Learners</h3>
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
                                        <th style="width:0%">STATUS</th>
                                        <th style="width:10%">NAME</th>
                                        <th style="width:5%">ID NUMBER</th>
                                        <th style="width:5%">GENDER</th>
                                        <th style="width:5%">PHONE NUMBER</th>
                                        <th style="width:10%">EMAIL</th>
                                        <th style="width:5%">CARD NUMBER</th>
                                        <th style="width:5%">MONTHLY STIPEND</th>
                                        <th style="width:5%">QUALIFICATION</th>
                                        <th style="width:5%">INTERVENTION</th>
                                        <th style="width:5%">ADDRESS</th>
                                        <th style="width:5%">COMPANY</th>
                                        <th style="width:5%">SITE</th>
                                        <th style="width:5%">UPLOAD DATE</th>
                                        <th style="width:5%">START DATE</th>
                                        <th style="width:5%">END DATE</th>
                                        <th style="width:5%">STATUS</th>
                                        @if(isset($_SESSION['SETA-EMPLG-USER-TYPE']) && $_SESSION['SETA-EMPLG-USER-TYPE'] < 3)
                                            <th style="width:5%">ACTIONS</th>
                                        @endif
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
                ajax: "/api/learners/all",
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
                    {   //Status
                        data: 'status',
                        defaultContent: '',
                        visible: false
                    },
                    {   //Name
                        data: 'name',
                        defaultContent: ''
                    },
                    {   //Id Number
                        data: 'id_number',
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
                    {   //Email
                        data: 'email',
                        defaultContent: ''
                    },
                    {   //Card Number
                        data: 'card_number',
                        defaultContent: ''
                    },
                    {   //Monthly Stipend
                        data: 'monthly_stipend',
                        defaultContent: '',
                        render : function ( data, type, row, meta ) {
                            return 'R' + data;
                        }
                    },
                    {   //Qualification
                        data: 'qualification',
                        defaultContent: 'N/a'

                    },
                    {   //Intervention
                        data: 'intervention',
                        defaultContent: 'N/a'
                    },
                    {   //Address
                        data: 'address.id',
                        defaultContent: 'N/a'
                    },
                    {   //Company
                        data: 'company.name',
                        defaultContent: ''
                    },
                    {   //Site
                        data: 'site.name',
                        defaultContent: ''
                    },
                    {   //Upload Date
                        data: 'upload_date',
                        defaultContent: ''
                    },
                    {   //Start Date
                        data: 'start_date',
                        defaultContent: ''
                    },
                    {   //End Date
                        data: 'end_date',
                        defaultContent: ''
                    },
                    {   //Status
                        data : null,
                        defaultContent: '',
                        render : function ( data, type, row, meta ) {
                            var labelClass = (data.status === 'ACTIVE') ? "label-success" : "label-important";
                            return '<span class="label '+ labelClass +'">' + data.status +'</span>';
                        }
                    },
                    @if(isset($_SESSION['SETA-EMPLG-USER-TYPE']) && $_SESSION['SETA-EMPLG-USER-TYPE'] < 3)
                        {   //Actions
                            data: null,
                            defaultContent: '',
                            render : function ( data, type, row, meta ) {
                                return '<a href = "/learners/edit/'+ data.id +'" class="btn btn-info btn-cons btn-block btn-small" ><i class="fa fa-paste"></i> &nbsp; EDIT </a>';
                            }
                        }
                    @endif
                ],
                filterDropDown: {
                    bootstrap: true,
                    label: "Filters | ",
                    columns: [
                        {idx: 3},
                        {idx: 8},
                        {idx: 11},
                        {idx: 0}
                    ]
                }
            });

            $('div.dataTables_length select').select2({minimumResultsForSearch: -1});
            $('#_table_filterSelect3').select2({
                minimumResultsForSearch: -1,
                width: '300px'
            });
            $('#_table_filterSelect8').select2({
                minimumResultsForSearch: -1,
                width: '300px'});
            $('#_table_filterSelect11').select2({
                minimumResultsForSearch: -1,
                width: '300px'});
            $('#_table_filterSelect0').select2({
                minimumResultsForSearch: -1,
                width: '300px'
            });
        });
    </script>
@endsection