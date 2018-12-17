<?php 
namespace Core;
	class mypdo{
		private $type;
		private $host;
		private $port;
		private $dbname;
		private $charset;
		private $user;
		private $pwd;
		private $pdo;
		private static $n;
		private function __construct($map){

			$this->chushi($map);
			//连接数据库
			$this->lianjie();
			//初始化异常
			$this->chushiex();
		}
		private function __clone(){}
		public static function conne($map=array()){
			if(!self::$n instanceof self){
					self::$n=new self($map);
			}
			return self::$n;
		} 

		private function chushi($map){
			$this->type=$map['type']??'mysql';
			$this->host=$map['host']??'localhost';
			$this->port=$map['port']??'3306';
			$this->dbname=$map['dbname']??'php17';
			$this->charset=$map['charset']??'utf8';
			$this->user=$map['user']??'root';
			$this->pwd=$map['pwd']??'12';
		}

		private function lianjie(){
			try {
				$dsn="$this->type:host={$this->host};dbname={$this->dbname};port={$this->port};charset={$this->charset}";
				$this->pdo=new \PDO($dsn,$this->user,$this->pwd);
			} catch (\Exception $e) {
				$this->showex($e);
			}
		}

		private function showex($e,$sql=''){
			if($sql!=''){
				echo '错误的sql语句为',$sql,'<br>';
			}
			echo '错误的信息错误号',$e->getcode(),'<br>';
			echo '错误的信息为',$e->getmessage(),'<br>';
			echo '错误的信息行',$e->getline(),'<br>';
			echo '错误的信息的文件',$e->getfile(),'<br>';
		}

		private function chushiex(){
			$this->pdo->setattribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
		}

		//执行操作语句
		public function execa($sql){
			try {
				$res=$this->pdo->exec($sql);
				return $res;
			} catch (\Exception $e) {
				$this->showex($e,$sql);
			}
		}
		//获取自动增长的编号
		public function getInsertId(){
        return $this->pdo->lastInsertId();
   		 }

   		 
		private function typesele($type){
			switch ($type){
				case 'num':return \PDO::FETCH_NUM;
                case 'both':return \PDO::FETCH_BOTH;
                default:return \PDO::FETCH_ASSOC;
			}
		}
		private function quer($sql){
			try {
				return $this->pdo->query($sql);
			} catch (\Exception $e) {
				$this->showex($e,$sql);
			}
		}

		//匹配全部
		public function lot($sql,$type='assoc'){
			$type=$this->typesele($type);
			$result=$this->quer($sql);
			$res=$result->fetchall($type);
			return $res;
		}
		//匹配1行
		public function array($sql,$type='assoc'){
			$type=$this->typesele($type);
			$result=$this->quer($sql);
			$res=$result->fetch($type);
			return $res;
		}
		//匹配1行1列
		public function pcs($sql,$n=0){
			$result=$this->quer($sql);
			$res=$result->fetchcolumn($n);
			return $res;
		}
	}

	// $pdo=mypdo::conne();
	// var_dump($pdo);
	// echo '<hr>';
	// $res=$pdo->lot("select * from stu");
	// var_dump($res);
	// echo '<hr>';
	// $res=$pdo->array("select * from stu");
	// var_dump($res);
	// echo '<hr>';
	// $res=$pdo->pcs("select count(*) from stu");
	// echo $res;