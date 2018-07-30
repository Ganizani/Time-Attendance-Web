@extends('layouts.default')

@section('title', 'Access Control')

@section('content')
    <!-- BEGIN PAGE CONTAINER-->
    <div class="page-content">
        <div class="clearfix"></div>
        <div class="content">
            <ul class="breadcrumb">
                <li>User</li>
                <li>User Groups</li>
                <li><a href="#" class="active">Add</a> </li>
            </ul>
            <div class="page-title">
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-body ">
                            <form class="form-no-horizontal-spacing" id="add_form" >
                                <div class="row">
                                    <h4 class="info-section"><b>User Group Information</b></h4>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="UserGroupName"> Name <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserGroupName" id="UserGroupName" type="text" class="form-control" placeholder="User Group Name" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="UserGroupDescription">Description <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <textarea name="UserGroupDescription" id="UserGroupDescription"  placeholder="User Group Description ... " class="form-control"  rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h4 class="info-section"><b>Access Control Information</b></h4>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <label>System<span class="txt-red"></span></label>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckSystemAdmin" name="acheckSystemAdmin"  type="checkbox" value="1" >
                                                            <label for="acheckSystemAdmin">System Dashboard</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckSystemLogin" name="acheckSystemLogin" type="checkbox" value="1" >
                                                            <label for="acheckSystemLogin">Login</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckSystemUpdateUserType" name="acheckSystemUpdateUserType" type="checkbox" value="1" >
                                                            <label for="acheckSystemUpdateUserType">Update User Type</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <label>Reports<span class="txt-red"></span></label>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckReportView" name="acheckReportView"  type="checkbox" value="1" >
                                                            <label for="acheckReportView">View</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckReportPrint" name="acheckReportPrint" type="checkbox" value="1" >
                                                            <label for="acheckReportPrint">Print</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <label >Departments<span class="txt-red"></span></label>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckDepartmentAdd" name="acheckDepartmentAdd"  type="checkbox" value="1" >
                                                            <label for="acheckDepartmentAdd">Add</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckDepartmentEdit" name="acheckDepartmentEdit" type="checkbox" value="1" >
                                                            <label for="acheckDepartmentEdit">Edit</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckDepartmentList" name="acheckDepartmentList" type="checkbox" value="1" >
                                                            <label for="acheckDepartmentList">List</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckDepartmentPrint" name="acheckDepartmentPrint" type="checkbox" value="1" >
                                                            <label for="acheckDepartmentPrint">Print</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckDepartmentDelete" name="acheckDepartmentDelete" type="checkbox" value="1" >
                                                            <label for="acheckDepartmentDelete">Delete</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <label >Devices<span class="txt-red"></span></label>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckDeviceAdd" name="acheckDeviceAdd"  type="checkbox" value="1" >
                                                            <label for="acheckDeviceAdd">Add</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckDeviceEdit" name="acheckDeviceEdit" type="checkbox" value="1" >
                                                            <label for="acheckDeviceEdit">Edit</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckDeviceList" name="acheckDeviceList" type="checkbox" value="1" >
                                                            <label for="acheckDeviceList">List</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckDevicePrint" name="acheckDevicePrint" type="checkbox" value="1" >
                                                            <label for="acheckDevicePrint">Print</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckDeviceDelete" name="acheckDeviceDelete" type="checkbox" value="1" >
                                                            <label for="acheckDeviceDelete">Delete</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <label>Leaves<span class="txt-red"></span></label>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckLeaveAdd" name="acheckLeaveAdd"  type="checkbox" value="1" >
                                                            <label for="acheckLeaveAdd">Add</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckLeaveEdit" name="acheckLeaveEdit" type="checkbox" value="1" >
                                                            <label for="acheckLeaveEdit">Edit</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckLeaveList" name="acheckLeaveList" type="checkbox" value="1" >
                                                            <label for="acheckLeaveList">List</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckLeavePrint" name="acheckLeavePrint" type="checkbox" value="1" >
                                                            <label for="acheckLeavePrint">Print</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckLeaveDelete" name="acheckLeaveDelete" type="checkbox" value="1" >
                                                            <label for="acheckLeaveDelete">Delete</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <label>Leave Types<span class="txt-red"></span></label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckLeaveTypeAdd" name="acheckLeaveTypeAdd"  type="checkbox" value="1" >
                                                            <label for="acheckLeaveTypeAdd">Add</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckLeaveTypeEdit" name="acheckLeaveTypeEdit" type="checkbox" value="1" >
                                                            <label for="acheckLeaveTypeEdit">Edit</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckLeaveTypeList" name="acheckLeaveTypeList" type="checkbox" value="1" >
                                                            <label for="acheckLeaveTypeList">List</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckLeaveTypePrint" name="acheckLeaveTypePrint" type="checkbox" value="1" >
                                                            <label for="acheckLeaveTypePrint">Print</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckLeaveTypeDelete" name="acheckLeaveTypeDelete" type="checkbox" value="1" >
                                                            <label for="acheckLeaveTypeDelete">Delete</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <label>Holidays<span class="txt-red"></span></label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckHolidayAdd" name="acheckHolidayAdd"  type="checkbox" value="1" >
                                                            <label for="acheckHolidayAdd">Add</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckHolidayEdit" name="acheckHolidayEdit" type="checkbox" value="1" >
                                                            <label for="acheckHolidayEdit">Edit</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckHolidayList" name="acheckHolidayList" type="checkbox" value="1" >
                                                            <label for="acheckHolidayList">List</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckHolidayPrint" name="acheckHolidayPrint" type="checkbox" value="1" >
                                                            <label for="acheckHolidayPrint">Print</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckHolidayDelete" name="acheckHolidayDelete" type="checkbox" value="1" >
                                                            <label for="acheckHolidayDelete">Delete</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <label>Users<span class="txt-red"></span></label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckUserAdd" name="acheckUserAdd"  type="checkbox" value="1" >
                                                            <label for="acheckUserAdd">Add</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckUserEdit" name="acheckUserEdit" type="checkbox" value="1" >
                                                            <label for="acheckUserEdit">Edit</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckUserList" name="acheckUserList" type="checkbox" value="1" >
                                                            <label for="acheckUserList">List</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckUserPrint" name="acheckUserPrint" type="checkbox" value="1" >
                                                            <label for="acheckUserPrint">Print</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckUserDelete" name="acheckUserDelete" type="checkbox" value="1" >
                                                            <label for="acheckUserDelete">Delete</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <label>User Groups<span class="txt-red"></span></label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckUserGroupAdd" name="acheckUserGroupAdd"  type="checkbox" value="1" >
                                                            <label for="acheckUserGroupAdd">Add</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckUserGroupEdit" name="acheckUserGroupEdit" type="checkbox" value="1" >
                                                            <label for="acheckUserGroupEdit">Edit</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckUserGroupList" name="acheckUserGroupList" type="checkbox" value="1" >
                                                            <label for="acheckUserGroupList">List</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckUserGroupPrint" name="acheckUserGroupPrint" type="checkbox" value="1" >
                                                            <label for="acheckUserGroupPrint">Print</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckUserGroupDelete" name="acheckUserGroupDelete" type="checkbox" value="1" >
                                                            <label for="acheckUserGroupDelete">Delete</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <span class="txt-red">* Required Fields</span><br>
                                </div>
                                <div class="form-actions">
                                    <div class="pull-left">
                                        <div id="Results"></div>
                                    </div>
                                    <div class="pull-right">
                                        <button class="btn btn-warning btn-cons btn-medium" type="submit"><i class="fa fa-check"></i> &nbsp; Create</button>
                                        <button class="btn btn-white btn-cons  btn-medium" onclick="window.history.back();return false;">Back</button>
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

        $("#add_form").submit(function(event){

            event.preventDefault();
            var form_data = $(this).serialize();

            $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');

            $.ajax({
                type:"POST",
                url:"/api/user-groups",
                cache: false,
                data: form_data,
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
                UserGroupName :         { required: true }
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