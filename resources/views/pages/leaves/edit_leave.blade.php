@extends('layouts.default')

@section('title', 'Leaves')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li><p>YOUR ARE HERE:</p></li>
                <li>Leaves</li>
                <li><a href="#" class="active">Edit</a> </li>
            </ul>
            <div class="page-title">
                <i class="material-icons">local_hospital</i><h3>Leaves</h3>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4><b>Leave Information</b></h4>
                        </div>
                        <div class="grid-body ">
                            <form class="form-no-horizontal-spacing" id="edit_form" >
                                <input name="LeaveId" id="LeaveId" type="hidden" class="form-control" value="{{$leave['id']}}">
                                <div class="row column-seperation">
                                    <div class="col-md-6">
                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="LeaveIdNumber">Learner <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="LeaveIdNumber" id="LeaveIdNumber" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Learner --</option>
                                                        @foreach($learners as $learner)
                                                            <option value="{{$learner['id_number']}}">{{$learner['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="LeaveReason">Reason <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="LeaveReason" id="LeaveReason" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Reason --</option>
                                                        @foreach($leave_types as $leave)
                                                            <option value="{{$leave['id']}}">{{$leave['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="LeaveFromDate">From Date <span class="txt-red">*</span></label>
                                                <div class="input-append info col-lg-10 no-padding">
                                                    <input name="LeaveFromDate" id="LeaveFromDate" type="text" class="form-control datepicker" placeholder="From Date" value="{{$leave['from_date']}}">
                                                    <span class="add-on"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="LeaveToDate">To Date <span class="txt-red">*</span></label>
                                                <div class="input-append info col-lg-10 no-padding">
                                                    <input name="LeaveToDate" id="LeaveToDate" type="text" class="form-control datepicker" placeholder="To Date" value="{{$leave['from_date']}}">
                                                    <span class="add-on"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="LeaveComment">Comments <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <textarea name="LeaveComment" id="LeaveComment" rows="4" class="form-control" placeholder="Comments ...">{{$leave['comment']}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="LeaveAttachment">Attachment <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="LeaveAttachment" id="LeaveAttachment" type="file" class="form-control">
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
                                        <button class="btn btn-primary btn-cons" type="submit"><i class="fa fa-check"></i> &nbsp;CREATE</button>
                                        <button class="btn btn-white btn-cons" onclick="window.history.back();return false;">BACK</button>
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

        $("#edit_form").submit(function(event){
            event.preventDefault();
            var id = $('#LeaveId').val();
            var_form_data = $(this).serialize();

            $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');

            $.ajax({
                type:"POST",
                url:"/api/leaves/update/" + id,
                cache: false,
                data: var_form_data,
                success: function(response){
                    $("#Results").html(response);
                }
            });

        });

        //Iconic form validation sample
        $('.select2', "#edit_form").change(function () {
            $('#edit_form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
        });

        $('#edit_form').validate({
            errorElement: 'span',
            errorClass: 'error',
            focusInvalid: false,
            ignore: "",
            rules: {
                LeaveId:        { required: true },
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