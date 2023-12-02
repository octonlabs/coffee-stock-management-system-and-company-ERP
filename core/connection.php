<?php
session_start();
error_reporting(0);
$con=mysqli_connect('localhost','root','','crm');
if(mysqli_errno($con))
{
	echo "Admin Database Uplink Failure...<br>".mysqli_error($con);


}
$domain = "http://localhost/crm/";
//$_SESSION['domain']=$domain;
$mtero = $_SESSION['admin'];
$currency=" Ushs";
$company_namez="Ubora Specialty Crops - Limited";
?>