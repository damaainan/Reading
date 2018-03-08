<?php 

$handle = fopen("./toc.txt", 'r');
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        $arr = explode('***', $buffer);
        $oname = "./doc/".$arr[0].".md";
        $nname = "./doc/".$arr[0].trim($arr[1]).".md";
        rename($oname, $nname);
    }
    
    fclose($handle);
}