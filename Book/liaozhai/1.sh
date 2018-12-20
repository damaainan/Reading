#!/bin/bash  

# 替换 

DIR=`ls -lR | grep ^d | awk '{print $NF}'`

for i in ${DIR}
do
	# echo "./"${i}"/"
	ddir="./"${i}"/"
	names=`ls ${ddir}`
	for j in ${names}
	do
		echo ${ddir}$j
		# `sed -i 's/^据《聊斋志异》/> 据《聊斋志异》/' ${ddir}$j`  # 加注释样式
		`sed -i 's/注释/注释/' ${ddir}$j` # 加样式 
	done

done