<?php

if (isset($_POST['request_stock'])) {
	// code...
if ($_SESSION['admin']=='1') {

	if (($_SESSION['authority']=='superadmin') || ( ($_SESSION['processparchment']=='1'))) {
  // authorized to operate

$batches=mysqli_real_escape_string($con,$_POST['batches']);
	$quantity=mysqli_real_escape_string($con,$_POST['quantity']);

if(!(empty($batches)) && !(empty($quantity)))
{

$gt_batch = mysqli_query($con,"SELECT * FROM parchment WHERE id='$batches'");
$batch = mysqli_fetch_array($gt_batch);
$current_stock = htmlentities($batch['remaining']);
$batchnumber = htmlentities($batch['batchnumber']);
$handler = htmlentities($batch['handler']);
$otherinfo = htmlentities($batch['otherinfo']);




$gt_cust = mysqli_query($con,"SELECT * FROM processing WHERE otherinfo='$otherinfo'");
$customer = mysqli_num_rows($gt_cust);
$cust_status = $customer;

if ($cust_status>0) {
	// code...
	$error="Request Already Exists";
} else {
	// code...


if ($quantity>$current_stock) {
	// code...
	$error="Maximum Request For This Batch Is : ".$current_stock."KGs";
}
else
{

$new_current_stoc = ($current_stock-$quantity);
$update_parch = mysqli_query($con,"UPDATE parchment SET remaining='$new_current_stoc' WHERE id='$batches'");

if ($update_parch) {
	// code...

$new_request = mysqli_query($con,"INSERT INTO processing(batchnumber,quantity,parch_id,status,handler,otherinfo) VALUES('$batchnumber','$quantity','$batches','approved','$handler','$otherinfo')");
if ($new_request) {
	// code...
	$message="Processing Request Registered";
} else {
	// code...
	$error="Processing Request Not Registered!";
}


} else {
	// code...
	$error="Failed To Update Quantity For Batch Number : ".$batchnumber;
}



}

 }
}
else
{
	$error="You Can't Submit Empty Data";
}

}
else
{
	$error="Access Denied!";
}

}
else
{

//not logged in
	echo "<script>window.location='logout.php'</script>";

}


}



?>