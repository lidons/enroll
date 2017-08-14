<?php
namespace Admin\Controller;
use Think\Controller;
class CoachController extends PublicController {
		public function index(){
		$User = M('coach'); // 实例化User对象
		$count      = $User->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(10)
		$Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
		$Page->setConfig('prev', '上一页');
		$Page->setConfig('next', '下一页');
		$Page->setConfig('last', '末页');
		$Page->setConfig('first', '首页');
		$Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
		$Page->lastSuffix = false;//最后一页不显示为总页数
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('coach',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
			
// 		 $Coach=M('coach')->select();
// 		 $this->assign('coach',$Coach);
// 		 $this->display();
		}

  public function add_article(){
	  $this->display();  
  }
  
  //教练介绍
  public function add_article_do(){
	  $data['name']=$_POST['name'];
	  $data['picture']=$this->uploads($_FILES['img']);
	  $data['description']=$_POST['description'];
	  $res=M('coach')->add($data);
	  if($res){
		   $this->success('添加成功',"./index");  
	  }else{
		  
		   $this->error('添加失败');   
	  }
	 
  }
  
  
  //删除文章
  public function del_pz_article(){ 
	  $id=$_GET['id'];
	  $del= M('Coach')->where(array('id'=>$id))->delete();
	  if($del){
		   $this->success('删除成功');  
		  
	  }else{
		  
		   $this->error('删除失败');   
	  }
	  
  }
  //修改文章
   public function save_pz_article(){
	  $id=$_GET['id'];
	  $data= M('coach')->where(array('id'=>$id))->find();
	  $this->assign('data',$data);
	  $this->display(); 
	   
   }
  
  
  public function save_pz_article_do(){
	  $id=$_POST['id'];
	  $res= M('Coach')->where(array('id'=>$id))->find();
	  $data['name']=$_POST['name'];
	  $data['description']=$_POST['description'];
	  if($_FILES['picture']['name']){
		  $data['picture']=$this->uploads($_FILES['picture']);  
	  }
// 	  if($res['name']==$data['name']){
// 		  unset($data['name']);  
// 	  }
// 	   if($res['description']==$data['description']){
// 		  unset($data['description']);  
// 	  }
	  $res=M('Coach')->where(array('id'=>$id))->save($data);
		 if($res){
			  $this->success('修改成功',"./index");   
		 }else{
			  $this->error('修改失败');  
		 }
  }
  
  
 
		
}