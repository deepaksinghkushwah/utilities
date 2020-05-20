<?php
$data = array(1,2,3,4);
$result = search_get_combos($data);

foreach($result as $row){
    if(count($row) > 0){
        $str = "";
        foreach($row as $r){
            $str.=$r.', ';
        }        
        echo rtrim($str,", ");
        //echo " = ".array_sum($row);
        echo "<br/>";
    }
    
    
}


function search_get_combos($array) {
    $bits = count($array); //bits of binary number equal to number of words in query;
//Convert decimal number to binary with set number of bits, and split into array
    $dec = 1;
    $binary = str_split(str_pad(decbin($dec), $bits, '0', STR_PAD_LEFT));
    while ($dec < pow(2, $bits)) {
        //Each 'word' is linked to a bit of the binary number.
        //Whenever the bit is '1' its added to the current term.
        $curterm = "";
        $i = 0;
        while ($i < ($bits)) {
            if ($binary[$i] == 1) {
                $curterm[] = $array[$i] . " ";
            }
            $i++;
        }
        $terms[] = $curterm;
        //Count up by 1
        $dec++;
        $binary = str_split(str_pad(decbin($dec), $bits, '0', STR_PAD_LEFT));
    }
    return $terms;
}
