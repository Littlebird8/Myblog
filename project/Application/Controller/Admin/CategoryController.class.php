<?php
namespace Controller\Admin;
class CategoryController extends BaseController{
    public function listAction(){
        $model=new \Model\CategoryModel();
        $list=$model->getCategorytree();
        $this->smarty->assign('list',$list);
        $this->smarty->display('cat_list.html');
    }
    public function addAction(){
        $model=new \Model\CategoryModel;
        if(!empty($_POST)){
            if($model->insert($_POST)){
                $this->success("index.php?p=admin&c=category&a=list","添加成功");
            }else{
                $this->success("index.php?p=admin&c=category&a=add","添加失败");
            }
        }
        $cat_list=$model->getCategorytree();
        $this->smarty->assign('cat_list',$cat_list);
        $this->smarty->display('cat_add.html');
    }
    public function editAction(){
        $cat_id=(int)$_GET['cat_id'];
        $model=new \Model\CategoryModel;
        if(!empty($_POST)){
            //判定是否修改的ID是否为自己
            if($_POST['parent_id']==$cat_id){
                $this->error("index.php?p=admin&c=category&a=edit&cat_id=".$cat_id,"修改的父级ID不能是自己");
            }
            //判定修改的ID是否为自己的子级
            $list=$model->getCategorytree($cat_id);
            foreach ($list as $v){
                if($v['cat_id']==$_POST['parent_id']){
                    $this->error("index.php?p=admin&c=category&a=edit&cat_id=".$cat_id,"修改的父级ID不能是自己的子级");
                }
            }
            //修改元素
            $_POST['cat_id']=$cat_id;
            if($model->update($_POST)){
                $this->success('index.php?p=admin&c=category&a=list',"修改成功");
            }else{
                 $this->error("index.php?p=admin&c=category&a=edit&cat_id=$cat_id","修改失败");
            }
        }
        $list=$model->getCategorytree();
        $info=$model->find($cat_id);
        $this->smarty->assign('list',$list);
        $this->smarty->assign('info',$info);
        $this->smarty->display('cat_edit.html');
    }
    public function delAction(){
         $cat_id=(int)$_GET['cat_id'];
         $model=new \Model\CategoryModel;
         if($model->isleaf($cat_id)){
             if($model->delete($cat_id)){
                $this->success('index.php?p=admin&c=category&a=list',"删除成功");
             }else{
                $this->error('index.php?p=admin&c=category&a=list',"删除失败");
             }
         }else{
                $this->error('index.php?p=admin&c=category&a=list',"删除的节点有子节点，不允许删除");
         }
    }
}
