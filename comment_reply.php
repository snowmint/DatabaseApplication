<?php
    $conn = mysqli_connect('localhost', 'root','tdhudinm0437','beta');
    mysqli_query($conn,"SET NAMES 'UTF8'");
    if(isset($_POST['text'])) {
        $text = $_POST['text'];
        $commentIndex = $_POST['commentIndex'];
        $id = $_POST['ID'];
        date_default_timezone_set('Asia/Taipei');
        $date = date("Y-m-d H:i:s");

        $userIndexSql = "SELECT * FROM user WHERE user.ID = '$id'";
        $rs = mysqli_query($conn, $userIndexSql);
        $res = mysqli_fetch_array($rs);
        $UserIndex = $res['Idx'];

        $insertReply = "INSERT INTO comment_reply VALUES ('', '$commentIndex', '$UserIndex', '$text', '$date')";
        $result = mysqli_query($conn, $insertReply);

        echo $text;
    }

    function getReply($commentIndex)
    {
        global $conn;
        $sql = "SELECT AVG(rating_record.rating) FROM rating_record 
                WHERE rating_record.PostIndex = '$PostIndex' GROUP BY (rating_record.PostIndex)";
        $rs = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($rs);

        return $result[0];
    }
?>