<?php
return array(
    'Basedata'=>array(
        'user'=>'root',
        'dbname'=>'php17',
        'pwd'=>'root'
    ),
    'App'=>array(
        'debug'=>true,                        //true代表为开发模式，false为上线模式
        'path'=>'./Public/Uploads/',
        'size'=>1024*1024,
        'type'=>array('image/jpeg','image/png','image/gif','image/jpg'),
        'p'=>'Admin',
        'c'=>'Login',
        'a'=>'login',
        'articlepagenum'=>'3'
    )
);

