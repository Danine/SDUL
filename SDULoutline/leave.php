<center>
<?php
if(!isset($_POST["l_reason"]))
{
?>
<!DOCTYPE>
<html>
<head>
<title>SDUL学生请假表</title>
</head>
<body>
<h1 style = "text-align:center">SDUL学生请假表</h1>
<form action="leave.php" method="post" onsubmit="return empty()">
<?php
if(!isset($_COOKIE["userid"]) or $_COOKIE["userid"]=="")
{
?>
<tr><td>你还没有登录！点<a href="login.php">我</a>登录</td></tr>
<?php
}
else{
?>
<table width="450" bgcolor="ffffff" style="border-color;margin:auto" border="1">
<tr align=center><td>请假理由</td><td><textarea placeholder="在这里输入请假理由..." cols="50" rows="10" name="l_reason" id="l_reason"></textarea></td></tr>
<tr align=center><td>法定假日</td><td>	<label>是</label><input type="radio" value="是" name="legal_holiday">&nbsp;&nbsp;
										<label>否</label><input type="radio" value="否" name="legal_holiday" checked></td></tr>
<tr align=center><td>离校时间</td><td><input type="datetime-local" name= "lv_sch_time" id="lv_sch_time"/></td></tr>
<tr align=center><td>返校时间</td><td><input type="datetime-local" name= "rt_sch_time" id="rt_sch_time"/></td></tr>

<tr align=center><td colspan="2">
<input type="submit" value="提 交"/>&nbsp;
<a href="index.php"><input type="button" value="返 回"/></a></td></tr>
</table>
<?php
}
?>
</form>
<script>
 function empty(){
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
		echo"提交成功！等待老师审核<p>";
		echo"点<a href='index.php'>我</a>返回";
	}
}
?>
</center>
