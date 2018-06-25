<?php
    $conn = mysqli_connect('localhost', 'root','tdhudinm0437','beta');
    mysqli_query($conn,"SET NAMES 'UTF8'");

    if(isset($_POST['stars'])) {
        $stars = $_POST['stars'];
        $PostIndex = $_POST['PostIndex'];
        $id = $_POST['ID'];

        $userIndexSql = "SELECT * FROM user WHERE user.ID = '$id'";
        $rs = mysqli_query($conn, $userIndexSql);
        $res = mysqli_fetch_array($rs);
        $UserIndex = $res['Idx'];

        $checkSql = "SELECT * FROM rating_record WHERE rating_record.PostIndex = '$PostIndex' AND rating_record.UserIndex = '$UserIndex'";
        $rs = mysqli_query($conn, $checkSql);
        if(mysqli_num_rows($rs)) {
            $sql = "UPDATE rating_record SET rating_record.rating = '$stars' 
                    WHERE rating_record.PostIndex = '$PostIndex' AND rating_record.UserIndex = '$UserIndex'";
        }
        else {
            $sql = "INSERT INTO rating_record VALUES ('$PostIndex', '$UserIndex', '$stars')";
        }
        
        mysqli_query($conn, $sql);
        
        $updateCurrentPostRating
         = "UPDATE post
            SET post.Stars 
                = (SELECT AVG(rating) FROM rating_record WHERE rating_record.PostIndex = '$PostIndex')
            WHERE post.PostIndex = '$PostIndex'";
        mysqli_query($conn, $updateCurrentPostRating);
        //echo "<meta http-equiv=REFRESH CONTENT=1;url=view_article.php?PostIndex=$PostIndex>";
        $arr = [
            'rating' => getRatingOfStar($PostIndex),
            'people' => getPeopleNumber($PostIndex)
        ];
        //echo getRatingOfStar($PostIndex);
        echo json_encode($arr);
    }

    function getRatingOfStar($PostIndex)
    {
        global $conn;
        $sql = "SELECT ROUND(AVG(rating_record.rating), 1) FROM rating_record 
                WHERE rating_record.PostIndex = '$PostIndex' GROUP BY (rating_record.PostIndex)";
        $rs = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($rs);

        return $result[0];
    }
    function getPeopleNumber($PostIndex)
    {
        global $conn;
        //$sql = "SELECT COUNT(*) FROM rating_record WHERE rating_record.PostIndex = '$PostIndex' GROUP BY (rating_record.PostIndex)";
        //$rs = mysqli_query($conn, $sql);
        //$result = mysqli_fetch_array($rs);
        $sql5 = "SELECT COUNT(RC.UserIndex) FROM rating_record AS RC WHERE RC.PostIndex = '$PostIndex'";
        $end = mysqli_query($conn, $sql5);
        $theEnd = mysqli_fetch_array($end);
        return $theEnd[0];
    }
?>
   
