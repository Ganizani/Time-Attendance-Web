@extends('layouts.default')

@section('title', 'Reports')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li>Reports</li>
                <li><a href="#" class="active">Map</a> </li>
            </ul>
            <div class="page-title">
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">

                            <form  id="search_form">
                                @if(isset($record) && count($record) == 0)
                                <div class="col-md-3">
                                    <div class="input-append warning col-lg-10 no-padding">
                                        <input name="FromDate" id="FromDate" type="text" class="form-control datepicker" placeholder="From Date" value="{{isset($_GET['FromDate'])? $_GET['FromDate']: ""}}">
                                        <span class="add-on"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-append warning col-lg-10 no-padding">
                                        <input name="ToDate" id="ToDate" type="text" class="form-control datepicker" placeholder="To Date" value="{{isset($_GET['ToDate'])? $_GET['ToDate']: ""}}">
                                        <span class="add-on"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <select name="Department" id="Department" class="select2 form-control" data-init-plugin="select2">
                                        <option value="" >-- Department --</option>
                                        @if(isset($departments) && count($departments) > 0)
                                            @foreach($departments as $department)
                                                <option value="{{$department['id']}}" >{{$department['name']}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-2">
                                    <button class="btn btn-warning btn-block btn-medium" type="submit" ><i class="fa fa-filter"></i> &nbsp;Filter </button>
                                </div>
                                @endif
                                <h4> &nbsp;</h4>
                            </form>

                        </div>

                        <div class="grid-body ">
                            <div class="row"></div>
                            <div id="map" style="width:100%;height:450px; "></div>
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
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXBx8qVdzwEBBh5Lx7WGKtwbGEQ9vk65U&callback=myMap">
    </script>
    <script>
        $(document).ready(function() {

            <?php
                if(isset($_GET['Department']) && $_GET['Department'] != ""){ ?>
                    $('#Department').select2().select2('val','{{$_GET['Department']}}');
                <? }
            ?>

            $("#search_form").submit(function(event) {
                event.preventDefault();

                var from_date  = $('#FromDate').val();
                var to_date    = $('#ToDate').val();
                var department = $('#Department').val();

                if(from_date === ""){
                    toastr.error("<b>Error:</b>  Please Select <b>Start Date</b>");
                }
                else if(to_date === ""){
                    toastr.error("<b>Error:</b> Please Select <b>End Date</b>");
                }
                else {
                   window.location.href = "/reports/map?FromDate="+ from_date +"&ToDate="+to_date +"&Department="+ department;
                }

            });
        });
    </script>
    @if(isset($record) && count($record) > 0 ){
        <script>
            function myMap() {
                var coordenates = {lat:{{$record['latitude']}}, lng: {{$record['longitude']}}};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 7,
                    center: coordenates
                });

                var contentString = '<b>Name: </b>{{$record['user']['name']}}'+
                    '<br><b>Employee Code: </b>{{$record['user']['employee_code']}}'+
                '<br><b>Department: </b>{{$record['user']['department']['name']}}' +
                '<br><b>Job Title: </b>{{$record['user']['job_title']}}' +
                '<br><b>Date: </b>{{$record['date']}}'+
                '<br><b>Time: </b>{{$record['time']}}'+
                '<br><b>Status: </b>{{$record['status']}}'+
                '<br><b>Device: </b>{{$record['device']['name']}}';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });
                var marker = new google.maps.Marker({
                    position: coordenates ,
                    map: map,
                    title: 'Map'
                });
                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });

            }
        </script>
    @elseif(isset($records) && count($records) > 0){
        <script>
            function myMap() {
                var coordenates = {lat: {{$records[0]['latitude']}} , lng: {{$records[0]['longitude']}} };
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 4,
                    center: coordenates
                });

                @foreach($records as $item){

                    var contentString{{$item['id']}} = '<b>Name: </b>{{$item['user']['name']}}'+
                        '<br><b>Employee Code: </b>{{$item['user']['employee_code']}}'+
                        '<br><b>Department: </b>{{$item['user']['department']['name']}}' +
                        '<br><b>Job Title: </b>{{$item['user']['job_title']}}' +
                        '<br><b>Date: </b>{{$item['date']}}'+
                        '<br><b>Time: </b>{{$item['time']}}'+
                        '<br><b>Status: </b>{{$item['status']}}'+
                        '<br><b>Device: </b>{{$item['device']['name']}}';

                    var infowindow{{$item['id']}} = new google.maps.InfoWindow({
                        content: contentString{{$item['id']}}
                    });
                    var marker{{$item['id']}} = new google.maps.Marker({
                        position: {lat: {{$item['latitude']}}, lng: {{$item['longitude']}} },
                        map: map,
                        title: 'Map'
                    });
                    marker{{$item['id']}}.addListener('click', function () {
                        infowindow{{$item['id']}}.open(map, marker{{$item['id']}});
                    });
                }
                @endforeach
            }
        </script>
    }
    @else{
        <script>
            function myMap() {
                var coordenates = {lat:-25.758038, lng: 28.205585};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 12,
                    center: coordenates
                });

                var contentString = '';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });
            }
        </script>
    }
    @endif
@endsection