<?php session_start(); ?>
<?php
include("head_line.inc.php");
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";

echo "<img src = './pic/logoutSuccess.png' width='90%' style='display:block; margin:auto;'>";
echo "<meta http-equiv=REFRESH CONTENT=1;url=Top.php>";
?>
<?php session_unset();?>