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
            $r_leave_type = Helpers::callAPI("GET", "/leave_types");
            $r_users = Helpers::callAPI('GET', "/users");

            return view('pages.leaves.add_leave', [
                'leave_types' => $r_leave_type['data'],
                'users'       => $r_users['data']
            ]);
        }
        else return view('pages.login');
        /*if(Helpers::hasValidSession()) {

            if($_SESSION['SETA-EMPLG-USER-TYPE'] < 3) {
                $r_type    = Helpers::callAPI('GET', "/leave_types", "");
                $r_learner = Helpers::callAPI('GET', "/learners", "");

                return view('pages.leaves.add_leave',[
                    'leave_types' => $r_type['data'],
                    'learners'    => $r_learner['data']
                ]);
            }
            else {
                return view('pages.errors.auth');
            }
        }
        else return view('pages.login');*/
    }

    public function edit_leave($id)
    {
        if(Helpers::hasValidSession()) {
            $r_leave = Helpers::callAPI('GET', "/leaves/{$id}");
            $r_type  = Helpers::callAPI('GET', "/leave_types");
            $r_users = Helpers::callAPI('GET', "/users");

            return view('pages.leaves.edit_leave', [
                'leave'       => $r_leave['data'],
                'leave_types' => $r_type['data'],
                'users'       => $r_users['data']
            ]);
        }
        else return view('pages.login');
    }

    public function upload_leave()
    {
        if(Helpers::hasValidSession()) {
            return view('pages.leaves.upload_leave');
        }
        else return view('pages.login');
    }

    public function add_type(){

        if(Helpers::hasValidSession()) {
            return view('pages.leaves.add_type');
        }
        else return view('pages.login');
    }

    public function edit_type($id)
    {
        $r_type  = Helpers::callAPI('GET', "/leave_types/{$id}");

        if(Helpers::hasValidSession()) {
            return view('pages.leaves.edit_type', [
                'leave_type' => $r_type['data']
            ]);
        }
        else return view('pages.login');
    }

    public function list_type(){

        if(Helpers::hasValidSession()) {
            return view('pages.leaves.list_type');
        }
        else return view('pages.login');
    }

    //API CALLS
    public function get_all_leave_type(Request $request)
    {
        $r_type = Helpers::callAPI('GET', "/leave_types");

        return $r_type;
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
        $response = Helpers::callAPI( "PUT", "/leave_types/" . $id , $this->get_type_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            return "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> Leave Type Information Successfully Updated!</div>";
        }
        else{
            $error = Helpers::getError($response);
            return "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }
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
        $response = Helpers::callAPI( "PUT", "/leaves/" . $id , $this->get_leave_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            return "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> Leave Information Successfully Updated!</div>";
        }
        else{
            $error = Helpers::getError($response);
            return "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }
    }

    public function get_leave_array(Request $request){

        $data = [
            'user'             => $request->LeaveUser,
            'last_day_of_work' => $request->LeaveLastWorkingDay,
            'from_date'        => $request->LeaveFromDate,
            'to_date'          => $request->LeaveToDate,
            'comments'         => $request->LeaveNotes,
            'leave_type'       => $request->LeaveType,
            'address_on_leave' => $request->LeaveAddress,
            'email_on_leave'   => $request->LeaveEmail,
            'phone_on_leave'   => $request->LeavePhoneNumber,
            'old_attachment'   => $request->LeaveOldAttachment,
            'attachment'       => Helpers::getFileContent($request, "LeaveAttachment"),
        ];

        return $data;
    }


}