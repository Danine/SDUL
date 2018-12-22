<!DOCTYPE php>
<html>
<head>
	<meta charset="utf-8">
	<title>SDUL学生信息系统</title>
	<!-- font icon -->
	<link href="css/elegant-icons-style.css" rel="stylesheet" />
	<!-- Custom styles -->
	<link href="css/style.css" rel="stylesheet">
	<!-- bootstrap theme -->
	<link href="css/bootstrap-theme.css" rel="stylesheet">
</head>

<body>
	<form class="form-horizontal" action="check_info.php" method="post">
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
					<section class="panel">
					<?php
     			 		if(!isset($_COOKIE["userid"]) or $_COOKIE["userid"]==""){
       				?>
					<tr>
						<td>你还没有登录！点<a href="login.php">我</a>登录</td>
					</tr>
					<?php
						}
						else{
					?>
						<header class="panel-heading">
							个人信息查询
						</header>
						<?php
       					include"config.php";
        				$sql="SELECT * FROM $sdul_student WHERE s_id='$_COOKIE[userid]'";
        				$result=$mysqli->query($sql);
        				$row=$result->fetch_array();
      					?>
						<div class="panel-body">
							<form class="form-horizontal " method="get">
								<div class="form-group">
									<label class="col-sm-2 control-label">姓名</label>
									<div class="col-sm-10">
										<?php
										echo"<input class='form-control' id='disabledInput' type='text' placeholder=".$row["s_name"]." disabled>";
										?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">性别</label>
									<div class="col-sm-10">
										<?php
										echo"<input class='form-control' id='disabledInput' type='text' placeholder=".$row["s_sex"]." disabled>";
										?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">书院</label>
									<div class="col-sm-10">
										<?php
										echo"<input class='form-control' id='disabledInput' type='text' placeholder=".$row["dorm"]." disabled>";
										?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">寝室</label>
									<div class="col-sm-10">
										<?php
										echo"<input class='form-control' id='disabledInput' type='text' placeholder=".$row["broom_id"]." disabled>";
										?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">手机</label>
									<div class="col-sm-10">
										<?php
										echo"<input class='form-control' id='disabledInput' type='text' placeholder=".$row["s_tel"]." disabled>";
										?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">QQ</label>
									<div class="col-sm-10">
										<?php
										echo"<input class='form-control' id='disabledInput' type='text' placeholder=".$row["s_qq"]." disabled>";
										?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">生日</label>
									<div class="col-sm-10">
										<?php
										echo"<input class='form-control' id='disabledInput' type='text' placeholder=".$row["bday"]." disabled>";
										?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">家庭住址</label>
									<div class="col-sm-10">
										<?php
										echo"<input class='form-control' id='disabledInput' type='text' placeholder=".$row["addr"]." disabled>";
										?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">监护人姓名</label>
									<div class="col-sm-10">
										<?php
										echo"<input class='form-control' id='disabledInput' type='text' placeholder=".$row["parent_name"]." disabled>";
										?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">监护人手机</label>
									<div class="col-sm-10">
										<?php
										echo"<input class='form-control' id='disabledInput' type='text' placeholder=".$row["parent_tel"]." disabled>";
										?>
									</div>
								</div>
								<div>&nbsp;</div>
								<div class="form-group">
									<div align="center">
										<a href='edit_info.php'><input type='button' class="btn btn-primary" value='维 护' /></a>&nbsp;
										<a href='index.php'><input type='button' class="btn btn-default" value='返 回' /></a>
									</div>
								</div>
							</form>
						</div>
						<?php
						}
						?>
					</section>
				</section>
			</div>
		</section>
	</form>
</body>
</html>