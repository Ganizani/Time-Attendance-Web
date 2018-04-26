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

class DepartmentController extends Controller
{
    //WEB CALLS
    public function index()
    {
        if(Helpers::hasValidSession()) {
            return view('pages.departments.list');
        }
        else return view('pages.login');
    }

    public function add()
    {
        if(Helpers::hasValidSession()) {
            return view('pages.departments.add');
        }
        else return view('pages.login');
    }

    public function edit($id)
    {
        if(Helpers::hasValidSession()) {
            $r_department = Helpers::callAPI('GET', "/departments/" . $id, "");

            return view('pages.departments.edit',[
                'department' => $r_department['data']
            ]);
        }
        else return view('pages.login');
    }

    public function upload()
    {
        return view('errors.404');

        if(Helpers::hasValidSession()) {
           return view('pages.departments.upload');
        }
        else return view('pages.login');
    }

    //API CALLS
    public function get_all()
    {
        $response = Helpers::callAPI('GET', "/departments");

        return $response;
    }

    public function get_one($id)
    {
        $response = Helpers::callAPI('GET', "/departments/" . $id, "");

        return $response['data'];
    }

    public function create(Request $request)
    {
        $response = Helpers::callAPI( "POST", "/departments" , $this->get_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            $message = "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> Department Successfully Created!</div>";
        }
        else{
            $error = Helpers::getError($response);
            $message =  "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }

        return $message;
    }

    public function update(Request $request, $id)
    {
        $response = Helpers::callAPI( "PUT", "/departments/" . $id, $this->get_array($request));

        if($response['code'] == 201 || $response['code'] == 200){
            $message =  "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> Department Information  Successfully Updated!</div>";
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