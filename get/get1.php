<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
function read(...$filelist) {
    $list = [];
    foreach ($filelist as $file) {
        $handle = fopen($file, 'r');
        while (($line = fgets($handle)) !== false) {
            array_push($list, trim($line));
        }
        fclose($handle);
    }
    return $list;
}

$list = read('GET1.txt');
$url = $list[array_rand($list)];

echo $url;
