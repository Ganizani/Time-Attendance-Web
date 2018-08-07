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
                <li><a href="#" class="active">Edit</a> </li>
            </ul>
            <div class="page-title">
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="grid simple ">
                        <div class="grid-body ">
                            <form class="form-no-horizontal-spacing" id="edit_form" >
                                <input name="UserGroupId" id="UserGroupId" type="hidden" class="form-control" value="{{isset($user_group['id']) ? $user_group['id'] : ""}}">
                                <input name="UserGroupAccessControlId" id="UserGroupAccessControlId" type="hidden" class="form-control" value="{{isset($user_group['access_control']['id']) ? $user_group['access_control']['id'] : ""}}">

                                <div class="row">
                                    <h4 class="info-section"><b>User Group Information</b></h4>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="UserGroupName"> Name <span class="txt-red">*</span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <input name="UserGroupName" id="UserGroupName" type="text" class="form-control" placeholder="User Group Name" value="{{isset($user_group['name']) ? $user_group['name'] : ""}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row ">
                                            <div class="form-group col-md-12">
                                                <label for="UserGroupDescription">Description <span class="txt-red"></span></label>
                                                <div class="input-with-icon  right"><i class=""></i>
                                                    <textarea name="UserGroupDescription" id="UserGroupDescription"  placeholder="User Group Description ... " class="form-control"  rows="3">{{isset($user_group['description']) ? $user_group['description'] : ""}}</textarea>
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
                                                <div class="form-group col-md-3">
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
                                                        <label>&nbsp;</label>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckSystemManualClocking" name="acheckSystemManualClocking" type="checkbox" value="1" >
                                                            <label for="acheckSystemManualClocking">Manual Clocking</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <div class="row-fluid">
                                                        <div class="checkbox check-info">
                                                            <input id="acheckSystemApplyForLeave" name="acheckSystemApplyForLeave" type="checkbox" value="1" >
                                                            <label for="acheckSystemApplyForLeave">Apply For Leave</label>
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
                                        <button class="btn btn-warning btn-cons btn-medium" type="submit"><i class="fa fa-check"></i> &nbsp; Submit</button>
                                        <button id="btnClear" class="btn btn-default btn-cons btn-medium" type="submit"><i class="fa fa-retweet"></i> &nbsp; Clear</button>
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
        $("#btnClear").click(function () {

            $("#add_form")[0].reset();

            return false; // prevent submitting
        });

        $(document).ready(function() {
            var id = $('#UserGroupId').val();

            $.ajax({
                type: "GET",
                url: "/api/user-groups/" + id,
                cache: false,
                data: {},
                success: function (response) {
                    var data = response.data.access_control;

                    //System
                   $("#acheckSystemLogin").prop('checked',data.login);
                   $("#acheckSystemAdmin").prop('checked',data.system_admin);
                   $("#acheckSystemUpdateUserType").prop('checked',data.update_user_type);
                   $("#acheckSystemManualClocking").prop('checked',data.manual_clocking);
                   $("#acheckSystemApplyForLeave").prop('checked',data.apply_for_leave);
                   //Reports
                   $("#acheckReportView").prop('checked',data.view_reports);
                   $("#acheckReportPrint").prop('checked',data.print_reports);
                   //Departments
                   $("#acheckDepartmentAdd").prop('checked',data.add_departments);
                   $("#acheckDepartmentEdit").prop('checked',data.edit_departments);
                   $("#acheckDepartmentPrint").prop('checked',data.print_departments);
                   $("#acheckDepartmentList").prop('checked',data.list_departments);
                   $("#acheckDepartmentDelete").prop('checked',data.delete_departments);
                   //Devices
                   $("#acheckDeviceAdd").prop('checked',data.add_devices);
                   $("#acheckDeviceEdit").prop('checked',data.edit_devices);
                   $("#acheckDevicePrint").prop('checked',data.print_devices);
                   $("#acheckDeviceList").prop('checked',data.list_devices);
                   $("#acheckDeviceDelete").prop('checked',data.delete_devices);
                   //Leaves
                   $("#acheckLeaveAdd").prop('checked',data.add_leaves);
                   $("#acheckLeaveEdit").prop('checked',data.edit_leaves);
                   $("#acheckLeavePrint").prop('checked',data.print_leaves);
                   $("#acheckLeaveList").prop('checked',data.list_leaves);
                   $("#acheckLeaveDelete").prop('checked',data.delete_leaves);
                   //Leave Type
                   $("#acheckLeaveTypeAdd").prop('checked',data.add_leave_types);
                   $("#acheckLeaveTypeEdit").prop('checked',data.edit_leave_types);
                   $("#acheckLeaveTypePrint").prop('checked',data.print_leave_types);
                   $("#acheckLeaveTypeList").prop('checked',data.list_leave_types);
                   $("#acheckLeaveTypeDelete").prop('checked',data.delete_leave_types);
                   //Holiday
                   $("#acheckHolidayAdd").prop('checked',data.add_holidays);
                   $("#acheckHolidayEdit").prop('checked',data.edit_holidays);
                   $("#acheckHolidayList").prop('checked',data.list_holidays);
                   $("#acheckHolidayPrint").prop('checked',data.print_holidays);
                   $("#acheckHolidayDelete").prop('checked',data.delete_holidays);
                   //User
                   $("#acheckUserAdd").prop('checked',data.add_users);
                   $("#acheckUserEdit").prop('checked',data.edit_users);
                   $("#acheckUserPrint").prop('checked',data.print_users);
                   $("#acheckUserList").prop('checked',data.list_users);
                   $("#acheckUserDelete").prop('checked',data.delete_users);
                    //User Groups
                    $("#acheckUserGroupAdd").prop('checked',data.add_user_groups);
                    $("#acheckUserGroupEdit").prop('checked',data.edit_user_groups);
                    $("#acheckUserGroupPrint").prop('checked',data.print_user_groups);
                    $("#acheckUserGroupList").prop('checked',data.list_user_groups);
                    $("#acheckUserGroupDelete").prop('checked',data.delete_user_groups);
                }

            });
        });

        $("#edit_form").submit(function(event){

            event.preventDefault();
            var form_data = $(this).serialize();
            var id        = $('#UserGroupId').val();

            $('#Results').html('<img src={{URL::asset("theme/img/ajax-loader.gif")}} />');

            $.ajax({
                type:"PUT",
                url:"/api/user-groups/" + id ,
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