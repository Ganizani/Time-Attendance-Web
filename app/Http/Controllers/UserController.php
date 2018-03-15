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

class UserController extends Controller
{
    public function index()
    {

        return view('pages.users.list');

        if(Helpers::hasValidSession()) {

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
        else return view('pages.login');
    }

    public function add()
    {
        return view('pages.users.add');
        if(Helpers::hasValidSession()) {

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
        else return view('pages.login');
    }

    public function myAccount()
    {
        return view('pages.users.my_account');
        if(Helpers::hasValidSession()) {

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
        else return view('pages.login');
    }
}
