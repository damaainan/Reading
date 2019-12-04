<?php 

/**
 * 正则分析出诗句 加 > 
 */


function readTheFile(string $path) {
    $handle = fopen($path, "r");

    while(!feof($handle)) {
        yield trim(fgets($handle));
    }

    fclose($handle);
}



$arr = glob("*卷*.md");
// var_dump($arr);

foreach ($arr as $val) {
	$flag = 0;
	// $str = "";
	// echo "./" . $val;
	$handle = fopen("./" . $val, 'r');
	$str = file_get_contents("./" . $val);

	if ($handle) {
	    while (($iteration = fgets($handle, 4096)) !== false) {
	    	if(mb_strlen($iteration) < 7){
		        continue;
		    }
		    // var_dump($iteration);
		    $iteration = trim($iteration);
			$len = mb_strlen($iteration);
			// echo $len,"\r\n";
			if(!in_array($len, [10,12,14,16])){
				continue;
			}
	    	// echo $iteration;
			// echo $iteration,"\r\n"; 
			$varr = preg_split("/[。！？，]/u", $iteration, 0, PREG_SPLIT_NO_EMPTY);
			// var_dump($varr);
			if(count($varr) !== 2){
				continue;
			}
			if(mb_strlen($varr[0]) != mb_strlen($varr[1])){
				continue;
			}

			// 替换
			$newstr = "> " . $iteration; 
			// echo $newstr;
			$str = str_replace($iteration, $newstr, $str);
	    }
    }

    fclose($handle);
    // echo $str;
    // file_put_contents("./" . explode(".", $val)[0] . "_zhu.md", $str);
    file_put_contents("./" . $val, $str);



	// $iterator = readTheFile($val);

	// $str = file_get_contents($val);
	// // echo $str;
	// foreach ($iterator as $iteration) {
	// 	// echo $iteration,"\r\n";
	// 	if(mb_strlen($iteration) < 7){
	//         continue;
	//     }

	// 	$len = mb_strlen($iteration);
	// 	if(!in_array($len, [10,12,16])){
	// 		continue;
	// 	}
	// 	// echo $iteration,"\r\n"; 
	// 	$varr = preg_split("/[。！？，]/u", $iteration, 0, PREG_SPLIT_NO_EMPTY);
	// 	// var_dump($varr);
	// 	if(count($varr) !== 2){
	// 		continue;
	// 	}
	// 	if(mb_strlen($varr[0]) != mb_strlen($varr[1])){
	// 		continue;
	// 	}

	// 	// 替换
	// 	$newstr = "> " . $iteration; 
	// 	$str = str_replace($iteration, $newstr, $str);
	// }

	// file_put_contents($val . "zhu", $str);
}