#!/bin/bash

sed -n '1,2p' 心经.md | awk '{for (i=1; i<=length($1); ++i) if (substr($1, i, 1) > "\177") {print substr($1, i, 1) "\t中文"; ++i;} else {print substr($1, i, 1) "\tNot Chinese Character";}}'

