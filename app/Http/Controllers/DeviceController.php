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
        return view('pages.devices.list');

        /*if(Helpers::hasValidSession()) {
            if($_SESSION['GANI-EMPLG-USER-TYPE'] < 3) {
                return view('pages.devices.list');
            }
            else {
                return view('errors.503');
            }
        }
        else return view('pages.login');*/
    }

    public function add(){

        return view('pages.devices.add');

        /*if(Helpers::hasValidSession()) {
            if($_SESSION['SETA-EMPLG-USER-TYPE'] < 3) {
                $r_site  = Helpers::callAPI('GET', "/sites", "");

                return view('pages.devices.add' ,[
                    'sites' => $r_site['data']
                ]);
            }
            else {
                return view('errors.503');
            }
        }
        else return view('pages.login');*/
    }

    public function upload(){

        return view('pages.devices.upload');

        /*if(Helpers::hasValidSession()) {
            if($_SESSION['SETA-EMPLG-USER-TYPE'] < 3) {
                return view('pages.devices.upload');
            }
            else {
                return view('errors.503');
            }
        }
        else return view('pages.login');*/
    }

    public function edit($id)
    {
        return view('pages.devices.edit');

        /*if(Helpers::hasValidSession()) {
            if($_SESSION['SETA-EMPLG-USER-TYPE'] < 3) {
                $r_site   = Helpers::callAPI('GET', "/sites", "");
                $r_device = Helpers::callAPI('GET', "/devices/" . $id, "");

                return view('pages.devices.edit', [
                    'sites'  => $r_site['data'],
                    'device' => $r_device['data']
                ]);
            }
            else {
                return view('errors.503');
            }
        }
        else return view('pages.login');*/
    }

    //API CALLS
    public function get_all()
    {
        $r_device= Helpers::callAPI('GET', "/devices", "");

        return response()->json(["data" => $r_device['data']], 200);
    }

    public function get_one($id)
    {
        $r_device = Helpers::callAPI('GET', "/devices/" . $id, "");

        return response()->json(["data" => $r_device['data']], 200);
    }

    public function create(Request $request)
    {
        $response = Helpers::callAPI( "POST", "/devices" , $this->get_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            return "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> {$response['data']}</div>";
        }
        else{
            $error = Helpers::getError($response);
            return "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }
    }

    public function update(Request $request, $id)
    {
        $response = Helpers::callAPI( "PUT", "/devices/" . $id , $this->get_array($request, "edit"));

        if($response['code'] == 201 || $response['code'] == 200){
            return "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> {$response['data']}</div>";
        }
        else{
            $error = Helpers::getError($response);
            return "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }
    }

    public function get_array($request , $method = 'add'){
        if (session_status() == PHP_SESSION_NONE) session_start();

        $data = [
            'id'             => $request->has('DeviceId') ? $request->DeviceId : null,
            'imei_number'    => $request->DeviceImeiNumber,
            'device_name'    => $request->DeviceName,
            'status'         => $request->DeviceStatus,
            'supervisor'     => $request->DeviceSupervisor,
            'created_by'     => isset($_SESSION['SETA-EMPLG-ID'])? $_SESSION['SETA-EMPLG-ID'] : "",
            'updated_by'     => isset($_SESSION['SETA-EMPLG-ID'])? $_SESSION['SETA-EMPLG-ID'] : "",
            'site'           => $request->DeviceSite,
        ];

        if ($method == "add") {
            $data = array_except($data, ['id']);
        }

        return $data;
    }

}