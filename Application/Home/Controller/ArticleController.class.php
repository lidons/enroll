<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller {
    public function index(){
    	$article = D('Article')->where('status=1')->select();
    	$this->assign('article',$article);
    	$this->display();
    }
    public function base(){
    	$article = D('Article')->where('status=2')->select();
    	$this->assign('article',$article);
    	$this->display();
    }
    public function raise(){
    	$article = D('Article')->where('status=3')->select();
    	$this->assign('article',$article);
    	$this->display();
    }
    public function senior(){
    	$article = D('Article')->where('status=4')->select();
    	$this->assign('article',$article);
    	$this->display();
    }
    public function welfare(){
    	$article = D('Article')->where('status=5')->select();
    	$this->assign('article',$article);
    	$this->display();
    }
    public function season(){
    	$article = D('Article')->where('status=6')->select();
    	$this->assign('article',$article);
    	$this->display();
    }
    public function week(){
    	$article = D('Article')->where('status=7')->select();
    	$this->assign('article',$article);
    	$this->display();
    }
	public function sign_up(){
		$addtime = D('adddate')->where('groups=4')->select();
		$this->assign('addtime',$addtime);
		$this->display();
	}
	public function login(){
		if(!trim($_POST['name'])){
			return show(0,'请输入你正确的姓名');
		}
		if(!trim($_POST['age'])|| !is_numeric($_POST['age'])){
			return show(0, "请填写正确的年龄");
		}
		if(!trim($_POST['parent'])){
			return show(0,'请输入家长的姓名');
		}
		//dump($_POST);
		$groups = $_POST['groups'];
		$name = $_POST['name'];
		$parent = $_POST['parent'];
		$phone = $_POST['phone'];
		$res = D('Culture')->is_existence($groups,$name,$parent,$phone);
		//dump($res);
		if($res){
			return show(0, '您已经预约过了^-^');
		}
		$insert =  D('Culture')->insert($_POST);
		if($insert){
			return show(1, '恭喜你，报名成功');
		}else{
			return show(0,'请重新添加');
		}
	}
}