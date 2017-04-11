#!/bin/bash

for ((i=3600;i<3650;i++))
do unicodeChar=`echo -e "\u$i"`; 
    if [ "香" = "$unicodeChar" ];
        then echo -e "\u$unicodeChar"; 
    echo $i;
    break fi;
done;

