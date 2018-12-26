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
							<a href="check_leave.php" class="">
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
							<div class="col-sm-10 btn-group">
								<a class="btn btn-primary" style="margin-top:-10px" href="#"><i class="icon_plus_alt2">&nbsp;增加请假信息</i></a>
							</div>
						</header>
						<?php
						include"config.php";
						$sql="SELECT * FROM $sdul_leave WHERE s_id='$_COOKIE[userid]'";
						$result=$mysqli->query($sql);
						$num=$result->num_rows;
						?>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<section class="panel">
										<table class="table table-striped table-advance table-hover">
											<tbody>
												<tr>
													<th>学号</th>
													<th>姓名</th>
													<th width="20%">请假理由</th>
													<th>请假时间</th>
													<th>节假日</th>
													<th>离校时间</th>
													<th>返校时间</th>
													<th>审核情况</th>
												</tr>
												<?php
												if($num==0){
												?>
												<tr align='center'>
													<td colspan='8'>没有记录！</td>
												</tr>
												<?php
												}
												else{
													while($row=$result->fetch_array()){
												?>
												<tr>
													<td><?php echo "$row[s_id]";?></td>
													<td><?php echo "$row[s_name]";?></td>
													<td><?php echo "$row[l_reason]";?></td>
													<td><?php echo "$row[l_time]";?></td>
													<td><?php echo "$row[legal_holiday]";?></td>
													<td><?php echo "$row[lv_sch_time]";?></td>
													<td><?php echo "$row[rt_sch_time]";?></td>
													<td><?php echo "$row[review]";?></td>
												</tr>
												<?php
													}
												}
												?>
											</tbody>
										</table>
									</section>
								</div>
							</div>
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