<?php
include("session.php"); 
include("include/database.php");
error_reporting(0);

?>

<html>
<head>
<title>Navin's Dance Academy</title>
<link rel="stylesheet" href="styles2.css" type="text/css" />
<link rel="stylesheet" href="styles.css" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>

	
	
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
<br><br>
            
     </ul>
 </div>
<br />
 <div class="quotation" align="center">Sent Report Details</div>

	<div id="loading" ></div>
		<div id="content" ></div>
    	<form name="sent" action="report.php" method="post">        
        <table class="q_info">
	<tr><Td>
	Start Date</Td>
    <td><input tabindex="" type="date" name="startdate">
	</Td></tr>
    <tr>
    <Td>
	End Date</Td>
    <td><input tabindex="" type="date" name="enddate">
	</Td>
    </tr>
    </table>
    <div class="reg_button">
<input type="submit" name="Submit" class="formbutton" value="Submit" >
<input type="submit" name="Cancel" class="formbutton" value="Cancel">
</div>
	            </form>                                                                      
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