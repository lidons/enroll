<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="/ldw/Public/admin/css/pintuer.css">
<link rel="stylesheet" href="/ldw/Public/admin/css/admin.css">
<script src="/ldw/Public/admin/js/jquery.js"></script>
<script src="/ldw/Public/admin/js/pintuer.js"></script>

<script type="text/javascript" src="/ldw/Public/admin/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
<script type="text/javascript" src="/ldw/Public/admin/ueditor/ueditor.all.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>
  添加教练
  </strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Admin/Coach/add_article_do');?>" enctype="multipart/form-data"> 
      <div class="form-group">
        <div class="label">
          <label>教练名字：</label>
        </div>
        <div class="field">
          <input type="text" class="input w100" value="" name="name" data-validate="required:教练名字" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>教练照片：</label>
        </div>
        <div class="field">
          <input type="button"  onclick="set();"  class="button bg-blue margin-left" id="image1" value="+ 浏览上传"  style="float:left;">
         <!-- <div class="tipss">图片尺寸：500*500</div>-->
		  <input type="file"  onchange="previewImage(this)" id="woff" style="display:none;" name="img"/>
        </div>
      </div>     
        <div id="preview" style="margin-left:400px">
        </div>
      <div class="form-group">
        <div class="label">
          <label>教练介绍：</label>
        </div>
		 <div class="field">
		   <script id="container" name="description" type="text/plain">
		   </script>
	    </div>
		 <div class="tips"></div>
      </div>
     
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>


 <script type="text/javascript">
        var ue = UE.getEditor('container');
 </script>




<script>


   function set(){
$('#woff').click();
 }
 
                //图片上传预览    IE是用了滤镜。
        function previewImage(file)
        {
          var MAXWIDTH  = 260; 
          var MAXHEIGHT = 180;
          var div = document.getElementById('preview');
          if (file.files && file.files[0])
          {
              div.innerHTML ='<img id=imghead>';
              var img = document.getElementById('imghead');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){img.src = evt.target.result;}
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img id=imghead>';
            var img = document.getElementById('imghead');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                 
                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
             
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }


 
</script>
</body></html>