<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends PublicController {
		public function index(){
		 $this->display();
		}
		public function column(){
			$res = M('Adddate')->where('groups=1')->order('sort asc')->select();
			$this->assign('add',$res);
			$this->display();
		}
		public function week_time(){
			$res = M('Adddate')->where('groups=2')->order('sort asc')->select();
			$this->assign('add',$res);
			$this->display();
		}
		public function groups(){
			$res = M('Adddate')->where('groups=3')->order('sort asc')->select();
			$this->assign('add',$res);
			$this->display();
		}
		public function qimeng(){
			$res = M('Adddate')->where('groups=4')->order('sort asc')->select();
			$this->assign('add',$res);
			$this->display();
		}
		//添加比赛时间
		public function addtime(){
			$data['addtime'] = $_POST['addtime'];
			$data['sort'] = $_POST['sort'];
			$data['groups']=1;
			$res = M('Adddate')->add($data);
			if ($res) {
				$this->success('添加成功',U('Admin/Index/column'));
			}else{
				$this->error('添加失败，请查看你排序是否为数字');
			}
		}
		public function addstime(){
			$data['addtime'] = $_POST['addtime'];
			$data['sort'] = $_POST['sort'];
			$data['groups']=2;
			$res = M('Adddate')->add($data);
			if ($res) {
				$this->success('添加成功');
			}else{
				$this->error('添加失败，请查看你排序是否为数字');
			}
		}
		public function addgroups(){
			$data['addtime'] = $_POST['addtime'];
			$data['sort'] = $_POST['sort'];
			$data['groups']=3;
			$res = M('Adddate')->add($data);
			if ($res) {
				$this->success('添加成功');
			}else{
				$this->error('添加失败，请查看你排序是否为数字');
			}
		}
		public function add_qimeng(){
			$data['addtime'] = $_POST['addtime'];
			$data['sort'] = $_POST['sort'];
			$data['groups']=4;
			$res = M('Adddate')->add($data);
			if ($res) {
				$this->success('添加成功');
			}else{
				$this->error('添加失败，请查看你排序是否为数字');
			}
		}
		//删除
		public function del_time(){
			$id = $_GET['id'];
			$res = M('Adddate')->where('id='.$id)->delete();
			if($res){
				$this->success('删除成功');
			}else{
				$this->error('删除失败');
			}
		}

}