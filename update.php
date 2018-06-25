<?php session_start();
    include("mysql_connect.inc.php");
    include("head_line.inc.php");
    if(!empty($_SESSION['admin'])) include("head_admin.inc.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<html>
    <head>
        <style>
            .e {
                font-family:Arial;
            }
        </style>
    </head>
    <body>
        <?php
            echo "<br><br>";
            echo "<img src = './pic/profile.png' width='90%' style='display:block;top:500px; width: 1000px; position: center;margin:auto;'>";
            if($_SESSION['ID'] != null) {
                $id = $_SESSION['ID'];
                $sql = "SELECT * FROM user where ID = '$id'";
                $result = mysqli_query($conn, $sql);
                $res = mysqli_fetch_row($result);
                //echo $res['ID'];
                ?>
                <br><br><br><br>
                <form name='form' method='post' action='update_finish.php' style='top:200px;left:40%;position:absolute;'>
                    <font color='red'>* </font>原本的密碼&nbsp;&nbsp;&nbsp;&nbsp; > <input type='password' name='pw_old' /><br><br>
                    密碼&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; > <input type='password' id='pw' name='pw' /><br><br>
                    再一次輸入密碼&nbsp;&nbsp; > <input type='password' id='pw2' name='pw2' onkeyup="validate()"/><span id="distinct"></span><br><br>
                    <input type='submit' name='button_ps' value='更改密碼' style="width:100px;height:30px;border:2px blue none;color:#fff;background: #000;position:absolute;left:200px; "  onclick="return CheckFuncPS();"><br><br><br>
                    
                    目前的信箱：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "<font class='e' color='black'>".$res[5]."</font><br>";?><br>
                    電子信箱&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; > <input type='text' name='email' /><br><br>
                    <input type='submit' name='button_em' value='更改信箱' style="width:100px;height:30px;border:2px blue none;color:#fff;background: #000;position:absolute;left:200px; " onclick="return CheckFuncEM();">
                </form>
            <?php
            }
            else {
                echo '<br><br><br><br>您無權限觀看此頁面!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
            }
        ?>
        <script>
            function CheckFuncPS() {
                msg = "";
                if(document.forms[0].pw_old.value == "") msg = "請輸入原本的密碼"
                else if(document.forms[0].pw.value == "") msg = "請輸入密碼";
                else if(document.forms[0].pw2.value == "") msg = "請再次確認密碼";
                else return true;
                alert(msg);
                return false;
            }
            function CheckFuncEM() {
                msg = "";
                if(document.forms[0].pw_old.value == "") msg = "請輸入原本的密碼"
                else if(document.forms[0].email.value == "") msg = "請輸入電子信箱";
                else if(document.forms[0].email.value.indexOf("@") < 1) msg = "電子信箱格式錯誤";
                else return true;
                alert(msg);
                return false;
            }
        </script>
        <script>
          function validate() {
              var pw1 = document.getElementById("pw").value;
              var pw2 = document.getElementById("pw2").value;
              if(pw1 == pw2) {
                  document.getElementById("distinct").innerHTML="<font color='green'>兩次輸入相同</font>";
                  document.getElementById("submit").disabled = false;
              }
              else {
                  document.getElementById("distinct").innerHTML="<font color='red'>兩次輸入不相同</font>";
                  document.getElementById("submit").disabled = true;
              }
          }
      </script>
    </body>
</html>
