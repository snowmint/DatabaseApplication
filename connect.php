<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->

<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
include("head_line.inc.php");
include("mysql_connect.inc.php");
mysqli_query($conn, "SET NAMES utf8");
$id = mysqli_real_escape_string($conn, $_POST['id']);
$pw = mysqli_real_escape_string($conn, $_POST['pw']);
$sql = "SELECT * FROM user where ID = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);


$ch = '$2y$10$GnTzWKFrQoWVrbdsKzCuteUMoPWE.urPrDfZluN0mbSmbi2xrWIym';
if($_POST['button_admin'] != null && password_verify($_POST['pw_admin'], $ch)) {
    //$2y$10$GnTzWKFrQoWVrbdsKzCuteUMoPWE.urPrDfZluN0mbSmbi2xrWIym
    $_SESSION['ID'] = $id;
    $_SESSION['PS'] = $row[4];
    if($id != null && $pw != null && $row[1] == $id && password_verify($pw, $row[4])) { //$row[4] == $hash
        $_SESSION['admin'] = $_POST['pw_admin'];
        echo "<img src = './pic/lloginsuccess.png' width='90%' style='display:block; margin:auto;'>";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=delete.php>';
    }
    else {
        echo "<img src = './pic/lloginFaild.png' width='90%' style='display:block; margin:auto;'>";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
    }
}
else if($_POST['pw_admin'] != null && !password_verify($_POST['pw_admin'], $ch)) {
    echo "<img src = './pic/lloginFaild.png' width='90%' style='display:block; margin:auto;'>";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
else if($_POST['button'] != null){
    if($id != null && $pw != null && $row[1] == $id && password_verify($pw, $row[4])) { //$row[4] == $hash
            //將帳號寫入session，方便驗證使用者身份
        
        //echo "$row[3] $row[2] <br>";
        //echo '登入成功!';
        //echo "<script>alert('$id $row[1] $row[4]');</script>";
        echo "<img src = './pic/lloginsuccess.png' width='90%' style='display:block; margin:auto;'>";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=Top.php>';
    }
    else {
            //echo "<script>alert('$id $row[1] $row[4]');</script>";
            echo "<img src = './pic/lloginFaild.png' width='90%' style='display:block; margin:auto;'>";
            echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
    }
}
?>