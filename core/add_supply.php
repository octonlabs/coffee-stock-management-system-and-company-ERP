<?php

if (isset($_POST['add_supply'])) {
	// code...
if ($_SESSION['admin']=='1') {


if (($_SESSION['authority']=='superadmin') || (($_SESSION['managesupplies']=='1'))) {
  // authorized to operate


$unitmeasurement=mysqli_real_escape_string($con,$_POST['unitmeasurement']);
$itemsupply=mysqli_real_escape_string($con,$_POST['itemsupply']);	

$gt_cust = mysqli_query($con,"SELECT * FROM supplies WHERE itemsupply='$itemsupply'");
$customer = mysqli_num_rows($gt_cust);
$cust_status = $customer;

if ($cust_status>0) {
	// code...
	$error="Entry Already Exists";
} else {
	// code...

if(!(empty($itemsupply)))
{


$new_grade = mysqli_query($con,"INSERT INTO supplies(itemsupply,status,unitmeasurement) VALUES('$itemsupply','active','$unitmeasurement')");

if ($new_grade) {
	// code...
	$message="New Item Added Successfully";
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