<?php
namespace Lib;
class Session{
    private $db;
    public function __construct() {
        session_set_save_handler(
                array($this,'open'),
                array($this,'close'),
                array($this,'read'), 
                array($this,'write'),
                array($this,'destroy'),
                array($this,'gc')
                );
        session_start();
    }
    public function open(){
        $this->db=\Core\mypdo::conne($GLOBALS['config']['Basedata']);
        return true;
    }
    public function close(){
        return true;
    }
    public function read($sess_id){
        $sql="select sess_value from session where sess_id='$sess_id'";
        return (string)$this->db->pcs($sql);
    }
    public function write($sess_id,$sess_value){
        $time=time();
        $sql="insert into session values('$sess_id','$sess_value',$time) on duplicate key update sess_value='$sess_value',sess_time=$time";
        return $this->db->execa($sql)!==false;
    }
    public function destroy($sess_id){
        $sql="delete from session where sess_id='$sess_id'";
        return $this->db->execa($sql)!==false;
    }
    public function gc($lifetime){
        $time=time()-$lifetime;
        $sql="delete from session where sess_time<$time";
        return $this->db->execa($sql)!==false;
    }
    
}