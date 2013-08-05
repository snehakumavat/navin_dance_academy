<?php
	include("session.php");
?>
<?php
include('include/database.php');
// Get values from form
if(isset($_POST['Submit']))
{ 
 
$name=$_POST['name'];
$gender=$_POST['gender'];
$pic=$_FILES['pic'];
$address=$_POST['address'];
$contact=$_POST['contact'];
$occupation=$_POST['occupation'];
$email=$_POST['email'];
$batch=$_POST['batch'];
$time=$_POST['time'];
$venue=$_POST['venue'];
$fees=$_POST['fees'];


// Insert data into mysql 
 $sql="INSERT INTO form(name,gender,pic,address,contact,occupation,email,batch,time,venue,fees)VALUES('$name', '$gender', '$pic','$address','$contact','$occupation','$email','$batch','$time','$venue','$fees')";
$result=mysql_query($sql);
// if successfully insert data into database, displays message "Successful". 
if($result)
{
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
             <td> <input type="text" name="name" class="q_in"   /></td>
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
<td><textarea name="address" rows="3" class="q_add"  id="address" ></textarea></td>
</tr>
<tr>
<td> Contact No: </td>
<td> <input type="text" name="contact" id="contact"  class="q_in"       />
</td>
</tr>
</table>
<table class="q_info4">
<tr>
<td> Occupation:</td>
<td> <input type="text" name="occupation" id="occupation"    class="q_reg"    /> </td>
</tr>

<tr>
<td>Email:</td>
<td> <input type="text" name="email" id="email"   class="q_reg"     /> </td>
</tr>

<tr>
<td>Batch:</td>
<td> <input type="text" name="batch" id="batch"    class="q_reg"    /> </td>
</tr>
<tr>
<td>Time:</td>
<td> <input type="text" name="time" id="time"   class="q_reg"     /> </td>
</tr>
<tr>
<td>Venue:</td>
<td> <input type="text" name="venue" id="venue"   class="q_reg"     /> </td>
</tr>
<tr>
<td>Fees Per Month:</td>
<td> <input type="text" name="fees" id="fees"   class="q_reg"     /> </td>
</tr>

</table>
<div class="reg_button">
<input type="submit" name="Submit" class="formbutton" value="Submit" onclick="javascript:return Validation();" >
<input type="submit" name="Cancel" class="formbutton" value="Cancel">
</div>
</form>
</div>
</div>
</body>
</html>