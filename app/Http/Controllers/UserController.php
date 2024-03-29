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
    private $user_id;

    function __construct(){
        if(Helpers::hasValidSession()){
            $this->user_id = $_SESSION['GANIZANI-EMPLG-ID'];
        }
        else $this->user_id = -100;
    }

    //WEB CALLS
    public function index(){

        if(Helpers::hasValidSession()) {
            $departments = Helpers::callAPI("GET", "/departments");
            $user_groups = Helpers::callAPI("GET", "/user_groups");

            return view('pages.users.list', [
                'departments' => $departments['data'],
                'user_groups' => $user_groups['data'],
            ]);
        }
        else return view('pages.login');
    }

    public function add(){

        if(Helpers::hasValidSession()) {
            $users       = Helpers::callAPI("GET", "/users");
            $supervisors = Helpers::callAPI("GET", "/users");
            $departments = Helpers::callAPI("GET", "/departments");
            $user_groups = Helpers::callAPI("GET", "/user_groups");

            return view('pages.users.add', [
                'users'       => $users['data'],
                'supervisors' => $supervisors['data'],
                'departments' => $departments['data'],
                'user_groups' => $user_groups['data'],
            ]);
        }
        else return view('pages.login');
    }

    public function edit($id){

        //return view('errors.401');

        if(Helpers::hasValidSession()) {

            $user = Helpers::callAPI("GET", "/users/{$id}");
            $supervisors = Helpers::callAPI("GET", "/users");
            $departments = Helpers::callAPI("GET", "/departments");
            $user_groups = Helpers::callAPI("GET", "/user_groups");

            return view('pages.users.edit',[
                'user'        => $user['data'],
                'supervisors' => $supervisors['data'],
                'departments' => $departments['data'],
                'user_groups' => $user_groups['data'],

            ]);
        }
        else return view('pages.login');
    }

    public function upload(){

        return view('errors.404');

        if(Helpers::hasValidSession()) {
            return view('pages.users.upload');
        }
        else return view('pages.login');
    }

    public function myAccount(){

        if(Helpers::hasValidSession()) {
            $user = Helpers::callAPI("GET", "/users/{$this->user_id}");
            $departments = Helpers::callAPI("GET", "/departments");
            $supervisors = Helpers::callAPI("GET", "/users");
            $user_groups = Helpers::callAPI("GET", "/user_groups");

            return view('pages.users.my_account', [
                'user' => $user['data'],
                'departments' => $departments['data'],
                'supervisors' => $supervisors['data'],
                'user_groups' => $user_groups['data'],
            ]);
        }
        else return view('pages.login');
    }

    public function updatePassword(){
        if(Helpers::hasValidSession()) {
            $user = Helpers::callAPI("GET", "/users/{$this->user_id}");

            return view('pages.users.password', [
                'user' => $user['data']
            ]);
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

        if($response['code'] == "201" || $response['code'] == "200"
         || $response['code'] == 201 || $response['code'] == 200) {

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
            $_SESSION['GANIZANI-EMPLG-USER-TYPE-NAME']   = isset($response['data']['user_group']['name']) ? $response['data']['user_group']['name'] : "";
            $_SESSION['GANIZANI-EMPLG-EMAIL']            = $response['data']['email'];
            $_SESSION['GANIZANI-EMPLG-STATUS']           = $response['data']['status'];
            $_SESSION['GANIZANI-EMPLG-ACCESS-TOKEN']     = $response['data']['token'];
            $_SESSION['GANIZANI-EMPLG-PROFILE-PICTURE']  = $response['data']['profile_picture'];
            $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']   = isset($response['data']['user_group']['access_control']) ? $response['data']['user_group']['access_control'] : [];

            $data = [
                'status'  => 'success',
                'message' => '',
                'url'     => (isset($response['data']['user_group']['access_control']['system_admin']) && $response['data']['user_group']['access_control']['system_admin'] == 1)  ? '/dashboard' : '/my-account'
            ];
        }
        else{
            $error = Helpers::getError($response);
            $data = [
                'status'  => 'error',
                'message' => "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>",
                'url'     => ''
            ];
        }

        //die(json_encode($data));
        return response()->json($data, 200);
    }

    public function get_all(Request $request)
    {
        $r_user = Helpers::callAPI('GET', "/users", $this->get_search_array($request));

        return response()->json($r_user['data'], 200);
    }

    public function get_one($id)
    {
        $r_user = Helpers::callAPI('GET', "/users/{$id}");

        return response()->json($r_user, 200);
    }

    public function clock(Request $request)
    {
        $response = Helpers::callAPI( "POST", "/records/clock" , $this->get_clock_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            $message =  "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> Clock For: <b>{$request->txt_username}</b> Have Successfully Been Registered!</div>";
        }
        else{
            $error = Helpers::getError($response);
            $message =  "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }

        return $message;
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
        $response = Helpers::callAPI( "PUT", "/users/{$id}"  , $this->get_array($request));

        //die(json_encode($this->get_array($request)));
        if($response['code'] == 201 || $response['code'] == 200){
            return "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> User Information Successfully Updated!</div>";
        }
        else{
            $error = Helpers::getError($response);
            return "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }
    }

    public function delete($id){

        $response  = Helpers::callAPI('DELETE', "/users/{$id}");

        if($response['code'] == 201 || $response['code'] == 200){
            $code    = "success";
            $message =  "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> User Successfully Deleted!</div>";
        }
        else{
            $code = "error";
            $error = Helpers::getError($response);
            $message = "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }

        return response()->json(['message' => $message, 'code' => $code], 200);
    }


    public function update_password(Request $request, $id)
    {
        $response = Helpers::callAPI( "POST", "/users/update_password/{$id}" , $this->get_password_array($request));


        if($response['code'] == 201 || $response['code'] == 200){
            return "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> Password Successfully Updated!</div>";
        }
        else{
            $error = Helpers::getError($response);
            return "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }
    }

    public function update_my_account(Request $request)
    {
        //die(json_encode($this->get_array($request)));
        $response = Helpers::callAPI( "PUT", "/users/{$this->user_id}" , $this->get_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            return "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> User Information Successfully Updated!</div>";
        }
        else{
            $error = Helpers::getError($response);
            return "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }
    }

    public function forgot_password_data(Request $request)
    {
        $response = Helpers::callAPI( "POST", "/users/forgot_password" , $this->get_forgot_password_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            $data = (isset($response['data']) && $response['data'] != "") ? $response['data']  : "Password reset Link has been sent to {$request->txt_username}, The link is valid for 24 Hours.";
            return "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> {$data} </div>";
        }
        else{
            $error = Helpers::getError($response);
            return "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }
    }

    public function reset_password_data(Request $request)
    {
        //die(json_encode($this->get_reset_password_array($request)));
        $response = Helpers::callAPI( "POST", "/users/reset_password" , $this->get_reset_password_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            $data = (isset($response['data']) && $response['data'] != "") ? $response['data']  : "Password Successfully Reset.";
            return "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> {$data} </div>";
        }
        else{
            $error = Helpers::getError($response);
            return "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }
    }

    public function get_search_array($request){

        $data = [
            'department' => $request->department,
        ];

        return $data;
    }

    public function get_clock_array($request){

        $data = [
            'status'    => $request->Status,
            'email'     => $request->Username,
            'latitude'  => (isset($request->Latitude) && $request->Latitude != null) ? $request->Latitude : 0,
            'longitude' => (isset($request->Longitude) && $request->Longitude != null) ? $request->Longitude : 0,
            'password'  => $request->Password,
        ];

        return $data;
    }

    public function get_forgot_password_array($request){
        $data = [
            'email' => $request->txt_username
        ];

        return $data;
    }

    public function get_reset_password_array($request){
        $data = [
            'email'     => $request->txt_email,
            'token'     => $request->txt_token,
            'password'  => $request->txt_password,
            'password_confirmation' => $request->txt_confirm_password
        ];

        return $data;
    }

    public function get_password_array($request){
        $data = [
            'password'              => $request->UserPassword,
            'password_confirmation' => $request->UserConfirmPassword
        ];

        return $data;
    }

    public function get_array($request){
        //$request->UserStatus,
        //$request->UserType,
        $data = [
            'title'             => $request->UserTitle,
            'first_name'        => $request->UserFirstName,
            'last_name'         => $request->UserLastName,
            'preferred_name'    => $request->UserPreferredName,
            'maiden_name'       => $request->UserMaidenName,
            'middle_name'       => $request->UserMiddleName,
            'status'            => "ACTIVE",
            'user_type'         => $request->UserType,
            'phone_number'      => $request->UserCellPhone,
            'gender'            => $request->UserGender,
            'nationality'       => $request->UserNationality,
            'id_number'         => $request->UserIdNumber,
            'email'             => $request->UserEmail,
            'work_location'     => $request->UserWorkLocation,
            'uif_number'        => $request->UserUIFNumber,
            'payment_number'    => $request->UserPaymentNumber,
            'work_email'        => $request->UserWorkEmail,
            'work_cell_phone'   => $request->UserWorkCellPhone,
            'work_phone'        => $request->UserWorkPhone,
            'start_date'        => $request->UserStartDate,
            'department'        => $request->UserDepartment,
            'supervisor'        => $request->UserReportingTo,
            'job_title'         => $request->UserJobTitle,
            'employee_code'     => $request->UserEmployeeId,
            'cell_phone'        => $request->UserCellPhone,
            'home_phone'        => $request->UserHomePhone,
            'marital_status'    => $request->UserMaritalStatus,
            'spouse'            => [
                'id'            => isset($request->UserSpouseId) ? $request->UserSpouseId : null,
                'name'          => $request->UserSpouseName,
                'employer'      => $request->UserSpouseEmployer,
                'work_location' => $request->UserSpouseEmployer,
                'work_phone'    => $request->UserSpouseWorkPhone,
                'cell_phone'    => $request->UserSpouseCellNumber
            ],
            'address'           => [
                'id'            => isset($request->UserAddressId) ? $request->UserAddressId : null,
                'province'      => $request->UserAddressProvince,
                'city'          => $request->UserAddressCity,
                'suburb'        => $request->UserAddressSuburb,
                'street_name'   => $request->UserAddressStreetName,
                'street_number' => $request->UserAddressStreetNo,
                'house_number'  => $request->UserAddressHouseNo,
            ],
            'next_of_kin'       => [
                'id'            => isset($request->UserEmergencyId) ? $request->UserEmergencyId : null,
                'relationship'  => $request->UserEmergencyRelationship,
                'email'         => $request->UserEmergencyEmail,
                'cell_phone'    => $request->UserEmergencyCellPhone,
                'home_phone'    => $request->UserEmergencyHomePhone,
                'middle_name'   => $request->UserEmergencyMiddleName,
                'first_name'    => $request->UserEmergencyFirstName,
                'last_name'     => $request->UserEmergencySurname,
                'address'       => [
                    'id'            => isset($request->UserEmergencyAddressId) ? $request->UserEmergencyAddressId : null,
                    'province'      => $request->UserEmergencyProvince,
                    'city'          => $request->UserEmergencyCity,
                    'suburb'        => $request->UserEmergencySuburb,
                    'street_name'   => $request->UserEmergencyStreetName,
                    'street_number' => $request->UserEmergencyStreetNo,
                    'house_number'  => $request->UserEmergencyHouseNo,
                ]
            ]
        ];

        return $data;
    }
}
