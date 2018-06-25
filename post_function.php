<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
    include("mysql_connect.inc.php");
    include("head_line.inc.php");
    if(!empty($_SESSION['admin'])) include("head_admin.inc.php");
    $title = $_POST["title"];
    $content = mysqli_real_escape_string($conn, $_POST["content"]);
    $butt = $_POST["ensure"];
    $stars = $_POST["stars"];
    $cat = $_POST["category"];
    $id = $_SESSION["ID"];
    $la = $_POST["Latitude"];
    $ln = $_POST["Longitude"];
    $uidx = NULL;
    
    try {
            $conn = new PDO("mysql:host=$db_server;dbname=beta;charset=utf8", $db_user, $db_passwd);
            $stmt = $conn->prepare("SELECT * FROM user WHERE ID = '$id' "); 
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            $result = $stmt->fetchAll();
            foreach($result as $k => $v){
                $uidx = $v['Idx'];
            }
        }
    catch(PDOException $e){
    }
    $conn = mysqli_connect($db_server,$db_user,$db_passwd,$db_name);
    mysqli_query($conn,"SET NAMES 'UTF8'");
    if($id != null && $stars!= null && $cat != null && $title != null && $content != null && $butt == "submit") {
        /*if(!empty($_POST["image"])) {
            $filename = $_FILES['image']['name'];
        }
        else {
            $filename = null;
        }*/
        if(isset($_FILES['image']['name'])) {
            $msg = "";
            
            // image file directory
            $target = "pic/".basename($_FILES['image']['name']);
            $image = strtolower($_FILES['image']['name']);
            //echo $image;
            //$test = $_FILES['image'];
            //foreach($test as $key => $value)
            //    echo $key." ".$value."<br>";
            //echo $test['error'];
            //$sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
            // execute query
            //mysqli_query($db, $sql);
            /*
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
            }*/
          }
          //$result = mysqli_query($db, "SELECT * FROM images");
        }
        date_default_timezone_set('Asia/Taipei');
        $date = date("Y-m-d H:i:s");
        $filename = $_FILES['image']['name'];
        if(mysqli_query($conn, "INSERT INTO post (PostIndex, Title, Time, Text, Stars, UserIndex, UserID, Category, Picture, lat, lng) VALUES ('', '$title',  '$date', '$content', '$stars', '$uidx', '$id', '$cat', '$image', '$la', '$ln')")) {
            $postIndexSql = "SELECT PostIndex FROM post WHERE post.Text = '$content'";
            $rs = mysqli_query($conn, $postIndexSql);
            $res = mysqli_fetch_array($rs);
           
            $userIndexSql = "SELECT user.Idx FROM user WHERE user.ID = '$id'";
            $rt = mysqli_query($conn, $userIndexSql);
            $ret = mysqli_fetch_array($rt);
            $idx  = $ret[0];
            //exit();
            $sql = "INSERT INTO rating_record VALUES ('$res[0]', '$idx', '$stars')";
            mysqli_query($conn, $sql);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
            }
            
            echo "<img src = './pic/addSuccess.png' width='90%' style='display:block; margin:auto;'>";
            echo "<meta http-equiv=REFRESH CONTENT=1;url=view_article.php?kind=All&OrderBy=TimeNew>";
        }
        else {
            echo "Faild!";
            exit();
        }
?>