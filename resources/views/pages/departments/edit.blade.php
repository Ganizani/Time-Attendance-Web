@extends('layouts.default')

@section('title', 'Companies')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li><p>YOU ARE HERE:</p></li>
                <li>Companies</li>
                <li><a href="#" class="active">Edit</a> </li>
            </ul>
            <div class="page-title">
                <i class="material-icons">account_balance</i><h3>Companies</h3>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4><b>Company Information</b></h4>
                        </div>
                        <div class="grid-body ">
                            <form class="form-no-horizontal-spacing" id="edit_form" >
                                <input name="CompanyId" id="CompanyId" type="hidden" class="form-control" value="{{$company['id']}}" >
                                <div class="row column-seperation">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="CompanyName">Company Name <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="CompanyName" id="CompanyName" type="text" class="form-control" placeholder="Company Name" value="{{$company['name']}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="CompanyPhoneNumber">Phone Number <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="CompanyPhoneNumber" id="CompanyPhoneNumber" type="number" class="form-control" placeholder="Phone Number" value="{{$company['phone_number']}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="CompanyWebsite">Website <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="CompanyWebsite" id="CompanyWebsite" type="text" class="form-control" placeholder="Website" value="{{$company['website']}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="CompanyContactPerson">Contact Person <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="CompanyContactPerson" id="CompanyContactPerson" type="text" class="form-control" placeholder="Contact Person" value="{{$company['contact_person']}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class ="row">
                                            <div class="form-group col-md-12">
                                                <label for="CompanyEmail"> Email<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="CompanyEmail" id="CompanyEmail" type="email" class="form-control" placeholder="Email Address, e.g: email@gmail.com" value="{{$company['email']}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class ="row">
                                            <div class="form-group col-md-12">
                                                <label for="CompanyAddress">Address <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="CompanyAddress" id="CompanyAddress" type="text" class="form-control" placeholder="Address" value="{{$company['address']}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="CompanyLoginId">Login Id <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="CompanyLoginId" id="CompanyLoginId" type="text" class="form-control" placeholder="Login Id" value="{{$company['login_id']}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="CompanyLoginPassword">Login Password<span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="CompanyLoginPassword" id="CompanyLoginPassword" type="text" class="form-control" placeholder="Password" value="{{$company['password']}}">
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

        $("#edit_form").submit(function(event){
            event.preventDefault();
            var id = $('#CompanyId').val();
            var_form_data = $(this).serialize();
            $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');
            $.ajax({
                type:"PUT",
                url:"/api/departments/update/" + id,
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
                CompanyId :             { required: true },
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