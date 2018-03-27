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

        if(Helpers::hasValidSession()) {
            $r_department = Helpers::callAPI('GET', "/departments");

            return view('pages.reports.absent');
        }
        else return view('pages.login');
    }

    public function attendance(){
        if(Helpers::hasValidSession()) {
            $r_department = Helpers::callAPI('GET', "/departments");

            return view('pages.reports.attendance',[
                'departments' => $r_department['data']
            ]);
        }
        else return view('pages.login');
    }

    public function base(){

        if(Helpers::hasValidSession()) {
            $r_department = Helpers::callAPI('GET', "/departments");

            return view('pages.reports.base', [
                'departments' => $r_department['data']
            ]);
        }
        else return view('pages.login');
    }

    public function leave(){

        if(Helpers::hasValidSession()) {
            $r_department = Helpers::callAPI('GET', "/departments");
            $r_leave_type = Helpers::callAPI('GET', "/leave_types");

            return view('pages.reports.leave', [
                'departments' => $r_department['data'],
                'leave_types' => $r_leave_type['data'],
            ]);
        }
        else return view('pages.login');
    }

    public function map(){

        if(Helpers::hasValidSession()) {
            $r_department = Helpers::callAPI('GET', "/departments");

            return view('pages.reports.map', [
                'departments' => $r_department['data'],
            ]);
        }
        else return view('pages.login');
    }

    //API CALLS
    public function absentee_data(Request $request)
    {
        $r_absentee = Helpers::callAPI('POST', "/reports/absentee", $this->request_array($request));

        return $r_absentee['data'];
    }

    public function attendance_data(Request $request)
    {
        $r_attendance = Helpers::callAPI('POST', "/reports/attendance", $this->request_array($request));

        return $r_attendance['data'];
    }

    public function base_data(Request $request)
    {
        $r_base = Helpers::callAPI('POST', "/reports/base", $this->request_array($request));

        return $r_base['data'];
    }

    public function leave_data(Request $request)
    {
        $r_leave = Helpers::callAPI('POST', "/reports/leave", $this->request_array($request));

        return $r_leave['data'];
    }
    public function map_data(Request $request)
    {
        $r_map = Helpers::callAPI('POST', "/reports/map", $this->request_array($request));

        return $r_map['data'];
    }

    public function request_array($request)
    {
        $data = [
            'from_date'     => $request->from_date,
            'to_date'       => $request->to_date,
            'department'    => $request->department,
            'reason'        => isset($request->reason)? $request->reason : null,
        ];

        return $data;
    }



}