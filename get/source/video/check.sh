#!/bin/bash
start_time=`date +%s`

cat /dev/null >a.txt
i=0
t=0
cat $1 | while read line
do
  ./check_url_exists.sh $line &
  let i+=1
  let t+=1
  if [ $i -eq 30 ]; then
    sleep 2
    let i=0
    echo "已处理$t"
    if [ $(ps -ef|grep check_url_exists|wc -l) -eq 50 ]; then
      sleep 1
    fi
  fi
done

end_time=`date +%s`
echo 执行时长: `expr $end_time - $start_time` s.