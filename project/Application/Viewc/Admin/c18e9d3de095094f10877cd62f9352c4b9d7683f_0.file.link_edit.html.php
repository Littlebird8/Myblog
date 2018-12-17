<?php
/* Smarty version 3.1.32, created on 2018-10-08 15:08:19
  from 'E:\PHP\4-object\project\project\Application\View\Admin\link_edit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bbb0263d314f3_36595084',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c18e9d3de095094f10877cd62f9352c4b9d7683f' => 
    array (
      0 => 'E:\\PHP\\4-object\\project\\project\\Application\\View\\Admin\\link_edit.html',
      1 => 1538182044,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bbb0263d314f3_36595084 (Smarty_Internal_Template $_smarty_tpl) {
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
    <div class="tab-head"> <strong>分类管理</strong>
      <ul class="tab-nav">
        <li class="active"><a href="#tab-set">添加链接</a></li>
      </ul>
    </div>
    <div class="tab-body"> <br />
      <div class="tab-panel active" id="tab-set">
        <form method="post" class="form-x" action="">
          <div class="form-group">
            <div class="label">
              <label for="cat_name">分类名称</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="link_name" name="link_name" size="50" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['link_name'];?>
" />
            </div>
          </div>
           <div class="form-group">
            <div class="label">
              <label for="cat_name">链接地址</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="link_url" name="link_url" size="50" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['link_url'];?>
" />
              地址格式：http://www.******.**
            </div>
          </div>
         
          <div class="form-button">
            <button class="button bg-main" type="submit">提交</button>
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
