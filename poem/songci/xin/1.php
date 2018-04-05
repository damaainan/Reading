<?php

$handle = fopen("./00.md", "r");

if ($handle) {
    $i = 0;
    $j = 0;
    $flag    = '';
    $handle1 = fopen("./000002", "a");
    while (($buffer = fgets($handle, 4096)) !== false) {
        if (preg_match("/### /", $buffer)) {

            if ($i % 10 == 0) {
                // 每 10 首一篇
                $j++;
                if ($handle1) {
                    fclose($handle1);
                }
                
                $dname   = str_pad($j, 2, "0", STR_PAD_LEFT);
                $handle1 = fopen("./" . $dname . ".md", "a");
                $css     = <<<EOF
<style type="text/css">
    .markdown-body{text-align: left;}
    h3{color:green}
    article{font-family:"楷体";color:red}
</style>


EOF;
                fwrite($handle1, $css);
            }
            $i++;
        }
        fwrite($handle1, $buffer);
    }
    fclose($handle1);
    fclose($handle);
}
