<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8" />
<title>教练介绍</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
<link rel="stylesheet" href="//cdn.bootcss.com/weui/1.1.1/style/weui.min.css">
<link rel="stylesheet" href="//cdn.bootcss.com/jquery-weui/1.0.1/css/jquery-weui.min.css">
<style>
.weui-grid {
    position: relative;
	float: left;
    padding: 20px 10px;
    width: 50%;
    box-sizing: border-box;
}
</style>
</head>

<!-- href="U('Admin/Venue/getStatusTo',array('id'=>$vo['id']))}" -->
<body ontouchstart>
     <div class="weui-grids">
	<?php if(is_array($coach)): $i = 0; $__LIST__ = $coach;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/ldw/index/home/coach/speak?id=<?php echo ($vo["id"]); ?>" class="weui-grid js_grid">
	        <div class="">
	          <img weidth="130" height="120" src="/ldw/Public/uploads/<?php echo ($vo["picture"]); ?>" alt="">
	        </div>
	        <p class="weui-grid__label">
	          <?php echo ($vo["name"]); ?>
	        </p>
      	</a><?php endforeach; endif; else: echo "" ;endif; ?>
<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/jquery-weui.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/swiper.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/city-picker.min.js"></script>
</body>
</html>