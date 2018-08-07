@extends('layouts.default')

@section('title', 'Admin')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li>Admin</li>
                <li><a href="#" class="active">Manual Clock</a> </li>
            </ul>
            <div class="page-title">
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4><b>Clocking Form</b></h4>
                        </div>
                        <div class="grid-body ">

                            <form class="form-no-horizontal-spacing" name="add_form" id="add_form" method="post" enctype="multipart/form-data">
                                <input class="form-control" id="Latitude"  name="Latitude"  type="hidden">
                                <input class="form-control" id="Longitude" name="Longitude" type="hidden">
                                <input class="form-control" id="Username"  name="Username"  type="hidden" value="{{isset($_SESSION['GANIZANI-EMPLG-EMAIL']) ? $_SESSION['GANIZANI-EMPLG-EMAIL'] : ""}}">

                                <div class="row ">
                                    <div class="col-md-6">
                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="Status">Clocking Status <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="Status" id="Status" class="select2 form-control" data-init-plugin="select2">
                                                        <option value="" >-- Status --</option>
                                                        <option value="IN" >IN</option>
                                                        <option value="OUT">OUT</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="Password">Password <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input class="form-control" id="Password" name="Password" type="password" placeholder="Password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <span class="txt-red">* Required Fields</span>
                                </div>
                                <div class="form-actions">
                                    <div class="pull-left">
                                        <div id="Results"></div>
                                    </div>
                                    <div class="pull-right">
                                        <button class="btn btn-warning btn-cons btn-medium" type="submit"><i class="fa fa-check"></i> &nbsp;Submit</button>
                                        <button id="btnClear" class="btn btn-default btn-cons btn-medium" ><i class="fa fa-retweet"></i> &nbsp;Clear</button>
                                        <button class="btn btn-white btn-cons btn-medium" onclick="window.history.back();return false;">Back</button>
                                    </div>
                                </div>
                            </form>
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
        $("#btnClear").click(function () {

            $("#add_form")[0].reset();

            return false; // prevent submitting
        });

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

        $("#add_form").submit(function(event){
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

        $('#add_form').validate({
            errorElement: 'span',
            errorClass: 'error',
            focusInvalid: false,
            ignore: "",
            rules: {
                Status: { required: true },
                Username: { required: true },
                Password: { required: true }
            },

            invalidHandler: function (event, validator) {
                //display error alert on form submit
            },

            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-with-icon').children('i');
                var parent = $(element).parent('.input-with-icon');
                icon.removeClass('fa fa-check').addClass('fa fa-exclamation');
                parent.removeClass('success-control').addClass('error-control');
            },

            highlight: function (element) { // hightlight error inputs
                var parent = $(element).parent();
                parent.removeClass('success-control').addClass('error-control');
            },

            unhighlight: function (element) { // revert the change done by hightlight

            },

            success: function (label, element) {
                var icon = $(element).parent('.input-with-icon').children('i');
                var parent = $(element).parent('.input-with-icon');
                icon.removeClass("fa fa-exclamation").addClass('fa fa-check');
                parent.removeClass('error-control').addClass('success-control');
            },

            submitHandler: function (form, event) {

            }

        });
    </script>
@endsection