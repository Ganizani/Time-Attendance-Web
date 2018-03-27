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

class HolidayController extends Controller
{
    //WEB CALLS
    public function index(){

        if(Helpers::hasValidSession()) {
            return view('pages.holidays.list');
        }
        else return view('pages.login');
    }

    public function add(){

        if(Helpers::hasValidSession()) {
            return view('pages.holidays.add');
        }
        else return view('pages.login');

    }

    public function edit($id){

        if(Helpers::hasValidSession()) {
            $r_holiday = Helpers::callAPI('GET', "/departments/" . $id, "");

            return view('pages.holidays.edit', [
                'holiday' => $r_holiday['data']
            ]);
        }
        else return view('pages.login');
    }

    public function upload(){

        if(Helpers::hasValidSession()) {
            return view('pages.holidays.upload');
        }
        else return view('pages.login');
    }

    //API CALLS

    //API CALLS
    public function get_all()
    {
        $response = Helpers::callAPI('GET', "/departments", "");

        $val = ($response['data'] != "")? $response['data'] : [];

        return response()->json(["data" => $val], 200);
    }

    public function get_one($id)
    {
        $response = Helpers::callAPI('GET', "/departments/" . $id, "");

        $val = ($response['data'] != "")? $response['data'] : [];

        return response()->json(["data" => $val], 200);
    }

    public function create(Request $request)
    {
        $response = Helpers::callAPI( "POST", "/holidays" , $this->get_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            $message = "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> Holiday Successfully Created!</div>";
        }
        else{
            $error = Helpers::getError($response);
            $message =  "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }

        return $message;
    }

    public function update(Request $request, $id)
    {
        $response = Helpers::callAPI( "PUT", "/holidays/" . $id, $this->get_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            $message =  "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> Holiday Information Successfully Updated!</div>";
        }
        else{
            $error = Helpers::getError($response);

            $message =  "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }

        return $message;
    }

    public function get_array($request)
    {
        $data = [
            'name'        => $request->DepartmentName,
            'description' => $request->DepartmentDescription,
            'location'    => $request->DepartmentLocation,
        ];

        return $data;
    }
}
