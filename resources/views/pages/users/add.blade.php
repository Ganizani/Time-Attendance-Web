@extends('layouts.default')

@section('title', 'Users')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li><p>YOUR ARE HERE:</p></li>
                <li>Users</li>
                <li><a href="#" class="active">Add</a> </li>
            </ul>
            <div class="page-title">
                <i class="material-icons">person</i><h3>Users</h3>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4><b>User Information</b></h4>
                        </div>
                        <div class="grid-body ">
                            <form class="form-no-horizontal-spacing" id="add_form" >
                                <div class="row column-seperation">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="UserTitle">Title <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="UserTitle" id="UserTitle" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Title --</option>
                                                        <option value="Mrs">Mrs</option>
                                                        <option value="Mrs">Mrs</option>
                                                        <option value="Miss">Miss</option>
                                                        <option value="Dr">Dr</option>
                                                        <option value="Prof">Prof</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="UserGender">Gender <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="UserGender" id="UserGender" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Gender --</option>
                                                        <option value="MALE">Male</option>
                                                        <option value="FEMALE">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="UserFirstName">First Name <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserFirstName" id="UserFirstName" type="text" class="form-control" placeholder="First Name">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="UserFirstName">First Name <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserLastName" id="UserLastName" type="text" class="form-control" placeholder="Last Name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label for="UserType">User Type <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="UserType" id="UserType" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- User Type --</option>
                                                        <option value="ADMIN">System Admin</option>
                                                        <option value="MANAGER">Manager</option>
                                                        <option value="OPERATOR">Operator</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="UserStatus">Status <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="UserStatus" id="UserStatus" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Status --</option>
                                                        <option value="ACTIVE">Active</option>
                                                        <option value="DEACTIVATED">Deactivated</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="UserPhoneNumber">Phone Number <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserPhoneNumber" id="UserPhoneNumber" type="number" class="form-control" placeholder="Phone Number ">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="UserEmail">Email Address <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmail" id="UserEmail" type="email" class="form-control" placeholder="Email Address" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="UserPassword"> Password <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserPassword" id="UserPassword" type="password" class="form-control" placeholder="Password" >
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="UserConfirmPassword">Confirm Password<span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserConfirmPassword" id="UserConfirmPassword" type="password" class="form-control" placeholder="Confirm Password" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="UserProfilePicture"> Profile Picture</label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserProfilePicture" id="UserProfilePicture" type="file" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <span class="txt-red">* Required Fields</span>
                                    </div>
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
            $('#UserTitle').select2({minimumResultsForSearch: -1});
            $('#UserStatus').select2({minimumResultsForSearch: -1});
            $('#UserType').select2({minimumResultsForSearch: -1});
            $('#UserGender').select2({minimumResultsForSearch: -1});

        });



        $("#add_form").submit(function(event){

            event.preventDefault();
            var_form_data = $(this).serialize();

            $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');

            $.ajax({
                type:"POST",
                url:"/api/users/create",
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
                UserTitle:              { required: true },
                UserStatus:             { required: true },
                UserType:               { required: true },
                UserFirstName:          { required: true },
                UserLastName:           { required: true },
                UserPassword:           {
                    required: true,
                    minlength:8
                },
                UserConfirmPassword:    { equalTo: "#UserPassword" },
                UserPhoneNumber:        { required: true },
                UserGender:             { required: true },
                UserEmail:              {
                    required: true,
                    email: true
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