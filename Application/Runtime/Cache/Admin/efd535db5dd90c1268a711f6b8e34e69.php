<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>预约设计列表</title>  
    <link rel="stylesheet" href="/Public/admin/css/pintuer.css">
    <link rel="stylesheet" href="/Public/admin/css/admin.css">
    <script src="/Public/admin/js/jquery.js"></script>
    <script src="/Public/admin/js/pintuer.js"></script>  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 预约设计列表</strong></div>
  
  <div class="padding border-bottom" style="text-align:center"> 
  
  </div> 
  <table class="table table-hover text-center">
    <tr>
      <th>ID</th>     
      <th>姓名</th> 
      <th>电话</th>
	  <th>提交时间</th>
	  <th>操作</th>
    </tr>
	<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
	  <td style="width:5%"><?php echo ($vo["id"]); ?></td>
      <td style="width:20%"><?php echo ($vo["name"]); ?></td>  
      <td style="width:10%"><?php echo ($vo["phone"]); ?></td> 
	  <td style="width:15%"><?php echo (date('Y-m-d H:i',$vo['addtime'])); ?></td>	
      <td>
      <div class="button-group">
	<?php if($vo["state"] == 0 ): ?><button type="button"  href="javascrit:" class="button border-main" id="<?php echo ($vo["id"]); ?>" onclick="put(this)">待处理</button>
	 <?php else: ?> 
      <button type="button" class="button border-green"  >已处理</button><?php endif; ?>
	 <a class="button border-main" href="<?php echo U('Admin/Yy/down',array('phone'=>$vo['phone']));?>">
	 下载文件
	 </a>
      <a class="button border-red" href="<?php echo U('Admin/Yy/del_sj',array('id'=>$vo['id']));?>" onclick="return isdel();"    ><span class="icon-trash-o"></span> 删除</a>
      </div>
      </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
</div>
<script>

     function put(obj){
	 var id= obj.id;
	  $.post("<?php echo U('Admin/Yy/sj_put');?>",{id:id},
	  function(data){
	   if(data==1){
	            alert ('状态修改成功');
				location.reload();
	   }
	  if(data==0){
	            alert ('状态修改失败');
				location.reload();
	  
	   }  
	  })
	 } 
	 
    function isdel(){
	if (confirm('确定要删除吗')){
     return true;
     }else{
     return false;
     }
	
	}

</script>
</body></html>