<?php
include("session.php"); 
include("include/database.php");

$per_page = 25; 
if($_GET)
{
$page=$_GET['page'];
}
$start = ($page-1)*$per_page;
$que="select * from form order by stud_id desc limit $start,$per_page";
$res=mysql_query($que);

?>

		<table class="emp_tab">        
		<tr class='menu_header'>
        <td>Stud Id</td>
        <td>Name</td>
        <td>Address</td>
        <td>Contact No</td>
        <td>Email Id</td>
        <td>Total Fee</td>
        </tr>
		
		<?php
		$sql = "select * from form";
        $rsd = mysql_query($sql);
        while($row=mysql_fetch_array($rsd))
      {
		  $ta=$row[11];   //student Fee
	      $id=$row[0];
		  
          $sql1 = "select *,SUM(p_amt) as amt from partial_payment where s_id='$id' ";
	      $rsd1 = mysql_query($sql1);
		  //$cnt=mysql_num_rows($rsd1);
		  
		  
		if($row1=mysql_fetch_array($rsd1))
		{
			$ta1=$row1['amt'];	//paid fee
	        $id=$row1[1];
	        if( $ta1<$ta)
	     {
			echo "<tr class='pagi'>";
			echo "<td width='80'>";
			echo $row[0];
			echo "</td>";
			echo "<td>";
			echo $row[1] ;
			echo "</td>";
			echo "<td width='250'>";
			echo $row[4];
			echo "</td>";
			echo "<td width='160'>";
			echo $row[5];
			echo "</td>";
			echo "<td width='250'>";
			echo $row[7];
			echo "</td>";
			echo "<td>";
			echo $row[11];
			echo "</td>";
		 }
	  }
   }
		?>        
        </table>