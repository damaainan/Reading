
    seq -w 1 25 | xargs -I[  awk -F'"' 'NR==9{system("mv [yue.html \"["$2".html\"")}' [yue.html