<?php

if (isset($_POST['request_green_beans'])) {
	// code...

if ($_SESSION['admin']=='1') {

	if (($_SESSION['authority']=='superadmin') || (($_SESSION['processgreenbeans']=='1') )) {
  // authorized to operate
	$customer=mysqli_real_escape_string($con,$_POST['customer']);
	$batchcode=mysqli_real_escape_string($con,$_POST['batchnumber']);
	$batches=mysqli_real_escape_string($con,$_POST['batches']);
	$handler=mysqli_real_escape_string($con,$_POST['handler']);
	$otherinfo=mysqli_real_escape_string($con,$_POST['otherinfo']);
	$quantity=mysqli_real_escape_string($con,$_POST['quantity']);

if(!(empty($batches)) && !(empty($quantity)))
{

$gt_batch = mysqli_query($con,"SELECT * FROM green_beans WHERE id='$batches'");
$batch = mysqli_fetch_array($gt_batch);
$current_stock = htmlentities($batch['remaining']);
$batchnumber = htmlentities($batch['batchnumber']);
$handler = htmlentities($batch['handler']);
$otherinf = htmlentities($batch['otherinfo']);




$gt_cust = mysqli_query($con,"SELECT * FROM liquoring WHERE request_id='$batchcode'");
$customex = mysqli_num_rows($gt_cust);
$cust_status = $customex;

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
$update_parch = mysqli_query($con,"UPDATE green_beans SET remaining='$new_current_stoc' WHERE id='$batches'");

if ($update_parch) {
	// code...

$new_request = mysqli_query($con,"INSERT INTO liquoring(customer,request_id,green_bean_id,handler,quantity,otherinfo,status) VALUES('$customer','$batchcode','$batches','$handler','$quantity','$otherinf','approved')");
if ($new_request) {
	// code...
	$message="Request Registered";
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