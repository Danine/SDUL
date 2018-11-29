<?php
$host_name="localhost";			//服务器名
$host_user="root";				//连接服务器的用户名
$host_pass="";					//连接服务器的密码
$db_name="sdul";				//服务器上的可用数据库
$sdul_user="user";				//用户表名称
$sdul_dorm="drom";				//宿舍表名称
$sdul_institute="institute";	//学院表名称
$sdul_leave="leave_form";			//请假表名称
$sdul_student="student";		//学生表名称
$mysqli=new mysqli($host_name,$host_user,$host_pass,$db_name);//定义对象
$mysqli->query("set names'utf8'");//设置编码为中文
?>
