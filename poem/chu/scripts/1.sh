#!/bin/bash

# 提取拼音

# awk '/^[a-z]/ || /。/ || /？/{print $0}' 1.md > 1.txt

# awk '{if($1=="*")print "\r\n\r\n";else print "*"$0"  "}' 1.txt > 2.txt


# 提取汉字

 # awk '/^[^a-z]/ {print $0}' 1.md  >> zi.txt


 # awk '/[^。？]/{print "*"$0"  "}' zi.txt >> zi2.txt
 # awk '/[。？]/{print "*"$0"  "}' zi.txt >> zi2.txt
 # awk '/[^。]/ && /[^？]/{print "*"$0"  "}' zi.txt 
 # awk '/[*]//{print "*"$0"  "}' zi.txt 


# awk'{if($1==4){print "1"} else if($2==5){print "2"} elseif($3==6){print "3"} else {print "no"}}' file      


 # awk '{if($2=="*")print $0}' zi.txt
 
# awk '{if($2=="*")print "@@"$0"  \r\n\r\n";else if($2=="@")print "@@"$0"  \r\n\r\n";else print "@@"$0"  "}' zi.txt > zi2.txt
# 
# 合并 汉字 拼音


for ((i=1;i<989;i++))
do
    echo ${i} | xargs -i[ awk 'NR==[{print $0}' 2.txt >> he.txt
    echo ${i} | xargs -i[ awk 'NR==[{print $0}' zi2.txt >> he.txt
done