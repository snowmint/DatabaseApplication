<?php
    session_start(); 
    $_SESSION['Category'] = 'All';
?>
<?php
    include('action_page.php');
    include('mysql_connect.inc.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <title>FOOD</title>
    
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
    
        <!--google map style-->
        <style>
          /* Always set the map height explicitly to define the size of the div
           * element that contains the map. */
          #map {
            height: 100%;
          }
          /* Optional: Makes the sample page fill the window. */
          html, body {
            height: 100%;
            margin: 0;
            padding: 0;
          }
          a{
                text-decoration: none;
          }
        </style>
        <!--totally style-->
        <style>
            body, html {
                height: 100%;
                font-family: "Inconsolata", sans-serif;
                color : black;
                background: "#rgb(207, 223, 226)";
            }
            .bgimg {
                background-position: center;
                background-size: cover;
                min-height: 75%;
            }
            .menu {
                display: none;
            }
            .w3-top{
                font-family: "Inconsolata", sans-serif;
                color : white;
                background: "#rgb(101, 152, 146)";
            }
        </style>
        <!--About visual-pic Style-->
        <style type="text/css">
            #slideshow {
                width:   1600px;
                height:  900px; 
                padding: 0;  
                margin:  0;
                overflow:hidden;  
            }
            #slideshow img {  
                background-color: #eee;  
                width:  1600px; 
                height: 900px; 
                top:  0; 
                left: 0;
            }
            .flex-caption {
                color: white;
                font-size: 100px;
                text-transform: uppercase;
                z-index:1;
            }
        </style>
        
        <!--"Script" have scroll function for better experience-->
        <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="jquery"></script>
        <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="jquery.cycle.all.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script type="text/javascript">
                $(function() {
                    $('a.scroll').bind('click', function(event) {
                        var $anchor = $(this);
                        $('html, body').stop().animate({
                            scrollTop: $($anchor.attr('href')).offset().top
                        }, 1000, 'easeInOutExpo');
                    event.preventDefault();
                });

            });
        </script>
      
        <!--"Script" About visual-pic-->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#slideshow').cycle({
                    fx: 'fade',
                    infinite: true,
                    speed: 2000,
                    timeout: 1000,
                    autoplay: true
                });
            });
        </script>
    </head>
    <!--end of head-->
    
    <body>
        <!-- Links (sit on top) -->
        <div class="w3-top">
            <div class="w3-row w3-padding w3-black">
                
            
            <?php echo "<script>console.log($_SESSION[Category])</script>"?>
            <div class="w3-col s1">
                <a href="#home" class="w3-button w3-block w3-black scroll">HOME</a>
            </div>
            <div class="w3-col s1">
                <a href="#about" class="w3-button w3-block w3-black scroll">ABOUT</a>
            </div>
            <div class="w3-col s1">
                <a href="#menu" class="w3-button w3-block w3-black scroll">COMMENT</a>
            </div>
            <div class="w3-col s1">
                <a href="#where" class="w3-button w3-block w3-black scroll">WHERE</a>
            </div>
            <div class="w3-col s1">
                <a href="#contact" class="w3-button w3-block w3-black scroll">CONTACT</a>
            </div>
            <div class="w3-col s1">
                <a href="view_article.php?kind=All&OrderBy=TimeNew" class="w3-button w3-block w3-black scroll">ARTICLE</a>
            </div>
            <div class="w3-col s1">
                <a href="prizeTest.php" class="w3-button w3-block scroll">LOTTERY</a>
            </div>
            <!--detect the state of login or out, and change the function that they can use-->
            <?php if(empty($_SESSION['ID'])) {?>
                <div id = "pic" class="w3-right w3-hide-small">
                    <a href="./index.php" class="w3-bar-item w3-button">LOGIN</a>
                    <a href="./register.php" class="w3-bar-item w3-button">SIGNUP</a>
                </div>
            <?php }?>
            <?php if(!empty($_SESSION['ID'])) {?>
                <div id = "pic" class="w3-right w3-hide-small" align="center" valign="center">
                    <?php
                        $ID = $_SESSION['ID'];
                        $sql = "SELECT * FROM user WHERE '$ID' = user.ID";
                        $r = mysqli_query($conn, $sql);
                        $result =  mysqli_fetch_array($r);
                        echo "<font class='w3-bar-item' style='position:center;padding:0px 5px;'align='center' valign='center' face='Inconsolata' size='3'>Hi! ".$result['Fname']." 歡迎回來!&nbsp;&nbsp;&nbsp;&nbsp;</font>";
                    ?>
                    
                    <a href="./logout.php" class="w3-bar-item w3-button">LOGOUT</a>
                    <a href="./post.php" class="w3-bar-item w3-button">POST</a>
                    <a href="./update.php" class="w3-bar-item w3-button">USER CENTER</a>
                    <?php if(!empty($_SESSION['admin'])) echo "<a href='./delete.php' class='w3-bar-item w3-button'>ADMIN CENTER</a>";?>
                </div>
            <?php }?>
            </div>
        </div>

        <!-- Header with image bgimg --><!-- 晚餐好吃嗎？ How about dinner ?  /  晚餐吃什麼？ What’s for Dinner? -->
        <header class="bgimg w3-display-container w3-grayscale-min w3-center" id="home">

                <div id= "slideshow">
                    <a><img src="pic/9_2.JPG" alt="1" style="width:100%;max-width:2000px"/>
                    <span class="flex-caption w3-display-middle w3-center">How<br>About<br>Dinner<br>?</span></a>
                    <a><img src="pic/35.JPG" alt="2" style="width:100%;max-width:2000px"/>
                    <span class="flex-caption w3-display-middle w3-center">How<br>About<br>Dinner<br>?</span></a>
                    <a><img src="pic/38.JPG" alt="3" style="width:100%;max-width:2000px"/>
                    <span class="flex-caption w3-display-middle w3-center">How<br>About<br>Dinner<br>?</span></a>
                    <a><img src="pic/40.JPG" alt="4" style="width:100%;max-width:2000px"/>
                    <span class="flex-caption w3-display-middle w3-center">How<br>About<br>Dinner<br>?</span></a>
                </div>

        </header>
        
        <!-- Add a background color and large text to the whole page *w3-sand w3-grayscale-->
        <div class="  w3-large"> 

            <!-- About Container -->
            <div class="w3-container" id="about">
                <div class="w3-content" style="max-width:700px">
                    <h4 class="w3-center w3-padding-64"><span class="w3-wide" style = "border-bottom-style: solid;padding : 10px">ABOUT THE DINNER</span></h4>
                    <p>晚餐究竟要吃什麼好呢？</p>
                    <p>Dinner 的定義是傍晚最豐富的一餐，那有什麼理由不吃得好一點呢？<br><br>
                    <strong>　　　　「但在吃過早餐和午餐後，已經想不到有什麼可以吃的了...」</strong><br><br>
                    既然無法決定就來看看大家的想法吧！</p><br>
                    <div class="w3-panel w3-leftbar w3-light-grey"><br>
                        <p><i>"　誰會放著美味的晚餐不吃，去抓老鼠呢？　"</i></p>
                        <p>　　　　　　　　　　　　　　　　　　　　　by: 加菲貓</p>
                        <br>
                    </div>
                    <img src="pic/65.jpg" style="width:100%;max-width:1000px" class="w3-margin-top">
                </div>
            </div>
            <br><br><br><br>
            <!-- Comment Container -->
            <div class="w3-container" id="menu">
                  <div class="w3-content" style="max-width:700px">
                        <h4 class="w3-center w3-padding-48"><span class="w3-wide" style = "border-bottom-style: solid;padding : 10px">THE COMMENT</span></h4>
                        <div class="w3-row w3-center w3-card w3-padding">
                            <a href="javascript:void(0)" onclick="openMenu(event, 'Eat');" id="myLink">
                                <div class="w3-col s4 tablink">Eat</div>
                            </a>
                            <a href="javascript:void(0)" onclick="openMenu(event, 'Drinks');">
                                <div class="w3-col s4 tablink">Drink</div>
                            </a>
                            <a href="javascript:void(0)" onclick="openMenu(event, 'Dessert');">
                                <div class="w3-col s4 tablink">Dessert</div>
                            </a>
                        </div>
                        
                        
                        <?php $_SESSION['Category'] = 'All'; ?> 
                        <div id="Eat" class="w3-container menu w3-padding-48 w3-card" style="background:white">
                            <h5>有什麼想推薦的餐廳嗎？</h5>
                            <p class="w3-text-grey">歡迎登入來發表評論和留言喔！</p><br>
                            <hr class="w3-clear">
                            <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom" onclick = "location.href = 'http://localhost/AImportantHW/beta/view_article.php?kind=Eat&OrderBy=TimeNew'" style="width:150px;"><i class="fa fa-comment"></i>留言</button> 
                            <?php 
                                if($_SESSION['Category'] != 'Eat')
                                    $_SESSION['Category'] = 'Eat'; 
                            ?>
                        </div>

                        <div id="Drinks" class="w3-container menu w3-padding-48 w3-card" style="background:rgba(234, 246, 250, 0.63)">
                            <h5>有什麼想推薦的飲料嗎？</h5>
                            <p class="w3-text-grey">歡迎登入來發表評論和留言喔！</p><br>
                            <hr class="w3-clear">
                            <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom" onclick = "location.href = 'http://localhost/AImportantHW/beta/view_article.php?kind=Drink&OrderBy=TimeNew'" style="width:150px;"><i class="fa fa-comment"></i>留言</button> 
                            <?php 
                                if($_SESSION['Category'] != 'Drink')
                                    $_SESSION['Category'] = 'Drink'; 
                            ?>
                        </div>
                        <div id="Dessert" class="w3-container menu w3-padding-48 w3-card" style="background:rgba(255, 244, 244, 0.69)">
                            <h5>有什麼想推薦的甜品嗎？</h5>
                            <p class="w3-text-grey">歡迎登入來發表評論和留言喔！</p><br>
                            <hr class="w3-clear">
                            <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom" onclick = "location.href = 'http://localhost/AImportantHW/beta/view_article.php?kind=Dessert&OrderBy=TimeNew'" style="width:150px;"><i class="fa fa-comment" ></i>留言</button>
                            <?php 
                                if($_SESSION['Category'] != 'Dessert')
                                    $_SESSION['Category'] = 'Dessert'; 
                            ?>
                        </div>

                        <img src="pic/66.jpg" style="width:100%;max-width:1000px;margin-top:32px;">
                  </div>
            </div>
            <br><br><br><br>
            <!--google map-->
            <div class="w3-container" id="where" style="padding-bottom:32px;">
                <div class="w3-content" style="max-width:700px">
                    <h4 class="w3-center w3-padding-48"><span class="w3-wide" style = "border-bottom-style: solid;padding : 10px">WHERE TO FIND US</span></h4>
                    <div id="googleMap" style="width:100%;height:400px;"></div>
                </div>
                <br><br>
                <div class="w3-panel w3-leftbar w3-border-black w3-white w3-content" style="max-width:700px"><br>
                    <p>  營業時間 ： MON ~ FRI 08:00 ~ 17:00</p>
                    <p>  連絡電話 ： 0987-487 945</p>
                    <br>
                </div>
            </div>
            
            <!--google map function-->
            <script async defer
                     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmUgkZNoNZFbzGUBRVKoPL2vYJPSwhr5c&callback=initMap">
            </script>
            <script>
                  function initMap() {
                    var myLatLng = {lat: 25.066888, lng: 121.522243};
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
            <br><br><br>
            <!-- Contact/Area Container -->
            <div class="w3-container" id = "contact" style="padding-bottom:32px;" >
                <div class="w3-content" style="max-width:700px">
                    <h4 class="w3-center w3-padding-48"><span class="w3-wide" style = "border-bottom-style: solid;padding : 10px">CONTACT</span></h4>
                    <p><span class="w3-tag">※  有任何問題歡迎給我們回饋 ！</span></p><br>
                    <p>這封信將會寄到我們的信箱，但未必會<strong> " 立刻 " </strong>得到回覆，請耐心等待</p><br>
                    <form name = "form1" action="action_page.php" method = "post" target="_blank"> <!--target="_blank"-->
                        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="T1"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Subject" required name="T2"></p>
                        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Your email address" required name="T3"></p>
                        <p><textarea class="w3-input w3-padding-16 w3-border" rows="10" cols="60" placeholder="Message \ Special requirements" required name="T4"></textarea></p>
                        <p><button class="w3-button w3-black" type="submit" value = "submit">寄出信件</button></p>
                    </form>
                </div>
            </div>

            <!-- End page content -->

            <!-- Footer -->
            <footer class="w3-center w3-padding-48" style="background-color:#9098a0">
                <p style="color:#fff;"><a href="https://www.edu.tw/News_Content.aspx?n=9F932B3D33DCCF6B&sms=15283ECA9D7F60AA&s=C046940F587A693C">隱私權政策</a> | <a href="https://law.moj.gov.tw/LawClass/LawAll.aspx?PCode=I0050021">個人資料保護相關法律事項</a></p>
                <p style="color:#fff;">客服專線：02-0000-0000</p>
            </footer>

            <!--About jquery-->
            <script>
                // Tabbed Menu
                function openMenu(evt, menuName) {
                    var i, x, tablinks;
                    x = document.getElementsByClassName("menu");
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablink");
                    for (i = 0; i < x.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
                    }
                    document.getElementById(menuName).style.display = "block";
                    evt.currentTarget.firstElementChild.className += " w3-dark-grey";
                }
                document.getElementById("myLink").click();
            </script>
            
        </div>
        
    </body>
    
</html>
