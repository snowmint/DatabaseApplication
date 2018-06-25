<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
    include("mysql_connect.inc.php");
    include("blue_head.inc.php");

    $text = $_POST["comment"];
    $id = $_POST["myid"]; //from session id
    $pid = $_POST["post_id"];//from hidden post
    //$currentPage = $_POST["currentState"];

    date_default_timezone_set('Asia/Taipei');
    $date = date("Y-m-d H:i:s");

    if($text != null) {
        $sql = "INSERT INTO `comment` (`CommentIndex`, `UserID`, `Time`, `Text`, `LikeNum`, `PostIndex`) VALUES ('', '$id', '$date', '$text', 0, '$pid')";
        if(mysqli_query($conn, $sql)) {
            //exit();
            
            //echo "<img src = './pic/Commentsuccess.png' width='90%' style='display:block; margin:auto;'>";
            //echo "<meta http-equiv=REFRESH CONTENT=1;url='view_article.php'>";
        }
        else {
            echo "Faild!";
            exit();
        }
    }
?>