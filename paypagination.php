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
        <td>S Id</td>
        <td>Name</td>
        <td>Address</td>
        <td>Contact No</td>
        <td>Email Id</td>
        <td>Total Fee</td>
        <td width="6%">Action</td>
        </tr>
		
		<?php
		while($row=mysql_fetch_array($res))
		{
			echo "<tr class='pagi'>";
			echo "<td width='80'>";
			echo $row[0];
			echo "</td>";
			echo "<td width='250'>";
			echo $row[1];
			echo "</td>";
			echo "<td width='160'>";
			echo $row[4];
			echo "</td>";
			echo "<td>";
			echo $row[5];
			echo "</td>";
			echo "<td>";
			echo $row[7];		
			echo "</td>";
			echo "<td>";
			echo $row[11];		
			echo "</td>";
			echo "<td class='print'>";
			echo "<a href='pay.php?id=$row[0]'>&nbsp;&nbsp;&nbsp;Pay&nbsp;&nbsp;&nbsp;</a>";		
			echo "</td>";
			echo "</tr>";
		}
		?>        
        </table>