<?php
error_reporting(0);
include("include/database.php");

		$qry="select * from form where stud_id='$id'";
		$res=mysql_query($qry);
		$row=mysql_fetch_array($res);
		
		$qry_d="select * from partial_payment where s_id='$id'";
		$res_d=mysql_query($qry_d);
?>