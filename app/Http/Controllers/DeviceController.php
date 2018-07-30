<?php
/**
 * Created by PhpStorm.
 * User: carlos_pambo
 * Date: 3/13/18
 * Time: 9:44 PM
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Helpers;

class DeviceController extends Controller
{
    //WEB CALLS
    public function index(){

        if(Helpers::hasValidSession()) {
            if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_devices']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_devices'] == 0){
                return response()->view('errors.401', [], 404);
            }
            else {
                $r_department = Helpers::callAPI('GET', "/departments");
                return view('pages.devices.list', [
                    'departments' => $r_department['data']
                ]);
            }
        }
        else return view('pages.login');
    }

    public function add(){


        if(Helpers::hasValidSession()) {
            if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_devices']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_devices'] == 0){
                return response()->view('errors.401', [], 404);
            }
            else {
                $r_department = Helpers::callAPI('GET', "/departments");
                $r_user = Helpers::callAPI('GET', "/users/list/all");

                return view('pages.devices.add', [
                    'departments' => $r_department['data'],
                    'users' => $r_user['data']
                ]);
            }
        }
        else return view('pages.login');
    }

    public function upload(){

        return view('errors.404');

        if(Helpers::hasValidSession()) {

            return view('pages.devices.upload');
        }
        else return view('pages.login');
    }

    public function edit($id)
    {
        if(Helpers::hasValidSession()) {
            if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_devices']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_devices'] == 0){
                return response()->view('errors.401', [], 404);
            }
            else {
                $r_department = Helpers::callAPI('GET', "/departments");
                $r_user = Helpers::callAPI('GET', "/users/list/all");
                $r_device = Helpers::callAPI('GET', "/devices/{$id}");

                return view('pages.devices.edit', [
                    'departments' => $r_department['data'],
                    'device' => $r_device['data'],
                    'users' => $r_user['data']
                ]);
            }
        }
        else return view('pages.login');
    }

    //API CALLS
    public function get_all(Request $request)
    {
        $WHEREDepartment = "";
        if(isset($request->department) && $request->department != ""){
            $WHEREDepartment = "?department={$request->department}";
        }

        $r_device= Helpers::callAPI('GET', "/devices{$WHEREDepartment}");

        return $r_device['data'];
    }

    public function get_one($id)
    {
        $r_device = Helpers::callAPI('GET', "/devices/{$id}");

        return response()->json($r_device, 200);
    }

    public function create(Request $request)
    {
        $response = Helpers::callAPI( "POST", "/devices" , $this->get_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            $message =  "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> Device Successfully Created!</div>";
        }
        else{
            $error = Helpers::getError($response);
            $message =  "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }

        return $message;
    }

    public function update(Request $request, $id)
    {
        $response = Helpers::callAPI( "PUT", "/devices/{$id}" , $this->get_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            return "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> Device Information Successfully Updated!</div>";
        }
        else{
            $error = Helpers::getError($response);
            return "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }
    }

    public function delete($id){

        $response  = Helpers::callAPI('DELETE', "/devices/{$id}");

        if($response['code'] == 201 || $response['code'] == 200){
            $code    = "success";
            $message =  "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> Device Successfully Deleted!</div>";
        }
        else{
            $code = "error";
            $error = Helpers::getError($response);
            $message = "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }

        return response()->json(['message' => $message, 'code' => $code], 200);
    }

    public function get_array($request){
        $data = [
            'imei_number'     => $request->DeviceImeiNumber,
            'serial_number'   => $request->DeviceSerialNumber,
            'phone_number'    => $request->DeviceSerialNumber,
            'name'            => $request->DeviceName,
            'status'          => $request->DeviceStatus,
            'supervisor'      => $request->DeviceSupervisor,
            'allocation_date' => $request->DeviceSupervisor,
            'department'      => $request->DeviceDepartment,
        ];

        return $data;
    }

}