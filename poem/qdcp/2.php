<?php

$handle = fopen("./ci.md", "r");

if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        if (preg_match("/###/", $buffer) || preg_match("/<钦定词谱/u", $buffer)) {
            echo $buffer;
        } 
    }

    fclose($handle);
}