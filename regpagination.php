<?php
include("session.php"); 
include("include/database.php");
$per_page = 30; 
if($_GET)
{
$page=$_GET['page'];
}
if(isset($_REQUEST['batch']))
{
$batch=$_REQUEST['batch'];
if($batch==1)
$bat='';
else
$bat="where batch='$batch'";
}else
$bat='';

$start = ($page-1)*$per_page;
echo $que="select * from form $bat order by stud_id desc limit $start,$per_page";
$res=mysql_query($que);
?>

		<table class="emp_tab">        
		<tr class='menu_header'>
        <td>S Id</td>
        <td>Name</td>
        <td>Address</td>
        <td>Batch</td>
        <td>Contact No</td>
        <td>Email Id</td>
        <td colspan="2">Action</td>
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
			echo "<td width='140'>";
			echo $row[8];
			echo "</td>";
			echo "<td>";
			echo $row[5];
			echo "</td>";
			echo "<td>";
			echo $row[7];		
			echo "</td>";
			echo "<td class='print' width='100'>";
			echo "<a href='regupdate.php?id=$row[0]'>Update</a>";		
			echo "</td>";
			echo "<td class='print' width='100'>";
			echo "<a href='viewreg.php?id=$row[0]'>View</a>";		
			echo "</td>";
			echo "</tr>";
		}
		?>        
        </table>