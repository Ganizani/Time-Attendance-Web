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
                            <h4><b>New User Form</b></h4>
                        </div>
                        <div class="grid-body ">
                            <form class="form-no-horizontal-spacing" id="add_form" >
                                <div class="row ">
                                    <div class="col-md-12">
                                        <span class="txt-red">* Required Fields</span>
                                    </div>
                                    <div class="col-md-12">
                                        <h4 class="info-section"><b>Personal Information</b></h4><br>
                                        <div class="row">
                                            <div class="form-group col-md-4">
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
                                            <div class="form-group col-md-4">
                                                <label for="UserFirstName">First Name <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserFirstName" id="UserFirstName" type="text" class="form-control" placeholder="First Name">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserFirstName">Last Name <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserLastName" id="UserLastName" type="text" class="form-control" placeholder="Last Name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserMiddleName">Middle Name <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserMiddleName" id="UserMiddleName" type="text" class="form-control" placeholder="Middle Name">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserMaidenName">Maiden Name <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserMaidenName" id="UserMaidenName" type="text" class="form-control" placeholder="Maiden Name">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserPreferredName">Preferred Name <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserPreferredName" id="UserPreferredName" type="text" class="form-control" placeholder="Preferred Name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserIdNumber">ID/Passport Number <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserIdNumber" id="UserIdNumber" type="text" class="form-control" placeholder="ID/Passport Number">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserNationality">Nationality <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserNationality" id="UserNationality" type="text" class="form-control" placeholder="Nationality">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserGender">Gender <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="UserGender" id="UserGender" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Gender --</option>
                                                        <option value="MALE">Male</option>
                                                        <option value="FEMALE">Female</option>
                                                        <option value="OTHER">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserMaritalStatus">Marital Status <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="UserMaritalStatus" id="UserMaritalStatus" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Marital Status --</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserSpouseName">Spouse's Full Name <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserSpouseName" id="UserSpouseName" type="text" class="form-control" placeholder="Spouse's Full Name (If Applicable)">
                                                </div>
                                            </div>


                                            <div class="form-group col-md-4">
                                                <label for="UserSpouseEmployer">Spouse's Employer <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserSpouseEmployer" id="UserSpouseEmployer" type="text" class="form-control" placeholder="Spouse's Employer (If Applicable)">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="form-group col-md-4">
                                                <label for="UserSpouseWorkPhone">Spouse's Work Phone <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserSpouseWorkPhone" id="UserSpouseWorkPhone" type="text" class="form-control" placeholder="Spouse's Work Phone (If Applicable)">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserSpouseCellNumber">Spouse's Cell Phone <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserSpouseCellNumber" id="UserSpouseCellNumber" type="text" class="form-control" placeholder="Spouse's Cell Phone(If Applicable)">
                                                </div>
                                            </div>

                                        </div>

                                        <h4 class="info-section"><b>Residential Address</b></h4><br>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserAddressHouseNo">ERF/House No <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserAddressHouseNo" id="UserAddressHouseNo" type="text" class="form-control" placeholder="ERF/House No">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserAddressStreetNo">Street No <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserAddressStreetNo" id="UserAddressStreetNo" type="text" class="form-control" placeholder="Street Number">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserAddressStreetName">Street Name <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserAddressStreetName" id="UserAddressStreetName" type="text" class="form-control" placeholder="Street Name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserAddressSuburb">Suburb<span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserAddressSuburb" id="UserAddressSuburb" type="text" class="form-control" placeholder="Suburb">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserAddressCity">City<span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserAddressCity" id="UserAddressCity" type="text" class="form-control" placeholder="City">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserAddressProvince">Province <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserAddressProvince" id="UserAddressProvince" type="text" class="form-control" placeholder="Province">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserHomePhone">Home Phone<span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserHomePhone" id="UserHomePhone" type="text" class="form-control" placeholder="Home Phone">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserCellPhone">Cell Phone<span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserCellPhone" id="UserCellPhone" type="text" class="form-control" placeholder="Cell Phone">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserEmail">Email Address <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmail" id="UserEmail" type="text" class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                        </div>

                                        <h4 class="info-section"><b>Job Information</b></h4><br>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserHomePhone">Job Title<span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserHomePhone" id="UserHomePhone" type="text" class="form-control" placeholder="Home Phone">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserEmployeeId">Employee Id<span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmployeeId" id="UserEmployeeId" type="text" class="form-control" placeholder="Employee Id (If Applicable)">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserDepartment">Area/Department <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserDepartment" id="UserDepartment" type="text" class="form-control" placeholder="Area/Department">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserReportingTo">Reporting To<span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserReportingTo" id="UserReportingTo" type="text" class="form-control" placeholder="Reporting To">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserWorkLocation">Work Location <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserWorkLocation" id="UserWorkLocation" type="text" class="form-control" placeholder="Work Location">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserStartDate">Start Date <span class="txt-red">*</span></label>
                                                <div class="input-append warning col-lg-11 no-padding">
                                                    <input name="UserStartDate" id="UserStartDate" type="text" class="form-control datepicker" placeholder="Start Date">
                                                    <span class="add-on"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserWorkPhone">Work Phone<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserWorkPhone" id="UserWorkPhone" type="text" class="form-control" placeholder="Work Phone">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserWorkCellPhone">Work Cell Phone<span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserWorkCellPhone" id="UserWorkCellPhone" type="text" class="form-control" placeholder="Work Cell Phone">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserWorkEmail"> Work Email Address <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserWorkEmail" id="UserWorkEmail" type="text" class="form-control" placeholder="Work Email Address">
                                                </div>
                                            </div>
                                        </div>

                                        <h4 class="info-section"><b>Emergency Contact/Next Of Kin Information</b></h4><br>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencySurname">Surname<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencySurname" id="UserEmergencySurname" type="text" class="form-control" placeholder="Emergency Contact Surname">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyFirstName">Frist Name <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencyFirstName" id="UserEmergencyFirstName" type="text" class="form-control" placeholder="Emergency Contact First Name">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyMiddleName">Middle Name<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right">
                                                    <input name="UserEmergencyMiddleName" id="UserEmergencyMiddleName" type="text" class="form-control" placeholder="Emergency Contact Middle Name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyHouseNo">ERF/House No <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencyHouseNo" id="UserEmergencyHouseNo" type="text" class="form-control" placeholder="Emergency Contact ERF/House No">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyStreetNo">Street No <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencyStreetNo" id="UserEmergencyStreetNo" type="text" class="form-control" placeholder="Emergency Contact Street Number">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyStreetName">Street Name <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencyStreetName" id="UserEmergencyStreetName" type="text" class="form-control" placeholder="Emergency Contact Street Name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencySuburb">Suburb<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencySuburb" id="UserEmergencySuburb" type="text" class="form-control" placeholder="Emergency Contact Suburb">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyCity">City<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencyCity" id="UserEmergencyCity" type="text" class="form-control" placeholder=" Emergency Contact City">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyProvince">Province <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencyProvince" id="UserEmergencyProvince" type="text" class="form-control" placeholder="Emergency Contact Province">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyHomePhone">Home Phone<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencyHomePhone" id="UserEmergencyHomePhone" type="text" class="form-control" placeholder="Emergency Contact Home Phone">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyCellPhone">Cell Phone<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencyCellPhone" id="UserEmergencyCellPhone" type="text" class="form-control" placeholder="Emergency Contact Cell Phone">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyEmail">Email Address <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencyEmail" id="UserEmergencyEmail" type="text" class="form-control" placeholder="Emergency Contact Email Address">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyRelationship">Relationship <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="UserEmergencyRelationship" id="UserEmergencyRelationship" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Relationship --</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <h4 class="info-section"><b>Other Information</b></h4><br>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserPaymentNumber">PAY Number<span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserPaymentNumber" id="UserPaymentNumber" type="text" class="form-control" placeholder="Payment Number">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserUIFNumber">UIF Number<span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserUIFNumber" id="UserUIFNumber" type="text" class="form-control" placeholder="UIF Number">
                                                </div>
                                            </div>

                                        </div>
                                        <!--div class="row ">
                                            <div class="form-group col-md-4">
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

                                            <div class="form-group col-md-4">
                                                <label for="UserStatus">Status <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="UserStatus" id="UserStatus" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Status --</option>
                                                        <option value="ACTIVE">Active</option>
                                                        <option value="DEACTIVATED">Deactivated</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div-->

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