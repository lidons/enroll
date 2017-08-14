<?php
namespace Common\Model;
use Think\Model;
class CultureModel extends Model{
	private $_db ='';
	public function __construct(){
		$this->_db = M('Culture');
	}
	public function insert($data=array()){
		if(!$data||!is_array($data)){
			return 0;
		}
	  return $this->_db->add($data);
	}
	public function is_existence($groups,$name,$parent,$phone){
		return $this->_db->where('groups=%d and name="%s" and parent="%s" and phone="%s"',$groups,$name,$parent,$phone)->find();
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
	//获取总数
	public function page($num,$data,$page,$pageSize=10){
		$data['groups'] = array('eq',$num);
		$offset = ($page - 1) * $pageSize;
		$list = $this->_db->where($data)->order('createtime desc')->limit($offset,$pageSize)->select();
		return $list;
	}
	public function getMenus($data,$page,$pageSize=10) {
		$data['status'] = array('neq',-1);
		$offset = ($page - 1) * $pageSize;
		$list = $this->_db->where($data)->order('listorder desc,menu_id desc')->limit($offset,$pageSize)->select();
		return $list;
	}
}