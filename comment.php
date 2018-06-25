//Unuse!!


<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
    include("head_line.inc.php");
    include("mysql_connect.inc.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Comment</title>       
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
        <h1>Leave a Comment !</h1>
            
        <form action="disable_function.php" method="post" Enctype="multipart/form-data">
            
            <table>
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
					<td>留言內容：</td>
					<td><br><textarea name="content" rows="10" cols="65" style="text-align: left;"><?php 
						if(isset($content)){
							echo $content;
						}
					?></textarea></td>
				</tr>
				<tr>
					<td colspan="2" style = "text-align: center;"> 
						<!--<a class="btn" href="./test.html" >取消background-color:#2f4967;</a>-->
                        <br><br><br>
                        <!--<a style= "color:#000000;" href = "./test.html">取消</a>-->
                        <input type="button" value="not now" style="width:120px;height:40px;border:2px blue none;color:#fff;background: #898989;position:absolute;right:220px; " onclick = "location.href = 'Top.php'">
                        <input type="hidden" name="currentState" id=""/>
						<input id='commentbutton' name = "ensure" type="submit" value="submit" style="width:120px;height:40px;border:2px blue none;color:#fff;background: #000;position:absolute;right:60px;">
						
					</td>
				</tr>
			</table>
        </form>
        </div>
        <script>
            
        </script>
    </body>
</html>
