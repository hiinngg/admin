<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:85:"D:\wamp3\wamp64\www\recruit\public/../application/index\view\register\companyreg.html";i:1512961257;s:72:"D:\wamp3\wamp64\www\recruit\public/../application/index\view\layout.html";i:1513157366;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="/static/css/swiper.min.css" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="/admin/layui/css/layui.css" />
<link rel="stylesheet" href="/static/bootstrap/css/bootstrap.min.css" />
<title>招聘网站</title>
</head>
<style>
/* common */
body,html{
	font-family:"Helvetica Neue", Helvetica, Arial, "PingFang SC", "Hiragino Sans GB", "Heiti SC", "Microsoft YaHei", "WenQuanYi Micro Hei", sans-serif;
	color:#333;
	font-size:16px;
}
.row-center{
	display:flex;
	align-items:center;
	justify-content:center;
}
.col-center{
	display:flex;
	flex-direction:column;
	align-items:center;
	justify-content:center;
}
.sever{
	margin-top:30px;
}
/*common  */

/* index */

.company-logo{
	width:128px;
	height:64px;
	background:#ccc;
}
#mynav a{
   color:#000000;
   background:#ffffff;
}
#mynav a:active,#mynav a:hover,#mynav a:focus,#mynav .active a{
     border-bottom:2px solid #1881EC;
     color:#1881EC;
}
/*index  */



/*course  */
#course{
  border:0;	
}
 #course a{
  	border:0;
 	color:#000000;
 	background:#ffffff;
 }  
 #course a:active,#course a:hover,#course a:focus, #course .active a{
	color:#1881EC;
 	
 }
 .course-item{
	cursor:pointer;
 }
 .course-name:hover{
	color:#1881EC;
 }
 
 #detail{
	border:0;
 }
 #detail a{
  	border:0;
 	color:#000000;
 	background:#ffffff;
 }
#detail a:active,#detail a:hover,#detail a:focus,#detail .active a{
	color:#1881EC;	
 }
 
 
/*course  */

</style>
<body>
<nav class="navbar navbar-default">
  <div class="container " style="">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynav" aria-expanded="false">
        <span class="sr-only">响应式汉堡按钮</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" >logo</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse " id="mynav">
 
     <ul class="nav navbar-nav "  style="display:inline-block;" >
      <li  data-c="index" class="active"><a href="<?php echo url('index/index'); ?>">首页 <span class="sr-only">(current)</span></a></li>
      <li data-c="course"><a href="<?php echo url('course/courseList'); ?>">职学院</a></li>
      <li data-c="job"><a href="<?php echo url('job/jobList'); ?>">找工作</a></li>
      <li data-c="talent"><a href="<?php echo url('talent/talent'); ?>">找人才</a></li>
      <li data-c='register'><a href="<?php echo url('companyadmin/index/login'); ?>">企业入口</a></li>
      </ul>
      <p class="navbar-text navbar-right "><a href="#" class="navbar-link" data-toggle="modal" data-target="#userModal">注册/登录</a></p>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

 <h2  class="text-center">企业注册</h2>
<div class="container ">
<form  class="layui-form sever" >
    <div class="layui-form-item">
    <label class="layui-form-label" style="width:auto;">企业名称：</label>
    <div class="layui-input-block" style="width:320px;">
      <input type="text" name="name" required  lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
    </div>
  </div>
   <div class="layui-form-item">
    <label class="layui-form-label" style="width:auto;">登录密码：</label>
    <div class="layui-input-block"  style="width:320px;" >
      <input type="password" name="pwd" required  lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
    </div>
  </div>
     <div class="layui-form-item">
    <label class="layui-form-label" style="width:auto;">确认密码：</label>
    <div class="layui-input-block" style="width:320px;">
      <input type="password" name="pwd2" required  lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
    </div>
  </div>
   <div class="layui-form-item">
    <label class="layui-form-label" style="width:auto;display:inline-block;">HR联系电话：</label>
    <div class="layui-input-block" style="width:320px;display:inline-block;margin-left:0;">
      <input type="text" name="tel" required  lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
    </div>
  </div>


