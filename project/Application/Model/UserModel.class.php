<?php
namespace Model;
class UserModel extends \Core\Model{
       public function islogin(){
        $data['user_name']=$_POST['username'];
        $data['user_pwd']=md5($_POST['password']);
        if($info=$this->select($data)){
            $info=$info[0];
            unset($info['user_pwd']);
            return $info;
        }
        return false;
       }
       public function updatelogininfo(){
           $data['last_login_ip']=ip2long($_SERVER['REMOTE_ADDR']);
           $data['last_login_time']=time();
           $data['login_count']=++$_SESSION['user']['login_count'];
           $data['user_id']=$_SESSION['user']['user_id'];
           return $this->update($data);
       }
                
}
