<?php

$handle = fopen("./00.md", "r");

if ($handle) {
    $i = 0;
    $j = 0;
    // $name = str_pad($i, 3, "0", STR_PAD_LEFT);
    // $handle1 = fopen("./doc/".$name.".md","a");
    $flag = '';
    $handle1 = fopen("./001", "a");
    while (($buffer = fgets($handle, 4096)) !== false) {
        if (preg_match("/##[ ][\x{4e00}-\x{9fa5}]{1}公/u", $buffer)) {
            // echo $buffer;
            // $buffer = trim($buffer);
            $arr = explode(' ', $buffer);
            $names = trim($arr[1]);
            $ss = mb_substr($names, 0, 2);
            if ($ss == $flag) {
                // 同一年号
                $i++;
            } else {
                $flag = $ss;
                $i = 1;
                $j++;
            }
            // echo "\n" . $ss, "**", $buffer, '***', $flag, "**", $i;
            if ($handle1) {
                fclose($handle1);
            }
            $dname = str_pad($j, 2, "0", STR_PAD_LEFT);
            $dir = "./doc/" . $dname . $ss;
            if (!is_dir($dir)) {
                mkdir($dir);
            }
            $name = str_pad($i, 2, "0", STR_PAD_LEFT);
            $handle1 = fopen( $dir . "/" . $name . $names . ".md", "a");
            fwrite($handle1, $buffer);
        } else {
            fwrite($handle1, $buffer);
        }
    }

    fclose($handle1);
    fclose($handle);
}