<?php




if (isset($_GET['cancel-sale'])) {
	// code...

if ($_SESSION['admin']=='1') {


if (($_SESSION['authority']=='superadmin') || ( ($_SESSION['managesales']=='1'))) {
  // authorized to operate

	
$user_id = preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['cancel-sale']));


$gt_cust = mysqli_query($con,"SELECT * FROM sales WHERE id='$user_id'");
$customer = mysqli_fetch_array($gt_cust);
$cust_status = htmlentities($customer['status']);

if ($cust_status=='cancelled') {
	// code...
} else {
	// code...



$update_user = mysqli_query($con,"UPDATE sales SET status='cancelled' WHERE id='$user_id'");
if ($update_user) {
	// code...
	$message = "Sale Cancelled Successfully";
}
else
{
	$error = "Database Uplink Failure!";
}

}
}
else
{
	$error="Access Denied !";
}

}
else
{

		echo "<script>window.location='logout.php'</script>";
}

}


?>