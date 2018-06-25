<?php session_start(); ?>
<?php
    include("like_dislike.php");
    include("userRating.php");
    include('mysql_connect.inc.php');
    echo "<br><br><br><br><br>";
?>

    <html>

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="jquery"></script>
        <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="jquery.cycle.all.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <!-- style -->
        <link rel="stylesheet" href="main.css">
        <!--<link rel=stylesheet type="text/css" href="star_style.css">-->
        <script>
            $(document).ready(function() {
                //change the kind to all
                $('.scroll').on('click', function() {})

                //clicks the like button
                $('.like-btn').on('click', function() {
                    var post_id = $(this).data('id');
                    $clicked_btn = $(this);

                    //only like or dislike
                    if ($clicked_btn.hasClass('fa-heart-o')) {
                        action = 'like';
                    } else if ($clicked_btn.hasClass('fa-heart')) {
                        action = 'unlike';
                    }


                    //ajax
                    $.ajax({
                        url: 'view_article.php',
                        type: 'post',
                        data: {
                            'action': action,
                            'post_id': post_id
                        },

                        success: function(data) {
                            console.log(data);
                            res = JSON.parse(data);

                            if (action == "like") {
                                $clicked_btn.removeClass('fa-heart-o');
                                $clicked_btn.addClass('fa-heart');
                            } else if (action == "unlike") {
                                $clicked_btn.removeClass('fa-heart');
                                $clicked_btn.addClass('fa-heart-o');
                            }

                            // display # of likes and dislikes
                            $clicked_btn.siblings('span.likes').text(res.likes);
                            $clicked_btn.siblings('span.dislikes').text(res.dislikes);

                            //disliked -> like
                            $clicked_btn.siblings('i.fa-times-circle').removeClass('fa-times-circle').addClass('fa-times-circle-o');
                        }
                    });
                });

                //clicks the dislike button
                $('.dislike-btn').on('click', function() {
                    var post_id = $(this).data('id');
                    $clicked_btn = $(this);

                    //only like or dislike
                    if ($clicked_btn.hasClass('fa-times-circle-o')) {
                        action = 'dislike';
                    } else if ($clicked_btn.hasClass('fa-times-circle')) {
                        action = 'undislike';
                    }


                    //ajax
                    $.ajax({
                        url: 'view_article.php',
                        type: 'post',
                        data: {
                            'action': action,
                            'post_id': post_id
                        },
                        success: function(data) {
                            console.log(data);
                            res = JSON.parse(data);

                            if (action == "dislike") {
                                $clicked_btn.removeClass('fa-times-circle-o');
                                $clicked_btn.addClass('fa-times-circle');
                            } else if (action == "undislike") {
                                $clicked_btn.removeClass('fa-times-circle');
                                $clicked_btn.addClass('fa-times-circle-o');
                            }

                            // display # of likes and dislikes
                            $clicked_btn.siblings('span.likes').text(res.likes);
                            $clicked_btn.siblings('span.dislikes').text(res.dislikes);

                            //liked -> dislike
                            $clicked_btn.siblings('i.fa-heart').removeClass('fa-heart').addClass('fa-heart-o');
                        }
                    });
                });
            });
        </script>
        <style>
            .out {
                position: static;
                float: center;
            }

            body,
            html {
                height: 100%;
                font-family: "Inconsolata", sans-serif;
                color: black;
                background: "#rgb(207, 223, 226)";
            }

            .td {
                width: 50px;
            }

            table {
                height: 10%;
                left: 50%;
                position: static;
                width: 600px;
                border-top: 3px #fc9fc2 solid;
                border-bottom: 3px #86B8F0 solid;
                border=0;
            }

            thead th {
                background: #466280;
                color: #FFF;
                font-family: 'Lato', font-family:DFKai-sb;
                font-size: 16px;
                text-align: center;
                font-weight: 100;
                letter-spacing: 2px;
                text-transform: uppercase;
            }

            tr {
                color: #466280;
                background: #e1eaf4;
                border-bottom: 1px solid #FFF;
                margin-bottom: 5px;
            }

            th,
            td {
                font-family: 'Lato', serif;
                font-style: style="font-family:DFKai-sb";
                font-weight: 400;
                padding: 10px;
                text-align: center;

            }
            a {
                outline: none;
                text-decoration: none;
            }
            select {
                width: 150px;
                padding: 10px 10px;
                border: none;
                float: left;
                border-radius: 10px;
                margin: 2px;
                color: #fff;
                background-color: #466280;
            }
            #Sidebar {
                width: 0px;
                float: left;
                height: 100%;
                text-align: center;
                line-height: 280px;
                font-size: 15px;
                color: #ffffff;
                font-weight: lighter;
                /*background-color: #ffffff;*/
            }
            #Sidebar_right{
                /*background-color:#FFECC9;*/
                width:120px;
                height:400px;
                right:50%;
                text-align:center;
                line-height:400px;
                float:right;
            }
            #header{
                /*background-color:#FFD4D4;*/
                height:80px;
                text-align:center;
                float:right;
                top:10%;
                right:5%;
                position:absolute;
                /*line-height:80px;*/
            }
            .rating {
              display: inline-block;
              position: relative;
              bottom: 500px;
              top: 10px;
              left : 400px;
              height: 25px;
              width: 400px;
              line-height: 25px;
              font-size: 25px;
            }

            .rating label {
              position: absolute;
              bottom: 500px;
              top: 0;
              left: 10px;
              height: 0;
              cursor: pointer;
            }

            .rating label:last-child {
              position: absolute;
            }

            .rating label:nth-child(1) {
              z-index: 5;
            }

            .rating label:nth-child(2) {
              z-index: 4;
            }

            .rating label:nth-child(3) {
              z-index: 3;
            }

            .rating label:nth-child(4) {
              z-index: 2;
            }

            .rating label:nth-child(5) {
              z-index: 1;
            }

            .rating label input {
              position: absolute;
              top: 0px;
              left: 10%;
              opacity: 0;
            }

            .rating label .icon {
              float: center;
              color: transparent;
            }

            .rating label:last-child .icon {
              color: #dddddd;
            }

            .rating:not(:hover) label input:checked ~ .icon,
            .rating:hover label:hover input ~ .icon {
              color: #ffdd6b;
            }

            .rating label input:focus:not(:checked) ~ .icon:last-child {
              color: #dddddd;
              text-shadow: 0 0 5px #ffdd6b;
            }
            #all {
                background: #fff;
