<?php
/* Smarty version 3.1.32, created on 2018-09-30 16:42:13
  from 'E:\PHP\4-object\project\project\Application\View\Admin\article_list.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bb08c65bb9971_77252458',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba85a7f7bf194ee94d01e1e094d8af2799c1a06b' => 
    array (
      0 => 'E:\\PHP\\4-object\\project\\project\\Application\\View\\Admin\\article_list.html',
      1 => 1538193595,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bb08c65bb9971_77252458 (Smarty_Internal_Template $_smarty_tpl) {
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
<form method="post" action="">
<div class="panel admin-panel">
<div class="panel-head"><strong>文章检索</strong>&nbsp;&nbsp;&nbsp;&nbsp;
	类别：
        <select name="cat_id">
            <option value="">—不限—</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cat_list']->value, 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['rows']->value['cat_id'];?>
" <?php echo isset($_POST['cat_id']) && $_POST['cat_id'] == $_smarty_tpl->tpl_vars['rows']->value['cat_id'] ? "selected" : '';?>
>
                <?php echo str_repeat('&nbsp;',$_smarty_tpl->tpl_vars['rows']->value['deep']*4);
echo $_smarty_tpl->tpl_vars['rows']->value['cat_name'];?>
</option>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
    标题：<input type="text" name="art_title" value="<?php ob_start();
echo $_POST['art_title'];
$_prefixVariable1 = ob_get_clean();
echo isset($_POST['art_title']) ? $_prefixVariable1 : '';?>
">
    内容：<input type="text" name="art_content" value="<?php ob_start();
echo $_POST['art_content'];
$_prefixVariable2 = ob_get_clean();
echo isset($_POST['art_content']) ? $_prefixVariable2 : '';?>
">
    是否公开：<select name="is_public"><option value="">不限</option>
                       <option value="1" <?php echo isset($_POST['is_public']) && $_POST['is_public'] === '1' ? 'selected' : '';?>
>是</option>
                       <option value="0" <?php echo isset($_POST['is_public']) && $_POST['is_public'] === '0' ? 'selected' : '';?>
>否</option></select>
    是否置顶：<select name="is_top"><option value="">不限</option>
                        <option value="1" <?php echo isset($_POST['is_top']) && $_POST['is_top'] === '1' ? 'selected' : '';?>
>是</option>
                        <option value="0" <?php echo isset($_POST['is_top']) && $_POST['is_top'] === '0' ? 'selected' : '';?>
>否</option></select>
    <input type="submit" name="submit" value="搜索">
</div>
</div>
</form>
    <?php echo '<script'; ?>
 type="text/javascript">
        //全选
        window.onload=function(){
            document.getElementById('checkall').onclick=function(){
                var boxes=document.getElementsByName('art_id');
                for(var i=0;i<boxes.length;i++){
                    boxes[i].checked=!boxes[i].checked;
                }
            }
           
            //批量删除
            document.getElementById('del_all').onclick=function(){
		var ids=[];		//保存删除的id编号，数组格式
		var boxes=document.getElementsByName('art_id');
		for(var i=0;i<boxes.length;i++){
			if(boxes[i].checked)
				ids.push(boxes[i].value);
		}
		if(ids.length!=0){
			ids=ids.join();		//将元素连接成字符串
			location.href='index.php?p=Admin&c=Article&a=del&art_id='+ids;
		}
	}
        }
      
    <?php echo '</script'; ?>
>
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>内容列表</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" id="checkall" checkfor="id" value="全选" />
            <input type="button" class="button button-small border-green" value="添加文章" onClick="location.href='index.php?p=Admin&c=Article&a=add'"/>
            <input type="button" class="button button-small border-yellow" id='del_all' value="批量删除" />
            <input type="button" class="button button-small border-blue" value="回收站" onClick="location.href='index.php?p=Admin&c=recycle&a=list'"/>
        </div>
        <table class="table table-hover">
            <tr><th width="45">选择</th><th width="200">分类</th><th width="*">名称</th><th width="*">是否置顶</th><th width="*">是否公开</th><th width='200'>时间</th><th width="250">操作</th></tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'rows');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rows']->value) {
?>
                <tr>
                <td><input type="checkbox" name="art_id" value="<?php echo $_smarty_tpl->tpl_vars['rows']->value['art_id'];?>
" /></td>
                <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['cat_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['art_title'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['is_top'] == 1 ? "置顶" : "不置顶";?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['rows']->value['is_public'] == 1 ? "公开" : "不公开";?>
</td>         
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['rows']->value['art_time'],"%Y-%m-%d %H-%M-%S");?>
</td>
                <td>
                    <a class="button border-blue button-little" href="index.php?p=admin&c=article&a=edit&art_id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['art_id'];?>
">修改</a>
                    <a class="button border-yellow button-little" href="index.php?p=admin&c=article&a=del&art_id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['art_id'];?>
" onclick="return confirm('确认删除?')">删除</a>
                    <a class="button border-blue button-little" style="width:60px;text-align: center" href="index.php?p=admin&c=article&a=istop&art_id=<?php echo $_smarty_tpl->tpl_vars['rows']->value['art_id'];?>
&is_top=<?php echo $_smarty_tpl->tpl_vars['rows']->value['is_top'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['rows']->value['is_top'] == 1 ? "取消置顶" : "置顶";?>

                    </a>
                </td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            
        </table>
        <div class="panel-foot text-center">
            <ul class="pagination"><li><a href="#">上一页</a></li></ul>
            <ul class="pagination pagination-group">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
            </ul>
            <ul class="pagination"><li><a href="#">下一页</a></li></ul>
        </div>
    </div>
    <br />
    <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">传智播客</a>构建</p>
</div>
</body>
</html><?php }
}
