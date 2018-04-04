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
                                    <input class="form-control" type="text" id="InputText" name="InputText" placeholder="Search Text ...">
                                </div>
                                <div class="col-md-3">
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

        function export_report(type){
            var val = "/api/site/export?type=" + type + "&input_search=" + + "&company" + company;
            window.location.href = val;
        }

        $(document).ready(function() {
            $("#search_form").submit(function(event) {
                event.preventDefault();

                var company = $('#Company').val();
                var site    = $('#Site').val();
                var input   = $('#InputText').val();

                table.destroy();
                table = $('#_table').DataTable({
                    ajax: {
                        url: "/api/learners/search",
                        type: "POST",
                        dataSrc: "",
                        data: {
                            input_txt: input,
                            site: site,
                            company: company
                        }
                    },
                    language: {
                        sLengthMenu: "_MENU_",
                        search: "",
                        searchPlaceholder: "Search ..."
                    },
                    dom: "<'row' <'col-md-1'l> <'col-md-1 text-center'B> <'col-md-10'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    pageLength: 25,
                    buttons: [
                        {
                            extend: 'collection',
                            className: 'btn btn-cons',
                            text: '&nbsp; <i class="fa fa-cloud-download"></i> &nbsp; Download',
                            buttons: [
                                {
                                    text: '<i class="fa fa-file-excel-o"></i> &nbsp;Excel',
                                    className: 'btn',
                                    action: function ( e, dt, node, config ) {
                                        export_report("excel");
                                    }
                                },
                                {
                                    text: '<i class="fa fa-file-pdf-o"></i> &nbsp; PDF',
                                    className: 'btn',
                                    action: function ( e, dt, node, config ) {
                                        export_report("pdf");
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
                                return '<a href = "/employees/edit/'+ data.id +'" class="btn btn-info btn-cons btn-block btn-small" ><i class="fa fa-paste"></i> &nbsp; EDIT </a>';
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
                dom: "<'row' <'col-md-1'l> <'col-md-1 text-center'B> <'col-md-10'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                pageLength:  25,
                buttons: [
                    {
                        extend: 'collection',
                        className: 'btn btn-cons',
                        text: '&nbsp; <i class="fa fa-cloud-download"></i> &nbsp; Download',
                        buttons: [
                            {
                                text: '<i class="fa fa-file-excel-o"></i> &nbsp;Excel',
                                className: 'btn',
                                action: function ( e, dt, node, config ) {
                                    export_report("excel");
                                }
                            },
                            {
                                text: '<i class="fa fa-file-pdf-o"></i> &nbsp; PDF',
                                className: 'btn',
                                action: function ( e, dt, node, config ) {
                                    export_report("pdf");
                                }
                            }
                        ]
                    }
                ]
            });

            $('div.dataTables_length select').select2({minimumResultsForSearch: -1});
        });
    </script>
@endsection