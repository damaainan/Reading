<?php 
// var_dump($argv);
$name=$argv[1];
$str=file_get_contents($name);
/*
preg_match_all("/[\x{4e00}-\x{9fa5}\s\x{002e}\x{002c}]+/u", $str, $chinese);
$ss= implode("", $chinese[0]);//得到全部中文
// var_dump($ss);
file_put_contents("1.txt", $ss);
*/

// preg_match_all("/[^\x{4e00}-\x{9fa5}]+/u", $str, $chinese);
// $ss= implode("", $chinese[0]);//得到除中文外其他所有
// file_put_contents("2.txt", $ss);
// 

$ss=preg_replace("/[\x{4e00}-\x{9fa5}]+/u", " ", $str);
file_put_contents("2.txt", $ss);

// 1 和 2 合并