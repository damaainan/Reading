#!/bin/bash

# 修改回目名为 1 行

MY_SAVEIFS=$IFS  # 改变分隔符
IFS=$'\n'  
j=0
for i in `ls | grep "第"`
do
	((j++)) # 自加的形式
	echo ${i}
	str=`awk 'NR<6{print $0}' ${i} | tr "\r\n" "[ ]"` 
	# echo ${str}
	# break
	sed -i '1,4d;5s@^.*$@'${str}'@' ${i} # 删除多余的 替换最后一行
	if [ ${j} -eq 2 ]
	then
		# break
		echo ${j}
	fi
done

IFS=$MY_SAVEIFS  