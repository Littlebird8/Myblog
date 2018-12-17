<?php
namespace Model;
class CategoryModel  extends \Core\Model{
    private $tree=array();
    public function getCategorytree($parent_id=0){
        $list=$this->select();
        $this->getTree($list,$parent_id);
        return $this->tree;
    }
    private function getTree($list,$parent_id=0,$deep=0){
        foreach ($list as $value) {
            if($value['parent_id']==$parent_id){
                    $value['deep']=$deep;
                    $this->tree[]=$value;
            $this->getTree($list,$value['cat_id'],$deep+1);
//            echo '<hr>';
//            var_dump($this->tree);
//            echo '<hr>';
            }
        }
    }
    public function isleaf($id){
        $sql="select count(*) from category where parent_id=$id";
        return !$this->db->pcs($sql);
    }
}