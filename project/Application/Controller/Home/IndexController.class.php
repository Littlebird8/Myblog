<?php
namespace Controller\Home;
class IndexController extends BaseController{
    public function listAction(){
        //获取类别树
        $content=isset($_POST['content'])?$_POST['content']:(isset($_GET['content'])?$_GET['content']:'');
        $cat_model=new \Model\CategoryModel;
        $cat_list=$cat_model->getCategorytree();
        //1.获取文章（公开的，没有放在回收箱的）2.获取作者 3.分类需要三表查询
        $art_model=new \Model\ArticleModel;
        //获取中文章数量
 //分页开始
        $total=$art_model->gettotalpagebycontent($content);
        //定义每页文章数量
        $num=$GLOBALS['config']['App']['articlepagenum'];
        $page=new \Lib\Page($total, $num);
        $art_list=$art_model->getHomearticle((($page->start<0)?1:$page->start),$num,$content);
        //获取分页字符串
        $str=$page->page($content,"content");
//分页结束        
        //获取友情链接
        $link_model=new \Core\Model('link');
        $link_list=$link_model->select();
        $this->smarty->assign('content',$content);
        $this->smarty->assign('str',$str);
        $this->smarty->assign('art_list',$art_list);
        $this->smarty->assign('link_list',$link_list);
        $this->smarty->assign('cat_list',$cat_list);
        $this->smarty->display('index.html');
    }
}