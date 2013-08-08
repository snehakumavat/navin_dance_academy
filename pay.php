<?php
include("session.php"); 
error_reporting(0);
include("include/database.php");

$id=$_REQUEST['id'];
$qry="select * from form where stud_id='$id'";
		$res=mysql_query($qry);
		$row=mysql_fetch_array($res);
		
	

	if(isset($_REQUEST['e_add']))
	{
		$date=$_POST['date_month'];
		$year=$_POST['year'];
	$qry_sum="select *,SUM(p_amt) as amt from partial_payment where s_id='$id' and p_date=$date";
		$res_sum=mysql_query($qry_sum);
		$row_sum=mysql_fetch_array($res_sum); 
		$bal=$row[11]-$row_sum['amt'];
		//echo "$bal<=0";		
		if($bal<=0 )
		{
			header('Location:pay.php?res='.$date.'&yearp='.$year.'&id='.$id);
		}else
		{ 		
 		$t2=$_POST['t2'];
		
		$t3=$_POST['t3'];
		$t4=$_POST['t4'];
		$t5=$_POST['t5'];
		$pa_qry="insert into partial_payment(s_id,p_date,p_mode,p_check,p_amt,p_year) values('".$id."','".$date."','".$t3."','".$t4."','".$t5."','".$year."')";
		$pa_res=mysql_query($pa_qry);		
		if($pa_res)
		{
			header("location:pay.php?date=$date&year_n=$year&id=$id");
		}
		else
		{
			echo "error";
		}
		}
	}
	
	if(isset($_REQUEST['e_can']))
	{
		header("location:payment.php");
	}
		


?>
<html>
<head>
<title>Navin's Dance Academy</title>
<link rel="stylesheet" href="styles2.css" type="text/css" />
<link rel="stylesheet" href="styles2.css" type="text/css" />
<link rel="stylesheet" href="styles.css" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
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
		
        <form action="" method="post" name="data">
        <table class="quotation">
        <tr>
        <td width="700px">
       <?php echo date_dropdown();?>
        <?php yearDropdown(); 	?>
        <input type="submit" value="Search" name="submit" class="go">
        </td>
        <td > 
        <?php echo "Student Name:-".$row[1]; ?>
        </td>

        </tr>
        </table>
        </form>
        
        <br />
        <table class="detail">
        <tr class="menu_header">
        <td width="80">Date</td>
        <td width="180">Payment Mode</td>
        <td>Cheque No</td>
        <td>Fees</td>
        <td width="120">Paid</td>
        <td>Remaing</td>
        
        
        </tr>
        <?php
		if($_REQUEST['res'] && $_REQUEST['yearp'])
		{
		$rest=$_REQUEST['res'];
		$year=$_REQUEST['yearp'];
		}elseif( $_REQUEST['date']&& $_REQUEST['n_year'])
		{
		$rest=$_REQUEST['date'];
		$year=$_REQUEST['n_year'];
		}
		if($_REQUEST['submit'])
		{
		$rest=$_REQUEST['date_month'];
		$year=$_REQUEST['year'];
		}
		$qry_d="select * from partial_payment where s_id='$id' and p_date='$rest' and p_year='$year'";
		$res_d=mysql_query($qry_d);
		
		$qry_sum="select *,SUM(p_amt) as amt from partial_payment where s_id='$id' and p_date='$rest'and p_year='$year'";
		
		$res_sum=mysql_query($qry_sum);
		$row_sum=mysql_fetch_array($res_sum); 
		$bal=$row[11]-$row_sum['amt'];
		
		while($row_d=mysql_fetch_array($res_d))
		{
			
			echo "<tr class='pagi'>";
			echo "<td>";			
			$pre=date('F',mktime(0,0,0,$row_d[3],10));			
			echo $pre;							
			echo "</td>";
			echo "<td>";
			echo $row_d[2];
			echo "</td>";
			echo "<td>";
			echo $row_d[4];
			echo "</td>";
			echo "<td>";
			echo $row[11].'&nbsp;'.'Rs/-';
			echo "</td>";
			echo "<td> $row_d[5] Rs/- </td>";
			$remain=$row[11]-$row_d[5];			
			$bal1+=$row_d[5];
			
			$remain=$row[11]-$bal1;	
			echo "<td>$remain Rs/- </td>";

			echo "</tr>";
		}
		
		
function date_dropdown($year_limit = 0)
{
        $html_output = '<div id="date_select" >'."\n";
           /*months*/
        $html_output .= '<select name="date_month" id="month_select" >'."\n";
        $months = array("", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		$m=date('n');
            for ($month = 1; $month <= 12; $month++) {
				
			if($month==$m)				                
			{
					$html_output .= '<option value="' . $month . '" selected >' . $months[$month] . '</option>'."\n";
			}
			else
			{
				$html_output .= '<option value="' . $month . '" >' . $months[$month] . '</option>'."\n";
			}
            }
        $html_output .= '           </select>'."\n";

    return $html_output;
}		
function yearDropdown($id="year" ){ 
    //start the select tag	
	 $endyear=(date('Y')+20) ;
	 $year=date('Y');
	 	
    echo "<select id=".$id." name=".$id.">n"; 
          
        //echo each year as an option     
        for ($i=date('Y')-13;$i<=$endyear;$i++){ 
		if($i==$year)
        echo "<option value='".$i."' selected>".$i."</option>";     
		else
		echo "<option value='".$i."'>".$i."</option>";     
        } 
      
    //close the select tag 
    echo "</select>"; 
} 
	
		?>
        
        
		<tr class='menu_header'>
			
		<td colspan="6"></td>
		
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
        <td class="l_form">Select Month:-</td>
        <td>
		<?php
        	echo date_dropdown();
		?>
        </td>
       
        </tr>
        <tr>
        <td>Select Year:-</td>
        <td>		
		<?php
       	 yearDropdown();  
		
		?></td>
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
        <?php
        if(isset($_REQUEST['res'])&&isset($_REQUEST['yearp']))
		{
			$month=date(F,mktime(0,0,0,$_REQUEST['res'],10));
			$yer=$_REQUEST['yearp'];
			echo "<center><font  color='#CC0000' size='+2'>Fees for $month $yer is completed please select next month</font>";
			}
		?>
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
