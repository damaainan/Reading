<?php 

$arr = glob("*卷*/*.md");
// var_dump($arr);

foreach ($arr as $val) {
	$flag = 0;
	$str = "";
	// echo "./" . $val;
	$handle = fopen("./" . $val, 'r');
	if ($handle) {
	    while (($buffer = fgets($handle, 4096)) !== false) {
	    	// echo $buffer;
	    	if (preg_match("/【注释】/u", $buffer)) {
	    		$flag = 1;
	    	}
	    	if($flag == 1){
	    		$re_str = trim($buffer) . "  \r\n"; // 需要 trim 去掉 末尾的换行符
		    	// var_dump($re_str);
	    	}else{
	    		$re_str = $buffer;
	    	}
	    	$str .= $re_str;
	    }
    }

    fclose($handle);
    // echo $str;
    file_put_contents("./" . $val, $str);
}