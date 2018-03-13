@extends('layouts.default')

@section('title', 'Home')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li><p>YOUR ARE HERE:</p></li>
                <li><a href="#" class="active">Dashboard</a></li>
            </ul>
            <div class="page-title">
                <i class="material-icons">home</i><h3>Dashboard</h3>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN DASHBOARD TILES -->
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="tiles green m-b-10">
                                <div class="tiles-body">
                                    <div class="controller">
                                        &nbsp;
                                    </div>
                                    <div class="tiles-title text-black">ACTIVE LEARNERS</div>
                                    <h4 class="white"><span class="item-count animate-number semi-bold" data-value="{{$active}}" data-animation-duration="700">0</span></h4>

                                    <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                                        <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="100%"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="tiles yellow m-b-10">
                                <div class="tiles-body">
                                    <div class="controller">
                                        &nbsp;
                                    </div>
                                    <div class="tiles-title text-black">ABSENT LEARNERS </div>
                                    <h4 class="white"><span class="item-count animate-number semi-bold" data-value="{{$absents}}" data-animation-duration="700">0</span></h4>
                                    <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                                        <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="100%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="tiles red m-b-10">
                                <div class="tiles-body">
                                    <div class="controller">
                                        &nbsp;
                                    </div>
                                    <div class="tiles-title text-black">EXPIRING CONTRACTS ( {{strtoupper(date('F'))}} )</div>
                                    <h4 class="white">
                                        <span class="item-count animate-number semi-bold" data-value="{{$expiring}}" data-animation-duration="1000">0</span>
                                    </h4>
                                    <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                                        <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="100%"></div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- END DASHBOARD TILES -->

                    <div class="row">
                        <div class="col-md-8">
                            <div class="grid simple ">
                                <div class="grid-title">
                                    <h4>Latest Clockings</h4>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                    </div>
                                </div>
                                <div class="grid-body ">
                                    <div class="table-responsive">
                                        <table class="table table-striped dataTable" id="_table" width="100%">
                                            <thead>
                                            <tr>
                                                <th style="width:20%">ID NUMBER</th>
                                                <th style="width:20%">NAME</th>
                                                <th style="width:20%">SITE</th>
                                                <th style="width:10%">DEVICE</th>
                                                <th style="width:10%">TIME</th>
                                                <th style="width:10%">STATUS</th>
                                                <th style="width:10%">MAP</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="grid simple ">
                                <div class="grid-title">
                                    <h4> Recently Added Learners</h4>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                    </div>
                                </div>
                                <div class="grid-body ">
                                    @if(count($users) > 0)
                                        @foreach($users as $user)
                                            <div class="post comments-section">
                                        <div class="user-profile-pic-wrapper">
                                            <div class="user-profile-pic-normal">
                                                <img width="35" height="35" alt="" src={{ URL::asset("theme/img/profiles/profile_placeholder.jpg") }} data-src={{ URL::asset("theme/img/profiles/profile_placeholder.jpg") }} data-src-retina={{ URL::asset("theme/img/profiles/profile_placeholder.jpg") }}>
                                            </div>
                                        </div>
                                        <div class="info-wrapper">
                                            <div class="username">
                                                <span class="dark-text">{{$user['name']}}</span>
                                            </div>
                                            <div class="info">
                                                Added To <span class="dark-text">{{$user['company']['name']}}</span> , <span class="dark-text">{{$user['site']['name']}}</span>
                                            </div>
                                            <div class="more-details">
                                                <ul class="post-links">
                                                    <li><a class="muted">{{$user['created_at']}}</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- BEGIN PAGE CONTAINER-->
@endsection
@section('footer')
    @parent
    <script>
        $(document).ready(function() {

            var table =  $('#_table').DataTable({
                ajax: "/api/records/recently",
                dom: "<'row'<'col-sm-2'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'>",
                pageLength:  25,
                buttons: [
                    {
                        text: '&nbsp; <i class="fa fa-search-plus"></i> &nbsp; View All',
                        action: function ( e, dt, node, config ) {
                           window.location.href = "/reports/attendance";
                        }
                    }
                ],
                columns: [
                    {   //ID NUMBER
                        data: 'learner.id_number',
                        defaultContent: ''
                    },
                    {   //NAME
                        data: 'learner.name',
                        defaultContent: ''
                    },
                    {   //SITE
                        data: 'learner.site.name',
                        defaultContent: ''
                    },
                    {   //DEVICE
                        data: 'device.device_name',
                        defaultContent: ''
                    },
                    {   //TIME
                        data: 'time',
                        defaultContent: ''
                    },
                    {   //STATUS
                        data: 'status',
                        defaultContent: ''
                    },
                    {   //MAP
                        data : null,
                        defaultContent: '',
                        'render' : function ( data, type, row, meta ) {
                            return '<a href = "/reports/map?rid='+ data.id +'" class="btn btn-white btn-cons btn-block btn-small" ><i class="fa fa-map-marker"></i> &nbsp; View </a>';
                        }
                    }
                ]
            });
        });
    </script>
@endsection