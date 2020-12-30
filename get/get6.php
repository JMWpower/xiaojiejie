<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
header("Access-Control-Allow-Origin: *");
$url = 'http://dy.yy516100.cn/ks.php';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64; rv:21.0) Gecko/20100101 Firefox/21.0");
curl_exec($ch);
$response = curl_exec($ch);
curl_close($ch);
 
//echo $response;

$need=getNeedBetween($response, '"http://' , '" width=' );

echo $need;

function getNeedBetween($kw1,$mark1,$mark2){
$kw=$kw1;
$kw='123'.$kw.'123';
$st =stripos($kw,$mark1);
$ed =stripos($kw,$mark2);
if(($st==false||$ed==false)||$st>=$ed)
return 0;
$kw=substr($kw,($st+1),($ed-$st-1));
return $kw;
}
?>