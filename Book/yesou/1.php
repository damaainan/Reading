<?php 

$handle = fopen("./1.md", "r");

if ($handle) {
    $handle1 = fopen("./001", "a");
    while (($buffer = fgets($handle, 4096)) !== false) {
    	$buffer = str_replace("\r\n", "", $buffer);
        if (preg_match("/字卷/", $buffer)) { // 找目录名
            $dir = "./" . $buffer;
        }else{
            touch($dir . "/" . $buffer . ".md");
        }
    }
    fclose($handle);
}
fclose($handle1);
unlink("./001");