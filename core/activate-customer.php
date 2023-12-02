<?php






if (isset($_GET['activate-customer'])) {
	// code...
if ($_SESSION['admin']=='1') {

if (($_SESSION['authority']=='superadmin') || (($_SESSION['managecustomers']=='1'))) {
  // authorized to operate

$user_id = preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['activate-customer']));
$gt_cust = mysqli_query($con,"SELECT * FROM customers WHERE id='$user_id'");
$customer = mysqli_fetch_array($gt_cust);
$cust_status = htmlentities($customer['customer_status']);

if ($cust_status=='active') {
	// code...
} else {
	// code...

$update_user = mysqli_query($con,"UPDATE customers SET customer_status='active' WHERE id='$user_id'");
if ($update_user) {
	// code...
	$message = "Customer Activated Successfully";
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