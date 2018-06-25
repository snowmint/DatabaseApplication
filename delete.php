<?php
    session_start();
    include("mysql_connect.inc.php");
    include("head_admin.inc.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
    <head>
        <style>
            table {
                border-collapse:collapse;
                border: solid 2px #539df4;/*表全体を線で囲う*/
                text-align: center;
                left: 100px;
                margin-top:5%;
                margin-left:25%;
            }
            #sidebar_left{
                /*background-color:#FFECC9;*/
                width:25%;
                height:100%;
                padding-top:5%;
                text-align:center;
                line-height:400px;
                float:left;
            }
            #sidebar_right{
                /*background-color:#ffc9cb;*/
                width:35%;
                height:100%;
                padding-top:4.5%;
                text-align:center;
                line-height:400px;
                float:right;
            }
            #content{
                margin-left:25%;
                margin-right:30%;
                height:100%;
                padding-top:4%;
                /*background-color:#F2FFF2;*/
                text-align:center;
                line-height:400px;
            }
            #footer{
                clear:both;
                /*background-color:#FFD4D4;*/
                height:80px;
                text-align:center;
                line-height:80px;
            }
            table th{
                padding: 10px;
                text-align: center;
                border: dashed 2px #539df4;/**/
                background-color: aliceblue;
                /*破線 1px オレンジ*/
            }
            table td {
                padding: 10px;
                text-align:center;
                border: dashed 2px #539df4;/**/
                /*破線 1px オレンジ*/
            }
        </style>
    </head>
   <body>
     <div id="sidebar_left">
        <table style="top:100px;align:center;">
            <thead>
                <th>
                   ID
                </th>
                <th>
                    select to delete
                </th>
            </thead>
            <tbody>
                <form action="delete_finish.php" method="post" Enctype="multipart/form-data">
                <?php
                    if($_SESSION['ID'] != null) {
                        $sql = "SELECT * FROM user WHERE 1";
                        $res = mysqli_query($conn, $sql);
                        //$result = mysqli_fetch_array($res);
                        //echo "<tr>";
                        $i = 0;
                        while($result = mysqli_fetch_row($res)) {
                            echo "<tr><td>".$result[1]."</td>";
                            echo "<td><input name='choose' value='".$result[1]."' type='radio'/></td>";//<input name='choose".$i."' type='checkbox'/>
                            echo "</tr>";
                            $i++;
                        }
                        echo "<th colspan='2' style='text-align: left;'><input type='submit' name='button_em' value='刪除' style='width:100px;height:30px;border:2px blue none;color:#fff;background: #4b84c7;position:inherit;margin-top:10%;margin-left:60%;'></th>"; // onclick='return CheckFuncEM();'
                    }
                    else {
                        echo '您無權限觀看此頁面!';
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
                    }
                ?>
                </form>
            </tbody>
        </table>
      </div>
      
      <div id="sidebar_right">
         <table style="align:center;margin-left:4%;">
            <thead>
                <th>
                   ID
                </th>
                <th>
                   Commment
                </th>
                <th>
                    select to delete
                </th>
            </thead>
            <tbody>
                <form action="delete_finish.php" method="post" Enctype="multipart/form-data">
                <?php
                    if($_SESSION['ID'] != null) {
                        $sql = "SELECT * FROM comment WHERE 1";
                        $res = mysqli_query($conn, $sql);
                        //$result = mysqli_fetch_array($res);
                        //echo "<tr>";
                        $i = 0;
                        while($result = mysqli_fetch_row($res)) {
                            echo "<tr><td>".$result[1]."</td>";
                            echo "<td>".$result[3]."</td>";
                            echo "<td><input name='choose' value='".$result[0]."' type='radio'/></td>";//<input name='choose".$i."' type='checkbox'/>
                            echo "</tr>";
                            $i++;
                        }
                        echo "<th colspan='3' style='text-align: left;'><input type='submit' name='button_co' value='刪除' style='width:100px;height:30px;border:2px blue none;color:#fff;background: #4b84c7;position:inherit;margin-top:10%;margin-left:60%;'></th>"; // onclick='return CheckFuncEM();'
                    }
                    else {
                        echo '您無權限觀看此頁面!';
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
                    }
                ?>
                </form>
            </tbody>
        </table>
      </div>
      <div id="content">
        <table style="margin-left:0%;align:center;">
            <thead>
                <th>
                   ID
                </th>
                <th>
                   Post_title
                </th>
                <th>
                    select to delete
                </th>
            </thead>
            <tbody>
                <form action="delete_finish.php" method="post" Enctype="multipart/form-data">
                <?php
                    if($_SESSION['ID'] != null) {
                        $sql = "SELECT * FROM post WHERE 1";
                        $res = mysqli_query($conn, $sql);
                        //$result = mysqli_fetch_array($res);
                        //echo "<tr>";
                        $i = 0;
                        while($result = mysqli_fetch_row($res)) {
                            echo "<tr><td>".$result[6]."</td>";
                            echo "<td>".$result[1]."</td>";
                            echo "<td><input name='choose' value='".$result[0]."' type='radio'/></td>";//<input name='choose".$i."' type='checkbox'/>
                            echo "</tr>";
                            $i++;
                        }
                        echo "<th colspan='3' style='text-align: left;'><input type='submit' name='button_po' value='刪除' style='width:100px;height:30px;border:2px blue none;color:#fff;background: #4b84c7;position:inherit;margin-top:10%;margin-left:60%;'></th>"; // onclick='return CheckFuncEM();'
                    }
                    else {
                        echo '您無權限觀看此頁面!';
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
                    }
                ?>
                </form>
            </tbody>
        </table>
        
      </div>
      <div id="footer">
        <table style="margin-left:25%;align:center;">
            <thead>
                <th>
                   UserIdx
                </th>
                <th>
                   Comment_reply
                </th>
                <th>
                    select to delete
                </th>
            </thead>
            <tbody>
                <form action="delete_finish.php" method="post" Enctype="multipart/form-data">
                <?php
                    if($_SESSION['ID'] != null) {
                        $sql = "SELECT * FROM comment_reply WHERE 1";
                        $res = mysqli_query($conn, $sql);
                        $i = 0;
                        while($result = mysqli_fetch_row($res)) {
                            echo "<tr><td>".$result[2]."</td>";
                            echo "<td>".$result[3]."</td>";
                            echo "<td><input name='choose' value='".$result[0]."' type='radio'/></td>";//<input name='choose".$i."' type='checkbox'/>
                            echo "</tr>";
                            $i++;
                        }
                        echo "<th colspan='3' style='text-align: left;'><input type='submit' name='button_re' value='刪除' style='width:100px;height:30px;border:2px blue none;color:#fff;background: #4b84c7;position:inherit;margin-top:10%;margin-left:60%;'></th>"; // onclick='return CheckFuncEM();'
                    }
                    else {
                        echo '您無權限觀看此頁面!';
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
                    }
                ?>
                </form>
            </tbody>
        </table>
        <br><br><br>
      </div>
    </body>
</html>