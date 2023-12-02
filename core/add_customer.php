<?php


if (isset($_POST['add_customer'])) {
	// code...
if ($_SESSION['admin']=='1') {


if (($_SESSION['authority']=='superadmin') || (($_SESSION['managecustomers']=='1'))) {
  // authorized to operate


$customername=mysqli_real_escape_string($con,$_POST['customername']);
$customerphone=mysqli_real_escape_string($con,$_POST['customerphone']);
$customerlocation=mysqli_real_escape_string($con,$_POST['customerlocation']);
$customertype=mysqli_real_escape_string($con,$_POST['customertype']);
$briefinfo=mysqli_real_escape_string($con,$_POST['briefinfo']);


$gt_cust = mysqli_query($con,"SELECT * FROM customers WHERE customerphone='$customerphone'");
$customer = mysqli_num_rows($gt_cust);
$cust_status = $customer;

if ($cust_status>0) {
	// code...
	$error="Customer Already Exists";
} else {
	// code...


$save_supplier = mysqli_query($con,"INSERT INTO customers(customername,customerphone,customerlocation,customertype,briefinfo,customer_status) VALUES('$customername','$customerphone','$customerlocation','$customertype','$briefinfo','active')");

if($save_supplier)
{
	$message="New Customer Saved";
}
else
{
	$error="Database Uplink Failure!";
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