<?php




if (isset($_GET['cancel-parch-purchase'])) {
	// code...

if ($_SESSION['admin']=='1') {

if (($_SESSION['authority']=='superadmin') || (($_SESSION['manageparchment']=='1'))) {
  // authorized to operate


$user_id = preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['cancel-parch-purchase']));

$gt_parch = mysqli_query($con,"SELECT * FROM parchment WHERE id='$user_id'");
$parch = mysqli_fetch_array($gt_parch);
$quantity = htmlentities($parch['quantity']);
$remaining = htmlentities($parch['remaining']);
$processing_status = htmlentities($parch['purchase_status']);

if ($processing_status=='cancelled') {
	// code...
} else {
	// code...



if ($quantity!==$remaining) {
	// code...
$error = "This Batch Was Sent To Processing";
} else {
	// code...


$update_user = mysqli_query($con,"UPDATE parchment SET purchase_status='cancelled' WHERE id='$user_id'");
if ($update_user) {
	// code...
	$message = "Purchase Cancelled Successfully";
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