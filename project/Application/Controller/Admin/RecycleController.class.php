<?php
namespace Controller\Admin;
class RecycleController extends BaseController{
    public function listAction(){
        $cat=new \Model\CategoryModel;
        $cat_list=$cat->getCategorytree();
        $model=new \Model\ArticleModel;
        if(!empty($_POST)){
            $list=$model->getrecyclepcs();
        }else{
            $list=$model->getrecycle();
        }
        $this->smarty->assign('cat_list',$cat_list);
        $this->smarty->assign('list',$list);
        $this->smarty->display('recycle_list.html');
    }
    public function restoreAction(){
        $art_id=$_GET['art_id'];
        $model=new \Model\ArticleModel();
        if($model->restore($art_id)){
            $this->success("index.php?p=admin&c=recycle&a=list","还原成功");
        }else{
            $this->success("index.php?p=admin&c=recycle&a=list","还原失败");
        }
    }
    public function delAction(){
        $art_id=$_GET['art_id'];
        $model=new \Model\ArticleModel();
        if($model->delall($art_id)){
            $this->success("index.php?p=admin&c=recycle&a=list","删除成功");
        }else{
            $this->success("index.php?p=admin&c=recycle&a=list","删除失败");
        }
    }
    
    
}