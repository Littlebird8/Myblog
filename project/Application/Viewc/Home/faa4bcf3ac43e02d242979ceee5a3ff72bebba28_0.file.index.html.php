<?php
/* Smarty version 3.1.32, created on 2018-10-07 19:14:48
  from 'E:\PHP\4-object\project\project\Application\View\Home\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bb9eaa8a66c86_79292900',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'faa4bcf3ac43e02d242979ceee5a3ff72bebba28' => 
    array (
      0 => 'E:\\PHP\\4-object\\project\\project\\Application\\View\\Home\\index.html',
      1 => 1538910881,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bb9eaa8a66c86_79292900 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="Content-Language" content="zh-CN" />
	<title>www.myblog.com - Welcome to 我的博客 - Powered by PHP150912</title>
	<link rel="stylesheet" rev="stylesheet" href="./Public/style/default.css" type="text/css" media="all"/>
	<?php echo '<script'; ?>
 src="./Public/script/common.js" type="text/javascript"><?php echo '</script'; ?>
>
</head>
<body class="multi index">

<!-- top bar -->
<div id="top">
	<div class="center">
    <div class="menu-left">
    <ul>
     <li><a href="javascript:;" onclick="setHomepage('http://www.myblog.com');">设为首页</a></li>
     <li><a href="javascript:;" onclick="addFavorite('http://www.myblog.com','www.myblog.com - Welcome to 我的博客')">收藏本站</a></li>      
    </ul>
    </div>
    <div class="menu-right">
	    <ul id="info">
        <?php if (isset($_SESSION['user'])) {?>
        <li>欢迎 <?php echo $_SESSION['user']['user_name'];?>
！</li>
        <li><a href="index.php?p=admin&c=login&a=logout">退出</a></li>  
        <?php }?>
        <?php if (!isset($_SESSION['user'])) {?>
        <li><a href="index.php?p=admin&c=login&a=login" target="_blank">登录</a></li>
        <?php }?>  
    </ul>
	    </div>
   </div>	
</div>
  
<div id="divAll">
	<div id="divPage">
	<div id="divMiddle">
		<div id="divTop">
			<h1 id="BlogTitle"><a href="http://www.myblog.com">www.myblog.com</a></h1>
			<h3 id="BlogSubTitle">Welcome to 我的博客</h3>
		</div>
		<div id="divNavBar">
			<ul>
				<li id="nvabar-item-index"><a href="index.php?p=home&c=index&a=list">首页</a></li><li id="navbar-page-2"><a href="">留言本</a></li>			</ul>
		</div>

		<div id="divMain">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['art_list']->value, 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
<div class="post multi">
	<h2 class="post-title"><a href="index.php?p=home&c=article&a=article&art_id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['art_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['rows']->value['art_title'];?>
</a></h2>
	<div class="post-body">
                    <?php echo $_smarty_tpl->tpl_vars['rows']->value['art_content'];?>

	</div>
	<h5 class="post-tags"></h5>
	<h6 class="post-footer">
		作者:<?php echo $_smarty_tpl->tpl_vars['rows']->value['user_name'];?>
 | 分类:<?php echo $_smarty_tpl->tpl_vars['rows']->value['cat_name'];?>
 | 阅读:<?php echo $_smarty_tpl->tpl_vars['rows']->value['art_read'];?>
 | 赞:<?php echo $_smarty_tpl->tpl_vars['rows']->value['art_up'];?>
 | 踩:<?php echo $_smarty_tpl->tpl_vars['rows']->value['art_down'];?>
</h6>
</div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
echo $_smarty_tpl->tpl_vars['str']->value;?>

		</div>
<div id="divSidebar">
<dl class="function" id="divSearchPanel">
<dt class="function_t">文章标题搜索</dt><dd class="function_c">
<div>
	<form name="search" method="post" action="index.php?p=home&&c=index&a=list">
		<input type="text" name="content" size="11" value="<?php echo $_smarty_tpl->tpl_vars['content']->value;?>
"/> 
		<input type="submit" value="搜索" />
	</form>
</div>


</dd>
</dl> 
<dl class="function" id="divCalendar">
<dt style="display:none;"></dt><dd class="function_c">

<div></div>


</dd>
</dl> 
<dl class="function" id="divCatalog">
<dt class="function_t">文章分类</dt><dd class="function_c">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cat_list']->value, 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
        <ul>
        <li ><a href="index.php?p=home&c=article&a=list&cat_id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['cat_id'];?>
" target="_blank"><?php echo str_repeat('&nbsp;',$_smarty_tpl->tpl_vars['rows']->value['deep']*4);
echo $_smarty_tpl->tpl_vars['rows']->value['cat_name'];?>
</a></li>
        </ul>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</dd>
</dl> 

<dl class="function" id="divLinkage">
<dt class="function_t">友情链接</dt><dd class="function_c">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['link_list']->value, 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
<ul><li><a href="<?php echo $_smarty_tpl->tpl_vars['rows']->value['link_url'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['rows']->value['link_name'];?>
</a></li></ul>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</dd>
</dl> 
</dl>		</div>
		<div id="divBottom">
        	<h3 id="BlogCopyRight">
                                            	Copyright © 2008-2028 PHP150912 All Rights Reserved            </h3>
			<h4 id="BlogPowerBy">Powered by <a href="" title="myblog" target="_blank">myblog V1.0 Release 20151116</a></h4>
		</div><div class="clear"></div>
	</div><div class="clear"></div>
	</div><div class="clear"></div>
</div>
</body>
</html><?php }
}
