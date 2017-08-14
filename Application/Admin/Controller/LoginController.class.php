<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
		public function index(){
			if(IS_POST){
			$res  = $this->check_verify($_POST['code']);
			if($res){
				$username = $_POST['username'];
				$password = md5($_POST['password']);
				$user = M('admin')->where(array('username'=>$username,'password'=>$password))->find();
				if($user){
					session('user',$user['username']);  //设置session
					$this->success('登录成功',U('Admin/Index/index'));
					exit;
				}else{
					 $this->error('用户名和密码不匹配');
					 exit;
				}
			}else{
				$this->error('验证码错误');
				exit;
			}
		}
		  $this->display();
		}
	    //验证码 
		public function verify(){
        $config =    array(
          'fontSize'    =>    25,    
          'length'      =>    4,
		  'useCurve'    =>    false,
          'useNoise'    =>    false,
		  'codeSet'     =>'0123456789',
	  	  'bg'          =>array(245,245,245),
        );
        $Verify =    new \Think\Verify($config);
        $Verify->entry();
       }
	   //验证验证码
	   function check_verify($code, $id = ''){
		$verify = new \Think\Verify();
		return $verify->check($code, $id);
	   }
	//退出登录
	public function loginout(){
		session('user',null); // 删除name
		$this->redirect('index');
	}	
	public function add(){
		$res = M('Admin')->field('id,username')->select();
		$this->assign('res',$res);
		$this->display();
	}
	public function del_admin(){
		$id = $_GET['id'];
		$count= M('Admin')->count();
		if($count == 1){
			$this->error('还有一个管理员了');
		}
		$res = M('Admin')->where('id='.$id)->delete();
		if($res){
			$this->success('删除管理员成功');
		}else{
			$this->error('删除失败');
		}
	}
	public function add_pwd_do(){
		if($_POST){
			$_POST['password'] = md5($_POST['password']);
			$insert = M('Admin')->add($_POST);
			if($insert){
				$this->success('增加成功！');
			}else{
				$this->error('增加失败！');
			}
		}else{
			$this->error('失败！');
		}
	}
	public function save_pwd(){
		$this->display();
	}
	public function save_pwd_do(){
      if(IS_POST){
			$res = M('admin')->where(array('username'=>session('user')))->find();	
			if($res['password'] != md5($_POST['orpassword'])){
				$this->error('输入的原始密码不正确');
			}else if($res['password'] == md5($_POST['password'])){
				$this->error('新密码和原密码一致');
			}else{
			$save_pwd = M('admin')->where(array('username'=>session('user')))
			->save(array('password'=>md5($_POST['password'])));
			   if($save_pwd){
				   $this->success('修改成功！');
			   }else{
				  $this->error('修改失败！'); 
			   }	
			}
			
		}
	}
}