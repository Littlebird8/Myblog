<?php
    header("content-type:text/html;charset=utf8");
    $str="在封装的时候";
    echo $str;
    $str1='';
    for($i=0,$n=strlen($str);$i<$n;){
       $str1.=$str[$i].$str[$i+1].$str[$i+2].',';
        $i=$i+3;
    }
    $arr= explode(',',$str1);
    var_dump($arr);
//    $img= imagecreatetruecolor($width, $height)