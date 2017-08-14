<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8" />
<title>场馆预约</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
<link rel="stylesheet" href="//cdn.bootcss.com/weui/1.1.1/style/weui.min.css">
<link rel="stylesheet" href="//cdn.bootcss.com/jquery-weui/1.0.1/css/jquery-weui.min.css">
</head>
<body ontouchstart>
<header class='demos-header'>
      <h3 class="demos-title" style="text-align:center;color:#555;line-height:60px;">周赛预约</h3>
</header>

    <div class="weui-cells weui-cells_form">
	   <div class="weui-cell weui-cell_select weui-cell_select-after">
        <div class="weui-cell__hd">
          <label for="" class="weui-label">组别</label>
        </div>
        <div class="weui-cell__bd">
          <select class="weui-select" name="select2" id="subgroup">
            <option value="0">选择组别</option>
            <option value="美国">组别1</option>
            <option value="中国">组别2</option>
          </select>
        </div>
      </div>
	<div class="weui-cell">
   	 <div class="weui-cell__hd"><label for="" class="weui-label">姓名：</label></div>
    	<div class="weui-cell__bd">
			<input class="weui-input" type="text" value="" id="name">
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
      <a class="weui-btn weui-btn_primary" href="javascript:" id="showTooltips">提交</a>
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
    	var name  = $('#name').val();
    	var phone = $('#phone').val();
    	if(sub == 0){
    		$.alert('请选择组别');
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
        var url  = "/index.php/home/match/check";
        var data ={
        		  'groups':1,
        		  'subgroup':subgroup,
        		  'name':name,
        		  'phone':phone}
        $.post(url,data,function(data){
 			if(data.status == 0){
 				return $.alert(data.message);
 			}
 			if(data.status == 1){
 				return $.toast(data.message,function(){
 					window.location.href = "/index.php/home/coach";
 			});
 			}
          }, "json"); 
      });
</script>
</body>
</html>