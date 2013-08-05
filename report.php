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
        <?php
			if(isset($_POST['Submit']))
{
	$date1=date('d-m-Y',strtotime($_POST['startdate']));
	$date2=date('d-m-Y',strtotime($_POST['enddate']));
	$u1 = 'http://bulksms.mysmsmantra.com:8080/WebSMS/sentreport.jsp?';
 $u2= 'username='.urlencode('wave').'&password='. urlencode('1492407050').'&fromdate='.$date1.'&todate='.$date2;

$murl=$u1.$u2;

$ch = curl_init($murl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $u2);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);?>
<table border="1">
<tr>
<th>
</tr>
<tr>
<td>
<?php
echo $response;
$pieces = explode(",", $response);
echo $pieces[0]; // piece1
echo $pieces[1]; // piece2
?>
</td>
</tr>
</table>
<?php
curl_close($ch);  

		
	}
			?>
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

               