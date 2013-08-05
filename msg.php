<?php
	include("session.php");
include('include/database.php');
// Get values from form
if(isset($_POST['Submit']))
{ 
$name=$_POST['name'];

// Insert data into mysql 
 $sql="update msg set msg='".$name."' where msg_id=1";

$result=mysql_query($sql);
// if successfully insert data into database, displays message "Successful". 
}
if(isset($_POST['Cancel']))
{
	header("location:home.php");
}
?> 

<?php 
// close connection 
$query="select msg from msg";
$row=mysql_query($query);
$ans=mysql_fetch_array($row);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="styles2.css" type="text/css" />
<link rel="stylesheet" href="styles.css" type="text/css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Navin's Dance Academy</title>
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<style type="text/css">
	
textarea{
	resize:none;
	overflow:hidden;
	
	}
 h2{
	color:#FFF;
		}
</style>

</head>
<body>
<div id="container">
<div id="sub-header">	
<div id="nav">
     <ul class="sf-menu dropdown">
   
        	<?php include("header.php"); ?>
               
     </ul>
 </div>

     
      <br />
      <div class="quotation">
        <center>
         Message
        </center>
      </div>
      <div>
        <form name="form1" action="" method="post">
        
      <table style="margin-top:20px;margin-left:450px; height:200px;">
            <tr>
             <td style="color:#000">Message To Be Send:</td>
             <td><textarea name="name" rows="10" cols="50" ><?php echo $ans[0]; ?> </textarea></td>
            </tr>
        
</table>
<div class="reg_button1">
<input type="submit" name="Submit" class="formbutton" value="Submit">
<input type="submit" name="Cancel" class="formbutton" value="Cancel">
</div>
</form>
</div>
</div>
</body>
</html>