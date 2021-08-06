#!/bin/bash
#cat /dev/null >a.txt
line=$1
#type=$(curl -s --head $line |grep 'video/mp4')
type=$(curl -s -o /dev/null -I -w "%{content_type}" "https://baidu.a.yximgs.com"$line)
if [ -n "$type" ]; then
  echo $line>>a.txt
else
  echo "不存在：${line##*.net}" 
  newline=$(echo $line|sed 's/ali-cdn.kwai.net/yximgs.com/g')
  type=$(curl -s -o /dev/null -I -w "%{content_type}" $newline)
  if [ -n "$type" ]; then
    echo $newline>>a.txt
  else
    echo $line>>NOTFOUND.txt
  fi
fi
