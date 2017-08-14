<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$nonce     = $_GET['nonce'];
    	$token     = 'lidons';
    	$timestamp = $_GET['timestamp'];
    	$echostr   = $_GET['echostr'];
    	$signature = $_GET['signature'];
    	//形成数组，然后按字典序排序
    	$array = array();
    	$array = array($nonce, $timestamp, $token);
    	sort($array);
    	//拼接成字符串,sha1加密 ，然后与signature进行校验
    	$str = sha1(implode($array));
    	if( $str  == $signature && $echostr ){
    		//第一次接入weixin api接口的时候
    		echo  $echostr;
    		exit;
    	}else{
    		$this->reponseMsg();
    	}
    	$coach = D('Coach')->select();
    	//var_dump($coach);
    	$this->assign('coach',$coach);
    	$this->display();
    }
    public function check(){
    	if(strtotime($_POST['strattime']) > strtotime($_POST['endtime'])){
    		return show(0,'请选择正确的起始时间');
    	}
		if(!trim($_POST['name'])){
			return show(0,'请输入你正确的姓名');
		}
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$isit = D('Venue')->Exists($name,$phone);
		if($isit){
			return show(0, '您已经预约过了^-^!');
		}
		$insert = D('Venue')->insert($_POST);
		if($insert){
			return show(1,'预约成功');
		}else{
			return show(0,'预约失败，请稍后再试');
		}	
    }
	public function reponseMsg(){
     $postArr = file_get_contents('php://input');
     $postObj = simplexml_load_string($postArr);
     if( strtolower( $postObj->MsgType) == 'event'){
     	if( strtolower($postObj->Event == 'subscribe') ){
        	$content = '我的朋友，欢迎您的到来！';
     		$IndexModel = D('Index');
     		$IndexModel->responseText($postObj,$content);
     	}
     }
	}//reponsemsg end
  public function http_curl($url,$type='get',$res='json',$arr=''){
  	//1.初始化curl
  	$ch  =curl_init();
  	//2.设置curl的参数
  	curl_setopt($ch,CURLOPT_URL,$url);
  	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
  	if($type == 'post'){
  		curl_setopt($ch,CURLOPT_POST,1);
  		curl_setopt($ch,CURLOPT_POSTFIELDS,$arr);
  	}
  	//3.采集
  	$output =curl_exec($ch);
  	//4.关闭
  	curl_close($ch);
  	if($res=='json'){
  		if(curl_error($ch)){
  			//请求失败，返回错误信息
  			return curl_error($ch);
  		}else{
  			//请求成功，返回错误信息
  			return json_decode($output,true);
  		}
  	}
  }
  //将assoc_token放置在一个类中
  public function  getHanmeimeiToken(){
  	// 	return "WbKwyGZNuKr7AsuIE08sU-amzZU94JHB3Jt2xeCbmNwsU5mcLCH7x-0Zpv1tgrNclBIsoADBNLnuFm2m5pZUeCnsgiLOHsYmVelLMBGbmPSvuIrIRRc1UWnC7kp8SKx9GBHiAHAWRX";
  	//	return  "etIQhlOxoIMVbhUb9etF7nBH6xQ9WcgYdgrRku9m9KZNShioY4BFNCx_9QganaXHhbLN6o0rWuVInNBSKc7ERVz1EYzRVp_ZQigBjLb3h95eryFdQm3W_HFcYtiGBpLWVVHdAJADDP";
  	if( $_SESSION['access_token'] && $_SESSION['expire_time']>time()){
  		//如果access_token在session没有过期
  		$access_token = $_SESSION['access_token'];
  	}
  	else{
  		//如果access_token比存在或者已经过期，重新取access_token
  		//1 请求url地址
  		$AppId='wx0c18d3eb858bab73';
  		$AppSecret='68e8665a99d146af3e696e594083912e';
  		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$AppId."&secret=".$AppSecret;
  		echo $url;
  		$res=$this->http_curl($url,'get','json');
  		$access_token =$res['access_token'];
  		//将重新获取到的aceess_token存到session
  		$_SESSION['access_token']=$access_token;
  		$_SESSION['expire_time']=time()+7000;
  	}
  	return $access_token;
  }
  
    public function  definedItem(){
    	//创建微信菜单
    	//目前微信接口的调用方式都是通过 curl post/get
    	header('content-type:text/html;charset=utf-8');
    	//         echo $access_token=$this ->getHanmeimeiToken();
    	echo $access_token = $this->getHanmeimeiToken();
    	$url ='https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$access_token;
    	$postArr=array(
    			'button'=>array(
    					array(
    							'name'=>urlencode('预约'),
    							'sub_button'=>array(
    									array(
    											'name'=>urlencode('场馆预约'),
    											'type'=>'view',
    											'url'=>'http://wxzf.avixin.com/ldw/index.php',
    									),//第一个二级菜单
    									array(
    											'name'=>urlencode('季赛预约'),
    											'type'=>'view',
    											'url'=>'http://wxzf.avixin.com/ldw/index/home/match',
    							        ),
    									array(
    											'name'=>urlencode('周赛预约'),
    											'type'=>'view',
    											'url'=>'http://wxzf.avixin.com/ldw/index/home/week',
    									),//第二个二级菜单
    							)
    					),
    					array(
    							'name'=>urlencode('培训班'),
    							'sub_button'=>array(
    									array(
    											'name'=>urlencode('启蒙班'),
    											'type'=>'view',
    											'url'=>'http://wxzf.avixin.com/ldw/index/home/article',
    											
    									),//第一个二级菜单
    									array(
    											'name'=>urlencode('基础班'),
    											'type'=>'view',
    											'url'=>'http://wxzf.avixin.com/ldw/index/home/article/base',
    									
    									),
    									array(
    											'name'=>urlencode('提高班'),
    											'type'=>'view',
    											'url'=>'http://wxzf.avixin.com/ldw/index/home/article/raise',
    										
    									),
    									array(
    											'name'=>urlencode('高级班'),
    											'type'=>'view',
    											'url'=>'http://wxzf.avixin.com/ldw/index/home/article/senior',
    											
    									),
    									
    							)
    					),
    					array(
    							'name'=>urlencode('最新资讯'),
    							'sub_button'=>array(
    									array(
    											'name'=>urlencode('教练介绍'),
    											'type'=>'view',
    											'url'=>'http://wxzf.avixin.com/ldw/index.php/home/coach',
    											
    									),//第一个二级菜单
    									array(
    											'name'=>urlencode('公益班'),
    											'type'=>'view',
    											'url'=>'http://wxzf.avixin.com/ldw/index/home/article/welfare',
    											
    									),
    									array(
    											'name'=>urlencode('季赛介绍'),
    											'type'=>'view',
    											'url'=>'http://wxzf.avixin.com/ldw/index/home/article/season',
    											
    									),
    									array(
    											'name'=>urlencode('周赛介绍'),
    											'type'=>'view',
    											'url'=>'http://wxzf.avixin.com/ldw/index/home/article/week',	
    									),
    									
    							)
    					),
    
    			));
    	echo "<hr/>";
    	echo  $postJson = urldecode(json_encode($postArr));
    	$res = $this->http_curl($url,'post','json',$postJson);
    	echo "<hr/>";
    	var_dump($res);
    }
    
    
    
    
    
}