<?php

$handle = fopen("./1.md", "r");

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

if ($handle) {
    $i = 0;
    $j = 0;
    $dir = '';
    $flag = '';
    $handle1 = fopen("./001", "a");
    while (($buffer = fgets($handle, 4096)) !== false) {
        if (preg_match("/第[\x{4e00}-\x{9fa5}〇]{2}卷/u", $buffer)) { // 找目录名
            // echo $buffer;
            $names = trim($buffer);
            
            $i = 1;
            $j++;
            
            $dname = str_pad($j, 2, "0", STR_PAD_LEFT);
            echo "./" . $dname . $names . ".md\r\n";
            $handle1 = fopen( "./" . $dname . $names . ".md", "a");

            fwrite($handle1, $style);
            fwrite($handle1, "### " . $buffer);
            
        } else { // 文件名
            fwrite($handle1, $buffer);
        }
    }

    fclose($handle);
}