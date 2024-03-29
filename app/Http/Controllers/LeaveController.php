<?php
/**
 * Created by PhpStorm.
 * User: carlos_pambo
 * Date: 3/13/18
 * Time: 9:44 PM
 */

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Helpers;

class LeaveController extends Controller
{
    //WEB CALLS
    public function add_leave(){

        if(Helpers::hasValidSession()) {
            if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_leaves']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_leaves'] == 0){
                return response()->view('errors.401', [], 404);
            }
            else {
                $r_leave_type = Helpers::callAPI("GET", "/leave_types");
                $r_users = Helpers::callAPI('GET', "/users");

                return view('pages.leaves.add_leave', [
                    'leave_types' => $r_leave_type['data'],
                    'users' => $r_users['data']
                ]);
            }
        }
        else return view('pages.login');
    }

    public function edit_leave($id)
    {
        if(Helpers::hasValidSession()) {
            if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_leaves']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_leaves'] == 0){
                return response()->view('errors.401', [], 404);
            }
            else {
                $r_leave = Helpers::callAPI('GET', "/leaves/{$id}");
                $r_type = Helpers::callAPI('GET', "/leave_types");
                $r_users = Helpers::callAPI('GET', "/users");

                return view('pages.leaves.edit_leave', [
                    'leave' => $r_leave['data'],
                    'leave_types' => $r_type['data'],
                    'users' => $r_users['data']
                ]);
            }
        }
        else return view('pages.login');
    }

    public function upload_leave()
    {
        if(Helpers::hasValidSession()) {
            if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['upload_leaves']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['upload_leaves'] == 0){
                return response()->view('errors.401', [], 404);
            }
            else {
                return view('pages.leaves.upload_leave');
            }
        }
        else return view('pages.login');
    }

    public function add_type(){

        if(Helpers::hasValidSession()) {
            if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_leave_types']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_leave_types'] == 0){
                return response()->view('errors.401', [], 404);
            }
            else {
                return view('pages.leaves.add_type');
            }
        }
        else return view('pages.login');
    }

    public function edit_type($id)
    {
        if(Helpers::hasValidSession()) {
            if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_leave_types']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_leave_types'] == 0){
                return response()->view('errors.401', [], 404);
            }
            else {
                $r_type  = Helpers::callAPI('GET', "/leave_types/{$id}");

                return view('pages.leaves.edit_type', [
                    'leave_type' => $r_type['data']
                ]);
            }
        }
        else return view('pages.login');
    }

    public function list_type(){

        if(Helpers::hasValidSession()) {
            if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_leave_types']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_leave_types'] == 0){
                return response()->view('errors.401', [], 404);
            }
            else {
                return view('pages.leaves.list_type');
            }
        }
        else return view('pages.login');
    }

    //API CALLS
    public function get_all_leave_type(Request $request)
    {
        $response = Helpers::callAPI('GET', "/leave_types");

        return $response;
    }

    public function get_one_leave_type($id)
    {
        $response = Helpers::callAPI('GET', "/leave_types/{$id}");

        return response()->json($response, 200);
    }

    public function get_one_leave($id)
    {
        $response = Helpers::callAPI('GET', "/leaves/{$id}");

        return response()->json($response, 200);
    }

    public function create_type(Request $request)
    {
        $response = Helpers::callAPI( "POST", "/leave_types" , $this->get_type_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            $message =  "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> Leave Type Successfully Created!</div>";
        }
        else{
            $error = Helpers::getError($response);
            $message =  "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }

        return $message;
    }

    public function update_type(Request $request, $id)
    {
        $response = Helpers::callAPI( "PUT", "/leave_types/{$id}", $this->get_type_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            return "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> Leave Type Information Successfully Updated!</div>";
        }
        else{
            $error = Helpers::getError($response);
            return "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }
    }

    public function delete_type($id){

        $response  = Helpers::callAPI('DELETE', "/leave_types/{$id}");

        if($response['code'] == 201 || $response['code'] == 200){
            $code    = "success";
            $message =  "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> Leave Type Successfully Deleted!</div>";
        }
        else{
            $code = "error";
            $error = Helpers::getError($response);
            $message = "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }

        return response()->json(['message' => $message, 'code' => $code], 200);
    }

    public function get_type_array($request){
        $data = [
            'name'        => $request->LeaveTypeName,
            'description' => $request->LeaveTypeDescription
        ];

        return $data;
    }

    public function create(Request $request)
    {
        $response = Helpers::callAPI( "POST", "/leaves" , $this->get_leave_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            $message =  "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> Leave Successfully Created!</div>";
        }
        else{
            $error = Helpers::getError($response);
            $message =  "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }

        return $message;
    }

    public function update(Request $request, $id)
    {
        $response = Helpers::callAPI( "PUT", "/leaves/{$id}" , $this->get_leave_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            return "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> Leave Information Successfully Updated!</div>";
        }
        else{
            $error = Helpers::getError($response);
            return "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }
    }

    public function delete_leave($id){

        $response  = Helpers::callAPI('DELETE', "/leaves/{$id}");

        if($response['code'] == 201 || $response['code'] == 200){
            $code    = "success";
            $message =  "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> Leave Successfully Deleted!</div>";
        }
        else{
            $code = "error";
            $error = Helpers::getError($response);
            $message = "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }

        return response()->json(['message' => $message, 'code' => $code], 200);
    }

    public function get_leave_array(Request $request){

        $data = [
            'user'                => $request->LeaveUser,
            'last_day_of_work'    => $request->LeaveLastWorkingDay,
            'from_date'           => $request->LeaveFromDate,
            'to_date'             => $request->LeaveToDate,
            'comments'            => $request->LeaveNotes,
            'leave_type'          => $request->LeaveType,
            'specific_leave_type' => $request->LeaveTypeSpecific,
            'address_on_leave'    => $request->LeaveAddress,
            'email_on_leave'      => $request->LeaveEmail,
            'phone_on_leave'      => $request->LeavePhoneNumber,
            'old_attachment'      => $request->LeaveOldAttachment,
            'attachment'          => Helpers::getFileContent($request, "LeaveAttachment"),
        ];

        return $data;
    }


}