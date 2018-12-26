<center>
  <!DOCTYPE>
  <html>
  <head>
    <!-- 中文失效再加上<meta http-equiv="Content-Type" content="text/html; charset=utf-8">  -->
    <title>SDUL个人信息查询</title>
  </head>
  <body>
    <h1 style = "text-align:center">SDUL个人信息查询</h1>
    <form action="edit_info.php" method="post">
      <?php
      if(!isset($_COOKIE["userid"]) or $_COOKIE["userid"]=="")
      {
        ?>
        <tr><td>你还没有登录！点<a href="login.php">我</a>登录</td></tr>
        <?php
      }
      else{
        include"config.php";
        $sql="SELECT * FROM $sdul_student WHERE s_id='$_COOKIE[userid]'";
        $result=$mysqli->query($sql);
        $row=$result->fetch_array();
        echo"<table width=\"400\" bgcolor=\"ffffff\" style=\"border-color;margin:auto\" border=\"1\">";
        echo"<tr align=center><td>姓 名</td><td>".$row["s_name"]."</td></tr>";
        echo"<tr align=center><td>性 别</td><td>".$row["s_sex"]."</td></tr>";
        echo"<tr align=center><td>书 院</td><td>".$row["dorm"]."</td></tr>";
        echo"<tr align=center><td>寝 室</td><td>".$row["broom_id"]."</td></tr>";
        echo"<tr align=center><td>手 机</td><td>".$row["s_tel"]."</td></tr>";
        echo"<tr align=center><td> Q Q </td><td>".$row["s_qq"]."</td></tr>";
        echo"<tr align=center><td>生 日</td><td>".$row["bday"]."</td></tr>";
        echo"<tr align=center><td>家庭住址</td><td>".$row["addr"]."</td></tr>";
        echo"<tr align=center><td>监护人姓名</td><td>".$row["parent_name"]."</td></tr>";
        echo"<tr align=center><td>监护人手机</td><td>".$row["parent_tel"]."</td></tr>";
        echo"<tr align=center><td colspan='2'>
        <a href='edit_info.php'><input type='button' value='维 护'/></a>&nbsp;
        <a href='index.php'><input type='button' value='返 回'/></a></td></tr></table>";
      }
      ?>
    </form>

  </body>
  </html>
</center>