/*background: -webkit-linear-gradient(to right, #7AA1D2, #DBD4B4, #CC95C0);
background: linear-gradient(to right, #f4fdff, rgb(216, 241, 253), #f4fdff);*/

            }
        </style>
    </head>

    <body id="all">
        <?php
        //種類選擇
        if(!isset($_GET['kind']) && isset($_SESSION['Category'])) {
            if($_SESSION['Category'] == 'Eat') {
                $sql3 = "SELECT * FROM post WHERE post.Category = '正餐'";
            }
            else if($_SESSION['Category'] == 'Drink') {
                $sql3 = "SELECT * FROM post WHERE post.Category = '飲品'";
            }
            else if($_SESSION['Category'] == 'Dessert' ) {
                $sql3 = "SELECT * FROM post WHERE post.Category = '甜點'";
            }
            else { 
                $sql3 = "SELECT * FROM post";
            }
        }
        else {
            if($_GET['kind'] == 'Eat') {
                $sql3 = "SELECT * FROM post WHERE post.Category = '正餐'";
            }
            else if($_GET['kind'] == 'Drink') {
                $sql3 = "SELECT * FROM post WHERE post.Category = '飲品'";
            }
            else if($_GET['kind'] == 'Dessert' ) {
                $sql3 = "SELECT * FROM post WHERE post.Category = '甜點'";
            }
            else {
                $sql3 = "SELECT * FROM post";
            }
            $_SESSION['Category'] = $_GET['kind'];
        }
        //結束 種類選擇
        ?>

        <?php 
        //排序選擇
        if(!isset($_GET['OrderBy']) && isset($_SESSION['OrderBy'])) {
            if($_SESSION['OrderBy'] == 'TimeOld') {
                $sql3 .= " ORDER BY Time";
            }
            else if($_SESSION['OrderBy'] == 'RatingHigh' ) {
                $sql3 .= " ORDER BY Stars DESC, Time DESC";
            }
            else if($_SESSION['OrderBy'] == 'RatingLow') {     
                $sql3 .= " ORDER BY Stars, Time DESC";
            }
            else {
                $sql3 .= " ORDER BY Time DESC";
            }
        }
        else {
            if($_GET['OrderBy'] == 'TimeOld') {
                $sql3 .= " ORDER BY Time";
            }
            else if($_GET['OrderBy'] == 'RatingHigh' ) {
                $sql3 .= " ORDER BY Stars DESC, Time DESC";
            }
            else if($_GET['OrderBy'] == 'RatingLow') {  
                $sql3 .= " ORDER BY Stars, Time DESC";
            }
            else {
                $sql3 .= " ORDER BY Time DESC";
            }
            $_SESSION['OrderBy'] = $_GET['OrderBy'];
        }
        //結束 排序選擇
        ?>
            <div id="header">
                <?php if(!isset($_GET['PostIndex'])) {?>
                    <form action='searchKeyword.php' method='POST' style="margin-left: 2px;">
                        <input type="text" name="keyword" placeholder="請輸入關鍵字">
                        <input type="submit" value="search">
                    </form>
                    <form class='custom' action='' method='GET' style="text-align:center;">
                        <Select name='kind' onchange="submit();" id="kind">
                        <option value = 'All' <?php if($_SESSION['Category'] == 'All') echo 'selected'; ?>>全部種類</option>
                        <option value = 'Eat' <?php if($_SESSION['Category'] == 'Eat') echo 'selected'; ?>>正餐</option>
                        <option value = 'Drink' <?php if($_SESSION['Category'] == 'Drink') echo 'selected'; ?>>飲品</option>
                        <option value = 'Dessert' <?php if($_SESSION['Category'] == 'Dessert') echo 'selected'; ?>>甜點</option>
                    </Select>
                        <Select name='OrderBy' onchange="submit();" id="OrderBy">
                        <option value = 'TimeNew' <?php if($_SESSION['OrderBy'] == 'TimeNew') echo 'selected'; ?>>新 -> 舊</option>
                        <option value = 'TimeOld' <?php if($_SESSION['OrderBy'] == 'TimeOld') echo 'selected'; ?>>舊 -> 新</option>
                        <option value = 'RatingHigh' <?php if($_SESSION['OrderBy'] == 'RatingHigh') echo 'selected'; ?>>評價 高 -> 低</option>
                        <option value = 'RatingLow' <?php if($_SESSION['OrderBy'] == 'RatingLow') echo 'selected'; ?>>評價 低 -> 高</option>
                    </Select>
                    </form>
                <?php }?>
            </div>

        <div class="out">
        <?php 
        $ret = mysqli_query($conn, $sql3);
        $count = mysqli_num_rows($ret);
    
        $per = 3;
        $pages = ceil($count/$per);
        if(!isset($_GET['page'])) {
            $page = 1;
        }
        else {
            $page = intval($_GET['page']);
        }
        $start = ($page-1)*$per;
        //if($start == 0) $start = 1;
        $sql4 = $sql3.' LIMIT '.$start.', '.$per;
        
        if(isset($_GET['PostIndex'])) {
            $sql4 = "SELECT * FROM post WHERE post.PostIndex = ".$_GET['PostIndex'];
            $count = 1;
            $pages = 1;
        }

        echo "<script>console.log(".$sql4.")</script>";

        $result = mysqli_query($conn, $sql4); 
            try {
                foreach($result as $k => $v){ ?>
                <div class="container">
                    <div class="CSSTableGenerator">
                        <table align="center">
                            <thead>
                                <th colspan="2" style="text-align: left;">
                                    <h5 style="text-align: left;color:#fcdd5c;">
                                        <font style="color:#fff;left:0px;right:600px;position:relative;">
                                        &nbsp;&nbsp;<a href=view_article.php?PostIndex=<?php echo $v['PostIndex'];?> target="_blank" style="text-decoration:none;"><?php echo $v['Title']?></a></font>
                                        <font style="font-size:120%;">&nbsp;&nbsp;&nbsp;&nbsp;★</font>
                                        <span id = 'rating_<?php echo $v['PostIndex'] ?>'>
                                        <?php echo getRatingOfStar($v['PostIndex']); ?>&nbsp;&nbsp;
                                        </span>
                                        
                                        <span id = 'people_<?php echo $v['PostIndex'] ?>'>
                                        <?php echo "(".getPeopleNumber($v['PostIndex']).")"; ?>&nbsp;&nbsp;
                                        </span>
                                        <?php/*
                                            $sql5 = "SELECT COUNT(RC.UserIndex) FROM rating_record AS RC WHERE RC.PostIndex = '".$v['PostIndex']."'";
                                            $end = mysqli_query($conn, $sql5);
                                            $theEnd = mysqli_fetch_row($end);
                                            echo "(".$theEnd['                                                                                  8'].")";*/
                                        ?>
                                    </h5>
                                    <?php if(!empty($_SESSION['ID'])) {?>
                                      <h6>
                                        <div class="rating rating1" data-id="<?php echo $v['PostIndex']; ?>">
                                            <input type="hidden" name="postIndex" value="<?php echo $v['PostIndex']; ?>">

                                            <label>
                                                <input type="radio" name="stars" value="1"  data-id="<?php echo $v['PostIndex']; ?>"/>
                                                <span class="icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="stars" value="2"  data-id="<?php echo $v['PostIndex']; ?>"/>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="stars" value="3"  data-id="<?php echo $v['PostIndex']; ?>"/>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>   
                                            </label>
                                            <label>
                                                <input type="radio" name="stars" value="4"  data-id="<?php echo $v['PostIndex']; ?>"/>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="stars" value="5"  data-id="<?php echo $v['PostIndex']; ?>"/>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                 &nbsp;
                                            </label>
                                            
                                        </div>
                                      </h6>
                                    <?php } else {echo "<br>";}?>
                                </th>
                            </thead>
                            <tr>
                                <td width="20%">暱稱</td>
                                <td width="80%">
                                    <?php echo $v['UserID']?>
                                </td>
                            </tr>
                            <tr>
                                <td>時間</td>
                                <td>
                                    <?php echo $v['Time']?>
                                </td>
                            </tr>
                            <tr>
                                <td>分類</td>
                                <td>
                                    <?php echo $v['Category']?>
                                </td>
                            </tr>
                            <tr>
                                <td>評論</td>
                                <td>
                                    <?php echo "<div style='text-align:left;'>".nl2br($v['Text'])."</div>";?>
                                </td>
                            </tr>
                            <?php if($v['Picture'] != null) { echo "<tr>";?>
                            <th colspan="2" style="text-align: center;">
                                <?php
                                    if($v['Picture'] != null) {
                                        //$a = "pic/".$v['Picture'];
                                        $pathx = "pic/";
                                        //$file = $v["filename"];
                                        echo '<img src="'.$pathx.$v["Picture"].'"  width="580">';
                                    }
                                ?>
                            </th>
                            <?php echo "</tr>"; }?>

                            <tr>
                                <th colspan="2" style="text-align: right;">
                                    <?php
                                        $sql=sprintf("select * from post");
                                        $conn = mysqli_connect($db_server,$db_user,$db_passwd,$db_name);
                                        mysqli_query($conn,"SET NAMES 'UTF8'");
                                        $result = mysqli_query($conn, $sql);
                                    ?>
                                    <?php if(empty($_SESSION['ID'])) echo "<a href = 'index.php'><h6 style = 'color:#f86a6a;display:inline;'>喜歡這篇文章或想要留言嗎？點我來登入喔！</h6></a>"; ?> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <i <?php if(userLiked($v[ 'PostIndex'])==true): ?>
                                                    class="fa fa-heart like-btn" 
                                                <?php else: ?>
                                                    class="fa fa-heart-o like-btn"
                                                <?php endif ?>
                                            data-id="<?php echo $v['PostIndex'] ?>"></i>

                                        <span class="likes"><?php echo getLikes($v['PostIndex'])?></span>

                                        <!-- end like button -->

                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                        <!-- dislike button -->
                                        <?php
                                                $sql=sprintf("select * from post");
                                                $conn = mysqli_connect($db_server,$db_user,$db_passwd,$db_name);
                                                mysqli_query($conn,"SET NAMES 'UTF8'");
                                                $result = mysqli_query($conn, $sql);
                                        ?>
                                            <i <?php if(userDisliked($v[ 'PostIndex'])==true): ?>
                                                class="fa fa-times-circle dislike-btn" 
                                            <?php else: ?>
                                                class="fa fa-times-circle-o dislike-btn"
                                            <?php endif ?>
                                        data-id="<?php echo $v['PostIndex'] ?>"></i>

                                            <span class="dislikes"><?php echo getDislikes($v['PostIndex'])?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <!-- dislike -->
                                </th>

                            </tr>
                            <tr>
                                <th colspan="2" style="text-align: left;">
                                    <?php
                                            $connect = new PDO("mysql:host=$db_server;dbname=beta;charset=utf8", $db_user, $db_passwd);
                                            $require = $connect->prepare("SELECT * FROM comment ORDER BY Time DESC");
                                            $require->execute();
                                            $ret = $require->setFetchMode(PDO::FETCH_ASSOC); 
                                            $ret = $require->fetchAll();
                                            $acc = 0;
                                            foreach($ret as $c){
                                                if($v['PostIndex'] == $c['PostIndex']) {
                                                    echo "<h6 style='text-align:left;background-color:#fff;color:#5f85ac;border:2px #bfbfbf solid;padding :10px;'>";
                                                    echo $c["UserID"]." : ".nl2br($c['Text']);
                                                    echo "<p style='text-align:right;color:#a4b8cc;'>";
                                                    echo $c['Time']."</p>"."</h6>";
                                                    $acc++;?>
        <div style="width: 450px;" id = "replyBlock">
            <?php if(isset($_SESSION['ID'])) { ?> 
            <?php
                $rs = $connect->prepare("SELECT * FROM comment_reply WHERE comment_reply.comment_index = ".$c['CommentIndex']."  ORDER BY comment_reply.date");
                $rs->execute();
                $r = $rs->setFetchMode(PDO::FETCH_ASSOC); 
                $r = $rs->fetchAll();
                $cc = 0;

                foreach ($r as $eachReply) {
                    $cc++;
                    $rUI = $eachReply['userIndex'];
                    $rData = $eachReply['data'];
                    $rDate = $eachReply['date'];

                    $userIDSql = "SELECT * FROM user WHERE user.Idx = ".$rUI;
                    $userIDResult = mysqli_query($conn, $userIDSql);
                    $arr = mysqli_fetch_array($userIDResult);
                    $uesrID = $arr['ID'];

                    echo "<h6 style='text-align:left;background-color:#fff;color:#5f85ac;border:2px #CBB3B3 solid;padding :10px ; clear: right;'>";
                    echo $uesrID." : ".$rData."<br>";
                    echo "<p style='text-align:right;color:#a4b8cc; '>";
                    echo $rDate."</p>"."</h6>";
                }
            ?>
        </div>
        <form>
            <input type="text" name="commentReply" id="<?php echo "commentReply_".$c['CommentIndex']; ?>"
                      style="width:450px;height:40px;color:rgb(159, 180, 214);padding:20px;border:0px blue none; text-align: left; display: none">
            <input type="button" name="replyButton" id="<?php echo "replyButton_".$c['CommentIndex']; ?>"
                   value="回覆"  data-id="<?php echo $c['CommentIndex']; ?>" class="reply"
                   style="width:60px;height:30px;border:0px blue none;color:#fff;background: #a4b0c6;position:relative;float: right;">
            <input type="button" name="trueReplyButton" id="<?php echo "trueReplyButton_".$c['CommentIndex']; ?>" data-id="<?php echo $c['CommentIndex']; ?>" class="trueReply"
                   value="留言" 
                   style="width:60px;height:30px;border:0px blue none;color:#fff;background: #a4b0c6;position:relative;float: right; display: none;">
            <br><br>
        </form>
        <?php } ?>
                                                <?php }
                                            }
                                            //#e3768f
                                            if($acc == 0) echo "<p style='text-align: center;color:#4f88f5;'>"."========目前還沒有留言喔！快來搶頭香吧！========"."</p>";
                                        ?>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2" style="text-align: right;">
                                    <?php if(!empty($_SESSION["ID"])) { ?>
                                    <form>
                                        <input type="text" style="width:450px;height:40px;color:rgb(159, 180, 214);padding:20px;border:0px blue none; text-align: left;" name="comment" id="<?php echo "comment".$v["PostIndex"]; ?>" placeholder="  來留個言吧！" />&nbsp;&nbsp;&nbsp;
                                        <input type="hidden" name="post_id" id="<?php echo "post_id".$v["PostIndex"]; ?>" value='<?php echo $v["PostIndex"]?>' />
                                        <input type="hidden" name="myid" id="<?php echo "myid".$v["PostIndex"]; ?>" value='<?php echo $_SESSION["ID"] ?>' />
                                        <input type="submit" name="submit" id="<?php echo "commentButton".$v["PostIndex"]; ?>" class="commentButton" data-id="<?php echo $v['PostIndex']; ?>" value="留言" style="width:100px;height:40px;border:0px blue none;color:#fff;background: #a4b0c6;position:relative;right:0px;" />
                                    </form>
                                    <?php } ?>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2" style="text-align: right;">
                                    <?php if(isset($_GET['PostIndex'])) {?>
                                        <div id="googleMap" style="width:100%;height:400px;"></div>
                                        <?php
                                            $la = $v['lat'];
                                            $ln = $v['lng'];
                                        ?>
                                    <?php }?>
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
                <?php
                   echo "<br>";
                }
                echo "<br>";
            }
            catch(PDOException $e){
            }
        ?>
        </div>
        <footer style="background-color:#30495f; padding:10;text-align:center;">
            <div style="text-align:center;">
            <?php
            echo "<a href=?page=1&kind=".$_SESSION['Category']."&OrderBy=".$_SESSION['OrderBy']." style='color:#a6aed0'><font size='+1'>1...&nbsp;</font></a>";
            for($i = 1; $i <= $pages; $i++) {
                if($i == $page) {
                    echo "<a href=?page=".$i."&kind=".$_SESSION['Category']."&OrderBy=".$_SESSION['OrderBy']."><font size='+4' color=#ffa5c8>&nbsp;".$i."&nbsp;</font></a>";
                }
                else if($page-2 < $i && $i < $page + 2) {
                    if($i < $page) echo "<a href=?page=".$i."&kind=".$_SESSION['Category']."&OrderBy=".$_SESSION['OrderBy']."><font color=#aec1e3 size='+2'><strong>&nbsp;<&nbsp;</strong></font></a>";
                    if($i > $page) echo "<a href=?page=".$i."&kind=".$_SESSION['Category']."&OrderBy=".$_SESSION['OrderBy']."><font color=#a7bbe0 size='+2'><strong>&nbsp;>&nbsp;</strong></font></a>";
                }
            }
            echo "<a href=?page=".$pages."&kind=".$_SESSION['Category']."&OrderBy=".$_SESSION['OrderBy']." style='color:#a6aed0' >&nbsp;<font size='+1'>...$pages</font></a>";
            echo "<p style='color:#c7c7c7;'>Total: <font color=#f07e7e>".$count."</font> article(s)</p>";
        ?>
            </div>
        </footer>
        <div class="w3-top" style="background-color: #30495f;color:#fff;">
            <div class="w3-row w3-padding">

                <div class="w3-col s1">
                    <a href="Top.php#home" class="w3-button w3-block scroll">HOME</a>
                </div>
                <div class="w3-col s1">
                    <a href="Top.php#about" class="w3-button w3-block scroll">ABOUT</a>
                </div>
                <div class="w3-col s1">
                    <a href="Top.php#menu" class="w3-button w3-block scroll">COMMENT</a>
                </div>
                <div class="w3-col s1">
                    <a href="Top.php#where" class="w3-button w3-block scroll">WHERE</a>
                </div>
                <div class="w3-col s1">
                    <a href="Top.php#contact" class="w3-button w3-block scroll">CONTACT</a>
                </div>
                <div class="w3-col s1">
                    <a href="view_article.php?kind=All&OrderBy=TimeNew" class="w3-button w3-block scroll">ARTICLE</a>
                </div>
                <div class="w3-col s1">
                    <a href="prizeTest.php" class="w3-button w3-block scroll">LOTTERY</a>
                </div>
                <?php if(empty($_SESSION['ID'])) {?>
                <div id="pic" class="w3-right w3-hide-small">
                    <a href="./index.php" class="w3-bar-item w3-button">LOGIN</a>
                    <a href="./register.php" class="w3-bar-item w3-button">SIGNUP</a>
                </div>
                <?php }?>
                <?php if(!empty($_SESSION['ID'])) {?>
                <div id="pic" class="w3-right w3-hide-small">
                    <?php
                        $ID = $_SESSION['ID'];
                        $sql = "SELECT * FROM user WHERE '$ID' = user.ID";
                        $r = mysqli_query($conn, $sql);
                        $result =  mysqli_fetch_array($r);
                        echo "<font class='w3-bar-item' style='position:center;padding:0px 5px;'align='center' valign='center' face='Inconsolata' size='3'>Hi! ".$result['Fname']."!&nbsp;&nbsp;&nbsp;&nbsp;</font>";
                    ?>
                    <a href="./logout.php" class="w3-bar-item w3-button">LOGOUT</a>
                    <a href="./post.php" class="w3-bar-item w3-button">POST</a>
                    <a href="./update.php" class="w3-bar-item w3-button">USER CENTER</a>
                    <?php if(!empty($_SESSION['admin'])) echo "<a href='./delete.php' class='w3-bar-item w3-button'>ADMIN CENTER</a>";?>
                </div>
                <?php }?>
            </div>
        </div>
    </body>
