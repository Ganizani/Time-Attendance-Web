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
    private $today;

    public function __construct(){

        $this->today = date("Y-m-d");
    }

    public function index()
    {
        if(Helpers::hasValidSession()) {
            //Recently Added
            $users = Helpers::callAPI('GET', "/users/recently");

            //die(json_encode($users['data']));
            return view('pages.home', [
                'users' => $users['data']
            ]);
        }
        else return view('pages.login');
    }

    public function login()
    {
        session_start();
        session_destroy();
        return view('pages.login');
    }

    public function clock_in_out()
    {
        return view('pages.clock');
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

        $response = Helpers::callAPI('GET', "/records/recently");

        return response()->json(["data" => $response['data']], 200);
    }

    public function  dashboard_info(Request $request){
        $leave    = Helpers::callAPI('GET', "/users/leave?date={$this->today}");
        $active   = Helpers::callAPI('GET', "/users/active");
        $absent   = Helpers::callAPI('GET', "/users/absent?date={$this->today}");

        $data = [
            'leave'  => $leave['data'],
            'active' => $active['data'],
            'absent' => $absent['data']
        ];

        return response()->json($data, 200);
    }
}
