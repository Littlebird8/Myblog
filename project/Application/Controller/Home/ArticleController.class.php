<?php
namespace Controller\Home;
class ArticleController extends \Controller\Home\BaseController{
    public function listAction(){
        $cat_id=$_GET['cat_id'];
        //获取cat_id及所有子级的cat_id的文章
        $art_model=new \Model\ArticleModel;
//获取分页开始
        $total=$art_model->gettotalpage($cat_id);
        $num=$GLOBALS['config']['App']['articlepagenum'];
        $art_page=new \Lib\Page($total, $num);
        $start=($art_page->start<0)?0:$art_page->start;  
        $str=$art_page->page($cat_id);
//分页结束
        $art_list=$art_model->getHomearticlebycat($cat_id, $start, $num);
        //获取类别树
        $cat_model=new \Model\CategoryModel;
        $cat_list=$cat_model->getCategorytree();
        //获取友情链接
        $link_model=new \Core\Model('link');
        $link_list=$link_model->select();
        $this->smarty->assign('str',$str);
        $this->smarty->assign('art_list',$art_list);
        $this->smarty->assign('link_list',$link_list);
        $this->smarty->assign('cat_list',$cat_list);
        $this->smarty->display('list.html');
    }
    public function articleAction(){
        $art_id=(int)$_GET['art_id'];
        $art_model=new \Model\ArticleModel;
        $art_model->voidreadcount($art_id);
        $art_list=$art_model->find($art_id);
        
        //获取评论
        $reply_model=new \Model\ReplyModel();
        $reply_list=$reply_model->getreplytree($art_id);
        $this->smarty->assign('reply_list',$reply_list);
        $this->smarty->assign('art_list',$art_list);
        $this->smarty->display('article.html');
    }
    public function updownAction(){
        $up=$_GET['up'];
        $art_id=$_GET['art_id'];
        $up_model=new \Model\ArticleModel;
        $info=($up==1)?"点赞":'踩';
        $info2=($up==1)?'踩':"点赞";
        if($up_model->countupdown($art_id, $up)){
            $this->success("index.php?p=home&c=article&a=article&art_id={$art_id}","{$info}成功");
        }else{
            $this->error("index.php?p=home&c=article&a=article&art_id={$art_id}","{$info}失败，已经{$info}或{$info2}过了");
        }
    }
    public function prenextAction(){
        $art_id=$_GET['art_id'];
        $next=$_GET['next'];
        //获取$art_id
        $art_model=new \Model\ArticleModel;
        if($art_id2=$art_model->getprenextartid($art_id, $next)){
            header("location:index.php?p=Home&c=Article&a=article&art_id=$art_id2");
        }else{
            $info=($next==1)?"已经是最后一篇了":"已经是第一篇了";
            $this->error("index.php?p=Home&c=Article&a=article&art_id=$art_id",$info);
        }
    }
    public function replyAction(){
        
        if(!empty($_POST)){
            if(!isset($_SESSION['user'])){
                $this->error("index.php?p=admin&c=login&a=login","评论前请先登录");
            }
            $data['art_id']=$_GET['art_id'];
            $data['user_id']=$_SESSION['user']['user_id'];
            $data['reply_content']=$_POST['replay_content'];
            $data['reply_time']=time();
            $data['parent_id']=0;
            $reply_model=new \Core\Model('reply');
            if($reply_model->insert($data)){
                $this->success("index.php?p=home&c=article&a=article&art_id={$data['art_id']}","评论成功");
            }else{
                $this->error("index.php?p=home&c=article&a=article&art_id={$data['art_id']}","评论失败");
            }
        }        
    }
    //增加子评论
    public function replysonAction(){
        $reply_model=new \Core\Model('reply');
        $data['art_id']=$_GET['art_id'];
        $data['reply_time']=time();
        $data['parent_id']=$_GET['parent_id'];
        if(!empty($_POST)){
            if(!isset($_SESSION['user'])){
                $this->error("index.php?p=admin&c=login&a=login","评论前请先登录");
            }
            $data['user_id']=$_SESSION['user']['user_id'];
            $data['reply_content']=$_POST['replay_content'];
            if($reply_model->insert($data)){
                $this->success("index.php?p=home&c=article&a=article&art_id={$data['art_id']}","评论成功");
            }else{
                $this->error("index.php?p=home&c=article&a=article&art_id={$data['art_id']}","评论失败");
            }
        } 
        $this->smarty->display('reply.html');
    }
}