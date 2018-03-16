<?php
/**
 * Created by PhpStorm.
 * User: carlos_pambo
 * Date: 3/13/18
 * Time: 9:44 PM
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Helpers;
use GuzzleHttp;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Reader;
use PhpOffice\PhpSpreadsheet\Writer;
use PhpOffice\PhpSpreadsheet\Style;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Writer\Pdf;

define('SERVER_ROOT' , dirname(dirname(dirname(dirname(__FILE__)))));//Go 4 directories back

class ExportController extends Controller
{

}