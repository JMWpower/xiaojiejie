<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
header("Access-Control-Allow-Origin: *");
$user = "tuijian";
$filename='../user/'.$user.'.json';
if(file_exists($filename)){
    $json_string = file_get_contents($filename);
    $data = json_decode($json_string, true);
    //查询条目数
    $Count = count($data['url'])-1;
    $i = mt_rand(0, $Count);
    $url = $data['url'][$i]['url'];
    echo $url;
}else{
    echo "demo.mp4";
}
?>