<center>
<!DOCTYPE>
<html>
  <head>
    <title>SDUL学生信息查询</title>
  </head>
  <body>
    <h1 style = "text-align:center">SDUL学生信息查询</h1>
    <form action="check_s_info.php" method="post">
      <?php
      if(!isset($_COOKIE["userid"]) or $_COOKIE["userid"]=="")
      {
        ?>
        <tr><td>你还没有登录！点<a href="login.php">我</a>登录</td></tr>
        <?php
      }
      else{
        include"config.php";
        $sql="SELECT * FROM $sdul_student";
        $result=$mysqli->query($sql);
        $num=$result->num_rows;
        echo"<table width=\"1250\" bgcolor=\"ffffff\" style=\"border-color;margin:auto\" border=\"1\">";
        echo "<tr><th>学号</th><th>姓名</th><th>性别</th><th>书院</th><th>寝室</th><th>电话</th><th>QQ</th><th>生日</th><th>家庭住址</th><th>监护人姓名</th><th>监护人电话</th><th>操作</th>";
          if($num==0){
            echo "<tr align=center><td colspan='12'>没有记录！</td></tr>";
          }
          else{
            while($row=$result->fetch_array()){
            echo "<tr align=center>";
            echo "<td>".$row["s_id"]."</td>";
            echo "<td>".$row["s_name"]."</td>";
            echo "<td>".$row["s_sex"]."</td>";
            echo "<td>".$row["dorm"]."</td>";
            echo "<td>".$row["broom_id"]."</td>";
            echo "<td>".$row["s_tel"]."</td>";
            echo "<td>".$row["s_qq"]."</td>";
            echo "<td>".$row["bday"]."</td>";
            echo "<td>".$row["addr"]."</td>";
            echo "<td>".$row["parent_name"]."</td>";
            echo "<td>".$row["parent_tel"]."</td>";
            echo "<td>&nbsp;<a href='edit_s_info.php?s_id=".$row["s_id"]."'>维护</a>&nbsp;</td>";
            echo "</tr>";
          }
        }
        echo"<tr align=center><td colspan='12'><a href='index.php'><input type='button' value='返 回'/></a></td></tr></table>";
      }
      ?>
    </form>
  </body>
</html>
</center>
