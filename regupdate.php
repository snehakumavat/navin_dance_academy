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
$date= $_POST['date'];      //date('Y-m-d',strtotime($_POST['date']));
$remark=$_POST['remark'];


$uploadDir = 'imgs/';
if($_FILES['pic']['name']!='')
		{
		$fileName = $_FILES['pic']['name'];
		$appendval=time();
		$fileName=$appendval.$fileName;				
		$tmpName  = $_FILES['pic']['tmp_name'];
		$fileSize = $_FILES['pic']['size'];
		$fileType = $_FILES['pic']['type'];
		$filePath = $uploadDir . $fileName;
		$result = move_uploaded_file($tmpName, $filePath);
	$sql="update form SET name='$name',gender='$gender',pic='$filePath',address='$address',contact='$contact',
    occupation='$occupation',email='$email',batch='$batch',time='$time',venue='$venue',fees='$fees' ,remark='$remark',date='$date' where stud_id='$id'";
		}
		else
		{
			$sql="update form SET name='$name',gender='$gender',address='$address',contact='$contact',
    occupation='$occupation',email='$email',batch='$batch',time='$time',venue='$venue',fees='$fees' ,remark='$remark',date='$date' where stud_id='$id'";

			}
		

// Insert data into mysql 
   
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
	header("location:reg.php");
}
?> 



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="styles2.css" type="text/css" />
<link rel="stylesheet" href="styles.css" type="text/css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Navin's Dance Academy</title>
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<link rel="stylesheet" type="text/css" media="all" href="calender/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="calender/jsDatePick.min.1.3.js"></script>
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%Y-%m-%d"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
		});
	};
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
        <form name="form1" action="" method="post" enctype="multipart/form-data">
        
      <table class="q_info3">
            <tr>
             <td>Name:</td>
             <td> <input type="text" name="name" class="q_reg" value="<?php echo $row[1]; ?>"/></td>
            </tr>

           <tr>
        <td>Gender: </td>
<td>
    <p>
        <input type="radio" name="gender" id="gender" value="Male" checked="checked"/> Male	
        <input type="radio" name="gender" id="gender" value="Female" /> Female
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
<tr>
<td>Date:</td>
<td>
    <input id="inputField" name="date" size='12'  title='YYYY-mm-d' value="<?php echo $row[13]; ?>"  /> 
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
<td>		
        <select name="batch" id="batch">
<option value="0">Select</option>
<?php

        $batch="select * from batch";
		$rest=mysql_query($batch);
		if($rest === FALSE) {die(mysql_error()); }// TODO: better error handling						
		while($rows=mysql_fetch_array($rest))
		{		
			if($row[8]==$rows[1]) 
			echo "<option value='$rows[1]' selected='selected' >$rows[1]</option>";
			else
			echo "<option value='$rows[1]'>$rows[1]</option>";
		}
		?>
        </select>  
</td>
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
<td>Fee per Month</td>
<td> <input type="text" name="fees" id="fees"  class="q_reg" value="<?php echo $row[11]; ?>"     /> </td>
</tr>
<tr>
<td>Remark:</td>
<td>
    <textarea class="q_add" name="remark"><?php echo $row[12]; ?></textarea>
    </td>
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