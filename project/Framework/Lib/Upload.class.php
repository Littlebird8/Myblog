<?php
namespace Lib;
class Upload{
    private $path;
    private $size;
    private $error;
    private $type;
    public function __construct($path,$type,$size){
        $this->path=$path;
        $this->size=$size;
        $this->type=$type;
    }
    public function geterror(){
        return $this->error;
    }
    public function load($file){
        $error=$file['error'];
        if($error){
            switch($error){
                case 1:$this->error='超过了配置文件允许的大小'. ini_get('upload_max_filesize');break;
                case 2:$this->error='超过了表单允许的最大值';break;
                case 3:$this->error='只有部分文件上传，没有完全上传';break;
                case 4:$this->error='没有文件上传';break;
                case 6:$this->error='找不到临时文件';break;
                case 7:$this->error='文件写入失败';break;
                default:$this->error='未知错误';break;
            }
            return false;
        }
        //判断文件类型
        $info= finfo_open(FILEINFO_MIME_TYPE);
        $fileinfo= finfo_file($info,$file['tmp_name']);
        if(!in_array($fileinfo,$this->type)){
            $this->error='上传文件类型错误，允许上传的类型有'.implode(',',$this->type);
            return false;
        }
        //判断文件大小
        if($file["size"]>$this->size){
            $this->error='上传文件类型错误，允许上传的大小：'.number_format($this->size/1024,2).'K';
            return false;
            }
        //判断是否为HTTP上传文件类型
        if(!is_uploaded_file($file['tmp_name'])){
             $this->error='文件必须是HTTP上传';
             return false;
        }
            //上传文件
        //创建文件夹
        $foldername=date('Y-m-d',time());
        $path=$this->path.$foldername;
        if(!is_dir($path)){
            mkdir($path,777,true);
        }
        $name= uniqid('',true).strrchr($file['name'],'.');
        $filepath=$path.'/'.$name;
        if(move_uploaded_file($file['tmp_name'], $filepath)){
            return $foldername.'/'.$name;
        }else{
            $this->error="上传文件失败";
            return false;
        }
    }  
}