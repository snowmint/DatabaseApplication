<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//資料庫設定
//資料庫位置
$db_server = "localhost";
//資料庫名稱
$db_name = "beta";
//資料庫管理者帳號
$db_user = "root";
//資料庫管理者密碼
$db_passwd = "tdhudinm0437";

//對資料庫連線
$conn = mysqli_connect($db_server,$db_user,$db_passwd,$db_name);
//資料庫連線採UTF8
mysqli_query($conn,"SET NAMES 'UTF8'");

//選擇資料庫
/*if(!@mysql_select_db($db_name))
        die("無法使用資料庫");
*/?>