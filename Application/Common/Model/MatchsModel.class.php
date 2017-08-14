<?php
namespace Common\Model;
use Think\Model;
class MatchsModel extends Model{
	private $_db ='';
	public function __construct(){
		$this->_db = M('Matchs');
	}
	public function insert($data=array()){
		if(!$data||!is_array($data)){
			return 0;
		}
	  return $this->_db->add($data);
	}
	//判断是否已经报过名
	public 	function is_exist($groups,$name,$phone){
		return  $this->_db->where("groups=%d and name='%s' and phone='%s'",$groups,$name,$phone)->find();
	}
	/*季赛*/
	public function Season(){
		return $this->_db->where('groups=1')->order('createtime desc,id desc')->select();
	}
	/*周赛*/
	public function Week(){
		return $this->_db->where('groups=2')->order('createtime desc,id desc')->select();
	}
	/*修改状态*/
// 	public function updateStatusById($id, $botton) {
// 		if(!is_numeric($botton)) {
// 			throw_exception("botton不能为非数字");
// 		}
// 		if(!$id || !is_numeric($id)) {
// 			throw_exception("ID不合法");
// 		}
// 		$data['botton'] = $botton;
// 		return  $this->_db->where('id='.$id)->save($data); // 根据条件更新记录
	
// 	}
}