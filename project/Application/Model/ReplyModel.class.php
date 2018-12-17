<?php
namespace Model;
class ReplyModel extends \Core\Model{
        private $tree;
        public function getreplytree($art_id){
            $sql="select r.*,u.user_name,u.user_face from reply r natural join user u where art_id=$art_id";
            $list=$this->db->lot($sql);
            $this->gettree($list);
            return $this->tree;
        }
        private function gettree($list,$parent_id=0,$deep=0){
            foreach($list as $rows){
                if($rows['parent_id']==$parent_id){
                    $rows['deep']=$deep;
                    $this->tree[]=$rows;
                $this->gettree($list,(int)$rows['reply_id'],$deep+1);
                }
            }
        }
}
