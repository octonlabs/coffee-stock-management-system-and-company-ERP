<?php




if (isset($_GET['suspend-product'])) {
	// code...

if ($_SESSION['admin']=='1') {

if (($_SESSION['authority']=='superadmin') || (($_SESSION['manageproducts']=='1'))) {
  // authorized to operate

$user_id = preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['suspend-product']));
$gt_cust = mysqli_query($con,"SELECT * FROM products WHERE id='$user_id'");
$customer = mysqli_fetch_array($gt_cust);
$cust_status = htmlentities($customer['status']);

if ($cust_status=='suspended') {
	// code...
} else {
	// code...

$update_user = mysqli_query($con,"UPDATE products SET status='suspended' WHERE id='$user_id'");
if ($update_user) {
	// code...
	$message = "Product Disabled Successfully";
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