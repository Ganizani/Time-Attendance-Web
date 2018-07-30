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

                            <form class="form-no-horizontal-spacing" name="add_form" id="add_form" method="post" action="/api/leaves" enctype="multipart/form-data">
                                <div class="row ">
                                    <div class="col-md-6">
                                        <h5 class="info-section"><b>Employee Information</b></h5>
                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="LeaveUser">Employee Applying for Leave <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="LeaveUser" id="LeaveUser" class="select2 form-control" data-init-plugin="select2">
                                                        <option value="">-- Employee --</option>
                                                        @if(isset($users) && count($users))
                                                            @foreach($users as $user)
                                                                <option value="{{$user['id']}}">{{$user['name']}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="info-section"><b>Contact Details While On Leave</b></h5>
                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="LeaveAddress">Address  <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="LeaveAddress" id="LeaveAddress" type="text" class="form-control" placeholder="Address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="LeaveIdNumber">Email  <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="LeaveEmail" id="LeaveEmail" type="email" class="form-control" placeholder="Email">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="LeavePhoneNumber">Tel.  <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="LeavePhoneNumber" id="LeavePhoneNumber" type="text" class="form-control" placeholder="Phone Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="LeaveAttachment">Attachment  <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="LeaveAttachment" id="LeaveAttachment" type="file" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <h5 class="info-section"><b>Leave Details</b></h5>
                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="LeaveType">Type of Leave <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="LeaveType" id="LeaveType" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Type of Leave --</option>
                                                        @if(isset($leave_types) && count($leave_types))
                                                            @foreach($leave_types as $leave_type)
                                                                <option value="{{$leave_type['id']}}">{{$leave_type['name']}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="LeaveTypeSpecific">Specify Other <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right">
                                                    <input name="LeaveTypeSpecific" id="LeaveTypeSpecific" type="text" class="form-control" placeholder="Specify Other" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="LeaveFromDate">Start Date <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right">
                                                    <div class="input-append warning col-md-11 no-padding">
                                                        <input name="LeaveFromDate" id="LeaveFromDate" type="text" class="form-control datepicker" placeholder="From Date">
                                                        <span class="add-on"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="LeaveToDate">Last Date <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right">
                                                    <div class="input-append warning col-md-11 no-padding">
                                                        <input name="LeaveToDate" id="LeaveToDate" type="text" class="form-control datepicker" placeholder="To Date">
                                                        <span class="add-on"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="LeaveLastWorkingDay">Last Date of Working <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right">
                                                    <div class="input-append warning col-md-11 no-padding">
                                                        <input name="LeaveLastWorkingDay" id="LeaveLastWorkingDay" type="text" class="form-control datepicker" placeholder="From Date">
                                                        <span class="add-on"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="LeaveNotes">Notes  <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <textarea name="LeaveNotes" id="LeaveNotes"  rows="4" class="form-control" placeholder="Notes ... "></textarea>
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
                                        <button class="btn btn-warning btn-cons btn-medium" type="submit"><i class="fa fa-check"></i> &nbsp;Create</button>
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

        $( "#LeaveType" ).change( function  (event) {
            event.preventDefault();
            //var id = $(this).find("option:selected").text();
            var id = $(this).val();
            if(id === '6') $("#LeaveTypeSpecific").removeAttr("disabled");
            else $('#LeaveTypeSpecific').prop("disabled", true);
        });

        $("#add_form").submit(function() {
            $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');

            $(this).ajaxSubmit({target:'#Results'});
            // always return false to prevent standard browser submit and page navigation
            return false;
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
                LeaveUser:             { required: true },
                LeaveType:             { required: true },
                LeaveAddress:          { required: true },
                LeaveLastWorkingDay:   { required: true },
                LeaveFromDate:         { required: true },
                LeaveToDate:           { required: true }
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