<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>启蒙班</title>  
<link rel="stylesheet" href="/ldw/Public/admin/css/pintuer.css">
<link rel="stylesheet" href="/ldw/Public/admin/css/admin.css">
<script src="/ldw/Public/admin/js/jquery.js"></script>
<script src="/ldw/Public/admin/js/pintuer.js"></script>  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 启蒙班介绍</strong></div>
  <!--<div class="padding border-bottom">  
  <a class="button border-green" href="<?php echo U('Admin/Quality/add_article');?>"><span class="icon-plus-square-o"></span> 添加案例</a>  
  </div> -->
  <div class="padding border-bottom" style="text-align:center"> 
  </div> 
  <table class="table table-hover text-center">
    <tr>
      <th>文章标题</th> 
      <th>文章内容</th>
	  <th>操作</th>
    </tr>
	<?php if(is_array($article)): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
      <td style="width:10%;font-weight:200;"><?php echo ($vo["title"]); ?></td>  
      <td style="text-align:left;width:80%;height: 100px;overflow: hidden;">
      <div style="height: 350px;overflow: scroll;">
 			<?php echo ($vo["description"]); ?>
 		</div>
      </td>  
      <td>
      <div class="button-group">
      <a type="button" class="button border-main" href="<?php echo U('Admin/Quality/save_pz_article',array('id'=>$vo['id']));?>"><span class="icon-edit"></span>修改</a>
      <!--  <a class="button border-red" href="<?php echo U('Admin/Quality/del_pz_article',array('id'=>$vo['id']));?>" onclick="return isdel();"    ><span class="icon-trash-o"></span> 删除</a>
      --></div>
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