<?php
namespace Controller\Admin;
class ArticleController extends BaseController{
    public function listAction(){
        $cat=new \Model\CategoryModel;
        $cat_list=$cat->getCategorytree();
        $model=new \Model\ArticleModel();
        if(!empty($_POST)){
            $list=$model->serchinfo();
        }else{
            $list=$model->getinfo();
        }
        $this->smarty->assign('cat_list',$cat_list);
        $this->smarty->assign('list',$list);
        $this->smarty->display('article_list.html');
    }
    public function addAction(){
        $art_model=new \Core\Model('article');
        $data=$_POST;
        $data['art_time']=time();
        $data['user_id']=$_SESSION['user']['user_id'];
        if(!empty($_POST)){
             if($art_model->insert($data)){
                 $this->success("index.php?p=admin&c=article&a=list","添加成功");
             }else{
                 $this->success("index.php?p=admin&c=article&a=add","添加失败");
             }
        }
        $model=new \Model\CategoryModel;
        $class_list=$model->getCategorytree();
        $this->smarty->assign("class_list",$class_list);
        $this->smarty->display('article_add.html');
    }
    
    public function editAction(){
        $art_id=$_GET['art_id'];
        $model=new \Core\Model('article');
        $list=$model->find($art_id);
        //执行修改语句
        if(!empty($_POST)){
            $data=$_POST;
            $data['art_id']=$art_id;
            $res=$model->update($data);
            if($res===0){
                $this->error("index.php?p=admin&c=article&a=edit&art_id=$art_id","文章没有更新");
            }else if($res){
                $this->success("index.php?p=admin&c=article&a=list","更新成功");
            }else{
                $this->error("index.php?p=admin&c=article&a=edit&art_id=$art_id","更新失败");
            }
        }
        //显示修改页面
        $cat_model=new \Model\CategoryModel('category');
        $cat_list=$cat_model->getCategorytree();
        $this->smarty->assign('cat_list',$cat_list);
        $this->smarty->assign('list',$list);
        $this->smarty->display('article_edit.html');
    }
    //软删除
    public function delAction(){
        $art_id=$_GET['art_id'];
        $model=new \Model\ArticleModel();
        if($model->delinfo($art_id)){
            $this->success("index.php?p=admin&c=article&a=list","删除成功");
        }else{
            $this->success("index.php?p=admin&c=article&a=list","删除失败");
        }
    }
    //更改置顶
    public function istopAction(){
        $data['art_id']=$_GET['art_id'];
        $data['is_top']=(int)!$_GET['is_top'];
        $model=new \Core\Model('article');
        if($model->update($data)){
             $this->success("index.php?p=admin&c=article&a=list","修改置顶成功");
        }else{
             $this->success("index.php?p=admin&c=article&a=list","修改置顶失败");
        }
    }
}