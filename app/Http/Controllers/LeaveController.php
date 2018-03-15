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

class LeaveController extends Controller
{
    //WEB CALLS
    public function add_leave(){

        return view('pages.leaves.add_leave');
        /*if(Helpers::hasValidSession()) {

            if($_SESSION['SETA-EMPLG-USER-TYPE'] < 3) {
                $r_type    = Helpers::callAPI('GET', "/leave_types", "");
                $r_learner = Helpers::callAPI('GET', "/learners", "");

                return view('pages.leaves.add_leave',[
                    'leave_types' => $r_type['data'],
                    'learners'    => $r_learner['data']
                ]);
            }
            else {
                return view('pages.errors.auth');
            }
        }
        else return view('pages.login');*/
    }

    public function edit_leave($id)
    {
        if(Helpers::hasValidSession()) {
            if($_SESSION['SETA-EMPLG-USER-TYPE'] < 3) {
                $r_leave = Helpers::callAPI('GET', "/leaves/".$id, "");
                $r_type  = Helpers::callAPI('GET', "/leave_types", "");
                $r_learner = Helpers::callAPI('GET', "/learners", "");

                return view('pages.leaves.edit', [
                    'leave'       => $r_leave['data'],
                    'leave_types' => $r_type['data'],
                    'learners'    => $r_learner['data']
                ]);
            }
            else {
                return view('pages.errors.auth');
            }
        }
        else return view('pages.login');
    }

    public function upload_leave()
    {
        return view('pages.leaves.upload_leave');
        /*
        if(Helpers::hasValidSession()) {
            if($_SESSION['SETA-EMPLG-USER-TYPE'] < 3) {
                return view('pages.leaves.upload_leave');
            }
            else {
                return view('pages.errors.auth');
            }
        }
        else return view('pages.login');*/
    }

    public function add_type(){

        return view('pages.leaves.add_type');
        /*if(Helpers::hasValidSession()) {
            if($_SESSION['SETA-EMPLG-USER-TYPE'] < 3) {
                return view('pages.leaves.add_type');
            }
            else {
                return view('pages.errors.auth');
            }
        }
        else return view('pages.login');*/
    }

    public function edit_type($id)
    {
        return view('pages.leaves.edit_type');
        /*
        if(Helpers::hasValidSession()) {
            if($_SESSION['SETA-EMPLG-USER-TYPE'] < 3) {
                $r_type = Helpers::callAPI('GET', "/leave_types/".$id, "");

                return view('pages.leaves.edit_type', [
                    'leave_type' => $r_type['data']
                ]);
            }
            else {
                return view('errors.503');
            }
        }
        else return view('pages.login');*/
    }

    public function list_type(){

        return view('pages.leaves.list_type');
        /*
        if(Helpers::hasValidSession()) {
            if($_SESSION['SETA-EMPLG-USER-TYPE'] < 3) {
                return view('pages.leaves.list_type');
            }
            else {
                return view('pages.errors.auth');
            }
        }
        else return view('pages.login');*/
    }

    //API CALLS
}