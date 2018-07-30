@extends('layouts.default')

@section('title', 'Users')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li>Users</li>
                <li>Accounts</li>
                <li><a href="#" class="active">Update Password</a> </li>
            </ul>
            <div class="page-title">
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4><b>Update Password Form</b></h4>
                        </div>
                        <div class="grid-body ">
                            <form class="form-no-horizontal-spacing" id="update_password_form" >
                                <input name="UserId" id="UserId" type="hidden" class="form-control" value="{{isset($user['id']) ? $user['id'] : "" }}">

                                <div class="row ">
                                    <div class="col-md-12">
                                        <span class="txt-red">* Required Fields</span>
                                    </div>
                                </div>
                                <br>
                                <div class="row ">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="UserPassword">Password <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserPassword" id="UserPassword" type="password" class="form-control" placeholder="Password" >
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="UserConfirmPassword">Confirm Password <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserConfirmPassword" id="UserConfirmPassword" type="password" class="form-control" placeholder="Confirm Password" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="pull-left">
                                        <div id="Results"></div>
                                    </div>
                                    <div class="pull-right">
                                        <button class="btn btn-warning btn-cons" type="submit"><i class="fa fa-check"></i> &nbsp;Update</button>
                                        <button class="btn btn-white btn-cons" onclick="window.history.back();return false;">Back</button>
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
        $("#update_password_form").submit(function(event){

            event.preventDefault();
            var form_data = $(this).serialize();
            var id = $('#UserId').val();

            $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');
            $.ajax({
                type:"POST",
                url:"/api/password/update/" + id,
                cache: false,
                data: form_data,
                success: function(response){
                    $("#Results").html(response);
                }
            });
        });

        //Iconic form validation sample
        $('.select2', "#update_password_form").change(function () {
            $('#update_password_form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });

        $("#update_password_form").validate({
            errorElement: 'span',
            errorClass: 'error',
            focusInvalid: false,
            ignore: "",
            rules: {
                UserId:       { required: true },
                UserPassword: { required: true },
                UserConfirmPassword: { required: true, equalTo: "#UserPassword"}
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