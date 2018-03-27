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
            return view('pages.devices.list');
        }
        else return view('pages.login');
    }

    public function add(){

        if(Helpers::hasValidSession()) {
            return view('pages.devices.add');
        }
        else return view('pages.login');
    }

    public function upload(){

        if(Helpers::hasValidSession()) {
            return view('pages.devices.upload');
        }
        else return view('pages.login');
    }

    public function edit($id)
    {
        if(Helpers::hasValidSession()) {
            return view('pages.devices.edit');
        }
        else return view('pages.login');
    }

    //API CALLS
    public function get_all()
    {
        $r_device= Helpers::callAPI('GET', "/devices", "");

        return $r_device['data'];
    }

    public function get_one($id)
    {
        $r_device = Helpers::callAPI('GET', "/devices/" . $id, "");

        return $r_device['data'];
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
        $response = Helpers::callAPI( "PUT", "/devices/" . $id , $this->get_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            return "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> Device Information Successfully Updated!</div>";
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