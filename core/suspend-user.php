<?php



if (isset($_GET['suspend-user'])) {
	// code...

if ($_SESSION['admin']=='1') {

if (($_SESSION['authority']=='superadmin') || (($_SESSION['managesuppliers']=='1'))) {
  // authorized to operate


$user_id = preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['suspend-user']));
$gt_cust = mysqli_query($con,"SELECT * FROM suppliers WHERE id='$user_id'");
$customer = mysqli_fetch_array($gt_cust);
$cust_status = htmlentities($customer['supplier_status']);

if ($cust_status=='suspended') {
	// code...
} else {
	// code...

$update_user = mysqli_query($con,"UPDATE suppliers SET supplier_status='suspended' WHERE id='$user_id'");
if ($update_user) {
	// code...
	$message = "Supplier Suspended Successfully";
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