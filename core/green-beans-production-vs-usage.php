<?php
include('connection.php');
if (isset($_GET['processed-green-beans'])) {

//by expenditure



$ct_active = mysqli_query($con,"SELECT SUM(quantity) as total_stock FROM green_beans WHERE processing_status='complete' && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) ");
$ct_actve = mysqli_fetch_array($ct_active);

$ct_suspended = mysqli_query($con,"SELECT SUM(remaining) as remaining_stock FROM green_beans WHERE processing_status='complete' && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) ");
$ct_sus = mysqli_fetch_array($ct_suspended);

$avail = htmlentities($ct_sus['remaining_stock']);
$total_stock = htmlentities($ct_actve['total_stock']);


$total = $total_stock+$avail;
$active=number_format(($avail/$total)*100,2);

$processed= number_format(($total_stock/$total)*100,2);

$dataPoints = array( 
 
  array("label"=>"Total Stock", "symbol" => "Total Stock (Kgs)","y"=>$processed),
  array("label"=>"Available", "symbol" => "Available (Kgs)","y"=>$active),
 
 
);
$data[] = $body;
echo json_encode($data);
}


?>