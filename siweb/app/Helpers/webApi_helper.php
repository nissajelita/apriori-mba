<?php
namespace App\Helpers;

function post_api($url, $param = null, $data){
    $webApiUrl = 'http://192.168.1.17:5000/';

    if($param != null) {
        $dataParam = http_build_query($param);
        $param = $url . '?' . $dataParam;
    }
    else{
        $param =  $url;
    }
    $completeUrl=  $webApiUrl . $param;
    // dd($completeUrl);

    $ch = curl_init($completeUrl);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    if ($response !== false) {
        return json_decode($response, true);
    } else {
        return false;
    }

    curl_close($ch);
   
}