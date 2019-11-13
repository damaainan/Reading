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
		# `sed -i 's/注释/注释/' ${ddir}$j` # 加样式 
		# line=`awk '/【注释】/{print NR}' ${ddir}$j`

		# echo ${line}
		# echo "*"
		# next=$((1+$line))
		# echo ${next} | xargs -I[ sed -i '[,$s@^@<b>@' ${ddir}$j
		
		# echo ${next} | xargs -I[ sed -i '[,$s@：@</b>：@' ${ddir}$j


		# sed -i "${next},$s@^@<b>@" ${ddir}$j
		#  awk '/【注释】/{print NR}' 02耳中人.md
		# sed -i '27,$s@^@<b>@' 02耳中人.md
		# sed -i '27,$s@：@</b>：@' 02耳中人.md

		# 
		`sed -i 's/^> 据《聊斋志异》/<\/section>\r\n\r\n> 据《聊斋志异》/' ${ddir}$j`
		`sed -i 's@\[白话\]@\[白话\]\r\n\<aside\>@' ${ddir}$j`
		`sed -i 's@^> 【注释】 @</aside>\r\n\r\n> 【注释】 @' ${ddir}$j`

		# break
	done
	# break
done


# awk '/【注释】/{print NR}' 02耳中人.md | xargs -I[ echo 1+[ | xargs -I[ sed -i "[,$s@^@<b>@" 02耳中人.md
# awk '/【注释】/{print NR}' 02耳中人.md | xargs -I[ echo 1+[ | xargs -I[ sed -i "[,$s@：@</b>：@" 02耳中人.md