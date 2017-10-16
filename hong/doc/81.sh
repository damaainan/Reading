#!/bin/bash

awk '/。$/{if(length($0)<31 && length($0)>8)print NR}' 81.txt > line.txt
