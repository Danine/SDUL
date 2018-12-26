<center>
<?php
if(!isset($_POST["s_name"]))
{
?>
<!DOCTYPE>
<html>
<head>
<!-- 中文失效再加上<meta http-equiv="Content-Type" content="text/html; charset=utf-8">  -->
<title>SDUL个人信息维护</title>
</head>
<body>
<h1 style = "text-align:center">SDUL个人信息维护</h1>
<form action="edit_info.php" method="post" onsubmit="return empty()">
<?php
if(!isset($_COOKIE["userid"]) or $_COOKIE["userid"]=="")
{
?>
<tr><td>你还没有登录！点<a href="login.php">我</a>登录</td></tr>
<?php
}
else{
?>
<table width="400" bgcolor="ffffff" style="border-color;margin:auto" border="1">
<tr align=center><td>姓 名</td><td><input type="text" name="s_name" id="s_name"></td></tr>
<tr align=center><td>性 别</td><td>	<label>女</label><input type="radio" value="女" name="s_sex" checked>&nbsp;&nbsp;
									<label>男</label><input type="radio" value="男" name="s_sex"></td></tr>
<tr align=center><td>书 院</td><td>	<select name="dorm"><option value="从文书院">从文书院</option>
														<option value="一多书院">一多书院</option></select></td></tr>
<tr align=center><td>寝 室</td><td><input type="text" name="broom_id" id="broom_id"></td></tr>
<tr align=center><td>手 机</td><td><input type="text" name="s_tel" id="s_tel"></td></tr>
<tr align=center><td> Q Q </td><td><input type="text" name="s_qq" id="s_qq"></td></tr>
<tr align=center><td>生 日</td><td><input type="date" value="1998-01-10" name= "bday" id="bday"/></td></tr>
<tr align=center><td>家庭住址</td><td><input type="text" name="addr" id="addr"></td></tr>
<tr align=center><td>监护人姓名</td><td><input type="text" name="parent_name" id="parent_name"></td></tr>
<tr align=center><td>监护人手机</td><td><input type="text" name="parent_tel" id="parent_tel"></td></tr>
<tr align=center><td colspan="2">
<input type="submit" value="完 成"/>&nbsp;
<a href="check_info.php"><input type="button" value="返 回"/></a></td></tr>
</table>
<?php
}
?>
</form>
<script>
function empty(){
	var s_name = document.getElementById("s_name");
	var broom_id = document.getElementById("broom_id");
	var s_tel = document.getElementById("s_tel");
	var s_qq = document.getElementById("s_qq");
	var addr = document.getElementById("addr");
	var parent_name = document.getElementById("parent_name");
	var parent_tel = document.getElementById("parent_tel");

	if(s_name.value == ""){
		alert("请输入姓名！");
		s_name.focus();
		return false;
	}
	if(broom_id.value.length != 4){
		alert("请检查寝室号！(格式如:B203)");
		broom_id.focus();
		return false;
	}
	if(s_tel.value.length != 11){
		alert("请检查您的手机号是否为11位！");
		s_tel.focus();
		return false;
	}
	if(s_qq.value == ""){
		alert("请输入QQ号！");
		s_qq.focus();
		return false;
	}
	if(addr.value == ""){
		alert("请输入家庭地址！");
		addr.focus();
		return false;
	}
	if(parent_name.value == ""){
		alert("请输入监护人姓名！");
		parent_name.focus();
		return false;
	}
	if(parent_tel.value.length != 11){
		alert("请检查监护人手机号是否为11位！");
		parent_tel.focus();
		return false;
	}
	return true;
}
</script>
</body>
</html>
<?php
}
else{
	include"config.php";
	$s_id=$_COOKIE["userid"];
	$s_name=$_POST["s_name"];
	$s_sex=$_POST["s_sex"];
	$dorm=$_POST["dorm"];
	$broom_id=$_POST["broom_id"];
	$s_tel=$_POST["s_tel"];
	$s_qq=$_POST["s_qq"];
	$bday=$_POST["bday"];
	$addr=$_POST["addr"];
	$parent_name=$_POST["parent_name"];
	$parent_tel=$_POST["parent_tel"];
	$sql="	UPDATE $sdul_student
			SET s_name='$s_name',
				s_sex='$s_sex',
				dorm='$dorm',
				broom_id='$broom_id',
				s_tel='$s_tel',
				s_qq='$s_qq',
				bday='$bday',
				addr='$addr',
				parent_name='$parent_name',
				parent_tel='$parent_tel'
			WHERE s_id='$s_id'";
	$re=$mysqli->query($sql) or die($mysqli->error);
	$sql_name="	UPDATE $sdul_user
				SET name='$s_name'
				WHERE id='$s_id'";
	$re2=$mysqli->query($sql_name) or die($mysqli->error);
	$sql_name2="UPDATE $sdul_leave
				SET s_name='$s_name'
				WHERE s_id='$s_id'";
	$re3=$mysqli->query($sql_name2) or die($mysqli->error);
	if($re and $re2 and $re3){
		echo"<meta http-equiv=\"refresh\" content=\"2;url=check_info.php\">";
		echo"信息维护成功！<p>";
		echo"2秒后返回";

	}
}
?>
</center>
