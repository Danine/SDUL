<?php
	if(!isset($_POST["userid"]))//如果没有输入内容显示表单
{
?>
<!DOCTYPE>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>SDUL注册</title>
	<link href="css/bootstrap-theme.css" rel="stylesheet">
	<link href="css/elegant-icons-style.css" rel="stylesheet">
	<link href="css/style1.css" rel="stylesheet">
</head>

<body class="login-img3-body">
<div class="container">
	<form action="register.php" method="post" onsubmit="return empty()" class="login-form">
		<div class="login-wrap">
		<p class="login-img"><a> <img width="255" height="55" src="http://bkjws.sdu.edu.cn/res/ui/metronic/image/sd_logo.png"
							alt="Logo"></a></p>
			<div class="input-group">
				<span class="input-group-addon"><i class="icon_profile"></i></span>
				<input type="text" name="userid" id="userid" onkeyup="numb()" class="form-control" placeholder="User-ID" autofocus><span id="zishu"></span>
			</div>
			<!-- <tr align=center>
				<td>学号/工号</td>
				<td><input type="text" name="userid" id="userid" onkeyup="numb()"><span id="zishu"></span></td>
			</tr> -->
			<div class="input-group">
				<span class="input-group-addon"><i class="icon_profile"></i></span>
				<input type="text" name="name" id="name" class="form-control" placeholder="UserName" autofocus>
			</div>
			<!-- <tr align=center>
				<td>姓 名</td>
				<td><input type="text" name="name" id="name"></td>
			</tr> -->
			<div class="input-group">
				<span class="input-group-addon"><i class="icon_key_alt"></i></span>
				<input type="password" name="pass" id="password" class="form-control" placeholder="Password">
			</div>
			<!-- <tr align=center>
				<td>密 码</td>
				<td><input type="password" name="pass" id="password"></td>
			</tr> -->
			<div class="input-group">
				<span class="input-group-addon"><i class="icon_key_alt"></i></span>
				<input type="password" name="pass" id="confirm" onkeyup="cfm()" class="form-control" placeholder="Confirm Password"><span id="tishi"></span>
			</div>
			<!-- <tr align=center>
				<td>确认密码</td>
				<td><input type="password" name="pass" id="confirm" onkeyup="cfm()"><span id="tishi"></span></td>
			</tr> -->
			<button class="btn btn-primary btn-lg btn-block" type="submit">Create</button>
			<a href="login.php"><button class="btn btn-info btn-lg btn-block" type="button">Return</button></a>
			<!-- <tr align=center>
				<td colspan="2">
					<input type="submit" value="完 成" />&nbsp;
					<input type="reset" value="重 置" /></td>
			</tr> -->
		</div>
	</form>
</div>
	<script>
		function cfm() {
			var password = document.getElementById("password").value;
			var confirm = document.getElementById("confirm").value;
			if (password == confirm) {
				document.getElementById("tishi").innerHTML = "<font color='green'>√</font>";
				document.getElementById("submit").disabled = false;
			} else {
				document.getElementById("tishi").innerHTML = "<font color='red'>×</font>";
				document.getElementById("submit").disabled = true;
			}
		}

		function numb() {
			var userid = document.getElementById("userid").value;
			if (userid.length == 12) {
				document.getElementById("zishu").innerHTML = "<font color='green'>√</font>";
				document.getElementById("submit").disabled = false;
			} else {
				document.getElementById("zishu").innerHTML = "<font color='red'>×</font>";
				document.getElementById("submit").disabled = true;
			}
		}

		function empty() {
			var userid = document.getElementById("userid");
			var password = document.getElementById("password");
			var confirm = document.getElementById("confirm");
			if (userid.value.length != 12) {
				alert("请检查id是否为12位！");
				userid.focus();
				return false;
			}
			if (password.value == "") {
				alert("请输入密码");
				password.focus();
				return false;
			}
			if (password.value != confirm.value) {
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