<?php
include("session.php"); 
error_reporting(0);
include("include/database.php");

$id=$_REQUEST['id'];

$qry="select * from form where stud_id='$id'";
$res=mysql_query($qry);
$row=mysql_fetch_array($res);

$qry_d="select * from partial_payment where s_id='$id'";
$res_d=mysql_query($qry_d);

$qry_sum="select SUM(p_amt) from partial_payment where s_id='$id'";
$res_sum=mysql_query($qry_sum);
$row_sum=mysql_fetch_array($res_sum);

$bal=$row[11]-$row_sum[0];


	if(isset($_REQUEST['e_add']))
	{
 		
 		$t2=$_POST['t2'];
		$date=date('Y-m-d', strtotime($t2));
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		$pa_qry="insert into partial_payment(s_id,p_date,p_mode,p_check,p_amt) values('".$id."','".$date."','".$t3."','".$t4."','".$t5."')";
		$pa_res=mysql_query($pa_qry);
		
		if($pa_res)
		{
			header("location:pay.php?id=$id");
		}
		else
		{
			echo "error";
		}
	}
	
	if(isset($_REQUEST['e_can']))
	{
		header("location:payment.php");
	}
	
	$d=date('d-m-Y');
?>
<html>
<head>
<title>Navin's Dance Academy</title>
<link rel="stylesheet" href="styles2.css" type="text/css" />
<link rel="stylesheet" href="styles2.css" type="text/css" />
<link rel="stylesheet" href="styles.css" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>

</head>
<body>
<div id="container">
	 <div id="sub-header">
     <div id="nav">
     <ul class="sf-menu dropdown">
    	<?php
			include("header.php");
		?>
        </ul>
        </div>
        
       	<br />
		<div class="quotation"><center><?php echo "Student Name:-".$row[1]; ?></center></div>
        <div>
        <br />
        <table class="detail">
        <tr class="menu_header">
        <td width="80">Date</td>
        <td width="180">Payment Mode</td>
        <td>Cheque No</td>
        <td width="120">Amount</td>
        </tr>
        <?php
		while($row_d=mysql_fetch_array($res_d))
		{
			echo "<tr class='pagi'>";
			echo "<td>";
			echo date('d-m-Y', strtotime($row_d[3]));
			echo "</td>";
			echo "<td>";
			echo $row_d[2];
			echo "</td>";
			echo "<td>";
			echo $row_d[4];
			echo "</td>";
			echo "<td>";
			echo $row_d[5].'&nbsp;'.'Rs/-';
			echo "</td>";
			echo "</tr>";
		}
		?>
        <tr class="pagi">
        <td width="50"></td>
        <td></td>
        <td>Total Paid Amount</td>
        <td><?php echo $row_sum[0].'&nbsp;'.'Rs/-'; ?></td>
        </tr>
        <tr class="pagi">
        
        <td width="50"></td>
        <td></td>
        <td>Total Fees</td>
        <td><?php echo $row[11].'&nbsp;'.'Rs/-'; ?></td>
        </tr>
        
		<tr class='menu_header'>
			
		<td width='50'></td>
		<td></td>
		<td>Balance</td>
		<td><?php echo $bal."&nbsp;Rs/-"; ?></td>
		</tr>
		
        </table>
        <form name="form1" action="" method="post">
        <table class="pay">
        <tr class="menu_header"><td colspan="2">Client Payment</td></tr>
        <tr>
        <td class="l_form">Student Id:</td>
        <td><input id="ename" type="text" readonly class="q_in" name="t1" value="<?php echo $id; ?>"></td>
        </tr>
        <tr>
        <td class="l_form">Date:</td>
        <td><input id="des" type="text" class="q_in" name="t2" value="<?php echo $d; ?>"></td>
        </tr>
        
        <tr>
        <td class="l_form">Payment Mode:</td>
        <td>
        <select class="a" name="t3" onChange="display(this,'text','image');">
        <option name="image">Cheque</option>
        <option name="text">Cash</option>
        </select>
        </td>
        </tr>
       
		
        <tr>
        <td class="l_form">Cheque No:</td>
        <td><input id="contact" type="text" class="q_in" name="t4"></td>
        </tr>
        
        <tr>
        <td class="l_form">Total Fees:</td>
        <td><input id="ename" type="text" readonly class="q_in" value="<?php echo $row[11]; ?>"></td>
        </tr>
        
        <tr>
        <td class='l_form'>Pay Amount:</td>
        <td><input id="i_amt" type="text" class="q_in" name="t5"></td>
        </tr>
		
        </table>
        <div class="pay_button">
         <input name="e_add" class="formbutton" value=" Add " type="submit" onClick="javascript:return validateMyForm();" />
         <input name="e_can" class="formbutton" value="Cancel" type="submit" />
        </div>
        
        </form>
    </div>
    </div>
        
    
    	<div class="clear"></div>
    </div>
</div>
 <div id="footer">
     <div class="clear"></div> 
    </div>
    </div>
</body>
</html>
