<?php session_start(); ?>
<?php
    include("mysql_connect.inc.php");
?>
<html>
    <head>
        <link rel="stylesheet" href="searchKeywordStyle.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            a {
                text-decoration:none;
            }
            #header{
                /*background-color:#FFD4D4;*/
                width: 500px;
                height:80px;
                text-align:center;
                float:center;
                top:10%;
                left:67%;
                position:absolute;
                /*line-height:80px;*/
            }
            select {
                width: 150px;
                padding: 10px 10px;
                border: none;
                float: left;
                top:0%;
                border-radius: 10px;
                margin: 2px;
                color: #fff;
                background-color: #466280;
            }
        </style>
    </head>
    <?php
        //種類選擇
        if(!isset($_GET['kind'])) {
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
        if(!isset($_GET['OrderBy'])) {
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
    <?php 
        include("blue_head.inc.php");
        if(!empty($_SESSION["ID"])) $user_id = $_SESSION["ID"];
        if (!$conn) {
          die("Error connecting to database: " . mysqli_connect_error($conn));
          exit();
        }
        //$keyword = $_POST['keyword'];
        $ret = mysqli_query($conn, $sql3);
    ?>
    <div id="header">
        <form action='searchKeyword_fun.php' method='POST' style="margin-left: 2px;top:40%;">
            <input type="text" name="keyword" placeholder="請輸入關鍵字">
            <input type="submit" value="search">
        </form>
        <?php if(!isset($_GET['PostIndex'])) {?>
            <form class='custom' action='' method='GET' style="text-align:center;">
                <Select name='kind' onchange="submit();" id="kind" style="margin:5px;">
                    <option value = 'All' <?php if($_SESSION['Category'] == 'All') echo 'selected'; ?>>全部種類</option>
                    <option value = 'Eat' <?php if($_SESSION['Category'] == 'Eat') echo 'selected'; ?>>正餐</option>
                    <option value = 'Drink' <?php if($_SESSION['Category'] == 'Drink') echo 'selected'; ?>>飲品</option>
                    <option value = 'Dessert' <?php if($_SESSION['Category'] == 'Dessert') echo 'selected'; ?>>甜點</option>
                </Select>
                &nbsp;&nbsp;
                <Select name='OrderBy' onchange="submit();" id="OrderBy"  style="margin:5px;">
                    <option value = 'TimeNew' <?php if($_SESSION['OrderBy'] == 'TimeNew') echo 'selected'; ?>>新 -> 舊</option>
                    <option value = 'TimeOld' <?php if($_SESSION['OrderBy'] == 'TimeOld') echo 'selected'; ?>>舊 -> 新</option>
                    <option value = 'RatingHigh' <?php if($_SESSION['OrderBy'] == 'RatingHigh') echo 'selected'; ?>>評價 高 -> 低</option>
                    <option value = 'RatingLow' <?php if($_SESSION['OrderBy'] == 'RatingLow') echo 'selected'; ?>>評價 低 -> 高</option>
                </Select>
            </form>
        <?php }?>
    </div>
    <body>
       
        <div>
            <table>
                <tr>
                    <th>文章連結</th>
                    <th>種類</th>
                    <th>★</th>
                </tr>
                <?php  foreach ($ret as $k => $v) { ?>
                    <tr>
                        <?php $var = $v['Title']; ?>
                        <td><?php echo '<a href=view_article.php?PostIndex='.$v['PostIndex'].' target="_blank style="text-decoration:none;">'.$var.'</a>'; ?> </td>
                        <td> <?php echo $v['Category'] ?> </td>
                        <td> <?php echo $v['Stars'] ?> </td>

                    </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>