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

class Helpers
{

    public static function passwordRegex($password, $confirm_password){


        $uppercase      = preg_match('@[A-Z]@', $password);
        $lowercase      = preg_match('@[a-z]@', $password);
        $number         = preg_match('@[0-9]@', $password);
        $special_symbol = preg_match('@[\W]@',  $password);

        if($password != $confirm_password){
            $response = "Passwords Do Not Match";
        }
        elseif(strlen($password) < 8){
            $response = "Password Must Contain At Least 8 Characters";
        }
        elseif(!$uppercase ) {
            $response = "Password Must Contain At Least 1 Upper Case Character [A-Z]";
        }
        elseif(!$lowercase){
            $response = "Password Must Contain At Least 1 Lower Case Character [a-z]";
        }
        elseif(!$number){
            $response = "Password Must Contain At Least 1 Number [0-9]";
        }
        elseif(!$special_symbol){
            $response = "Password Must Contain At Least 1 Special Character";
        }
        else{
            $response = "";
        }

        return $response;
    }

    public static function formatDate($date, $format = "Y-m-d H:i:s"){

        if($date != null){
            return date($format, strtotime($date));
        }
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
