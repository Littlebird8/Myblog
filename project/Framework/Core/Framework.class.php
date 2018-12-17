<?php
namespace Core;
class Framework{
    public static function run(){
        self::iniConst();
        self::iniBase();
        self::iniex();
        self::iniRouts();
        self::iniLoadClass();
        self::iniSep();
    }
    //定义地址常量
    private static function iniConst(){
        define('BASE_PATH', getcwd());
        define('DS',DIRECTORY_SEPARATOR);
        define('APP_PATH',BASE_PATH.DS.'Application'.DS);
        define('FRAM_PATH',BASE_PATH.DS.'Framework'.DS);
        define('CONTROLLER_PATH',APP_PATH.'Controller'.DS);
        define('MODEL_PATH',APP_PATH.'Model'.DS);
        define('CONFIG_PATH',APP_PATH.'Config'.DS);
        define('VIEW_PATH',APP_PATH.'View'.DS);
        define('CORE_PATH',FRAM_PATH.'Core'.DS);
        define('LIB_PATH',FRAM_PATH.'Lib'.DS);
    }
    //加载配置文件
    private static function iniBase(){
        $GLOBALS['config']=require CONFIG_PATH.'Config.class.php';
    }
    //确认路由
    private static function iniRouts(){
        $p=$_GET['p']??$GLOBALS['config']['App']['p'];
        $c=$_GET['c']??$GLOBALS['config']['App']['c'];
        $a=$_GET['a']??$GLOBALS['config']['App']['a'];
        $p= ucfirst(strtolower($p));
        $c= ucfirst(strtolower($c));
        $a= strtolower($a);
        define('P_PATH',$p);
        define('C_PATH',$c);
        define('A_PATH',$a);
        define('__VIEW__',APP_PATH.'View'.DS.$p.DS);
        define('__VIEWCA__',APP_PATH.'Viewc'.DS.$p.DS);
    }
    
    //自动加载类
    private static function iniLoadClass(){
        spl_autoload_register(function ($class_name){
//            echo $class_name,'<br>';
            $spacename= dirname($class_name);
            $class_name= basename($class_name);
            $map=array(
                'Smarty'=>CORE_PATH.'Smarty'.DS.'Smarty.class.php'
            );
//            echo $class_name,'<br>';
            if(isset($map[$class_name])){
                $path=$map[$class_name];
            }elseif(in_array($spacename,array('Core','Lib'))){
                $path=FRAM_PATH.$spacename.DS.$class_name.'.class.php';
            }elseif($spacename=='Model'){
                $path=MODEL_PATH.$class_name.'.class.php';
            }else{
                $path=APP_PATH.$spacename.DS.$class_name.'.class.php';
            }
//            echo $path,'<br>';
            if(file_exists($path)){
//                echo $path,'<br>';
                require $path;
            }
        });
    }
    //请求分发
    private static function iniSep(){
        $class='\Controller'.'\\'.P_PATH.'\\'.C_PATH.'controller';
        $action=A_PATH.'Action';
        $obj=new $class;
        $obj->$action();
    }
    
    //模式选择，决定错误显示方式
    private static function iniex(){
        $date= date("Y-m-d");
        if($GLOBALS['config']['App']['debug']){
            ini_set('error_reporting', E_ALL);
            ini_set('display_errors', 'On');    //错误显示在浏览器上
            ini_set('log_errors', 'off');       //关闭日志
        }else{
            ini_set('error_reporting', E_ALL);
            ini_set('display_errors', 'off');
            ini_set('log_errors', 'on');
            ini_set('error_log',"./Public/Log/$date".'.log');
        }
    }
}
