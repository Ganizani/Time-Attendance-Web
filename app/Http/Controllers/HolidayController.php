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
            if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_holidays']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['list_holidays'] == 0){
                return response()->view('errors.401', [], 404);
            }
            else {
                $r_departments = Helpers::callAPI('GET', "/departments");
                return view('pages.holidays.list', [
                    'departments' => isset($r_departments['data']) ? $r_departments['data'] : [],
                ]);
            }
        }
        else return view('pages.login');
    }

    public function add(){

        if(Helpers::hasValidSession()) {
            if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_holidays']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['add_holidays'] == 0){
                return response()->view('errors.401', [], 404);
            }
            else {
                $r_departments = Helpers::callAPI('GET', "/departments");

                return view('pages.holidays.add', [
                    'departments' => isset($r_departments['data']) ? $r_departments['data'] : [],
                ]);
            }
        }
        else return view('pages.login');

    }

    public function edit($id){

        if(Helpers::hasValidSession()) {
            if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_holidays']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['edit_holidays'] == 0){
                return response()->view('errors.401', [], 404);
            }
            else {
                $r_departments = Helpers::callAPI('GET', "/departments");
                $r_holiday     = Helpers::callAPI('GET', "/holidays/{$id}");

                return view('pages.holidays.edit', [
                    'departments' => isset($r_departments['data']) ? $r_departments['data'] : [],
                    'holiday'     => isset($r_holiday['data']) ? $r_holiday['data'] : [],
                ]);
            }
        }
        else return view('pages.login');
    }

    public function upload(){

        return view('errors.404');

        if(Helpers::hasValidSession()) {
            return view('pages.holidays.upload');
        }
        else return view('pages.login');
    }

    //API CALLS

    //API CALLS
    public function get_all(Request $request)
    {
        $WHEREDepartment = "";
        if(isset($request->department) && $request->department != ""){
            $WHEREDepartment = "?department={$request->department}";
        }

        $response = Helpers::callAPI('GET', "/holidays{$WHEREDepartment}");

        return $response['data'];
    }

    public function get_one($id)
    {
        $response = Helpers::callAPI('GET', "/holidays/{$id}");

        return response()->json($response, 200);
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
        $response = Helpers::callAPI( "PUT", "/holidays/{$id}", $this->get_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            $message =  "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> Holiday Information Successfully Updated!</div>";
        }
        else{
            $error = Helpers::getError($response);

            $message =  "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }

        return $message;
    }

    public function delete($id){

        $response  = Helpers::callAPI('DELETE', "/holidays/{$id}");

        if($response['code'] == 201 || $response['code'] == 200){
            $code    = "success";
            $message =  "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> Holiday Successfully Deleted!</div>";
        }
        else{
            $code = "error";
            $error = Helpers::getError($response);
            $message = "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }

        return response()->json(['message' => $message, 'code' => $code], 200);
    }

    public function get_array($request)
    {
        $data = [
            'name'        => isset($request->HolidayName) ? $request->HolidayName : "",
            'date'        => isset($request->HolidayDate) ? $request->HolidayDate : "",
            'description' => isset($request->HolidayDescription) ? $request->HolidayDescription : "",
            'department'  => isset($request->HolidayDepartment) ? $request->HolidayDepartment : "",
        ];

        return $data;
    }
}
