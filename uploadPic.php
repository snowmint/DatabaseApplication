<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
    $db_server = "localhost";
    $db_name = "beta";
    $db_user = "root";
    $db_passwd = "tdhudinm0437";

    $conn = mysqli_connect($db_server,$db_user,$db_passwd,$db_name);
    mysqli_query($conn,"SET NAMES 'UTF8'");
?>

<?php
 //取得上傳檔案資訊
 $filename=$_FILES['image']['name'];
 $tmpname=$_FILES['image']['tmp_name'];
 $filetype=$_FILES['image']['type'];
 $filesize=$_FILES['image']['size'];    
 $file=NULL;
 if(isset($_FILES['image']['error'])){    
    if($_FILES['image']['error']==0){ 
      $instr = fopen($tmpname,"rb" );
      $file = addslashes(fread($instr,filesize($tmpname)));      
   }
 }
 
    //新增圖片到資料庫
 //$conn=mysql_pconnect("127.0.0.1","test","1234");        
 //mysql_select_db("test");
 //mysql_query("SET NAMES'utf8'");
   $sql=sprintf("insert into imageDB(image)values(%s)","'".$file."'");
   mysqli_query($conn, $sql);
   mysql_close($conn);
?>