<?php 
namespace Core;
	class Model{
		protected $db;
		private $table;				//表名
		private $pk;				//主键
		public function __construct($table=''){
			$this->chushi();
			$this->gettable($table);
			$this->getpk();
		}
                //初始化连接数据库
		private function chushi(){
			$this->db=mypdo::conne($GLOBALS['config']['Basedata']);	
		}
		//获取表名
		private  function gettable($table){
			if($table==''){
				$class_name=basename(get_class($this));
				$this->table=substr($class_name,0,-5);
			}else{
				$this->table= strtolower($table);
			}
		}
		//获取主键
		private function getpk(){
			$re=$this->db->lot("desc {$this->table}");
			foreach($re as $v){
				if($v['Key']=='PRI'){
					$this->pk=$v['Field'];
					return;
				}
			}
		}
		//封装insert语句
		public function insert($data){
                        unset($data['btn']);
			$keys=array_keys($data);
                        $insert=strtolower(array_search($this->pk,$keys));
			$keys=array_map(function($a){
				return "`$a`";
			},$keys);
			$keys=implode(',',$keys);
			$values=array_values($data);
			$values=array_map(function($a){
                                $a= str_replace("<script","&lt;script",$a);
                                $a= str_replace("</script>","&lt;/script&gt;", $a);
				return "'$a'";
			},$values);
			$values=implode(',',$values);
			$sql="insert into `{$this->table}` ({$keys}) values ({$values})";
			if($this->db->execa($sql)){
				return $this->db->getInsertId();
			}else{
				return false;
			}
		}
		//封装update语句
		//update 表名 set keys=values where id='';

		public function update($data){
			$keys=array_keys($data);
			$insert=array_search($this->pk,$keys);
			unset($keys[$insert]);
			$keys=array_map(function($key) use($data){
                                $data[$key]= str_replace("<script","&lt;script",$data[$key]);
                                $data[$key]= str_replace("</script>","&lt;/script&gt;", $data[$key]);
				return "`$key`='$data[$key]'";
                                
			},$keys);
			$keys=implode(',',$keys);
			$sql="update `{$this->table}` set {$keys} where `{$this->pk}`='{$data[$this->pk]}'";
			return $this->db->execa($sql);
		}
		//封装delete语句
		public function delete($id){
			$sql="delete from `{$this->table}` where `{$this->pk}`={$id}";
			return $this->db->execa($sql);
		}
		//封装select语句，返回一个二维数组
		public function select($condition=array(),$orderby='',$orderxu='asc'){
			$sql="select * from `{$this->table}` where 1 ";
			foreach($condition as $k=>$v){
				$sql.="and `$k`='$v'";
			}
			if($orderby==''){
                                $sql.=" order by {$this->pk}";
                        }else{
                                 $sql.=" order by `$orderby` $orderxu";
                        }
			return $this->db->lot($sql);
		}
		//封装select语句，返回一个一维数组
		public function find($id){
                                $sql="select * from `{$this->table}` where `{$this->pk}`='{$id}'";
				return $this->db->array($sql);
			}
		}