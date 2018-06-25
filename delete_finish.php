<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
if(!empty($_SESSION['admin'])) include("head_admin.inc.php");

$id =  mysqli_real_escape_string($conn,$_POST['choose']);
//echo $id;
if($_SESSION['admin'] != null && $_SESSION['ID'] != null && !empty($_POST['button_em'])) {
    $sql = "DELETE U.*
            FROM user AS U
            WHERE U.ID = '$id'";
    
    if(mysqli_query($conn, $sql)) {
        //echo '刪除成功!';
        echo "<img src = './pic/DELsuccess.png' width='90%' style='display:block; margin:auto;'>";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=delete.php>';
    }
    else {
        //echo '刪除失敗!';
        echo "<img src = './pic/DELFaild.png' width='90%' style='display:block; margin:auto;'>";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=delete.php>';
    }
}
//delete comment ==============================================================================
if($_SESSION['admin'] != null && $_SESSION['ID'] != null && !empty($_POST['button_co'])) {
    $sql = "DELETE C.*
            FROM comment AS C
            WHERE C.CommentIndex = '$id'";
    
    if(mysqli_query($conn, $sql)) {
        //echo '刪除成功!';
        echo "<img src = './pic/DELsuccess.png' width='90%' style='display:block; margin:auto;'>";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=delete.php>';
    }
    else {
        //echo '刪除失敗!';
        echo "<img src = './pic/DELFaild.png' width='90%' style='display:block; margin:auto;'>";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=delete.php>';
    }
}
//delete post ==============================================================================
if($_SESSION['admin'] != null && $_SESSION['ID'] != null && !empty($_POST['button_po'])) {
    $sql = "DELETE P.*
            FROM post AS P
            WHERE P.PostIndex = '$id'";
    
    if(mysqli_query($conn, $sql)) {
        //echo '刪除成功!';
        echo "<img src = './pic/DELsuccess.png' width='90%' style='display:block; margin:auto;'>";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=delete.php>';
    }
    else {
        //echo '刪除失敗!';
        echo "<img src = './pic/DELFaild.png' width='90%' style='display:block; margin:auto;'>";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=delete.php>';
    }
}
//delete reply ==============================================================================
if($_SESSION['admin'] != null && $_SESSION['ID'] != null && !empty($_POST['button_re'])) {
    $sql = "DELETE CR.*
            FROM comment_reply AS CR
            WHERE CR.comment_reply_index = '$id'";
    
    if(mysqli_query($conn, $sql)) {
        //echo '刪除成功!';
        echo "<img src = './pic/DELsuccess.png' width='90%' style='display:block; margin:auto;'>";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=delete.php>';
    }
    else {
        //echo '刪除失敗!';
        echo "<img src = './pic/DELFaild.png' width='90%' style='display:block; margin:auto;'>";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=delete.php>';
    }
}
/*DELETE U.*, P.*, RI.*, RR.*, C.* FROM user AS U JOIN post AS P ON U.ID = P.UserID JOIN rating_info AS RI ON U.ID = RI.UserID JOIN rating_record AS RR ON U.Idx = RR.UserIndex JOIN comment AS C ON U.ID = C.UserID WHERE U.ID = 'xxx'*/
?>