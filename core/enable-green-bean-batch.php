<?php




if (isset($_GET['enable-green-bean-batch'])) {
	// code...

if ($_SESSION['admin']=='1') {

if (($_SESSION['authority']=='superadmin') || (($_SESSION['managegreenbeans']=='1'))) {
  // authorized to operate

$user_id = preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['enable-green-bean-batch']));

$gt_parch = mysqli_query($con,"SELECT * FROM green_beans WHERE id='$user_id'");
$parch = mysqli_fetch_array($gt_parch);
$quantity = htmlentities($parch['quantity']);
$remaining = htmlentities($parch['remaining']);
$processing_status = htmlentities($parch['processing_status']);
if ($processing_status=='complete') {
	// code...
} else {
	// code...


 


$update_user = mysqli_query($con,"UPDATE green_beans SET processing_status='complete' WHERE id='$user_id'");
if ($update_user) {
	// code...
	$message = "Batch Processing Completed Successfully";
}
else
{
	$error = "Database Uplink Failure!";
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

		echo "<script>window.location='logout.php'</script>";
}

}


?>