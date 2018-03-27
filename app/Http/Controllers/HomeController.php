<?php
/**
 * Created by PhpStorm.
 * User: carlos_pambo
 * Date: 3/13/18
 * Time: 9:25 PM
 */

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Helpers;

class HomeController extends Controller
{
    public function index()
    {
        if(Helpers::hasValidSession()) {
            //Recently Added
            return view('pages.home');
        }
        else return view('pages.login');
    }

    public function login()
    {
        session_start();
        session_destroy();
        return view('pages.login');
    }

    public function logout()
    {
        session_start();
        session_destroy();
        return view('pages.login');
    }

    public function forgot_password()
    {
        session_start();
        session_destroy();
        return view('pages.forgot_password');
    }

    public function reset_password(Request $request)
    {
        session_start();
        session_destroy();

        $user['data'] = ['email' => '', 'token' => ''];
        if(isset($request->token)) {
            $user = $response = Helpers::callAPI('GET', "/users/token/" . $request->token, "");
        }
        return view('pages.reset_password', [
            'user' => $user['data']
        ]);
    }

    //API CALLS
    public function recent_records(Request $request)
    {
        $today = date("Y-m-d");

        $response = Helpers::callAPI('GET', "/records/recently");

        $val = ($response['data'] != "")? $response['data'] : [];

        return response()->json(["data" => $val], 200);
    }
}
