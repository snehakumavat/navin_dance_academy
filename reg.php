<?php
include("session.php"); 
include("include/database.php");
error_reporting(0);
$per_page = 30; 
$sql = "select * from form";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page)
?>
<?php
if(isset($_REQUEST['submit']))
{
$batch=$_REQUEST['batch'];
}
?>

<html>
<head>
<title>Navin's Dance Academy</title>
<link rel="stylesheet" href="styles2.css" type="text/css" />
<link rel="stylesheet" href="styles2.css" type="text/css" />
<link rel="stylesheet" href="styles.css" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>

	<script type="text/javascript">
	
	$(document).ready(function(){
		
	//Display Loading Image
	function Display_Load()
	{
	    $("#loading").fadeIn(900,0);
	
	}
	//Hide Loading Image
	function Hide_Load()
	{
		$("#loading").fadeOut('slow');
	};
	

    //Default Starting Page Results
   
	$("#pagination li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
	
	Display_Load();
	
	$("#content").load("regpagination.php?page=1&batch=<?php if($batch!='') echo $batch; else echo 1; ?>", Hide_Load());



	//Pagination Click
	$("#pagination li").click(function(){
			
		Display_Load();
		
		//CSS Styles
		$("#pagination li")
		.css({'color' : '#0063DC'});
		
		$(this)
		.css({'color' : '#FF0084'})
		.css({'border' : 'none'});

		//Loading Data
		var pageNum = this.id;
		
		$("#content").load("regpagination.php?page=" + pageNum+"batch="+<?php if($batch!='') echo $batch; else echo 1; ?>, Hide_Load());
	});
	
	
});
	</script>
	
<style>
a
{
text-decoration:none;
color:#B2b2b2;

}

a:hover
{

color:#DF3D82;
text-decoration:underline;

}
#loading { 
width: 100%; 
position: absolute;
}

#pagination
{
text-align:center;
color:#6F0;
margin-left:10px;
margin-top:0px;
}
#pagination li {	
list-style: none; 
float: left; 
margin-right: 16px; 
padding:5px;3 
color:#FFF;
margin-left:2px;
background-color:#00a1d2;
box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
   -o-box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
   -webkit-box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);
   -moz-box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 1px rgba(255,255,255,0.3), inset 0 10px rgba(255,255,255,0.2), inset 0 10px 20px rgba(255,255,255,0.25), inset 0 -15px 30px rgba(0,0,0,0.3);	
}
#pagination li:hover
{ 
color:#FF0084; 
cursor: pointer; 

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
 <?php
		
		if(isset($_REQUEST['search']))
		  {
		 	 $srch=$_REQUEST['search'];	
			 if($srch!=NULL)
		 $query="select * from form where stud_id LIKE '%$srch%' OR name LIKE '%$srch%' OR contact LIKE '%$srch%' OR email LIKE '%$srch%' OR date LIKE '%$srch%' OR batch LIKE '%$srch%'";
		$ans=mysql_query($query);	 
	 
	?>
	
		<table class="emp_tab">        
		<?php
        if(mysql_num_rows($ans)==0)
		{
		?>
        <tr class='pagi'>
         <td colspan='6' align="center"><h3> No Data available</h3></td>
        </tr>
		
		<?php
        }
		while($row=mysql_fetch_array($ans))
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
	<?php
		}
?>
                
                <br />
<br />
				<form action="" method="post" name="search">
				<table class="quotation">
                <tr>
                <td class="info">List Of  Register Student</td>
                <td width="500px"><input type='text' name="search" class="result" title="Enter Student Id,Cotact no,name,email_id,batch name here.." />
                    <input type="submit" name="result" value="search" class="go" /></td>
                </tr>
                </table>
                </form>
                <form action="" method="post" name="search">
				<table >
                <tr>                 
                <td width="500px"> 
                <select name="batch" id="batch">
<option value="0">Select Batch</option>
		<?php

        $batch="select * from batch";
		$rest=mysql_query($batch);
		if($rest === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
		
		while($rows=mysql_fetch_array($rest))
		{
			echo "<option value='$rows[1]'>$rows[1]</option>";
		}
		?>
        </select>
                    <input type="submit" name="submit" value="search" class="go" /></td>
                </tr>
                </table>
                </form>
 	<div id="loading" ></div>
		<div id="content" ></div>
        <table width="800px">
	<tr><Td>
			<ul id="pagination">
				<?php
				//Show page links
				for($i=1; $i<=$pages; $i++)
				{
					echo '<li id="'.$i.'">'.$i.'</li>';
				}
				?>
	</ul>	
	</Td></tr></table>
	            
                
                
                
                
                
                <br />
             
                </div>                
               
  				</div>
                
                
        
    
    	<div class="clear"></div>
    
</div>
 <div id="footer">
     <div class="clear"></div> 
    </div>
    </div>



     
    
</body>
</html>