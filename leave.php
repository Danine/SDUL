<?php
	if(!isset($_POST["l_reason"])){
?>
<!DOCTYPE php>
<html lang="zh-CN">
<head>
	<!-- 中文失效再加上<meta http-equiv="Content-Type" content="text/html; charset=utf-8">  -->
	<title>SDUL学生请假表</title>
	<!-- font icon -->
	<link href="css/elegant-icons-style.css" rel="stylesheet" />
	<!-- Custom styles -->
	<link href="css/style.css" rel="stylesheet">
	<!-- bootstrap theme -->
	<link href="css/bootstrap-theme.css" rel="stylesheet">
</head>

<body>
	<form class="form-horizontal" action="leave.php" method="post" onsubmit="return empty()">
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
							学生请假表
						</header>
						<div class="panel-body">
							<form class="form-horizontal " method="get">
								<div class="form-group">
									<label class="col-sm-2 control-label">请假理由</label>
									<div class="col-lg-10">
										<textarea placeholder="在这里输入请假理由..." name="l_reason" id="l_reason" class="form-control"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">法定假日</label>
									<div class="col-sm-10 btn-group" data-toggle="buttons">
										<label class="btn btn-default">
											<input type="radio" value="是" name="legal_holiday"> 是
										</label>
										<label class="btn btn-default">
											<input type="radio" value="否" name="legal_holiday"> 否
										</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">离校时间</label>
									<div class="col-sm-10">
										<input type="datetime-local" name="lv_sch_time" id="lv_sch_time" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">返校时间</label>
									<div class="col-sm-10">
										<input type="datetime-local" name="rt_sch_time" id="rt_sch_time" class="form-control">
									</div>
								</div>
								<div>&nbsp;</div>
								<div class="form-group">
									<div align="center">
											<input type="submit" class="btn btn-primary" value="提 交" />&nbsp;
											<a href="check_leave.php"><input type="button" class="btn btn-default" value="返 回" /></a>
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
	<script>
		function empty() {
			var l_reason = document.getElementById("l_reason");
			var lv_sch_time = document.getElementById("lv_sch_time");
			var rt_sch_time = document.getElementById("rt_sch_time");
			if(l_reason.value == ""){
				alert("请假理由不能为空！");
				l_reason.focus();
				return false;
			}
			if(lv_sch_time.value == ""){
				alert("请输入离校时间！");
				lv_sch_time.focus();
				return false;
			}
			if(rt_sch_time.value == ""){
				alert("请输入返校时间！");
				rt_sch_time.focus();
				return false;
			}
			if(lv_sch_time.value >= rt_sch_time.value){
				alert("你是先返校再离校吗？！");
				rt_sch_time.focus();
				return false;
			}
			if(window.confirm("提交之后不可更改，请确认信息无误！")) {
					return true;
				} else {
					return false;
				}
			return true;
		}
	</script>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php
}
else{
	include"config.php";
	$s_id=$_COOKIE["userid"];
	$l_reason=$_POST["l_reason"];
	$legal_holiday=$_POST["legal_holiday"];
	$lv_sch_time=$_POST["lv_sch_time"];
	$rt_sch_time=$_POST["rt_sch_time"];
	$l_time=date('Y-m-d H:i:s');
	$sql="SELECT name FROM $sdul_user WHERE id = '$_COOKIE[userid]'";
	$result=$mysqli->query($sql);
	$s_name=$result->fetch_array();
	$sql1="INSERT INTO $sdul_leave(s_id,s_name,l_reason,l_time,legal_holiday,lv_sch_time,rt_sch_time)
					VALUES('$s_id','$s_name[0]','$l_reason','$l_time','$legal_holiday','$lv_sch_time','$rt_sch_time')";
	$result=$mysqli->query($sql1) or die($mysqli->error);
	if($result){
	?>
		<center>
		<meta http-equiv="refresh" content="2;url=check_leave.php">
		信息维护成功！<p>
		2秒后返回
	<?php
	}
}
?>