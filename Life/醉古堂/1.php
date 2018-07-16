<?php 

$handle = fopen("./00.md", "r");

if ($handle) {
    $i = 0;
    $handle1 = fopen("./001", "a");
    while (($buffer = fgets($handle, 4096)) !== false) {
        if (preg_match("/## /", $buffer)) {
            $arr = explode(' ', $buffer);
            $name = trim($arr[2]);
            $i++;
            if ($handle1) {
                fclose($handle1);
            }
            $dname = str_pad($i, 2, "0", STR_PAD_LEFT);
            $dir = "./" . $dname.$name . ".md";
            $style = <<<EOF
<style type="text/css">
    h2{color:green;}
    *{font-family: "楷体";font-size: 18px;}
    .markdown-body blockquote{color:#d11;}
    green{color:green;}
    greenbold{color:green;font-weight: bold}
    blue{color:blue;}
    red{color:red;}
    redbold{color:red;font-weight: bold}
    cyan{color:cyan;}
    purple{color:purple;}
    .bold{font-weight: bold;}
    .eightteen{font-size:18px;}
    .twenty{font-size:20px;}
</style>

EOF;
            // echo $dir;
            $handle1 = fopen( $dir , "a");
            fwrite($handle1, $style);
            fwrite($handle1, $buffer);
        } 
        else {
            fwrite($handle1, $buffer);
        }
    }

    fclose($handle1);
    fclose($handle);
}