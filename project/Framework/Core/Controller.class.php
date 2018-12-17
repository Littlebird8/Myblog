<?php
namespace Core;
abstract class Controller{
    //自动加载smarty文件
    protected $smarty;
    public function __construct(){
    //开启会话
        $this->inisession();
    //开启smarty
        $this->inismarty();
    }
    //初始化开启会话
    private function inisession(){
        new \Lib\Session();
    }
    //初始化smarty
    private function inismarty(){
        $this->smarty=new \Smarty();
        $this->smarty->setTemplateDir(__VIEW__);
        $this->smarty->setCompileDir(__VIEWCA__);
    }
    public function success($url,$info,$time=1,$flag='success'){
        $this->jump($url,$info,$time);
    }
    public function error($url,$info,$time='3',$flag='error'){
        $this->jump($url,$info,$time,$flag);
    }
    //封装自动跳转函数
    private function jump($url,$info,$time='3',$flag='success'){
        if($info==''){
            header("location:{$url}");
        }else{
        echo<<<str
        <!doctype html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="{$time};{$url}"/>
        <title>Document</title>
        <style>
                div{text-align: center;margin-top:50px;}
                .box .success{color:green;font-size: 28px;margin-top: 50px;}
                .box .error{color:red;font-size: 28px;margin-top: 20px;}
                .time
        </style>
</head>
<body>
        <div class='box'>
                <img src="./Public/images/{$flag}.fw.png" width="83" height="82">
                <div class='{$flag}'>
                        {$info}
                </div>
                <div class='time'>
                        {$time}秒以后跳转
                </div>
        </div>
</body>
</html>  
str;
           die();             
        }  
    }
}

