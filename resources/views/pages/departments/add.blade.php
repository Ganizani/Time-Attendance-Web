@extends('layouts.default')

@section('title', 'Companies')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li>Departments</li>
                <li><a href="#" class="active">Add</a> </li>
            </ul>
            <div class="page-title">
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>&nbsp;</h4>
                        </div>
                        <div class="grid-body ">
                            <form class="form-no-horizontal-spacing" id="add_form" >
                                <span class="txt-red">* Required Fields</span><br>
                                <div class="row">
                                    <h4 class="info-section"><b>Department Information</b></h4>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="CompanyName">Company Name <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="CompanyName" id="CompanyName" type="text" class="form-control" placeholder="Company Name" >
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="CompanyPhoneNumber">Phone Number <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="CompanyPhoneNumber" id="CompanyPhoneNumber" type="number" class="form-control" placeholder="Phone Number" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="CompanyWebsite">Website <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="CompanyWebsite" id="CompanyWebsite" type="text" class="form-control" placeholder="Website" >
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="CompanyContactPerson">Contact Person Name <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="CompanyContactPerson" id="CompanyContactPerson" type="text" class="form-control" placeholder="Contact Person Name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class ="row">
                                            <div class="form-group col-md-12">
                                                <label for="CompanyEmail">Email <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="CompanyEmail" id="CompanyEmail" type="email" class="form-control" placeholder="Email Address, e.g: email@gmail.com" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class ="row">
                                            <div class="form-group col-md-12">
                                                <label for="CompanyAddress">Address <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="CompanyAddress" id="CompanyAddress" type="text" class="form-control" placeholder="Address" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="CompanyLoginId">Login Id <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="CompanyLoginId" id="CompanyLoginId" type="text" class="form-control" placeholder="Login Id" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="CompanyLoginPassword">Login Password <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="CompanyLoginPassword" id="CompanyLoginPassword" type="text" class="form-control" placeholder="Password" >
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
                                        <button class="btn btn-warning btn-cons btn-medium" type="submit"><i class="fa fa-check"></i> &nbsp; Create</button>
                                        <button class="btn btn-white btn-cons  btn-medium" onclick="window.history.back();return false;">Back</button>
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
        $(document).ready(function() {


        });

        $("#add_form").submit(function(event){

            event.preventDefault();
            var_form_data = $(this).serialize();

            $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');

            $.ajax({
                type:"POST",
                url:"/api/departments/create",
                cache: false,
                data: var_form_data,
                success: function(response){
                    $("#Results").html(response);
                }
            });

        });

        //Iconic form validation sample
        $('.select2', "#add_form").change(function () {
            $('#add_form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });

        $('#add_form').validate({
            errorElement: 'span',
            errorClass: 'error',
            focusInvalid: false,
            ignore: "",
            rules: {
                CompanyPhoneNumber :    { required: true },
                CompanyContactPerson:   { required: true },
                CompanyEmail:           { required: true },
                CompanyName:            { required: true },
                CompanyLoginId:         { required: true },
                CompanyLoginPassword:   { required: true }
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