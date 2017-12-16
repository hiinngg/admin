<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"D:\wamp3\wamp64\www\recruit\public/../application/index\view\course\courselist.html";i:1513146767;s:72:"D:\wamp3\wamp64\www\recruit\public/../application/index\view\layout.html";i:1513157398;}*/ ?>
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
      <a class="navbar-brand" href="<?php echo url('index/index'); ?>" >logo</a>
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

 <div class="container sever">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist" id="course">
    <li ><a href="#" style="color:#000000;">课程分类</a></li>
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
  </ul>
  
</div>

    <h3 class="text-center">新上好课</h3>
   
  <!-- Tab panes -->
  <div class="tab-content container sever">
    <div role="tabpanel row" class="tab-pane active" id="home">
	    <div class="col-md-3   course-item">
	       <img src="" alt="" style="width:216px;height:120px;"/>
	       <h4 class="course-name">Name</h4>
	       <h5>简介 简介 简介</h5>
	       <p>299</p>
	    </div>
      <div class="col-md-3 course-item">
	       <img src="" alt="" style="width:216px;height:120px;"/>
	       <h4 class="course-name">Name</h4>
	       <h5>简介 简介 简介</h5>
	       <p>299</p>
	    </div>
     <div class="col-md-3   course-item">
	       <img src="" alt="" style="width:216px;height:120px;"/>
	       <h4 class="course-name">Name</h4>
	       <h5>简介 简介 简介</h5>
	       <p>299</p>
	    </div>
     <div class="col-md-3   course-item">
	       <img src="" alt="" style="width:216px;height:120px;"/>
	       <h4 class="course-name">Name</h4>
	       <h5>简介 简介 简介</h5>
	       <p>299</p>
	    </div>
     <div class="col-md-3   course-item">
	       <img src="" alt="" style="width:216px;height:120px;"/>
	       <h4 class="course-name">Name</h4>
	       <h5>简介 简介 简介</h5>
	       <p>299</p>
	    </div>
	    
	    <div class="col-md-12">
	      <button type="button"  class="center-block btn btn-default">更多课程</button>
	    </div>
	   
	    
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">2</div>
    <div role="tabpanel" class="tab-pane" id="messages">3</div>
    <div role="tabpanel" class="tab-pane" id="settings">4</div>
  </div>
  
 
  
  


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