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

class HolidayController extends Controller
{
    //WEB CALLS
    public function index()
    {
        return view('pages.holidays.list');
    }

    public function add()
    {
        return view('pages.holidays.add');

    }

    public function edit($id)
    {
        return view('pages.holidays.edit');
    }

    public function upload()
    {
        return view('pages.holidays.upload');
    }

    //API CALLS
}