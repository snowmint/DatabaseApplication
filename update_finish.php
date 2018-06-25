<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
include("head_line.inc.php");

$pswold = mysqli_real_escape_string($conn,$_POST["pw_old"]);
$check = $_SESSION['PS'];
$id = $_SESSION['ID'];

if($_POST['button_em'] != null) {
    $mail = $_POST["email"];
    if($_SESSION['ID'] != null && password_verify($pswold, $check) ) {
        if($mail != null) {
            //echo $mail;
            //exit();
            $sql = "UPDATE user SET Email = '$mail' WHERE ID = '$id'";
            mysqli_query($conn, $sql);
            echo "<img src = './pic/MODDsuccess.png' width='90%' style='display:block; margin:auto;'>";
            echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
            session_unset();
        }
    }
    else{
        echo "<img src = './pic/MODDFaild.png' width='90%' style='display:block; margin:auto;'>";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        session_unset();
    }
}

else if($_POST['button_ps'] != null) {
    $psw = mysqli_real_escape_string($conn,$_POST["pw"]);
    $new = password_hash($psw , PASSWORD_DEFAULT);
    $psw2 = mysqli_real_escape_string($conn,$_POST["pw2"]);
    
    if($_SESSION['ID'] != null && password_verify($pswold, $check) && $psw != null && $psw2 != null && $psw == $psw2) {
            $sql = "UPDATE user SET Password = '$new' WHERE ID = '$id'";
            if(mysqli_query($conn,$sql)) {
                echo "<img src = './pic/MODDsuccess.png' width='90%' style='display:block; margin:auto;'>";
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
                session_unset();
            }
            else {
                echo "<img src = './pic/MODDFaild.png' width='90%' style='display:block; margin:auto;'>";
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
                session_unset();
            }
    }
    else{
        echo "<img src = './pic/MODDFaild.png' width='90%' style='display:block; margin:auto;'>";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        session_unset();
    }

}
?>