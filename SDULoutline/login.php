<center>
<?php
if(!isset($_POST["userid"])){
	echo "<center>";
	?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>SDUL学生请假系统</title>
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
<body>
<h1 style="text-align:center">登录</h1>

<div class="w">
		<!-- BEGIN LOGO -->
		<div class="logo">
			<a> <img width="255" height="55" src="http://bkjws.sdu.edu.cn/res/ui/metronic/image/sd_logo.png" alt="Logo"></a>
		</div>
	</div>

<form action="login.php" method="post" onsubmit="return r()">
<table width="350" bgcolor="ffffff" style="border-color;margin:auto" border="1">
<tr align=center>
<td>学号/工号</td><td><input type="text" name="userid" id="userid"></td>
</tr>
<tr align=center><td>密 码</td><td><input type="password" name="pass" id="password"></td></tr>
<tr align=center><td colspan="2">
<input type="submit" value="登 录" />&nbsp;

<a href ="register.php"><input type="button" value="注 册"/></a>&nbsp;
<input type="reset" value="重 置"/></td></tr>
</table>
</form>
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
</center>
