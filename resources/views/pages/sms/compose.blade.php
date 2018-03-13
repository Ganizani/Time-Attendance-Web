@extends('layouts.default')

@section('title', 'SMS')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li><p>YOUR ARE HERE:</p></li>
                <li>SMS</li>
                <li><a href="#" class="active">Compose</a> </li>
            </ul>
            <div class="page-title">
                <i class="material-icons">email</i><h3>SMS</h3>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4>&nbsp; <span class="semi-bold"></span></h4>
                        </div>
                        <div class="grid-body ">
                            <form id="add_form" class="form-no-horizontal-spacing"  action="#">
                                <div class="row column-seperation">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="">Send To Multiple Numbers</label>
                                                <span class="help">e.g. "0732957525" OR " 0732957525 <b>,</b> 0732957526 <b>,</b>  0732957527" To Send To Multiple SMS's</span>
                                                <div class="controls">
                                                    <textarea class="form-control" name="PhoneNumber" id="PhoneNumber"  placeholder="Phone Number..." rows="3" onkeypress="return isNumberKey(event)"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="form-label">=== OR ===</h4>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="LearnerPhoneNumber">Send To Single Learner</label>
                                                <div class="input-with-icon  right">
                                                    <select name="LearnerId" id="LearnerId"  class="select2 form-control"  data-init-plugin="select2" style="border: 1px solid #e5e9ec;" >
                                                        <option value="">Select Learner</option>
                                                            @foreach($learners as $learner)
                                                                <option value="{{$learner['id']}}">{{$learner['phone_number'].' - '.$learner['name']}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="form-label">=== OR ===</h4>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="LearnerCompany">Send To Learners In a Company</label>
                                                <div class="input-with-icon  right">
                                                    <select name="LearnerCompany" id="LearnerCompany"  class="select2 form-control"  data-init-plugin="select2" style="border: 1px solid #e5e9ec;" >
                                                        <option value="">Select Company</option>
                                                        @foreach($companies as $company)
                                                            <option value="{{$company['id']}}">{{$company['name'].' - '.$company['learner_count']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <h4 class="form-label">=== OR ===</h4>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="LearnerSite">Send To Learners In a Site</label>
                                                <div class="input-with-icon  right">
                                                    <select name="LearnerSite" id="LearnerSite"  class="select2 form-control"  data-init-plugin="select2" style="border: 1px solid #e5e9ec;" >
                                                        <option value="">Select Site</option>
                                                        @foreach($sites as $site)
                                                            <option value="{{$site['id']}}">{{$site['name'].' - '.$site['learner_count']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <br>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="SMSMessage">Message</label>
                                                <div class="input-with-icon  right">
                                                    <textarea class="form-control" name="SMSMessage" id="SMSMessage"  placeholder="Type Your Message Here ..." rows="10" onkeypress="return isNumberKey(event)"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="admin-bar" id="quick-access" style="margin-left: 17%; width:83%;">
                                    <div class="admin-bar-inner">
                                        <div class="pull-left">
                                            <div id="Results"></div>
                                        </div>
                                        <button class="btn btn-primary btn-cons" type="submit"><i class="fa fa-check"></i> &nbsp; SEND </button>
                                        <button id="" class="btn btn-white btn-cons" onclick="window.history.back();return false;">BACK</button>
                                    </div>
                                </div>
                                <br><br><br>
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
                url:"/api/sms/send",
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
                SMSMessage:          { required: true }
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

        $(document).ready(function() {
            $("#quick-access").css("bottom","0px");
        });

    </script>
@endsection