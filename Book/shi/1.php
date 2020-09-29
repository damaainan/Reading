<?php 

$arr = glob("*第*.md");
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
foreach ($arr as $val) {
	$str = file_get_contents($val);
	$str = $style . $str;
	file_put_contents($val, $str);
}
