<?php
namespace Admin\Controller;
use Think\Controller;
class QualityController extends PublicController {
		public function index(){
		 $article=M('Article')->where('status=1')->select();
		 $this->assign('article',$article);
		 $this->display();
		}

  public function add_article(){
	  $this->display();  
  }
  public function base(){
  	$article=M('Article')->where('status=2')->select();
  	$this->assign('article',$article);
  	$this->display();
  }
  public function raise(){
  	$article=M('Article')->where('status=3')->select();
  	$this->assign('article',$article);
  	$this->display();
  }
  public function senior(){
  	$article=M('Article')->where('status=4')->select();
  	$this->assign('article',$article);
  	$this->display();
  } 
  public function welfare(){
  	$article=M('Article')->where('status=5')->select();
  	$this->assign('article',$article);
  	$this->display();
  }
  public function season(){
  	$article=M('Article')->where('status=6')->select();
  	$this->assign('article',$article);
  	$this->display();
  }
  public function week(){
  	$article=M('Article')->where('status=7')->select();
  	$this->assign('article',$article);
  	$this->display();
  }
  
  
  //添加文章
  public function add_article_do(){
	  $data['title']=$_POST['title'];
	  $data['description']=$_POST['description'];
	  $res=M('article')->add($data);
	  if($res){
		   $this->success('添加成功');  
	  }else{
		  
		   $this->error('添加失败');   
	  }
  }
  
  //删除文章
  public function del_pz_article(){ 
	  $id=$_GET['id'];
	  $del= M('article')->where(array('id'=>$id))->delete();
	  if($del){
		   $this->success('删除成功');  
		  
	  }else{
		   $this->error('删除失败');   
	  }
	  
  }
   public function save_pz_article(){
	  $id=$_GET['id'];
	  $data= M('article')->where(array('id'=>$id))->find();
	  $this->assign('data',$data);
	  $this->display(); 
	   
   }
  
  
  public function save_pz_article_do(){
	  $id=$_POST['id'];
	  $data['title']=$_POST['title'];
	  $data['description'] = $_POST['description']; 
	  $res=M('article')->where(array('id'=>$id))->save($data);
		 if($res){
			  $this->success('修改成功','./index');  
			 
		 }else{
			  $this->error('修改失败');  
		 }
  }

}