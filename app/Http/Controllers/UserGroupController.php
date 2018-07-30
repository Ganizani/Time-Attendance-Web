<?php
/**
 * Created by PhpStorm.
 * User: carlos_pambo
 * Date: 2018/07/29
 * Time: 08:16
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Helpers;

class UserGroupController extends Controller
{
    //WEB CALLS
    public function index(){

        if(Helpers::hasValidSession()) {
            return view('pages.user_groups.list');
        }
        else return view('pages.login');
    }

    public function add(){

        if(Helpers::hasValidSession()) {
            return view('pages.user_groups.add', []);
        }
        else return view('pages.login');
    }

    public function edit($id)
    {
        if(Helpers::hasValidSession()) {
            $r_user_group = Helpers::callAPI('GET', "/user_groups/{$id}");

            return view('pages.user_groups.edit', [
                'user_group' => $r_user_group['data']
            ]);
        }
        else return view('pages.login');
    }

    //API CALLS
    public function get_all(Request $request)
    {
        $r_user_group = Helpers::callAPI('GET', "/user_groups");

        return $r_user_group;
    }

    public function get_one($id)
    {
        $r_user_group = Helpers::callAPI('GET', "/user_groups/{$id}");

        return $r_user_group['data'];
    }

    public function create(Request $request)
    {
        $response = Helpers::callAPI( "POST", "/user_groups" , $this->get_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            $message =  "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> User Group Successfully Created!</div>";
        }
        else{
            $error = Helpers::getError($response);
            $message =  "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }

        return $message;
    }

    public function update(Request $request, $id)
    {
        //die(json_encode($this->get_array($request)));
        $response = Helpers::callAPI( "PUT", "/user_groups/{$id}", $this->get_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            return "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> User Group Information Successfully Updated!</div>";
        }
        else{
            $error = Helpers::getError($response);
            return "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }
    }

    public function get_array($request){
        $data = [
            'name'            => $request->UserGroupName,
            'description'     => $request->UserGroupDescription,
            'access_control'  => [
                'user_group_id'     => isset($request->UserGroupId) ? $request->UserGroupId : null,
                'access_control_id' => isset($request->UserGroupAccessControlId) ? $request->UserGroupAccessControlId : null,
                'update_user_type'  => isset($request->acheckSystemUpdateUserType) ?$request->acheckSystemUpdateUserType : 0,
                'login'             => isset($request->acheckSystemLogin) ?$request->acheckSystemLogin : 0,
                'system_admin'      => isset($request->acheckSystemAdmin) ?$request->acheckSystemAdmin : 0,
                'view_reports'      => isset($request->acheckReportView) ?$request->acheckReportView : 0,
                'print_reports'     => isset($request->acheckReportPrint) ? $request->acheckReportPrint : 0,
                'add_departments'   => isset($request->acheckDepartmentAdd) ? $request->acheckDepartmentAdd : 0,
                'list_departments'  => isset($request->acheckDepartmentList) ? $request->acheckDepartmentList : 0,
                'edit_departments'  => isset($request->acheckDepartmentEdit) ? $request->acheckDepartmentEdit : 0,
                'print_departments' => isset($request->acheckDepartmentPrint) ? $request->acheckDepartmentPrint : 0,
                'delete_departments'=> isset($request->acheckDepartmentDelete) ? $request->acheckDepartmentDelete : 0,
                'add_devices'       => isset($request->acheckDeviceAdd) ? $request->acheckDeviceAdd : 0,
                'edit_devices'      => isset($request->acheckDeviceEdit) ? $request->acheckDeviceEdit : 0,
                'list_devices'      => isset($request->acheckDeviceList) ? $request->acheckDeviceList : 0,
                'print_devices'     => isset($request->acheckDevicePrint) ? $request->acheckDevicePrint : 0,
                'delete_devices'    => isset($request->acheckDeviceDelete) ? $request->acheckDeviceDelete: 0,
                'add_leaves'        => isset($request->acheckLeaveAdd) ? $request->acheckLeaveAdd : 0,
                'edit_leaves'       => isset($request->acheckLeaveEdit) ? $request->acheckLeaveEdit : 0,
                'print_leaves'      => isset($request->acheckLeavePrint) ? $request->acheckLeavePrint : 0,
                'list_leaves'       => isset($request->acheckLeaveList) ? $request->acheckLeaveList: 0,
                'delete_leaves'     => isset($request->acheckLeaveDelete) ? $request->acheckLeaveDelete : 0,
                'upload_leaves'     => isset($request->acheckLeaveUpload) ? $request->acheckLeaveUpload : 0,
                'add_leave_types'    => isset($request->acheckLeaveTypeAdd) ? $request->acheckLeaveTypeAdd : 0,
                'edit_leave_types'   => isset($request->acheckLeaveTypeEdit) ? $request->acheckLeaveTypeEdit : 0,
                'list_leave_types'   => isset($request->acheckLeaveTypeList) ? $request->acheckLeaveTypeList : 0,
                'print_leave_types'  => isset($request->acheckLeaveTypePrint) ? $request->acheckLeaveTypePrint : 0,
                'delete_leave_types' => isset($request->acheckLeaveTypeDelete) ? $request->acheckLeaveTypeDelete : 0,
                'add_holidays'      => isset($request->acheckHolidayAdd) ? $request->acheckHolidayAdd : 0,
                'edit_holidays'     => isset($request->acheckHolidayEdit) ? $request->acheckHolidayEdit : 0,
                'list_holidays'     => isset($request->acheckHolidayList) ? $request->acheckHolidayList : 0,
                'print_holidays'    => isset($request->acheckHolidayPrint) ? $request->acheckHolidayPrint : 0,
                'delete_holidays'   => isset($request->acheckHolidayDelete) ? $request->acheckHolidayDelete : 0,
                'add_users'         => isset($request->acheckUserAdd) ? $request->acheckUserAdd : 0,
                'list_users'        => isset($request->acheckUserList) ? $request->acheckUserList : 0,
                'edit_users'        => isset($request->acheckUserEdit) ? $request->acheckUserEdit : 0,
                'print_users'       => isset($request->acheckUserPrint) ? $request->acheckUserPrint : 0,
                'delete_users'      => isset($request->acheckUserDelete) ? $request->acheckUserDelete : 0,
                'add_user_groups'         => isset($request->acheckUserAdd) ? $request->acheckUserGroupAdd : 0,
                'edit_user_groups'        => isset($request->acheckUserGroupEdit) ? $request->acheckUserGroupEdit : 0,
                'list_user_groups'        => isset($request->acheckUserGroupList) ? $request->acheckUserGroupList : 0,
                'print_user_groups'       => isset($request->acheckUserGroupPrint) ? $request->acheckUserGroupPrint : 0,
                'delete_user_groups'      => isset($request->acheckUserGroupDelete) ? $request->acheckUserGroupDelete : 0
            ]
        ];

        return $data;
    }

}