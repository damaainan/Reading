```
# 不要忘了 g
sed -i 's@<f句@<font size=1>句</font>@g' ht1.md
sed -i 's@<f韵@<font size=1>韵</font>@g' ht1.md
sed -i 's@<f读@<font size=1>读</font>@g' ht1.md
sed -i 's@<f叶@<font size=1>叶</font>@g' ht1.md
sed -i 's@<f叠@<font size=1>叠</font>@g' ht1.md
sed -i 's@<f重@<font size=1>重</font>@g' ht1.md



<f[^句读韵叶叠重]







ls | xargs -I[ sed -i 's@</  font>@</font>@g' "["
ls | xargs -I[ sed -i 's@</font  >@</font>@g' "["
ls | xargs -I[ sed -i 's@size  =1@size=1@g' "["
ls | xargs -I[ sed -i 's@size=  1@size=1@g' "["



[平|仄|上|下][　]{2}[平|仄|上|下]

[平|仄|上|下][　]{3}[平|仄|上|下]

(换仄韵)|(换平韵)
```

分别整理

已至  卷三十三下