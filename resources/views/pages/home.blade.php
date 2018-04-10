@extends('layouts.default')

@section('title', 'Home')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li><a href="#" class="active"> Dashboard</a></li>
            </ul>
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
                                    <div class="tiles-title text-black">ACTIVE USERS</div>
                                    <h4 class="white">
                                        <span id="active_count" class="item-count animate-number semi-bold" data-animation-duration="700">12</span>
                                    </h4>

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
                                    <div class="tiles-title text-black">ABSENT EMPLOYEES ( {{strtoupper(date('jS F'))}} ) </div>
                                    <h4 class="white">
                                        <span id="absent_count" class="item-count animate-number semi-bold" data-animation-duration="700">0</span>
                                    </h4>
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
                                    <div class="tiles-title text-black">EMPLOYEES ON LEAVE ( {{strtoupper(date('jS F'))}} )</div>
                                    <h4 class="white">
                                        <span id="leave_count" class="item-count animate-number semi-bold"  data-animation-duration="1000">0</span>
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
                                    <h4>Latest Clocks</h4>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                    </div>
                                </div>
                                <div class="grid-body ">
                                    <div class="table-responsive">
                                        <table class="table table-striped dataTable" id="_table" width="100%">
                                            <thead>
                                            <tr>
                                                <th style="width:20%">EMPLOYEE CODE</th>
                                                <th style="width:20%">NAME</th>
                                                <th style="width:20%">DEPARTMENT</th>
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
                                    <h4> Recently Added Users</h4>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"></a>
                                    </div>
                                </div>
                                <div class="grid-body ">
                                    @if(isset($users) && count($users) > 0)
                                        @foreach($users as $user)
                                            <div class="post comments-section">
                                        <div class="user-profile-pic-wrapper">
                                            <div class="user-profile-pic-normal">
                                                <img width="35" height="35" alt="" src="{{ URL::asset("theme/img/profile_placeholder.jpg")}}" data-src="{{ URL::asset("theme/img/profile_placeholder.jpg")}}" data-src-retina="{{ URL::asset("theme/img/profile_placeholder.jpg")}}">
                                            </div>
                                        </div>
                                        <div class="info-wrapper">
                                            <div class="username">
                                                <span class="dark-text">{{$user['name']}}</span>
                                            </div>
                                            <div class="info">
                                                Added To <span class="dark-text">{{$user['department']['name']}}</span>
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
        $.ajax({
            type:"GET",
            url:"/api/dashboard_info",
            cache:false,
            data:{},
            success: function(response){
                $("#leave_count").html(response.leave);
                $("#active_count").html(response.active);
                $("#absent_count").html(response.absent);
            }
        });
        $(document).ready(function() {
            var table = $('#_table').DataTable({
                ajax: "/api/records/recently",
                dom: "<'row'>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'>",
                pageLength: 25,
                columns: [
                    {   //EMPLOYEE CODE
                        data: 'user.employee_code',
                        defaultContent: ''
                    },
                    {   //EMPLOYEE NAME
                        data: 'user.name',
                        defaultContent: ''
                    },
                    {   //DEPARTMENT
                        data: 'user.department.name',
                        defaultContent: ''
                    },
                    {   //DEVICE
                        data: 'device.name',
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
                        data: null,
                        defaultContent: '',
                        'render': function (data, type, row, meta) {
                            return '<a href = "/reports/map?rid=' + data.id + '" class="btn btn-white btn-cons btn-block btn-small" ><i class="fa fa-map-marker"></i> &nbsp; View </a>';
                        }
                    }
                ]
            });
        });
    </script>
@endsection