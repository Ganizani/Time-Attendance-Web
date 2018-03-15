@extends('layouts.default')

@section('title', 'Leaves')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li>Leaves</li>
                <li><a href="#" class="active">Add</a> </li>
            </ul>
            <div class="page-title">
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4><b>Leave Form</b></h4>
                        </div>
                        <div class="grid-body ">
                            <span class="txt-red">* Required Fields</span>
                            <form class="form-no-horizontal-spacing" id="add_form" >
                                <div class="row ">
                                    <div class="col-md-6">
                                        <h5 class="info-section"><b>Employee Information</b></h5>
                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="LeaveIdNumber">Employee Applying for Leave <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="LeaveIdNumber" id="LeaveIdNumber" class="select2 form-control" data-init-plugin="select2">
                                                        <option value="">-- Employee --</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="info-section"><b>Contact Details While On Leave</b></h5>
                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="LeaveIdNumber">Address  <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="LeaveFromDate" id="LeaveFromDate" type="text" class="form-control" placeholder="Address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="LeaveIdNumber">Email  <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="LeaveFromDate" id="LeaveFromDate" type="text" class="form-control" placeholder="Email">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="LeaveIdNumber">Tel.  <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="LeaveFromDate" id="LeaveFromDate" type="text" class="form-control" placeholder="Phone Number">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="LeaveIdNumber">Notes  <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <textarea name="LeaveFromDate" id="LeaveFromDate"  rows="4" class="form-control" placeholder="Notes ... "></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <h5 class="info-section"><b>Leave Details</b></h5>
                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="LeaveReason">Type of Leave <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="LeaveReason" id="LeaveReason" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Type of Leave --</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="LeaveFromDate">Last Date of Working <span class="txt-red">*</span></label>
                                                <div class="input-append warning col-md-11 no-padding">
                                                    <input name="LeaveFromDate" id="LeaveFromDate" type="text" class="form-control datepicker" placeholder="From Date">
                                                    <span class="add-on"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="LeaveFromDate">Start Date <span class="txt-red">*</span></label>
                                                <div class="input-append warning col-md-11 no-padding">
                                                    <input name="LeaveFromDate" id="LeaveFromDate" type="text" class="form-control datepicker" placeholder="From Date">
                                                    <span class="add-on"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="LeaveToDate">Last Date <span class="txt-red">*</span></label>
                                                <div class="input-append warning col-md-11 no-padding">
                                                    <input name="LeaveToDate" id="LeaveToDate" type="text" class="form-control datepicker" placeholder="To Date">
                                                    <span class="add-on"><i class="fa fa-calendar"></i></span>
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
                                        <button class="btn btn-warning btn-cons" type="submit"><i class="fa fa-check"></i> &nbsp;Create</button>
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

        $("#add_form").submit(function(event){

            event.preventDefault();
            var_form_data = $(this).serialize();

            $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');

            $.ajax({
                type:"POST",
                url:"/api/leaves/create",
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
                LeaveIdNumber:  { required: true },
                LeaveReason:    { required: true },
                LeaveFromDate:  { required: true },
                LeaveToDate:    { required: true }
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