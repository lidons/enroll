<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>后台管理中心</title>  
<link rel="stylesheet" href="/ldw/Public/admin/css/pintuer.css">
<link rel="stylesheet" href="/ldw/Public/admin/css/admin.css">
<script src="/ldw/Public/admin/js/jquery.js"></script>   
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="/ldw/Public/admin/images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
  </div>
  <div class="head-l"><a style="cursor:pointer;" class="button button-little bg-green"><?php echo (session('user')); ?></a> &nbsp;&nbsp;<a class="button button-little bg-red" href="<?php echo U('Admin/Login/loginout');?>"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-cog"></span>基本设置</h2>
  <ul>
   
      <li>
		<a href="<?php echo U('Admin/Login/save_pwd');?>" target="right">
		<span class="icon-caret-right"></span>&nbsp;修改密码</a>
	  </li>
	   <li>
		<a href="<?php echo U('Admin/Login/add');?>" target="right">
		<span class="icon-caret-right"></span>&nbsp;增加管理员</a>
	  </li>
    <!--  <li><a href="<?php echo U('Admin/Index/page');?>" target="right"><span class="icon-caret-right"></span>单页管理</a></li> 
    <li><a href="<?php echo U('Admin/Index/adv');?>" target="right"><span class="icon-caret-right"></span>首页轮播</a></li> 
    <li><a href="<?php echo U('Admin/Index/book');?>" target="right"><span class="icon-caret-right"></span>留言管理</a></li>   
   <li><a href="<?php echo U('Admin/Index/column');?>" target="right"><span class="icon-caret-right"></span>栏目管理</a></li>
  -->
  </ul>   
  <h2><span class="icon-pencil-square-o"></span>预约列表</h2>
  <ul>
    <li>
	<a href="<?php echo U('Admin/Venue/index');?>" target="right">
	<span class="icon-caret-right">
	</span>&nbsp;场馆预约</a>
	</li>
    <li>
	<a href="<?php echo U('Admin/Venue/season');?>" target="right">
	<span class="icon-caret-right"></span>&nbsp;&nbsp;季赛预约</a>
	</li>
	<li>
	<a href="<?php echo U('Admin/Venue/week');?>" target="right">
	<span class="icon-caret-right"></span>&nbsp;&nbsp;周赛预约</a>
	</li>        
  </ul>
  
  
  
    <h2><span class="icon-pencil-square-o"></span>青少年报名列表</h2>
  <ul>
    <li>
	<a href="<?php echo U('Admin/culture/index');?>" target="right">
	<span class="icon-caret-right">
	</span>&nbsp;启蒙班报名</a>
	</li>
    <li>
	<a href="<?php echo U('Admin/culture/base');?>" target="right">
	<span class="icon-caret-right"></span>&nbsp;&nbsp;基础班报名</a>
	</li>
	<li>
	<a href="<?php echo U('Admin/culture/raise');?>" target="right">
	<span class="icon-caret-right"></span>&nbsp;&nbsp;提高班报名</a>
	</li>
	<li>
	<a href="<?php echo U('Admin/culture/senior');?>" target="right">
	<span class="icon-caret-right"></span>&nbsp;&nbsp;高级班报名</a>
	</li>        
  </ul>
  
  
    <h2><span class="icon-pencil-square-o"></span>班级介绍</h2>
  <ul>
    <li>
	<a href="<?php echo U('Admin/Quality/index');?>" target="right">
	<span class="icon-caret-right">
	</span>&nbsp;启蒙班介绍</a>
	</li>
    <li>
	<a href="<?php echo U('Admin/Quality/base');?>" target="right">
	<span class="icon-caret-right"></span>&nbsp;&nbsp;基础班介绍</a>
	</li>
	<li>
	<a href="<?php echo U('Admin/Quality/raise');?>" target="right">
	<span class="icon-caret-right"></span>&nbsp;&nbsp;提高班介绍</a>
	</li>   
	<li>
	<a href="<?php echo U('Admin/Quality/senior');?>" target="right">
	<span class="icon-caret-right"></span>&nbsp;&nbsp;高级班介绍</a>
	</li>   
	<li>
	<a href="<?php echo U('Admin/Quality/week');?>" target="right">
	<span class="icon-caret-right"></span>&nbsp;&nbsp;周赛介绍</a>
	</li> 
	<li>
	<a href="<?php echo U('Admin/Quality/season');?>" target="right">
	<span class="icon-caret-right"></span>&nbsp;&nbsp;季赛介绍</a>
	</li>
	<li>
	<a href="<?php echo U('Admin/Quality/welfare');?>" target="right">
	<span class="icon-caret-right"></span>&nbsp;&nbsp;公益班介绍</a>
	</li>    
  </ul>
  
  <h2><span class="icon-briefcase"></span>教练及组别添加</h2>
  
  <ul>
    <li><a href="<?php echo U('Admin/Coach/index');?>" target="right"><span class="icon-caret-right"></span>教练介绍</a></li>
    <li><a href="<?php echo U('Admin/Index/column');?>" target="right"><span class="icon-caret-right"></span>季赛时间</a></li> 
    <li><a href="<?php echo U('Admin/Index/week_time');?>" target="right"><span class="icon-caret-right"></span>周赛时间</a></li>
  	<li><a href="<?php echo U('Admin/Index/groups');?>" target="right"><span class="icon-caret-right"></span>参赛组别</a></li>
  	<li><a href="<?php echo U('Admin/Index/qimeng');?>" target="right"><span class="icon-caret-right"></span>班级上课时间</a></li>
  </ul>
  
  
   
  
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="<?php echo U('Index/selectweid');?>" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">修改密码</a></li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="<?php echo U('Admin/Login/save_pwd');?>" name="right" width="100%" height="100%">
  </iframe>
</div>
<div style="text-align:center;">
<p>来源:西安格创网络</p>
</div>
</body>
</html>