</html>

<script>
    $(':radio').change(function() {
        console.log('New star rating: ' + this.value);
    });
</script>
<script async defer
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmUgkZNoNZFbzGUBRVKoPL2vYJPSwhr5c&callback=initMap">
</script>
<script>
      function initMap() {
        var myLatLng = {lat: <?php echo $la; ?>, lng: <?php echo $ln; ?> };
        var map = new google.maps.Map(document.getElementById('googleMap'), {
          zoom: 16,
          center: myLatLng,
          gestureHandling: 'cooperative'
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }
</script>
<script>
    $(':radio').on('click', function() {
        stars = this.value;
        var postIndex = $(this).attr('data-id');
        console.log('New star rating: ' + stars);

        $.ajax({
            url: 'userRating.php',
            type: 'POST',
            data: {
                'stars': stars,
                'PostIndex': postIndex,
                'ID': "<?php echo $_SESSION['ID']; ?>"
            },
            success: function(data) {
                var obj = jQuery.parseJSON (data);
                alert("You give " + stars + " stars.");
                //alert(obj.rating);
                //alert(obj.rating);
                //$('#rating_'+postIndex).text(data);
                $('#rating_'+postIndex).text(obj.rating);
                $('#people_'+postIndex).text("("+obj.people+")");
            }
        })
        //window.location.reload();
    });
    
    $('.reply').on('click', function() {
        var commentIndex = $(this).attr('data-id');
        var replyData = $('#commentReply_'+commentIndex).val();
        $('#commentReply_' + commentIndex).show();
        $('#replyButton_' + commentIndex).hide();
        $('#trueReplyButton_' + commentIndex).show();
    });

    $('.trueReply').on('click', function() {
        var commentIndex = $(this).attr('data-id');
        var replyData = $('#commentReply_'+commentIndex).val();

        $.ajax({
            url: 'comment_reply.php',
            type: 'POST',
            data: {
                'commentIndex': commentIndex,
                'ID': "<?php echo $_SESSION['ID']; ?>",
                'text': replyData
            },
            success: function(data) {
                alert("(。∀°)回覆成功 (。∀°)");
                history.go(0);
                $('#commentReply_' + commentIndex).hide();
                $('#replyButton_' + commentIndex).show();
                $('#trueReplyButton_' + commentIndex).hide();
            }
        })
    });
    
    $('.commentButton').click(function() {
        var postIndex = $(this).attr('data-id');
        //comment, post_id, myid
        var comment = $('#comment' + postIndex).val();
        var post_id = $('#post_id' + postIndex).val();
        var myid = $('#myid' + postIndex).val();
    
        $.ajax({
            url: 'comment_function.php',
            type: 'POST',
            data: {
                'comment': comment,
                'post_id': post_id,
                'myid': myid
            },

            success: function(data) {
                alert("(。∀°)留言成功(。∀°)");
                window.location.reload();
            }
        });
    });
</script>