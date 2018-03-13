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

class CompanyController extends Controller
{
    //WEB CALLS
    public function index()
    {
        return view('pages.companies.list');
        /*if(Helpers::hasValidSession()) {
            if($_SESSION['GANIZANI-EMPLG-USER-TYPE'] < 3) {
                return view('pages.companies.list');
            }
            else{
                return view('errors.503');
            }
        }
        else return view('pages.login');*/
    }

    public function add()
    {
        return view('pages.companies.add');
        /*if(Helpers::hasValidSession()) {
            if($_SESSION['SETA-EMPLG-USER-TYPE'] < 3) {
                return view('pages.companies.add');
            }
            else{
                return view('pages.errors.auth');
            }
        }
        else return view('pages.login');*/
    }

    public function edit($id)
    {
        return view('pages.companies.edit');
        /*if(Helpers::hasValidSession()) {
            if($_SESSION['SETA-EMPLG-USER-TYPE'] < 3) {
                $r_comp = Helpers::callAPI('GET', "/companies/" . $id, "");
                return view('pages.companies.edit', [
                    'company' => $r_comp['data']
                ]);
            }
            else{
                return view('pages.errors.auth');
            }
        }
        else return view('pages.login');*/
    }

    public function upload()
    {
        return view('pages.companies.upload');
        /*if(Helpers::hasValidSession()) {

            if($_SESSION['SETA-EMPLG-USER-TYPE'] < 3) {
                return view('pages.companies.upload');
            }
            else{
                return view('pages.errors.auth');
            }
        }
        else return view('pages.login');*/
    }

    //API CALLS
    public function get_all()
    {
        $response = Helpers::callAPI('GET', "/companies", "");

        $val = ($response['data'] != "")? $response['data'] : [];

        return response()->json(["data" => $val], 200);
    }

    public function get_one($id)
    {
        $response = Helpers::callAPI('GET', "/companies/" . $id, "");

        $val = ($response['data'] != "")? $response['data'] : [];

        return response()->json(["data" => $val], 200);
    }

    public function create(Request $request)
    {
        $response = Helpers::callAPI( "POST", "/companies" , $this->get_array($request));

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
        $response = Helpers::callAPI( "PUT", "/companies/" . $id, $this->get_array($request, 'edit'));

        if($response['code'] == 201 || $response['code'] == 200){
            return "<div class='alert alert-success'><b><button class='close' data-dismiss='alert'></button>Success:</b> {$response['data']}</div>";
        }
        else{
            $error = Helpers::getError($response);

            return "<div class='alert alert-danger'><b><button class='close' data-dismiss='alert'></button>Error:</b> {$error}</div>";
        }
    }


    public function select_options(Request $request)
    {
        if(isset($request->company_id) &&  $request->company_id != "") {
            $response = Helpers::callAPI('GET', "/companies/" . $request->company_id . "/sites", "");
        }
        else{
            $response = Helpers::callAPI('GET', "/sites", "");
        }

        $data = "<option value=''>-- Sites --</option>";
        foreach ($response['data'] as $item) {
            $data = $data . "<option value='" . $item['id'] . "'> " . $item['name'] . "</option>";
        }

        return $data;
    }

    public function get_array($request , $method = 'add')
    {
        $data = [
            'name'              => $request->CompanyName,
            'contact_person'    => $request->CompanyContactPerson,
            'email'             => $request->CompanyEmail,
            'login_id'          => $request->CompanyLoginId,
            'password'          => $request->CompanyLoginPassword,
            'phone_number'      => $request->CompanyPhoneNumber,
            'address'           => $request->CompanyAddress,
            'website'           => $request->CompanyWebsite,
        ];

        return $data;
    }
}