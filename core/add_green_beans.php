<?php



if (isset($_POST['add_green_beans'])) {
	// code...
if ($_SESSION['admin']=='1') {

if (($_SESSION['authority']=='superadmin') || (($_SESSION['managegreenbeans']=='1'))) {
  // authorized to operate


$coffeegrade=mysqli_real_escape_string($con,$_POST['coffeegrade']);
$quantity=mysqli_real_escape_string($con,$_POST['quantity']);
$batchnumber=mysqli_real_escape_string($con,$_POST['batchnumber']);
$handler=mysqli_real_escape_string($con,$_POST['handler']);
$otherinfo=mysqli_real_escape_string($con,$_POST['otherinfo']);

$check_batch = mysqli_query($con,"SELECT * FROM green_beans WHERE batchnumber='$batchnumber'");
$batch_check = mysqli_num_rows($check_batch);
if ($batch_check>0) {
	// code...
	$error="Batch Number Already Exists";
} else {
	// code...


$save_supplier = mysqli_query($con,"INSERT INTO green_beans(coffeegrade,quantity,batchnumber,handler,otherinfo,processing_status,remaining) VALUES('$coffeegrade','$quantity','$batchnumber','$handler','$otherinfo','complete','$quantity')");

if($save_supplier)
{
	$message="New Green Beans Stock Saved";
}
else
{
	$error="Database Uplink Failure!";
}


	
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