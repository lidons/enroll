<?php
namespace Common\Model;
use Think\Model;
class VenueModel extends Model{
	private $_db ='';
	public function __construct(){
		$this->_db = M('Admin');
	}
	public function insert($data){
		$this->_db->save($data);
	}
}