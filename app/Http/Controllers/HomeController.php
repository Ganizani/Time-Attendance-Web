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
    private $today, $user_id;

    public function __construct(){

        $this->today = date("Y-m-d");
        if(Helpers::hasValidSession()){
            $this->user_id = $_SESSION['GANIZANI-EMPLG-ID'];
        }
        else $this->user_id = -100;
    }

    public function index()
    {
        if(Helpers::hasValidSession()) {
            if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['system_admin']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['system_admin'] == 0){
                $user = Helpers::callAPI("GET", "/users/{$this->user_id}");
                $departments = Helpers::callAPI("GET", "/departments");
                $supervisors = Helpers::callAPI("GET", "/users");

                return view('pages.users.my_account', [
                    'user' => $user['data'],
                    'departments' => $departments['data'],
                    'supervisors' => $supervisors['data'],
                ]);
            }
            else {
                //Recently Added
                $users = Helpers::callAPI('GET', "/users/recently");

                //die(json_encode($users['data']));
                return view('pages.home', [
                    'users' => $users['data']
                ]);
            }
        }
        else return view('pages.login');
    }

    public function manual_clock()
    {
        if(Helpers::hasValidSession()) {
            if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['manual_clocking']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['manual_clocking'] == 0){
                return response()->view('errors.401', [], 404);
            }
            else {
                $user = Helpers::callAPI('GET', "/users/{$this->user_id}");

                return view('pages.admin.manual_clock', [
                    'user' => isset($user['data']) ? $user['data'] : []
                ]);
            }
        }
        else return view('pages.login');
    }

    public function apply_for_leave()
    {
        if(Helpers::hasValidSession()) {
            if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['apply_for_leave']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['apply_for_leave'] == 0){
                return response()->view('errors.401', [], 404);
            }
            else {
                $user        = Helpers::callAPI('GET', "/users/{$this->user_id}");
                $leave_types = Helpers::callAPI('GET', "/leave_types");

                return view('pages.admin.apply_for_leave', [
                    'user'        => isset($user['data']) ? $user['data'] : [],
                    'leave_types' => isset($leave_types['data']) ? $leave_types['data'] : []
                ]);
            }
        }
        else return view('pages.login');
    }

    public function login()
    {
        if (session_status() == PHP_SESSION_NONE) session_start();
        session_destroy();
        return view('pages.login');
    }

    public function clock_in_out()
    {
        if(Helpers::hasValidSession()) {
            if(isset($_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['system_admin']) && $_SESSION['GANIZANI-EMPLG-ACCESS-CONTROL']['system_admin'] == 0){
                $user = Helpers::callAPI("GET", "/users/{$this->user_id}");
                $departments = Helpers::callAPI("GET", "/departments");
                $supervisors = Helpers::callAPI("GET", "/users");

                return view('pages.users.my_account', [
                    'user' => $user['data'],
                    'departments' => $departments['data'],
                    'supervisors' => $supervisors['data'],
                ]);
            }
            else {
                //Recently Added
                $users = Helpers::callAPI('GET', "/users/recently");

                //die(json_encode($users['data']));
                return view('pages.home', [
                    'users' => $users['data']
                ]);
            }
        }
        else {
            return view('pages.clock');
        }
    }


    public function logout()
    {
        if (session_status() == PHP_SESSION_NONE) session_start();
        session_destroy();
        return view('pages.login');
    }

    public function forgot_password()
    {
        if (session_status() == PHP_SESSION_NONE) session_start();
        session_destroy();
        return view('pages.forgot_password');
    }

    public function reset_password(Request $request)
    {
        if (session_status() == PHP_SESSION_NONE) session_start();
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
    public function recent_records(Request $request){
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
