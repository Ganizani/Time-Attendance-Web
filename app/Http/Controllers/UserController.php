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

class UserController extends Controller
{
    //WEB CALLS
    public function index(){

        if(Helpers::hasValidSession()) {
            return view('pages.employees.list');
        }
        else return view('pages.login');
    }

    public function add(){

        if(Helpers::hasValidSession()) {
            return view('pages.employees.add');
        }
        else return view('pages.login');
    }

    public function upload(){

        if(Helpers::hasValidSession()) {
            return view('pages.employees.upload');
        }
        else return view('pages.login');
    }

    public function myAccount(){

        if(Helpers::hasValidSession()) {
            return view('pages.employees.my_account');
        }
        else return view('pages.login');
    }

    //API CALLS
    public function login(Request $request)
    {
        if($request->txt_username == "" || $request->txt_password == ""){
            $data = [
                'status'  => 'error',
                'message' => "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> Please fill in all required fields. </div>"
            ];
            return json_encode($data);
        }

        $data = [
            'email'    => $request->txt_username,
            'password' => $request->txt_password,
        ];

        $response = Helpers::callAPI("POST","/users/login", $data);

        if($response['code'] == 201 || $response['code'] == 200) {

            if (session_status() == PHP_SESSION_NONE) session_start();
            else{
                session_destroy();
                session_start();
            }

            $_SESSION['GANIZANI-EMPLG-ID']               = $response['data']['id'];
            $_SESSION['GANIZANI-EMPLG-TITLE']            = $response['data']['title'];
            $_SESSION['GANIZANI-EMPLG-FIRST-NAME']       = $response['data']['first_name'];
            $_SESSION['GANIZANI-EMPLG-LAST-NAME']        = $response['data']['last_name'];
            $_SESSION['GANIZANI-EMPLG-NAME']             = $response['data']['name'];
            $_SESSION['GANIZANI-EMPLG-GENDER']           = $response['data']['gender'];
            $_SESSION['GANIZANI-EMPLG-PHONE-NUMBER']     = $response['data']['phone_number'];
            $_SESSION['GANIZANI-EMPLG-USER-TYPE']        = $response['data']['user_type'];
            $_SESSION['GANIZANI-EMPLG-USER-TYPE-NAME']   = "Admin";
            $_SESSION['GANIZANI-EMPLG-EMAIL']            = $response['data']['email'];
            $_SESSION['GANIZANI-EMPLG-STATUS']           = $response['data']['status'];
            $_SESSION['GANIZANI-EMPLG-ACCESS-TOKEN']     = $response['data']['token'];
            $_SESSION['GANIZANI-EMPLG-PROFILE-PICTURE']  = $response['data']['profile_picture'];

            $data = [
                'status'  => 'success',
                'message' => ''
            ];
        }
        else{
            $error = Helpers::getError($response);
            $data = [
                'status'  => 'error',
                'message' => "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>"
            ];
        }

        return json_encode($data);
    }

    public function get_all()
    {
        $r_user = Helpers::callAPI('GET', "/users", "");

        return response()->json(["data" => $r_user['data']], 200);
    }

    public function get_one($id)
    {
        $r_user = Helpers::callAPI('GET', "/users/" . $id, "");

        return response()->json(["data" => $r_user['data']], 200);
    }

    public function create(Request $request)
    {
        $response = Helpers::callAPI( "POST", "/users" , $this->get_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            $message =  "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> User Information Successfully Created!</div>";
        }
        else{
            $error = Helpers::getError($response);
            $message =  "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }

        return $message;
    }

    public function update(Request $request, $id)
    {
        $response = Helpers::callAPI( "PUT", "/users/" . $id , $this->get_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            return "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> User Information Successfully Updated!</div>";
        }
        else{
            $error = Helpers::getError($response);
            return "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }
    }

    public function get_array($request){
        $data = [
            'imei_number'   => $request->DeviceImeiNumber,
            'serial_number' => $request->DeviceSerialNumber,
            'phone_number'  => $request->DeviceSerialNumber,
            'name'          => $request->DeviceName,
            'status'        => $request->DeviceStatus,
            'supervisor'    => $request->DeviceSupervisor,
            'department'    => $request->DeviceDepartment,
        ];

        return $data;
    }
}
