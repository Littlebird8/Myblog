<?php
namespace Controller\Admin;
class LinkController extends BaseController{
   public function listAction(){
       $model=new \Core\Model('link');
       $list=$model->select();
       $this->smarty->assign('list',$list);
       $this->smarty->display("link_list.html");
   }
   public function addAction(){
       if(!empty($_POST)){
           $data=$_POST;
           $data['link_time']=time();
           $model=new \Core\Model('link');
           if($model->insert($data)){
               $this->success("index.php?p=admin&c=link&a=list","添加成功");
           }else{
               $this->error("index.php?p=admin&c=link&a=add","添加失败");
           }
       }
       $this->smarty->display("link_add.html");
   }
   public function editAction(){
       $link_id=$_GET['link_id'];
       $model=new \Core\Model('link');
       if(!empty($_POST)){
           $data=$_POST;
           $data['link_id']=$link_id;
           if($model->update($data)===0){
               $this->error("index.php?p=admin&c=link&a=edit&link_id=$link_id","链接没有更新");
               
           }else if($model->update($data)===false){
               $this->error("index.php?p=admin&c=link&a=edit","修改失败");
           }else{
               $this->success("index.php?p=admin&c=link&a=list","修改成功");
           }
       }
       $list=$model->find($link_id);
       $this->smarty->assign('list',$list);
       $this->smarty->display("link_edit.html");
   }
   public function delAction(){
       $link_id=$_GET['link_id'];
       $model=new \Core\Model('link');
        if($model->delete($link_id)){
            $this->success("index.php?p=admin&c=link&a=list","删除成功");
        }else{
            $this->error("index.php?p=admin&c=link&a=add","删除失败");
        }
   }
    
}