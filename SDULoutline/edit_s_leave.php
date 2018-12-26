<center>
  <?php
  if(!isset($_POST["caozuo"]))
  {
    ?>
    <!DOCTYPE>
    <html>
    <head>
      <title>SDUL学生请假信息查询</title>
    </head>
    <body>
      <h1 style = "text-align:center">SDUL个人请假信息查询</h1>
      <form action="edit_s_leave.php" method="post" onsubmit="return empty()">
        <input type="hidden" value=<?php $form_num=$_GET["form_num"];echo "$form_num";?> name="form_num"/>
        <?php
        if(!isset($_COOKIE["userid"]) or $_COOKIE["userid"]=="")
        {
          ?>
          <tr><td>你还没有登录！点<a href='login.php'>我</a>登录</td></tr>
          <?php
        }
        else{
          include"config.php";
          $sql="SELECT * FROM $sdul_leave WHERE form_num='$form_num'";
          $result=$mysqli->query($sql);
          $num=$result->num_rows;
          ?>
          <table width="1250" bgcolor="ffffff" style="border-color;margin:auto" border="1">
          <tr><th>学号</th><th>姓名</th><th width="20%">请假理由</th><th>请假时间</th><th>节假日</th><th>离校时间</th><th>返校时间</th><th>审核情况</th><th>操作</th>
          <?php
          if($num==0){
            ?>
            <tr align=center><td colspan='9'>没有记录！</td></tr>
            <?php
          }
          else{
            $row=$result->fetch_array();
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
            <td><select name="caozuo" id="caozuo"><option value="">---</option>
                                      <option value="同意">同意</option>
                                      <option value="不同意">不同意</option></td>
            </tr>
            <?php
          }
          ?>
          <tr align=center><td colspan='9'><input type='submit' value='完 成'/>&nbsp;&nbsp;<a href='check_s_leave.php'><input type='button' value='返 回'/></a></td></tr>
          </table>
          <?php
        }
        ?>
      </form>
      <script>
      function empty(){
        var caozuo = document.getElementById("caozuo");
        if(caozuo.value == ""){
          alert("请进行操作！");
          caozuo.focus();
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
    $form_num=$_POST["form_num"];
    $caozuo=$_POST["caozuo"];
    $sql="UPDATE $sdul_leave
    SET review='$caozuo'
    WHERE form_num='$form_num'";
    $re=$mysqli->query($sql) or die($mysqli->error);
    if($re){
      echo"<meta http-equiv=\"refresh\" content=\"2;url=check_s_leave.php\">";
      // echo "$form_num";
      echo"信息维护成功！<p>";
      echo"2秒后返回";
    }else{
      echo"error";
    }
  }
  ?>
</center>
