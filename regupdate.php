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

if(isset($_POST['update']))
{ 
 
$name=$_POST['name'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$contact=$_POST['contact'];
$occupation=$_POST['occupation'];
$email=$_POST['email'];
$batch=$_POST['batch'];
$time=$_POST['time'];
$venue=$_POST['venue'];
$fees=$_POST['fees'];

// Insert data into mysql 
   $sql="update form SET name='$name',gender='$gender',address='$address',contact='$contact',
    occupation='$occupation',email='$email',batch='$batch',time='$time',venue='$venue',fees='$fees' where stud_id='$id'";

$result=mysql_query($sql);
// if successfully insert data into database, displays message "Successful". 
if($result){
header("location:reg.php");
}

else {
echo "ERROR";
}
}
if(isset($_POST['Cancel']))
{
	header("location:home.php");
}
?> 

<?php 
// close connection 
mysql_close();
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
<script language="javascript" type="text/javascript">
function Validation()
{
var a = document.form1.contact.value;
var name=document.form1.name.value;
if(name=='')
{
alert("please Enter the Name");
document.form1.name.focus();
return false;
}

else if(a=="")
{
alert("please Enter the Contact Number");
document.form1.contact.focus();
return false;
}
else if((a.length < 10) || (a.length > 10))
{
alert("Your Mobile Number must be 1 to 10 Integers");
return false;
}
else if(isNaN(a))
{
alert("Enter the valid Mobile Number(Like : 9566137117)");
document.form1.contact.focus();
return false;
}
}

</script>
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
          REGISTRATION FORM
        </center>
      </div>
      <div>
        <form name="form1" action="" method="post">
        
      <table class="q_info3">
            <tr>
             <td>Name:</td>
             <td> <input type="text" name="name" class="q_reg" value="<?php echo $row[1]; ?>"/></td>
            </tr>

           <tr>
        <td>Gender: </td>
<td>
    <p>
        <input type="radio" name="gender" id="gender" value="m" checked="checked"/> Male	
        <input type="radio" name="gender" id="gender" value="f" /> Female
    </p>
</td>
</tr>
<tr>
<td>Photo: </td>
<td><input type="file" name="pic" class="q_pho"  id="pic" /></td>

</tr>

<tr>
<td> Address : </td>
<td><textarea name="address" rows="3" class="q_add"  id="address" ><?php echo $row[4]; ?></textarea></td>
</tr>

<tr>
<td> Contact No: </td>
<td> <input type="text" name="contact" id="contact"  class="q_reg" value="<?php echo $row[5]; ?>"       />
</td>
</tr>
</table>
<table class="q_info4">
<tr>
<td> Occupation:</td>
<td> <input type="text" name="occupation" id="occupation"    class="q_reg" value="<?php echo $row[6]; ?>"    /> </td>
</tr>

<tr>
<td>Email:</td>
<td> <input type="text" name="email" id="email"   class="q_reg" value="<?php echo $row[7]; ?>"     /> </td>
</tr>

<tr>
<td>Batch:</td>
<td> <input type="text" name="batch" id="batch"    class="q_reg" value="<?php echo $row[8]; ?>"    /> </td>
</tr>
<tr>
<td>Time:</td>
<td> <input type="text" name="time" id="time"   class="q_reg" value="<?php echo $row[9]; ?>"   /> </td>
</tr>
<tr>
<td>Venue</td>
<td> <input type="text" name="venue" id="venue"   class="q_reg" value="<?php echo $row[10]; ?>"     /> </td>
</tr>
<tr>
<td>Fees</td>
<td> <input type="text" name="fees" id="fees"  class="q_reg" value="<?php echo $row[11]; ?>"     /> </td>
</tr>

</table>
<div class="reg_button">
<input type="submit" name="update" class="formbutton" value="Update" onclick="javascript:return Validation();">
<input type="submit" name="Cancel" class="formbutton" value="Cancel">
</div>
</form>
</div>
</div>
</body>
</html>