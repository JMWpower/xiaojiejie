<?php
// GET2.json
ini_set("error_reporting","E_ALL & ~E_NOTICE");
$filename='./source/GET2.json';
if(file_exists($filename)){
    $json_string = file_get_contents($filename);
    $data = json_decode($json_string, true);
    $i = mt_rand(0, 850);
    $url = $data[0][$i];
    echo $url;
}else{
    echo "demo.mp4";
}
?>
