<?php
	if(!isset($_POST["userid"])){
?>
<!DOCTYPE php>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>SDUL学生信息系统</title>
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<link href="css/elegant-icons-style.css" rel="stylesheet">
		<link href="css/style1.css" rel="stylesheet">

		<script>
			function r(){
				var userid = document.getElementById("userid");
				var pass = document.getElementById("password");
				if(userid.value == ""){
					alert("请输入用户名");
					userid.focus();
					return false;
				}
				if(pass.value == ""){
					alert("请输入密码");
					pass.focus();
					return false;
				}
				return true;
			}
		</script>
	</head>

	<body class="login-img3-body">

		<div class="container">

			<form action="login.php" method="post" onsubmit="return r()" class="login-form">
				<div class="login-wrap">
					<p class="login-img"><a> <img width="255" height="55" src="http://bkjws.sdu.edu.cn/res/ui/metronic/image/sd_logo.png"
							 alt="Logo"></a></p>
					<div class="input-group">
						<span class="input-group-addon"><i class="icon_profile"></i></span>
						<input type="text" name="userid" id="userid" class="form-control" placeholder="Username" autofocus>
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="icon_key_alt"></i></span>
						<input type="password" name="pass" id="password" class="form-control" placeholder="Password">
					</div>
					<label class="checkbox">
						<input type="checkbox" value="remember-me"> Remember me
						<span class="pull-right"> <a href="#"> Forgot Password?</a></span>
					</label>
					<button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
					<a href="register.php"><button class="btn btn-info btn-lg btn-block" type="button">Signup</button></a>
				</div>
			</form>

		</div>
	</body>
</html>
<?php
	}
	else
	{						//如果有输入内容执行操作
		include "config.php";
		$userid=$_POST["userid"];
		$pass=$_POST["pass"];
		$sql="SELECT id,name FROM $sdul_user WHERE id='$userid' AND pass='$pass'";
		$result=$mysqli->query($sql);
		$row=mysqli_fetch_row($result);//获取数据库中本id行的内容
		$num=$result->num_rows;
		if($num==0){
			echo"WRONG id or password.<p>";
			echo"click <a href='login.php'>here</a> to relogin";
		}
		else{
			setcookie("userid",$userid);
			echo"Welcome, $row[1]<p>";
			echo"click <a href='index.php'>here</a> to enter";
		}
	}
?>