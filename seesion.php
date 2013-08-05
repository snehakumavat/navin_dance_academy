<?php

session_start();
if(!isset($_SESSION['uname']) && !isset($_SESSION['password']))
{
 header("Location: index.php?msg=1");
} 
?>