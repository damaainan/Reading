按目录新建文件

    awk '{print $0}' 00.md | awk -F'*' '{if(NR<10){print "0"NR""$1}else{print NR""$1}}' | xargs -I[ touch "[.md"

添加标题号

    ls | grep "第" | xargs -i[ awk -F'*' 'NR==1{system("sed -i \"s/"$1"/### "$1"/\" \"[\"")}' [ 

添加引用

     ls | grep "第" | xargs -I[ sed -i '16s/^/> /' [