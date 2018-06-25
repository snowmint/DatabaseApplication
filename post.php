<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
    include("head_line.inc.php");
    include("mysql_connect.inc.php");
    if(!empty($_SESSION['admin'])) include("head_admin.inc.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Post</title>
        <!--<link href = "styleForPost.css" type = "text/css" rel = "stylesheet">-->
        
    <style>
            table {
              background-color: white;
              margin-left: 50px auto; 
              margin-right: auto;
              margin: 100px auto;
              overflow-y: scroll;
              position: absolute;
              width: 800px;
            }
            h1 {
              font-family: "Inconsolata", sans-serif;
              color : white;
              background-color:black;
              margin-top: 100px;
              margin-left: 50px auto; 
              margin-right: auto;
              margin: 100px auto;
              text-align: center;
              width: 950px;
            }
            .cont {
                height: 200px;
                width: 450px;
                position: absolute;     /*絕對位置*/
                top: 0%;
                left: 20%; 
                margin-left: auto; 
                margin-right: auto;

            }
        </style>
        <style>
            .rating {
              display: inline-block;
              position: relative;
              bottom: 500px;
              top: 10px;
              left : 0px;
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
        </style>
        <script>$(':radio').change(function() {
              console.log('New star rating: ' + this.value);
            });
        </script>
    </head>
    <body>
        <div class = "cont"> <!-- style="text-align: center;"-->
        <?php //include("startest.php");?>
        <h1>Post the Article !</h1>
            <?php
                //include("startest.php");
            ?>
        <form action="post_function.php" method="post" Enctype="multipart/form-data">
            
            <table>
				<tr>
					<td>標題：</td>
					<?php if(isset($title)){ ?>
						<td><input style="width:510px;height:50px;text-align: center;" type="text" name="title" 
							value="<?=htmlspecialchars($title)?>" /></td>
					<?php }else{ ?>
						<td><input style="width:510px;height:50px;text-align: left;" type="text" name="title" /></td>
					<?php } ?>
				</tr>
                <tr>
                    <td><br>分類：</td>
                    <td>
                        <br>
                            <input type="radio" name="category" value="正餐"/> 正餐
                            <input type="radio" name="category" value="飲品"/> 飲品
                            <input type="radio" name="category" value="甜點"/> 甜點
                        <br>
                    </td>
                </tr>
                <tr>
                    <td><br>星星：</td>
                    <td>
                      <div class = "rating">
                          <label>
                            <input type="radio" name="stars" value="1" />
                            <span class="icon">★</span>
                          </label>
                          <label>
                            <input type="radio" name="stars" value="2" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                          </label>
                          <label>
                            <input type="radio" name="stars" value="3" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>   
                          </label>
                          <label>
                            <input type="radio" name="stars" value="4" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                          </label>
                          <label>
                            <input type="radio" name="stars" value="5" />
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                            <span class="icon">★</span>
                          </label>
                        </div>
                    </td>
                </tr>
				<tr>
					<td>內容評論：</td>
					<td><br><textarea name="content" rows="10" cols="65" style="text-align: left;"><?php 
						if(isset($content)){
							echo $content;
						}
					?></textarea><br><br>
					</td>
				</tr>
                <tr>
                   <td style="background-color:#fff;top:20%;">地址：<br><br><br><br></td>
                   <td>
                        <br><input name="ConstructionADD" type="text" id="ConstructionADD" size="50" maxlength="50" onchange="codeAddress()"/>
                        <p align="left">
                        經度
                        <input name="Longitude" type="text" id="Longitude" size="10" maxlength="10" readonly="readonly"/>
                        緯度
                        <input name="Latitude" type="text" id="Latitude" size="10" maxlength="9" readonly="readonly"/>
                        </p><br>
                    </td>
                </tr>
                <tr>
                    <td>附加圖片上傳：</td>
                    <td><input type="file" name="image" id = "image"/></td>
                    
                </tr>
				<tr>
					<td colspan="2" style = "text-align: center;"> 
						<!--<a class="btn" href="./test.html" >取消background-color:#2f4967;</a>-->
                        <br><br><br>
                        <!--<a style= "color:#000000;" href = "./test.html">取消</a>-->
                        <input type="button" value="not now" style="width:120px;height:40px;border:2px blue none;color:#fff;background: #898989;position:absolute;right:220px; " onclick = "location.href = 'Top.php'">
                        
						<input name = "ensure" type="submit" value="submit" style="width:120px;height:40px;border:2px blue none;color:#fff;background: #000;position:absolute;right:60px;" onclick="return CheckFunc();">
						
					</td>
				</tr>
			</table>
        </form>
        </div>
    </body>
</html>
<script>
    function CheckFunc() {
        msg = "";
        if(document.forms[0].title.value == "") msg = "請輸入標題";
        else if(document.forms[0].category.value == "") msg = "請選擇分類";
        else if(document.forms[0].stars.value == "") msg = "請評分推薦度";
        else if(document.forms[0].ConstructionADD.value == "") msg = "請輸入地址";
        else if(document.forms[0].image.value == "") msg = "請選擇圖片";
        else return true;
        alert(msg);
        return false;
    }
</script>
<script>
     $(document).ready(function(){
        $('#insert').click(function() {
            var image_name = $('#image').val(); 
            if(image_name == ''){
                alert("Please Select another file!");
                return false;
            }
            else {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if(JQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                    alert('Invalid Image File');
                    $('#image').val('');
                    return false;
                }
            }
        });
         
     });
</script>
<script async defer
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmUgkZNoNZFbzGUBRVKoPL2vYJPSwhr5c&callback=initMap">
</script>
<script async defer 
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4Kdo8HKZ9R6OZL7nLx5r3zMNClEgTc04&callback=initMap">
</script>
<script>
    function codeAddress(){
        var add = document.getElementById("ConstructionADD");
        var Longitude = document.getElementById("Longitude");
        var Latitude = document.getElementById("Latitude");
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode( { address: add.value}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            Longitude.value = results[0].geometry.location.lng();
            Latitude.value = results[0].geometry.location.lat();
        } else {
            alert("Geocode was not successful for the following reason: " + status);
        }
        });
    }
</script>