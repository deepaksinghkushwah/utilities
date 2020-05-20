<?php
$url = "http://www.wix.com/website-template/view/html/731";
$file = "file.html";
$ch = curl_init($url);
$fp = fopen($file, "w");

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
fclose($fp);

$content = file_get_contents($file);
// CHECK URL's START
$href_regex ="<"; // 1 start of the tag
$href_regex .="\s*"; // 2 zero or more whitespace
$href_regex .="a"; // 3 the a of the tag itself
$href_regex .="\s+"; // 4 one or more whitespace
$href_regex .="[^>]*"; // 5 zero or more of any character that is _not_ the end of the tag
$href_regex .="href"; // 6 the href bit of the tag
$href_regex .="\s*"; // 7 zero or more whitespace
$href_regex .="="; // 8 the = of the tag
$href_regex .="\s*"; // 9 zero or more whitespace
$href_regex .="[\"']?"; // 10 none or one of " or '
$href_regex .="("; // 11 opening parenthesis, start of the bit we want to capture
$href_regex .="[^\"' >]+"; // 12 one or more of any character _except_ our closing characters
$href_regex .=")"; // 13 closing parenthesis, end of the bit we want to capture
$href_regex .="[\"' >]"; // 14 closing chartacters of the bit we want to capture
            
$regex = "/"; // regex start delimiter
$regex .= $href_regex; //
$regex .= "/"; // regex end delimiter
$regex .= "i"; // Pattern Modifier - makes regex case insensative
$regex .= "s"; // Pattern Modifier - makes a dot metacharater in the pattern
// match all characters, including newlines
$regex .= "U"; // Pattern Modifier - makes the regex ungready 
preg_match_all($regex, $content, $matches);
echo "<pre>";var_dump($matches[1]);echo "</pre>";
