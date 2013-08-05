<?php
include("session.php"); 
include("include/database.php");
if($_GET)
{
}
     $u1 = 'http://bulksms.mysmsmantra.com:8080/WebSMS/balance.jsp?';
$u2= 'username='.urlencode('wave').'&password='. urlencode('1492407050');

$murl=$u1.$u2;

$ch = curl_init($murl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $u2);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
echo '<br>'.$response.'<br>';

curl_close($ch);  

?>