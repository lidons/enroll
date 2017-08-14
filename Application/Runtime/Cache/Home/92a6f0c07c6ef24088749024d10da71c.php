<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8" />
<title>季赛预约</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
<link rel="stylesheet" href="//cdn.bootcss.com/weui/1.1.1/style/weui.min.css">
<link rel="stylesheet" href="//cdn.bootcss.com/jquery-weui/1.0.1/css/jquery-weui.min.css">
<style>
.weui-navbar__item.weui-bar__item--on {
    color: #fff;
    background-color: #1aad19;
}
</style>
</head>
<body ontouchstart>
<div class="weui-tab"> 
      <div class="weui-navbar">
        <a class="weui-navbar__item weui-bar__item--on"}" href="#tab1">
          	季赛预约
        </a>
        <a class="weui-navbar__item" href="#tab2">
          	季赛介绍
        </a>
      </div>
      <div class="weui-tab__bd">
        <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">
      <img height="130px" width="100%" style="margin-bottom:-25px;" src="/ldw/Public/admin/bg.jpg" alt="" />
		<div class="weui-cells weui-cells_form">
	   <div class="weui-cell weui-cell_select weui-cell_select-after">
        <div class="weui-cell__hd">
          <label for="" class="weui-label">组别</label>
        </div>
        <div class="weui-cell__bd">
          <select class="weui-select" name="select2" id="subgroup">
            <option value="0">选择组别</option>
            <?php if(is_array($gop)): $i = 0; $__LIST__ = $gop;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["addtime"]); ?>"><?php echo ($vo["addtime"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
        </div>
      </div>
 	<div class="weui-cell weui-cell_select weui-cell_select-after">
        <div class="weui-cell__hd">
          <label for="" class="weui-label">比赛时间</label>
        </div>
        <div class="weui-cell__bd">
          <select class="weui-select" name="select2" id="subtime">
            <option value="0">选择比赛时间</option>
            <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["addtime"]); ?>"><?php echo ($vo["addtime"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
        </div>
   </div>
 
      
      
	<div class="weui-cell">
   	 <div class="weui-cell__hd"><label for="" class="weui-label">姓名：</label></div>
    	<div class="weui-cell__bd">
			<input class="weui-input" type="text" value="" id="name" placeholder="请填写您的名字">
		</div>
  	</div>
  	<div class="weui-cell">
   	 <div class="weui-cell__hd"><label for="" class="weui-label">联系电话：</label></div>
    	<div class="weui-cell__bd">
      <input class="weui-input" type="text" value="" id="phone" placeholder="请填写您的电话">
    </div>
  	</div>
    </div>
	  <div class="weui-btn-area">
      <a class="weui-btn weui-btn_primary" href="javascript:" id="showTooltips">提交</a>
     </div>
      
        </div>
        <div id="tab2" class="weui-tab__bd-item">
	      <?php if(is_array($article)): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><article class="weui-article">
	          <section>
	            <section>
	              <p>
		               <?php echo ($vo["description"]); ?> 
	              </p>
	            </section>
	          </section>
	        </article><?php endforeach; endif; else: echo "" ;endif; ?>
		<br />
		<div class="weui-footer">
		        <p class="weui-footer__links">
		          <a href="javascript:void(0);" class="weui-footer__link">底部链接</a>
		        </p>
		        <p class="weui-footer__text">Copyright © 2008-2016 weui.io</p>
		</div>
		<br />
        </div>
      </div>
    </div>
<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/jquery-weui.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/swiper.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/city-picker.min.js"></script>
<script>
      $(document).on("open", ".weui-popup-modal", function() {
        console.log("open popup");
      }).on("close", ".weui-popup-modal", function() {
        console.log("close popup");
      });
</script>
<script>
     $("#showTooltips").click(function() {
    	var sub = $('#subgroup').val();
    	var subgroup = $("#subgroup").find("option:selected").text(); 
    	var subt = $('#subtime').val();
    	var subtime = $('#subtime').find("option:selected").text();
    	var name  = $('#name').val();
    	var phone = $('#phone').val();
    	if(sub == 0){
    		$.alert('请选择组别');
    		return false;
    	}
    	if(subt == 0){
    		$.alert('请选择参赛时间');
    		return false;
    	}
    	if(!name){
    		$.alert('请输入你的名字');
    		return false;
    	}
    	if(!phone||!(/^1[34578]\d{9}$/.test(phone))){
    		$.alert('填写正确的手机号');
    		return false;
    	}
		var d = new Date();
		var date = d.toLocaleString();
   	var url  = "./match/season";
        var data ={
        		  'groups':1,
        		  'subgroup':subgroup,
        		  'subtime':subtime,
        		  'name':name,
        		  'phone':phone,
        		  'createtime':date}
        $.post(url,data,function(data){
 			if(data.status == 0){
 				return $.alert(data.message);
 			}
 			if(data.status == 1){
 				return $.toast(data.message,function(){
 				window.location.href = "./article/season";
 			});
 			}
          }, "json"); 
      });
</script>
</body>
</html>