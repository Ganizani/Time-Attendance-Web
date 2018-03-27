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

class EmployeeController extends Controller
{
    public function index()
    {
        return view('pages.employees.list');
        if(Helpers::hasValidSession()) {

            //Recently Added
            $today    = date('Y-m-d');
            $users    = $response = Helpers::callAPI('GET', "/learners?recently=true", "");
            $expiring = $response = Helpers::callAPI('GET', "/learners/expiring", "");
            $active   = $response = Helpers::callAPI('GET', "/learners/active", "");
            $absent   = $response = Helpers::callAPI('GET', "/learners/absents?date={$today}", "");

            return view('pages.home', [
                'employees'     => $users['data'],
                'expiring'  => $expiring['data'],
                'absents'   => $absent['data'],
                'active'    => $active['data']
            ]);
        }
        else return view('pages.login');
    }

    public function add()
    {
        return view('pages.employees.add');
        if(Helpers::hasValidSession()) {

            //Recently Added
        $today    = date('Y-m-d');
        $users    = $response = Helpers::callAPI('GET', "/learners?recently=true", "");
        $expiring = $response = Helpers::callAPI('GET', "/learners/expiring", "");
        $active   = $response = Helpers::callAPI('GET', "/learners/active", "");
        $absent   = $response = Helpers::callAPI('GET', "/learners/absents?date={$today}", "");

        return view('pages.home', [
            'employees'     => $users['data'],
            'expiring'  => $expiring['data'],
            'absents'   => $absent['data'],
            'active'    => $active['data']
        ]);
    }
        else return view('pages.login');
    }

    public function upload()
    {
        return view('pages.employees.upload');
        if(Helpers::hasValidSession()) {

            //Recently Added
            $today    = date('Y-m-d');
            $users    = $response = Helpers::callAPI('GET', "/learners?recently=true", "");
            $expiring = $response = Helpers::callAPI('GET', "/learners/expiring", "");
            $active   = $response = Helpers::callAPI('GET', "/learners/active", "");
            $absent   = $response = Helpers::callAPI('GET', "/learners/absents?date={$today}", "");

            return view('pages.home', [
                'employees'     => $users['data'],
                'expiring'  => $expiring['data'],
                'absents'   => $absent['data'],
                'active'    => $active['data']
            ]);
        }
        else return view('pages.login');
    }

    public function myAccount()
    {
        return view('pages.employees.my_account');
        if(Helpers::hasValidSession()) {

            //Recently Added
            $today    = date('Y-m-d');
            $users    = $response = Helpers::callAPI('GET', "/learners?recently=true", "");
            $expiring = $response = Helpers::callAPI('GET', "/learners/expiring", "");
            $active   = $response = Helpers::callAPI('GET', "/learners/active", "");
            $absent   = $response = Helpers::callAPI('GET', "/learners/absents?date={$today}", "");

            return view('pages.home', [
                'employees'     => $users['data'],
                'expiring'  => $expiring['data'],
                'absents'   => $absent['data'],
                'active'    => $active['data']
            ]);
        }
        else return view('pages.login');
    }
}
