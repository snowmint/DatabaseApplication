<?php session_start(); ?>
<?php
    include("like_dislike.php");
    include("userRating.php");
    include('mysql_connect.inc.php');
    include("blue_head.inc.php");
    echo "<br><br><br><br><br><br>";
?>

<html>
	<head>
	    <link type="text/css" rel="stylesheet" href="prizeTestStyle.css" />
	    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	    <script type="text/javascript" src="prizeScript.js"></script>
	    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
		<style>
            .example {/*親div*/
                position: relative;/*相対配置*/
            }
            .example h6 {
                  position: absolute;/*絶対配置*/
                  color: #89b5e0;/*文字は青に*/
                  top: 65%;
                  left: 65%;
                  -ms-transform: translate(-50%,-50%);
                  -webkit-transform: translate(-50%,-50%);
                  transform: translate(-50%,-50%);
                  margin:0;
                  padding:0;
            }
            a{
                text-decoration: none;
            }
        </style>
	</head>

	<body id="all">
        <?php
            $arr;
            $str = "SELECT * FROM post WHERE 1 ORDER BY rand() LIMIT 4";
            $res = mysqli_query($conn, $str);
            $coun = mysqli_num_rows($res); //得到資料總全筆數
            $a = mysqli_fetch_array($res);
            $i = 0;
            while($a = mysqli_fetch_array($res)) {
                $arr[$i++] = $a['PostIndex'];
            }
            //echo $arr[0].$arr[1].$arr[2];
            /*
            while($a = mysqli_fetch_array($res)){
                echo "<font color='#fff'>".$a['Title']."</font>";
            }
            */
        ?>
        <div style="left:35%;height: 220px;width: 600px;position: absolute;">
            <font color="#fff" size="6">選擇一張牌來決定今天吃什麼吧！</font>
        </div>
		<div class="flipBlock exsample" style="top:35%;">
			<div class="flip-container" id="flip1" style="left: 0%;">
			  	<div class="flipper" id="flipper1">
			        <div class="face front">
			            <!--Front-->
			            <img src="pic/card_blue.png" alt="front" class="rotate90">
			        </div>
			        <div class="face back example">
			            <!--Back-->
			            <img src="pic/card_white.png" alt="back" class="rotate90">
			            <h6><?php echo "<font size='10'><a href='view_article.php?PostIndex=".$arr[0]."'>".$arr[0]."</a></font>"; ?></h6>
			        </div>
			    </div>
			</div>
			<div class="flip-container" id="flip2" style="left: 60%">
			  	<div class="flipper" id="flipper2">
			        <div class="face front">
			            <!--Front-->
			            <img src="pic/card_pink.png" alt="front">
			        </div>
			        <div class="face back example">
			            <!--Back-->
			            <img src="pic/card_white_pink.png" alt="back">
                        <h6><?php echo "<font size='10' color='#fabcbc'><a href='view_article.php?PostIndex=".$arr[1]."'>".$arr[1]."</a></font>"; ?></h6>
			        </div>
			    </div>
			</div>
			<div class="flip-container"  id="flip3" style="left: 120%">
			  	<div class="flipper" id="flipper3">
			        <div class="face front">
			            <!--Front-->
			            <img src="pic/card_blue.png" alt="front">
			        </div>
			        <div class="face back example">
			            <!--Back-->
			            <img src="pic/card_white.png" alt="back">
			            <h6><?php echo "<font size='10'><a href='view_article.php?PostIndex=".$arr[2]."'>".$arr[2]."</a></font>"; ?></h6><!---->
			        </div>
			    </div>
			</div>
			<button id="reset" style='position:absolute;top:160%; left:57.5%; display:none;width:220px;height:40px;outline:none;border:2px #000 none;color:#fff;background: rgba(0, 0, 0, 0);font-size:30px;'>再選一次</button>
		</div>
        
	</body>
</html>
