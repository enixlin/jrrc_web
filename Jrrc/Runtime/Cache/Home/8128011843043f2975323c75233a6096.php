<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>欢迎使用</title>
<link rel="stylesheet" href="/Jrrc_web/Public/jquery/jquery_ui/jquery_ui.css" />
<link rel="stylesheet" href="/Jrrc_web/Public/my.css" />
<script src='/Jrrc_web/Public/jquery/jquery.js'></script>
<script src='/Jrrc_web/Public/jquery/jquery_ui/jquery_ui.min.js'></script> 



<style >
.br{
cursor:pointer
}
</style>
</head>
<body>
	<div id="content">
		<div id='head'>
			<table width="100%">
				<tr>
					<td width="70%" align="center">
						<div align='left'
							style="font-size: 35px; margin: 5px; color: orange">
							江门融和农商银行国际业务信息查询
							
							</div>
					</td>
					<td width="30%" align="right">
						<div style="color: gray">
							欢迎你：<?php echo ($name); ?> <span><strong> <a id='a_logout'
									href='#' color='red'> 退出</a></strong></span>
						</div>
					</td>
				</tr>
			</table>
		</div>
		<div id='main'>
			<div id="left">
				<p align="center" style="color:  white">
					<strong>功能菜单</strong>
				</p>
				<div id="menu">
					<!--根据用户的权限输出功能菜单  -->
					<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><h1><?php echo ($vo["title"]); ?></h1>
					<div>
						<?php if(is_array($vo[0])): $i = 0; $__LIST__ = $vo[0];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vb): $mod = ($i % 2 );++$i;?><p >
						
							<a href="#" id=<?php echo ($vb["name"]); ?>>【<?php echo ($vb["title"]); ?>】</a>
						</p><?php endforeach; endif; else: echo "" ;endif; ?>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>

			</div>
			<div id="bar" 
				style="color: white; background-image: /Jrrc_web/Public/res/close.jpg" class='br'></br></br></br></br></br></br>隐藏菜单</br></br></br></br></br></br></div>
			<div id="right"></div>
		</div>
		<div id="footer"></div>
	</div>
</body>
</html>

<script>
	$(function() {

		$("#menu").accordion({ animate:250,header: "h1",collapsible:true,heightStyle:"content"});

		/*  
		格式化页面布局 
		  */
		$("#content").css({
			"border" : "3px solid gray",
			"height" : "612px"
		});

		$("#head").css({
			"width" : "100%",
			"height" : "60px",
			"background" : "white",
			//"border" : "1px solid gray",

		});
		$("#left").css({
			"width" : "15%",
			"height" : "500px",
			"background" : "#3980F4",
			"float" : "left"
		});
		$("#bar").css({
			"width" : "1.5%",
			"height" : "500px",
			"background" : "#3980F4",
			"float" : "left"
		});
		$("#right").css({
			"width" : "83.5%",
			"height" : "500px",
			"background" : "#fff",
			"float" : "left",
			"overflow":"auto"
			
			
		});
		$("#footer").css({
			"width" : "100%",
			"height" : "50px",
			"background" : "white",
			"float" : "left",
			//"border" : "1px solid gray",
		});

	});
	
	/*
	功能菜单选择
	*/
	$(function(){
		//$("#menu").stop();
		$("#menu").bind('click',function(evgl){
			var evg=evgl.srcElement?evgl.srcElement:evgl.target; 
			//alert(evg.id);
			switch (evg.id) {
			<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vt): $mod = ($i % 2 );++$i; if(is_array($vt[0])): $i = 0; $__LIST__ = $vt[0];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>case '<?php echo ($vo["name"]); ?>' :$("#right").html('');   $.post('/Jrrc_web/<?php echo ($vo["name"]); ?>',function(msg){$("#right").html(msg);}); break;<?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
			}
			evgl.stopPropagation();
		});
	});
	
	/*
	确认退出
	*/
	$("#a_logout").bind('click',function(){
	    if(confirm("确定要退出吗？")){ window.location.href='/Jrrc_web/Home/Login/logout';   }else{   }
	});

	//超链接没有下划线
	$("a:link").css({"font-size":"15px","text-decoration": "none", "color": "black"});
	
	/*
	发送ajax请求，取得最近一天的业务数据明细，年度结算量，贸易融资量等数据
	*/
	$.get('/Jrrc_web/Home/Main/showLastDayMark',function(msg){
		$("#right").html(msg);
		});
	
	
	/*
	左则功能菜单折叠
	 */
	$(function() {
		var folder = 1;
		$("#bar").bind('click', function() {
			if (folder == 1) {
				$("#left").css({
					"width" : "0%"
				});
				$("#left").fadeOut();
				$("#bar").html("<center>显示菜单</center>").css({
					"color" : "white"
				});
				$("#bar").css({
					"width" : "1.5%",
				});
				$("#right").css({
					"width" : "98.5%"
				});
			} else {
				$("#left").css({
					"width" : "15%"
				});
				$("#left").fadeIn();
				$("#bar").html("<center>隐藏菜单</center>").css({
					"color" : "white"
				});
				$("#bar").css({
					"width" : "1.5%"
				});
				$("#right").css({
					"width" : "83.5%"
				});
			}
			folder = -1 * folder;
		});
	});
</script>