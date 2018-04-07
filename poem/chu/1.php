<?php 
header("Content-type:text/html; Charset=utf-8");

$i=0;
$arr = glob("*.md");
foreach ($arr as $val) {
	$i++;
	echo $val;

	$str = file_get_contents("./".$val);
	$str = str_replace('<font face=楷体 size=4>', "<style type=\"text/css\">\nrub{font-family: Arial;font-size: 16px;color:red;}\np{font-family: \"楷体\";font-size:18px;}\n</style>", $str);

	$str = str_replace('<font face=Arial size=3>', "<rub>", $str);
	$str = str_replace('</font>', "</rub>", $str);
	file_put_contents("./".$val, $str);
}
