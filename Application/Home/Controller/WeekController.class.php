<?php
namespace Home\Controller;
use Think\Controller;
class WeekController extends Controller {
    public function index(){
    	$article = D('Article')->where('status=7')->select();
    	$res = D('Adddate')->where('groups=2')->select();
    	$groups = D('Adddate')->where('groups=3')->select();
    	$this->assign('gop',$groups);
    	$this->assign('res',$res);
    	$this->assign('article',$article);
    	$this->display();
    }
    public function check(){
    	if(!trim($_POST['name'])){
			return show(0,'请输入你正确的姓名');
		}
		$groups = $_POST['groups'];
		$name   = $_POST['name'];
		$phone  = $_POST['phone'];
	    $isit = D('Matchs')->is_exist($groups,$name,$phone);
		if($isit){
			return show(0, '您已经预约过了^-^!');
		}
		$insert = D('Matchs')->insert($_POST);
		if($insert){
			return show(1,'预约成功');
		}else{
			return show(0,'预约失败，请稍后再试');
		}	
    }
}