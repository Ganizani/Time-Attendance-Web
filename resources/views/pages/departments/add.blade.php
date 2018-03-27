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
                        <div class="grid-body ">
                            <form class="form-no-horizontal-spacing" id="add_form" >
                                <div class="row">
                                    <h4 class="info-section"><b>Department Information</b></h4>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="DepartmentName"> Name <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="DepartmentName" id="DepartmentName" type="text" class="form-control" placeholder="Department Name" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="DepartmentPhoneNumber">Phone Number <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="DepartmentPhoneNumber" id="DepartmentPhoneNumber" type="number" class="form-control" placeholder="Department Phone Number" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="DepartmentDescription">Description <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <textarea name="DepartmentDescription" id="DepartmentDescription"  placeholder="Department Description ... " class="form-control"  rows="5"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <span class="txt-red">* Required Fields</span><br>
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
                DepartmentName :    { required: true },
                DepartmentPhoneNumber:   { required: true }
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