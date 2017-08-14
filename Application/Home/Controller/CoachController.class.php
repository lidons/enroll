<?php 
namespace Home\Controller;
use Think\Controller;
class CoachController extends Controller {
	public function index(){
		$coach = M('Coach')->select();
		$this->assign('coach',$coach);
		$this->display();
	}
	public function speak(){
		$id = $_GET['id'];
		$coach = M('Coach')->where('id='.$id)->select();
		$this->assign('coach',$coach);
		$this->display();
	}
}