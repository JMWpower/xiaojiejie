<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
$username=$_POST["userid"];
$url=$_POST["datastr"];

$filename='./user/'.$username.'.json';

if ($username!="" and $url!="") {
    if(file_exists($filename)){
        $json_string = file_get_contents($filename);
        $data = json_decode($json_string, true);
        $pd="Y";
        $Count = count($data['url']);
        for ($i=0; $i < $Count; $i++) {
            $urls = $data['url'][$i]['url'];
            if ($url==$urls) {
                $pd="N";//数据已存在
            }
        }
        if ($pd=="Y") {
            $data['url'][$i]['url']=$url;
            $json = json_encode($data);
            file_put_contents($filename, $json);
        }
        $datas['status']="YES";
        $datas['message']="添加收藏成功！";
        echo json_encode($datas);
    }else{
        $data['url'][0]['url']=$url;
        $json = json_encode($data);
        file_put_contents($filename, $json);
        $datas['status']="YES";
        $datas['message']="添加收藏成功！";
        echo json_encode($datas);
    }
}else{
    $datas['status']="NO";
    $datas['message']="未知的错误，添加收藏失败！";
    echo json_encode($datas);
}
?>