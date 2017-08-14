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
<style>
.w50 {
    width: 100%;
    float: left;
}
</style>
</head>
<body>
<div class="panel admin-panel" >
  <div class="panel-head"><strong><span class="icon-key"></span> 增加理员</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="<?php echo U('Admin/Login/add_pwd_do');?>">
      <div class="form-group">
        <div class="label">
          <label for="sitename">管理员帐号：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="username" placeholder="请输入用户名" />
        </div>
      </div>           
      <div class="form-group">
        <div class="label">
          <label for="sitename">密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" name="password" size="50" placeholder="请输入新密码" data-validate="required:请输入新密码,length#>=5:新密码不能小于5位" />         
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="sitename">确认新密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" name="repassword" size="50" placeholder="请再次输入新密码" data-validate="required:请再次输入新密码,repeat#password:两次输入的密码不一致" />          
        </div>
      </div>
        <div class="form-group">
        <div class="label">
          <label for="sitename">邮箱地址：</label>
        </div>
        <div class="field">
          <input type="email" class="input w50" name="email" placeholder="请输入邮箱" />
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
<script>
function isdel(){
	if (confirm('确定要删除此管理员吗')){
     return true;
     }else{
     return false;
     }
	}
</script>
</html>