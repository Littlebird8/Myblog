<?php
/* Smarty version 3.1.32, created on 2018-10-08 14:52:02
  from 'E:\PHP\4-object\project\project\Application\View\Home\reply.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5bbafe92cc8729_97608993',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ee72ab82514460c3a3b466d9cc73ddd533035fb' => 
    array (
      0 => 'E:\\PHP\\4-object\\project\\project\\Application\\View\\Home\\reply.html',
      1 => 1538279456,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bbafe92cc8729_97608993 (Smarty_Internal_Template $_smarty_tpl) {
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
    <div class="tab-head"> <strong>新增评论信息</strong>
      <ul class="tab-nav">
        <li class="active"><a href="#tab-set">评论</a></li>
      </ul>
    </div>
    <div class="tab-body"> <br />
      <div class="tab-panel active" id="tab-set">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="panel" style="width: 500px;">
                <div class="panel-head"><strong>评论的信息</strong></div>
                <div class="panel-body" style="padding:30px;">
                    <div class="form-group">
                        <div class="field field-icon-right">
                            评论信息：
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field field-icon-right">
                           评论： 
                            <form id="frmSumbit"  method="post" action="" >	
                            <p><textarea name="replay_content" id="txaArticle" class="text" cols="50" rows="4"  ></textarea></p>
                            <input type="hidden" name="a_id" value="comment"></input>
                            <p><input name="sumbit" type="submit"  value="提交"  class="button" /></p>
                        </form>
                        </div>
                    </div>
                  
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
