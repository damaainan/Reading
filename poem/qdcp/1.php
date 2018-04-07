<?php

$handle = fopen("./ht.md", "r");

if ($handle) {
    $i = 0;
    $j = 0;
    // $name = str_pad($i, 3, "0", STR_PAD_LEFT);
    // $handle1 = fopen("./doc/".$name.".md","a");
    $flag = '';
    $handle1 = fopen("./001", "a");
    while (($buffer = fgets($handle, 4096)) !== false) {
        if (preg_match("/<钦定词谱/u", $buffer)) {
            // echo $buffer;
            // $buffer = trim($buffer);
            $arr = explode(' ', $buffer);
            $juans = explode(">",$arr[1]);
            $juan = $juans[0];
            $name = trim($arr[2]);
            // $ss = mb_substr($names, 0, 2);
            if ($juan == $flag) {
                // 同一年号
                $i++;
            } else {
                $flag = $juan;
                $i = 1;
                $j++;
            }
            // echo $juan,"\n";
            // echo $j,"\n";
            // echo $name,"\n";
            // // echo "\n" . $ss, "**", $buffer, '***', $flag, "**", $i;
            if ($handle1) {
                fclose($handle1);
            }
            $dname = str_pad($j, 2, "0", STR_PAD_LEFT);
            $dir = "./doc/" . $dname . $juan . "(" . $name . ").md";
            // echo $dir;
            // if (!is_dir($dir)) {
            //     mkdir($dir);
            // }
            // $name = str_pad($i, 2, "0", STR_PAD_LEFT);
            $handle1 = fopen( $dir , "a");
            fwrite($handle1, $buffer);
        } 
        else {
            fwrite($handle1, $buffer);
        }
    }

    fclose($handle1);
    fclose($handle);
}