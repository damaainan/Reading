<?php
/*
jiaxu{font-family: "楷体";font-size: 16px;color:DodgerBlue;}
jimao{font-family: "楷体";font-size: 16px;color:DarkGreen;}
gengchen{font-family: "楷体";font-size: 16px;color:Chocolate;}
meng{font-family: "楷体";font-size: 16px;color:Coral;}
jiachen{font-family: "楷体";font-size: 16px;color:Coral;}

poem{font-family: "楷体";font-size: 16px;color:red;}

 */
for ($i = 1; $i < 2; $i++) {
    if ($i < 10) {
        $i = "0" . $i;
    }
    $arr  = glob("./" . $i . "*.md");
    $file = $arr[0];
    $str  = file_get_contents($file);
//     $str =<<<EOF

// <font face="楷体" color=red>
// 世人都晓神仙好，惟有功名忘不了！  
// 古今将相在何方？荒冢一堆草没了。  
// 世人都晓神仙好，只有金银忘不了！  
// 终朝只恨聚无多，及到多时眼闭了。  
// 世人都晓神仙好，只有姣妻忘不了！  
// </font>

// <font face="楷体" color=Coral size=3>【蒙双行夹批：要写情要写幻境，偏 先 写 出 一 篇 奇 人 奇 境 来。】</font> ？ 士隐听了，便迎上来道：“你满口说些
// 什么？只听见些‘好’‘了’‘好’‘了’。那道人笑道：“你若果听见‘好’‘了’二字，还算你明白。可知世上万般，好便是了，了便是好。若不了，便不好，若要好，须是了。我这歌儿，便名《好了歌》”士隐本是有宿慧的，一闻此言，心中早已彻悟。因笑道：“且住！待我将你这《好了歌》解注出来何如？”道人笑道：“你解，你解。”士隐乃说道：

// <font face="楷体" color=red>
// 陋室空堂，当年笏满床，<font face="楷体" color=DodgerBlue size=3>【甲戌侧批：宁、荣未有之先。】</font>  
// 衰草枯杨，曾为歌舞场。 <font face="楷体" color=DodgerBlue size=3>【甲戌侧批：宁、荣既败之后。】</font>  
// 蛛丝儿结满雕梁，<font face="楷体" color=DodgerBlue size=3>【甲戌侧批：潇湘馆、紫芸轩等处。】</font>  
// 绿纱今又糊在蓬窗上。 <font face="楷体" color=DodgerBlue size=3>【甲戌侧批：雨村等一干新荣暴发之家。甲戌眉批：先说  
// 场面，忽新忽败，忽丽忽朽，已见得反覆不了。】</font>  
// 说什么脂正浓，粉正香，如何两鬓又成霜？<font face="楷体" color=DodgerBlue size=3>【甲戌侧批：宝钗、湘云一干人。】</font>  
// 昨日黄土陇头送白骨，<font face="楷体" color=DodgerBlue size=3>【甲戌侧批：黛玉、晴雯一干人。】</font>  
// 今宵红灯帐底卧鸳鸯。 <font face="楷体" color=DodgerBlue size=3>【甲戌眉批：一段妻妾迎新送死，倏恩倏爱，倏痛倏悲，缠绵不了。】</font>  
// 金满箱，银满箱，<font face="楷体" color=DodgerBlue size=3>【甲戌侧批：熙凤一干人。】</font>  
// 展眼乞丐人皆谤。 <font face="楷体" color=DodgerBlue size=3>【甲戌侧批：甄玉、贾玉一干人。】</font>  
// 正叹他人命不长，那知自己归来丧！<font face="楷体" color=DodgerBlue size=3>【甲戌眉批：一段石火光阴，悲喜不了。风露草霜，富贵嗜欲，贪婪不了。】</font>  
// 训有方，保不定日后<font face="楷体" color=DodgerBlue size=3>【甲戌侧批：言父母死后之日。】</font> 作强梁。 <font face="楷体" color=DodgerBlue size=3>【甲戌侧批：柳湘莲一干人。】</font>  
// 择膏粱，谁承望流落在烟花巷！<font face="楷体" color=DodgerBlue size=3>【甲戌眉批：一段儿女死后无凭，生前空为筹划计算，痴心不了。】</font>  
// 因嫌纱帽小，致使锁枷杠，<font face="楷体" color=DodgerBlue size=3>【甲戌侧批：贾赦、雨村一干人。】</font>  
// 昨怜破袄寒，今嫌紫蟒长。 <font face="楷体" color=DodgerBlue size=3>【甲戌侧批：贾兰、贾菌一干人。甲戌眉批：一段功名升黜无时，强夺苦争，喜惧不了。】</font>  
// 乱烘烘你方唱罢我登场，<font face="楷体" color=DodgerBlue size=3>【甲戌侧批：总收。甲戌眉批：总收古今亿兆痴人，共历幻场，此幻事扰扰纷纷，无日可了。】</font>  
// 反认他乡是故乡。 <font face="楷体" color=DodgerBlue size=3>【甲戌侧批：太虚幻境青埂峰一并结住。】</font>  
// 甚荒唐，到头来都是为他人作嫁衣裳！<font face="楷体" color=DodgerBlue size=3>【甲戌侧批：语虽旧句，用于此妥极是极。苟能如此，便能了得。甲戌眉批：此等歌谣原不宜太雅，恐其不能通俗，故只此便妙极。其说得痛切处，又非一味俗语可到。蒙双行夹批：谁不解得世事如此，有龙象力者方能放得下。】</font>  
// </font>
// EOF;
    // <font face="楷体" color=DodgerBlue size=3>甲戌本</font>
    preg_match_all("/<font face=\"楷体\" color=DodgerBlue size=3>(.*?)<\/font>/s", $str, $match);
    $len = count($match[0]);
    for ($j = 0; $j < $len; $j++) {
        $str = str_replace($match[0][$j], "<jiaxu>".$match[1][$j]."</jiaxu>", $str);
    }

    preg_match_all("/<font face=\"楷体\" color=DarkGreen size=3>(.*?)<\/font>/s", $str, $match);
    $len = count($match[0]);
    for ($j = 0; $j < $len; $j++) {
        $str = str_replace($match[0][$j], "<jimao>".$match[1][$j]."</jimao>", $str);
    }

    preg_match_all("/<font face=\"楷体\" color=Chocolate size=3>(.*?)<\/font>/s", $str, $match);
    $len = count($match[0]);
    for ($j = 0; $j < $len; $j++) {
        $str = str_replace($match[0][$j], "<gengchen>".$match[1][$j]."</gengchen>", $str);
    }

    preg_match_all("/<font face=\"楷体\" color=Coral size=3>(.*?)<\/font>/s", $str, $match);
    $len = count($match[0]);
    for ($j = 0; $j < $len; $j++) {
        $str = str_replace($match[0][$j], "<meng>".$match[1][$j]."</meng>", $str);
    }

// echo $str;

    preg_match_all("/<font face=\"楷体\" color=red>(.*?)<\/font>/s", $str, $match);
    $len = count($match[0]);
    for ($j = 0; $j < $len; $j++) {
        $str = str_replace($match[0][$j], "<poem>".$match[1][$j]."</poem>", $str);
    }
// echo $str;
    file_put_contents($file, $str);
}
