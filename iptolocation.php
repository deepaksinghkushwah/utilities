<?php

$url = 'http://ip-api.com/php/117.204.245.123';
$result = curl($url);
$data= unserialize($result);
echo "<pre>";print_r($data);

function curl($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
    $result = curl_exec($ch);
    if (!($res = curl_exec($ch))) {
        echo "Got " . curl_error($ch) . " when processing IPN data";
        curl_close($ch);
        exit;
    }
    curl_close($ch);
    return $result;
}
