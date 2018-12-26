<?php
echo"<center>";
echo"<h1>欢迎使用SDUL学生请假系统</h1>";
// var_dump($_COOKIE["userid"]);
if(!isset($_COOKIE["userid"]) or $_COOKIE["userid"]==""){//如果没有登录
	echo"你还没有登录！<p>";
	echo"<a href='login.php'>登录</a>&nbsp;&nbsp;&nbsp;<a href='register.php'>注册</a>";
}
else{
	include"config.php";
	$sql="SELECT admin,id,name FROM $sdul_user WHERE id='$_COOKIE[userid]'";
	$result=$mysqli->query($sql);
	$admin=$result->fetch_array();
	echo"$admin[2]($admin[1])";
	echo"<p>";
	if($admin[0]==0){
		echo"<p>点<a href='check_info.php'>我</a>查看资料<p>";
		echo"<p>点<a href='leave.php'>我</a>进行请假<p>";
		echo"<p>点<a href='check_leave.php'>我</a>查询记录<p>";
	}else if($admin[0]==1){
		echo"您好，尊敬的老师";
		echo"<p>点<a href='check_s_info.php'>我</a>查看并维护学生信息<p>";
		echo"<p>点<a href='check_s_leave.php'>我</a>查看并维护学生请假信息<p>";
	}else{
		echo"您好，尊敬的宿舍管理员，但是您什么权限都还没有";
	}
	// echo"<p>点<a href='edit_pass.php'>我</a>修改密码<p>";
	echo"<p>点<a href='exit.php'>我</a>退出登录<p>";
}
?>
