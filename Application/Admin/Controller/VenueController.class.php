<?php
namespace Admin\Controller;
use Think\Controller;
class VenueController extends PublicController {
		// 	场馆预约
		public function index(){
			$User = M('Venue'); // 实例化User对象
			$count  = $User->count();// 查询满足要求的总记录数
			$Page   = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show   = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$list = $User->order('createtime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('venue',$list);// 赋值数据集
			$this->assign('page',$show);// 赋值分页输出
			$this->display(); // 输出模板
// 		$number = D('Venue')->extract();
// 		$this->assign('venue',$number);
//		$this->display();
		}
		//季预约
		public function season(){
			$User = M('Matchs'); // 实例化User对象
			$count  = $User->where('groups=1')->count();// 查询满足要求的总记录数
			$Page   = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show   = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$list = $User->where('groups=1')->order('createtime desc,id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('season',$list);// 赋值数据集
			$this->assign('page',$show);// 赋值分页输出
			$this->display(); // 输出模板
// 			$season = D('Matchs')->Season();
// 			$this->assign('season',$season);
// 			$this->display();
		}
		//周预约
		public function week(){
			$User = M('Matchs'); // 实例化User对象
			$count  = $User->where('groups=2')->count();// 查询满足要求的总记录数
			$Page   = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show   = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$list = $User->where('groups=2')->order('createtime desc,id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
			$this->assign('week',$list);// 赋值数据集
			$this->assign('page',$show);// 赋值分页输出
			$this->display(); // 输出模板
// 			$week = D('Matchs')->Week();
// 			$this->assign('week',$week);
// 			$this->display();
		}
		//删除
		public function del_pz_article(){
			$id=$_GET['id'];
			$del= M('Venue')->where(array('id'=>$id))->delete();
			if($del){
				$this->success('删除成功');
			}else{
				$this->error('删除失败');
			}
			 
		}
		//删除操作
		public function remove(){
			$id = $_GET['id'];
			D('Venue')->remove($id);
		}
		public function modify_state(){
			$id = $_GET['id'];
			$botton = 0;
			$data['botton'] = $botton;
			$res = M('Venue')->where('id='.$id)->save($data);
			if($res){
			 	echo "<script>window.location.href = '/ldw/index/admin/venue/index';</script>";
			}else{
				echo "<script>alert('状态修改失败');</script>";
			}
		}
		public function getStatusTo(){
			$id = $_GET['id'];
			$botton = 1;
			$data['botton'] = $botton;
			$res = M('Venue')->where('id='.$id)->save($data);
			if($res){
				echo "<script>window.location.href ='/ldw/index/admin/venue/index';</script>";
			}else{
				echo "<script>alert('状态修改失败');</script>";
			}
		}
		
		
		//删除操作
		public function del_na_article(){
			$id=$_GET['id'];
			$del= M('Matchs')->where(array('id'=>$id))->delete();
			if($del){
				$this->success('删除成功');
			}else{
				$this->error('删除失败');
			}
		
		}
		//更改状态操作
		public function change(){
			$id = $_GET['id'];
			$status = $_GET['groups'];
			$botton = 0;
			$data['botton'] = $botton;
		    $res = M('Matchs')->where('id='.$id)->save($data);
		    if($res){
		    	if($status==2){
		    		echo "<script>window.location.href = '/ldw/index/admin/venue/week';</script>";
		    	}else{
		    		echo "<script>window.location.href = '/ldw/index/admin/venue/season';</script>";
		    	}
		    }else{
		    	   echo "<script>alert('状态修改失败');</script>";
		    }
		}
		//更改状态操作
		public function modify(){
			$id = $_GET['id'];
			$status = $_GET['groups'];
			$botton = 1;
			$data['botton'] = $botton;
		    $res = M('Matchs')->where('id='.$id)->save($data);
		    if($res){
		    	if($status==2){
		    		echo "<script>window.location.href ='/ldw/index/admin/venue/week';</script>";
		    	}else{
		    		echo "<script>window.location.href ='/ldw/index/admin/venue/season';</script>";
		    	}
		    }else{
		    	echo "<script>alert('状态修改失败');</script>";
		    }
		}
		//批量删除
		public function del_to(){
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
			$list = M('Venue')->where($where)->delete();
			if($list!==false) {
				$this->success("成功删除{$list}条");
			}else{
				$this->error('删除失败！');
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
			$list = M('Matchs')->where($where)->delete();
			if($list!==false) {
				$this->success("成功删除{$list}条");
			}else{
				$this->error('删除失败！');
			}
		}
}