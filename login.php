<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
$username=$_POST["username"];

$filename='./user/'.$username.'.json';

if ($username!="") {
    if(file_exists($filename)){
        $datas['status']="YES";
        $datas['message']="登陆成功，欢迎您：".$username."！";
        echo json_encode($datas);
    }else{
        $data['username']=$username;
        $json = json_encode($data);
        file_put_contents($filename, $json);
        $datas['status']="YES";
        $datas['message']="注册成功，恭喜您：".$username."！";
        echo json_encode($datas);
    }
}
?>