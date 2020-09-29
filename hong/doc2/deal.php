<?php
/*
jiaxu{font-family: "楷体";font-size: 16px;color:DodgerBlue;}
jimao{font-family: "楷体";font-size: 16px;color:DarkGreen;}
gengchen{font-family: "楷体";font-size: 16px;color:Chocolate;}
meng{font-family: "楷体";font-size: 16px;color:Coral;}
jiachen{font-family: "楷体";font-size: 16px;color:Coral;}

poem{font-family: "楷体";font-size: 16px;color:red;}

 */
for ($i = 1; $i < 81; $i++) {
    if ($i < 10) {
        $i = "0" . $i;
    }
    $arr  = glob("./" . $i . "*.md");
    $file = $arr[0];
    $str  = file_get_contents($file);
    // <font face="楷体" color=DodgerBlue size=3>甲戌本</font>
    preg_match_all("/<font face=\"楷体\" color=DodgerBlue size=3>(.*?)<\/font>/s", $str, $match);
    $len = count($match[0]);
    for ($j = 0; $j < $len; $j++) {
        $str = str_replace($match[0][$j], "<jiaxu>" . $match[1][$j] . "</jiaxu>", $str);
    }

    preg_match_all("/<font face=\"楷体\" color=DarkGreen size=3>(.*?)<\/font>/s", $str, $match);
    $len = count($match[0]);
    for ($j = 0; $j < $len; $j++) {
        $str = str_replace($match[0][$j], "<jimao>" . $match[1][$j] . "</jimao>", $str);
    }

    preg_match_all("/<font face=\"楷体\" color=Chocolate size=3>(.*?)<\/font>/s", $str, $match);
    $len = count($match[0]);
    for ($j = 0; $j < $len; $j++) {
        $str = str_replace($match[0][$j], "<gengchen>" . $match[1][$j] . "</gengchen>", $str);
    }

    preg_match_all("/<font face=\"楷体\" color=Coral size=3>(.*?)<\/font>/s", $str, $match);
    $len = count($match[0]);
    for ($j = 0; $j < $len; $j++) {
        $str = str_replace($match[0][$j], "<meng>" . $match[1][$j] . "</meng>", $str);
    }

    preg_match_all("/<font face=\"楷体\" color=red>(.*?)<\/font>/s", $str, $match);
    $len = count($match[0]);
    for ($j = 0; $j < $len; $j++) {
        $str = str_replace($match[0][$j], "<poem>" . $match[1][$j] . "</poem>", $str);
    }
    $str = str_replace('<font face="黑体">', '', $str);
    $str = str_replace('</font>', '', $str);
    $str = "<link rel=\"stylesheet\" type=\"text/css\" href=\"default.css\">" . $str;
// echo $str;
    file_put_contents($file, $str);
}
