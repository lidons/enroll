<?php
namespace Common\Model;
use Think\Model;
class VenueModel extends Model{
	private $_db ='';
	public function __construct(){
		$this->_db = M('Venue');
	}
	public function insert($data=array()){
		if(!$data||!is_array($data)){
			return 0;
		}
	  return $this->_db->add($data);
	}
	public function Exists($name,$phone){
		return $this->_db->where('name="%s" and phone="%s"',$name,$phone)->find();
	}
	public function extract(){
		return $this->_db->order('createtime desc')->select();
	}
	public function remove($d){
		return $this->_db->where('id='.$d)->delete();
	}
}