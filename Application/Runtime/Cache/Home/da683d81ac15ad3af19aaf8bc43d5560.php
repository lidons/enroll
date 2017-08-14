<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8" />
<title>教练介绍</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
<link rel="stylesheet" href="//cdn.bootcss.com/weui/1.1.1/style/weui.min.css">
<link rel="stylesheet" href="//cdn.bootcss.com/jquery-weui/1.0.1/css/jquery-weui.min.css">
</head>
<body ontouchstart>
	<?php if(is_array($coach)): $i = 0; $__LIST__ = $coach;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><header class='demos-header'>
          <h2 class="demos-second-title" style="text-align: center;color: #555;"><?php echo ($vo["name"]); ?></h2>
        </header>
        <article class="weui-article">
          <section>
            <section>
	               <?php echo ($vo["description"]); ?> 
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

     
     
 
<script src="//cdn.bootcss.com/jquery/1.11.0/jquery.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/jquery-weui.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/swiper.min.js"></script>
<script src="//cdn.bootcss.com/jquery-weui/1.0.1/js/city-picker.min.js"></script>
</body>
</html>