<div class="sever" >
<h4 style="margin-left:15px;margin-bottom:30px;">完成以下信息成为内推企业</h4>
<div class="layui-form-item">
    <label class="layui-form-label" style="width:auto;display:inline-block;">公司全称：</label>
    <div class="layui-input-block" style="width:320px;display:inline-block;margin-left:0;">
      <input type="text" name="fullName" required  placeholder="请输入" autocomplete="off" class="layui-input">
    </div>
</div>
<p style="margin-left:15px;">办公室照片：</p>

<div class="sever row-center" style="justify-content:flex-start;margin-left:15px;">
<div style="border:1px solid #c2c2c2; width:300px;height:150px;cursor:pointer;position:relative;" class="text-center companyimg" id="image1">
<span class="fa fa-plus plus fa-2x " style="line-height:150px;"></span>
</div>


<div style="border:1px solid #c2c2c2; width:300px;height:150px;cursor:pointer;position:relative;margin-left:25px;" class="text-center companyimg" id="image2">
<span class="fa fa-plus plus fa-2x " style="line-height:150px;"></span>
</div>

<div style="border:1px solid #c2c2c2; width:300px;height:150px;cursor:pointer;position:relative;margin-left:25px;" class="text-center companyimg" id="image3">
<span class="fa fa-plus plus fa-2x " style="line-height:150px;"></span>
</div>
</div>

</div>

<p class="text-center"> <a class="sever btn btn-primary text-center submit"   data-loading-text="正在提交..." lay-submit lay-filter="companyReg" style="width:150px;border-radius:15px;background:#1881Ec;">提交</a></p>

</form>
</div>



<!--注册完成时弹出 -->
<div class="modal fade"  role="dialog" id="companyReg" style="">
 <div class="modal-dislog" style="position:absolute; top: 50%;left: 50%;transform: translate(-50%, -50%);">
     <div class="modal-content">
        <div class="modal-header">
        <h4 class="text-center text-success">注册成功！</h4>
        </div>
        <div class="modal-body">
        
        <p class="text-center text-success"><span class="fa fa-check-circle fa-3x"></span></p>
       
          
        </div>
        <div class="modal-footer">
        <a type="button" href="<?php echo url('index/index'); ?>" class="btn btn-default">返回首页</a>
        <a type="button" href="<?php echo url('companyadmin/index/login'); ?>" class="btn btn-primary">马上登陆</a>
        <button></button>
        </div>  
     
    </div>

 </div>

</div> 
<!--注册完成时弹出  -->




<div class="container-fluid sever" style="background:#DFDFDF;">
<div class="container" style="height:100%;">
<h4 class="text-center">宣传口号：文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容文字内容</h4>
	<div class="row row-center">
	   <div class="col-md-4 col-center" style="border-right:1px solid #ffffff;">
          <div style="background:#ffffff;width:150px;height:150px;">视频</div>
        </div>
	   <div class="col-md-4 col-center" style="height:150px;border-right:1px solid #ffffff;">
      <p>文字内容文字内容</p>
      <p>文字内容文字内容</p>
      <p>文字内容文字内容</p>
       </div>
	   <div class="col-md-4 col-center">
      <div style="background:#ffffff;width:150px;height:150px;">二维码</div>
      </div>
	</div>
	<h5 class='text-center'>Copyright@2013-2018 ZHONGSHAN ZMR Co.Ltd掌门人网络科技有限公司技术支持</h5>
</div>
</div>

<!-- 用户注册时弹出 -->

