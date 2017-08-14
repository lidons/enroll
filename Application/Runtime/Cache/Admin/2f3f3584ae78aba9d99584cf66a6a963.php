<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>项目分类</title>  
    <link rel="stylesheet" href="/Public/admin/css/pintuer.css">
    <link rel="stylesheet" href="/Public/admin/css/admin.css">
    <script src="/Public/admin/js/jquery.js"></script>
    <script src="/Public/admin/js/pintuer.js"></script>  
</head>
<body>

<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>
  <?php if($data["meu"] == ''): ?>添加项目分类
  <?php else: ?>
  <?php echo ($data["meu"]); endif; ?>
  </strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Admin/Case/add_xm_do');?>">   
      <div class="form-group">
        <div class="label">
          <label>所属上级：</label>
        </div>
        <div class="field">
            <input type="text" class="input w50"  value="项目" disabled />
           			
          <div class="tips"></div>
        </div>
      </div> 
	  
       <div class="form-group">
        <div class="label">
          <label>菜单名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="xm" value="<?php echo ($data["name"]); ?>" />
		  <input type="hidden" class="input w50" name="id" value="<?php echo ($data["id"]); ?>" />
          <div class="tips"></div>
        </div>
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
</body>
</html>