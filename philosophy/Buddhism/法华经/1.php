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
            // echo $dir;
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