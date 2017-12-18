<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\wamp3\wamp64\www\recruit\public/../application/admin\view\index\index.html";i:1513591393;}*/ ?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="/admin/layui/css/layui.css" />
<title>后台通用模板-Layui</title>
<style type="text/css">
body, html {
	height: 100%;
	
}

a {
	color: #ffffff;
}

.layui-nav-tree .layui-nav-child a {
	color: #ffffff\9;
	filter: alpha(opacity = 50); /*IE*/
}

.layui-this {
	background: #009688;
	color: #FFFFFF !important;
}

#navtab div {
	height: 100%;
}

#home .layui-tab-close {
	display: none;
}

.layui-tab-content .layui-tab-item {
	z-index: 0;
	
}
</style>

</head>

<body class="layui-layout-body ">
	<div class="layui-layout layui-layout-admin ">
		<div class="layui-header  ">
			<div class="layui-logo">网站后台管理系统</div>
			<!-- 头部区域（可配合layui已有的水平导航） -->
			<ul class="layui-nav layui-layout-right">
				<li class="layui-nav-item"><a href="javascript:;"> <img
						src="http://t.cn/RCzsdCq" class="layui-nav-img"> <?php echo $adminuser; ?>
				</a>
					<dl class="layui-nav-child">
						<dd>
							<a href="">基本资料</a>
						</dd>
						<dd>
							<a href="">安全设置</a>
						</dd>
					</dl></li>
				<li class="layui-nav-item"><a href="<?php echo url('index/logout'); ?>">退出</a>
				</li>
			</ul>
		</div>

		<div class="layui-side layui-bg-black">
			<div class="layui-side-scroll">
				<!-- 左侧导航区域（可配合layui已有的垂直导航） -->
				<ul class="layui-nav layui-nav-tree" lay-filter="navtab">
					<li class="layui-nav-item layui-this"><a href="#" data-url="">后台首页</a>
					</li>
					<li class="layui-nav-item"><a href="#"
						data-url="<?php echo url('article/articlelist'); ?>">课程管理</a></li>
					<li class="layui-nav-item"><a href="#"
						data-url="http://www.qq.com">企业管理</a></li>
					<li class="layui-nav-item"><a href="#"
						data-url="http://www.qq.com">会员管理</a></li>
					<li class="layui-nav-item "><a class=""
						href="javascript:;">页面设置</a>
						<dl class="layui-nav-child">
							<dd>
								<a data-url="http://www.baidu.com" href="javascript:;">栏目编辑</a>
							</dd>
							<dd>
								<a data-url="http://www.qq.com" href="javascript:;">导航设置</a>
							</dd>
						</dl>
						</li>
				</ul>
			</div>
		</div>

		<div class="layui-body "
			style=" height: auto;overflow:hidden !important; ">
			<!-- 内容主体区域 -->
			<div style="padding: 15px; padding-top: 0; height: 100%;overflow:hidden;">
                   
				<div id="navtab"  style="height: 100%; overflow:hidden;position:relative;" class="layui-tab" lay-allowClose="true" lay-filter="navtab">
					<ul class="layui-tab-title"
						style=" background: #ffffff; overflow:hidden;">
						<li id="home" lay-id="home" class="layui-this">后台首页</li>
					</ul>
					<div class="layui-tab-content"
						style=" ">
						<div class="layui-tab-item layui-show" style="overflow:hidden;">
							<iframe src="" style="width: 100%; height: 100%;"
								frameborder="0"></iframe>
						</div>
					</div>
				</div>

			</div>
		</div>


	</div>

	<script src="/admin/js/jquery-3.2.1.min.js"></script>
	<script src="/admin/layui/layui.js"></script>
	<script>
		//JavaScript代码区域
		var navtab
		layui.config({
			base : '/admin/js/'
		}).use([ 'jquery', 'element', 'navtab' ], function() {
			window.jQuery = window.$ = layui.jquery;
			var element = layui.element;
			 navtab = layui.navtab({
				elem : '#navtab'
			});

			$(".layui-nav").find("[data-url]").on("click", function() {
				if ($(this).text() == "后台首页") {
					element.tabChange('navtab', 'home');
					return;
				}
				var data = {
					title : $(this).text(),
					href : $(this).attr("data-url")
				}
				navtab.tabAdd(data);
			})
			
		});
		function reinitIframe(id){
			var iframe = document.getElementById(id);
			try{
			var bHeight = iframe.contentWindow.document.body.scrollHeight;
			var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
			var height = Math.max(bHeight, dHeight);
			iframe.height = height;
			console.log(height);
			}catch (ex){}
			}
		function adjustFrameSize(id)
		{
			
		   var frm = document.getElementBytagName('iframe')[0]; //将iframe1替换为你的ID名
		  var subWeb = document.frames ? document.frames[id].document : frm.contentDocument;
		  if(frm != null && subWeb !=null)
		  {
		   frm.style.height="0px";//初始化一下,否则会保留大页面高度
		   frm.style.height = subWeb.documentElement.scrollHeight+"px";
		   frm.style.width = subWeb.documentElement.scrollWidth+"px";
		   subWeb.body.style.overflowX="auto";
		   subWeb.body.style.overflowY="auto";
		  } 
		}

		
	
	</script>

</body>

</html>