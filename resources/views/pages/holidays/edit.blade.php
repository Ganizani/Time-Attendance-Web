@extends('layouts.default')

@section('title', 'Holidays')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li><p>YOUR ARE HERE:</p></li>
                <li>Holidays</li>
                <li><a href="#" class="active">Add</a> </li>
            </ul>
            <div class="page-title">
                <i class="material-icons">event</i><h3>Holidays</h3>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4><b>Holiday Information</b></h4>
                        </div>
                        <div class="grid-body ">
                            <form class="form-no-horizontal-spacing" id="edit_form" >
                                <input name="HolidayId" id="HolidayId" type="hidden" class="form-control" value="{{$holiday['id']}}">
                                <div class="row column-seperation">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="HolidayName">Holiday Name<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="HolidayName" id="HolidayName" type="text" class="form-control" placeholder="Holiday Name" value="{{$holiday['name']}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="HolidayDate">Holiday Date <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <div class="input-append info col-lg-10 no-padding">
                                                        <input name="HolidayDate" id="HolidayDate" type="text" class="form-control datepicker" placeholder="Holiday Date, e.g: YYYY-MM-DD" value="{{$holiday['date']}}">
                                                        <span class="add-on"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="HolidayCompany">Company <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="HolidayCompany" id="HolidayCompany" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Company --</option>
                                                        @foreach ($companies as $company)
                                                            <option value="{{$company['id']}}">{{$company['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="HolidaySite">Site <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="HolidaySite" id="HolidaySite" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Site --</option>
                                                        @foreach ($sites as $site)
                                                            <option value="{{$site['id']}}">{{$site['name']}}</option>
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
                                                    <textarea name="HolidayDescription" id="HolidayDescription"  rows="4" class="form-control" placeholder="Description ...">{{$holiday['description']}}</textarea>
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
                                        <button class="btn btn-primary btn-cons" type="submit"><i class="fa fa-check"></i> &nbsp;UPDATE</button>
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
        $(document).ready(function() {
            $('#HolidayCompany').select2().select2('val', '{{$holiday['company']['id']}}');
            $('#HolidaySite').select2().select2('val', '{{$holiday['site']['id']}}');

            $('.datepicker').datepicker({
                format: "yyyy-mm-dd",
                startView: 1,
                autoclose: true,
                todayHighlight: true
            });
        });

        $("#edit_form").submit(function(event){
            var id = $('#HolidayId').val();
            event.preventDefault();
            var_form_data = $(this).serialize();

            $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');

            $.ajax({
                type:"PUT",
                url:"/api/holidays/update/" + id,
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
                HolidayId:        { required: true },
                HolidayDate:      { required: true },
                HolidayCompany:   { required: true },
                HolidaySite:      { required: true }
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