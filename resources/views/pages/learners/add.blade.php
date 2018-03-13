@extends('layouts.default')

@section('title', 'Learners')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li><p>YOUR ARE HERE:</p></li>
                <li>Learners</li>
                <li><a href="#" class="active">Add</a> </li>
            </ul>
            <div class="page-title">
                <i class="material-icons">supervisor_account</i><h3>Learners</h3>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4><b>Learner Information</b></h4>
                        </div>
                        <div class="grid-body ">
                            <form class="form-no-horizontal-spacing" id="add_form" >
                                <div class="row column-seperation">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="LearnerTitle">Title <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="LearnerTitle" id="LearnerTitle" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Title --</option>
                                                        <option value="Mr">Mr</option>
                                                        <option value="Mrs">Mrs</option>
                                                        <option value="Miss">Miss</option>
                                                        <option value="Dr">Dr</option>
                                                        <option value="Prof">Prof</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="LearnerGender">Gender <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="LearnerGender" id="LearnerGender" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Gender --</option>
                                                        <option value="MALE">Male</option>
                                                        <option value="FEMALE">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="LearnerFirstName">First Name <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="LearnerFirstName" id="LearnerFirstName" type="text" class="form-control" placeholder="First Name">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="LearnerLastName">Last Name <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="LearnerLastName" id="LearnerLastName" type="text" class="form-control" placeholder="Last Name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="LearnerIdNumber">ID Number<span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="LearnerIdNumber" id="LearnerIdNumber" type="number" class="form-control" placeholder="ID Number">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="LearnerCardNumber">Card Number <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="LearnerCardNumber" id="LearnerCardNumber" type="number" class="form-control" placeholder="Card Number">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="LearnerPhoneNumber">Phone Number <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="LearnerPhoneNumber" id="LearnerPhoneNumber" type="number" class="form-control" placeholder="Phone Number, e.g: 074 XXX XXXX">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="LearnerEmail">Email <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="LearnerEmail" id="LearnerEmail" type="email" class="form-control" placeholder="Email, e.g: user@example.com">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="LearnerStatus">Status <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="LearnerStatus" id="LearnerStatus" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Status --</option>
                                                        <option value="ACTIVE">Active</option>
                                                        <option value="DEACTIVATED">Deactivated</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="LearnerStipend">Stipend Amount <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="LearnerStipend" id="LearnerStipend" type="number" class="form-control" placeholder="Stipend Amount">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="LearnerQualification">Qualifications <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="LearnerQualification" id="LearnerQualification" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Qualifications --</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="LearnerIntervention">Intervention <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="LearnerIntervention" id="LearnerIntervention" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Intervention --</option>
                                                        @foreach ($interventions as $intervention)
                                                            <option value="{{$intervention['name']}}">{{$intervention['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="LearnerCompany">Company <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="LearnerCompany" id="LearnerCompany" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Company --</option>
                                                        @foreach ($companies as $company)
                                                            <option value="{{$company['id']}}">{{$company['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="LearnerSite">Site <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="LearnerSite" id="LearnerSite" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Site --</option>
                                                        @foreach ($sites as $site)
                                                            <option value="{{$site['id']}}">{{$site['name']}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="LearnerStartDate">Contract Start Date <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <div class="input-append info col-lg-10 no-padding">
                                                        <input name="LearnerStartDate" id="LearnerStartDate" type="text" class="form-control datepicker" placeholder="Contract Start Date">
                                                        <span class="add-on"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="LearnerEndDate">Contract End Date <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <div class="input-append info col-lg-10 no-padding">
                                                        <input name="LearnerEndDate" id="LearnerEndDate" type="text" class="form-control datepicker" placeholder="Contract End Date">
                                                        <span class="add-on"><i class="fa fa-calendar"></i></span>
                                                    </div>
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
        $(document).ready(function() {
            $('#LearnerStatus').select2({minimumResultsForSearch: -1});
            $('#LearnerTitle').select2({minimumResultsForSearch: -1});
            $('#LearnerGender').select2({minimumResultsForSearch: -1});

            $('.datepicker').datepicker({
                format: "yyyy-mm-dd",
                startView: 1,
                autoclose: true,
                todayHighlight: true
            });
        });



        $("#add_form").submit(function(event){

            event.preventDefault();
            var_form_data = $(this).serialize();

            $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');

            $.ajax({
                type:"POST",
                url:"/api/learners/create",
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

        $("#add_form").validate({
            errorElement: 'span',
            errorClass: 'error',
            focusInvalid: false,
            ignore: "",
            rules: {
                LearnerStatus:            { required: true },
                LearnerTitle:             { required: true },
                LearnerGender:            { required: true },
                LearnerFirstName:         { required: true },
                LearnerLastName:          { required: true },
                LearnerIntervention:      { required: true },
                LearnerCompany:           { required: true },
                LearnerSite:              { required: true },
                LearnerStipend:           { required: true },
                LearnerEmail:             { email: true },
                LearnerCardNumber:        {
                    required: true,
                    rangelength:[16,16]
                },
                LearnerPhoneNumber:       {
                    required: true,
                    rangelength:[10,10]
                },
                LearnerIdNumber:          {
                    required: true,
                    rangelength:[13,13]
                },
                LearnerStartDate:         {
                    required: true,
                    date: true
                },
                LearnerEndDate:           {
                    required: true,
                    date: true
                }
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