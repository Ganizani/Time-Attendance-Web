<?php
/**
 * Created by PhpStorm.
 * User: carlos_pambo
 * Date: 3/13/18
 * Time: 9:25 PM
 */

namespace App\Http;
use \GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class Helpers {

    public static function passwordRegex($password, $confirm_password){

        if($password != $confirm_password) $response = "Passwords Do Not Match";
        elseif(strlen($password) < 8)      $response = "Password Must Contain At Least 8 Characters";
        elseif(!preg_match('@[A-Z]@', $password)) $response = "Password Must Contain At Least 1 Upper Case Character [A-Z]";
        elseif(!preg_match('@[a-z]@', $password)) $response = "Password Must Contain At Least 1 Lower Case Character [a-z]";
        elseif(!preg_match('@[0-9]@', $password)) $response = "Password Must Contain At Least 1 Number [0-9]";
        elseif(!preg_match('@[\W]@',  $password)) $response = "Password Must Contain At Least 1 Special Character";
        else $response = "";

        return $response;
    }

    public static function formatDate($date, $format = "Y-m-d H:i:s"){

        if($date != null) return date($format, strtotime($date));
        else return "";
    }

    public static function callAPI($method, $url, $data = [])
    {
        if (session_status() == PHP_SESSION_NONE) session_start();
        $authorization = isset($_SESSION['GANIZANI-EMPLG-ACCESS-TOKEN']) ? $_SESSION['GANIZANI-EMPLG-ACCESS-TOKEN'] : "";

        $client = new Client();
        $result = [];
        $body   = [
            'json'    => $data,
            'headers' => [
                'Content-Type'   => "application/json",
                'Accept'         => "*/*",
                'Authorization'  => "Bearer ".$authorization
            ]
        ];

        try {
            $response = $client->request(strtoupper($method), url(env('API_URL')).$url, $body);

            $result = json_decode($response->getBody(), true);
        }
        catch (RequestException $e) {

            if ($e->hasResponse()) {
                $result = json_decode($e->getResponse()->getBody()->getContents(), true);
            }
        }

        return $result;
    }

    public static function getError($response){

        //User
        if(isset($response['error']['user_id'])) $error = $response['error']['user_id'][0];
        elseif(isset($response['error']['email'])) $error = $response['error']['email'][0];
        elseif(isset($response['error']['username'])) $error = $response['error']['username'][0];
        elseif(isset($response['error']['password'])) $error = $response['error']['password'][0];
        elseif(isset($response['error']['title'])) $error = $response['error']['title'][0];
        elseif(isset($response['error']['gender'])) $error = $response['error']['gender'][0];
        elseif(isset($response['error']['first_name'])) $error = $response['error']['first_name'][0];
        elseif(isset($response['error']['last_name'])) $error = $response['error']['last_name'][0];
        elseif(isset($response['error']['status'])) $error = $response['error']['status'][0];
        elseif(isset($response['error']['phone_number'])) $error = $response['error']['phone_number'][0];
        elseif(isset($response['error']['token'])) $error = $response['error']['token'][0];
        elseif(isset($response['error']['department'])) $error = $response['error']['department'][0];
        elseif(isset($response['error']['department_id'])) $error = $response['error']['department_id'][0];
        elseif(isset($response['error']['name'])) $error = $response['error']['name'][0];
        elseif(isset($response['error']['uif_number'])) $error = $response['error']['uif_number'][0];
        elseif(isset($response['error']['payment_number'])) $error = $response['error']['payment_number'][0];
        elseif(isset($response['error']['work_location'])) $error = $response['error']['work_location'][0];
        elseif(isset($response['error']['work_cell_phone'])) $error = $response['error']['work_cell_phone'][0];
        elseif(isset($response['error']['work_phone'])) $error = $response['error']['work_phone'][0];
        elseif(isset($response['error']['work_email'])) $error = $response['error']['work_email'][0];
        elseif(isset($response['error']['maiden_name'])) $error = $response['error']['maiden_name'][0];
        elseif(isset($response['error']['middle_name'])) $error = $response['error']['middle_name'][0];
        elseif(isset($response['error']['nationality'])) $error = $response['error']['nationality'][0];
        elseif(isset($response['error']['employee_code'])) $error = $response['error']['employee_code'][0];
        elseif(isset($response['error']['email'])) $error = $response['error']['email'][0];
        elseif(isset($response['error']['start_date'])) $error = $response['error']['start_date'][0];
        elseif(isset($response['error']['job_title'])) $error = $response['error']['job_title'][0];
        elseif(isset($response['error']['employer'])) $error = $response['error']['employer'][0];
        elseif(isset($response['error']['cell_phone'])) $error = $response['error']['cell_phone'][0];
        //Devices
        elseif(isset($response['error']['imei_number'])) $error = $response['error']['imei_number'][0];
        elseif(isset($response['error']['supervisor'])) $error = $response['error']['supervisor'][0];
        elseif(isset($response['error']['serial_number'])) $error = $response['error']['serial_number'][0];
        //Holiday
        elseif(isset($response['error']['date'])) $error = $response['error']['date'][0];
        elseif(isset($response['error']['description'])) $error = $response['error']['description'][0];
        //Address
        elseif(isset($response['error']['house_number'])) $error = $response['error']['house_number'][0];
        elseif(isset($response['error']['street_number'])) $error = $response['error']['street_number'][0];
        elseif(isset($response['error']['street_name'])) $error = $response['error']['street_name'][0];
        elseif(isset($response['error']['suburb'])) $error = $response['error']['suburb'][0];
        elseif(isset($response['error']['city'])) $error = $response['error']['city'][0];
        elseif(isset($response['error']['province'])) $error = $response['error']['province'][0];
        //Next of Kin
        elseif(isset($response['error']['relationship'])) $error = $response['error']['relationship'][0];
        //Department
        elseif(isset($response['error']['location'])) $error = $response['error']['location'][0];
        //Leave
        elseif(isset($response['error']['attachment'])) $error = $response['error']['attachment'][0];
        elseif(isset($response['error']['comments'])) $error = $response['error']['comments'][0];
        elseif(isset($response['error']['leave_type'])) $error = $response['error']['leave_type'][0];
        elseif(isset($response['error']['from_date'])) $error = $response['error']['from_date'][0];
        elseif(isset($response['error']['to_date'])) $error = $response['error']['to_date'][0];
        //Clocking
        elseif(isset($response['error']['latitude'])) $error = $response['error']['latitude'][0];
        elseif(isset($response['error']['longitude'])) $error = $response['error']['longitude'][0];
        //User Permission
        elseif(isset($response['error']['user_group_id'])) $error = $response['error']['user_group_id'][0];
        elseif(isset($response['error']['access_control_id'])) $error = $response['error']['access_control_id'][0];
        elseif(isset($response['error']['manual_clocking'])) $error = $response['error']['manual_clocking'][0];
        elseif(isset($response['error']['login'])) $error = $response['error']['login'][0];
        elseif(isset($response['error']['system_admin'])) $error = $response['error']['system_admin'][0];
        elseif(isset($response['error']['apply_for_leave'])) $error = $response['error']['apply_for_leave'][0];
        elseif(isset($response['error']['view_reports'])) $error = $response['error']['view_reports'][0];
        elseif(isset($response['error']['print_reports'])) $error = $response['error']['print_reports'][0];
        elseif(isset($response['error']['add_departments'])) $error = $response['error']['add_departments'][0];
        elseif(isset($response['error']['edit_departments'])) $error = $response['error']['edit_departments'][0];
        elseif(isset($response['error']['list_departments'])) $error = $response['error']['list_departments'][0];
        elseif(isset($response['error']['print_departments'])) $error = $response['error']['print_departments'][0];
        elseif(isset($response['error']['add_users'])) $error = $response['error']['add_users'][0];
        elseif(isset($response['error']['edit_users'])) $error = $response['error']['edit_users'][0];
        elseif(isset($response['error']['list_users'])) $error = $response['error']['list_users'][0];
        elseif(isset($response['error']['print_users'])) $error = $response['error']['print_users'][0];
        elseif(isset($response['error']['delete_users'])) $error = $response['error']['delete_users'][0];
        elseif(isset($response['error']['add_devices'])) $error = $response['error']['add_devices'][0];
        elseif(isset($response['error']['edit_devices'])) $error = $response['error']['edit_devices'][0];
        elseif(isset($response['error']['list_devices'])) $error = $response['error']['list_devices'][0];
        elseif(isset($response['error']['print_devices'])) $error = $response['error']['print_devices'][0];
        elseif(isset($response['error']['delete_devices'])) $error = $response['error']['delete_devices'][0];
        elseif(isset($response['error']['add_holidays'])) $error = $response['error']['add_holidays'][0];
        elseif(isset($response['error']['edit_holidays'])) $error = $response['error']['edit_holidays'][0];
        elseif(isset($response['error']['list_holidays'])) $error = $response['error']['list_holidays'][0];
        elseif(isset($response['error']['print_holidays'])) $error = $response['error']['print_holidays'][0];
        elseif(isset($response['error']['delete_holidays'])) $error = $response['error']['delete_holidays'][0];
        elseif(isset($response['error']['add_leaves'])) $error = $response['error']['add_leaves'][0];
        elseif(isset($response['error']['edit_leaves'])) $error = $response['error']['edit_leaves'][0];
        elseif(isset($response['error']['print_leaves'])) $error = $response['error']['print_leaves'][0];
        elseif(isset($response['error']['list_leaves'])) $error = $response['error']['list_leaves'][0];
        elseif(isset($response['error']['delete_leaves'])) $error = $response['error']['delete_leaves'][0];
        elseif(isset($response['error']['add_leave_types'])) $error = $response['error']['add_leave_types'][0];
        elseif(isset($response['error']['edit_leave_types'])) $error = $response['error']['edit_leave_types'][0];
        elseif(isset($response['error']['list_leave_types'])) $error = $response['error']['list_leave_types'][0];
        elseif(isset($response['error']['print_leave_types'])) $error = $response['error']['print_leave_types'][0];
        elseif(isset($response['error']['delete_leave_types'])) $error = $response['error']['delete_leave_types'][0];
        elseif(isset($response['error']['update_user_type'])) $error = $response['error']['update_user_type'][0];

        //ELSE
        else $error =  $response['error'];

        $error = ($error == "") ? "An internal server error occurred, please try again later." : $error;

        return $error;
    }

    public static function hasValidSession(){
        if (session_status() == PHP_SESSION_NONE) session_start();
        $data = true;
        if(!isset($_SESSION['GANIZANI-EMPLG-ID']) || $_SESSION['GANIZANI-EMPLG-ID'] == ""){
            $data = false;
        }

        return $data;
    }

    public static function getFileContent(Request $request, $file_name){
        $data = [
            'extension' => '',
            'data_url'  => ''
        ];

        if($request->file($file_name)) {
            $file = $request->file($file_name);
            if ($file->isValid()) {
                $data = [
                    'extension' => $file->getClientOriginalExtension(),
                    'data_url'  => 'data:' . $file->getClientOriginalExtension() . ';base64,' . base64_encode(file_get_contents($file)),
                ];
            }
        }

        return $data;
    }
}
