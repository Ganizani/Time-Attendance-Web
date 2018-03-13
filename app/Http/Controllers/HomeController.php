<?php
/**
 * Created by PhpStorm.
 * User: carlos_pambo
 * Date: 3/13/18
 * Time: 7:51 PM
 */

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Helpers;

class HomeController extends Controller
{
    public function index()
    {
        /*if(Helpers::hasValidSession()) {

            //Recently Added
            $today    = date('Y-m-d');
            $users    = $response = Helpers::callAPI('GET', "/learners?recently=true", "");
            $expiring = $response = Helpers::callAPI('GET', "/learners/expiring", "");
            $active   = $response = Helpers::callAPI('GET', "/learners/active", "");
            $absent   = $response = Helpers::callAPI('GET', "/learners/absents?date={$today}", "");

            return view('pages.home', [
                'users'     => $users['data'],
                'expiring'  => $expiring['data'],
                'absents'   => $absent['data'],
                'active'    => $active['data']
            ]);
        }
        else return view('pages.login');*/

        return view('pages.home');
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

        $response = Helpers::callAPI('GET', "/records?from_date={$today}&to_date={$today}&recently=true", "");

        $val = ($response['data'] != "")? $response['data'] : [];

        return response()->json(["data" => $val], 200);
    }
}
