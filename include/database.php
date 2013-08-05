<?php
$server="localhost";
$username="root";
$password="";
$database="navin";

$con=mysql_connect($server,$username,$password);
	mysql_select_db($database,$con);
?>