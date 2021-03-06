<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8" />
<title>场馆预约</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
<link rel="stylesheet" href="//cdn.bootcss.com/weui/1.1.1/style/weui.min.css">
<link rel="stylesheet" href="//cdn.bootcss.com/jquery-weui/1.0.1/css/jquery-weui.min.css">
<style>
.weui-navbar__item.weui-bar__item--on {
    color: #fff;
    background-color: #1aad19;
}
.weui-grid {
    position: relative;
	float: left;
    padding: 20px 10px;
    width: 50%;
    box-sizing: border-box;
}
</style>
</head>
<body ontouchstart>
    <div class="weui-tab"> 
      <div class="weui-navbar">
        <a class="weui-navbar__item weui-bar__item--on"}" href="#tab1">
          	场馆预约
        </a>
        <a class="weui-navbar__item" href="#tab2">
          	教练介绍
        </a>
      </div>
      <div class="weui-tab__bd">
        <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">
      <img height="130px" width="100%" style="margin-bottom:-25px;" src="/ldw/Public/admin/bg.jpg" alt="" />
     <div class="weui-cells weui-cells_form">
      <div class="weui-cell">
        <div class="weui-cell__hd"><label for="time-format" class="weui-label">开始时间</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" id="starttime" type="text" value="">
        </div>
      </div>
       <div class="weui-cell">
        <div class="weui-cell__hd"><label for="time-format" class="weui-label">结束时间</label></div>
        <div class="weui-cell__bd">
          <input class="weui-input" id="endtime" type="text" value="">
        </div>
      </div>
	  <div class="weui-cell weui-cell_select weui-cell_select-after">
         <div class="weui-cell__hd">
          <label for="" class="weui-label">预约教练：</label>
        </div>
        <div class="weui-cell__bd">
          <select class="weui-select" name="select2" id="coach">
            <option value="0">选择教练</option>
            <?php if(is_array($coach)): $i = 0; $__LIST__ = $coach;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
        </div>
        </div>
	<div class="weui-cell">
   	 <div class="weui-cell__hd"><label for="" class="weui-label">姓名：</label></div>
    	<div class="weui-cell__bd">
			<input class="weui-input" type="text" value="" id="name" placeholder="请填写输入您的名字">
		</div>
  	</div>
  	<div class="weui-cell">
   	 <div class="weui-cell__hd"><label for="" class="weui-label">联系电话：</label></div>
    	<div class="weui-cell__bd">
      <input class="weui-input" type="text" value="" id="phone" placeholder="请填写您的手机号">
    	</div>
  		</div>
    	</div>
	  <div class="weui-btn-area">
      <a class="weui-btn weui-btn_primary" href="javascript:" id="showTooltips">提交</a>
     </div>  
        </div>
        <div id="tab2" class="weui-tab__bd-item">
		<div class="weui-grids">
		<?php if(is_array($coach)): $i = 0; $__LIST__ = $coach;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/ldw/index/home/coach/speak?id=<?php echo ($vo["id"]); ?>"  class="weui-grid js_grid">
		        <div class="">
		          <img weidth="130" height="120" src="/ldw/Public/uploads/<?php echo ($vo["picture"]); ?>" alt="">
		        </div>
		        <p class="weui-grid__label">
		          <?php echo ($vo["name"]); ?>
		        </p>
	      	</a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
      </div>
    </div>




<!--  <header class='demos-header'>
      <h3 class="demos-title" style="text-align:center;color:#555;line-height:60px;">场馆预约</h3>
</header>-->

     
<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/jquery-weui.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/swiper.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/city-picker.min.js"></script>
<script>
function getNowFormatDate() {
    var date = new Date();
    var seperator1 = "-";
    var seperator2 = ":";
    var month = date.getMonth() + 1;
    var strDate = date.getDate();
    if (month >= 1 && month <= 9) {
        month = "0" + month;
    }
    if (strDate >= 0 && strDate <= 9) {
        strDate = "0" + strDate;
    }
    var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate;
    return currentdate;
} 
</script>
<script>
$("#endtime").datetimePicker({
    title: '请选择结束时间',
    yearSplit: '年',
    monthSplit: '月',
    dateSplit: '日',
    times: function () {
      return [  // 自定义的时间
        {
          values: (function () {
            var hours = [];
            for (var i=9; i<22; i++) hours.push(i > 9 ? i : '0'+i);
            return hours;
          })()
        },
        {
          divider: true,  // 这是一个分隔符
          content: '时'
        },
        {
          values: (function () {
            var minutes = ['00','30'];
            //for (var i=0; i<59; i++) minutes.push(i > 9 ? i : '0'+i);
            return minutes;
          })()
        },
        {
          divider: true,  // 这是一个分隔符
          content: '分'
        }
      ];
    },
    min:getNowFormatDate(),
    onChange: function (picker, values, displayValues) {
      console.log(values);
    }
  });
</script>
<script>
$("#starttime").datetimePicker({
    title: '选择开始时间',
    yearSplit: '年',
    monthSplit: '月',
    dateSplit: '日',
    times: function () {
      return [  // 自定义的时间
        {
          values: (function () {
            var hours = [];
            for (var i=9; i<22; i++) hours.push(i > 9 ? i : '0'+i);
            return hours;
          })()
        },
        {
          divider: true,  // 这是一个分隔符
          content: '时'
        },
        {
          values: (function () {
            var minutes = ['00','30'];
            //for (var i=0; i<59; i++) minutes.push(i > 9 ? i : '0'+i);
            return minutes;
          })()
        },
        {
          divider: true,  // 这是一个分隔符
          content: '分'
        }
      ];
    },
    min:getNowFormatDate(),
    onChange: function (picker, values, displayValues) {
      console.log(values);
    }
  });
</script>
<script>
     $("#showTooltips").click(function() {
    	var starttime = $('#starttime').val();
    	var endtime = $('#endtime').val();
    	var coach = $('#coach').val();
    	var coaches = $("#coach").find("option:selected").text(); 
    	var name  = $('#name').val();
    	var phone = $('#phone').val();
    	if(!starttime) {
        	$.alert('请输入开始日期');
        	return false;
        }
    	if(!endtime){
    		$.alert('请选择结束时间');
    		return false;
    	}
    	if(coach == 0){
    		$.alert('请选择教练');
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
    	if(endtime == starttime){
    		$.alert('开始时间和结束时间一样，请重新选');
    		return false;
    	}
		var d = new Date();
		var date = d.toLocaleString();
        var url  = "./index.php/Home/index/check";
        var data ={
        		  'createtime':date,
        		  'starttime':starttime,
        		  'endtime':endtime,
        		  'coaches':coaches,
        		  'name':name,
        		  'phone':phone,
        		  }
        $.post(url,data,function(data){
 			if(data.status == 0){
 				return $.alert(data.message);
 			}
 			if(data.status == 1){
 				return $.toast(data.message,function(){
 					window.location.href = "./index.php/home/coach";
 					//window.location.href = "./index.php/home/index#tab2";
 			});
 			}
          }, "json"); 
      });
</script>
</body>
</html>