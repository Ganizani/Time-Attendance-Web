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

class ReportController extends Controller
{
    //WEB CALLS
    public function absent(){

        return view('pages.reports.absent');
    }

    public function attendance(){

        return view('pages.reports.attendance');
    }

    public function base(){
        return view('pages.reports.base');
    }

    public function leave(){
        return view('pages.reports.leave');
    }

    public function map(){

        return view('pages.reports.map');
    }

    public function registration(){

        return view('pages.reports.registration');
    }

    //API CALLS
}