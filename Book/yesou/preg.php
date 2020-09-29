<?php 

$handle = @fopen("./yu.md", "r");
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        if (preg_match("/^([\x{4e00}-\x{9fa5}]{7}[\x{3002}\x{ff0c}]{1}){2,8}/u",$buffer)) {
		    print($buffer);
		} else {
		}
    }
    if (!feof($handle)) {
    }
    fclose($handle);
}


