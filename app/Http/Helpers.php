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

    public static function callAPI($method, $url, $data , $authorization = "")
    {
        $client = new Client();
        $result = [];
        $body   = [
            'json'    => $data,
            'headers' => [
                'Content-Type'   =>  "application/json",
                'Accept'         => '*/*',
                'X-Access-Token' => $authorization
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
        //Learners
        elseif(isset($response['error']['id_number'])) $error = $response['error']['id_number'][0];
        elseif(isset($response['error']['card_number'])) $error = $response['error']['card_number'][0];
        elseif(isset($response['error']['company'])) $error = $response['error']['company'][0];
        elseif(isset($response['error']['site'])) $error = $response['error']['site'][0];
        elseif(isset($response['error']['intervention'])) $error = $response['error']['intervention'][0];
        elseif(isset($response['error']['qualification'])) $error = $response['error']['qualification'][0];
        elseif(isset($response['error']['start_date'])) $error = $response['error']['start_date'][0];
        elseif(isset($response['error']['end_date'])) $error = $response['error']['end_date'][0];
        elseif(isset($response['error']['monthly_stipend'])) $error = $response['error']['monthly_stipend'][0];
        //Devices
        elseif(isset($response['error']['imei_number'])) $error = $response['error']['imei_number'][0];
        elseif(isset($response['error']['supervisor'])) $error = $response['error']['supervisor'][0];
        elseif(isset($response['error']['device_name'])) $error = $response['error']['device_name'][0];
        //SMS
        elseif(isset($response['error']['user'])) $error = $response['error']['user'][0];
        elseif(isset($response['error']['message'])) $error = $response['error']['message'][0];
        //Holiday
        elseif(isset($response['error']['date'])) $error = $response['error']['date'][0];
        //Leave Type
        elseif(isset($response['error']['name'])) $error = $response['error']['name'][0];
        elseif(isset($response['error']['description'])) $error = $response['error']['description'][0];
        //Leave
        elseif(isset($response['error']['attachment'])) $error = $response['error']['attachment'][0];
        elseif(isset($response['error']['comment'])) $error = $response['error']['comment'][0];
        elseif(isset($response['error']['reason'])) $error = $response['error']['reason'][0];
        elseif(isset($response['error']['from_date'])) $error = $response['error']['from_date'][0];
        elseif(isset($response['error']['to_date'])) $error = $response['error']['to_date'][0];
        //ELSE
        else $error =  $response['error'];

        return $error;
    }

    public static function hasValidSession(){
        session_start();
        $data = true;
        if(!isset($_SESSION['GANIZANI-EMPLG-ID']) || $_SESSION['GANIZANI-EMPLG-ID'] == ""){
            $data = false;
        }

        return $data;
    }
}
