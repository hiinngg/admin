<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"D:\wamp3\wamp64\www\recruit\public/../application/companyadmin\view\demand\demandlist.html";i:1513232223;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>需求管理</title>
<link rel="stylesheet" type="text/css" href="/admin/layui/css/layui.css" />
</head>
<style type="text/css">
.flex-row {
	display: flex;
	align-items: center;
}
.active{
	background:#009688;
	color:#ffffff;
}
.active:hover{
	color:#ffffff;
}
</style>

<body  style="scroll-x:scroll;">

<div style="text-align:center;margin-bottom:30px;">
<button  class="active  tab layui-btn layui-btn-primary">人才定制需求管理</button>
<button  class="tab layui-btn layui-btn-primary">团队定制需求管理</button>
<button  class="tab layui-btn layui-btn-primary">普工定制需求管理</button>

</div>

      <p style="text-align:center;">人才定制需求管理</p>
		<table class="layui-table"  id="table"  lay-filter="table" style="width:auto;" >
	    </table>

    <script src="/admin/layui/layui.js"></script>
	<script type="text/javascript">
	var tranStatus={
			'发布':1,
			'不发布':0
	}
		layui.use([ 'table', 'layer','jquery','form' ], function() {
			var $=layui.jquery;
			var table = layui.table;
			var layer=layui.layer;		
			var form = layui.form
		<?php if(!isset($none)): ?>
			var init= layer.load(2, {shade: false});
		   var ctable = table.render({
			        elem:"#table",	
			       
			        url: "<?php echo url('article/articleList'); ?>",
			        cols:[[
			         {checkbox: true},
			         {field: 'postid', title: '编号',type:"numbers" },
			         {field: 'title', title: '标题' },
			         {field: 'des', title: '描述' },
			         {field: 'is_valid', title: '状态',templet: '#statusTpl' },
			         {field: 'created_at', title: '创建时间' },
			         {field: 'score', title: '操作', width:250, toolbar: '#bar'}
			        ]],
				   page:true,
				   done: function(res, curr, count){ //res:返回的数据  curr:当前页码  count：数据总量
			        layer.close(init)
			    }
				});
			 
			 
			 $(".articleSearch").on("click",function(){
				 var keyword=$("input[name='keyword']").val();
				 if(keyword==""){
					 return;
				 }
				 articleTable.reload({
					  where: { 
					    keyword:keyword
					  }
					  ,page: {
					    curr: 1 //重新从第 1 页开始
					  }
					});
				 
			 }) 
			<?php endif; ?>
			 
			 
			$(".add").on("click",function(){			
					var data = {
							title:"新增新闻",
							href : $(this).attr("data-url")
						}
					window.parent.navtab.tabAdd(data)
					
				})
			
				


				table.on('tool(table)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
					  var data = obj.data; //获得当前行数据
					  var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
					  var tr = obj.tr; //获得当前行 tr 的DOM对象	
					  var dtd=$.Deferred();
					  console.log(data)
					  if(layEvent === 'detail'){ //查看
						  layer.open({
						      type: 2,
						      title: '内容查看',
						      shadeClose: true,
						      shade: false,
						      maxmin: true, //开启最大化最小化按钮
						      area: ['893px', '600px'],
						      content: "articlePreview?id="+data.postid
						    });

					  } else if(layEvent === 'del'){ //删除
					    layer.confirm('确定删除该新闻么', function(index){
					    	  _ajax("<?php echo url('articleDel'); ?>",{postid:data.postid},dtd)
							  dtd.done(function(){
								  obj.del(); 
								  layer.close(index);
							  })
					    });
					  } else if(layEvent === 'edit'){ //编辑
						  layer.open({
						      type: 2,
						      title: '内容编辑',
						      shadeClose: true,
						      shade: false,
						      maxmin: true, //开启最大化最小化按钮
						      area: ['893px', '600px'],
						      content: "articleEdit?id="+data.postid
						    });
					    
					  }else if(layEvent === 'change2on'){
						  _ajax("<?php echo url('statusChange'); ?>",{postid:data.postid,status:1},dtd)
						  dtd.done(function(){
							  $(tr).find("button.on").get(0).outerHTML='<button class="layui-btn layui-btn-warm layui-btn-xs off" lay-event="change2off">撤销发布</button>'
								  obj.update({
									  is_valid:1
						       });
						  })
							
					  }else if(layEvent === 'change2off'){
						  _ajax("<?php echo url('statusChange'); ?>",{postid:data.postid,status:0},dtd)
						 dtd.done(function(){
					     $(tr).find("button.off").get(0).outerHTML='<button class="layui-btn layui-btn-xs on" lay-event="change2on">发布</button>'
						  obj.update({
							is_valid:0
						 });
						  })
					
					  }
					});
				
				function  _ajax(url,data,deferred){
					var index = layer.load(2, {shade: false});
					$.ajax({
						url:url,
						data:data,
						type:"post",
						success:function(data){
							layer.close(index)
							if(data==1){
								deferred.resolve();
							}else{
								layer.msg("操作失败");
							}
							
						}
						
					})
					
					
				}
				
		  function loadtalent(){
			  
			  
			  
			  
		  }
		
		  $(".tab").on("click",function(){

			  $(this).siblings().removeClass("active");
			  $(this).addClass("active")
			  
			  
			  
		  })
		  
				
				
				 
		});
	
	function refresh(){
		history.go(0)
	}
	
    
		
		
	</script>
<script type="text/html" id="bar">
  <button class="layui-btn layui-btn-xs" lay-event="detail">查看</button>
  <button class="layui-btn layui-btn-xs" lay-event="edit">编辑</button>
  {{#  if(d.is_valid == 1){ }}
   <button class="layui-btn layui-btn-warm layui-btn-xs off" lay-event="change2off">撤销发布</button>
  {{#  } else { }}
    <button class="layui-btn layui-btn-xs on" lay-event="change2on">发布</button>
  {{#  } }}

  <button class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</button>
 
  <!-- 这里同样支持 laytpl 语法，如： -->

</script>
<script type="text/html" id="statusTpl">
  {{#  if(d.is_valid == 1){ }}
    <span style="color:#5FB878;">发布中</span>
  {{#  } else { }}
     <span style="color:#FFB800;">未发布</span>
  {{#  } }}
</script>
</body>

</html>