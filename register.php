<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("head_line.inc.php");
include("mysql_connect.inc.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
    <body>
        <form name="form" method="post" action="register_finish.php">
            帳號：　　　　　　<input type="text" name="id" /> <br><br>
            密碼：　　　　　　<input type="password" id='pw' name="pw" /> <br><br>
            再一次輸入密碼：　<input type="password" id='pw2' name="pw2" onkeyup="validate()"/><span id="distinct"></span><br><br>
            名字：　　　　　　<input type="text" name="fname" /> <br><br>
            姓氏：　　　　　　<input type="text" name="lname" /> <br><br>
            電子信箱：　　　　<input type="text" name="email" /> <br><br>
            生日：　　　　　　<input type = "date" name="birth"/> <br><br>
            性別：　　　　　　<input type="radio" name="gender" value="female"/> Female
            <input type="radio" name="gender" value="male"/> Male
            <input type="radio" name="gender" value="other"/> Other<br><br>
            <input id='submit' name = "button" type="submit" value="確定" style="width:120px;height:40px;border:2px blue none;color:#fff;background: #000;position:absolute;right:10px; " onclick="return CheckFunc();">
        </form>
        <script>
            function CheckFunc() {
                msg = "";
                if(document.forms[0].id.value == "") msg = "請輸入帳號";
                else if(document.forms[0].pw.value == "") msg = "請輸入密碼";
                else if(document.forms[0].pw2.value == "") msg = "請再次確認密碼";
                else if(document.forms[0].email.value == "") msg = "請輸入電子信箱";
                else if(document.forms[0].email.value.indexOf("@") < 1) msg = "電子信箱格式錯誤";
                else if(document.forms[0].birth.value == "") msg = "請輸入生日";
                else if(document.forms[0].gender.value == "") msg = "請選擇性別";
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