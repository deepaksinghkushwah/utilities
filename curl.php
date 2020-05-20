<?php

$str = '__VIEWSTATE=wEPDwUKMTIxMjQ0NDgyNGRkwSHeBvxU13eEv0cCzDE18oVQivg=';
$data = array('xml' => $str);

for($i=0;$i < 1; $i++){
$result = curl($data);
echo $result."</hr>";
}

function curl($data) {
    $ch = curl_init('http://polls.polldaddy.com/vote-js.php?p=8252020&b=2&a=37535823,&o=&va=16&cookie=0&n=a0f45411da|1167&url=http%3A//www.hindustantimes.com/htpoll/OpinionPoll.aspx%3Fopx%3D497%23pd_a_8252020');
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_POST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
    
    if (!($res = curl_exec($ch))) {
        echo "Got " . curl_error($ch) . " when processing data";
        curl_close($ch);
        exit;
    }
    curl_close($ch);
    return $res;
}
