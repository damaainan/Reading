<?php 
/**
 * 标注题目 （没有标点符号的行）
 */

$handle = fopen("./1.txt", "r");


if ($handle) {
    $i = 0;
    $j = 0;
    $dir = '';
    // $name = str_pad($i, 3, "0", STR_PAD_LEFT);
    // $handle1 = fopen("./doc/".$name.".md","a");
    $flag = '';
    while (($buffer = fgets($handle, 4096)) !== false) {
        if($buffer == '' || $buffer=="\r\n"){
            continue;
        }
        if (preg_match("/[\x{3002}\x{ff1b}\x{ff0c}\x{ff1a}\x{201c}\x{201d}\x{ff08}\x{ff09}\x{3001}\x{ff1f}\x{300a}\x{300b}]/u", $buffer) === 0) { // 找目录名
            echo $buffer;
            # echo preg_match("/#，。：；‘’“”？《》！/u", $buffer);
        } 
          
    }

    fclose($handle);
}