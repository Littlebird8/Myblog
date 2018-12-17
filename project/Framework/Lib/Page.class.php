<?php
namespace Lib;
class Page{
    public $currentpage;
    private $total;
    public $num;
    private $totalpage;
    public $start;
    public function __construct($total, $num) {
        $this->inidata($total, $num);
    }
    public function inidata($total,$num=10){
        $this->currentpage=$_GET['currentpage']??1;
        $this->total=$total;
        $this->num=$num;
        $this->totalpage=ceil($total/$num);
        if($this->currentpage<1)
            $this->currentpage=1;
        if($this->currentpage>$this->totalpage)
           $this->currentpage=$this->totalpage;
        $this->start=($this->currentpage-1)*$this->num;
    }
    public function page($cat_id="",$a="cat_id"){
        $str="<div class='pagebar'>";
        $str.="<span>当前一共有{$this->total}条记录，当前每页显示{$this->num}条记录，当前是第{$this->currentpage}页！&nbsp;&nbsp;</span>";
        $url="index.php?p=".P_PATH."&c=".C_PATH."&a=".A_PATH;
        $cat_id=($cat_id=='')?"":$cat_id;
        $b=($cat_id=='')?'':"{$a}={$cat_id}";
        $str.="<a href='{$url}&currentpage=1&{$b}'>首页</a>&nbsp;&nbsp;";
        $page_1=$this->currentpage-1;
        $page_2=$this->currentpage+1;
        $str.="<a href='{$url}&currentpage={$page_1}&{$b}'>上一页</a>&nbsp;&nbsp;";
        $str.="<a href='{$url}&currentpage={$page_2}&{$b}'>下一页</a>&nbsp;&nbsp;";
        $str.="<a href='{$url}&currentpage={$this->totalpage}&{$b}')>末页</a>&nbsp;&nbsp;";
//        $str.="<select onclick='location.href='+{$url}&currentpage='+this.value'>";
//            for($i=1;$i<=$this->totalpage;$i++){
//                 $str.="<option value='{$i}' ($i==$this->currentpage)?'selected':''>{$i}</option>";   
//            }
//        $str.="<input type='text' id='page' name='currentpage' value='{$this->currentpage}'  style='width:20px' onFocus='input_focus(this)' onBlur='input_blur(this)'/>";
//        $str.="<input type='submit' value='提交'/>";
        $str.="</div>"; 
        return $str;
        }
    }
