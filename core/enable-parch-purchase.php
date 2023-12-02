<?php




if (isset($_GET['enable-parch-purchase'])) {
	// code...

if ($_SESSION['admin']=='1') {
	
	if (($_SESSION['authority']=='superadmin') || (($_SESSION['manageparchment']=='1'))) {
  // authorized to operate

$user_id = preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['enable-parch-purchase']));


$gt_cust = mysqli_query($con,"SELECT * FROM parchment WHERE id='$user_id'");
$customer = mysqli_fetch_array($gt_cust);
$cust_status = htmlentities($customer['purchase_status']);

if ($cust_status=='active') {
	// code...
} else {
	// code...



$update_user = mysqli_query($con,"UPDATE parchment SET purchase_status='active' WHERE id='$user_id'");
if ($update_user) {
	// code...
	$message = "Purchase Enabled Successfully";
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