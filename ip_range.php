<?php
function ip_range($start, $end) {
  $start = ip2long($start);
  $end = ip2long($end);
  return array_map('long2ip', range($start, $end) );
}

$range_one = "1.1.1.1";
$range_two = "2.1.255.5";
$iprange = ip_range($range_one, $range_two);
foreach($iprange as $ip){
    echo $ip."<br/>";
}

