#!/bin/bash

#sed -n '1,2p' 心经.md | awk '{for (i=1; i<=length($1); ++i) if (substr($1, i, 1) > "\177") {print substr($1, i, 2) "\t中文"; ++i;} else {print substr($1, i, 1) "\tNot Chinese Character";}}'

sed -n '1,2p' 心经.md | awk '{for (i=1; i<=length($1); ++i) if (substr($1, i, 1) > "\177") {print substr($1, i, 1) "\t中文"; }}'

sed -n '1,2p' 心经.md | awk '{print length($1)}'


sed -n '1,2p' 心经.md | awk '{ {print substr($1, 1, 1); }}'
sed -n '1,2p' 心经.md | awk '{ {print substr($1, 2, 1); }}'
sed -n '1,2p' 心经.md | awk '{ {print substr($1, 3, 1); }}'
sed -n '1,2p' 心经.md | awk '{ {print substr($1, 4, 1); }}'


# 打印长度大于 1 的行，过滤空行
sed -n '1,$p'  1.txt | awk '{if (length($1) ) {print $1}}'
# 打印所有拼音内容行 ，过滤空行
sed -n '1,$p'  2.txt | awk -F: '{if (length($1) ) {print $1}}'
    # awk 默认以空格分隔，设置为 : ,使其不能分隔