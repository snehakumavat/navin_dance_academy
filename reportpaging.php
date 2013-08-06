<?php
include("session.php"); 
include("include/database.php");

$per_page = 15; 
if($_GET)
{
$page=$_GET['page'];
}
$start = ($page-1)*$per_page;
 $que="select * from sms order by id desc limit $start,$per_page";
$res=mysql_query($que);

?>

		<table class="emp_tab">        
		<tr class='menu_header'>
        <td width='80'>SR No</td>
        <td width='100'>Name</td>
        <td width='100'>Reciever</td>
        <td width='180'>Responce</td>
        <td>date</td>
        </tr>
		
		<?php
		        		  
		while($row=mysql_fetch_array($res))
		{
			$query="select name from form where stud_id='$row[1]'";
			$ans=mysql_query($query);
			$result=mysql_fetch_array($ans);
			echo "<tr class='pagi'>";
			echo "<td >";
			echo $row[0];
			echo "</td>";
			echo "<td>";
			echo $result[0];
			echo "</td>";
			echo "<td>";
			echo $row[2] ;
			echo "</td>";
			echo "<td width='250'>";
			echo $row[4];
			echo "</td>";
			echo "<td width='160'>";
			echo $row[5];
			echo "</td>";
					
	  }
  
		?>        
        </table>