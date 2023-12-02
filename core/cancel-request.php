<?php




if (isset($_GET['cancel-request'])) {
	// code...


if ($_SESSION['admin']=='1') {

if (($_SESSION['authority']=='superadmin') || ( ($_SESSION['processparchment']=='1'))) {
  // authorized to operate


$user_id = preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['cancel-request']));
$gt_req = mysqli_query($con,"SELECT * FROM processing WHERE id='$user_id'");
$req = mysqli_fetch_array($gt_req);
$quantity = htmlentities($req['quantity']);
$parch_id = htmlentities($req['parch_id']);
$request_status = htmlentities($req['status']);
if ($request_status!=='cancelled') {

$gt_patch = mysqli_query($con,"SELECT * FROM parchment WHERE id='$parch_id'");
$parch = mysqli_fetch_array($gt_patch);
$qty_avail = htmlentities($parch['remaining']);
$new_quantity = $qty_avail+$quantity;



$update_parch = mysqli_query($con,"UPDATE parchment SET remaining='$new_quantity' WHERE id='$parch_id'");
if ($update_parch) {
	// code...

$update_req = mysqli_query($con,"UPDATE processing SET status='cancelled' WHERE id='$user_id'");
if ($update_req) {
	// code...
	$message = "Request Cancelled Successfully";
} else {
	// code...
	$error="Database Uplink Failure!";
}

	
}
else
{
	$error = "Failed To Update Parchment Stock!";
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