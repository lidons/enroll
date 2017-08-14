<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>网站信息</title>  
    <link rel="stylesheet" href="/ldw/Public/admin/css/pintuer.css">
    <link rel="stylesheet" href="/ldw/Public/admin/css/admin.css">
    <script src="/ldw/Public/admin/js/jquery.js"></script>
    <script src="/ldw/Public/admin/js/pintuer.js"></script> 
 <style>
.w50 {
    float: left;
}
</style> 
</head>
<body>
<div class="panel admin-panel" style="width: 40%;float: left; margin-left: 5%;margin-right:5%;margin-top: 10px;">
  <div class="panel-head" style="text-align: center;"><strong class="icon-reorder" >季赛时间列表</strong></div>
  <div class="padding border-bottom">  
  <!--  <a class="button border-yellow" href="#add"><span class="icon-plus-square-o"></span> 添加内容</a>-->
  </div> 
  <table class="table table-hover text-center">
    <tr>
      <th width="50%">季赛时间</th> 
      <th width="25%">排序</th>      
      <th width="25%">操作</th>
    </tr>
    <?php if(is_array($add)): $i = 0; $__LIST__ = $add;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr> 
      <td><?php echo ($vo["addtime"]); ?></td> 
	  <td><?php echo ($vo["sort"]); ?></td>     
      <td>
      <div class="button-group">
       <a class="button border-red" href="<?php echo U('Admin/index/del_time',array('id'=>$vo['id']));?>" onclick="return isdel()"><span class="icon-trash-o"></span> 删除</a>
      </div>
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
</script>
<div class="panel admin-panel margin-top" style="width: 40%;float: left;">
  <div class="panel-head" style="text-align: center;" id="add"><strong><span class="icon-pencil-square-o"></span>增加时间</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Admin/index/addtime');?>">   
       <div class="form-group">
        <div class="label" >
          <label>添加时间：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" style="width:200px;" name="addtime" value=""  placeholder="填写时间"/>         
          <div class="tips"></div>
        </div>
      </div>       
	 <div class="form-group">
        <div class="label">
          <label>排序：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="sort" value="" placeholder="排序"/>         
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
</body></html>