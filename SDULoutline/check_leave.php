<center>
<!DOCTYPE>
<html>
  <head>
    <title>SDUL个人请假信息查询</title>
  </head>
  <body>
    <h1 style = "text-align:center">SDUL个人请假信息查询</h1>
    <form action="check_leave.php" method="post">
      <?php
      if(!isset($_COOKIE["userid"]) or $_COOKIE["userid"]=="")
      {
        ?>
        <tr><td>你还没有登录！点<a href="login.php">我</a>登录</td></tr>
        <?php
      }
      else{
        include"config.php";
        $sql="SELECT * FROM $sdul_leave WHERE s_id='$_COOKIE[userid]'";
        $result=$mysqli->query($sql);
        $num=$result->num_rows;
        ?>
        <table width="1100" bgcolor="ffffff" style="border-color;margin:auto" border="1">
        <tr><th>学号</th><th>姓名</th><th width="20%">请假理由</th><th>请假时间</th><th>节假日</th><th>离校时间</th><th>返校时间</th><th>审核情况</th>
          <?php
          if($num==0){
            ?>
            <tr align=center><td colspan='8'>没有记录！</td></tr>
            <?php
          }
          else{
            while($row=$result->fetch_array()){
              ?>
              <tr align=center>
              <td><?php echo "$row[s_id]";?></td>
              <td><?php echo "$row[s_name]";?></td>
              <td><?php echo "$row[l_reason]";?></td>
              <td><?php echo "$row[l_time]";?></td>
              <td><?php echo "$row[legal_holiday]";?></td>
              <td><?php echo "$row[lv_sch_time]";?></td>
              <td><?php echo "$row[rt_sch_time]";?></td>
              <td><?php echo "$row[review]";?></td>
              </tr>
              <?php
          }
        }
        ?>
        <tr align=center><td colspan='8'><a href='index.php'><input type='button' value='返 回'/></a></td></tr>
        </table>
        <?php
      }
      ?>
    </form>
  </body>
</html>
</center>
