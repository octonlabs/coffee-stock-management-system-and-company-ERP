<?php




if (isset($_GET['activate-product'])) {
	// code...

if ($_SESSION['admin']=='1') {

if (($_SESSION['authority']=='superadmin') || (($_SESSION['manageproducts']=='1'))) {
  // authorized to operate

$user_id = preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['activate-product']));
$gt_pdt = mysqli_query($con,"SELECT * FROM products WHERE id='$user_id'");
$pdt = mysqli_fetch_array($gt_pdt);
$pdt_status = htmlentities($pdt['status']);
if ($pdt_status=='active') {
	// code...
} else {
	// code...

$update_user = mysqli_query($con,"UPDATE products SET status='active' WHERE id='$user_id'");
if ($update_user) {
	// code...
	$message = "Product Enabled Successfully";
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