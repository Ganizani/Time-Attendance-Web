@extends('layouts.default')

@section('title', 'Holidays')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li>Holidays</li>
                <li><a href="#" class="active">Edit</a> </li>
            </ul>
            <div class="page-title">
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4><b>Holiday Information</b></h4>
                        </div>
                        <div class="grid-body ">
                            <form class="form-no-horizontal-spacing" id="edit_form" >
                                <input name="HolidayId" id="HolidayId" type="hidden" class="form-control" value="{{isset($holiday['id']) ? $holiday['id'] : ""}}">
                                <div class="row column-seperation">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="HolidayName">Name<span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="HolidayName" id="HolidayName" type="text" class="form-control" placeholder="Holiday Name" value="{{isset($holiday['name']) ? $holiday['name'] : ""}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="HolidayDate"> Date <span class="txt-red">*</span></label>
                                                <div class="input-append warning col-lg-10 no-padding">
                                                    <input name="HolidayDate" id="HolidayDate" type="text" class="form-control datepicker" placeholder="Holiday Date, e.g: YYYY-MM-DD" value="{{isset($holiday['date']) ? $holiday['date'] : ""}}">
                                                    <span class="add-on"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="HolidayDepartment">Department <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="HolidayDepartment" id="HolidayDepartment" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Department --</option>
                                                        @foreach ($departments as $department)
                                                            <option value="{{$department['id']}}">{{$department['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="HolidaySite">Description <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <textarea name="HolidayDescription" id="HolidayDescription"  rows="4" class="form-control" placeholder="Description ...">{{isset($holiday['description']) ? $holiday['description'] : ""}}</textarea>
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
                                        <button id="btnClear" class="btn btn-default btn-cons btn-medium" type="submit"><i class="fa fa-retweet"></i> &nbsp;Clear</button>
                                        <button class="btn btn-white btn-cons btn-medium" onclick="window.history.back();return false;">BACK</button>
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
            $('#HolidayDepartment').select2().select2('val', '{{isset($holiday['department']['id']) ? $holiday['department']['id'] : ""}}');

            $('.datepicker').datepicker({
                format: "yyyy-mm-dd",
                startView: 1,
                autoclose: true,
                todayHighlight: true
            });
        });

        $("#edit_form").submit(function(event){
            event.preventDefault();
            var id = $('#HolidayId').val();
            var form_data = $(this).serialize();

            $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');

            $.ajax({
                type:"PUT",
                url:"/api/holidays/" + id,
                cache: false,
                data: form_data,
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
                HolidayId:        { required: true },
                HolidayDate:      { required: true },
                HolidayDepartmentId:   { required: true },
                HolidayName:   { required: true }
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