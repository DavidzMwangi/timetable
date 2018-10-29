<?php
/**
 * Created by PhpStorm.
 * User: David W. Mwangi
 * Date: 26/05/2018
 * Time: 12:05
 */

namespace App\Plugins;


class OneSignal
{
    public function sendMessage($message,$user_id,$transaction){
        $content = array(
            "en" => $message
        );

        $fields = array(
            'app_id' => "55e556c4-93be-472a-9cac-82b333d3fb7e",
            'filters' => array(array("field" => "tag", "key" => "user_id", "relation" => "=", "value" => $user_id)),
            'data' => array("transaction" => $transaction),
            'contents' => $content
        );

        $fields = json_encode($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
            'Authorization: Basic OTQ3MGU2MWMtYzA3Ny00MjA3LWJkNDgtODY4ZThiM2ZmNTI3'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);


        return $response;
    }

}