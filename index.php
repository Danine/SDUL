<!DOCTYPE php>
<html lang="zh-CN">

<head>
	<meta charset="utf-8">
	<!-- font icon -->
	<link href="css/elegant-icons-style.css" rel="stylesheet" />
	<!-- Custom styles -->
	<link href="css/style.css" rel="stylesheet">
	<!-- bootstrap theme -->
	<link href="css/bootstrap-theme.css" rel="stylesheet">

	<title>SDUL学生信息系统</title>
	<script>
		function displayDate(){
    	document.getElementById("failure").innerHTML=Date();
    }
    function startTime(){
    	var today=new Date();
    	var h=today.getHours();
  	  var m=today.getMinutes();
    	var s=today.getSeconds();
  	  m=checkTime(m);
    	s=checkTime(s);
    	document.getElementById('txt').innerHTML=h+":"+m+":"+s;
  	  t=setTimeout(function(){startTime()},500);
    }
    function checkTime(i){
    	if (i<10){
	  	  i="0" + i;
	    }
	    return i;
    }
    </script>


</head>
<!-- 设置为当HTML页面加载完成时 -->

<body onload="displayDate();startTime();">
	<section id="container" class="">
		<header class="header dark-bg">
			<a href="index.php" class="logo"><img width="163" height="45" src="img/logo.png" alt="Logo"></a>
			<a href="index.php" class="logo" style="margin-top:15px">&nbsp;&nbsp;SDUL信息系统</a>
		</header>
		<aside>
			<div id="sidebar" class="nav-collapse ">
				<!-- sidebar menu start-->
				<ul class="sidebar-menu">
					<li class="active">
						<a href="check_info.php" class="">
							<i class="icon_house_alt"></i>个人信息</a>
					</li>
					<li class="sub-menu">
						<a href="javascript:;" class="">
							<i class="icon_document_alt"></i>教学计划</a>
						<ul class="sub"></ul>
					</li>
					<li class="sub-menu">
						<a href="javascript:;" class="">
							<i class="icon_desktop"></i>成绩查询</a>
						<ul class="sub"></ul>
					</li>
					<li class="sub-menu">
						<a href="javascript:;" class="">
							<i class="icon_genius"></i>课程表</a>
						<ul class="sub"></ul>
					</li>
					<li class="sub-menu">
						<a href="javascript:;" class="">
							<i class="icon_piechart"></i>考试安排</a>
						<ul class="sub"></ul>
					</li>

					<li class="sub-menu">
						<a href="javascript:;" class="">
							<i class="icon_table"></i>请假系统</a>
						<ul class="sub"></ul>
					</li>

					<li class="sub-menu">
						<a href="javascript:;" class="">
							<i class="icon_documents_alt"></i>投诉反馈</a>
						<ul class="sub"></ul>
					</li>

				</ul>
			</div>
		</aside>
		<div>
			<section id="main-content">
				<?php
				if(!isset($_COOKIE["userid"]) or $_COOKIE["userid"]=="")
     			{
       			?>
				<tr>
					<td>你还没有登录！点<a href="login.php">我</a>登录</td>
				</tr>
				<?php
    			}
    			else{
				?>
				<p>您的登录时间为：</p>
				<p id="failure">QAQ</p>
				<div id="txt"></div>
				<div class="form-group">
				<a href='exit.php'><input type='button' class="btn btn-default" value='退 出' />
				</div>
				<?php
				}
				?>
			</section>
		</div>
	</section>
</body>

</html>