<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("head_line.inc.php");
include("mysql_connect.inc.php");

$Id =  mysqli_real_escape_string($conn,$_POST["id"]);
$psw =  mysqli_real_escape_string($conn,$_POST["pw"]);
$psw2 =  mysqli_real_escape_string($conn,$_POST["pw2"]);
$fname =  mysqli_real_escape_string($conn,$_POST["fname"]);
$lname = mysqli_real_escape_string($conn,$_POST["lname"]);
$email = mysqli_real_escape_string($conn,$_POST["email"]);
$birth =  mysqli_real_escape_string($conn,$_POST["birth"]);
$sex =  mysqli_real_escape_string($conn,$_POST["gender"]);

if($sex == "female") $gen = 'F';
if($sex == "male") $gen = 'M';
if($sex == "other") $gen = 'O';

//Et toi, 你 ㄍㄧㄣ ㄋㄚ ㄌㄧ dinner なにを eat?
//那你呢，你今天晚餐吃什麼？

//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if($Id != null && $psw != null && $psw2 != null && $psw == $psw2) {
        //新增資料進資料庫語法
        $hash = password_hash($psw , PASSWORD_DEFAULT);
        //$sql = "insert into user (username, password, telephone, address, other) values ('$id', '$pw', '$telephone', '$address', '$other')";
        $sql = "INSERT INTO `user` (Idx, ID, Fname, Lname, Password, Email, Birthday, Gender) VALUES ('', '$Id', '$fname', '$lname', '$hash', '$email', '$birth', '$gen')";
        if(mysqli_query($conn, $sql)) {
            //echo '新增成功!';
            echo "<img src = './pic/REGsuccess.png' width='90%' style='display:block; margin:auto;'>";
            echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
        else {
            //echo '新增失敗!';
            echo "<img src = './pic/REGFaild.png' width='90%' style='display:block; margin:auto;'>";
            echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
}
else {
    //echo '您無權限觀看此頁面!';
    echo "<img src = './pic/REGFaild.png' width='90%' style='display:block; margin:auto;'>";
    echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        //echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>