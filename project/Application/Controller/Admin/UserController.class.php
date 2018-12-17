<?php
namespace Controller\Admin;
class UserController extends BaseController{
    public function listAction(){
        $model=new \Core\Model('user');
        $list=$model->select(array('is_admin'=>0));
        $this->smarty->assign('list',$list);
        $this->smarty->display('user_list.html');
    }
    public function delAction(){
        $user_id=$_GET['user_id'];
        $model=new \Core\Model('user');
        if($model->delete($user_id)){
            $this->success("index.php?p=admin&c=user&a=list","删除成功");
        }else{
            $this->success("index.php?p=admin&c=user&a=list","删除失败");
        }
    }
    public function editAction(){
        $user_id=$_SESSION['user']['user_id'];
        if(!empty($_POST)){
            $pwd=trim($_POST['password']);
            if(!empty($pwd))
                $data["user_pwd"]=md5($pwd);
            if($_FILES['face']['error']!=4){
                $path=$GLOBALS['config']['App']['path'];
                $type=$GLOBALS['config']['App']['type'];
                $size=$GLOBALS['config']['App']['size'];
                $file=new \Lib\Upload($path, $type, $size);
                if($path=$file->load($_FILES['face'])){
                    $data['user_face']=$path;
                }else{
                    $this->error("index.php?p=admin&c=user&a=edit",$file->geterror());
                }
            }
                if(!empty($data)){
                    $data['user_id']=$user_id;
                    $model=new \Core\Model('user');
                    $res=$model->update($data);
                    if($res===0){
                        $this->error("index.php?p=admin&c=user&a=edit","资料没有更新");
                    }else if($res===false){
                        $this->error("index.php?p=admin&c=user&a=edit","资料更新失败");
                    }else{
                        session_destroy();
                        echo <<<str
                       <script type="text/javascript">
                           alert('修改成功');
                            top.location.href='index.php?p=Admin&c=Login&a=login'
                            //top关键字表示所有框架最顶端的窗口
                        </script> 
str;
                    }
                }
        }
        $this->smarty->display('user_edit.html');
    }
}
