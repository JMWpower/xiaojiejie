<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
$i = mt_rand(10000000000000000, 99999999999999999);
$url = 'https://girl.tools/api.php?_t=0.'.$i;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64; rv:21.0) Gecko/20100101 Firefox/21.0");
curl_exec($ch);
 
$response = curl_exec($ch);
preg_match_all('/^Location:(.*)$/mi', $response, $matches);
curl_close($ch);
 
echo !empty($matches[1]) ? trim($matches[1][0]) : 'No redirect found';
?>