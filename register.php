<center>
<?php
if(!isset($_POST["userid"]))//如果没有输入内容显示表单
{
?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>SDUL注册</title>
!-- Mobile specific metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- Force IE9 to render in normal mode -->
<!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
<meta name="author" content="SuggeElson" />
<meta name="description" content=""
/>
<meta name="keywords" content=""
/>
<meta name="application-name" content="sprFlat admin template" />
<!-- Import google fonts - Heading first/ text second -->
<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,700|Droid+Sans:400,700' />
<!--[if lt IE 9]>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
<link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
<![endif]-->
<!-- Css files -->
<!-- Icons -->
<link href="assets/css/icons.css" rel="stylesheet" />
<!-- jQueryUI -->
<link href="assets/css/sprflat-theme/jquery.ui.all.css" rel="stylesheet" />
<!-- Bootstrap stylesheets (included template modifications) -->
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<!-- Plugins stylesheets (all plugin custom css) -->
<link href="assets/css/plugins.css" rel="stylesheet" />
<!-- Main stylesheets (template main css file) -->
<link href="assets/css/main.css" rel="stylesheet" />
<!-- Custom stylesheets ( Put your own changes here ) -->
<link href="assets/css/custom.css" rel="stylesheet" />
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/img/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/img/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/img/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/img/ico/apple-touch-icon-57-precomposed.png">
<link rel="icon" href="assets/img/ico/favicon.ico" type="image/png">
<!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
<meta name="msapplication-TileColor" content="#3399cc" />
</head>
<body>
<h1 style = "text-align:center">注册</h1>
<form action="register.php" method="post" onsubmit="return empty()">
<table width="400" bgcolor="ffffff" style="border-color;margin:auto" border="1">
<tr align=center><td>学号/工号</td><td><input type="text" name="userid" id="userid"onkeyup="numb()"><span id="zishu"></span></td></tr>
<tr align=center><td>姓 名</td><td><input type="text" name="name" id="name"></td></tr>
<tr align=center><td>密 码</td><td><input type="password" name="pass" id="password"></td></tr>
<tr align=center><td>确认密码</td><td><input type="password" name="pass" id="confirm" onkeyup="cfm()"><span id="tishi"></span></td></tr>
<tr align=center><td colspan="2">
<input type="submit" value="完 成"/>&nbsp;
<input type="reset" value="重 置"/></td></tr>
<div class="tab-pane fade" id="register">
		<form class="form-horizontal mt20" action="#" id="register-form" role="form">
				<div class="form-group">
						<div class="col-lg-12">
								<!-- col-lg-12 start here -->
								<input id="email1" name="email" type="email" class="form-control left-icon" placeholder="Type your email">
								<i class="ec-mail s16 left-input-icon"></i>
						</div>
						<!-- col-lg-12 end here -->
				</div>
				<div class="form-group">
						<div class="col-lg-12">
								<!-- col-lg-12 start here -->
								<input type="password" class="form-control left-icon" id="password1" name="password" placeholder="Enter your password">
								<i class="ec-locked s16 left-input-icon"></i>
						</div>
						<!-- col-lg-12 end here -->
						<div class="col-lg-12 mt15">
								<!-- col-lg-12 start here -->
								<input type="password" class="form-control left-icon" id="confirm_password" name="confirm_passowrd" placeholder="Repeat password">
								<i class="ec-locked s16 left-input-icon"></i>
						</div>
						<!-- col-lg-12 end here -->
				</div>
				<div class="form-group">
						<div class="col-lg-12">
								<!-- col-lg-12 start here -->
								<button class="btn btn-success btn-block">Register</button>
						</div>
						<!-- col-lg-12 end here -->
				</div>
		</form>
</div>
</table>
</form>

<script>
function cfm(){
	var password = document.getElementById("password").value;
	var confirm = document.getElementById("confirm").value;
	if(password == confirm){
		document.getElementById("tishi").innerHTML="<font color='green'>√</font>";
		document.getElementById("submit").disabled = false;
	}
	else{
		document.getElementById("tishi").innerHTML="<font color='red'>×</font>";
		document.getElementById("submit").disabled = true;
	}
}
function numb(){
	var userid = document.getElementById("userid").value;
	if(userid.length==12){
		document.getElementById("zishu").innerHTML="<font color='green'>√</font>";
		document.getElementById("submit").disabled = false;
	}
	else{
		document.getElementById("zishu").innerHTML="<font color='red'>×</font>";
		document.getElementById("submit").disabled = true;
	}
}
function empty(){
	var userid = document.getElementById("userid");
	var password = document.getElementById("password");
	var confirm = document.getElementById("confirm");
	if(userid.value.length != 12){
		alert("请检查id是否为12位！");
		userid.focus();
		return false;
	}
	if(password.value == ""){
		alert("请输入密码");
		password.focus();
		return false;
	}
	if(password.value != confirm.value){
		alert("两次密码不一致");
		confirm.focus();
		return false;
	}
	return true;
}
</script>
</body>
</html>
<?php
}
else//如果有输入内容则进行后台操作
{
	include "config.php";
	$userid=$_POST["userid"];
	$pass=$_POST["pass"];
	$name=$_POST["name"];
	$sql="SELECT * FROM $sdul_user WHERE id = '$userid'";
	$result=$mysqli->query($sql);
	$num=$result->num_rows;
	// var_dump($result);
	// var_dump($num);
	if($num>0){
		echo"Already exists!<p>";
		echo"click <a href='register.php'>here</a> to register";
	}
	else{
		$sql="INSERT INTO $sdul_user (id,pass,name,admin) VALUES('$userid','$pass','$name',0)";
		$result=$mysqli->query($sql) or die($mysqli->error);
		$sql_s_id="INSERT INTO $sdul_student (s_id,s_name) VALUES('$userid','$name')";
		$mysqli->query($sql_s_id);
		if($result){
			echo"success!<p>";
			echo"click <a href='login.php'>here</a> to login";
		}
	}
}
?>
</center>
