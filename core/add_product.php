<?php

if (isset($_POST['add_product'])) {
	// code...
if ($_SESSION['admin']=='1') {
	
	if (($_SESSION['authority']=='superadmin') || (($_SESSION['manageproducts']=='1'))) {
  // authorized to operate

$itemsupply=mysqli_real_escape_string($con,$_POST['itemsupply']);
$unitmeasurement=mysqli_real_escape_string($con,$_POST['unitmeasurement']);


$gt_cust = mysqli_query($con,"SELECT * FROM products WHERE itemsupply='$itemsupply'");
$customer = mysqli_num_rows($gt_cust);
$cust_status = $customer;

if ($cust_status>0) {
	// code...
	$error="Product Already Exists";
} else {
	// code...

if(!(empty($itemsupply)))
{


$new_grade = mysqli_query($con,"INSERT INTO products(itemsupply,status,unitmeasurement) VALUES('$itemsupply','active','$unitmeasurement')");

if ($new_grade) {
	// code...
	$message="New Product Added Successfully";
}
else
{
	$error="Database Uplink Failure!";
}

}
else
{
	$error="You Can't Submit Empty Data";
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

//not logged in
	echo "<script>window.location='logout.php'</script>";

}

}




?>