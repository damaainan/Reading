<?php

$handle = fopen("./1.txt", "r");

$style=<<<EOF
<script type="text/javascript">
    var head = document.getElementsByTagName('head')[0];
    cssURL = '/public/article_1.css';
    linkTag = document.createElement('link');
    linkTag.href = cssURL;
    linkTag.setAttribute('type','text/css');
    linkTag.setAttribute('rel','stylesheet');
    head.appendChild(linkTag);
</script>

EOF;

$toc = [];

if ($handle) {
    $i = 0;
    $j = 0;
    $dir = '';
    // $name = str_pad($i, 3, "0", STR_PAD_LEFT);
    // $handle1 = fopen("./doc/".$name.".md","a");
    $flag = '';
    $handle1 = fopen("./001", "a");
    while (($buffer = fgets($handle, 4096)) !== false) {
        // if($buffer == ''){
        //     continue;
        // }
        if (preg_match("/##/", $buffer)) { // 找目录名
            $arr = explode(' ', $buffer);
            $ss = trim($arr[1]) . trim($arr[2]);
            
            $i = 1;
            $j++;
            
            $dname = str_pad($j, 2, "0", STR_PAD_LEFT);
            $dir = "./" . $dname . $ss;
            echo $dir;
            if (!is_dir($dir)) {
                mkdir($dir);
            }
        } else if(in_array(trim($buffer), $toc)){ // 文件名
            $name = str_pad($i, 2, "0", STR_PAD_LEFT);
            $names = trim($buffer);
            // touch($dir . "/" . $name . $names . ".md");
            $handle1 = fopen( $dir . "/" . $name . $names . ".md", "a");
            $i++;

            fwrite($handle1, $style);
            fwrite($handle1, "### " . $buffer);
        }else{
            fwrite($handle1, $buffer);
        }
    }

    fclose($handle);
}