<?php




if (isset($_GET['approve-liquoring'])) {
	// code...


if ($_SESSION['admin']=='1') {

if (($_SESSION['authority']=='superadmin') || (($_SESSION['processgreenbeans']=='1') )) {
  // authorized to operate

$user_id = preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['approve-liquoring']));
$gt_req = mysqli_query($con,"SELECT * FROM liquoring WHERE id='$user_id'");
$req = mysqli_fetch_array($gt_req);
$quantity = htmlentities($req['quantity']);
$parch_id = htmlentities($req['green_bean_id']);
$request_status = htmlentities($req['status']);

if ($request_status!=='approved') {


$gt_patch = mysqli_query($con,"SELECT * FROM green_beans WHERE id='$parch_id'");
$parch = mysqli_fetch_array($gt_patch);
$qty_avail = htmlentities($parch['remaining']);
if ($qty_avail>$quantity) {
	// code...



	$new_quantity = $qty_avail-$quantity;




//echo($new_quantity);
$update_parch = mysqli_query($con,"UPDATE green_beans SET remaining='$new_quantity' WHERE id='$parch_id'");
if ($update_parch) {
	// code...

$update_req = mysqli_query($con,"UPDATE liquoring SET status='approved' WHERE id='$user_id'");
if ($update_req) {
	// code...
	$message = "Request Approved Successfully";
} else {
	// code...
	$error="Database Uplink Failure!";
}

	
}
else
{
	$error = "Failed To Update Bean Stock!";
}


} else {
	// code...

	$error = "This Batch Of Stock Has A Lower Qauntity Than Your Request";
}


	// code...
}
}
else

{
	$error="Access Denied";
}


}
else
{

		echo "<script>window.location='logout.php'</script>";
}

}


?>