<?php
/* Smarty version 3.1.32, created on 2018-09-30 16:42:03
  from 'E:\PHP\4-object\project\project\Application\View\Admin\user_edit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bb08c5b1dde60_05178179',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8b7358febb0843fcfa19b70264491a463a59343' => 
    array (
      0 => 'E:\\PHP\\4-object\\project\\project\\Application\\View\\Admin\\user_edit.html',
      1 => 1537959357,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bb08c5b1dde60_05178179 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>拼图后台管理-后台管理</title>
<link rel="stylesheet" href="./Application/View/Admin/css/pintuer.css">
<link rel="stylesheet" href="./Application/View/Admin/css/admin.css">
</head>

<body>
<div class="admin">
  <div class="tab">
    <div class="tab-head"> <strong>用户管理</strong>
      <ul class="tab-nav">
        <li class="active"><a href="#tab-set">修改用户信息</a></li>
      </ul>
    </div>
    <div class="tab-body"> <br />
      <div class="tab-panel active" id="tab-set">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="panel" style="width: 500px;">
                <div class="panel-head"><strong>用户信息</strong></div>
                <div class="panel-body" style="padding:30px;">
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <strong>用户名：<?php echo $_SESSION['user']['user_name'];?>
</strong>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field field-icon-right">
                           密码： <input type="text" class="input" name="password"  />
                            <span class="icon icon-key"></span>
                        </div>
                    </div>
                   <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="file" class="input" name="face" >
                            <span class="icon icon-camera"></span>
                        </div>
                    </div>
                </div>
                <div class="panel-foot text-center">
                    <input type="submit" class="button button-block bg-main text-big" style="margin: auto"  value="用户修改" />
                </div>
            </div>
            </form>
      </div>
    </div>
  </div>
  <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">传智播客</a>构建</p>
</div>
</body>
</html><?php }
}