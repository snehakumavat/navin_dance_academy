<?php
	include("session.php");
?>
<?php
include('include/database.php');
// Get values from form
$id=$_REQUEST['id'];
$qry="select * from form where stud_id='$id'";
$res=mysql_query($qry);
$row=mysql_fetch_array($res);

if(isset($_POST['Cancel']))
{
	header("location:home.php");
}
?> 

<?php 
// close connection 
mysql_close();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="styles2.css" type="text/css" />
<link rel="stylesheet" href="styles2.css" type="text/css" />
<link rel="stylesheet" href="styles.css" type="text/css" />


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Navin's Dance Academy</title>
<style type="text/css">
td {
	text-align:center;
	color:#FFF;
	}
	
textarea{
	resize:none;
	overflow:hidden;
	}
 h2{
	color:#FFF;
		}
</style>

</head>
<body oncontextmenu="return false;">
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
          REGISTRATION FORM
          
        </center>
        <input type="button" style="background:#0CF; width:100px; background-color:#09F"  value="Back"  onClick="javascript:window.history.back();">
      </div>
      <div>
      
<table class="q_info3">
<tr>
<td colspan="2"><?php echo "<img src='$row[3]' width='100' height='100'>"; ?></td>
</tr>

<tr>
<td>Name:</td>
<td><?php echo $row[1]; ?> </td>
</tr>
<tr>
<td>Gender: </td>
<td><?php echo $row[2]; ?></td>
</tr>

<tr>
<td> Address :</td>
<td><?php echo $row[4]; ?> </td>
</tr>

<tr>
<td> Contact No: </td>
<td><?php echo $row[5]; ?> 
</td>
</tr>
<tr>
<td> Date: </td>
<td><?php echo $row[13]; ?> 
</td>
</tr>
</table>
<table class="q_info4">
<tr>
<td> Occupation:</td>
<td> <?php echo $row[6]; ?></td>
</tr>

<tr>
<td>Email:</td>
<td><?php echo $row[7]; ?> </td>
</tr>

<tr>
<td>Batch:</td>
<td><?php echo $row[8]; ?> </td>
</tr>
<tr>
<td>Time:</td>
<td><?php echo $row[9]; ?> </td>
</tr>
<tr>
<td>Venue</td>
<td><?php echo $row[10]; ?></td>
</tr>
<tr>
<td>Fees</td>
<td><?php echo $row[11]; ?> </td>
</tr>
<tr>
<td>Remark: </td>
<td><?php echo $row[12]; ?> 
</td>
</tr>

</table>

</div>
</div>
</body>
</html>