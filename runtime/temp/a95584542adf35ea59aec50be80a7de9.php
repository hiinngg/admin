<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\wamp3\wamp64\www\recruit\public/../application/admin\view\index\login.html";i:1513590543;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>后台管理系统</title>
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
<h2 style="color:#ffffff;">后台管理系统</h2>
<form class="layui-form" method="post" >
<div class="layui-form-item">
<input type="text" name="username" placeholder="请输入用户名" required lay-verify="required" autocomplete="off" class="layui-input">
</div>
<div class="layui-form-item">

<input type="password" name="password" placeholder="请输入密码" required lay-verify="required" autocomplete="off" class="layui-input">
</div>
<div class="layui-form-item">
<button style="padding: 0 102px;width:100%;" class="layui-btn" lay-submit lay-filter="form">立即登录</button>
</div>
</form>
<script src="/admin/layui/layui.js"></script>
<script>
layui.use(['form','jquery'], function(){
  var $=layui.jquery;
  var form = layui.form;

  form.on('submit(form)', function(data){
	  $.ajax({
		  url:"<?php echo url('login'); ?>",
		  data:{data:data.field},
		  type:"post",
		  beforeSend:function(){
			  layer.load(2);
		  },
		  success:function(data){
			  layer.closeAll()
			if(data==1){
			setTimeout(function(){ 
			    window.location.href="<?php echo url('index/index'); ?>";
			   },100); 
			}else{
				layer.msg(data)
			}
		  },
		  complete:function(){
			  
			  layer.closeAll()
		  }
	  })
	  
	  
	

	  return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
	});
  
});


</script>
</div>
</body>
</html>