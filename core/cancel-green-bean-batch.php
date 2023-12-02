<?php




if (isset($_GET['cancel-green-bean-batch'])) {
	// code...

if ($_SESSION['admin']=='1') {

if (($_SESSION['authority']=='superadmin') || (($_SESSION['managegreenbeans']=='1'))) {
  // authorized to operate

$user_id = preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['cancel-green-bean-batch']));

$gt_parch = mysqli_query($con,"SELECT * FROM green_beans WHERE id='$user_id'");
$parch = mysqli_fetch_array($gt_parch);
$quantity = htmlentities($parch['quantity']);
$remaining = htmlentities($parch['remaining']);
$processing_status = htmlentities($parch['processing_status']);
if ($processing_status=='cancelled') {
	// code...
} else {
	// code...


if ($quantity!==$remaining) {
	// code...
$error = "Part Or All Of This Batch Has Been Sent To Liquoring";
} else {
	// code...


$update_user = mysqli_query($con,"UPDATE green_beans SET processing_status='cancelled' WHERE id='$user_id'");
if ($update_user) {
	// code...
	$message = "Batch Processing Cancelled Successfully";
}
else
{
	$error = "Database Uplink Failure!";
}


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