<?php /*a:3:{s:79:"D:\PHPstudy\PHPTutorial\WWW\03kj\shopping\application\admin\view\user\list.html";i:1562674523;s:76:"D:\PHPstudy\PHPTutorial\WWW\03kj\shopping\application\admin\view\header.html";i:1563505880;s:77:"D:\PHPstudy\PHPTutorial\WWW\03kj\shopping\application\admin\view\foother.html";i:1562166675;}*/ ?>
. <!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/static/ren.ico" >
<link rel="Shortcut Icon" href="/static/ren.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/static/hui/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/hui/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/static/hui/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/hui/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/hui/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>电商后台</title>
<meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<!--_header 作为公共模版分离出去-->
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/aboutHui.shtml">H-ui.admin</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">H-ui</a> 
			<span class="logo navbar-slogan f-l mr-10 hidden-xs">v3.0</span> 
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav class="nav navbar-nav">
				<ul class="cl">
					<li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" onclick="article_add('添加资讯','article-add.html')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
							<li><a href="javascript:;" onclick="picture_add('添加资讯','picture-add.html')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>
							<li><a href="javascript:;" onclick="product_add('添加资讯','product-add.html')"><i class="Hui-iconfont">&#xe620;</i> 产品</a></li>
							<li><a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>
				</ul>
			</li>
		</ul>
	</nav>
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<li>超级管理员</li>
					<li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A"><?php echo htmlentities($name); ?><i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
							<li><a href="#">切换账户</a></li>
							<li><a href="<?php echo url('login/loginOut'); ?>">退出</a></li>
						</ul>
					<li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger"></span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
					<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
							<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
							<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
							<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
							<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
							<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</div>
</div>
</header>
<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->
<aside class="Hui-aside">
	
	<div class="menu_dropdown bk_2">
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe616;</i> 资讯管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="article-list.html" title="资讯管理">资讯管理</a></li>
		</ul>
	</dd>
</dl>
		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i> 图片管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="picture-list.html" title="图片管理">图片管理</a></li>
		</ul>
	</dd>
</dl>
		<dl id="menu-product">
			<dt><i class="Hui-iconfont">&#xe620;</i> 产品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="<?php echo url('brand/list'); ?>" title="品牌管理">品牌管理</a></li>
					<li><a href="<?php echo url('goodscate/list'); ?>" title="分类管理">分类管理</a></li>
					<li><a href="<?php echo url('goods/list'); ?>" title="产品管理">产品管理</a></li>
					<li><a href="<?php echo url('attrcategory/list'); ?>" title="属性管理">属性分类管理</a></li>

		</ul>
	</dd>
</dl>
		<dl id="menu-comments">
			<dt><i class="Hui-iconfont">&#xe622;</i> 评论管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="http://h-ui.duoshuo.com/admin/" title="评论列表">评论列表</a></li>
					<li><a href="feedback-list.html" title="意见反馈">意见反馈</a></li>
		</ul>
	</dd>
</dl>
		<dl id="menu-member">
			<dt><i class="Hui-iconfont">&#xe60d;</i> 会员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="member-list.html" title="会员列表">会员列表</a></li>
					<li><a href="member-del.html" title="删除的会员">删除的会员</a></li>
					<li><a href="member-level.html" title="等级管理">等级管理</a></li>
					<li><a href="member-scoreoperation.html" title="积分管理">积分管理</a></li>
					<li><a href="member-record-browse.html" title="浏览记录">浏览记录</a></li>
					<li><a href="member-record-download.html" title="下载记录">下载记录</a></li>
					<li><a href="member-record-share.html" title="分享记录">分享记录</a></li>
		</ul>
	</dd>
</dl>
		<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="<?php echo url('role/list'); ?>" title="角色管理">角色管理</a></li>
					<li><a href="<?php echo url('permission/list'); ?>" title="权限管理">权限管理</a></li>
					<li><a href="<?php echo url('permissioncate/list'); ?>" title="权限管理">权限分类管理</a></li>
					<li><a href="<?php echo url('user/list'); ?>" dsaitle="管理员列表">管理员列表</a></li>
		</ul>
	</dd>
</dl>
		<dl id="menu-tongji">
			<dt><i class="Hui-iconfont">&#xe61a;</i> 系统统计<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="charts-1.html" title="折线图">折线图</a></li>
					<li><a href="charts-2.html" title="时间轴折线图">时间轴折线图</a></li>
					<li><a href="charts-3.html" title="区域图">区域图</a></li>
					<li><a href="charts-4.html" title="柱状图">柱状图</a></li>
					<li><a href="charts-5.html" title="饼状图">饼状图</a></li>
					<li><a href="charts-6.html" title="3D柱状图">3D柱状图</a></li>
					<li><a href="charts-7.html" title="3D饼状图">3D饼状图</a></li>
		</ul>
	</dd>
