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

                                    </select>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-2">
                                    <button class="btn btn-warning btn-block btn-medium" type="submit" ><i class="fa fa-filter"></i> &nbsp;Filter </button>
                                </div>

                                <p> &nbsp;</p>
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
                if(isset($_GET['Company']) && $_GET['Company'] != ""){ ?>
                    $('#Company').select2().select2('val','{{$_GET['Company']}}');
                <? }
                if(isset($_GET['Site']) && $_GET['Site'] != ""){ ?>
                    $('#Site').select2().select2('val','{{$_GET['Site']}}');
                <? }
            ?>
            $('.datepicker').datepicker({
                format: "yyyy-mm-dd",
                startView: 0,
                autoClose: true,
                todayHighlight: true
            });

            $("#search_form").submit(function(event) {
                event.preventDefault();

                var from_date = $('#FromDate').val();
                var to_date   = $('#ToDate').val();
                var company   = $('#Company').val();
                var site      = $('#Site').val();

                if(from_date === ""){
                    toastr.error("<b>Error:</b>  Please Select <b>Start Date</b>");
                }
                else if(to_date === ""){
                    toastr.error("<b>Error:</b> Please Select <b>End Date</b>");
                }
                else {
                   window.location.href = "/reports/map?FromDate="+ from_date +"&ToDate="+to_date +"&Company="+ company+"&Site=" + site;
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

                var contentString = '<b>Name: </b>{{$record['learner']['name']}}'+
                    '<br><b>ID: </b>{{$record['learner']['id_number']}}'+
                '<br><b>Company: </b>{{$record['learner']['site']['company']['name']}}' +
                '<br><b>Site: </b>{{$record['learner']['site']['name']}}' +
                '<br><b>Intervention: </b>{{$record['learner']['intervention']}}'+
                '<br><b>Date: </b>{{$record['date']}}'+
                '<br><b>Time: </b>{{$record['time']}}'+
                '<br><b>Status: </b>{{$record['status']}}'+
                '<br><b>Device: </b>{{$record['device']['device_name']}}';

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
                    var contentString{{$item['id']}} = '<b>Name: </b>{{$item['learner']['name']}}' +
                        '<br><b>ID: </b>{{$item['learner']['id_number']}}' +
                        '<br><b>Company: </b>{{$item['learner']['site']['company']['name']}}' +
                        '<br><b>Site: </b>{{$item['learner']['site']['name']}}' +
                        '<br><b>Intervention: </b>{{$item['learner']['intervention']}}' +
                        '<br><b>Date: </b>{{$item['date']}}' +
                        '<br><b>Time: </b>{{$item['time']}}' +
                        '<br><b>Status: </b>{{$item['status']}}'+
                        '<br><b>Device: </b>{{$item['device']['device_name']}}';

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