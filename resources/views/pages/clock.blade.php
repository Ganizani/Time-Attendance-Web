@extends('layouts.login')

@section('title', 'Clock')
@section('content')
    <div class="row login-container column-seperation">
        <div class="col-md-7" >
            <h2 class="txt-orange"> <b>Manual Clock</b></h2>
            <form class="login-form validate" id="clock-form"  name="clock-form">
                <input class="form-control" id="Latitude" name="Latitude" type="hidden">
                <input class="form-control" id="Longitude" name="Longitude" type="hidden">

                <div class="row" >
                    <div class="form-group col-md-12">
                        <div id="Results"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="form-label" for="Username">Username</label>
                        <input class="form-control" id="Username" name="Username" type="email" placeholder="Email: e.g: email@example.com" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="form-label" for="Password">Password</label> <span class="help"></span>
                        <input class="form-control" id="Password" name="Password" type="password" placeholder="Password" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="form-label" for="Status">Status</label> <span class="help"></span>
                        <select name="Status" id="Status" class="select2 form-control" data-init-plugin="select2" required>
                            <option value="" >-- Status --</option>
                            <option value="IN" >IN</option>
                            <option value="OUT">OUT</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <a href="/" class="btn btn-white btn-cons btn-block " type="submit">Back</a>
                    </div>
                    <div class="form-group col-md-5"></div>
                    <div class="form-group col-md-4">
                        <button class="btn btn-warning btn-cons btn-block" type="submit"> <i class="fa fa-check"></i> &nbsp; Register Clock</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
        <div id="footer">
            <div class="error-container">
                <div class="copyright error-number"> <a href="#" style="color: #dc9758;">{{env('COMPANY')}}</a> Copyright &copy; {{date('Y')}} - All Rights Reserved</div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @parent

    <script>
        function setPosition(position) {
            $("#Latitude").val(position.coords.latitude);
            $("#Longitude").val(position.coords.longitude);
        }

        function setToZero(position) {
            $("#Latitude").val(position);
            $("#Longitude").val(position);
        }

        $(document).ready(function() {
            $('#Status').select2({minimumResultsForSearch: -1});
            if (navigator.geolocation) navigator.geolocation.getCurrentPosition(setPosition);
            else setToZero(0);
        });

        $("#clock-form").submit(function(event){
            event.preventDefault();

            var data = $(this).serialize();

            $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');
            $.ajax({
                type:"POST",
                url:"/api/users/clock",
                cache: false,
                data: data,
                success: function(response){
                    $('#Results').html(response);
                }
            });

            /*if ( $("#Latitude").val() === "" || $("#Longitude").val() === "") {
                $('#Results').html("<div class='alert alert-info'><b><button class='close' data-dismiss='alert'></button>Info:</b> Waiting for Geo Coordinates data!, Please Try again in a few seconds.</div>");
                return false;
            }
            else {
                $('#Results').html('<img src=/>');
                $.ajax({
                    type:"POST",
                    url:"/api/users/clock",
                    cache: false,
                    data: data,
                    success: function(response){
                        $('#Results').html(response);
                    }
                });
            }*/
        });

    </script>
@endsection