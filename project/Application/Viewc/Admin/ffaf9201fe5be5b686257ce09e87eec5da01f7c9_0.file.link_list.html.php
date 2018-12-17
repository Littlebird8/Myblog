<?php
/* Smarty version 3.1.32, created on 2018-09-30 16:38:06
  from 'E:\PHP\4-object\project\project\Application\View\Admin\link_list.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bb08b6e352b60_65995539',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ffaf9201fe5be5b686257ce09e87eec5da01f7c9' => 
    array (
      0 => 'E:\\PHP\\4-object\\project\\project\\Application\\View\\Admin\\link_list.html',
      1 => 1538145160,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bb08b6e352b60_65995539 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'E:\\PHP\\4-object\\project\\project\\Framework\\Core\\Smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>拼图后台管理-后台管理</title>
    <link rel="stylesheet" href="./Application/View/Admin/css/pintuer.css">
    <link rel="stylesheet" href="./Application/View/Admin/css/admin.css">
</head>

<body>
<div class="admin">
	<form method="post">
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>链接列表</strong></div>
        <div class="padding border-bottom">
          <input type="button" class="button button-small border-green" value="添加链接" onClick="location.href='index.php?p=admin&c=link&a=add'" />
        </div>
        <table class="table table-hover">
        	<tr>
        	  <th width="45">编号</th>
                  <th width="*">名称</th>
                  <th width="*">链接地址</th>
                  <th width="*">链接时间</th>
                  <th width="100">操作</th></tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'rows');
$_smarty_tpl->tpl_vars['rows']->iteration = 0;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
$_smarty_tpl->tpl_vars['rows']->iteration++;
$__foreach_rows_0_saved = $_smarty_tpl->tpl_vars['rows'];
?>
            <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['rows']->iteration;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['link_name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['link_url'];?>
</td>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['rows']->value['link_time'],"%Y-%m-%d %H:%M:%S");?>
</td>
            <td><a class="button border-blue button-little" href="index.php?p=admin&c=link&a=edit&link_id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['link_id'];?>
">修改</a> 
                <a class="button border-yellow button-little" href="index.php?p=admin&c=link&a=del&link_id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['link_id'];?>
" onclick="{if(confirm('确认删除?')){return true;}return false;}">删除</a></td></tr>
            <?php
$_smarty_tpl->tpl_vars['rows'] = $__foreach_rows_0_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
           
        </table>
    </div>
    </form>
    <br />
    <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">传智播客</a>构建</p>
</div>
</body>
</html><?php }
}
