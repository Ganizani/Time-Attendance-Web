@extends('layouts.default')

@section('title', 'Users')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li>Users</li>
                <li><a href="#" class="active">Edit</a> </li>
            </ul>
            <div class="page-title">
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-title">
                            <h4><b>Update User Form</b></h4>
                        </div>
                        <div class="grid-body ">
                            <form class="form-no-horizontal-spacing" id="edit_form" >
                                <input name="UserId" id="UserId" type="hidden" class="form-control" value="{{isset($user['id']) ? $user['id'] : "" }}">
                                <input name="UserAddressId" id="UserAddressId" type="hidden" class="form-control" value="{{isset($user['address']['id']) ? $user['address']['id'] : "" }}">
                                <input name="UserSpouseId" id="UserSpouseId" type="hidden" class="form-control" value="{{isset($user['spouse']['id']) ? $user['spouse']['id'] : "" }}">
                                <input name="UserEmergencyId" id="UserEmergencyId" type="hidden" class="form-control" value="{{isset($user['next_of_kin']['id']) ? $user['next_of_kin']['id'] : "" }}">
                                <input name="UserEmergencyAddressId" id="UserEmergencyAddressId" type="hidden" class="form-control" value="{{isset($user['next_of_kin']['address']['id']) ? $user['next_of_kin']['address']['id'] : "" }}">

                                <div class="row ">
                                    <div class="col-md-12">
                                        <span class="txt-red">* Required Fields</span>
                                    </div>
                                    <div class="col-md-12">
                                        <h5 class="info-section"><b>Personal Information</b></h5><br>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserTitle">Title <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="UserTitle" id="UserTitle" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Title --</option>
                                                        <option value="Mr.">Mr</option>
                                                        <option value="Mrs.">Mrs</option>
                                                        <option value="Ms.">Miss</option>
                                                        <option value="Dr.">Dr</option>
                                                        <option value="Prof.">Prof</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="UserFirstName">First Name <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserFirstName" id="UserFirstName" type="text" class="form-control" placeholder="First Name" value="{{ isset($user['first_name']) ? $user['first_name'] : "" }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserFirstName">Last Name <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserLastName" id="UserLastName" type="text" class="form-control" placeholder="Last Name" value="{{ isset($user['last_name']) ? $user['last_name'] : "" }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserMiddleName">Middle Name <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserMiddleName" id="UserMiddleName" type="text" class="form-control" placeholder="Middle Name" value="{{isset($user['middle_name']) ? $user['middle_name'] : "" }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserMaidenName">Maiden Name <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserMaidenName" id="UserMaidenName" type="text" class="form-control" placeholder="Maiden Name" value="{{isset($user['maiden_name']) ? $user['maiden_name'] : "" }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserPreferredName">Preferred Name <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserPreferredName" id="UserPreferredName" type="text" class="form-control" placeholder="Preferred Name" value="{{isset($user['preferred_name']) ? $user['preferred_name'] : "" }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserIdNumber">ID/Passport Number <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserIdNumber" id="UserIdNumber" type="text" class="form-control" placeholder="ID/Passport Number" value="{{isset($user['id_number']) ? $user['id_number'] : "" }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserNationality">Nationality <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserNationality" id="UserNationality" type="text" class="form-control" placeholder="Nationality" value="{{isset($user['nationality']) ? $user['nationality'] : "" }}">
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
                                                <label for="UserMaritalStatus">Marital Status <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="UserMaritalStatus" id="UserMaritalStatus" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Marital Status --</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Divorced">Divorced</option>
                                                        <option value="Widowed">Widowed</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserSpouseName">Spouse's Full Name <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserSpouseName" id="UserSpouseName" type="text" class="form-control" placeholder="Spouse's Full Name (If Applicable)" value="{{isset($user['spouse']['name']) ? $user['spouse']['name'] : "" }}">
                                                </div>
                                            </div>


                                            <div class="form-group col-md-4">
                                                <label for="UserSpouseEmployer">Spouse's Employer <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserSpouseEmployer" id="UserSpouseEmployer" type="text" class="form-control" placeholder="Spouse's Employer (If Applicable)" value="{{isset($user['spouse']['employer']) ? $user['spouse']['employer'] : "" }}">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="form-group col-md-4">
                                                <label for="UserSpouseWorkPhone">Spouse's Work Phone <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserSpouseWorkPhone" id="UserSpouseWorkPhone" type="text" class="form-control" placeholder="Spouse's Work Phone (If Applicable)" value="{{isset($user['spouse']['work_phone']) ? $user['spouse']['work_phone'] : "" }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserSpouseCellNumber">Spouse's Cell Phone <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserSpouseCellNumber" id="UserSpouseCellNumber" type="text" class="form-control" placeholder="Spouse's Cell Phone(If Applicable)" value="{{isset($user['spouse']['cell_phone']) ? $user['spouse']['cell_phone'] : "" }}">
                                                </div>
                                            </div>

                                        </div>

                                        <h5 class="info-section"><b>Residential Address</b></h5><br>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserAddressHouseNo">ERF/House No <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserAddressHouseNo" id="UserAddressHouseNo" type="text" class="form-control" placeholder="ERF/House No" value="{{isset($user['address']['house_number']) ? $user['address']['house_number'] : "" }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserAddressStreetNo">Street No <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserAddressStreetNo" id="UserAddressStreetNo" type="text" class="form-control" placeholder="Street Number" value="{{isset($user['address']['street_number']) ? $user['address']['street_number'] : "" }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserAddressStreetName">Street Name <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserAddressStreetName" id="UserAddressStreetName" type="text" class="form-control" placeholder="Street Name" value="{{isset($user['address']['street_name']) ? $user['address']['street_name'] : "" }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserAddressSuburb">Suburb<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserAddressSuburb" id="UserAddressSuburb" type="text" class="form-control" placeholder="Suburb" value="{{isset($user['address']['suburb']) ? $user['address']['suburb'] : "" }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserAddressCity">City<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserAddressCity" id="UserAddressCity" type="text" class="form-control" placeholder="City" value="{{isset($user['address']['city']) ? $user['address']['city'] : "" }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserAddressProvince">Province <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserAddressProvince" id="UserAddressProvince" type="text" class="form-control" placeholder="Province" value="{{isset($user['address']['province']) ? $user['address']['province'] : "" }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserHomePhone">Home Phone<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserHomePhone" id="UserHomePhone" type="text" class="form-control" placeholder="Home Phone" value="{{isset($user['home_phone']) ? $user['home_phone'] : "" }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserCellPhone">Cell Phone<span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserCellPhone" id="UserCellPhone" type="text" class="form-control" placeholder="Cell Phone" value="{{isset($user['phone_number']) ? $user['phone_number'] : "" }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserEmail">Email Address <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmail" id="UserEmail" type="text" class="form-control" placeholder="Email" value="{{isset($user['email']) ? $user['email'] : "" }}">
                                                </div>
                                            </div>
                                        </div>

                                        <h5 class="info-section"><b>Job Information</b></h5><br>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserJobTitle">Job Title<span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserJobTitle" id="UserJobTitle" type="text" class="form-control" placeholder="Job Title" value="{{isset($user['job_title']) ? $user['job_title'] : "" }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserEmployeeId">Employee Id<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmployeeId" id="UserEmployeeId" type="text" class="form-control" placeholder="Employee Id (If Applicable)" value="{{isset($user['employee_code']) ? $user['employee_code'] : "" }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserDepartment">Area/Department <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="UserDepartment" id="UserDepartment" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Area/Department --</option>
                                                        @if(isset($departments) && count($departments) > 0)
                                                            @foreach($departments as $department)
                                                                <option value="{{$department['id']}}" >{{$department['name']}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserReportingTo">Reporting To<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="UserReportingTo" id="UserReportingTo" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Supervisor --</option>
                                                        @if(isset($supervisors) && count($supervisors) > 0)
                                                            @foreach($supervisors as $supervisor)
                                                                @if($supervisor['id'] != $user['id'])
                                                                    <option value="{{$supervisor['id']}}" >{{$supervisor['name']}}</option>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserWorkLocation">Work Location <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserWorkLocation" id="UserWorkLocation" type="text" class="form-control" placeholder="Work Location" value="{{isset($user['work_location']) ? $user['work_location'] : "" }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserStartDate">Start Date <span class="txt-red"></span></label>
                                                <div class="input-append warning col-lg-11 no-padding">
                                                    <input name="UserStartDate" id="UserStartDate" type="text" class="form-control datepicker" placeholder="Start Date" value="{{isset($user['start_date']) ? $user['start_date'] : "" }}">
                                                    <span class="add-on"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserWorkPhone">Work Phone<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserWorkPhone" id="UserWorkPhone" type="text" class="form-control" placeholder="Work Phone" value="{{isset($user['work_phone']) ? $user['work_phone'] : "" }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserWorkCellPhone">Work Cell Phone<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserWorkCellPhone" id="UserWorkCellPhone" type="text" class="form-control" placeholder="Work Cell Phone" value="{{isset($user['work_cell_phone']) ? $user['work_cell_phone'] : "" }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserWorkEmail"> Work Email Address <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserWorkEmail" id="UserWorkEmail" type="text" class="form-control" placeholder="Work Email Address" value="{{isset($user['work_email']) ? $user['work_email'] : "" }}">
                                                </div>
                                            </div>
                                        </div>

                                        <h5 class="info-section"><b>Emergency Contact/Next Of Kin Information</b></h5><br>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencySurname">Surname<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencySurname" id="UserEmergencySurname" type="text" class="form-control" placeholder="Emergency Contact Surname" value="{{isset($user['next_of_kin']['last_name']) ? $user['next_of_kin']['last_name'] : ""}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyFirstName">Frist Name <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencyFirstName" id="UserEmergencyFirstName" type="text" class="form-control" placeholder="Emergency Contact First Name" value="{{isset($user['next_of_kin']['first_name']) ? $user['next_of_kin']['first_name'] : ""}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyMiddleName">Middle Name<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right">
                                                    <input name="UserEmergencyMiddleName" id="UserEmergencyMiddleName" type="text" class="form-control" placeholder="Emergency Contact Middle Name" value="{{isset($user['next_of_kin']['middle_name']) ? $user['next_of_kin']['middle_name'] : ""}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyHouseNo">ERF/House No <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencyHouseNo" id="UserEmergencyHouseNo" type="text" class="form-control" placeholder="Emergency Contact ERF/House No" value="{{isset($user['next_of_kin']['address']['house_number']) ? $user['next_of_kin']['address']['house_number'] : ""}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyStreetNo">Street No <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencyStreetNo" id="UserEmergencyStreetNo" type="text" class="form-control" placeholder="Emergency Contact Street Number" value="{{isset($user['next_of_kin']['address']['street_number']) ? $user['next_of_kin']['address']['street_number'] : ""}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyStreetName">Street Name <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencyStreetName" id="UserEmergencyStreetName" type="text" class="form-control" placeholder="Emergency Contact Street Name" value="{{isset($user['next_of_kin']['address']['street_name']) ? $user['next_of_kin']['address']['street_name'] : ""}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencySuburb">Suburb<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencySuburb" id="UserEmergencySuburb" type="text" class="form-control" placeholder="Emergency Contact Suburb" value="{{isset($user['next_of_kin']['address']['suburb']) ? $user['next_of_kin']['address']['suburb'] : ""}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyCity">City<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencyCity" id="UserEmergencyCity" type="text" class="form-control" placeholder=" Emergency Contact City" value="{{isset($user['next_of_kin']['address']['city']) ? $user['next_of_kin']['address']['city'] : ""}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyProvince">Province <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencyProvince" id="UserEmergencyProvince" type="text" class="form-control" placeholder="Emergency Contact Province" value="{{isset($user['next_of_kin']['address']['province']) ? $user['next_of_kin']['address']['province'] : ""}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyHomePhone">Home Phone<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencyHomePhone" id="UserEmergencyHomePhone" type="text" class="form-control" placeholder="Emergency Contact Home Phone" value="{{isset($user['next_of_kin']['home_phone']) ? $user['next_of_kin']['home_phone'] : ""}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyCellPhone">Cell Phone<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencyCellPhone" id="UserEmergencyCellPhone" type="text" class="form-control" placeholder="Emergency Contact Cell Phone" value="{{isset($user['next_of_kin']['cell_phone']) ? $user['next_of_kin']['cell_phone'] : ""}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyEmail">Email Address <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserEmergencyEmail" id="UserEmergencyEmail" type="text" class="form-control" placeholder="Emergency Contact Email Address" value="{{isset($user['next_of_kin']['email']) ? $user['next_of_kin']['email'] : ""}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserEmergencyRelationship">Relationship <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="UserEmergencyRelationship" id="UserEmergencyRelationship" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- Relationship --</option>
                                                        <option value="Spouse">Spouse</option>
                                                        <option value="Children">Children</option>
                                                        <option value="Parent">Parent</option>
                                                        <option value="Sibling">Sibling</option>
                                                        <option value="Niece/Nephew">Niece/Nephew</option>
                                                        <option value="Aunt/Uncle">Aunt/Uncle</option>
                                                        <option value="Cousin">Cousin</option>
                                                        <option value="Grand Parent">Grand Parent</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <h5 class="info-section"><b>Other Information</b></h5><br>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="UserPaymentNumber">PAYE Number<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserPaymentNumber" id="UserPaymentNumber" type="text" class="form-control" placeholder="PAYE Number" value="{{isset($user['payment_number']) ? $user['payment_number'] : ""}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserUIFNumber">UIF Number<span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserUIFNumber" id="UserUIFNumber" type="text" class="form-control" placeholder="UIF Number" value="{{isset($user['uif_number']) ? $user['uif_number'] : ""}}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="UserType">User Type<span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <select name="UserType" id="UserType" class="select2 form-control"  data-init-plugin="select2">
                                                        <option value="">-- User Type --</option>
                                                        @if(isset($user_groups) && count($user_groups) > 0)
                                                            @foreach($user_groups as $user_group)
                                                                <option value="{{$user_group['id']}}" >{{$user_group['name']}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
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
                                        <button class="btn btn-warning btn-cons btn-medium" type="submit"><i class="fa fa-check"></i> &nbsp;Submit</button>
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
        $(document).ready(function() {
            $('#UserTitle').select2({minimumResultsForSearch: -1}).select2('val', '{{isset($user['title']) ? $user['title'] : ""}}');
            $('#UserStatus').select2({minimumResultsForSearch: -1}).select2('val', '{{isset($user['status']) ? $user['status'] : ""}}');
            $('#UserType').select2({minimumResultsForSearch: -1}).select2('val', '{{isset($user['user_type']) ? $user['user_type'] : ""}}');
            $('#UserReportingTo').select2({minimumResultsForSearch: -1}).select2('val', '{{isset($user['supervisor']['id']) ? $user['supervisor']['id'] : ""}}');
            $('#UserDepartment').select2({minimumResultsForSearch: -1}).select2('val', '{{isset($user['department']['id']) ? $user['department']['id'] : ""}}');
            $('#UserGender').select2({minimumResultsForSearch: -1}).select2('val', '{{isset($user['gender']) ? $user['gender'] : ""}}');
            $('#UserMaritalStatus').select2({minimumResultsForSearch: -1}).select2('val', '{{isset($user['marital_status']) ? $user['marital_status'] : ""}}');
            $('#UserEmergencyRelationship').select2({minimumResultsForSearch: -1}).select2('val', '{{isset($user['next_of_kin']['id']) ? $user['next_of_kin']['relationship'] : ""}}');
        });



        $("#edit_form").submit(function(event){

            event.preventDefault();
            var id = $("#UserId").val();
            var_form_data = $(this).serialize();

            $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');

            $.ajax({
                type:"PUT",
                url:"/api/users/" + id,
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

        $("#edit_form").validate({
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
                UserPhoneNumber:        { required: true },
                UserGender:             { required: true },
                UserNationality:        { required: true },
                UserIdNumber:           { required: true },
                UserCellPhone:          { required: true },
                UserWorkLocation:       { required: true },
                UserDepartment:         { required: true },
                UserJobTitle:           { required: true },
                UserEmail:              { required: true, email: true },
                UserPassword:           {required: true, minlength:8},
                UserConfirmPassword:    { equalTo: "#UserPassword" }
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