<?php
namespace Lib;
class Captcha{
    
    private $w;
    private $h;
    private $codenum;
    private $font;
    public function __construct($w=80,$h=32,$codenum=4,$font=20){
        $this->w=$w;
        $this->h=$h;
        $this->codenum=$codenum;
        $this->font=$font;
    }
    
    //生成随机的字符串
    private function getstr(){
        $arr= array_merge(range(0,9),range('a','z'),range('A','Z'));
        $arr2= array_rand($arr,$this->codenum);
        shuffle($arr2);
        $str='';
        foreach($arr2 as $v){
            $str.=$arr[$v];
        }
        $_SESSION['code']=$str;
        return $str;
    }
    public function createcode2(){
        $img= imagecreatetruecolor($this->w,$this->h);
        $color= imagecolorallocate($img,242, 249, 253);
        imagefill($img,0,0,$color);
        $str=$this->getstr();
        $n=($this->w-10)/$this->codenum;	
        $y=$this->h/2+$this->font/2;
        for($i=0;$i<$this->codenum;$i++){
           $color= imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
           imagettftext($img,$this->font,mt_rand(0,15),5+$i*$n,$y ,$color,'./Public/arial.ttf',$str[$i]);
        }
        header("Content-type:image/jpeg");
          imagejpeg($img);
    }
    public function checkcode($code){
//        var_dump($_SESSION);
        return strtoupper($_SESSION['code'])== strtoupper($code);       
    }
}
