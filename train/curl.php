<?php
include('hmac.php');
$apiKey = "9f98fbdad09ee3d0bddd4343337216ee";
$private = "db7bc110c0a8df24a532aec86b37de18";

//$hmacStr = 'json'.$apiKey.'1234567890';
//$hmac = hmac('sha1', $private, $hmacStr);
////echo "http://pnrbuddy.com/api/check_pnr/pnr/4259088079/format/json/pbapikey/80756083d4968e8991e1ff247b11ff59/pbapisign/517D056725AAF98EFDDEBC2530FD51BA79A0F216";
//$url = "http://pnrbuddy.com/api/check_pnr/pnr/1234567890/format/json/pbapikey/$apiKey/pbapisign/$hmac";
//echo curl($url);

$hmacStr = 'json'.$apiKey.'delhi';
$hmac = hmac('sha1', $private, $hmacStr);
//echo "http://pnrbuddy.com/api/check_pnr/pnr/4259088079/format/json/pbapikey/80756083d4968e8991e1ff247b11ff59/pbapisign/517D056725AAF98EFDDEBC2530FD51BA79A0F216";
echo $url = "http://pnrbuddy.com/api/station_by_name/name/delhi/format/json/pbapikey/$apiKey/pbapisign/$hmac";
//echo curl($url);

function curl($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
    $result = curl_exec($ch);
    if (!($res = curl_exec($ch))) {
        echo "Got " . curl_error($ch) . " when processing data";
        curl_close($ch);
        exit;
    }
    curl_close($ch);
    return $result;
}
