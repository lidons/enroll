<?php
namespace Admin\Controller;
use Think\Controller;
class CultureController extends PublicController {
	public function index(){
		$User = M('Culture'); // 实例化User对象
		$count  = $User->where('groups=1')->count();// 查询满足要求的总记录数
		$Page   = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('last', '末页');
		$Page->setConfig('first', '首页');
		$Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
		$Page->lastSuffix = false;//最后一页不显示为总页数
		$show   = $Page->show();// 分页显示输
		$list = $User->where('groups=1')->order('createtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('culture',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
	}
  public function base(){
  	$User = M('Culture'); // 实例化User对象
		$count  = $User->where('groups=2')->count();// 查询满足要求的总记录数
		$Page   = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
    	$Page->setConfig('prev', '上一页');
    	$Page->setConfig('next', '下一页');
    	$Page->setConfig('last', '末页');
    	$Page->setConfig('first', '首页');
   		$Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
    	$Page->lastSuffix = false;//最后一页不显示为总页数
		$show   = $Page->show();// 分页显示输
		$list = $User->where('groups=2')->order('createtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('culture',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
  }
  public function raise(){
  	$User = M('Culture'); // 实例化User对象
		$count  = $User->where('groups=3')->count();// 查询满足要求的总记录数
		$Page   = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('last', '末页');
		$Page->setConfig('first', '首页');
		$Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
		$Page->lastSuffix = false;//最后一页不显示为总页数
		$show   = $Page->show();// 分页显示输
		$list = $User->where('groups=3')->order('createtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('culture',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
  }
  public function senior(){
  	$User = M('Culture'); // 实例化User对象
		$count  = $User->where('groups=4')->count();// 查询满足要求的总记录数
		$Page   = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('last', '末页');
		$Page->setConfig('first', '首页');
		$Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
		$Page->lastSuffix = false;//最后一页不显示为总页数
		$show   = $Page->show();// 分页显示输
		$list = $User->where('groups=4')->order('createtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('culture',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
  }
  //删除文章
  public function del_pz_article(){
  	$id=$_GET['id'];
  	$del= M('culture')->where(array('id'=>$id))->delete();
  	if($del){
  		$this->success('删除成功');
  
  	}else{
  		$this->error('删除失败');
  	}
  }
  public function modify_state(){
  	$id = $_GET['id'];
  	$status = $_GET['groups'];
  	//var_dump($status);exit();
  	$botton = 0;
  	$data['status'] = $botton;
  	$res = M('Culture')->where('id='.$id)->save($data);
  	if ($res){
  		if($status == 1){
  			echo "<script>window.location.href ='/ldw/index/admin/culture/index';</script>";
  			return false;
  		}
  		if($status == 2){
  			echo "<script>window.location.href ='/ldw/index/admin/culture/base';</script>";
  			return false;
  		}
  		if($status == 3){
  			echo "<script>window.location.href ='/ldw/index/admin/culture/raise';</script>";
  			return false;
  		}
  		if($status == 4){
  			echo "<script>window.location.href ='/ldw/index/admin/culture/senior';</script>";
  			return false;
  		}
  	}else{
  		echo "<script>alert('状态修改失败');</script>";
  	}
  }
  public function modify_status(){
  	$id = $_GET['id'];
  	$status = $_GET['groups'];
  	//var_dump($status);exit();
  	$botton = 1;
  	$data['status'] = $botton;
  	$res = M('Culture')->where('id='.$id)->save($data);
  if ($res){
  if($status == 1){
  			echo "<script>window.location.href ='/ldw/index/admin/culture/index';</script>";
  			return false;
  		}
  		if($status == 2){
  			echo "<script>window.location.href ='/ldw/index/admin/culture/base';</script>";
  			return false;
  		}
  		if($status == 3){
  			echo "<script>window.location.href ='/ldw/index/admin/culture/raise';</script>";
  			return false;
  		}
  		if($status == 4){
  			echo "<script>window.location.href ='/ldw/index/admin/culture/senior';</script>";
  			return false;
  		}
  	}else{
  		echo "<script>alert('状态修改失败');</script>";
  }
  }
  public function del(){
  	$id = $_GET['id'];  //判断id是数组还是一个数值
  	if($id == ''){
  		$this->error('删除失败');
  	}
  	if(is_array($id)){
  		$where = 'id in('.implode(',',$id).')';
  	}else{
  		$where = 'id='.$id;
  	}  //dump($where);
  	//var_dump($where);exit;
  	$list = M('Culture')->where($where)->delete();
  	if($list!==false) {
  		$this->success("成功删除{$list}条");
  	}else{
  		$this->error('删除失败！');
  	}
  }	
  
}