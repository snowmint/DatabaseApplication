<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

$db_server = "localhost";
$db_name = "beta";
$db_user = "root";
$db_passwd = "";

$conn = mysqli_connect($db_server,$db_user,$db_passwd,$db_name);
mysqli_query($conn,"SET NAMES 'UTF8'");

?>
