<?php 
namespace Controller\Admin;
	class ProductsController extends BaseController{
		//展示商品信息
		public function listAction(){
			$products=new \Core\Model('products');
			$list=$products->select();
                        $this->smarty->assign('list',$list);
                        $this->smarty->display('products_list.html');
		}
		//删除商品信息
		public function delAction(){
			$proid=$_GET['proid'];
			$del=new \Core\Model('products');
			$a=$del->delete($proid);
			if($a){
				$this->success("index.php",'删除成功');
			}else{
				$this->error("index.php",'删除失败');
			}
		}
		//修改商品信息
		public function collectAction(){
			$proid=$_GET['proid']??'';
			$type=$_GET['collect'];
			$modify=new \Core\Model('products');
			if($proid==''){
				$info='';
			}else{
				$info=$modify->find($proid);
			}
                        $this->smarty->assign('proid',$proid);
                        $this->smarty->assign('type',$type);
                        $this->smarty->assign('info',$info);
			$this->smarty->display('products_modify.html');
		}
		//修改商品信息
		public function modifyAction(){
			$proid=$_GET['proid'];
			$arr=array(
				'proid'=>$_GET['proid'],
				'proname'=>$_POST['proname'],
				'proguige'=>$_POST['proguige'],
				'proprice'=>$_POST['proprice'],
				'proamount'=>$_POST['proamount']
				);
			$modify=new \Core\Model('products');
			$info=$modify->update($_POST);
			if($info){
				$this->success("index.php",'修改成功');
			}else{
				$this->error("index.php",'修改失败');
			}
		}

		public function addAction(){
			$arr=array(
				'proid'=>$_GET['proid'],
				'proname'=>$_POST['proname'],
				'proguige'=>$_POST['proguige'],
				'proprice'=>$_POST['proprice'],
				'proamount'=>$_POST['proamount']
				);
			$add=new \Core\Model('products');
			$info=$add->insert($_POST);
			if($info){
				$this->success("index.php",'添加成功');
			}else{
				$this->error("index.php",'添加失败');
			}
		}
	}
 ?>