</dl>
		<dl id="menu-system">
			<dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="system-base.html" title="系统设置">系统设置</a></li>
					<li><a href="system-category.html" title="栏目管理">栏目管理</a></li>
					<li><a href="system-data.html" title="数据字典">数据字典</a></li>
					<li><a href="system-shielding.html" title="屏蔽词">屏蔽词</a></li>
					<li><a href="system-log.html" title="系统日志">系统日志</a></li>
		</ul>
	</dd>
</dl>
</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<!--/_menu 作为公共模版分离出去-->
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		管理员管理
		<span class="c-gray en">&gt;</span>
		管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="text-c">	
			</div>
			<input type="hidden" id="__token__" value="<?php echo htmlentities(app('request')->token()); ?>" hidden="" />
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l"> <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i>批量删除</a></span>&nbsp&nbsp&nbsp&nbsp
				<span onclick="modaldemo()" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员 </span>
				<span id="add_span"></span>
				<span class="r">共有数据：<strong>54</strong> 条</span>
			</div>
			<table class="table table-border table-bordered table-bg">
				<thead>
					<tr>
						<th scope="col" colspan="9">员工列表</th>
					</tr>
					<tr class="text-c">
						<th width="25"><input type="checkbox" name="" value=""></th>
						<th width="40">ID</th>
						<th width="100">登录名</th>
						<th width="90">角色</th>
						<th width="90">手机号码</th>
						<th width="130">加入时间</th>
						<th width="100">是否已启用</th>
						<th width="100">操作</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</article>
	</div>
	     <div id="modal-demo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content radius">
			<div class="modal-header">
				<h3 class="modal-title" style="color:#A0E8A0;text-align: center;">添加管理员</h3>
				<a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
			</div>
			<div class="modal-body">
				<div class="modal-body" style="text-align: center; padding: 10px;">
				用户名称：<input type="text" placeholder="用户名称" id="name" style="width: 200px; height: 25px;">
				<br><br>
				用户密码：<input type="password"  placeholder="用户密码" id="password"  style="width: 200px; height: 25px;">
				<br><br>
				用户手机：<input type="text" placeholder="用户手机" id="mobile"  style="width: 200px; height: 25px;">
				<br><br>
				用户角色：<select id="role_id" style="width:100px; height: 30px;">

				</select>
			</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" id="add">确定</button>
				<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
			</div>
		</div>
	</div>
</div>


  <!--  修改弹框 -->
     <div id="modal-demo1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content radius">
			<div class="modal-header">
				<h3 class="modal-title" style="color:#A0E8A0;text-align: center;">添加管理员</h3>
				<a class="close" data-dismiss="modal" aria-hidden="true" href="javascript:void();">×</a>
			</div>
			<div class="modal-body">
				<div class="modal-body" style="text-align: center; padding: 10px;">
			     <input type="text" name="" id="up_id" hidden="">
				用户名称：<input type="text" placeholder="用户名称" id="up_name" style="width: 200px; height: 25px;">
				<br><br>
				用户密码：<input type="text"  placeholder="用户密码" id="up_password"  style="width: 200px; height: 25px;">
				<br><br>
				用户手机：<input type="text" placeholder="用户手机" id="up_mobile"  style="width: 200px; height: 25px;">
				<br><br>
				用户角色：<select id="up_role_id" style="width:100px; height: 30px;">				
				</select>
				<span id="uname"></span>
				<input type="hidden" id="__token__" value="<?php echo htmlentities(app('request')->token()); ?>" />
			</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" id="update">确定</button>
				<button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
			</div>
		</div>
	</div>
</div>


