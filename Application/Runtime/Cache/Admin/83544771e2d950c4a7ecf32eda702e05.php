<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>预约季赛列表</title>  
    <link rel="stylesheet" href="/ldw/Public/admin/css/pintuer.css">
    <link rel="stylesheet" href="/ldw/Public/admin/css/admin.css">
    <script src="/ldw/Public/admin/js/jquery.js"></script>
    <script src="/ldw/Public/admin/js/pintuer.js"></script>  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 季赛预约列表</strong></div>
  
  <div class="padding border-bottom" style="text-align:center"> 
 
  </div> 
  <form action="<?php echo U('Admin/Venue/del');?>" method="get">
     <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="7%">ID</th>
      <th>预约时间</th>
      <th>比赛时间</th> 
      <th>组别</th> 
      <th>参赛者姓名</th> 
      <th>联系电话</th>
	  <th>操作</th>
    </tr>
	<?php if(is_array($season)): $i = 0; $__LIST__ = $season;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
      <td><input type="checkbox" name="id[]"  id="checkbox" value="<?php echo ($vo["id"]); ?>"></td>
      <td style="width:15%"><?php echo ($vo["createtime"]); ?></td> 
      <td style="width:15%"><?php echo ($vo["subtime"]); ?></td> 
      <td style="width:15%"><?php echo ($vo["subgroup"]); ?></td>  
      <td style="width:15%"><?php echo ($vo["name"]); ?></td>  
      <td style="width:15%"><?php echo ($vo["phone"]); ?></td> 
      <td>
      <div class="button-group">
     <?php if($vo["botton"] == 1): ?><a type="button" href="<?php echo U('Admin/Venue/change',array('id'=>$vo['id'],'groups'=>$vo['groups']));?>" onclick="return isstatus();"  class="button border-main">待处理</a>
        <?php else: ?><a type="button"  href="<?php echo U('Admin/Venue/modify',array('id'=>$vo['id'],'groups'=>$vo['groups']));?>"  class="button border-green" >已处理</a><?php endif; ?>
      <a class="button border-red" href="<?php echo U('Admin/Venue/del_na_article',array('id'=>$vo['id']));?>" onclick="return isdel();"><span class="icon-trash-o"></span> 删除</a>
      </div>
      </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
  </form>
</div>
<div style="text-align: center;font-size:16px;"><?php echo ($page); ?></div>
<script>
function isdel(){
	if (confirm('确定要删除吗')){
     return true;
     }else{
     return false;
     }
	}
function isstatus(){
	if(confirm('确定处理完了么？')){
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
$("#checkall").click(function(){ 
	  $("input[name='id[]']").each(function(){
		  if (this.checked) {
			  this.checked = false;
		  }
		  else {
			  this.checked = true;
		  }
	  });
	})

</script>
</body></html>