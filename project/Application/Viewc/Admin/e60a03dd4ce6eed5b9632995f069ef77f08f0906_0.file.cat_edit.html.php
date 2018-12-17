<?php
/* Smarty version 3.1.32, created on 2018-09-30 16:38:30
  from 'E:\PHP\4-object\project\project\Application\View\Admin\cat_edit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bb08b86f166e4_93777093',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e60a03dd4ce6eed5b9632995f069ef77f08f0906' => 
    array (
      0 => 'E:\\PHP\\4-object\\project\\project\\Application\\View\\Admin\\cat_edit.html',
      1 => 1538032158,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bb08b86f166e4_93777093 (Smarty_Internal_Template $_smarty_tpl) {
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
        <li class="active"><a href="#tab-set">添加分类</a></li>
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
              <input type="text" class="input" id="cat_name" name="cat_name" size="50" placeholder="分类名称"  value="<?php echo $_smarty_tpl->tpl_vars['info']->value['cat_name'];?>
"/>
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="parentid">所属分类</label>
            </div>
            <div class="field">
              
              <select class="input" name="parent_id" style="width:20%" id="parentid">
                 <option value="0">
                     ——请选择类别——</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['rows']->value['cat_id'];?>
" <?php echo $_smarty_tpl->tpl_vars['rows']->value['cat_id'] == $_smarty_tpl->tpl_vars['info']->value['parent_id'] ? 'selected' : '';?>
>
                    <?php echo str_repeat('&nbsp;',$_smarty_tpl->tpl_vars['rows']->value['deep']*4);
echo $_smarty_tpl->tpl_vars['rows']->value['cat_name'];?>

                </option>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="sort_order">排序</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="sort_order" name="cat_order" size="50" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['cat_order'];?>
" />
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
