<?php
namespace Controller\Admin;
class BaseController extends \Core\Controller{
    public function __construct(){
        parent::__construct();
        $this->checkLogin();
    }
    private function checkLogin(){
        if(C_PATH=='Login')
            return;
        if(empty($_SESSION['user']))
//           $this->error("index.php?p=admin&c=Login&a=Login","请登录");
         echo <<<str
           <script type="text/javascript">
            alert('请登录');
            top.location.href='index.php?p=Admin&c=Login&a=login'
            //top关键字表示所有框架最顶端的窗口
            </script>    
str;
    }
}