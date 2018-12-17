<?php
/* Smarty version 3.1.32, created on 2018-09-30 20:43:46
  from 'E:\PHP\4-object\project\project\Application\View\Admin\menu.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bb0c502913a91_59427033',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '133b5f252e74063f3bf38ab0b8bed6b7a2668e3b' => 
    array (
      0 => 'E:\\PHP\\4-object\\project\\project\\Application\\View\\Admin\\menu.html',
      1 => 1538201854,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bb0c502913a91_59427033 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" href="./Application/View/Admin/css/pintuer.css">
<link rel="stylesheet" href="./Application/View/Admin/css/admin.css">
</head>

<body>
<ul class="nav nav-inline admin-nav">
    <li class="active">
        <ul>
            <?php if ($_SESSION['user']['is_admin'] == 1) {?>
            <li><a href="index.php?p=admin&c=user&a=list" target="mainFrame">用户管理</a></li>
            <li><a href="index.php?p=admin&c=category&a=list" target="mainFrame">类别管理</a></li>
            <li><a href="index.php?p=admin&c=link&a=list" target="mainFrame">友情链接</a></li>
            <?php }?>
            <li><a href="index.php?p=admin&c=user&a=edit" target="mainFrame">个人设置</a></li>
            <li><a href="index.php?p=admin&c=article&a=list" target="mainFrame">文章管理</a></li>            
        </ul>
    </li>
</ul>
</body>
</html>
<?php }
}
