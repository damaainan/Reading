<?php 

$handle = fopen("./02.md","r");

if ($handle) {
    $i = 0;
    $name = str_pad($i, 3, "0", STR_PAD_LEFT);  
    $handle1 = fopen("./doc/".$name.".md","a");
    while (($buffer = fgets($handle, 4096)) !== false) {
        if(preg_match("/^第[\x{4e00}-\x{9fa5}]{1,3}回/u",$buffer)){
            echo $buffer;
            $i++;
            fclose($handle1);
            $name = str_pad($i, 3, "0", STR_PAD_LEFT);  
            $handle1 = fopen("./doc/".$name.".md","a");
            fwrite($handle1, $buffer);
        }else{
            fwrite($handle1, $buffer);
        }
    }
    
    fclose($handle1);
    fclose($handle);
}