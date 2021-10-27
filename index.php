<?php

date_default_timezone_set('Asia/Bangkok');
header ('Content-type: text/html; charset=utf-8');

$cdate_full = date("Y-m-d H:i:s"); 
echo "cdate_full = ".$cdate_full."<br>";
echo "Hello World!!! 01<br>";
echo "<a href='./folder01/' target='_parent'>folder01/</a><br>";
echo "<a href='./connect.php' target='_parent'>connect.php/</a><br>";

?>
