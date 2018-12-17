<?php
namespace Controller\Admin;
class LoginController extends BaseController{
    public function loginAction(){
         if(!empty($_POST)){
            $code=$_POST['passcode'];
            $captcha=new \Lib\Captcha;
            if(!$captcha->checkcode($code)){
                $this->error('index.php?p=admin&c=Login&a=login','验证码输入错误，请重新登录');
            }
            $data['user_name']=$_POST['username'];
            $data['user_pwd']=md5($_POST['password']);
            $model=new \Model\UserModel();
            if($info=$model->islogin()){
                $_SESSION['user']=$info;
                $model->updatelogininfo();
                if(!empty($_POST['remember'])){
                    $time=time()+3600*24*7;
                    setcookie('name',$_POST['username'],$time);
                    setcookie('pwd',$_POST['password'],$time);
                }
                $this->success('index.php?p=admin&c=admin&a=admin','登陆成功');
            }else{
                $this->error('index.php?p=admin&c=Login&a=login','登录失败，请重新登录');
            }  
         }
         $name=$_COOKIE['name']??'';
         $pwd=$_COOKIE['pwd']??'';
         $this->smarty->assign('name',$name);
         $this->smarty->assign('pwd',$pwd);
         $this->smarty->display('login.html');   
    }
    public function registerAction(){
        if(!empty($_POST)){
            $data['user_name']=$_POST['username'];
            $data['user_pwd']=md5($_POST['password']);
            $model=new \Core\Model('user');
            if($model->select(array('user_name'=>$_POST['username']))){
                $this->error('index.php?p=admin&c=Login&a=register','用户名重复，请重新注册');
            }
            //确认验证码
            $code=$_POST['passcode'];
            $captcha=new \Lib\Captcha;
            if(!$captcha->checkcode($code)){
                 $this->error('index.php?p=admin&c=Login&a=register','验证码错误，请重新注册');
            }
            //确认上传图片
            $path=$GLOBALS['config']['App']['path'];
            $type=$GLOBALS['config']['App']['type'];
            $size=$GLOBALS['config']['App']['size'];
            $file=new \Lib\Upload($path, $type, $size);
            if($path=$file->load($_FILES['face'])){
                  $data['user_face']=$path;
            }else{
                  $this->error('index.php?p=admin&c=Login&a=register',$file->geterror());
            }
            //写入数据库
            if($model->insert($data)){
                $this->success('index.php?p=admin&c=Login&a=login','注册成功，请登录');
            }else{
                $this->error('index.php?p=admin&c=Login&a=register','注册失败，请重新注册');
            }
            
        }
        $this->smarty->display('register.html');
    }
    public function createcodeAction(){
        $img=new \Lib\Captcha();
        $img->createcode2();
    }
    public function logoutAction(){
        session_destroy();
        header("Location:index.php?p=admin&c=login&a=login");
    }
    
}