<div class="modal fade"  role="dialog" id="userModal" style="">
 <div class="modal-dislog" style="width:350px;  position:absolute; top: 50%;left: 50%;transform: translate(-50%, -50%);">
     <div class="modal-content">
     
        <div style="padding:15px;">
          <h4 style="border-bottom:2px solid #1881EC;margin-bottom:0;display:inline-block;padding-bottom:15px;">绑定信息</h4>
          <hr  style="margin:0;" />
        </div>
     
        <div class="modal-body">
        
        	<form class="form-horizontal">
        	
        	<div class="form-group">
	        	<div class="col-md-12">
	        	  <input type="text"  class="form-control" placeholder="请输入手机号码" />
	        	</div>
        	</div>
        	
            <div class="form-group">
            <div class="col-md-8">
            	<input type="text"  class="form-control" placeholder="请输入验证码" />
            </div>

             <div class="col-md-4">
               <button type="button"  style="width:100%;" class="btn btn-default">验证码</button>
             </div>            
        	</div>
        	<button  type="submit" class="center-block btn btn-default   "  style="background:#1881EC;width:80px; color:#ffffff;border-radius:15px;">提交</button>
        	</form>
        </div>
    </div>
 </div>
</div> 
<!-- 用户注册时弹出 -->
<script src="/admin/js/jquery-3.2.1.min.js"></script>
<script src="/static/js/swiper.min.js"></script>
<script src="/admin/layui/layui.js"></script>
<script  src="/static/bootstrap/js/bootstrap.min.js"></script>
<script>
/*common*/
<?php if(isset($nav)): ?>
$("#mynav").find("li").removeClass("active");
$("#mynav").find("li[data-c='<?php echo $nav; ?>']").addClass("active")
<?php endif; ?>

/*common  */



/*首页  */
  var mySwiper = new Swiper ('#company-list', {
	slidesPerView : "auto",
	spaceBetween : 20,
	loop:true,
	loopedSlides: 8,
  })  


/* /首页  */

layui.use(['layer', 'form','upload'], function(){
  var layer = layui.layer
  ,form = layui.form;
   var upload= layui.upload;
  
  /*企业注册  */
  $('#companyReg').modal({
	  'backdrop':'static',
	  'show':false,
	  "keyboard":false
  })
   var images={};
  
   form.on('submit(companyReg)', function(data){
	   var $btn = $(data.elem).button('loading')
     if(data.field.pwd!=data.field.pwd2){
    	 layer.msg("两次密码输入不一致",{icon:5,shift:6});
    	 return;
     }	  
    $.ajax({
    	url:"<?php echo url('companyReg'); ?>",
    	data:{data:data.field,images:images},
    	type:"post",
    	beforeSend:function(){
    		layer.load(2);
    	},
    	success:function(data){
    		if(data==1){
    			$('#companyReg').modal('toggle')
    		}else{
    			layer.msg(data)
    		}
    		
    	},
    	complete:function(){
    		layer.closeAll("loading")
    		  $btn.button('reset')
    	}
    }) 
    return false;
  });
    
  /* /企业注册*/
	  upload.render({
			   elem: '.companyimg',
			  url: "<?php echo url('imgUpload'); ?>",
			  field:"image",
			  multiple:true,
	         before: function(obj){ 
					layer.load(2); 
		      }
			  ,done: function(res, index, upload){	
				  layer.closeAll("loading")
			    if(res.code == 0){
			    	
			    	var item = this.item;	
			    	images[$(item).attr("id")]='/temp/'+res.src.replace(/\\/g,'/')			    	
			    	if($(item).children("img").length>0){
			    		$(item).children("img").attr("src",'/temp/'+res.src.replace(/\\/g,'/'));
			    	}else{
			    	  	$(item).children("span.plus").addClass("hidden")
				    	$(item).children("span.del").removeClass("hidden")
				    	$(item).removeClass("companyimg")
				    	$(item).append('<img   style="object-fit:cover;width:100%;height:100%;"   src="/temp/'+res.src.replace(/\\/g,'/')+'"  />')
			    	}
			    }			    
			  }
			});      
			   
  /*  企业注册图片上传*/
  
  /* 课程 */
  
  //点击进入课程内页
  $(".course-item").on("click",function(){
	  
	  location.href="<?php echo url('course/courseDetail'); ?>"
	  
  })
  /* 课程 */
  
  
  
  
});




</script>


</body>
</html>