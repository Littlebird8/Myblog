<?php
namespace Model;
class ArticleModel extends \Core\Model{
    
 //以下为后台获取数据
        //获取该用户的文章信息
    public function getinfo(){
        $sql="select a.*,c.cat_name from article a inner join category c using(cat_id) where is_recycle=0"
                . " and user_id= ".$_SESSION['user']['user_id'];
        return $this->db->lot($sql);
    }
        //删除文章信息
    public function delinfo($art_id){
        $sql="update article set is_recycle=1 where art_id in ({$art_id})";
        return $this->db->execa($sql);
    }
        //通过查询获得的该用户文章
    public function serchinfo(){
        $sql="select a.*,c.cat_name from article a inner join category c using(cat_id) where is_recycle=0"
                . " and user_id= ".$_SESSION['user']['user_id'];
        if($_POST['cat_id']!=""){
            $model=new CategoryModel('category');
            $info=$model->getCategorytree($_POST['cat_id']);
            $ids[0]=$_POST['cat_id'];
            foreach($info as $rows){
                $ids[]=$rows['cat_id'];
            }
            $ids= implode(',',$ids);
            $sql.=" and cat_id in ({$ids})";
        }
        if($_POST['art_title']!==""){
            $sql.=" and art_title like '%{$_POST['art_title']}%'";
        }
        if($_POST['art_content']!==""){
            $sql.=" and art_content like '%{$_POST['art_content']}%'";
        }
        if($_POST['is_public']!==""){
            $sql.=" and is_public={$_POST['is_public']}";
        }
        if($_POST['is_top']!==""){
            $sql.=" and is_top={$_POST['is_top']}";
        }
        return $this->db->lot($sql);
    }
        //获取该用户的在回收站的信息
    public function getrecycle(){
        $sql="select a.*,c.cat_name from article a inner join category c using(cat_id) where is_recycle=1"
                . " and user_id= ".$_SESSION['user']['user_id'];
        return $this->db->lot($sql);
    }
        //获取该用户的在回收站的信息(通过筛选后的)
    public function getrecyclepcs(){
         $sql="select a.*,c.cat_name from article a inner join category c using(cat_id) where is_recycle=1"
                . " and user_id= ".$_SESSION['user']['user_id'];
        if($_POST['cat_id']!=""){
            $model=new CategoryModel('category');
            $info=$model->getCategorytree($_POST['cat_id']);
            $ids[0]=$_POST['cat_id'];
            foreach($info as $rows){
                $ids[]=$rows['cat_id'];
            }
            $ids= implode(',',$ids);
            $sql.=" and cat_id in ({$ids})";
        }
        if($_POST['art_title']!==""){
            $sql.=" and art_title like '%{$_POST['art_title']}%'";
        }
        if($_POST['art_content']!==""){
            $sql.=" and art_content like '%{$_POST['art_content']}%'";
        }
        if($_POST['is_public']!==""){
            $sql.=" and is_public={$_POST['is_public']}";
        }
        if($_POST['is_top']!==""){
            $sql.=" and is_top={$_POST['is_top']}";
        }
        return $this->db->lot($sql);
    }
         //将回收站的信息还原
    public function restore($art_id){
        $sql="update article set is_recycle=0 where art_id in ({$art_id})";
        return $this->db->execa($sql);
    }
        //将回收站的信息彻底删除
    public function delall($art_id){
        $sql="delete from article where art_id in ({$art_id})";
        return $this->db->execa($sql);
    }
    
    //以下为前台获取数据
    public function getHomearticle($start,$num,$content=""){
        $sql="select a.*,c.cat_name,u.user_name from article a inner join category c using(cat_id) inner join user u using "
                . "(user_id) where is_public=1 and is_recycle=0 order by is_top desc";
        if($content!=""){
            $sql="select a.*,c.cat_name,u.user_name from article a inner join category c using(cat_id) inner join user u using (user_id) where is_public=1 and is_recycle=0  and art_title like '%{$content}%' order by is_top desc";  
        }
        $sql.=" limit {$start},{$num}";
//        echo $sql;
//        echo $start;
//        echo $num;
//        echo '<pre>';
//        var_dump($this->db->lot($sql));
//        die();
        return $this->db->lot($sql);
    }
    //根据类别ID获取该类别下所有的文章
    public function getHomearticlebycat($cat_id,$start,$num){
        //获取子级所有的id
        $ids=$this->getsonid($cat_id);
        $sql="select a.*,u.user_name,c.cat_name from category c natural join user u natural join article a where is_public=1 and"
                . " cat_id in ({$ids}) and is_recycle=0 order by is_top desc";
        $sql.=" limit {$start},{$num}";
        return $this->db->lot($sql);
    }
    //获取分类子级的所有id含自己
    public function getsonid($cat_id,$table='category'){
        $cat_model=new CategoryModel($table);
        $id=$cat_model->getCategorytree($cat_id);
        $ids[]=$cat_id;
        foreach($id as $rows){
            $ids[]=$rows['cat_id'];
        }
        $ids= implode(',', $ids);
        return $ids;
    }
    //更新阅读数
    public function voidreadcount($art_id){
        if(isset($_SESSION['art_'.$art_id]))
            return;
        $_SESSION['art_'.$art_id]=1;
        $sql="update article set art_read=art_read+1 where art_id={$art_id}";
        return ($this->db->execa($sql)); 
    }
    public function countupdown($art_id,$up){
        if(isset($_SESSION['up_'.$art_id]))
            return false;
        if($up)
            $up='art_up';
        else
            $up="art_down";
        $_SESSION['up_'.$art_id]=1;
        $sql="update article set `{$up}`=`{$up}`+1 where art_id={$art_id}";
        return ($this->db->execa($sql)); 
    }
    public function getprenextartid($art_id,$next){
        if($next){      //下一篇
            $sql="select art_id from article where art_id>$art_id and is_recycle=0 and is_public=1 order by art_id limit 1";
        }else{          //上一篇
            $sql="select art_id from article where art_id<$art_id and is_recycle=0 and is_public=1 order by art_id desc limit 1";
        }
       return $this->db->pcs($sql);
    }
    public function gettotalpage($cat_id='',$table='article'){
        $sql="select count(*) from {$table} where is_recycle=0 and is_public=1";
        if($cat_id!=''){
            $ids=$this->getsonid($cat_id);
            $sql.=" and cat_id in ({$ids})";
        }
        return $this->db->pcs($sql);
    }
    
    public function gettotalpagebycontent($content='',$table='article'){
            $sql="select count(*) from {$table} where is_recycle=0 and is_public=1";
            if($content!=''){
                $sql.=" and art_title like '%{$content}%'";
            }
            return $this->db->pcs($sql);
    }
    
}