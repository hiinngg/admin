<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"D:\wamp3\wamp64\www\recruit\public/../application/companyadmin\view\talent\editTalent.html";i:1513328097;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>人才定制</title>
<link rel="stylesheet" type="text/css" href="/admin/layui/css/layui.css" />
</head>
<body style="overflow:scroll;">

<form class="layui-form" action=""  style="width:70%;">
  <div class="layui-form-item">
    <label class="layui-form-label">职业名称</label>
    <div class="layui-input-block">
      <input type="text" name="title" required  lay-verify="required" placeholder="请输入职位名称" autocomplete="off" class="layui-input" value="<?php echo isset($data['name'])?$data['name']:''; ?>">
    </div>
  </div>
  
  
  
   <div class="layui-form-item">
	   <div class="layui-inline">
	    <label class="layui-form-label">职位薪酬</label>
	    <div class="layui-input-inline" style="width: 100px;">
	      <input type="text" name="price_min" lay-verify="required"  placeholder="￥" autocomplete="off" class="layui-input" value="<?php echo isset($data['salary_min'])?$data['salary_min']:''; ?>">
	    </div>
	    <div class="layui-form-mid">-</div>
	    <div class="layui-input-inline" style="width: 100px;">
	      <input type="text" name="price_max" lay-verify="required" placeholder="￥" autocomplete="off" class="layui-input"  value="<?php echo isset($data['salary_max'])?$data['salary_max']:''; ?>">
	    </div>
	  </div>
   </div>
   
   <div class="layui-form-item">
    <label class="layui-form-label">职业技能</label>
    <div class="layui-input-block">
      <textarea name="skill" rows="6" lay-verify="required" placeholder="请输入职业技能" class="layui-textarea"><?php echo isset($data['skill'])?$data['skill']: ''; ?></textarea>
    </div>
  </div>
   
  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">工作内容</label>
    <div class="layui-input-block">
      <textarea name="desc" rows="6"  lay-verify="required" placeholder="请输入工作内容" class="layui-textarea"><?php echo isset($data['content'])?$data['content']: ''; ?></textarea>
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="addTalent">提交</button>
      <button type="reset"  class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>

  </form>

	<script src="/admin/js/jquery-3.2.1.min.js"></script>
	<script src="/admin/layui/layui.js"></script>
	<script>

	
	layui.use('form', function(){
		  var form = layui.form;
		  
		  <?php if(isset($data)): ?>
		  var skill="<?php echo $data['skill']; ?>";
		  var content="<?php echo $data['content']; ?>";
		  var reg=new RegExp("<br>","g"); //创建正则RegExp对象    
		  skill=skill.replace(reg,"\n");
		  content=content.replace(reg,"\n")
		  $("textarea[name='desc']").text(content)
		  $("textarea[name='skill']").text(skill)
           form.render()
		  <?php endif; ?>
		  
		  
		  //监听提交
		  form.on('submit(addTalent)', function(data){
			  
			  if(parseInt(data.field['price_min'])>parseInt(data.field['price_max'])){
					layer.msg("请设置正确的薪酬区间",{icon:5,shift:6})
					return false;
			  }
			  data.field['desc']=data.field['desc'].replace(/\n|\r\n/g,"<br>");
			  data.field['skill']=data.field['skill'].replace(/\n|\r\n/g,"<br>");
			  
			  var url="<?php echo url('addTalent'); ?>";
			  var data={data:data.field};
			  <?php if(isset($data)): ?>
			  url="<?php echo url('talentEdit'); ?>"
			  data['taid']="<?php echo $data['taid']; ?>"
			  <?php endif; ?>
			  
			  
			  $.ajax({
			    	url:url,
			    	beforeSend:function(){
			    		layer.load(2)
			    	},
			    	data:data,
			    	type:"post",
			    	success:function(data){
			    		if(data==1){
			    			layer.msg("保存成功")
			    			setTimeout(function(){
			    				history.go(0)
			    			},500)
			    		}
			    	},
			    	complete:function(){
			    		layer.closeAll("loading")
			    	}
			    	
			    }) 
			  
		   
		    return false;
		  });
		});
	</script>

</body>
</html>