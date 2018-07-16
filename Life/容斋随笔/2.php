<?php
/**
 * Created by Sublime.
 * User: jiachunhui<jiachunhui@mia.com>
 * Date: 2018-05-28 15:38:41
 * 分割 txt 文件,命名并放入相应文件夹
 */

// 一级分割标识
/**
 *
 * @param  string $name     文件名
 * @param  string $nameFlag 文件名分割标识
 * @param  string $dirFlag 目录名分割标识
 * @return [type]           [description]
 */
function splitTxt(string $name, string $nameFlag, string $dirFlag = '') {
    $handle = fopen($name, "r");

    if ($handle) {
        $i = 0;
        $j = 1;
        $flag = '';
        $handle1 = fopen("./001", "a");
        $dir = "./";
        while (($buffer = fgets($handle, 4096)) !== false) {
            if (preg_match($dirFlag, $buffer)) {
                /*
                $darr = explode(' ', $buffer); // 获取目录名
                $dname = trim($darr[1]);
                $dirname = mb_substr($dname, 0, 2);
                // $nameFlag = "/##[ ]" . $dirname . "公/u";
                // if ($dirname == $flag) {
                //     $i++;
                // } else {
                //     $flag = $dirname;
                //     $i = 1;
                //     $j++;
                // }
                $dir = "./" . $dirname . "部";
                // $dir = "./" . $j . $dirname . "部"; // 文件夹排序
                if (!is_dir($dir)) {
                    mkdir($dir);
                }
                */
            } else if (preg_match($nameFlag, $buffer)){
                // if ($dirname == $flag) {
                //     $i++;
                // } else {
                //     $flag = $dirname;
                //     $i = 1;
                    // $j++;
                // }
                $j = str_pad($j, 2, "0", STR_PAD_LEFT);
                $arr = explode(' ', $buffer); // 获取文件名
                $name = trim($arr[1]);
                echo $name,"\r\n";

                if ($handle1) {
                    fclose($handle1);
                }
                $handle1 = fopen($dir . "/" . $j . $name . ".md", "a");
                $str = <<<EOF
<style type="text/css">
    h2{color:green;}
    h3{color:red;}
    h4{color:brown;}
    *{font-family: "楷体";font-size: 18px;}
    .markdown-body blockquote{color:#d11;}
    green{color:green;}
    greenbold{color:green;font-weight: bold}
    blue{color:blue;}
    red{color:red;}
    redbold{color:red;font-weight: bold}
    cyan{color:cyan;}
    purple{color:purple;}
    .bold{font-weight: bold;}
    .eightteen{font-size:18px;}
    .twenty{font-size:20px;}
</style>

EOF;
                fwrite($handle1, $str);
                fwrite($handle1, $buffer);
                $j++;

            }else{
                fwrite($handle1, $buffer);
            }
        }

        fclose($handle1);
        fclose($handle);
    }
}
splitTxt('./1.md',"/##[ ]卷[\x{4e00}-\x{9fa5}]{1}/u", "/##[ ][\x{4e00}-\x{9fa5}]{2}部/u");