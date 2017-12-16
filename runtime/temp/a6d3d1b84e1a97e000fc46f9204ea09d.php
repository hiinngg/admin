<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"D:\wamp3\wamp64\www\recruit\public/../application/companyadmin\view\index\login.html";i:1512962272;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>企业入口</title>
<link rel="stylesheet" href="/admin/css/admin.css" />
<link rel="stylesheet" href="/admin/layui/css/layui.css">
<style>
#login{
	
background-image:url('/admin/image/banner_bg.jpg');
background-size:cover;
	
}

</style>

</head>
<body id="login">
<div class="login layui-anim  layui-anim-scaleSpring"  style="border-radius:10px;background:rgba(41,39,34,0.5);     background: #000\9;/*IE*/
        filter: alpha(opacity=50);/*IE*/">
<h2 style="color:#ffffff;">企业入口</h2>
<form class="layui-form" method="post" >
<div class="layui-form-item">
<input type="text" name="name" placeholder="请输入企业名称" required lay-verify="required" autocomplete="off" class="layui-input">
</div>
<div class="layui-form-item">

<input type="password" name="password" placeholder="请输入密码" required lay-verify="required" autocomplete="off" class="layui-input">
</div>
<div class="layui-form-item">
<button style="padding: 0 102px;width:100%;" class="layui-btn" lay-submit lay-filter="form">立即登录</button>
</div>
<p style="color:#ffffff;">还没有账号？现在去<a  style="color:#ff5722;" href="<?php echo url('index/register/companyReg'); ?>">注册</a></p>
</form>
<script src="/admin/layui/layui.js"></script>
<script>
layui.use(['form','jquery','layer'], function(){
  var $=layui.jquery;
  var form = layui.form;
  var layer = layui.layer
  
  
  form.on('submit(form)', function(data){
	  $.ajax({
	    url:"<?php echo url('login'); ?>",
	    data:{data:data.field},
	    beforeSend:function(){
	    	layer.load(2)
	    },
	    type:"post",
	    success:function(data){	    	
	    	if(data==1){
	    	   setTimeout(function(){ 
	    		window.location.href="<?php echo url('index/index'); ?>";
	          },100); 
	    	}else{
	    		layer.msg(data)
	    	}
	    },
	    complete:function(){
	    	layer.closeAll("loading")
	    	
	    }
	  })


	 
	  return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
	});
  
});


</script>
</div>
</body>
</html>