</sectin>	
<!--_footer 作为公共模版分离出去-->
<!-- <script type="text/javascript" src="/static/hui/lib/jquery/1.9.1/jquery.min.js"></script>  -->
<script type="text/javascript" src="/static/js/jquery.min.js"></script>
<script type="text/javascript" src="/static/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/hui/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/static/hui/static/h-ui.admin/js/H-ui.admin.page.js"></script> 
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
		function getToken(){
			$.ajax({
				url:"<?php echo url('common/commonToken'); ?>",
				dataType:'json',
				success:function(res){
					$('#__token__').val(res.token)
				}
			})
		}
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html> 
<script type="text/javascript">
		 function modaldemo(){
	        $("#modal-demo").modal("show")
	        getCate()
	    }
         
	$("#add").click(function(){
		var __token__=$("#__token__").val()
		var user_name=$("#name").val()
		var password=$("#password").val()
		var role_id=$("#role_id").val()
		//console.log(role_id)
		var mobile=$("#mobile").val()
		$.ajax({
			url:"<?php echo url('user/addAction'); ?>",
			data:{
				__token__:__token__,
				user_name:user_name,
				password:password,
				role_id:role_id,
				mobile:mobile,
			},
			dataType:'json',
			type:'post',
			success:function(res){
				getToken()
				if (res.status=='ok') {
					$("#name").val('')
					$("#password").val('')
					$('#role_id').find("option:selected").val();
					$("#mobile").val('')
					$("#modal-demoll").modal("hide")
					show()
				}
				if (res.status=='error') {
				$("#add_span").html(res.data)
				$("#add_span").css("color", "red")
					setTimeout(function(){
						$("#add_span").html("&nbsp;&nbsp;&nbsp;")
					},3000);
				}
			}
		})
	})


	$("#update").click(function(){
		var id=$("#up_id").val()
		var user_name=$("#up_name").val()
		var password=$("#up_password").val()
		var role_id=$("#up_role_id").val()
		var mobile =$("#up_mobile").val()
		var __token__=$("#__token__").val()
		console.log(user_name)
		$.ajax({
			url:"<?php echo url('user/updateAction'); ?>",
			data:{
				id:id,
				__token__:__token__,
				user_name:user_name,
				password:password,
				role_id:role_id,
				mobile:mobile,
			},
			dataType:'json',
			type:'post',
			success:function(res){
				getToken()
				if (res.status=='error') {
					$("#update_span").html(res.data)
					$("#update_span").css('color','red')
				}
				if (res.status=='ok') {
					$("#modal-demo").modal("hide")
					$("#update_span").html('')
					show()
				}
			}
		})
	})

  function getCate(str,id=0) {
  	$.ajax({
  		url:"<?php echo url('role/show1'); ?>",
  		dataType:'json',
  		success:function (res) {
  			var option=''
  			for (var i = 0; i < res.length; i++) {
			if (id==res[i].id) {
		        option=option+"<option value='"+res[i].id+"' selected>"+res[i].name+"</option>";		
			}else{
		        option=option+"<option value='"+res[i].id+"'>"+res[i].name+"</option>";	
			}
  			 
  			}
          $('#'+str+'').html(option)
  		}


        })
	}
     getCate('role_id')

       function show() {
    	$.ajax({
  		url:"<?php echo url('user/show'); ?>",
  		dataType:'json',
  		success:function (res) {
  			if(res.status=='error'){
  				alert('没有权限')
  			}else{
  				  			// console.log(res)
			var tr=''
			for (var i = 0; i < res.length; i++) {
			tr=tr+"<tr class='text-c'><td><input type='checkbox' class='mycheckbox' value='"+res[i].id+"'></td><td>"+res[i].id+"</td><td>"+res[i].user_name+"</td><td>"+res[i].name+"</td><td>"+res[i].mobile+"</td><td>"+res[i].create_time+"</td><td>是否启用</td><td class='f-14 product-brand-manage'><a onclick='modaldemo1(\""+res[i].id+"\",\""+res[i].user_name+"\",\""+res[i].password+"\",\""+res[i].mobile+"\",\""+res[i].role_id+"\")'  style='text-decoration:none' title='编辑'><i class='Hui-iconfont'>&#xe6df;</i></a> <a onclick='del("+res[i].id+")' style='text-decoration:none' class='ml-5' title='删除'><i class='Hui-iconfont'>&#xe6e2;</i></a></td></tr>"
		}
			$('.table tbody').html(tr)
  				}
	  		}

	  	})
	 }
	  show()	

      function modaldemo1(id,name,password,mobile,role_id){
					$("#up_id").val(id)
					$("#up_name").val(name)
					$("#up_password").val(password)
					$("#up_mobile").val(mobile)
					$("#up_role_id").val(role_id)
			        getCate('up_role_id',role_id)

	               $("#modal-demo1").modal("show")
	        
	    }
	function del(id){
		var r=confirm("确定删除吗？");
		var __token__=$("#__token__").val()
		console.log(__token__)
		if (r==true){
			$.ajax({
				url:"<?php echo url('user/delete'); ?>",
				data:{
					id:id,
					 __token__:__token__,
				},
				type:'post',
				dataType:'json',
				success:function(res){
					show()
					getToken()
				}
			})
		}
	}
		function datadel(){
		var r=confirm("确定删除吗？");
		var __token__=$("#__token__").val()
		if (r==true){
			var box = $(".mycheckbox:checked")
			var id = ''
			for (var i = 0; i < box.length; i++) {
				id = id+","+ box[i].value
			}
			console.log(id)
			$.ajax({
				url:"<?php echo url('user/datadel'); ?>",
				data:{
					id:id,
					__token__:__token__,
				},
				dataType:'json',
				type:'post',
				success:function(res){
					console.log(res)
					show()
					getToken()
				}
			})
		}
	}
</script>


