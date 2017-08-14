<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8" />
<title>我要报名</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
<link rel="stylesheet" href="//cdn.bootcss.com/weui/1.1.1/style/weui.min.css">
<link rel="stylesheet" href="//cdn.bootcss.com/jquery-weui/1.0.1/css/jquery-weui.min.css">
</head>
<body ontouchstart>
<header class='demos-header'>
      <h3 class="demos-title" style="text-align:center;color:#555;line-height:60px;">青少年培训报名</h3>
</header>
	<div class="weui-cells weui-cells_form">
	   <div class="weui-cell weui-cell_select weui-cell_select-after">
        <div class="weui-cell__hd">
          <label for="" class="weui-label">选择班级</label>
        </div>
        <div class="weui-cell__bd">
          <select class="weui-select" name="select2" id="classroom">
            <option value='0'>选择班级</option>
            <option value='1'>启蒙班</option>
            <option value='2'>基础班</option>
            <option value='3'>提高班</option>
            <option value='4'>高级班</option>
          </select>
        </div>
      </div>
      	<div class="weui-cell weui-cell_select weui-cell_select-after">
        <div class="weui-cell__hd">
          <label for="" class="weui-label">上课时间</label>
        </div>
        <div class="weui-cell__bd">
          <select class="weui-select" name="select2" id="come_class">
            <option value="0">选择上课时间</option>
            <?php if(is_array($addtime)): $i = 0; $__LIST__ = $addtime;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["addtime"]); ?>"><?php echo ($vo["addtime"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
        </div>
      </div>
	<div class="weui-cell">
   	 <div class="weui-cell__hd"><label for="" class="weui-label">学员姓名：</label></div>
    	<div class="weui-cell__bd">
			<input class="weui-input" type="text" value="" id="name">
		</div>
  	</div>
  	<div class="weui-cell">
   	 <div class="weui-cell__hd"><label for="" class="weui-label">学员年龄：</label></div>
    	<div class="weui-cell__bd">
			<input class="weui-input" type="text" value="" id="age">
		</div>
  	</div>
  	<div class="weui-cell">
   	 <div class="weui-cell__hd"><label for="" class="weui-label">家长姓名：</label></div>
    	<div class="weui-cell__bd">
			<input class="weui-input" type="text" value="" id="parent">
		</div>
  	</div>
  	<div class="weui-cell">
   	 <div class="weui-cell__hd"><label for="" class="weui-label">联系电话：</label></div>
    	<div class="weui-cell__bd">
      <input class="weui-input" type="text" value="" id="phone">
    </div>
  	</div>
    </div>
	  <div class="weui-btn-area">
      <a class="weui-btn weui-btn_primary" href="javascript:" id="showTooltips">确认提交</a>
     </div>
<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/jquery-weui.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/swiper.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/city-picker.min.js"></script>
<script>
     $("#showTooltips").click(function() {
    	var groups = $("#classroom").val();
    	var classroom = $("#classroom").find("option:selected").text(); 
		var come_class = $("#come_class").val();
		var name    = $("#name").val();
		var age     = $("#age").val();
		var parent = $("#parent").val();
		var phone   = $("#phone").val();
		var d   = new Date();
		var date  = d.toLocaleString();
		if(groups==0){
			$.alert("请选择班级");
			return false;
		}
		if(come_class==0){
			$.alert("请选择上课时间");
			return false;
		}
		if(!name){
			$.alert("请填写学员名字");
			return false;
		}
		if(!age){
			$.alert("请填写学员的年龄");
			return false;
		}
		if(!parent){
			$.alert("请填写家长的名字");
			return false;
		}
		if(!phone||!(/^1[34578]\d{9}$/.test(phone))){
    		$.alert('填写正确的手机号');
    		return false;
    	}
        var url  = "./login";
        var data ={
        		  'classroom':classroom,
        		  'come_class':come_class,
        		  'name':name,
        		  'age':age,
        		  'parent':parent,
        		  'phone':phone,
        		  'groups':groups,
        		  'createtime':date
        		  }
        $.post(url,data,function(data){
 			if(data.status == 0){
 				return $.alert(data.message);
 			}
 			if(data.status == 1){
 				return $.toast(data.message,function(){
 					window.history.back();
 			});
 			}
          }, "json"); 
      });
</script>
</body>
</html>