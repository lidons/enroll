<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>匠心专栏</title>  
    <link rel="stylesheet" href="/ldw/Public/admin/css/pintuer.css">
    <link rel="stylesheet" href="/ldw/Public/admin/css/admin.css">
    <script src="/ldw/Public/admin/js/jquery.js"></script>
    <script src="/ldw/Public/admin/js/pintuer.js"></script>  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 匠心专栏</strong></div>
  <div class="padding border-bottom">  
 
  <a class="button border-yellow" href="<?php echo U('Admin/Teacher/add_tc');?>"><span class="icon-plus-square-o"></span>添加设计师</a>
  <a class="button border-green" href="<?php echo U('Admin/Teacher/add_article');?>"><span class="icon-plus-square-o"></span> 添加案例</a>
  </div> 
  <table class="table table-hover text-center">
    <tr>
      <th >ID</th>     
      <th>设计师姓名</th>
	  <th>头像</th> 
      <th>操作</th>
    </tr>
	<?php if(is_array($teacher)): $i = 0; $__LIST__ = $teacher;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
      <td><?php echo ($vo["id"]); ?></td>      
      <td><?php echo ($vo["name"]); ?></td>  
       <td>
	   <img src="/ldw/Public/uploads/<?php echo ($vo["img"]); ?>"  width="70" height="70"/>
	   </td>  
      <td>
      <div class="button-group">
	  
      <a type="button" class="button border-main" href="<?php echo U('Admin/Teacher/save_teacher',array('id'=>$vo['id']));?>"><span class="icon-edit"></span>修改资料</a>
	   <a type="button" class="button border-green" href="<?php echo U('Admin/Teacher/article_list',array('id'=>$vo['id']));?>"><span class="icon-list"></span>查看案例
	   </a>
      <a class="button border-red" href="<?php echo U('Admin/Teacher/deltc',array('id'=>$vo['id']));?>"onclick="return isdel();"><span class="icon-trash-o"></span>删除</a>
      </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
</div>
<script>


     function isdel(){
	if (confirm('确定要删除吗')){
     return true;
     }else{
     return false;
     }
	
	}


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