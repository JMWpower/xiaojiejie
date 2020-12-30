<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
$filename='kuaishou.json';
	if(file_exists($filename)){
	    $json_string = file_get_contents($filename);
	    $data = json_decode($json_string, true);
	    //查询条目数
	    $arrlength=count($data);
	    $i = mt_rand(0, $arrlength);
	    $url = $data[$i]["playUrl"];
	    echo $url;
	}else{
	    echo "demo.mp4";
	}
?>