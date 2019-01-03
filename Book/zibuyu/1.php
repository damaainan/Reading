<?php

$handle = fopen("./00.md", "r");

if ($handle) {
    $i = 0;
    $j = 0;
    $dir = '';
    // $name = str_pad($i, 3, "0", STR_PAD_LEFT);
    // $handle1 = fopen("./doc/".$name.".md","a");
    $flag = '';
    $handle1 = fopen("./001", "a");
    while (($buffer = fgets($handle, 4096)) !== false) {
        if($buffer == ''){
            continue;
        }
        if (preg_match("/##/", $buffer)) { // 找目录名
            $arr = explode(' ', $buffer);
            $ss = trim($arr[1]) . trim($arr[2]);
            
            $i = 1;
            $j++;
            
            $dname = str_pad($j, 2, "0", STR_PAD_LEFT);
            $dir = "./" . $dname . $ss;
            echo $dir;
            if (!is_dir($dir)) {
                mkdir($dir);
            }
        } else { // 文件名
            $name = str_pad($i, 2, "0", STR_PAD_LEFT);
            $names = trim($buffer);
            touch($dir . "/" . $name . $names . ".md");
            $i++;
        }
    }

    fclose($handle);
}