<?php

$handle = @fopen("./yeu.md", "r");
$handle1 = @fopen("./new.md", "a");
$i = 1;
$j = 1;
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        if (preg_match("/poem/",$buffer)) {
		    $rest = poem($buffer);
            // echo $rest;
            fputs ($handle1, $rest);
        } else {
			// 内容
			fputs ($handle1, $buffer);
		}
    }
    if (!feof($handle)) {
    }
    fclose($handle);
}

function poem(string $string):string{
    $str = str_replace("<poem>", "", $string);
    $str = str_replace("</poem>", "", $str);
    $str = trim($str);
    // $flag = flag($str);
    // var_dump($flag);die;
    $arr = explode("。", $str);
    $str = implode("。  \n", $arr);
    $arr = explode("？", $str);
    $str = implode("？  \n", $arr);
    $arr = explode("！", $str);
    $str = implode("！  \n", $arr);
    
    return "<poem>  \n" . $str . "</poem>" . "  \n";
}


function format(string $string):string{
    $str = str_replace("<poem>", "", $string);
    $str = str_replace("</poem>", "", $str);
    $str = trim($str);
    $flag = flag($str);
    // var_dump($flag);die;
    $arr = [];
    if($flag){
        $len = mb_strlen($str);
        for ($i = 0; $i < $len; $i+=($flag+1)) {
            $arr[] = mb_substr($str, $i, $flag+1);
        }
        $ret = "<poem>  \n" . implode("  \n", $arr) . "  \n</poem>";
        return $ret;
    }
    return $string;
}

function flag(string $str):int{
    $flag1 = mb_substr($str, 7, 1);
    $flag2 = mb_substr($str, 11, 1);
    $flag3 = mb_substr($str, 15, 1);
   
    if(in_array($flag1, ["。","？","！"])){
        return 4;
    }
    if(in_array($flag2, ["。","？","！"])){
        return 5;
    }
    if(in_array($flag3, ["。","？","！"])){
        return 7;
    }
    return false;
}