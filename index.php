<?php
    include("head_line.inc.php");
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
    <head>
        <style>
        html {
            height: 100%;
        }

        body {
            /*background-image: url(pic/sketch-1474715249780.png);*/
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        }
    </style>
    </head>
    <body>
        <form name="form" method="post" action="connect.php">
            帳號：<input type="text" name="id" /><br>
            密碼：<input type="password" name="pw" /><br><br>
            <input type="submit" value="登入" name="button" style="width:80px;height:30px;border:2px blue none;color:#fff;background: #000;text-align: center;"  onclick="return CheckFunc();">
            <a href="register.php">還沒有帳號？快來註冊吧！</a><br><br><br>
            
            <!--帳號：<input type="text" name="id2" /><br>-->
            <!--密碼：<input type="password" name="pw2" /><br><br>-->
            管理密碼：<input type="password" name="pw_admin" /><br><br>
            <input type="submit" value="管理員登入" name="button_admin" style="width:120px;height:30px;border:2px blue none;color:#fff;background: #000;text-align: center;"  onclick="return CheckFunc2();">
        </form>
         <script>
            function CheckFunc() {
                msg = "";
                if(document.forms[0].id.value == "") msg = "請輸入帳號";
                else if(document.forms[0].pw.value == "") msg = "請輸入密碼";
                else return true;
                alert(msg);
                return false;
            }
            function CheckFunc2() {
                msg = "";
                if(document.forms[0].id.value == "") msg = "請輸入帳號";
                else if(document.forms[0].pw.value == "") msg = "請輸入密碼";
                else if(document.forms[0].pw_admin.value == "") msg = "請輸入管理密碼";
                else return true;
                alert(msg);
                return false;
            }
        </script>
    </body>
</html>