<?php 
namespace Model;
	class ProductsModel extends \Core\Model{
		//修改商品信息
		public function modifydb($arr){
			return $this->db->execa("update products set proname='{$arr['proname']}',
				proguige='{$arr['proguige']}',proprice='{$arr['proprice']}',proamount='{$arr['proamount']}' where proid={$arr['proid']}");
		}

		//展示单行信息
		public function collectdb($proid){
			return $this->db->array("select * from products where proid='{$proid}'");
		}

		//添加数据
		public function adddb($arr){
			return $this->db->execa("insert into products values (null,'{$arr['proname']}','{$arr['proguige']}',
				'{$arr['proprice']}','{$arr['proamount']}',null,null)");
		}
	}
 ?>