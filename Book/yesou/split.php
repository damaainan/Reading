<?php

$style = <<<EOF
<style type="text/css">
    h2{color:green;}
    h3{color:red;}
    *{font-family: "楷体";font-size: 18px;}
    poem{color:red;width: 100%;display: block;text-align: center;}
    .comment{color:#eb6161;}
    blue{color:blue;}
    wen{color:coral;font-size: 16px;}
</style>

EOF;

$handle = @fopen("./new.md", "r");
$handle1 = @fopen("./001", "a");
$i = 1;
$j = 1;
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        if (preg_match("/字卷/u",$buffer) && preg_match("/#/",$buffer)) {
		    // 卷
        	$tags = explode("# ", $buffer);
        	$tag = str_pad($i, 2, "0", STR_PAD_LEFT) . trim(str_replace("  ", "", $tags[1]));
        	echo $tag;
        	if(!is_dir("./doc/" . $tag)){
        		mkdir("./doc/" . $tag);
        	}
        	$i++;
        	echo "\n";
        }else if(preg_match("/## 第/u",$buffer)) {
            fputs ($handle1, "</div>\n\n");
            // 回目
            $titles = explode("## ", $buffer);
            $title = str_pad($j, 3, "0", STR_PAD_LEFT) . trim(str_replace("  ", "", $titles[1]));
            $file = "./doc/" . $tag . "/" . $title . ".md";
        	fclose($handle1);
        	$handle1 = fopen($file, "a");
        	fputs ($handle1, $style);
            fputs ($handle1, $buffer);
        	echo $file;
        	$j++;
        	echo "\n";
		}else if(preg_match("/总评/u",$buffer) && preg_match("/#/",$buffer)) {
            // 
            fputs ($handle1, $buffer . '<div class="comment">' . "\n");
        }else {
			// 内容
			fputs ($handle1, $buffer);
		}
    }
    if (!feof($handle)) {
    }
    fclose($handle);
}
unlink("./001");