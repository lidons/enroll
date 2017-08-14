<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>分类列表</title>  
    <link rel="stylesheet" href="/Public/admin/css/pintuer.css">
    <link rel="stylesheet" href="/Public/admin/css/admin.css">
    <script src="/Public/admin/js/jquery.js"></script>
    <script src="/Public/admin/js/pintuer.js"></script>  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 分类列表</strong></div>
  <div class="padding border-bottom">  
 
  <a class="button border-yellow" href="<?php echo U('Admin/Case/add_xm');?>"><span class="icon-plus-square-o"></span> 添加项目分类</a>
  <a class="button border-green" href="<?php echo U('Admin/Case/add_article');?>"><span class="icon-plus-square-o"></span> 添加文章</a>
  </div> 
  <table class="table table-hover text-center">
    <tr>
      <th>ID</th>     
      <th>分类名称</th> 
      <th>操作</th>
    </tr>
	<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
      <td><?php echo ($vo["id"]); ?></td>      
      <td><?php echo ($vo["name"]); ?></td>  
     
      <td>
      <div class="button-group">
	  
      <a type="button" class="button border-main" href="<?php echo U('Admin/Case/save_classify',array('id'=>$vo['id']));?>"><span class="icon-edit"></span>修改分类</a>
	   <a type="button" class="button border-green" href="<?php echo U('Admin/Case/article_list',array('id'=>$vo['id']));?>"><span class="icon-list"></span>查看文章
	   </a>
      <!-- <a class="button border-red" href="<?php echo U('Admin/Weixin/delmenu',array('id'=>$vo['id']));?>"><span class="icon-trash-o"></span> 删除</a>-->
      </div>
      </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
</div>
<script>

	function isshow(obj,obj1){
		 $.post("<?php echo U('Admin/Weixin/isshow');?>",{status:obj,id:obj1},function(data){
			  if(data==1){
				alert ('状态修改成功');
				location.reload();
				}else if(data==0){
				alert ('状态修改失败');
				location.reload();
				}
		 })
		 
		 }

</script>
</body></html>